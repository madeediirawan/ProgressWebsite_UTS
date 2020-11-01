<?php
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'function.php';
$barang = query("SELECT * FROM barang");

if(isset($_POST["cari"]) ){
    $barang = cari($_POST["keyword"]);
}


?>
<html>

<head>
    <title>HALAMAN ADMIN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background-image: url('assets/bgedi.webp')";>
<a href="logout.php">=>Logout</a>
<table border="1" cellpadding="2" cellspacing="0">
    <tr>
        <td>
            <h1>ADMIN</h1>
            <hr>
            <a href="tambah.php">Tambah Barang</a>
                <hr>
            <a href="registrasi.php">Tambah User</a>
        </td>
    </tr>
    <hr>
</table>
    <h1>DAFTAR BARANG</h1>
<form  action="" method="post">

    <input type="text" name="keyword" size="35" 
    placeholder="masukkan pencarian..." autocomplete="off">
    <button type="submit" name="cari">cari!</button>
</form>
<br>
    <table border="10" cellpadding="25" cellspacing="5">
        <tr>
            <th>NO.</th>
            <th>aksi</th>
            <th>gambar</th>
            <th>nama_barang</th>
            <th>harga</th>
            <th>jumlah</th>

        </tr>
        <?php $i = 1;?> 
         <?php foreach ($barang as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a>
                    <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="
                    return confirm('yakin?');">Hapus</a>
                </td>
                <td><img src="assets/<?= $row["gambar"]; ?>" width="100"></td>
                <td><?= $row["nama_barang"] ?></td>
                <td><?= $row["harga"] ?></td>
                <td><?= $row["jumlah"] ?></td>
            </tr>
        
            <?php $i++; ?>
         <?php endforeach; ?>
        
    </table>

</body>

</html>