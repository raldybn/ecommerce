<?php
include 'conn.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raldy Belo</title>
    <style>
        .card{
            max-width: 180px;
            border: solid 1px #ccc;
            margin: 16px;
            padding: 12px;
            font-size: 12px;
            text-align: center;
            border-radius: 10px;
            background-color: #eef;
        }

        .card button {
            width: 100%;
            margin-top: 15px;
        }

        .gambar {
            max-height: 150px;
            max-width: 150px;
            border-radius: 10px;
            margin: 12px 0;
            box-shadow: 0 0 5px grey;
        }

        input {
            width: 100%;
            display: block;
            margin: 15px 0;
        }

    </style>
</head>
<body>
 <h1>Toko Online</h1>   
 
 <header>
    <p>Raldy Store</p>
 </header>
 <?php include 'tampil_barang.php'; ?>

</body>
</html>