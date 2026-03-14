<?php 
session_start();
require_once "includes/functions.php";
$idk = $_SESSION['idang'];
if(isset($_FILES['profilePic']) && $_FILES['profilePic']['error'] === 0) {
    $fileName = $_FILES['profilePic']['name'];
    $fileTmp = $_FILES['profilePic']['tmp_name'];
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowed = ['jpg','jpeg','png','gif'];

    if(in_array(strtolower($ext), $allowed)) {
        $uploadDir = __DIR__ . '/uploads/';
        $newName = 'profile_'.$idk.'_'.time().'.'.$ext;

        // Delete old image if exists
        if(!empty($profile['picture']) && file_exists($uploadDir . $profile['picture'])){
            unlink($uploadDir . $profile['picture']);
        }

        // Move new file
        if(move_uploaded_file($fileTmp, $uploadDir . $newName)) {
            // Update in database
            $stmt = $conn->prepare("UPDATE visum_kunden SET picture = ? WHERE idk = ?");
            $stmt->bind_param("si", $newName, $idk);
            $stmt->execute();

            header('location:profile.php');
        } else {
            header('location:profile.php?success=0&message=Cannot upload image.');
        }
    } else {
        header('location:profile.php?success=0&message=Only jpeg, jpg, gif and png files.');
    }
}

if (isset($_POST['save_profile'])) {


    if (updateProfile($idk, $_POST)) {
        header('location:profile.php?success=1&message=Profil erfolgreich aktualisiert!');
    }else{
        header('location:profile.php?success=0&message=An error occurred!');
    }
}