<?php
include_once ("koneksi.php");
koneksi();

$table = "kategori";

$id_kategori = $_POST['id_kategori'];
$kategori = $_POST['kategori'];

// Input Siswa
if($_POST['proses'] == 'Send') {
	if ($kategori == '') {
		echo "<script>alert('Kategori harus di isi!');window.location='admin.php?p=kategori'</script>";
	} else {
  		$input="INSERT INTO $table (id_kategori, kategori)
          VALUES ('$id_kategori', '$kategori')";
    }

  //kirim perintah query
  $query=mysql_query($input) or die ("Gagal".mysql_error());

  if(mysql_affected_rows() > 0) {
    header('location:../admin/admin.php?p=kategori&bsi=tambah');
  } else {
    header('location:../admin/admin.php?p=kategori&bsi=gagal');
  }
}
?>