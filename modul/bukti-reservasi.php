<?php
include_once("koneksi.php");
koneksi();

date_default_timezone_set("Asia/Jakarta");

$ids = $_GET['id'];
$idm = $_GET['idm'];

//Masukan data ke tabel detail reservasi      
$masuk = mysql_query("UPDATE reservasi SET id_member = '$idm', status = 'Belum Konfirmasi' WHERE id_session = '$ids'");

$r = mysql_fetch_array(mysql_query("SELECT * FROM reservasi, lapangan, kategori, member2 WHERE reservasi.id_lapangan = lapangan.id_lapangan AND lapangan.id_kategori = kategori.id_kategori AND reservasi.id_member = member2.id_member AND reservasi.id_session = '$ids'")) or die ("Ada yang salah!".mysql_error()); 
$jml_kata = strlen($r['password']);    

?>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
.style2 {color: #FF0000}
-->
</style>
<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=400, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>Web Reservasi Arena Futsal</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 400px; font-size:12px; font-family:arial;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
  <section class="post">
  	<div id="print_content">
  	  <h3 align="center"> Bukti Reservasi </h3><br />
      
  	  <table width="912" align="center">
        <tr>
          <th colspan="6">-- Info Pemesan --</th>
        </tr>
		<tr>
		  <th width="100" bgcolor="#000000"><span class="style1">ID Member</span></th>
		  <th width="183" bgcolor="#000000"><span class="style1">Nama Lengkap</span></th>
		  <th width="114" bgcolor="#000000"><span class="style1">Email</span></th>
		  <th width="100" bgcolor="#000000"><span class="style1">No Hp</span></th>
		  <th width="222" bgcolor="#000000"><span class="style1">Alamat</span></th>
		  <th width="100" bgcolor="#000000"><span class="style1">No. KTP/ Kartu Pelajar</span></th>
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
	  <br /><br /><hr /><br />
	  <table width="912" align="center">
	    <tr>
		  <td width="305">&nbsp;</td>
		  <th colspan="4"><p>-- Info Lapangan & Waktu --</p></th>
	    </tr>
		<tr>
		  <td rowspan="8" align="center" valign="top"><img src="admin/img/image/<?php echo $r['gambar'];?>" width="240" height="140" />&nbsp;&nbsp;&nbsp;</td>
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
	  <br /><br /><hr /><br />
	  <table width="526">
	    <tr>
		  <td colspan="3"><p><strong>Metode Pembayaran :</strong></p></td>
		</tr>
		<tr>
		  <td width="129"><input type="radio" checked="checked" name="pembayaran" /> Transfer Bank</td>
		  <td width="161"><img src="css/images/mandiri.jpg" width="147" height="63" /></td>
		  <td width="220"><div align="center">No. Rekening: <strong>166-00-0099859-1</strong> <br />
	      A/N <strong>Muhamad Syihabudin</strong></div></td>
		</tr>
	  </table>
	  <br>
	</div>
      <form action="booking-<?php echo $r[id_session];?>.html" method="post">
        <div style="float:right"><a class="button" href="javascript:Clickheretoprint()">Print</a></div>
      </form>          
    <div class="cl">&nbsp;</div>
  </section>
<?php
error_reporting(0);
  session_start();

  unset($ids);
?>