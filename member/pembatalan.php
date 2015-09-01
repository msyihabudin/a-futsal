<?php
include_once("../koneksi.php");
koneksi();

$idr = $_POST['id_reservasi'];
$alasan = $_POST['alasan'];

$r = mysql_fetch_array(mysql_query("SELECT * FROM reservasi WHERE id_reservasi = '$idr'")) or die ("Error...".mysql_error());
$jam_lewat = $r['jam_mulai'] - ("02:00:00");
$jam_lewat_s = strtotime($jam_lewat);
$tgl = date("Y-m-d");
$jam = date("H:i:s");
$tgl_skrg = strtotime($tgl);
$jam_skrg = strtotime($jam);
echo $jam_lewat;

if (isset($_POST['batal'])) {
  if ($idr == '') {
    echo "<script>alert('Silahkan pilih ID Reservasi anda!');</script>";
    echo "<script>history.go(-1);</script>";
  } elseif ($r['status'] == 'Dibatalkan') {
  	echo "<script>alert('Reservasi anda telah dibatalkan!');</script>";
    echo "<script>history.go(-1);</script>";
  } elseif ($r['tanggal'] == $tgl_skrg AND $jam_skrg == $jam_lewat_s) {
  	echo "<script>alert('Anda telah melewati batas waktu pembatalan!');</script>";
    echo "<script>history.go(-1);</script>";
  } else {
  	$input = mysql_query("INSERT INTO pembatalan SET id_reservasi = '$idr', alasan = '$alasan'");
	mysql_query("UPDATE reservasi SET status = 'Want to cancel', tgl_reservasi = '$tgl', jam_reservasi = '$jam' WHERE id_reservasi = '$idr'") or die ("Gagal ngehapus".mysql_error());
	header('location:../dashboard.html');
  }
}
?>