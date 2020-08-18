<?php
// untuk memasukkan file config.php dan file koneksi.php
    include "../lib/koneksi.php";
// untuk menangkap variabel yang dikirim form
    $nama_pelanggan = $_POST['namaPelanggan'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $alamat = $_POST['alamat'];
// query untuk menyimpan ke tabel
    $querySimpan = mysqli_query($host, "INSERT INTO pelanggan (nama_pelanggan, username, password,alamat) VALUES ('$nama_pelanggan', '$username', '$password','$alamat')");
// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar layanan
    if ($querySimpan) {
        echo "<script> alert('Berhasil Mendaftar, Silahkan Login'); window.location = 'index.php';</script>";
// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah layanan
    } else {
        echo "<script> alert('Gagal mendaftar, silahkan ulangi lagi'); window.location = 'register.php';</script>";
    }
?>