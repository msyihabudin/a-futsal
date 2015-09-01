<?php 
$tabel = "member2";
$auto = kdauto($tabel,"ID");
?>
<section class="post">
  <form id-"form" action="registrasi-detail-<?php echo $auto;?>.html" method="post"><input type="hidden" name="id_member" value="<?php echo $auto;?>">
  <fieldset><legend> REGISTRASI MEMBER </legend>
  <table width="100%">
    <tr>
      <td>Nama Lengkap</td><td>:</td><td><input type="text" name="nm_lengkap" size="30"> </td><td width="50">&nbsp;</td><td>Nama User</td><td>:</td><td><input type="text" name="username" size="30"></td>	
    </tr>
    <tr>
      <td>Kata Sandi</td><td>:</td><td><input type="password" name="password" size="30"></td><td>&nbsp;</td><td>Ulangi Kata Sandi</td><td>:</td><td><input type="password" name="r_password" size="30"></td>								
    </tr>
    <tr>
      <td>Email</td><td>:</td><td><input type="text" name="email" size="30"></td><td>&nbsp;</td><td valign="top" rowspan="3">Alamat</td><td valign="top" rowspan="3">:</td><td valign="top" rowspan="3"><textarea name="alamat"></textarea></td>								
    </tr>
    <tr>
      <td>No. Hp</td><td>:</td><td><input type="text" name="no_hp" size="30"></td><td>&nbsp;</td>
    </tr>
    <tr>
      <td>No.KTP/ Kartu Pelajar</td><td>:</td><td><input type="text" name="no_ktp" size="30"></td><td>&nbsp;</td>		
    </tr>
    <tr><td colspan="7">&nbsp;</td></tr>
    <tr>
      <td colspan="7">
      <div align="center">
        <input name="proses" id="button1" type="submit" value="Register" onclick='editor.post();' />
        <input id="button2" type="reset" value="Cancel" />
      </div>
	  </td>
	</tr>
  </table>
  </fieldset>         
</form>
<div class="cl">&nbsp;</div>
</section>