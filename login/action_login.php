<?php
//untuk memasukkan file koneksi
include "../lib/koneksi.php";

// menangkap variabel post dr form login / index.php
$username = $_POST ['username'];
$pass = $_POST ['password'];

// pastikan password berupa huruf atau angka
if (!ctype_alnum ($username) OR !ctype_alnum($pass)) {
	echo "<center> LOGIN GAGAL !<br>
		 Username atau Password anda tidak benar.<br>
		 Atau akun anda sedang diblokir.<br>";
	echo "<a href=login/index.php><b>ULANGI LAGI</b></a></center>";
} else {
	$login = mysqli_query ($host, "SELECT * FROM pelanggan WHERE username='$username' AND password='$pass'");
	$ketemu = mysqli_num_rows($login);
	$r = mysqli_fetch_array($login, MYSQLI_BOTH);
	
	//apabila username dan password ditemukan
	if ($ketemu > 0){
		session_start();
		
		$_SESSION['username'] = $r['username'];
		$_SESSION['id'] = $r['id_admin'];
        
		header('location:../index.php');
		
		//echo $_SESSION['pass'];
	} else {
		echo "<center> LOGIN GAGAL !<br>
		 Username atau Password anda tidak benar.<br>
		 Atau akun anda sedang diblokir.<br>";
		echo "<a href=index.php><b>ULANGI LAGI</b></a></center>";
	}
}
?>