<?php
include_once("koneksi.php");
include "../lib/class_paging.php";
include "../lib/tgl_indo.php";
include "../lib/inc.librari.php";

koneksi();

date_default_timezone_set("Asia/Jakarta");
$p = new Paging;
$batas = 20;
$posisi = $p->cariPosisi($batas);	

$tampil = mysql_query("SELECT * FROM reservasi, lapangan, kategori, member2 WHERE reservasi.id_lapangan = lapangan.id_lapangan AND lapangan.id_kategori = kategori.id_kategori AND reservasi.id_member = member2.id_member ORDER BY reservasi.tgl_reservasi DESC LIMIT $posisi,$batas") or die ("Gagal".mysql_error());
$i = $posisi+1;
?>
<div id="notif" align="center">
<?php
if($_GET['bsi']=='ubah'){
  echo"<div class=\"n_ok\"><p> Data Berhasil Diubah ! </p></div>";
  echo "<meta http-equiv=\"refresh\" content=\"2; url=admin.php?p=reservasi_l\">";
} elseif($_GET['bsi']=='hapus'){
  echo"<div class=\"n_error\"><p>Data Berhasil Dihapus !</p></div>";
}  ?>
</div>
<h3 class="page-header"> <a href="?p=reservasi_l"> Reservation Report </a></h3>
<form id="form" action="?p=reservasi_periode" method="post" enctype="multipart/form-data">
<fieldset id="personal">
<legend>Transaksi Per Periode</legend>
  <label>Dari tanggal : </label>
  <input type="text" name="dari" id="tgl" size="30" />
  <br />
  <label>Sampai tanggal : </label>
  <input type="text" name="sampai" id="tgl2" size="30" />
  <br /><br />
  <label>&nbsp;</label>
  <input name="proses" id="button1" type="submit" value="Proses" onclick='editor.post();' />
</fieldset></form><br />

  <table>
    <thead>
      <tr>
        <th scope=col style="width: 25px;">No</th>
		<th scope=col style="width: 75px;">ID Reservasi</th>
		<th scope=col style="width: 100px;">Tanggal</th>
		<th scope=col style="width: 70px;">Jam Mulai</th>
		<th scope=col style="width: 70px;">Jam Selesai</th>
		<th scope=col>Lapangan</th>
		<th scope=col>Pemesan</th>
		<th scope=col>Total</th>
		<th scope=col>Status</th>
		<th scope=col style="width: 50px;">Modify</th>
      </tr>
    </thead>
    <tbody>
    <?php
    //cetak hasil query
    while ($data=mysql_fetch_array($tampil)){
    ?>
	<tr>
	  <td align="center"><?php echo $i;?></td>
	  <td><?php echo $data['id_reservasi'];?></td>
	  <td><?php echo tgl_indo($data['tanggal']);?></td>
	  <td><?php echo $data['jam_mulai'];?></td>
	  <td><?php echo $data['jam_selesai'];?></td>
	  <td><?php echo $data['nm_lapangan'];?></td>
	  <td><?php echo $data['namalengkap'];?></td>
	  <td>Rp. <?php echo format_angka($data['total']);?>,-</td>
	  <td><?php echo $data['status'];?></td>
	  <td align="center">
	    <a href="admin.php?p=reservasi_detail&id=<?php echo $data['id_reservasi'];?>" title=Detail> Detail </a>
	  </td>
	</tr>
    <?php $i++; } ?>
    <tr>
	  <td colspan=4>
	    <?php
		$jmldata = mysql_num_rows(mysql_query("SELECT * FROM reservasi, lapangan, kategori, member2 WHERE reservasi.id_lapangan = lapangan.id_lapangan AND lapangan.id_kategori = kategori.id_kategori AND reservasi.id_member = member2.id_member"));
		$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
		$linkHalaman = $p->navHalaman3($_GET[halaman], $jmlhalaman);
		echo "Hal: $linkHalaman";
		?>
      </td>
	</tr>
  </tbody> </table>