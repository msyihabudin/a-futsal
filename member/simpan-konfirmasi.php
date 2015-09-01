<?php
include_once("koneksi.php");
koneksi();

//Agar dapat memasukan karakter spesial seperti ( ' , . dsb ) yang menyebabkan ERROR sql
function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}

$ids = $_GET['id'];
$id = $_SESSION['idm'];
$no_rek = antiinjection($_POST['no_rek']);
$an = antiinjection($_POST['an']);
$g = $_FILES['gambar_bukti']['tmp_name'];
$tgl = date("Y-m-d");
$jam = date("H:i:s");

//----------Ubah Sandi------------------------------------
if(isset($_POST['proses'])) {
  if ($no_rek == '') {
    echo "<script>alert('Nomor rekening harus di isi!');</script>";
    echo "<script>history.go(-1);</script>";
  } elseif ($an == '') {
    echo "<script>alert('Atas nama harus di isi!');</script>";
    echo "<script>history.go(-1);</script>";
  } elseif ($g == '') {
    echo "<script>alert('Bukti gambar harus di isi!');</script>";
    echo "<script>history.go(-1);</script>";
  } else {

  //Cek gambar
    $tipe_gambar = array('image/jpeg', 'image/bmp', 'image/x-png');
    $gbr = $_FILES['gambar_bukti']['name'];
    $ukuran = $_FILES['gambar_bukti']['size'];
    $tipe = $_FILES['gambar_bukti']['type'];
    $error = $_FILES['gambar_bukti']['error'];
    if($gbr !=="" && $ukuran > 0 && $error == 0){
    //if(in_array(strtolower($tipe), $tipe_gambar)){
      $move = move_uploaded_file($_FILES['gambar_bukti']['tmp_name'], 'member/bukti_pembayaran/'.$gbr);
    //}
      if($move == 1) {
        echo "Gambar berhasil dikirim".$gbr;
        $update = mysql_query("UPDATE reservasi SET status = 'Sudah Konfirmasi', tgl_reservasi = '$tgl', jam_reservasi = '$jam'  WHERE id_reservasi = '$ids'");

        $input="INSERT INTO pembayaran SET id_reservasi = '$ids', no_rek = '$no_rek', atas_nama = '$an', gambar_bukti = '$gbr'";

      //kirim perintah query
        $query=mysql_query($input) or die ("Gagal".mysql_error());
        if(mysql_affected_rows() > 0) {
          echo "<script>alert('Terima kasih! Konfirmasi telah dilakukan.');window.location='konfirmasi-$ids.html'</script>";
        } else {
          echo "<script>alert('Maaf! Konfirmasi gagal dilakukan.');</script>";
          echo "<script>history.go(-1);</script>";
        }
      } else {
        echo "Gambar gagal dikirim!";
      }
    }
  }
}
?>