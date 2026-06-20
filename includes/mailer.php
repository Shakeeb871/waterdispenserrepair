<?php
/**
 * mailer.php
 * Validates and processes the contact form submission.
 * Include this at the very top of contact.php (before any output).
 *
 * Exposes:
 *   $formErrors  (array)  field => message
 *   $formStatus  (string) '' | 'success' | 'error'
 *   $old         (array)  previously submitted values (to repopulate fields)
 */

$config     = require __DIR__ . '/config.php';
$formErrors = [];
$formStatus = '';
$old        = [
    'name'    => '',
    'email'   => '',
    'phone'   => '',
    'area'    => '',
    'service' => '',
    'message' => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // --- Honeypot: hidden field that real users never fill ---
    if (!empty($_POST['website'])) {
        // Silently treat as success to waste the bot's time.
        $formStatus = 'success';
    } else {

        // --- Collect & sanitize ---
        $name    = trim($_POST['name'] ?? '');
        $email   = trim($_POST['email'] ?? '');
        $phone   = trim($_POST['phone'] ?? '');
        $area    = trim($_POST['area'] ?? '');
        $service = trim($_POST['service'] ?? '');
        $message = trim($_POST['message'] ?? '');

        $old = compact('name', 'email', 'phone', 'area', 'service', 'message');

        // --- Validate ---
        if ($name === '') {
            $formErrors['name'] = 'Please enter your name.';
        }
        if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $formErrors['email'] = 'Please enter a valid email address.';
        }
        if ($phone === '' || !preg_match('/^[+\d][\d\s\-()]{6,}$/', $phone)) {
            $formErrors['phone'] = 'Please enter a valid phone number.';
        }
        if ($message === '') {
            $formErrors['message'] = 'Please tell us about the issue.';
        }

        // --- Send ---
        if (empty($formErrors)) {
            $to      = $config['email_to'];
            $subject = 'New Repair Request — ' . $config['business_name'];

            $body  = "You received a new enquiry from the website:\n\n";
            $body .= "Name:    $name\n";
            $body .= "Email:   $email\n";
            $body .= "Phone:   $phone\n";
            $body .= "Area:    " . ($area ?: '—') . "\n";
            $body .= "Service: " . ($service ?: '—') . "\n";
            $body .= "Message:\n$message\n\n";
            $body .= "—\nSent " . date('Y-m-d H:i') . " from " . ($config['site_url'] ?? '') . "\n";

            // Sanitize header values to prevent header injection.
            $safeName  = preg_replace('/[\r\n]+/', ' ', $name);
            $safeEmail = preg_replace('/[\r\n]+/', '', $email);

            $headers  = "From: " . $config['business_name'] . " <no-reply@" . preg_replace('#^https?://(www\.)?#', '', rtrim($config['site_url'] ?? 'localhost', '/')) . ">\r\n";
            $headers .= "Reply-To: $safeName <$safeEmail>\r\n";
            $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion();

            $sent = @mail($to, $subject, $body, $headers);

            $formStatus = $sent ? 'success' : 'error';

            // On success, clear the fields.
            if ($sent) {
                $old = array_fill_keys(array_keys($old), '');
            }
        } else {
            $formStatus = 'error';
        }
    }
}

/** Helper for safe output in the form. */
function e($v) {
    return htmlspecialchars($v ?? '', ENT_QUOTES, 'UTF-8');
}
