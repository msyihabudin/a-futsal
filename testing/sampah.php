<?php
date_default_timezone_set("Asia/Jakarta");

$jam = date("H:i:s");
$jam1 = ("07:00:00");

if ($jam1 <= $jam) {
	echo "Jam sudah lewat";
} else {
	echo "Oke";
}
echo $jam;

$r_m = ("17:00:00");
$r_s = ("19:00:00");

$jumlah1 = $r_s - $r_m;

echo "<br>======================<br>";
	$harga = 100000;
      $jam_m = strtotime($r_m);
      $jam_s = strtotime($r_s);

      $jumlah = $jam_s - $jam_m;

		  if ($jam_m < 18) {
			if ($jam_s > 18) {
			  $total = ($harga * $jumlah1) + 20000;
			} else {
			  $total = $harga;
			}
		  } else {
			$total = 120000;
		  }

		  echo $jumlah; echo "<br>";
		  echo $jumlah1; echo "<br>";
		  echo $total;

echo "<br>======================<br>";

$j_start = ("06:00:00"); //ganti format ke H:i:s
$j_now = strtotime(date("H:i:s"));

$kurang_enam = date("H") - 6;

echo $kurang_enam;
$pengurangan = ("$kurang_enam:00:00");
echo "<br>";
echo $pengurangan;

echo "<br>======================<br>";
$tanggal1 = date("H:i:s");
$tambah = $tanggal1 + date("6:i:s");
echo date($tambah);

echo "<br>======================<br>";
include "../koneksi.php";
koneksi();

$r2 = mysql_fetch_array(mysql_query("SELECT * FROM reservasi, lapangan WHERE reservasi.id_lapangan = lapangan.id_lapangan")) or die ("Error nih".mysql_error());
$total = $jml_jam * $r2['harga'];
  
$tgl_s = strtotime("2015-06-26");
$j_start_s = strtotime("19:00:00");
$j_end_s = strtotime("20:00:00");

$tgl_r = strtotime($r2['tanggal']);
$jam_m_r = strtotime($r2['jam_mulai']);
$jam_s_r = strtotime($r2['jam_selesai']);

echo "$j_start_s<br>";
echo "$j_end_s<br>";
echo "$tgl_r<br>";
echo "$jam_m_r<br>";
echo "$jam_s_r<br>";
echo "$r2[jam_mulai]<br>";
echo "$r2[jam_selesai]<br>";

?> 