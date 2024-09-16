<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Autoload PHPMailer menggunakan Composer

// Masukkan database connection file
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $token = bin2hex(random_bytes(50));

    // Check jika email ada di tb_admin_login
    $query = $connect->prepare("SELECT * FROM tb_admin_login WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        // Masukkan reset token kedalam password_resets
        $query = $connect->prepare("INSERT INTO password_resets (email, token) VALUES (?, ?)");
        $query->bind_param("ss", $email, $token);
        $query->execute();

        // Kirim reset link ke user menggunakan PHPMailer
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Setting SMTP server untuk mengirim
            $mail->SMTPAuth = true;
            $mail->Username = 'iotprojectprogramming@gmail.com'; // SMTP username
            $mail->Password = 'xmizuwrdycvpspee'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Pengirim
            $mail->setFrom('iotprojectprogramming@gmail.com', 'Smart Parking Unika');
            $mail->addAddress($email);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';
            $mail->Body = "Klik link di samping untuk dapat reset password: <a href='http://localhost/parking/reset_password.php?token=$token'>Reset Password</a>";

            $mail->send();
            header('Location: ../success_send_link_forgot_password.php');
        } catch (Exception $e) {
            echo "Failed to send reset link. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo 'Email not found.';
    }
}
?>
