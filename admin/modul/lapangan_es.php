<?php
include_once ("koneksi.php");

koneksi();

$table = "lapangan";

//Agar dapat memasukan karakter spesial seperti ( ' , . dsb ) yang menyebabkan ERROR sql
function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}

$id_lapangan = antiinjection($_POST['id_lapangan']);
$nm_lapangan = antiinjection($_POST['nm_lapangan']);
$keterangan = isset($_REQUEST['keterangan']) ? $_REQUEST['keterangan'] : "" ;
$id_kategori = antiinjection($_POST['id_kategori']);
$harga = antiinjection($_POST['harga']);
$id = antiinjection($_POST['id']);

// Ubah Produk
if($_POST['proses'] == 'Send') {
  if ($nm_lapangan == '') {
    echo "<script>alert('Nama Lapangan harus diisi!');</script>";
    echo "<script>history.go(-1);</script>";
  } else if ($id_kategori == ''){
    echo "<script>alert('Kategori harus dipilih!');</script>";
    echo "<script>history.go(-1);</script>";
  } else if ($harga == ''){
    echo "<script>alert('Harga harus diisi!');</script>";
    echo "<script>history.go(-1);</script>";
  } else if ($keterangan == ''){
    echo "<script>alert('Keterangan harus di isi!');</script>";
    echo "<script>history.go(-1);</script>";
  } else {
    if($_FILES['gambar']['tmp_name'] == ''){
    $edit2="UPDATE lapangan SET nm_lapangan = '$nm_lapangan', keterangan = '$keterangan', id_kategori = '$id_kategori', harga = '$harga' WHERE id = '$id'";

    //kirim perintah query
    $query2=mysql_query($edit2) or die ("Gagal... 1".mysql_error());
    if(mysql_affected_rows() > 0) {
      header('location:../admin/admin.php?p=lapangan_e&bsi=edit');
    } else {
      header('location:../admin/admin.php?p=lapangan_e&bsi=gagal');
    } 
    } else {
      //Cek gambar
      $tipe_gambar = array('image/jpeg', 'image/bmp', 'image/x-png');
      $gbr = $_FILES['gambar']['name'];
      $ukuran = $_FILES['gambar']['size'];
      $tipe = $_FILES['gambar']['type'];
      $error = $_FILES['gambar']['error'];
      if($gbr !=="" && $ukuran > 0 && $error == 0){
      //if(in_array(strtolower($tipe), $tipe_gambar)){
        $move = move_uploaded_file($_FILES['gambar']['tmp_name'], 'img/image/'.$gbr);
        //}
        if($move == 1) {
          echo "Gambar berhasil dikirim".$gbr;
          $edit="UPDATE lapangan SET nm_lapangan = '$nm_lapangan', keterangan = '$keterangan', gambar = '$gbr', id_kategori = '$id_kategori', harga = '$harga' WHERE id = '$id'";

          //kirim perintah query
          $query=mysql_query($edit) or die ("Gagal".mysql_error());
          if(mysql_affected_rows() > 0) {
            header('location:../admin/admin.php?p=lapangan_e&bsi=edit');
          } else {
            header('location:../admin/admin.php?p=lapangan_e&bsi=gagal');
          }
        } else {
          echo "Gambar gagal dikirim!";
        }
      }
    }
  }
}
?>