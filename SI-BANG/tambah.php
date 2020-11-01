<?php
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}
require 'function.php';
if (isset($_POST["submit"])) {

    if(tambah($_POST) > 0){
        echo "
            <script>
                alert('data berhasi ditambahkan!');
                document.location.href = 'index.php';
            </script>
                ";
    } else {
        echo "         
        <script>
        alert('data gagal ditambahkan!');
        document.location.href = 'index.php';
        </script>";
    }
}
?>

<html>

<head>
    <title>TAMBAH BARANG</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="background-image: url('assets/bgedi.webp')";>
    <h1 align = "center">Tambah Data Barang</h1>
    <hr>
    <div class="col-md-offset-4 col-md-4 ">
    <form action="" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="nama_barang"> nama_barang :</label>
                <input type="text" name="nama_barang" id="nama_barang">
            </div>
            
            <div class="form-group">
                <label for="harga"> harga :</label>
                <input type="text" name="harga" id="harga">
            </div>
            
            <div class="form-group">
                <label for="jumlah"> jumlah :</label>
                <input type="text" name="jumlah" id="jumlah">
            </div>
            
            <div class="form-group">
                <label for="gambar"> gambar :</label>
                <input type="file" name="gambar" id="gambar">
            </div>
            
            <div class="form-group">
                <button type="submit" name="submit">TAMBAH DATA</button>
            </div>

        
    </form>
</div>
</body>

</html>