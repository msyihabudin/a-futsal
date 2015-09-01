<?php
$tanggal_sekarang = date("Y-m-d");
$tanggal_lampau = ("2015-01-05");

echo "$tanggal_sekarang dan $tanggal_lampau";

if ($tanggal_lampau < $tanggal_sekarang) {
  echo "Salah bro! KZL KZL KZL KZL";
} else {
  echo "OKE";
}

echo "<br><br><br>";
$jam_sekarang = date("H:i:s");
$jam_lampau = ("10:00:00");

echo "$jam_sekarang dan $jam_lampau<br>";
if ($jam_lampau < $jam_sekarang) {
  echo "Salah bro! KZL KZL KZL KZL";
} else {
  echo "OKE";
}
?>