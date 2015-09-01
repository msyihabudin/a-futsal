<?php
include_once("koneksi.php");
include "../lib/class_paging.php";
include "../lib/tgl_indo.php";
include "../lib/inc.librari.php";

koneksi();

$dari = $_POST['dari'];
$sampai = $_POST['sampai'];
if (isset($_POST['proses'])){
  if (empty($dari)) {
    echo "<script>alert('Silahkan pilih tanggal');</script>";
    echo "<script>history.go(-1);</script>";
  } elseif (empty($sampai)){
    echo "<script>alert('Silahkan pilih tanggal');</script>";
    echo "<script>history.go(-1);</script>";
  } else {
    $sql = mysql_query("SELECT * FROM reservasi, lapangan, kategori, member2 WHERE reservasi.id_lapangan = lapangan.id_lapangan AND lapangan.id_kategori = kategori.id_kategori AND reservasi.id_member = member2.id_member AND reservasi.tgl_reservasi BETWEEN '$dari' AND '$sampai'");	

$i = $posisi+1;
?>

<h3 class="page-header"> <a href="?p=reservasi_l"> Transactions Per Period </a></h3>
<p>Transaksi dari tanggal <?php echo tgl_indo($dari);?> sampai tanggal <?php echo tgl_indo($sampai);?></p>
  <table>
    <thead>
      <tr>
        <th scope=col style="width: 25px;">No</th>
		<th scope=col>ID Reservasi</th>
		<th scope=col style="width: 100px;">Tanggal</th>
		<th scope=col style="width: 65px;">Jam Mulai</th>
		<th scope=col style="width: 65px;">Jam Selesai</th>
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
    while ($data=mysql_fetch_array($sql)){
    ?>
	<tr>
	  <td align=center><?php echo $i;?></td>
	  <td><?php echo $data['id_reservasi'];?></td>
	  <td><?php echo tgl_indo($data['tanggal']);?></td>
	  <td><?php echo $data['jam_mulai'];?></td>
	  <td><?php echo $data['jam_selesai'];?></td>
	  <td><?php echo $data['nm_lapangan'];?></td>
	  <td><?php echo $data['namalengkap'];?></td>
	  <td>Rp. <?php echo format_angka($data['total']);?>,-</td>
	  <td><?php echo $data['status'];?></td>
	  <td>
	    <a href="admin.php?p=reservasi_detail&id=<?php echo $data['id_reservasi'];?>" title=Detail> Detail </a>
	  </td>
	</tr>
    <?php        $i++;        }        ?>
    <tr>
	  <td colspan=4>
	    <?php
		$jmldata = mysql_num_rows(mysql_query("SELECT * FROM reservasi"));
		$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
		$linkHalaman = $p->navHalaman3($_GET[halaman], $jmlhalaman);
		echo "Hal: $linkHalaman";
		?>
      </td>
	</tr>
  </tbody> </table>
  <?php }} ?>