<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['passwort'];

    $stmt = $conn->prepare("SELECT idk, passwort, token FROM visum_kunden WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {

        // ❌ Not verified
        if ($row['token'] !== NULL) {
            echo "❌ Please verify your email first!";
            exit;
        }

        // ✅ Check password
        if (password_verify($password, $row['passwort'])) {

            $_SESSION['idang'] = $row['idk'];

            echo "✅ Login successful!";
            header("Location: profile.php");

        } else {
            echo "❌ Wrong password!";
        }

    } else {
        echo "❌ Email not found!";
    }
}
?>