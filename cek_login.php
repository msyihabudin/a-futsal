<?php
// pemanggilan file koneksi
include "koneksi.php";
koneksi();

$tabel = "member2";

// pembuatan variable pada penginputan username dan password
$user = $_POST['username'];
$pass = $_POST['password'];

// cek username dan password di database
$login = mysql_query("select * from $tabel where username='$user' and password='$pass'");
$ketemu = mysql_num_rows($login);
$r = mysql_fetch_array($login);

if ($ketemu > 0) {
	session_start ();

		$_SESSION[idm]          = $r[id_member];
		$_SESSION[nm_lengkap] 	= $r[namalengkap];
		$_SESSION[namauser] 	= $r[username];
		$_SESSION[passuser] 	= $r[password];
		$_SESSION[bsi] 			= $r[keyword];

		header('location:home');
	} else {
	echo "<script>alert('Login gagal !');</script>";
   	echo "<script>history.go(-1);</script>";
}
?>