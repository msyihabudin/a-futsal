<?php
include_once ("koneksi.php");

koneksi();

$table = "lapangan";

$id_lapangan = $_POST['id_lapangan'];
$nm_lapangan = $_POST['nm_lapangan'];
$id_kategori = $_POST['id_kategori'];
$harga = $_POST['harga'];
$keterangan = isset($_REQUEST['keterangan']) ? $_REQUEST['keterangan'] : "" ;


// Input Produk
if($_POST['proses'] == 'Send') {
	if ($nm_lapangan == '') {
		echo "<script>alert('Nama Lapangan harus diisi!');window.location='admin.php?p=lapangan'</script>";
	} else if ($id_kategori == ''){
    echo "<script>alert('Kategori harus dipilih!');window.location='admin.php?p=lapangan'</script>";
  } elseif ($_FILES['gambar']['tmp_name'] == '') {
    echo "<script>alert('Anda harus memilih Gambar!');window.location='admin.php?p=lapangan'</script>";
  } elseif ($harga == '') {
    echo "<script>alert('Harga harus diisi!');window.location='admin.php?p=lapangan'</script>";
  } else if ($keterangan == ''){
    echo "<script>alert('Keterangan harus diisi!');window.location='admin.php?p=lapangan'</script>";
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
        $input="INSERT INTO $table (id_lapangan, nm_lapangan, gambar, keterangan, id_kategori, harga)
          VALUES ('$id_lapangan', '$nm_lapangan', '$gbr', '$keterangan', '$id_kategori', '$harga')";

      //kirim perintah query
        $query=mysql_query($input) or die ("Gagal".mysql_error());
        if(mysql_affected_rows() > 0) {
          header('location:../admin/admin.php?p=lapangan&bsi=tambah');
        } else {
          header('location:../admin/admin.php?p=lapangan&bsi=gagal');
        }
      } else {
        echo "Gambar gagal dikirim!";
      }
    }
  }
}
?>