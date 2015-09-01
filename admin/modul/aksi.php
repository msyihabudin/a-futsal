<?php
include_once ("../../koneksi.php");
koneksi();
$id = $_GET['id'];
$tgl = date("Y-m-d");
$jam = date("H:i:s");

if (isset($_POST['Submit'])) {
  if($_POST['aksi']=='Disetujui' OR $_POST['aksi']=='Tidak Disetujui' OR $_POST['aksi']=='Dibatalkan' OR $_POST['aksi']=='Pembatalan Disetujui' OR $_POST['aksi']=='Pembatalan Tidak Disetujui'){
    $query = mysql_query("UPDATE reservasi SET status = '$_POST[aksi]', tgl_reservasi = '$tgl', jam_reservasi = '$jam' WHERE id_reservasi = '$id'");
    header('location:admin.php?p=reservasi_l&bsi=ubah');
  } elseif ($_POST['aksi']=='Hapus') {
    $query = mysql_query("DELETE FROM reservasi WHERE id_reservasi = '$id'");
    header('location:admin.php?p=reservasi_l&bsi=hapus');
  } else {
    echo "<script>alert('Anda harus memilih tindakan!');</script>";
    echo "<script>history.go(-1);</script>";
  }

  if (mysql_affected_rows() > 0) {
  	echo "<script>alert('Data berhasil diubah!');windows.location:admin.php?p=reservasi_l</script>";
  } else {
  	echo "<script>alert('Data gagal diubah!');windows.location:admin.php?p=reservasi_l</script>";
  }
}


?>