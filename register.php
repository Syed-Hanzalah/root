<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once "db.php";
require_once "sendMail.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];

    // 1️⃣ Check if email exists
    $stmt = $conn->prepare("SELECT idk FROM visum_kunden WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "❌ Email already registered!";
        exit;
    }

    // 2️⃣ Generate token
    $token = bin2hex(random_bytes(50));

    // 3️⃣ Generate idk manually
    $result2 = $conn->query("SELECT MAX(idk) AS max_id FROM visum_kunden");
    $row2 = $result2->fetch_assoc();
    $new_idk = $row2['max_id'] + 1;

    // 4️⃣ Insert user WITH idk
    $stmt = $conn->prepare("INSERT INTO visum_kunden (idk, nam1, email, token) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $new_idk, $name, $email, $token);
    $stmt->execute();

    // 5️⃣ Send email
    $link = "http://localhost/root/verify.php?token=$token";

    $body = "
    <h3>Email Verification</h3>
    <p>Click below to verify your account:</p>
    <a href='$link'>Verify Account</a>
    ";

    sendMail($email, "Verify Account", $body);

    echo "✅ Check your email to verify!";
}
?>