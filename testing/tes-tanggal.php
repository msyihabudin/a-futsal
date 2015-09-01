<?php

$jml_hr = date('t');
$thn_bln = date('Y/m/');

echo '<select>';
for ($i = 1; $i <= $jml_hr; $i++) {
 $tgl = $thn_bln . $i;
 echo '<option>' . date('l',strtotime($tgl)) . ', ' . date('d', strtotime($tgl)) . ' ' . date('F') . ' ' . date('Y') . '</option>'; 
}
echo '</select>';


$minggudepan = time() + ($jml_hr * 24 * 60 * 60);
// 7 hari; 24 jam; 60 menit; 60 detik
echo 'Sekarang:       '. date('Y-m-d') ."\n<br>";
echo 'Minggu Depan: '. date('Y-m-d', $minggudepan) ."\n<br>";
// atau menggunakan strtotime():
echo 'Minggu Depan: '. date('Y-m-d', strtotime('+1 week')) ."\n<br>";

//----Kalender----
$month= date ("m");
$year=date("Y");
$day=date("d");
// t digunakan untuk menghitung jumlah seluruh hari pada bulan ini
//ini digunakan untuk menampilkan semua tanggal pada bulan ini 
$endDate=date("t",mktime(0,0,0,$month,$day,$year));
//membuat tabel kalender 
echo '<font face="arial" size="2">';
echo '<table align="center" border="0" cellpadding=5 cellspacing=5 style=""><tr><td align=center>';
//menampilkan hari ini  
echo "Hari ini tanggal : ".date("d F Y ",mktime(0,0,0,$month,$day,$year));
echo '</td></tr></table>';
//membuat tebel baris nama-nama hari 
echo '<table align="center" border="0" cellpadding=1 cellspacing=1 style="border:1px solid #CCCCCC">
  <tr bgcolor="#EFEFEF">
  <td align=center><font color=red>Minggu</font></td>
  <td align=center>Senin</td>
  <td align=center>Selasa</td>
  <td align=center>Rabu</td>
  <td align=center>Kamis</td>
  <td align=center>Jumat</td>
  <td align=center>Sabtu</td>
  </tr>';
//cek tanggal 1 hari sekarang
$s=date ("w", mktime (0,0,0,$month,1,$year));
for ($ds=1;$ds<=$s;$ds++) {
echo "<td style=\"font-family:arial;color:#B3D9FF\" align=center valign=middle bgcolor=\"#FFFFFF\">
</td>";}
for ($d=1;$d<=$endDate;$d++) {
//jika variabel w= 0 disini 0 adalah hari minggu akan membuat baris baru dengan </tr>
if (date("w",mktime (0,0,0,$month,$d,$year)) == 0) { echo "<tr>"; }
$fontColor="#000000";
//menentukan warna pada tanggal hari biasa
if (date("D",mktime (0,0,0,$month,$d,$year)) == "Sun") { $fontColor="red"; }
echo "<td style=\"font-family:arial;color:#333333\" align=center valign=middle> <span style=\"color:$fontColor\">$d</span></td>"; 
//jika variabel w= 6 disini 6 adalah hari sabtu maka akan pindah baris dengan menutup baris </tr>
if (date("w",mktime (0,0,0,$month,$d,$year)) == 6) { echo "</tr>"; }}
echo '</table>'; 
//----End kalender----
?>