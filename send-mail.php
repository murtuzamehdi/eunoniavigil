<?php
/**
 * Eunoia Vigil - 24/7 Surveillance Operations Lead Processing & SMTP Mailer
 * Connectwise Consulting Inc
 * Pure Core PHP Implementation (Zero external dependencies)
 * Outgoing Server: mail.eunoiavigil.com (Port 465 SSL)
 * Recipient: sales@eunoiavigil.com
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Error reporting - silent in production to prevent leaking sensitive info
error_reporting(E_ALL);
ini_set('display_errors', '0');

// Configuration
define('SMTP_HOST', 'mail.eunoiavigil.com');
define('SMTP_PORT', 465);
define('SMTP_USER', 'sales@eunoiavigil.com');
define('SMTP_PASS', 'fs&mH[$PX~CdXEdc');
define('MAIL_TO', 'sales@eunoiavigil.com');
define('MAIL_FROM', 'sales@eunoiavigil.com');
define('MAIL_FROM_NAME', 'Eunoia Vigil Lead Alert');

/**
 * Pure Core PHP SMTP Client with SSL Stream Context
 */
class CoreSmtpMailer {
    private $socket;
    private $host;
    private $port;
    private $user;
    private $pass;
    private $timeout;
    private $debugLog = [];

    public function __construct($host, $port, $user, $pass, $timeout = 15) {
        $this->host = $host;
        $this->port = $port;
        $this->user = $user;
        $this->pass = $pass;
        $this->timeout = $timeout;
    }

    private function log($msg) {
        $this->debugLog[] = $msg;
    }

    public function getLogs() {
        return $this->debugLog;
    }

    private function getResponse() {
        $response = '';
        while ($line = fgets($this->socket, 512)) {
            $response .= $line;
            if (strlen($line) >= 4 && substr($line, 3, 1) === ' ') {
                break;
            }
        }
        $this->log("SERVER: " . trim($response));
        return $response;
    }

    private function sendCommand($cmd, $expectedCode = 250) {
        $masked = (strpos($cmd, 'AUTH') !== false || strlen($cmd) > 40) ? '[COMMAND]' : trim($cmd);
        $this->log("CLIENT: " . $masked);
        fputs($this->socket, $cmd . "\r\n");
        $response = $this->getResponse();
        $code = substr($response, 0, 3);
        if ($expectedCode && (int)$code !== (int)$expectedCode) {
            throw new Exception("SMTP Error: Expected $expectedCode but received $code: $response");
        }
        return $response;
    }

    public function send($to, $fromEmail, $fromName, $replyTo, $subject, $htmlBody, $textBody = '') {
        $context = stream_context_create([
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            ]
        ]);

        $errno = 0;
        $errstr = '';
        $this->socket = @stream_socket_client("ssl://{$this->host}:{$this->port}", $errno, $errstr, $this->timeout, STREAM_CLIENT_CONNECT, $context);

        if (!$this->socket) {
            throw new Exception("Failed to connect to SMTP host {$this->host}: ({$errno}) {$errstr}");
        }

        // Read initial connection banner
        $connectResponse = $this->getResponse();
        if (substr($connectResponse, 0, 3) !== '220') {
            fclose($this->socket);
            throw new Exception("Unexpected SMTP connect banner: {$connectResponse}");
        }

        try {
            // Handshake & Authentication
            $this->sendCommand("EHLO mail.eunoiavigil.com", 250);
            $this->sendCommand("AUTH LOGIN", 334);
            $this->sendCommand(base64_encode($this->user), 334);
            $this->sendCommand(base64_encode($this->pass), 235);

            // Envelope
            $this->sendCommand("MAIL FROM: <{$fromEmail}>", 250);
            $this->sendCommand("RCPT TO: <{$to}>", 250);

            // Data block
            $this->sendCommand("DATA", 354);

            $boundary = "----=_Part_" . md5(uniqid((string)time(), true));
            $cleanSubject = preg_replace('/[\r\n]+/', ' ', $subject);

            // Headers
            $headers = [];
            $headers[] = "Date: " . date('r');
            $headers[] = "From: =?UTF-8?B?" . base64_encode($fromName) . "?= <{$fromEmail}>";
            $headers[] = "To: <{$to}>";
            if (!empty($replyTo)) {
                $headers[] = "Reply-To: <{$replyTo}>";
            }
            $headers[] = "Subject: =?UTF-8?B?" . base64_encode($cleanSubject) . "?=";
            $headers[] = "Message-ID: <" . md5(uniqid((string)time(), true)) . "@eunoiavigil.com>";
            $headers[] = "X-Mailer: Eunoia Vigil Core PHP Mailer";
            $headers[] = "MIME-Version: 1.0";
            $headers[] = "Content-Type: multipart/alternative; boundary=\"{$boundary}\"";

            $payload = implode("\r\n", $headers) . "\r\n\r\n";

            // Plain text part
            if (!empty($textBody)) {
                $payload .= "--{$boundary}\r\n";
                $payload .= "Content-Type: text/plain; charset=UTF-8\r\n";
                $payload .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
                $payload .= $textBody . "\r\n\r\n";
            }

            // HTML part
            $payload .= "--{$boundary}\r\n";
            $payload .= "Content-Type: text/html; charset=UTF-8\r\n";
            $payload .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
            $payload .= $htmlBody . "\r\n\r\n";
            $payload .= "--{$boundary}--\r\n";

            // End data block
            $payload .= "\r\n.";

            $this->sendCommand($payload, 250);

            // Quit
            fputs($this->socket, "QUIT\r\n");
            $this->getResponse();
            fclose($this->socket);
            return true;

        } catch (Exception $e) {
            if ($this->socket) {
                @fputs($this->socket, "QUIT\r\n");
                @fclose($this->socket);
            }
            throw $e;
        }
    }
}

