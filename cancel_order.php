<?php
// untuk memasukkan file config.php dan file koneksi.php
    include "lib/koneksi.php";
    session_start();
    $id_transaksi = $_GET['id_transaksi'];
// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar layanan

        //cek data terakhir pemesanan
        $kueripesanan = mysqli_query($host, "SELECT * from detail_transaksi WHERE id_transaksi = '$id_transaksi' ");
        while($val=mysqli_fetch_array($kueripesanan, MYSQLI_ASSOC)){
            
            $kueriproduk = mysqli_query($host, "SELECT * from produk WHERE id_produk = '$val[id_produk]' ");
            $val2 = mysqli_fetch_array($kueriproduk, MYSQLI_ASSOC);
            
            $kueriproduk2 = mysqli_query($host, "SELECT * from detail_transaksi WHERE id_transaksi = '$id_transaksi' AND id_produk = '$val[id_produk]' ");
            $val3 = mysqli_fetch_array($kueriproduk2, MYSQLI_ASSOC);
            
            $stok_baru = $val2['stok']+$val3['qty'];
            $queryUpdateStok = mysqli_query($host, "UPDATE produk SET stok='$stok_baru' WHERE id_produk = '$val[id_produk]' ");
            $queryDeleteData = mysqli_query($host, "DELETE FROM detail_transaksi WHERE id_transaksi = '$id_transaksi' AND id_produk = '$val[id_produk]'");
        }
        $queryDeleteData2 = mysqli_query($host, "DELETE FROM transaksi WHERE id_transaksi = '$id_transaksi'");
        
        echo "<script> alert('Berhasil Cancel, Silahkan Berbelanja Lagi'); window.location = 'index.php';</script>";
// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah layanan
