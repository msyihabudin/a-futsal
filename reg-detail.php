<?php
include_once("koneksi.php");
koneksi();
?>
<section class="post">
<?php
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}
		
if (isset($_POST['proses'])) {
  $polaemail = "^.+@.+\.((com)|(net)|(org)|(co.id)|(ac.id))$";
  $idm = $_POST['id_member'];		
  $nm_lengkap = $_POST['nm_lengkap'];
  $username = anti_injection($_POST['username']);
  $password = anti_injection($_POST['password']);
  $r_password = anti_injection($_POST['r_password']);
  $email = $_POST['email'];
  $no_hp = $_POST['no_hp'];
  $alamat = $_POST['alamat'];
  $no_ktp = $_POST['no_ktp'];
		
  //cek agar username tidak sama dengan username lain
  $cari = mysql_num_rows(mysql_query("SELECT username FROM member2 WHERE username LIKE '$username'"));
		
  //validasi
  if (empty($nm_lengkap)) {
	echo "<script>alert('Nama lengkap tidak boleh kosong !');</script>";
	echo "<script>history.go(-1);</script>";
  } elseif (empty($username)) {
	echo "<script>alert('Nama user tidak boleh kosong !');</script>";
	echo "<script>history.go(-1);</script>";
  } elseif ($cari > 0) {
	echo "<script>alert('Nama user tidak tersedia !');</script>";
	echo "<script>history.go(-1);</script>";
  } elseif (empty($password)) {
	echo "<script>alert('Kata sandi tidak boleh kosong !');</script>";
	echo "<script>history.go(-1);</script>";
  } elseif ($password != $r_password) {
	echo "<script>alert('Ulang kata sandi tidak sama !');</script>";
	echo "<script>history.go(-1);</script>";
  } elseif (empty($email)) {
	echo "<script>alert('Email tidak boleh kosong !');</script>";
	echo "<script>history.go(-1);</script>";
  } elseif (!eregi($polaemail,$email)) {
	echo "<script>alert('Format email salah !');</script>";
	echo "<script>history.go(-1);</script>";
  } elseif (empty($no_hp)) {
	echo "<script>alert('No Hp tidak boleh kosong !');</script>";
	echo "<script>history.go(-1);</script>";
  } elseif (empty($alamat)) {
	echo "<script>alert('Alamat tidak boleh kosong !');</script>";
	echo "<script>history.go(-1);</script>";
  } elseif (empty($no_ktp)) {
	echo "<script>alert('No KTP tidak boleh kosong !');</script>";
	echo "<script>history.go(-1);</script>";
  } else {
	//Input member
	$input = mysql_query("INSERT INTO member2 SET id_member = '$idm', namalengkap = '$nm_lengkap', username = '$username', password = '$password', email = '$email', no_hp = '$no_hp', alamat = '$alamat', no_ktp = '$no_ktp'") or die ("Gagal!......".mysql_error());
  }
  //Bila $input bernilai benar maka ditampilkan		  
  if($input > 0){
  	$idm = $_GET['id'];
	$tampil = mysql_query("SELECT * FROM member2 WHERE id_member = '$idm'") or die ("Gagal".mysql_error());
	$d = mysql_fetch_array($tampil);
	$jml_kata = strlen($d['password']);
?>
  <h2>Selamat Anda telah terdaftar!</h2>
  <table width="700" border="0">
    <tr>
      <td width="150">Nama Lengkap</td>
      <td width="10">:</td>
      <td width="170"><?php echo $d['namalengkap'];?></td>
      <td width="10">&nbsp;</td><td width="150">Nama User</td>
      <td width="10">:</td>
      <td width="170"><?php echo $d['username'];?></td>				
	</tr>
	<tr>
	  <td>Kata Sandi</td><td>:</td><td><?php for($i=0; $i < $jml_kata; $i++){ echo "*"; } ?></td><td>&nbsp;</td><td>Email</td><td>:</td><td><?php echo $d['email'];?></td>
	</tr>
	<tr>
	  <td>No. Hp</td><td>:</td><td><?php echo $d['no_hp'];?></td><td>&nbsp;</td><td valign="top" rowspan="2">Alamat</td><td valign="top" rowspan="2">:</td><td valign="top" rowspan="2"><?php echo $d['alamat'];?></td>
	</tr>
	<tr>
	  <td>No.KTP/ Kartu Pelajar</td><td>:</td><td><?php echo $d['no_ktp'];?></td><td>&nbsp;</td>
	</tr>
</table><br><br>
  <h3>Silahkan <strong>Login</strong> untuk melanjutkan!</h4>
<?php }} ?>
<div class="cl">&nbsp;</div>
</section>