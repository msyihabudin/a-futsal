<?php
include_once ("koneksi.php");

koneksi();

$tabel = "kategori";

//Agar dapat memasukan karakter spesial seperti ( ' , . dsb ) yang menyebabkan ERROR sql
function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}

$id_kategori = antiinjection($_POST['id_kategori']);
$kategori = antiinjection($_POST['kategori']);

// Input Siswa
if($_POST['proses'] == 'Send') {
  if ($kategori == '') {
    echo "<script>alert('Kategori harus di isi!');</script>";
    echo "<script>history.go(-1);</script>";
  } else {
  $edit="UPDATE $tabel SET kategori = '$kategori' WHERE id_kategori = '$id_kategori'";
}

  //kirim perintah query
  $query=mysql_query($edit) or die ("Gagal... ".mysql_error());

  if(mysql_affected_rows() > 0) {
    header('location:../admin/admin.php?p=kategori_e&bsi=edit');
  } else {
    header('location:../admin/admin.php?p=kategori_e&bsi=gagal');
  }
}
?>