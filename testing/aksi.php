<?php
session_start();
error_reporting(0);
include_once("koneksi.php");
koneksi();

$module=$_GET[module];
$act=$_GET[act];

if ($module=='dashboard' AND $act=='konfirmasi'){
  $ids = $_GET['id'];
  $qry = mysql_query("UPDATE detail_reservasi SET status = 'Sudah Konfirmasi'");

  if ($qry > 0) {
  	echo "<script>alert('Anda telah melakukan konfirmasi pembayaran!');</script>";
    header('Location:dashboard.html');
  } else
    echo "<script>alert('Error!');</script>";
    header('Location:dashboard.html');
}


/*
	Delete all cart entries older than one day
*/
function deleteAbandonedCart(){
	$kemarin = date('Y-m-d', mktime(0,0,0, date('m'), date('d') - 1, date('Y')));
	mysql_query("DELETE FROM orders_temp 
	        WHERE tgl_order_temp < '$kemarin'");
}
?>
