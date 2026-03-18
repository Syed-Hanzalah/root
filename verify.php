<?php
require_once "db.php";
require_once "sendMail.php";

if (isset($_GET['token'])) {

    $token = $_GET['token'];

    $stmt = $conn->prepare("SELECT idk, email FROM visum_kunden WHERE token=?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {

        $userId = $row['idk'];
        $email = $row['email'];

        // Generate temporary password
        $tempPassword = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz123456789"), 0, 8);
        $hashedPassword = password_hash($tempPassword, PASSWORD_DEFAULT);

        // IMPORTANT: remove token (this means VERIFIED)
        $stmt = $conn->prepare("UPDATE visum_kunden 
                                SET passwort=?, token=NULL 
                                WHERE idk=?");
        $stmt->bind_param("si", $hashedPassword, $userId);
        $stmt->execute();

        // Send password email
        $body = "
        <h3>Your Login Password</h3>
        <p>Your temporary password is:</p>
        <h2>$tempPassword</h2>
        <p>You can now login.</p>
        ";

        sendMail($email, "Your Password", $body);

        echo "✅ Verified! Check your email for password.";

    } else {
        echo "❌ Invalid or expired link!";
    }
}
?>