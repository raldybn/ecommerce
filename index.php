<?php
session_start();
$username = $_SESSION['username'] ?? '';

if($username) {
    // echo "username yang sedang login adalah $username"; 
    $btn_login = "<a href='logout.php'
    onclick='return confirm(\"Apakah anda ingin benar-benar keluar?\")'>LOGOUT</a>";
} else {
    // echo "anda belum login";
    $btn_login = "<a href='login.php'>LOGIN</a>";
}



include 'conn.php';


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raldy Belo</title>
    <?php include 'style.php' ?>
</head>
<body>
 <h1>Toko Online</h1>   
 
 <header>
    <p>Raldy Store| <?= $btn_login?> </p> 
 </header>
 <?php include 'tampil_barang.php'; ?>
</body>
</html>