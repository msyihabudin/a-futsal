<?php
include_once("koneksi.php");
include "lib/class_paging.php";
koneksi();

function cekdata($query){ $ketemu=mysql_query($query); if(mysql_num_rows($ketemu)>0) { return true; } else { return false; } }
session_start();

if (empty($_SESSION[namauser]) AND empty($_SESSION[passuser])) {
  echo "<script>alert('Maaf, Untuk mengakses halaman anda harus login terlebih dahulu.');</script>";
  echo "<script>history.go(-1);</script>";
} else {

date_default_timezone_set("Asia/Jakarta");
$p = new pageNavi_Home;
$batas = 10;
$posisi = $p->cariPosisi($batas);	

?>
<style type="text/css">
<!--
.style2 {color: #FFFFFF}
-->
</style>

<section class="post">
<?php
$tampil = mysql_query("SELECT * FROM member2 WHERE id_member = '$_SESSION[idm]'") or die ("Gagal".mysql_error());
$d = mysql_fetch_array($tampil);
$jml_kata = strlen($d['password']);
?>
<h2>DASHBOARD</h2><hr><br>
  <h3>Data Diri</h3><br>
  <table align="center">
    <tr>
      <td width="160">Nama Lengkap</td>
      <td width="10">:</td>
      <td width="275"><?php echo $d['namalengkap'];?></td>
      <td width="28">&nbsp;</td>
      <td width="170">Nama User</td>
      <td width="10">:</td>
      <td width="275"><?php echo $d['username'];?></td>        
    </tr>
    <tr>
      <td>Email</td>
      <td>:</td>
      <td><?php echo $d['email'];?></td>
      <td>&nbsp;</td>
      <td>No. Hp</td>
      <td>:</td>
      <td><?php echo $d['no_hp'];?></td>
    </tr>
    <tr>
      <td>No.KTP/ Kartu Pelajar</td>
      <td>:</td>
      <td><?php echo $d['no_ktp'];?></td>
      <td>&nbsp;</td>
      <td valign="top" rowspan="2">Alamat</td>
      <td valign="top" rowspan="2">:</td>
      <td valign="top" rowspan="2"><?php echo $d['alamat'];?></td>
    </tr>
  </table><br><br>

  <h3> Reservasi Anda </h3><br />
  	<table align="center">
      <tr>
        <th width="90" height="33" bgcolor="#000000"><span class="style2"> Tanggal </span></th>
        <th width="90" bgcolor="#000000"><span class="style2"> ID Reservasi </span></th>
        <th width="90" bgcolor="#000000"><span class="style2"> Jam Mulai </span></th>
        <th width="90" bgcolor="#000000"><span class="style2"> Jam Selesai </span></th>
        <th width="170" bgcolor="#000000"><span class="style2"> Lapangan </span></th>
        <th width="135" bgcolor="#000000"><span class="style2"> Jenis </span></th>
        <th width="140" bgcolor="#000000"><span class="style2"> Status </span></th>
        <th width="100" bgcolor="#000000"><span class="style2"> Pembayaran </span></th>
      </tr>
      <?php
      $ids = session_id();    
      $sql = mysql_query("SELECT * FROM reservasi, lapangan, member2, kategori WHERE reservasi.id_lapangan = lapangan.id_lapangan AND lapangan.id_kategori = kategori.id_kategori AND reservasi.id_member = member2.id_member AND reservasi.id_member = '$_SESSION[idm]' ORDER BY tanggal, jam_mulai ASC LIMIT ".$posisi.",".$batas."") or die ("Ada yang salah!".mysql_error());
      $i = $posisi+1; 

      while ($r = mysql_fetch_array($sql)){
  	  $skr = date("Y-m-d");
  	  $tgl = $r['tanggal'];
  	  $skr_s = strtotime($skr);
  	  $tgl_s = strtotime($tgl);
  	  if ($tgl_s < $tgl_s){
  	    $status = "Sudah Lewat";
  	  } elseif ($r['status']=='Belum Konfirmasi'){
  	    $status = "Waiting Confirmation..";
  	  } elseif ($r['status']=='Sudah Konfirmasi'){
  	    $status = "Booked";
  	  } elseif ($r['status']=='Disetujui'){
        $status = "Reserved";
      } elseif ($r['status']=='Tidak Disetujui'){
        $status = "Rejected by Admin";
      } elseif ($r['status']=='Dibatalkan'){
        $status = "Cancelled";
      } elseif ($r['status']=='Want to cancel'){
        $status = "You'll cancel";
      } elseif ($r['status']=='Pembatalan Disetujui'){
        $status = "Cancelling accepted";
      } elseif ($r['status']=='Pembatalan Tidak Disetujui'){
        $status = "Cancelling rejected";
      }
      ?>
      <tr>
        <td align="center"> <?php echo tgl_indo($r['tanggal']);?> </td>
        <td align="center"> <?php echo $r['id_reservasi'];?> </td>
        <td align="center"> <?php echo $r['jam_mulai'];?> </td>
        <td align="center"> <?php echo $r['jam_selesai'];?> </td>
        <td> <?php echo $r['nm_lapangan'];?> </td>
        <td> <?php echo $r['kategori'];?> </td>
        <td> <?php echo $status;?> </td>
        <td align="center">
          <?php
            if ($r['status']=='Belum Konfirmasi') {
              echo "<a href='konfirmasi-$r[id_reservasi].html'>Confirm now</a>";
            } elseif (cekdata("SELECT * FROM pembayaran WHERE id_reservasi = '$r[id_reservasi]'")==true) {
              echo "Confirmed";
            } elseif (cekdata("SELECT * FROM pembayaran WHERE id_reservasi != '$r[id_reservasi]'")==true) {
              echo "<a href='konfirmasi-$r[id_reservasi].html'>Confirm now</a>";
            } else {
              echo "Confirmed";
            }
          ?>
        </td>
      </tr>
      <?php $i++; } ?>
      <tr>
        <td colspan="8" align="center">
          <?php
          $jmldata = mysql_num_rows(mysql_query("SELECT * FROM reservasi, lapangan, kategori, member2 WHERE reservasi.id_lapangan = lapangan.id_lapangan AND lapangan.id_kategori = kategori.id_kategori AND reservasi.id_member = member2.id_member AND reservasi.id_member = '$_SESSION[idm]'"));
          $jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
          $linkHalaman = $p->navHalaman2($_GET['page'], $jmlhalaman); 
            
          echo $linkHalaman;
          ?>
        </td>
      </tr>
  </table><br><br>

  <h3> Form Pengajuan Pembatalan </h3><br />
  <p>Pembatalan dilakukan minimal 2 jam sebelum bermain.</p>
  <form action="member/pembatalan.php" method="post" enctype="multipart/form-data">
  <fieldset>
  <table>
    <tr>
      <td>ID Reservasi</td>
      <td> : </td>
      <td>
        <select name="id_reservasi">
          <option value=""> --Pilih ID Reservasi-- </option>
          <?php
          $s = mysql_query("SELECT * FROM reservasi, member2 WHERE reservasi.id_member = member2.id_member AND reservasi.id_member = '$_SESSION[idm]'");
          while ($u = mysql_fetch_array($s)) {
            echo "<option value=\"$u[id_reservasi]\">$u[id_reservasi]</option>";
          }
          ?>          
        </select>
      </td>
    </tr>
    <tr>
      <td valign="top">Alasan</td>
      <td valign="top"> : </td>
      <td><textarea name="alasan"></textarea></td>
    </tr>
    <tr>
      <td colspan="3" align="right"><input type="submit" name="batal" id="button1" value="Proses"></td>
    </tr>
  </table>
  </fieldset>
  </form>
    <div class="cl">&nbsp;</div>
</section>
<?php } ?>