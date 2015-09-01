<?php
include_once("koneksi.php");
koneksi();

$id=$_GET['id'];
$tabel=$_GET['tabel'];

$delete = "DELETE FROM $tabel WHERE id = '$id'";
echo $delete;
$hasil_delete = mysql_query($delete);


if(mysql_affected_rows() > 0)
	{
	echo "<script>alert('Record telah dihapus');</script>";
	echo "<script>history.go(-1);</script>";
	}
else
	{
	echo "<script>alert('Penghapusan record gagal, coba ulangi lagi');</script>";
	echo "<script>history.go(-1);</script>";
	}
?>