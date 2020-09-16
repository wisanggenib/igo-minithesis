<?php
// untuk memasukkan file config.php dan file koneksi.php
    include "../../../lib/koneksi.php";
    $stokbaru = $_POST['stok_produk'];
    $id_produk = $_POST['idProduk'];
    $kueriproduk = mysqli_query($host, "SELECT stok from produk WHERE id_produk = '$id_produk' ");
    $val = mysqli_fetch_array($kueriproduk, MYSQLI_ASSOC);
    $total_stok = $stokbaru + $val['stok'];
// jika gambar kosong

    // query untuk menyimpan ke tabel
    $querySimpan = mysqli_query($host, "UPDATE produk SET stok = '$total_stok' WHERE id_produk = $id_produk ");
// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar layanan
    if ($querySimpan) {
        echo "<script> alert('Data Produk Berhasil Masuk'); window.location = '../../produk.php';</script>";
// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah layanan
    } else {
        echo "<script> alert('Data Produk Gagal Dimasukan'); window.location = '../../produk.php';</script>";
    }
