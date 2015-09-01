<?php
include_once("koneksi.php");
include "lib/class_paging.php";
koneksi();

date_default_timezone_set("Asia/Jakarta");

$ids = session_id();
$p = new pageNavi_Home;
$batas = 20;
$posisi = $p->cariPosisi($batas);    
$sql = mysql_query("SELECT * FROM reservasi, lapangan, kategori, member2 WHERE reservasi.id_lapangan = lapangan.id_lapangan AND lapangan.id_kategori = kategori.id_kategori AND reservasi.id_member = member2.id_member ORDER BY tanggal, jam_mulai ASC LIMIT ".$posisi.",".$batas."") or die ("Ada yang salah!".mysql_error());
$i = $posisi+1; 	

?>
<style type="text/css">
<!--
.style2 {color: #FFFFFF}
-->
</style>

<section class="post"><h3> JADWAL TERKINI </h3><hr><br />
  	<table align="center">
      <tr>
        <th width="35" height="33" bgcolor="#000000"><span class="style2"> No </span></th>
        <th width="90" bgcolor="#000000"><span class="style2"> Tanggal </span></th>
        <th width="90" bgcolor="#000000"><span class="style2"> Jam Mulai </span></th>
        <th width="90" bgcolor="#000000"><span class="style2"> Jam Selesai </span></th>
        <th width="243" bgcolor="#000000"><span class="style2"> Lapangan </span></th>
        <th width="170" bgcolor="#000000"><span class="style2"> Jenis </span></th>
        <th width="150" bgcolor="#000000"><span class="style2"> Status </span></th>
      </tr>
      <?php
      while ($r = mysql_fetch_array($sql)){
	  $skr = date("Y-m-d");
	  $tgl = $r['tanggal'];
	  $skr_s = strtotime($skr);
	  $tgl_s = strtotime($tgl);
	  if ($tgl_s < $tgl_s){
	    $status = "Sudah Lewat";
	  } elseif ($r['status']=='Belum Konfirmasi'){
	    $status = "Booked";
	  } elseif ($r['status']=='Sudah Konfirmasi'){
	    $status = "Reserved";
	  } elseif ($r['status']=='Disetujui'){
      $status = "Reserved";
    } elseif ($r['status']=='Tidak Disetujui'){
      $status = "Rejected by admin";
    } elseif ($r['status']=='Dibatalkan'){
      $status = "Cancelled";
    }
      ?>
      <tr>
        <td align="center"> <?php echo $i;?> </td>
        <td align="center"> <?php echo tgl_indo($r['tanggal']);?> </td>
        <td align="center"> <?php echo $r['jam_mulai'];?> </td>
        <td align="center"> <?php echo $r['jam_selesai'];?> </td>
        <td> <?php echo $r['nm_lapangan'];?> </td>
        <td> <?php echo $r['kategori'];?> </td>
        <td> <?php echo $status;?> </td>
      </tr>
      <?php $i++; }
        $jmldata = mysql_num_rows(mysql_query("SELECT * FROM reservasi, lapangan, kategori, member2 WHERE reservasi.id_lapangan = lapangan.id_lapangan AND lapangan.id_kategori = kategori.id_kategori AND reservasi.id_member = member2.id_member"));
        $jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
        $linkHalaman = $p->navHalaman($_GET['page'], $jmlhalaman); 
      ?>
      <tr>
        <td colspan="7" align="center">
          <?php echo $linkHalaman ?>
        </td>
      </tr>
  </table>
    <div class="cl">&nbsp;</div>
</section>