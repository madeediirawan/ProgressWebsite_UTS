<?php

//koneksi ke DB
$conn = mysqli_connect("localhost", "root", "", "db_bangunan");
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah ($data) {
    global $conn;
    $nama_barang = htmlspecialchars($data["nama_barang"]);
    $harga = htmlspecialchars($data["harga"]);
    $jumlah = htmlspecialchars($data["jumlah"]);

    //upload gambar
    $gambar = upload ();
    if( !$gambar){
        return false;
    }

        $query = "INSERT INTO barang
        VALUES 
        ('','$nama_barang','$harga','$jumlah','$gambar');
     ";
     mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function upload(){

    $namaFile = $_FILES['gambar']["name"];
    $ukuranFile = $_FILES['gambar']["size"];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']["tmp_name"];

// cek apakah tidak ada gambar yang diupload
    if( $error === 4) {
        echo "<script>
            alert('pilih gambar terlebih dahulu');
        </script>";
        return false;
    }

// cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ){

        echo "<script>
            alert('yang anda upload bukan gambar')
            </script>";
            return false;
    }
    if($ukuranFile > 1000000 ){
        echo "<script>
            alert('ukuran gambar terlalu besar!')
            </script>";
            return false;
    }
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .=$ekstensiGambar;

move_uploaded_file($tmpName, 'assets/' . $namaFileBaru);

return $namaFileBaru;


}

function hapus ($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM barang WHERE id=$id");
    return mysqli_affected_rows($conn);
}



function ubah($data) {
    global $conn;

    $id  = $data["id"];
    $nama_barang = htmlspecialchars($data["nama_barang"]);
    $harga = htmlspecialchars($data["harga"]);
    $jumlah = htmlspecialchars($data["jumlah"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    if($_FILES['gambar']['error'] === 4){
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
    

        $query = "UPDATE barang SET
                    nama_barang = '$nama_barang', 
                    harga = '$harga', 
                    jumlah = '$jumlah',
                    gambar = '$gambar'
                WHERE id = $id
            ";
     mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    $query ="SELECT * FROM barang
                WHERE
            nama_barang LIKE '%$keyword%' OR
            harga LIKE '%$keyword%' OR
            jumlah LIKE '%$keyword%' 
        ";
return query($query);

}


function registrasi($data){
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE
    username = '$username'");
    if(mysqli_fetch_assoc($result) ) {
        echo "<script>
            alert('username sudah terdaftar!')
        </script>";
        return false;
    }


    if($password !== $password2){
        echo "<script>
        alert('konfirmasi passsword tidak sesuai!');
        </script>";

    return false;
    }
    //enkripsi password
    $password =password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO user VALUE ('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}
