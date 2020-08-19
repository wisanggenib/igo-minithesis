<?php
    include "lib/koneksi.php";
    $id_transaksi = $_POST['id_transaksi'];
    $nameFile=$_FILES['bukti_bayar']['name'];
    $file=$_FILES['bukti_bayar']['tmp_name'];
    $tgl_bayar = date("Y-m-d");
    move_uploaded_file($file,"images/bukti/$nameFile");  

    // query untuk menyimpan ke tabel
    $querySimpan = mysqli_query($host, "INSERT INTO bayar (id_transaksi, bukti_bayar, tgl_bayar) VALUES ('$id_transaksi', '$nameFile', '$tgl_bayar')");
    $queryUpdate = mysqli_query($host,"UPDATE transaksi SET status = 'waiting' WHERE id_transaksi = '$id_transaksi' ");
// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar layanan
    if ($querySimpan) {
        echo "<script> alert('Data Produk Berhasil Masuk'); window.location = 'dashboard.php';</script>";
// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah layanan
    } else {
        echo "<script> alert('Data Produk Gagal Dimasukan'); window.location = 'detail_transaksi.php?id_transaksi=".$id_transaksi."';</script>";
    }
?>