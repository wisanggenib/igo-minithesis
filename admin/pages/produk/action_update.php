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
    $id_produk = $_POST['idProduk'];
// jika gambar kosong
if(empty($nameFile)){
    // query untuk menyimpan ke tabel
    $querySimpan = mysqli_query($host, "UPDATE produk SET nama_produk = '$nama_produk',harga_produk = '$harga_produk',deskripsi_produk = '$deskripsi_produk' WHERE id_produk = $id_produk ");
// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar layanan
    if ($querySimpan) {
        echo "<script> alert('Data Produk Berhasil Masuk'); window.location = '../../produk.php';</script>";
// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah layanan
    } else {
        echo "<script> alert('Data Produk Gagal Dimasukan'); window.location = '../../produk.php';</script>";
    }
}else{
    // query untuk menyimpan ke tabel
    $querySimpan = mysqli_query($host, "UPDATE produk SET nama_produk = '$nama_produk',harga_produk = '$harga_produk',deskripsi_produk = '$deskripsi_produk', gambar = '$nameFile' WHERE id_produk = $id_produk ");
// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar layanan
    if ($querySimpan) {
        echo "<script> alert('Data Produk Berhasil Update'); window.location = '../../produk.php';</script>";
// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah layanan
    } else {
        echo "<script> alert('Data Produk Gagal Dimasukan'); window.location = '../../produk.php';</script>";
    }
}
?>