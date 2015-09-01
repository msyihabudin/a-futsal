<?php
include_once("koneksi.php");
koneksi();

date_default_timezone_set("Asia/Jakarta");

$ids = $_GET['id'];

$m = mysql_fetch_array(mysql_query("SELECT id_member FROM member2 WHERE username = '$_SESSION[namauser]'"));

if (isset($_POST['booking'])) {
  if (isset($_POST['setuju'])) {
    if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])) {
      header("location:login-member-" . $ids . ".html");      
    } else {
      header("location:bukti-reservasi-" . $ids . "-" . $m[id_member] . ".html");
    }
  } else {
    echo "<script>alert('Silahkan ceklis terlebih dahulu untuk melanjutkan!');window.location='detail-reservasi.html'</script>";
  }  
} else {
  error_reporting(0);
  session_start();

  unset($_SESSION['session']);

  $hapus = mysql_query("DELETE FROM reservasi WHERE id_session = '$ids'") or die ("Ada kesalahan di $hapus.".mysql_error());
  if ($hapus) {
    header('location:home');
  } else {
    echo "Gak kehapus...";
  }
}
?>