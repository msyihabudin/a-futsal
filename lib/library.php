<?php
date_default_timezone_set("Asia/Jakarta");

$seminggu = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
$hari = date("w");
$hari_ini = $seminggu[$hari];

$tgl_sekarang = date("Ymd");
$thn_sekarang = date("Y");
$jam_sekarang = date("H:i:s");

$bln = date("m");

function kdauto($tabel, $inisial){
    $struktur  = mysql_query("SELECT * FROM $tabel");
	$field	   = mysql_field_name($struktur,0);
	$panjang   = mysql_field_len($struktur,0);
	
	$qry	= mysql_query("SELECT max(".$field.") FROM ".$tabel);
	$row	= mysql_fetch_array($qry);
	if ($row[0]=="") {
	        $angka=0;
	}
	else {
	$angka =substr($row[0], strlen($inisial));
	}
	
	$angka++;
	$angka	=strval($angka);
	$tmp	="";
	for($i=1; $i<=($panjang-strlen($inisial)-strlen($angka)); $i++){
			$tmp=$tmp."0";
	 }
		return $inisial.$tmp.$angka;
}

function format_angka($angka) {
	$hasil =  number_format($angka,0, ",",".");
	return $hasil;
}
?>