<h3 class="page-header"> <a href="?p=lapangan"> Home </a></h3>
<?php
include_once("koneksi.php");
include "../lib/inc.librari.php";
koneksi();

//perintah query utk mengambil data
$sales = mysql_result(mysql_query("SELECT SUM(total) FROM reservasi WHERE status = 'Disetujui'"), 0);
$sales2 = mysql_result(mysql_query("SELECT SUM(id_member) FROM member2"), 0);

?>
<h4>Laporan saldo terakhir yang masuk ke rekening : Rp. <?php echo format_angka($sales);?>,-</h4>
<h3 class="page-header"></h3>


<table>
  <tr>
    <td><table width="500">
	  <tr><td colspan="4"><h4>Data Member Terakhir</h4></td></tr>
      <tr>
        <th>No</th>
        <th>ID Member </th>
        <th>Nama</th>
        <th>Email</th>
      </tr>
	  <?php
	  $member = mysql_query("SELECT * FROM member2 ORDER BY id_member DESC LIMIT 0,5");
	  $i = 0;
	  while($m = mysql_fetch_array($member)){	  
	  $i++;
	  ?>
      <tr>
        <td align="center"><?php echo $i;?></td>
        <td align="center"><?php echo $m['id_member'];?></td>
        <td><?php echo $m['namalengkap'];?></td>
        <td><?php echo $m['email'];?></td>
      </tr>
	  <?php } ?>
    </table></td>
    <td>&nbsp;</td>
	<td><table width="500">
	  <tr><td colspan="4"><h4>Data Transaksi Terakhir</h4></td></tr>
      <tr>
        <th>No</td>
        <th>ID Reservasi</th>
        <th>Lapangan</th>
        <th>Status</th>
      </tr>
	  <?php
	  $reservasi = mysql_query("SELECT * FROM reservasi, lapangan WHERE reservasi.id_lapangan = lapangan.id_lapangan ORDER BY id_reservasi DESC LIMIT 0,5");
	  $j = 0;
	  while($r = mysql_fetch_array($reservasi)){
	  
	  $j++;
	  ?>
      <tr>
        <td align="center"><?php echo $j;?></td>
        <td align="center"><?php echo $r['id_reservasi'];?></td>
        <td><?php echo $r['nm_lapangan'];?></td>
        <td><?php echo $r['status'];?></td>
      </tr>
	  <?php } ?>
    </table></td>
  </tr>
</table>
