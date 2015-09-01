<h3 class="page-header"> <a href=""> Member Detail </a></h3>       
<div class="clearer"></div>
<?php

include_once("koneksi.php");
include_once("../lib/class_paging.php");
koneksi();
 
  $id_member = $_GET['id_member'];

  //tampilin data
  $t = mysql_fetch_array(mysql_query("SELECT * FROM member2 WHERE id_member = '$id_member'"));
  
  ?>

  <table>
	<tr>
		<td width="100">Nama Lengkap</td>
		<td width="2">:</td>
		<td><?php echo $t['namalengkap']; ?></td>
	</tr>
	<tr>
		<td>Username</td>
		<td>:</td>
		<td><?php echo $t['username']; ?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>:</td>
		<td><?php echo $t['email']; ?></td>
	</tr>
	<tr>
		<td>No Hp</td>
		<td>:</td>
		<td><?php echo $t['no_hp']; ?></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td><?php echo $t['alamat']; ?></td>
	</tr>
	<tr>
		<td>No Ktp/Kartu Pelajar</td>
		<td>:</td>
		<td><?php echo $t['no_ktp']; ?></td>
	</tr>
  </table>