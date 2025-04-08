<?php
require 'config.php'; // Database connection
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Load PHPMailer

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Check if email exists
    $stmt = $pdo->prepare("SELECT * FROM tb_users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if (!$user) {
        echo json_encode(["message" => "If the email exists, a reset link will be sent."]);
        exit;
    }

    // Generate token
    $token = bin2hex(random_bytes(50));
    $expires_at = date('Y-m-d H:i:s', strtotime('+1 hour'));

    // Delete existing reset request
    $stmt = $pdo->prepare("DELETE FROM password_resets WHERE email = ?");
    $stmt->execute([$email]);

    // Insert new reset token
    $stmt = $pdo->prepare("INSERT INTO password_resets (email, token, expires_at) VALUES (?, ?, ?)");
    $stmt->execute([$email, $token, $expires_at]);

    // Create reset link
    $reset_link = "http://localhost/LOGIN/reset-password.php?token=$token";

    // Send email using PHPMailer
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Use your email provider's SMTP host
        $mail->SMTPAuth = true;
        $mail->Username = 'emiliomurithi4@gmail.com'; // Change to your email
        $mail->Password = 'izyz zxqw zvri uuad';   // Use an App Password, NOT your main password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email settings
        $mail->setFrom('emiliomurithi4@gmail.com', 'Travel.com');
        $mail->addAddress($email);
        $mail->Subject = "Password Reset Request";
        $mail->Body = "Click the link to reset your password: $reset_link";

        $mail->send();
        echo json_encode(["message" => "If the email exists, a reset link will be sent."]);
    } catch (Exception $e) {
        echo json_encode(["message" => "Mailer Error: " . $mail->ErrorInfo]);
    }
}
?>
