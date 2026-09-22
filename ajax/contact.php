<?php
/**
 * AJAX Contact Form Submission Handler
 * Mohit Rathod Portfolio
 */

header('Content-Type: application/json; charset=utf-8');

// Ensure request method is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'status' => 'error',
        'message' => 'Method Not Allowed. Only POST requests are permitted.'
    ]);
    exit;
}

// Honeypot anti-spam check (if bot fills in 'website', drop silently)
if (!empty($_POST['website'])) {
    echo json_encode([
        'status' => 'success',
        'message' => 'Thank you! Your message has been received.'
    ]);
    exit;
}

// Capture and sanitize input
$name    = isset($_POST['name']) ? trim(strip_tags($_POST['name'])) : '';
$email   = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) : '';
$subject = isset($_POST['subject']) ? trim(strip_tags($_POST['subject'])) : 'Portfolio Contact Inquiry';
$message = isset($_POST['message']) ? trim(strip_tags($_POST['message'])) : '';

$errors = [];

if (empty($name) || strlen($name) < 2) {
    $errors[] = 'Please provide your full name (at least 2 characters).';
}

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Please provide a valid email address.';
}

if (empty($message) || strlen($message) < 10) {
    $errors[] = 'Please write a message with at least 10 characters.';
}

if (!empty($errors)) {
    http_response_code(422);
    echo json_encode([
        'status' => 'error',
        'message' => implode(' ', $errors),
        'errors' => $errors
    ]);
    exit;
}

// Store message securely in local storage folder for logging
$logDir = __DIR__ . '/../data';
if (!is_dir($logDir)) {
    @mkdir($logDir, 0755, true);
}

$submission = [
    'timestamp' => date('Y-m-d H:i:s'),
    'name'      => $name,
    'email'     => $email,
    'subject'   => $subject,
    'message'   => $message,
    'ip'        => $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1',
    'agent'     => $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown'
];

$logFile = $logDir . '/messages.json';
$existing = [];
if (file_exists($logFile)) {
    $existing = json_decode(file_get_contents($logFile), true) ?: [];
}
$existing[] = $submission;
@file_put_contents($logFile, json_encode($existing, JSON_PRETTY_PRINT));

// Return success response
echo json_encode([
    'status'  => 'success',
    'message' => 'Thank you, ' . htmlspecialchars($name) . '! Your message was sent successfully. Mohit will get back to you shortly.',
    'data'    => [
        'name' => $name,
        'email' => $email,
        'time' => date('h:i A, M j, Y')
    ]
]);
exit;
