<?php

require 'function.php';

$id = $_GET["id"];

$brg = query("SELECT * FROM barang WHERE id = $id")[0];

if (isset($_POST["submit"])) {

    if(ubah($_POST) > 0){
        echo "
            <script>
                alert('data berhasi diubah!');
                document.location.href = 'index.php';
            </script>
                ";
    } else {
        echo "         
        <script>
        alert('data gagal diubah!');
        document.location.href = 'index.php';
        </script>";
    }
}
?>

<html>
<head>
    <title>MERUBAH DATA BARANG</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="background-image: url('assets/bgedi.webp')";>
    <h1 align="center">Merubah Data Barang</h1>
    <hr>
    <div class="col-md-offset-4 col-md-4 ">
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $brg["id"]; ?>">
        <input type="hidden" name="gambarLama" value="<?= $brg["gambar"]; ?>">
        
            <div class="form-group">
                <label for="nama_barang"> nama_barang :</label>
                <input type="text" name="nama_barang" id="nama_barang" required
                value="<?= $brg["nama_barang"];?>">
            </div>
            <div class="form-group">
                <label for="harga"> harga :</label>
                <input type="text" name="harga" id="harga"
                value="<?= $brg["harga"];?>">
            </div>
            <div class="form-group">
                <label for="jumlah"> jumlah :</label>
                <input type="text" name="jumlah" id="jumlah"
                value="<?= $brg["jumlah"];?>">
            
            </div>
            <div class="form-group">
                <label for="gambar"> gambar :</label> 
                <img src="assets/<?= $brg['gambar'];?>" width="100"> <br>
                <input type="file" name="gambar" id="gambar">
            </div>
            <div class="form-group">
                <button type="submit" name="submit">UBAH DATA</button>
            </div>

    </form>
</div>
</body>

</html>