
<?php
require_once "db.php";
require_once "sendMail.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];

    // Check if email exists
    $stmt = $conn->prepare("SELECT idk FROM visum_kunden WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "❌ Email already registered!";
        exit;
    }

    // Generate token
    $token = bin2hex(random_bytes(50));

    // Insert user
    $stmt = $conn->prepare("INSERT INTO visum_kunden (nam1, email, token) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $token);
    $stmt->execute();

    // Verification link
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