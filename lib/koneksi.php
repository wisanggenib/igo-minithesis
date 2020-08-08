<?php
// isi nama host, username mysql, dan password mysql anda
$host = mysqli_connect("localhost","root","") or die ("Koneksi Gagal");
$database = mysqli_select_db($host, "db_sunsunye") or die ("Database tidak bisa dibuka");
$koneksi = new mysqli('localhost', 'root', '', 'db_sunsunye');
?>
