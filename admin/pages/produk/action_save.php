<?php
// untuk memasukkan file config.php dan file koneksi.php
    include "../../../lib/koneksi.php";
// memindahkan file ke dalam folder images/produk
    $nameFile=$_FILES['gambar']['name'];
    $file=$_FILES['gambar']['tmp_name'];
    move_uploaded_file($file,"../../../images/produk/$nameFile");    
// untuk menangkap variabel yang dikirim form
    $nama_produk = $_POST['namaProduk'];
    $harga_produk = $_POST['hargaProduk'];
    $deskripsi_produk = $_POST['deskripsiProduk'];
    $stok = $_POST['stokAwal'];
// query untuk menyimpan ke tabel
    $querySimpan = mysqli_query($host, "INSERT INTO produk (nama_produk, gambar, harga_produk,deskripsi_produk,stok) VALUES ('$nama_produk', '$nameFile', '$harga_produk','$deskripsi_produk','$stok')");
// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar layanan
    if ($querySimpan) {
        echo "<script> alert('Data Produk Berhasil Masuk'); window.location = '../../produk.php';</script>";
// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah layanan
    } else {
        echo "<script> alert('Data Produk Gagal Dimasukan'); window.location = '../../produk.php';</script>";
    }
?>