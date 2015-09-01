<?php
function tgl_indo($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $tanggal.' '.$bulan.' '.$tahun;		 
	}
function getBulan($bln){
				switch ($bln){
					case 1: 
						return "Januari";
						break;
					case 2:
						return "Februari";
						break;
					case 3:
						return "Maret";
						break;
					case 4:
						return "April";
						break;
					case 5:
						return "Mei";
						break;
					case 6:
						return "Juni";
						break;
					case 7:
						return "Juli";
						break;
					case 8:
						return "Agustus";
						break;
					case 9:
						return "September";
						break;
					case 10:
						return "Oktober";
						break;
					case 11:
						return "November";
						break;
					case 12:
						return "Desember";
						break;
				}
			} 

$sekarang = date("Y-m-d"); // tanggal sekarang
$sehariLagi = strtotime(date("Y-m-d", strtotime($sekarang)) . " +1 day"); // 1 hari berikutnya
$semingguLagi = strtotime(date("Y-m-d", strtotime($sekarang)) . " +1 week"); // 1 minggu berikutnya
$sebulanLagi = strtotime(date("Y-m-d", strtotime($sekarang)) . " +1 month"); // 1 bulan berikutnya
$limaPuluhHariSebelumnya = strtotime(date("Y-m-d", strtotime($sekarang)) . " -50 days"); // 50 hari sebelumnya

echo date("d-m-Y", $sehariLagi); echo "<br>";
echo date("d-m-Y", $sebulanLagi); echo "<br>";
echo $sebulanLagi; echo "<br>";

echo "<select>";
for ($i=$sekarang; $i <= $sebulanLagi; $i++){
echo "<option>$i</option>";
}
echo "</select>";

$s = tgl_indo(date("Y-m-d"));
echo $s;

?>