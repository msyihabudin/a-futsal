<?php
include_once ("koneksi.php");

koneksi();

$tabel = "user";

//Agar dapat memasukan karakter spesial seperti ( ' , . dsb ) yang menyebabkan ERROR sql
function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}
$id = $_POST['id'];
$namalengkap = $_POST['namalengkap'];
$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$email = $_POST['email'];
$level = $_POST['level'];
$blokir = $_POST['blokir'];

$d=mysql_num_rows(mysql_query("SELECT * FROM $tabel WHERE id='$_POST[id]'"));

// Input Produk
if($_POST['proses'] == 'Send') {

  if ($namalengkap == '') {
    echo "<script>alert('Nama Lengkap harus di isi!');</script>";
    echo "<script>history.go(-1);</script>";
  } elseif ($username == '') {
    echo "<script>alert('Nama User harus di isi!');</script>";
    echo "<script>history.go(-1);</script>";
  } elseif ($password == '') {
    echo "<script>alert('Kata Sandi harus di isi!');</script>";
    echo "<script>history.go(-1);</script>";
  } elseif ($password2 == '') {
    echo "<script>alert('Ulang Kata Sandi harus di isi!');</script>";
    echo "<script>history.go(-1);</script>";
  } elseif ($email == '') {
    echo "<script>alert('Email harus di isi!');</script>";
    echo "<script>history.go(-1);</script>";
  } elseif ($level == '') {
    echo "<script>alert('Anda harus memilih Level user!');</script>";
    echo "<script>history.go(-1);</script>";
  } else {

  if ($_POST['password'] == $_POST['password2']) {

    $edit="UPDATE $tabel SET namalengkap = '$namalengkap', username = '$username', password = '$password', email = '$email', blokir = '$blokir', level = '$level' WHERE id = '$id'";

        //kirim perintah query
        $query=mysql_query($edit) or die ("Gagal".mysql_error());

        if(mysql_affected_rows() > 0){
          header('location:../admin/admin.php?p=profil_e&bsi=edit');
        } else {
          header('location:../admin/admin.php?p=profil_e&bsi=gagal');
        }
    
  } else {
    echo "<script>alert('Ulang Kata Sandi harus sama !');</script>";
    echo "<script>history.go(-1);</script>";
  }

}
}
?>