<?php
include_once("koneksi.php");
include "lib/class_paging.php";
koneksi();

date_default_timezone_set("Asia/Jakarta");
$p = new Paging;
$batas = 20;
$posisi = $p->cariPosisi($batas);

$ids = session_id();    
$sql = mysql_query("SELECT * FROM reservasi, lapangan, detail_reservasi, kategori WHERE reservasi.id_lapangan = lapangan.id_lapangan AND reservasi.id_reservasi = detail_reservasi.id_reservasi AND lapangan.id_kategori = kategori.id_kategori AND member.username = '$_SESSION[namauser]' ORDER BY tanggal DESC LIMIT $posisi,$batas") or die ("Ada yang salah!".mysql_error());
$i = $posisi+1; 	

?>
<style type="text/css">
<!--
.style2 {color: #FFFFFF}
-->
</style>

<section class="post"><h3 align="center"> CATATAN LOG RESERVASIMU </h3><br />
  	<table align="center">
      <tr>
        <th width="35" height="33" bgcolor="#000000"><span class="style2"> No </span></th>
        <th width="90" bgcolor="#000000"><span class="style2"> Tanggal </span></th>
        <th width="90" bgcolor="#000000"><span class="style2"> Jam Mulai </span></th>
        <th width="90" bgcolor="#000000"><span class="style2"> Jam Selesai </span></th>
        <th width="243" bgcolor="#000000"><span class="style2"> Lapangan </span></th>
        <th width="170" bgcolor="#000000"><span class="style2"> Jenis </span></th>
        <th width="150" bgcolor="#000000"><span class="style2"> Status </span></th>
        <th width="150" bgcolor="#000000"><span class="style2"> Pembayaran </span></th>
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
	  }
      ?>
      <tr>
        <td align="center"> <?php echo $i;?> </td>
        <td align="center"> <?php echo $r['tanggal'];?> </td>
        <td align="center"> <?php echo $r['jam_mulai'];?> </td>
        <td align="center"> <?php echo $r['jam_selesai'];?> </td>
        <td> <?php echo $r['nm_lapangan'];?> </td>
        <td> <?php echo $r['kategori'];?> </td>
        <td> <?php echo $r['status'];?> </td>
        <td> 
          <?php
          if ($r['status']=='Belum Konfirmasi') {
            echo "<a href=konfirmasi-$r[id_reservasi]-$r[id_member].html>Confirm</a>";
          } else {
            echo "Confirmed";
          }
          ?>
           
        </td>
      </tr>
      <?php $i++; } ?>
      <tr>
        <td colspan="7">
          <?php
          $jmldata = mysql_num_rows(mysql_query("SELECT * FROM detail_reservasi"));
          $jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
          $linkHalaman = $p->navHalaman3($_GET[halaman], $jmlhalaman);
            
          echo "Hal: $linkHalaman";
          ?>
        </td>
      </tr>
  </table>
    <div class="cl">&nbsp;</div>
</section>