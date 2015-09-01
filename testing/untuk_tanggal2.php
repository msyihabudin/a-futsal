<?php
/* tanggal.php */
/* buat array bulan */
$bulan = array(1=>'Jan',2=>'Feb',3=>'Mar',4=>'Apr',5=>'May',6=>'Jun',7=>'Jul',8=>'Aug',9=>'Sep',10=>'Oct',11=>'Nov',12=>'Dec');
/* definisikan variabel-variabel tgl, bulan dan tahun utk dipakai sbg pembanding pd tag option */
$checkin = mktime(0,0,0,date("m") ,date("d")+3,date("Y"));
$indate = date("j", $checkin);
$inmonth = date("n", $checkin);
$inyear = date("Y", $checkin);
$checkout = mktime(0,0,0,date("m") ,date("d")+5,date("Y"));
$outdate = date("j", $checkout);
$outmonth = date("n", $checkout);
$outyear = date("Y", $checkout);
?>

<html>
<head>
<title> Tanggal </title>
</head>
<body>
<form method="post" action="validasi.php">
<p>check-in:
<select name="intanggal">
 <?php
 /* buat loop utk tgl sampe batasnya. yg lain juga sama */
 for ($i=1; $i <= 31; $i++) {
 /* jika $indate sama dgn $i, maka buat terselect secara default pd tag select. yg lain juga sama */
 if ($i == $indate){ $selectdate ="selected";} else {$selectdate="";}
 echo ("<option value=\"$i\" $selectdate>$i</option>"."\n");
 }
 ?>
</select>
<select name="inbulan">
 <?php
 for ($i=1; $i <= 12; $i++) {
 if ($i == $inmonth){ $selectmonth ="selected";} else {$selectmonth="";}
echo ("<option value=\"$i\" $selectmonth>$bulan[$i]</option>"."\n");
 }
 ?>
</select>
<select name="intahun">
 <?php
 for ($i=2002; $i <= 2003; $i++) {
 if ($i == $inyear){ $selectyear ="selected";} else {$selectyear="";}
echo ("<option value=\"$i\" $selectyear>$i</option>"."\n");
 }
 ?>
</select>
</p>
<p>check-out:
<select name="outtanggal">
 <?php
 for ($i=1; $i <= 31; $i++) {
 if ($i == $outdate){ $selectdate ="selected";} else {$selectdate="";}
echo ("<option value=\"$i\" $selectdate>$i</option>"."\n");
 }
 ?>
</select>
<select name="outbulan">
 <?php
 for ($i=1; $i <= 12; $i++) {
 if ($i == $outmonth){ $selectmonth ="selected";} else {$selectmonth="";}
echo ("<option value=\"$i\" $selectmonth>$bulan[$i]</option>"."\n");
 }
 ?>
</select>
<select name="outtahun">
 <?php
 for ($i=2002; $i <= 2003; $i++) {
 if ($i == $outyear){ $selectyear ="selected";} else {$selectyear="";}
echo ("<option value=\"$i\" $selectyear>$i</option>"."\n");
 }
 ?>
</select>
</p>
<p>
<input type="submit" value="cek waktu">
</p>
</form>
</body>
</html>