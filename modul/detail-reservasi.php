<?php
include_once("koneksi.php");
koneksi();

function cekdata($query){ $ketemu=mysql_query($query); if(mysql_num_rows($ketemu)>0) { return true; } else { return false; } }
date_default_timezone_set("Asia/Jakarta");

if(!isset($_SESSION['session'])){
  $ids = date("ymdHis");//membuat id session yang unik berdasarkan waktu
  $_SESSION['session'] = $ids;
}

$ids = $_SESSION['session'];

$idr = $_POST['id_reservasi'];
$tgl = $_POST['tanggal'];
$start = $_POST['start'];
$end = $_POST['end'];
$j_start = ("$start:00:00"); //ganti format ke H:i:s
$j_end = ("$end:00:00"); //ganti format ke H:i:s
$lap = $_POST['lapangan'];

$jml_jam = $end - $start;

//Cari harga total
$r2 = mysql_fetch_array(mysql_query("SELECT * FROM reservasi, lapangan WHERE reservasi.id_lapangan = lapangan.id_lapangan"));
$total = $jml_jam * $r2['harga'];
  
$tgl_s = strtotime($tgl);
$j_start_s = strtotime($j_start);
$j_end_s = strtotime($j_end);
$tgl_r = strtotime($r2['tanggal']);
$jam_m_r = strtotime($r2['jam_mulai']);
$jam_s_r = strtotime($r2['jam_selesai']);
$j_now = strtotime(date("H:i:s"));
$t_now = strtotime(date("Y-m-d"));

$kurangi_enam = date("H") - 6;
$pengurangan = strtotime(("$kurangi_enam:00:00"));

if (cekdata("SELECT * FROM reservasi WHERE id_lapangan = '$lap' AND tanggal = '$tgl' AND jam_mulai = '$j_start' AND jam_selesai = '$j_end' AND status != 'User Checking'")==true) { 
  echo "<script>alert('Maaf, Lapangan dengan kode $lap tidak tersedia (Not Available)!. Silahkan lakukan reservasi dengan waktu yang berbeda.');</script>";
  echo "<script>history.go(-1);</script>";    
//Bila jam yang dipilih masih di pakai oleh pelanggan lain
} elseif (cekdata("SELECT * FROM reservasi WHERE id_lapangan = '$lap' AND tanggal = '$tgl' AND jam_mulai < '$j_start' AND jam_selesai > '$j_start' AND status != 'User Checking'")==true) { 
  echo "<script>alert('Maaf, Lapangan dengan kode $lap masih dipakai pelanggan lain. Silahkan lakukan reservasi dengan waktu yang berbeda.');</script>";
  echo "<script>history.go(-1);</script>";
//Cek apakah jam selesai tidak lebih kecil dari jam mulai
} elseif ($j_end_s < $j_start_s) {
  echo "<script>alert('Maaf, Jam Selesai tidak boleh lebih kecil dari Jam Mulai.');</script>";
  echo "<script>history.go(-1);</script>";
//Cek jika semua tidak sama dengan yang di database
} else {    
  if ($j_start_s < $j_now AND $tgl_s == $t_now) { //bila tanggal tepat hari ini maka jam harus lebih besar dari jam sekarang      
    echo "<script>alert('Jam yang anda pilih telah usai!');</script>";
    echo "<script>history.go(-1);</script>";
  } else {
    //Bila kondisi terpenuhi semua maka masukan data ke tabel reservasi  
    $tgl_reservasi = date("Y-m-d"); $jam_reservasi = date("H:i:s");    
    $masuk = mysql_query("INSERT INTO reservasi SET id_reservasi = '$idr', id_session = '$ids', id_lapangan = '$_POST[lapangan]', tgl_reservasi = '$tgl_reservasi', jam_reservasi = '$jam_reservasi', tanggal = '$tgl', jam_mulai = '$j_start', jam_selesai = '$j_end', total = '$total', status = 'Belum Konfirmasi'");

    $r = mysql_fetch_array(mysql_query("SELECT * FROM reservasi, lapangan, kategori WHERE reservasi.id_lapangan = lapangan.id_lapangan AND lapangan.id_kategori = kategori.id_kategori AND id_session = '$ids'")) or die ("Ada yang salah!".mysql_error());  

?>
  <section class="post">
  	  <h3 align="center"> Informasi Reservasi Lapangan Futsal </h3><br />
      
  	  <table width="825">
	     <tr>
		      <th colspan="4"><p><strong> -- DATA LAPANGAN -- </strong></p></th>
		    </tr>
        <tr>
          <td width="160"> Kode Lapangan </td>
          <td width="10"> : </td>
          <td width="300"> <?php echo $r['id_lapangan'];?> </td>
          <td valign="top" width="335" rowspan="4"> <img src="admin/img/image/<?php echo $r['gambar'];?>" alt="" width="295" height="145" align="right"> </td>
        </tr>
        <tr>
          <td> Nama Lapangan </td>
          <td> : </td>
          <td> <?php echo $r['nm_lapangan'];?> </td>
        </tr>
        <tr>
          <td> Kategori </td>
          <td> : </td>
          <td> <?php echo $r['kategori'];?> </td>
        </tr>
        <tr>
          <td> Harga Sewa </td>
          <td> : </td>
          <td> Rp. <?php echo format_angka($r['harga']);?>,- </td>
        </tr>
        <tr>
          <td valign="top"> Keterangan </td>
          <td valign="top"> : </td>
          <td> <?php echo $r['keterangan'];?> </td>
        </tr>
    		<tr>
    		  <th colspan="4"><p><strong>-- DATA WAKTU --</strong></p></th>
    		</tr>
    		<tr>
          <td> Tanggal </td>
          <td> : </td>
          <td> <?php echo tgl_indo($r['tanggal']);?> </td>
		      <td>&nbsp;</td>
        </tr>
        <tr>
          <td> Jam Mulai </td>
          <td> : </td>
          <td> <?php echo $r['jam_mulai'];?> WIB</td>
		      <td>&nbsp;</td>
        </tr>
        <tr>
          <td> Jam Selesai </td>
          <td> : </td>
          <td> <?php echo $r['jam_selesai'];?> WIB</td>
		      <td>&nbsp;</td>
        </tr>
    		<tr>
    		  <td colspan="4"></td>
    		</tr>
    		<tr>
          <td width="160"> Total Biaya </td>
          <td width="10"> : </td>
          <td width="637"> Rp. <?php echo format_angka($r['total']); ?>,- </td>
		      <td>&nbsp;</td>
        </tr>
      </table><br>
      <form action="booking-<?php echo $r[id_session];?>.html" method="post">
        <input type="checkbox" name="setuju" value="setuju"> Saya menyetujui dan menerima <a href="syarat-ketentuan.html">syarat dan ketentuan</a> yang berlaku.<br>
        <div style="float:right"><input type="submit" id="button1" name="booking" value="Booking"></div>
        <div style="float:left"><input type="submit" id="button1" name="cancel" value="Cancel"></div> 
      </form>          
    <div class="cl">&nbsp;</div>
  </section>
  <?php }} ?>