// =============================================================================
// REQUEST HANDLER
// =============================================================================

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: /");
    exit;
}

// 1. Anti-Spam Honeypot Check
if (!empty($_POST['_hp_company'])) {
    // Silently redirect bot to thank-you without sending email
    header("Location: thank-you/");
    exit;
}

// Accept JSON payload if submitted via fetch
if (empty($_POST)) {
    $rawInput = file_get_contents('php://input');
    if (!empty($rawInput)) {
        $decoded = json_decode($rawInput, true);
        if (is_array($decoded)) {
            $_POST = $decoded;
        } else {
            parse_str($rawInput, $parsed);
            if (is_array($parsed)) {
                $_POST = $parsed;
            }
        }
    }
}

// 2. Sanitize Inputs
function cleanInput($data) {
    if (is_array($data)) {
        return array_map('cleanInput', $data);
    }
    return htmlspecialchars(trim((string)$data), ENT_QUOTES, 'UTF-8');
}

$fullName        = cleanInput($_POST['full_name'] ?? $_POST['name'] ?? $_POST['contact_name'] ?? '');
$businessName    = cleanInput($_POST['business_name'] ?? $_POST['company_name'] ?? $_POST['facility_name'] ?? '');
$email           = cleanInput($_POST['email'] ?? $_POST['work_email'] ?? '');
$phone           = cleanInput($_POST['phone'] ?? $_POST['direct_phone'] ?? '');
$cameraBrand     = cleanInput($_POST['camera_brand'] ?? $_POST['brand'] ?? '');
$cameraCount     = cleanInput($_POST['camera_count'] ?? $_POST['cameras'] ?? '');
$facilityType    = cleanInput($_POST['facility_type'] ?? '');
$coverageHours   = cleanInput($_POST['coverage_hours'] ?? $_POST['hours_required'] ?? $_POST['tier'] ?? '');
$billingFreq     = cleanInput($_POST['billing_freq'] ?? $_POST['cadence'] ?? '');
$talkdownAddon   = cleanInput($_POST['talkdown_addon'] ?? $_POST['talkdown'] ?? '');
$estimatedRate   = cleanInput($_POST['estimated_rate'] ?? '');
$message         = cleanInput($_POST['message'] ?? $_POST['notes'] ?? $_POST['comments'] ?? '');
$formType        = cleanInput($_POST['form_type'] ?? 'Surveillance Lead Inquiry');
$pageUrl         = cleanInput($_POST['page_url'] ?? $_SERVER['HTTP_REFERER'] ?? 'Direct Website Submission');
$clientIp        = $_SERVER['REMOTE_ADDR'] ?? 'Unknown IP';
$timestamp       = date('F j, Y, g:i a T');

// Determine redirect URL
$redirectUrl = 'thank-you/';

// 3. Validation
if (empty($fullName) && empty($email) && empty($phone)) {
    header("Location: /");
    exit;
}

// 4. Construct Branded HTML Email
$subject = "🚨 New Surveillance Lead: " . ($fullName ?: ($businessName ?: $email)) . " [{$formType}]";

