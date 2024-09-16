<?php
// Include your database connection file
include '../connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'];
    $password = md5($_POST['password']);

    // Get the email associated with the reset token
    $query = $connect->prepare("SELECT email FROM password_resets WHERE token = ?");
    $query->bind_param("s", $token);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $email = $row['email'];

        // Update the user's password in the users table
        $query = $connect->prepare("UPDATE tb_admin_login SET password = ? WHERE email = ?");
        $query->bind_param("ss", $password, $email);
        $query->execute();

        // Delete the reset token
        $query = $connect->prepare("DELETE FROM password_resets WHERE token = ?");
        $query->bind_param("s", $token);
        $query->execute();

        echo "Your password has been updated.";
    } else {
        echo "Invalid token.";
    }
}
?>
