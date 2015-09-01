<?php
include_once ("koneksi.php");

koneksi();

$table = "user";

$namalengkap = $_POST['namalengkap'];
$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];
$email = $_POST['email'];
$level = $_POST['level'];
$blokir = $_POST['blokir'];


// Input Produk
if($_POST['proses'] == 'Send') {

  if ($namalengkap == '') {
    echo "<script>alert('Nama Lengkap harus di isi!');window.location='admin.php?p=user'</script>";
  } elseif ($username == '') {
    echo "<script>alert('Nama User harus di isi!');window.location='admin.php?p=user'</script>";
  } elseif ($password == '') {
    echo "<script>alert('Kata Sandi harus di isi!');window.location='admin.php?p=user'</script>";
  } elseif ($password2 == '') {
    echo "<script>alert('Ulang Kata Sandi harus di isi!');window.location='admin.php?p=user'</script>";
  } elseif ($email == '') {
    echo "<script>alert('Email harus di isi!');window.location='admin.php?p=user'</script>";
  } elseif ($level == '') {
    echo "<script>alert('Anda harus memilih Level user!');window.location='admin.php?p=user'</script>";
  } else {
  if ($_POST['password'] == $_POST['password2']) {
    $input="INSERT INTO $table (namalengkap, username, password, email, blokir, level)
            VALUES ('$namalengkap', '$username', '$password', '$email', '$blokir', '$level')";

    //kirim perintah query
    $query=mysql_query($input) or die ("Gagal".mysql_error());

    if(mysql_affected_rows() > 0){
      header('location:../admin/admin.php?p=user&bsi=tambah');
    } else {
      header('location:../admin/admin.php?p=user&bsi=gagal');
    } 
  } else {
    header('location:../admin/admin.php?p=user&bsi=gagal_pass');
  }

}
}
?>