$htmlBody = '
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>' . htmlspecialchars($subject) . '</title>
  <style>
    body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif; background-color: #0b0f19; margin: 0; padding: 24px; color: #e2e8f0; }
    .email-container { max-width: 620px; margin: 0 auto; background: #111827; border-radius: 14px; overflow: hidden; border: 1px solid #1f2937; box-shadow: 0 10px 30px rgba(0,0,0,0.5); }
    .email-header { background: linear-gradient(135deg, #060911 0%, #0d1527 100%); padding: 30px 24px; text-align: center; border-bottom: 2px solid #2563eb; }
    .brand-title { font-size: 24px; font-weight: 800; color: #ffffff; letter-spacing: 0.5px; margin: 0; }
    .brand-title span { color: #3b82f6; }
    .brand-sub { font-size: 11px; text-transform: uppercase; color: #94a3b8; letter-spacing: 1.5px; margin-top: 4px; }
    .badge-pill { display: inline-block; background: rgba(37, 99, 235, 0.2); color: #60a5fa; border: 1px solid rgba(59, 130, 246, 0.4); padding: 5px 14px; border-radius: 20px; font-size: 12px; font-weight: 700; text-transform: uppercase; margin-top: 14px; }
    .email-body { padding: 28px 24px; }
    .lead-heading { font-size: 18px; font-weight: 700; color: #f8fafc; margin-bottom: 18px; padding-bottom: 8px; border-bottom: 1px solid #1f2937; }
    .data-table { width: 100%; border-collapse: collapse; margin-bottom: 24px; }
    .data-table td { padding: 12px 14px; border-bottom: 1px solid #1f2937; font-size: 14px; }
    .data-table td.label { width: 38%; font-weight: 600; color: #94a3b8; background: #0f172a; }
    .data-table td.value { color: #f1f5f9; font-weight: 600; }
    .highlight-val { color: #38bdf8 !important; font-weight: 700; }
    .call-btn { display: inline-block; background: #2563eb; color: #ffffff !important; padding: 12px 24px; border-radius: 8px; text-decoration: none; font-weight: 700; font-size: 14px; margin-top: 10px; }
    .notes-box { background: #0f172a; border-left: 4px solid #3b82f6; padding: 14px 16px; border-radius: 0 8px 8px 0; font-size: 13.5px; color: #cbd5e1; line-height: 1.6; margin-top: 16px; }
    .email-footer { background: #060911; padding: 20px; text-align: center; font-size: 12px; color: #64748b; border-top: 1px solid #1f2937; }
    .email-footer a { color: #3b82f6; text-decoration: none; }
  </style>
</head>
<body>
  <div class="email-container">
    <div class="email-header">
      <div class="brand-title">EUNOIA <span>VIGIL</span></div>
      <div class="brand-sub">Intelligence-Driven Surveillance Solutions</div>
      <div class="badge-pill">' . htmlspecialchars($formType) . '</div>
    </div>
    <div class="email-body">
      <div class="lead-heading">New Inbound Surveillance Lead</div>
      <table class="data-table">
        <tr>
          <td class="label">Contact Name:</td>
          <td class="value"><strong>' . ($fullName ?: 'Not provided') . '</strong></td>
        </tr>
        <tr>
          <td class="label">Company / Business:</td>
          <td class="value">' . ($businessName ?: 'Not specified') . '</td>
        </tr>
        <tr>
          <td class="label">Email Address:</td>
          <td class="value"><a href="mailto:' . htmlspecialchars($email) . '" style="color:#38bdf8; text-decoration:none;">' . ($email ?: 'Not provided') . '</a></td>
        </tr>
        <tr>
          <td class="label">Direct Phone:</td>
          <td class="value"><a href="tel:' . preg_replace('/[^0-9+]/', '', $phone) . '" style="color:#ffffff; text-decoration:none;"><strong>' . ($phone ?: 'Not provided') . '</strong></a></td>
        </tr>';

if (!empty($cameraBrand)) {
    $htmlBody .= '
        <tr>
          <td class="label">Existing Camera Brand:</td>
          <td class="value highlight-val">' . $cameraBrand . '</td>
        </tr>';
}

if (!empty($cameraCount)) {
    $htmlBody .= '
        <tr>
          <td class="label">Number of Cameras:</td>
          <td class="value highlight-val">' . $cameraCount . ' Cameras</td>
        </tr>';
}

if (!empty($facilityType)) {
    $htmlBody .= '
        <tr>
          <td class="label">Facility Type:</td>
          <td class="value">' . $facilityType . '</td>
        </tr>';
}

if (!empty($coverageHours)) {
    $htmlBody .= '
        <tr>
          <td class="label">Coverage Schedule:</td>
          <td class="value">' . $coverageHours . '</td>
        </tr>';
}

if (!empty($billingFreq)) {
    $htmlBody .= '
        <tr>
          <td class="label">Billing Cadence:</td>
          <td class="value">' . $billingFreq . '</td>
        </tr>';
}

if (!empty($talkdownAddon)) {
    $htmlBody .= '
        <tr>
          <td class="label">Live Audio Talk-Down:</td>
          <td class="value">' . $talkdownAddon . '</td>
        </tr>';
}

if (!empty($estimatedRate)) {
    $htmlBody .= '
        <tr>
          <td class="label">Calculated Quote:</td>
          <td class="value highlight-val" style="font-size: 16px;">' . $estimatedRate . '</td>
        </tr>';
}

$htmlBody .= '
        <tr>
          <td class="label">Submission Time:</td>
          <td class="value">' . $timestamp . '</td>
        </tr>
        <tr>
          <td class="label">Source Page:</td>
          <td class="value" style="font-size: 12px; color: #94a3b8;">' . $pageUrl . '</td>
        </tr>
        <tr>
          <td class="label">Visitor IP:</td>
          <td class="value" style="font-size: 12px; color: #94a3b8;">' . $clientIp . '</td>
        </tr>
      </table>';

if (!empty($message)) {
    $htmlBody .= '
      <div style="font-weight:600; font-size:13px; color:#94a3b8; margin-top:14px;">Setup Notes / Additional Requirements:</div>
      <div class="notes-box">' . nl2br($message) . '</div>';
}

if (!empty($phone)) {
    $cleanPhone = preg_replace('/[^0-9+]/', '', $phone);
    $htmlBody .= '
      <div style="text-align: center; margin-top: 24px;">
        <a href="tel:' . $cleanPhone . '" class="call-btn">📞 Call Lead Now: ' . $phone . '</a>
      </div>';
}

$htmlBody .= '
    </div>
    <div class="email-footer">
      Automated Lead Dispatch &bull; Connectwise Consulting Inc / Eunoia Vigil<br>
      25722 Kingsland Blvd Suite 114, Katy, TX 77494 &bull; Desk: (844) 246-9291
    </div>
  </div>
</body>
</html>';

// Plain text alternative
$textBody = "=== NEW EUNOIA VIGIL SURVEILLANCE LEAD ===\n\n";
$textBody .= "Form Type: $formType\n";
$textBody .= "Contact Name: $fullName\n";
$textBody .= "Business Name: $businessName\n";
$textBody .= "Email: $email\n";
$textBody .= "Phone: $phone\n";
if (!empty($cameraBrand)) $textBody .= "Camera Brand: $cameraBrand\n";
if (!empty($cameraCount)) $textBody .= "Camera Count: $cameraCount\n";
if (!empty($facilityType)) $textBody .= "Facility: $facilityType\n";
if (!empty($coverageHours)) $textBody .= "Coverage: $coverageHours\n";
if (!empty($billingFreq)) $textBody .= "Billing: $billingFreq\n";
if (!empty($talkdownAddon)) $textBody .= "Talk-Down: $talkdownAddon\n";
if (!empty($estimatedRate)) $textBody .= "Estimated Rate: $estimatedRate\n";
if (!empty($message)) $textBody .= "\nNotes:\n$message\n\n";
$textBody .= "Timestamp: $timestamp\n";
$textBody .= "Source Page: $pageUrl\n";
$textBody .= "Client IP: $clientIp\n";

// 5. Send via Secure SMTP
$mailSuccess = false;
$errorMessage = '';

try {
    $mailer = new CoreSmtpMailer(SMTP_HOST, SMTP_PORT, SMTP_USER, SMTP_PASS, 15);
    $mailSuccess = $mailer->send(
        MAIL_TO,
        MAIL_FROM,
        MAIL_FROM_NAME,
        $email ?: MAIL_FROM,
        $subject,
        $htmlBody,
        $textBody
    );
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    // Fallback to PHP native mail()
    $headers = "From: " . MAIL_FROM_NAME . " <" . MAIL_FROM . ">\r\n";
    if (!empty($email)) $headers .= "Reply-To: $email\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $mailSuccess = @mail(MAIL_TO, $subject, $htmlBody, $headers);
}

// 6. Handle Response
$isAjax = (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest')
    || (isset($_POST['is_ajax']) && $_POST['is_ajax'] === '1')
    || (strpos($_SERVER['HTTP_ACCEPT'] ?? '', 'application/json') !== false);

if ($isAjax) {
    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode([
        'success'  => $mailSuccess,
        'redirect' => $redirectUrl,
        'message'  => 'Your details have been dispatched to our operations team. We will contact you within 15 minutes.',
        'error'    => $mailSuccess ? null : $errorMessage
    ]);
    exit;
} else {
    header("Location: " . $redirectUrl, true, 302);
    exit;
}
