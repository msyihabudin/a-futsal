<?php
session_start();

if (empty($_SESSION[namauser]) AND empty($_SESSION[passuser])) {
  echo "<script>alert('Maaf, Untuk mengakses halaman anda harus login terlebih dahulu.');</script>";
  echo "<script>history.go(-1);</script>";
} else {

date_default_timezone_set("Asia/Jakarta");

?>
<style type="text/css">
<!--
.style2 {color: #FFFFFF}
-->
</style>

<section class="post">
<h2>CHANGE PASSWORD</h2><hr><br>
<form action="savenewpassword-<?php echo $_SESSION['idm'];?>.html" method="post">
  <table>
    <tr>
      <td> Kata Sandi Lama </td>
      <td> : </td>
      <td> <input type="password" name="sandi_lama" size="30"> </td>
    </tr>
    <tr>
      <td> Kata Sandi Baru </td>
      <td> : </td>
      <td> <input type="password" name="sandi_baru" size="30"> </td>
    </tr>
    <tr>
      <td> Ulang Kata Sandi Baru </td>
      <td> : </td>
      <td> <input type="password" name="ulang_sandi" size="30"> </td>
    </tr>
    <tr>
      <td colspan="3" align="right"><input type="submit" name="ubah" id="button1" value="Ubah"></td>
    </tr>
  </table>
</form>
  <div class="cl">&nbsp;</div>
</section>
<?php
}
?>