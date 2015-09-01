<?php
include_once("koneksi.php");
koneksi();

//Agar dapat memasukan karakter spesial seperti ( ' , . dsb ) yang menyebabkan ERROR sql
function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}
$id = $_SESSION['idm'];
$sandi_lama = antiinjection($_POST['sandi_lama']);
$sandi_baru = antiinjection($_POST['sandi_baru']);
$ulang_sandi = antiinjection($_POST['ulang_sandi']);

$d = mysql_fetch_array(mysql_query("SELECT password FROM member2 WHERE id_member = '$_SESSION[idm]'")) or die ("Gagal lagi".mysql_error());

//----------Ubah Sandi------------------------------------
if(isset($_POST['ubah'])) {
  if ($sandi_lama == '') {
    echo "<script>alert('Kata sandi lama harus di isi!');</script>";
    echo "<script>history.go(-1);</script>";
  } elseif ($sandi_lama == $_SESSION['password']) {
    echo "<script>alert('Kata sandi lama salah!');</script>";
    echo "<script>history.go(-1);</script>";
  } elseif ($sandi_baru == '') {
    echo "<script>alert('Kata sandi baru harus di isi!');</script>";
    echo "<script>history.go(-1);</script>";
  } elseif ($ulang_sandi == '') {
    echo "<script>alert('Ulang kata sandi harus di isi!');</script>";
    echo "<script>history.go(-1);</script>";
  } else {

  if ($sandi_baru == $ulang_sandi) {
    $edit = mysql_query("UPDATE member2 SET password = '$sandi_baru' WHERE id_member = '$id'") or die ("Gagal ganti sandi".mysql_error());
    if(mysql_affected_rows() > 0){
      echo "<script>alert('Sandi berhasil diubah!');window.location='change-password.html'</script>";
    } else {
      echo "<script>alert('Sandi gagal diubah!');window.location='change-password.html'</script>";
    }
  } else {
    echo "<script>alert('Ulang kata sandi harus sama!');</script>";
    echo "<script>history.go(-1);</script>";
  }
}
}