<?php
include_once("koneksi.php");
koneksi();

$ids = $_GET['id'];

function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}
		
if (isset($_POST['daftar'])) {
  $polaemail = "^.+@.+\.((com)|(net)|(org)|(co.id)|(ac.id))$";
  $idm = $_POST['id_member'];		
  $nm_lengkap = $_POST['nm_lengkap'];
  $username = anti_injection($_POST['username']);
  $password = anti_injection($_POST['password']);
  $r_password = anti_injection($_POST['r_password']);
  $email = $_POST['email'];
  $no_hp = $_POST['no_hp'];
  $alamat = $_POST['alamat'];
  $no_ktp = $_POST['no_ktp'];
		
  //cek agar username tidak sama dengan username lain
  $cari = mysql_num_rows(mysql_query("SELECT username FROM member2 WHERE username LIKE '$username'"));
		
  //validasi
  if (empty($nm_lengkap)) {
	echo "<script>alert('Nama lengkap tidak boleh kosong !');</script>";
	echo "<script>history.go(-1);</script>";
  } elseif (empty($username)) {
	echo "<script>alert('Nama user tidak boleh kosong !');</script>";
	echo "<script>history.go(-1);</script>";
  } elseif ($cari > 0) {
	echo "<script>alert('Nama user tidak tersedia !');</script>";
	echo "<script>history.go(-1);</script>";
  } elseif (empty($password)) {
	echo "<script>alert('Kata sandi tidak boleh kosong !');</script>";
	echo "<script>history.go(-1);</script>";
  } elseif ($password != $r_password) {
	echo "<script>alert('Ulang kata sandi tidak sama !');</script>";
	echo "<script>history.go(-1);</script>";
  } elseif (empty($email)) {
	echo "<script>alert('Email tidak boleh kosong !');</script>";
	echo "<script>history.go(-1);</script>";
  } elseif (!eregi($polaemail,$email)) {
	echo "<script>alert('Format email salah !');</script>";
	echo "<script>history.go(-1);</script>";
  } elseif (empty($no_hp)) {
	echo "<script>alert('No Hp tidak boleh kosong !');</script>";
	echo "<script>history.go(-1);</script>";
  } elseif (empty($alamat)) {
	echo "<script>alert('Alamat tidak boleh kosong !');</script>";
	echo "<script>history.go(-1);</script>";
  } elseif (empty($no_ktp)) {
	echo "<script>alert('No KTP tidak boleh kosong !');</script>";
	echo "<script>history.go(-1);</script>";
  } else {
	//Input member
	$input = mysql_query("INSERT INTO member2 SET id_member = '$idm', namalengkap = '$nm_lengkap', username = '$username', password = '$password', email = '$email', no_hp = '$no_hp', alamat = '$alamat', no_ktp = '$no_ktp'") or die ("Gagal!......".mysql_error());
	header("location:bukti-reservasi-" . $ids . "-" . $idm . ".html");
  }
} else {
  // pembuatan variable pada penginputan username dan password
  $user = $_POST['username_l'];
  $pass = $_POST['password_l'];

  // cek username dan password di database
  $login = mysql_query("SELECT * FROM member2 WHERE username='$user' AND password='$pass'");
  $ketemu = mysql_num_rows($login);
  $r = mysql_fetch_array($login);

  if ($ketemu > 0) {
   	session_start ();

  $_SESSION[idm]          = $r[id_member];
	$_SESSION[nm_lengkap] 	= $r[namalengkap];
	$_SESSION[namauser] 	  = $r[username];
	$_SESSION[passuser] 	  = $r[password];
	$_SESSION[bsi] 			    = $r[keyword];

	header("location:bukti-reservasi-" . $ids . "-" . $_SESSION[idm] . ".html");
  } else {
	echo "<script>alert('Login gagal !');</script>";
  }
}
?>