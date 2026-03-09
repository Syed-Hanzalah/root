<?php
session_start();

if(isset($_POST['columns'])){
$_SESSION['visibleColumns'] = $_POST['columns'];
}

header("Location: main.php");
exit;