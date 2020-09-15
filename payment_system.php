<?php
// untuk memasukkan file config.php dan file koneksi.php
    include "lib/koneksi.php";
    session_start();
// untuk menangkap variabel yang dikirim form
    $nama_penerima = $_POST['namaPenerima'];
    $alamat = $_POST['alamat'];
    $deskripsi = $_POST['deskripsi'];
    $tgl_kirim = $_POST['tgl_kirim'];
    $ongkir = $_POST['ongkir'];
    $id_pelanggan = $_SESSION['id'];
    $tgl_pesan = date("Y-m-d");
// query untuk menyimpan ke tabel
    $querySimpan = mysqli_query($host, "INSERT INTO transaksi (alamat, deskripsi, id_pelanggan,nama_penerima,status,tgl_kirim,tgl_pesan,ongkir) VALUES ('$alamat', '$deskripsi', '$id_pelanggan','$nama_penerima','pending','$tgl_kirim','$tgl_pesan','$ongkir')");
    
// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar layanan
    if ($querySimpan) {
        //cek data terakhir pemesanan
        $kueripesanan = mysqli_query($host, "SELECT id_transaksi from transaksi ORDER BY id_transaksi DESC LIMIT 1 ");
        $val2 = mysqli_fetch_array($kueripesanan, MYSQLI_ASSOC);
        foreach($_SESSION["cart"] as $key => $item){
            //cek informasi barang satu persatu
            $kueriproduk = mysqli_query($host, "SELECT * from produk WHERE id_produk = '$item[id_produk]' ");
            $val = mysqli_fetch_array($kueriproduk, MYSQLI_ASSOC);
            $querySimpanBarang = mysqli_query($host, "INSERT INTO detail_transaksi (id_transaksi, id_produk, harga_produk,qty) VALUES ('$val2[id_transaksi]', '$item[id_produk]', '$val[harga_produk]','$item[jumlah_produk]')");
        }
        $_SESSION['cart']=array();
        echo "<script> alert('Berhasil Memesan, Silahkan Melakukan Pembayaran'); window.location = 'index.php';</script>";
// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah layanan
    } else {
        echo "<script> alert('Gagal Memesan, silahkan ulangi lagi'); window.location = 'checkout.php';</script>";
    }
