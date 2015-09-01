<?php
function koneksi()
{

$server = "localhost";
$username = "root";
$password = "";
$database = "a-futsal";

$koneksi=mysql_connect("$server","$username","$password");

if ($koneksi){
	$koneksi_db=mysql_select_db("$database");
	
	if ($koneksi_db){
		//echo ("Database berhasil dibuka!");echo "<br>";
	}
	else { echo ("Maaf, database tidak berhasil dibuka!");echo "<br>";
	}	}
		else { echo ("Maaf, koneksi tidak berhasil dilaksanakan!");echo "<br>";
	}
}

function nama_primary($tabel){
	$query="SHOW FIELDS FROM $tabel";
	$hasil = mysql_query($query);
	while ($rec = mysql_fetch_array($hasil)) {
		$i++; $nama_field[$i]=$rec['Field'];										
	}

	$primary_key = $nama_field[1];

	return $primary_key;
}

?>