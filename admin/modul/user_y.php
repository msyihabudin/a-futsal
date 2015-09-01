<?php
include_once ("koneksi.php");

koneksi();

$tabel = "user";

//Agar dapat memasukan karakter spesial seperti ( ' , . dsb ) yang menyebabkan ERROR sql
function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}

//ambil nilai variabel URL
$id=$_GET['id'];

  $edit="UPDATE $tabel SET blokir = 'N' WHERE id = '$id'";
  
  //kirim perintah query
  $query=mysql_query($edit) or die ("Gagal".mysql_error());

  if(mysql_affected_rows() > 0){
    echo "<script>alert('User berhasil di unblokir !');</script>";
    echo "<script>history.go(-1);</script>";
  } else {
    echo "<script>alert('User tidak berhasil di unblokir, coba ulangi lagi');</script>";
    echo "<script>history.go(-1);</script>";
  }
?>