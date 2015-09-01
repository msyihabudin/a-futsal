<?php
include_once("koneksi.php");
include "../lib/class_paging.php";
include "../lib/tgl_indo.php";
include "../lib/inc.librari.php";

function cekdata($query){ $ketemu=mysql_query($query); if(mysql_num_rows($ketemu)>0) { return true; } else { return false; } }

koneksi();
$id = $_GET['id'];

$tampil = mysql_query("SELECT * FROM reservasi, lapangan, kategori, member2 WHERE reservasi.id_lapangan = lapangan.id_lapangan AND lapangan.id_kategori = kategori.id_kategori AND reservasi.id_member = member2.id_member AND reservasi.id_reservasi = '$id'") or die ("Gagal".mysql_error());
$r = mysql_fetch_array($tampil);
?>
<form id="form" enctype="multipart/form-data" method="post" action="?p=aksi&id=<?php echo $r['id_reservasi'];?>">
<h3 class="page-header"> <a href="?p=reservasi_l"> Reservation Detail </a></h3>
	<h4>Info Pemesan</h4>
	<table width="912" align="center">
		<tr>
		  <th width="74" bgcolor="#000000"><span class="style1">ID Member</span></th>
		  <th width="150" bgcolor="#000000"><span class="style1">Nama Lengkap</span></th>
		  <th width="150" bgcolor="#000000"><span class="style1">Email</span></th>
		  <th width="105" bgcolor="#000000"><span class="style1">No Hp</span></th>
		  <th width="275" bgcolor="#000000"><span class="style1">Alamat</span></th>
		  <th width="130" bgcolor="#000000"><span class="style1">No. KTP/ Kartu Pelajar</span></th>
		</tr>
		<tr>
		  <td align="center"><?php echo $r['id_member'];?></td>
		  <td><?php echo $r['namalengkap'];?></td>
		  <td><?php echo $r['email'];?></td>
		  <td><?php echo $r['no_hp'];?></td>
		  <td><?php echo $r['alamat'];?></td>
		  <td><?php echo $r['no_ktp'];?></td>
		</tr>
