<?php
require_once __DIR__ . '/../db.php';

// Fetch profile data
function getProfile($idk) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM visum_kunden WHERE idk = ?");
    $stmt->bind_param("i", $idk);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

// Update profile data
function updateProfile($idk,$data){
    global $conn;

    $sql = "UPDATE visum_kunden SET
    nam1='{$data['fname']}',
    nam2='{$data['lname']}',
    email='{$data['mail']}',
    tel='{$data['phone']}',
    strasse='{$data['strabe']}',
    hausnummer='{$data['haus']}',
    ort='{$data['stadt']}',
    plz='{$data['post']}',
    staats='{$data['nayion']}',
    land='{$data['land']}'
    WHERE idk='$idk'";

    return $conn->query($sql);
}


// // Update password
// function updatePassword($user_id, $new_pass) {
//     global $conn;
//     $hash = password_hash($new_pass, PASSWORD_DEFAULT);
//     $stmt = $conn->prepare("UPDATE visum_kunden SET passwort = ? WHERE idk = ?");
//     $stmt->bind_param("ss", $hash, $user_id);
//     return $stmt->execute();
// }
?>