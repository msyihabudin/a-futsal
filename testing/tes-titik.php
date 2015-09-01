<?php

include_once("../koneksi.php");
koneksi();

for ($i = 1; $i <= 10; $i++) {
    echo $i."<br>";
}

$tampil = mysql_query("SELECT * FROM member WHERE username = 'saya'") or die ("Gagal".mysql_error());
			$d = mysql_fetch_array($tampil);
			$jml_kata = strlen($d['password']);?>
			
			<h2>Selamat Anda telah terdaftar!</h2>
			<table border="0">
			  <tr>
			    <td>Nama Lengkap</td>
				<td>:</td>
				<td><?php echo $d['namalengkap'];?></td>
				<td width="50">&nbsp;</td>				
				<td>No. Hp</td>
				<td>:</td>
				<td><?php echo $d['no_hp'];?></td>
			  </tr>
			  <tr>
			    <td>Nama User</td>
				<td>:</td>
				<td><?php echo $d['username'];?></td>
				<td>&nbsp;</td>
				<td>No.KTP/ Kartu Pelajar</td>
				<td>:</td>
				<td><?php echo $d['no_ktp'];?></td>				
			  </tr>
			  <tr>
			    <td>Kata Sandi</td>
				<td>:</td>
				<td><?php for($i=0; $i <= $jml_kata; $i++){ echo "*"; } ?></td>
				<td>&nbsp;</td>
				<td valign="top" rowspan="3">ALamat</td>
				<td valign="top" rowspan="3">:</td>
				<td valign="top" rowspan="3"><?php echo $d['alamat'];?></td>								
			  </tr>
			  <tr>
			    <td>Email</td>
				<td>:</td>
				<td><?php echo $d['email'];?></td>
				<td>&nbsp;</td>		
			  </tr>
			  <tr>
			    <td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>		
			  </tr>
			</table>