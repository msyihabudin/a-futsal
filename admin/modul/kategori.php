<?php
error_reporting(0);
//include "../koneksi.php";

koneksi();
//nama tabel
$tabel = "kategori";

include "../lib/inc.librari.php";

$auto = kdauto($tabel,"KAT");

?>

<center>
    <div id="notif" align="center">
        <?php
        if($_GET['bsi']=='tambah'){
            echo"<div class=\"n_ok\"><p> Data Berhasil Ditambahkan ! </p></div>";
            echo "<meta http-equiv=\"refresh\" content=\"2; url=admin.php?p=kategori_l\">";
        }
 
        elseif($_GET['bsi']=='gagal'){
            echo"<div class=\"n_error\"><p>Data Tidak Berhasil Ditambahkan !</p></div>";
        }
        ?>
    </div>
</center>
<h3 class="page-header"> <a href="kategori.php"> Add Category </a></h3>
  <form id="form" action="?p=kategori_t" method="post" enctype="multipart/form-data">
    <fieldset id="personal">
     <legend>CATEGORY INFORMATION</legend>
        <label for="id_kategori">ID Kategori : </label>
        <input id="id_kategori" name="id_kategori" type="text" value="<?php echo $auto; ?>" disabled="disabled"/>
        <input id="id_kategori" name="id_kategori" type="hidden" value="<?php echo $auto; ?>"/>
        <br />
        <label for="kategori">Kategori : </label>
        <textarea name="kategori"></textarea>
        <br />
    </fieldset>
    <div align="center">
      <input name="proses" id="button1" type="submit" value="Send" onclick='editor.post();' />
      <input id="button2" type="reset" />
    </div>
</form>