</table>
	  <br /><br /><br />
	  <h4>Info Lapangan & Waktu</h4>
	  <table width="912" align="center">
		<tr>
		  <td rowspan="8" align="center" valign="top"><img src="img/image/<?php echo $r['gambar'];?>" width="240" height="140" />&nbsp;&nbsp;&nbsp;</td>
		  <th width="133" bgcolor="#000000"><span class="style1">Nama Lapangan</span></th>
		  <th width="130" bgcolor="#000000"><span class="style1">Kategori</span></th>
		  <th width="200" bgcolor="#000000"><span class="style1">Keterangan</span></th>
		  <th width="120" bgcolor="#000000"><span class="style1">Harga Sewa</span></th>
		</tr>
		<tr>
		  <td><?php echo $r['nm_lapangan'];?></td>
		  <td><?php echo $r['kategori'];?></td>
		  <td><?php echo substr($r['keterangan'], 0,50);?></td>
		  <td>Rp. <?php echo format_angka($r['harga']);?>,-</td>		  
	    </tr>
		<tr>
		  <td colspan="4">&nbsp;</td>
	    </tr>
		<tr>
		  <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td> <div align="right">Tanggal : </div></td>
          <td> <?php echo tgl_indo($r['tanggal']);?> </td>
	    </tr>
        <tr>
		  <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td> <div align="right">Jam Mulai : </div></td>
          <td> <?php echo $r['jam_mulai'];?> WIB</td>
	    </tr>
        <tr>
		  <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td> <div align="right">Jam Selesai : </div></td>
          <td> <?php echo $r['jam_selesai'];?> WIB</td>
	    </tr>
		<tr>
		  <td colspan="4">&nbsp;</td>
	    </tr>
		<tr>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
          <td> <div align="right">Total Biaya : </div></td>
          <td> <strong>Rp. <?php echo format_angka($r['total']); ?>,- </strong></td>
	    </tr>
      </table>
	  <h4>Status Pemesanan & Pembayaran</h4>
	  <table>
	    <tr>
		  <th>ID Reservasi</th>
		  <th>Tanggal Reservasi</th>
		  <th>Jam Reservasi</th>
		  <th>Total Bayar</th>
		  <th>Status</th>
		  <td rowspan="6">
		  <?php
		  if ($r['status']=='Sudah Konfirmasi' OR $r['status']=='Disetujui') {
		  	$byr = mysql_fetch_array(mysql_query("SELECT * FROM pembayaran WHERE id_reservasi = '$r[id_reservasi]'"));
		  	echo "
		  	<table>
			  <tr>
			    <td>No Rekening</td>
				<td>:</td>
				<td>$byr[no_rek]</td>
			  </tr>
			  <tr>
			    <td>Atas Nama</td>
				<td>:</td>
				<td>$byr[atas_nama]</td>
			  </tr>
			  <tr>
			    <td valign=top>Bukti Pembayaran</td>
				<td valign=top>:</td>
				<td><img src=\"../member/bukti_pembayaran/$byr[gambar_bukti]\" width=\"150\" height=\"150\" /></td>
			  </tr>
			</table>
		  	";
		  } elseif ($r['status']=='Dibatalkan') {
		  	$btl = mysql_fetch_array(mysql_query("SELECT * FROM pembatalan WHERE id_reservasi = '$r[id_reservasi]'"));
		  	echo "
		  	<table>
		  	  <tr>
		  	    <td>Alasan Pembatalan</td>
		  	    <td>:</td>
		  	    <td>$btl[alasan]</td>
		  	  </tr>
		  	</table>
		  	";
		  } elseif ($r['status']=='Tidak Disetujui') {
		  	$byr2 = mysql_fetch_array(mysql_query("SELECT * FROM pembayaran WHERE id_reservasi = '$r[id_reservasi]'"));
		  	echo "
		  	<table>
		  	  <tr>
		  	    <td colspan=3><h3>Konfirmasi tidak disetujui</h3></td>
		  	  </tr>
			  <tr>
			    <td>No Rekening</td>
				<td>:</td>
				<td>$byr2[no_rek]</td>
			  </tr>
			  <tr>
			    <td>Atas Nama</td>
				<td>:</td>
				<td>$byr2[atas_nama]</td>
			  </tr>
			  <tr>
			    <td valign=top>Bukti Pembayaran</td>
				<td valign=top>:</td>
				<td><img src=\"../member/bukti_pembayaran/$byr2[gambar_bukti]\" width=\"150\" height=\"150\" /></td>
			  </tr>
			</table>
		  	";
		  } elseif ($r['status']=='Pembatalan Disetujui') {
		  	if (cekdata("SELECT * FROM pembayaran WHERE id_reservasi = '$r[id_reservasi]'")==true) {
		  	  $blk = mysql_fetch_array(mysql_query("SELECT * FROM reservasi WHERE id_reservasi = '$r[id_reservasi]'"));
		  	  $pengembalian = $blk['total'] * 0.05;
		  	  $hasil_akhir = $blk['total'] - $pengembalian;
		  	  echo "
		  	  <table>
		  	    <tr>
		  	      <td colspan=3><b>$blk[status]</b>, Pengembalian uang (refund) sebanyak Rp. ". format_angka($hasil_akhir) .",-.</td>
		  	    </tr>
			    <tr>
			      <td>No Rekening</td>
			      <td>:</td>
				  <td>$blk[no_rek]</td>
			    </tr>
			    <tr>
			      <td>Atas Nama</td>
				  <td>:</td>
				  <td>$blk[atas_nama]</td>
			    </tr>
			    <tr>
 			      <td valign=top>Bukti Pembayaran</td>
				  <td valign=top>:</td>
				  <td><img src=\"../member/bukti_pembayaran/$blk[gambar_bukti]\" width=\"150\" height=\"150\" /></td>
			    </tr>
			  </table>
		  	  ";
		  	} else {
		  	  echo "<h3>$blk[status]</h3><br>";
		  	  echo "<p>Pelanggan belum melakukan konfirmasi pembayaran.</p>";
		  	}		  	
		  } elseif ($r['status']=='Pembatalan Tidak Disetujui') {
		  	$byr3 = mysql_fetch_array(mysql_query("SELECT * FROM pembayaran WHERE id_reservasi = '$r[id_reservasi]'"));
		  	echo "
		  	<table>
		  	  <tr>
		  	    <td colspan=3><h3>$byr3[status]</h3></td>
		  	  </tr>
			  <tr>
			    <td>No Rekening</td>
				<td>:</td>
				<td>$byr3[no_rek]</td>
			  </tr>
			  <tr>
			    <td>Atas Nama</td>
				<td>:</td>
				<td>$byr3[atas_nama]</td>
			  </tr>
			  <tr>
			    <td valign=top>Bukti Pembayaran</td>
				<td valign=top>:</td>
				<td><img src=\"../member/bukti_pembayaran/$byr3[gambar_bukti]\" width=\"150\" height=\"150\" /></td>
			  </tr>
			</table>
		  	";
		  } else {
		  	echo "<h2 align=center>Reservasi belum dikonfirmasi</h2>";
		  }
		  ?>
		    
		  </td>
		</tr>
		<tr>
		  <td><?php echo $r['id_reservasi'];?></td>
		  <td><?php echo tgl_indo($r['tgl_reservasi']);?></td>
		  <td><?php echo $r['jam_reservasi'];?></td>
		  <td>Rp. <?php echo format_angka($r['total']);?>,-</td>
		  <td><?php echo $r['status'];?></td>
	    </tr>
		<tr>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
		<tr>
		  <td>Tindakan </td>
		  <td align="right" colspan="2">: <select name="aksi">
		  	  <option value="">-- Select your action --</option>
			  <?php
			  if($r['status']=='Sudah Konfirmasi'){
			    echo "<option value=\"Disetujui\">Accept</option>";
				echo "<option value=\"Tidak Disetujui\">Reject</option>";
			  } elseif ($r['status']=='Belum Konfirmasi'){
			    echo "<option value=\"Hapus\">Delete</option>";
				echo "<option value=\"Dibatalkan\">Cancel</option>";
			  } elseif ($r['status']=='Disetujui'){
			    echo "<option value=\"Hapus\">Delete</option>";
			  } elseif ($r['status']=='Want to cancel'){
			    echo "<option value=\"Pembatalan Disetujui\">Accept</option>";
				echo "<option value=\"Pembatalan Tidak Disetujui\">Reject</option>";
			  } else {
			    echo "<option value=\"Hapus\">Delete</option>";
			  }
			  ?>
		    </select>
	      </td>
		  <td><input type="submit" name="Submit" id="button1" value="Proccess" /></td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
		<tr>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
		<tr>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
	  </table><br></form>
