<?php
include "../../../lib/koneksi.php";
$id_transaksi = $_GET['id_transaksi'];
$jumlah = 0;
$kueriproduk = mysqli_query($host, "UPDATE transaksi SET status='reupload' WHERE id_transaksi=$id_transaksi");
$kueritolak = mysqli_query($host, "DELETE FROM bayar WHERE id_transaksi=$id_transaksi");
// jika query berhasil maka akan tampil alert dan halaman akan kembali ke daftar layanan
if ($kueriproduk) {
    echo "<script> alert('Berhasil Menolak'); window.location = '../../pesanan.php';</script>";
// jika query gagal, akan tampil alert dan halaman akan diarahkan ke form tambah layanan
} else {
    echo "<script> alert('Gagal'); window.location = '../../pesanan.php';</script>";
}
?>