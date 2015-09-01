<section class="post"><h3> KONTAK KAMI </h3><hr><br />
  	<form action="" method="POST">
      <table>
        <tr>
          <td colspan="3"></td>
        </tr>
        <tr>
          <td colspan="3"></td>
        </tr>
        <tr>
          <td width="120">Nama</td>
          <td>:</td>
          <td><input type="text" name="nama" size="30"></td>
        </tr>
        <tr>
          <td>Email</td>
          <td>:</td>
          <td><input type="text" name="email" size="30"></td>
        </tr>
        <tr>
          <td>Subjek</td>
          <td>:</td>
          <td><input type="text" name="subjek" size="30"></td>
        </tr>
        <tr>
          <td valign="top">Pesan</td>
          <td valign="top">:</td>
          <td><textarea name="pesan" cols="40" rows="5"></textarea></td>
        </tr>
        <tr>
          <td colspan="3"><input type="submit" name="submit" value="Kirim" class="button"></td>
        </tr>
      </table>
      </form>
    <div class="cl">&nbsp;</div>
</section>

<?php
  if (isset($_POST['submit'])) {
    $polaemail = "^.+@.+\.((com)|(net)|(org)|(co.id))$";

    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $subjek = $_POST['subjek'];
    $pesan = $_POST['pesan'];
    if (empty($nama)) {
      echo "<script>alert('Nama tidak boleh kosong !');</script>";
        echo "<script>history.go(-1);</script>";
    } elseif (empty($email)) {
      echo "<script>alert('Email tidak boleh kosong !');</script>";
        echo "<script>history.go(-1);</script>";
      } elseif (!eregi($polaemail,$email)) {
      echo "<script>alert('Format email salah !');</script>";
        echo "<script>history.go(-1);</script>";
    } elseif (empty($subjek)) {
      echo "<script>alert('Subjek tidak boleh kosong !');</script>";
        echo "<script>history.go(-1);</script>";
    } elseif (empty($pesan)) {
      echo "<script>alert('Pesan tidak boleh kosong !');</script>";
        echo "<script>history.go(-1);</script>";
    } else {
      mail("muhamads0509@bsi.ac.id",$subjek,$pesan,$email);
      echo "<script>alert('Pesan Anda telah terkirim !');</script>";
        echo "<script>history.go(-1);</script>";
    }
  }
  ?>