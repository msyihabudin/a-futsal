<?php
$tabel = "member2";
$auto = kdauto($tabel,"ID");
$ids = $_GET['id'];
?>
<section class="post">
  <form id-"form" action="getting-<?php echo $ids;?>.html" method="post"><input type="hidden" name="id_member" value="<?php echo $auto;?>"><input type="text" name="id_member" value="<?php echo $auto;?>" disabled="disabled">
  <h3 align="center" style="font-color: #000;">Member Area</h3><br>
  <div style="float:left">
    <table>
      <tr>
    	<th colspan="3"> Belum menjadi member </th>
   	  </tr>
	  <tr>
        <td width="154">Nama Lengkap </td>
		<td width="3">:</td>
		<td width="200"><input type="text" name="nm_lengkap" size="30"></td>
	  </tr>
	  <tr>
		<td>Nama User </td>
		<td>:</td>
		<td><input type="text" name="username" size="30"></td>
	  </tr>
	  <tr>
		<td>Kata Sandi </td>
		<td>:</td>
	    <td><input type="password" name="password" size="30"></td>
	  </tr>
	  <tr>
		<td>Ulang Kata Sandi </td>
		<td>:</td>
		<td><input type="password" name="r_password" size="30"></td>
	  </tr>
	  <tr>
		<td>Email</td>
		<td>:</td>
		<td><input type="text" name="email" size="30"></td>
	  </tr>
	  <tr>
		<td valign="top">Alamat</td>
		<td valign="top">:</td>
		<td><textarea name="alamat"></textarea></td>
	  </tr>
	  <tr>
		<td>No. Hp </td>
		<td>:</td>
		<td><input type="text" name="no_hp" size="30"></td>
	  </tr>
	  <tr>
		<td>No. KTP/Kartu Pelajar </td>
		<td>:</td>
		<td><input type="text" name="no_ktp" size="30"></td>
	  </tr>
	  <tr>
	    <td colspan="3">
		  <div align="right"><input name="daftar" id="button1" type="submit" value="Register" onclick='editor.post();' /></div>	    </td>
	  </tr>
	</table>
	</div>
	<div style="float:right">         
    <table>
      <tr>
        <th colspan="3"> Sudah menjadi member </th>
      </tr>
      <tr>
        <td width="144">Nama User </td>
        <td width="3">:</td>
        <td width="200"><input type="text" name="username_l" size="30" /></td>
      </tr>
      <tr>
        <td>Kata Sandi </td>
        <td>:</td>
        <td><input type="password" name="password_l" size="30" /></td>
      </tr>
      <tr>
        <td colspan="3"><div align="right">
            <input name="login" id="button1" type="submit" value="Login" onclick='editor.post();' />
        </div></td>
      </tr>
    </table>
	</div>
  </form> 
<div class="cl">&nbsp;</div>
</section>