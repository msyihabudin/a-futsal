<?php

$tanggal ="";
$hari = array("Sun"=>"Minggu","Mon"=>"Senin","Tue"=>"Selasa","Wed"=>"Rabu","Thu"=>"  Kamis","Fri"=>"Jum'at","Sat"=>"Sabtu");

$bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","S  eptember","Oktober","November","Desember");


$jumlah = 30; // Jumlah hari yang akan di tampilkan
for ($i = 0; $i <= $jumlah; $i++) {
 $tgl = date('d') + $i;
 $strt = strtotime( "$i days", strtotime(date("Y-m-d")));
 $hr =  date("D",$strt);
 $tg = date("d",$strt);
 $bl = date("m",$strt);
 $th = date("Y",$strt);
 $tanggal .= '<option>' .$hari[$hr].", ". $tg ." ". $bulan[$bl-1] ." ".$th.'</option>'; 
}
echo "<select>$tanggal</select>";

?>