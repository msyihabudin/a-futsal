<html>
<body>
<?php
$intanggal = $_POST['intanggal'];
$inbulan = $_POST['inbulan'];
$intahun = $_POST['intahun'];
$outtanggal = $_POST['outtanggal'];
$outbulan = $_POST['outbulan'];
$outtahun = $_POST['outtahun'];

/*validasi.php*/
$in = mktime(0,0,0,$inbulan,$intanggal,$intahun);
$out = mktime(0,0,0,$outbulan,$outtanggal,$outtahun);
$min = mktime(0,0,0,date("m"),date("d")+3,date("Y"));
$interval = mktime(0,0,0,$inbulan,$intanggal+2,$intahun);
$nowshow = date("j F Y");
$minshow = date("j F Y", $min);
 if ($in <$min) {
echo ("hari ini tgl $nowshow, dan waktu checkin minimum adalah tgl $minshow, silahkan kembali");
 }
 elseif ($in>= $out) {
echo ("waktu checkin tidak boleh sama dengan atau lebih dari tgl checkout, silahkan kembali");
 }
 elseif ($interval> $out) {
echo ("jarak antara checkin dan checkout minimum 2 hari, silahkan kembali");
 }
 else {
echo ("terimakasih, kami akan memprosesnya!");
 }
?>
</body>
</html>