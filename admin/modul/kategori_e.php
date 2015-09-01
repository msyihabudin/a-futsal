<?php
error_reporting(0);

koneksi();
$tabel = "kategori";

//ambil nilai variabel URL
$id=$_GET['id'];

$query="SELECT * FROM $tabel WHERE id = '$id'";
//echo $query;
$hasil = mysql_query($query);
while ($data = mysql_fetch_array($hasil))
    {   

    if(mysql_affected_rows() > 0)
        {
        $id_kategori=$data["id_kategori"];
        $kategori=$data["kategori"];
        }
    else
        {
        echo "<script>alert('Maaf, record tidak ditemukan');</script>";
        echo "<script>history.go(-1);</script>";
        }
    }

?>

<center>
    <div id="notif" align="center">
        <?php
        if($_GET['bsi']=='edit'){
            echo"<div class=\"n_ok\"><p> Data Berhasil Diubah ! </p></div>";
            echo "<meta http-equiv=\"refresh\" content=\"2; url=admin.php?p=kategori_l\">";
        }
 
        elseif($_GET['bsi']=='gagal'){
            echo"<div class=\"n_error\"><p>Data Tidak Berhasil Diubah !</p></div>";
        }
        ?>
    </div>
</center>
<h3 class="page-header"> <a href="?p=kategori" class="folder"> Add Category </a></h3>
    <form id="form" action="?p=kategori_es" method="post" enctype="multipart/form-data">
        <fieldset id="personal">
            <legend>CATEGORY INFORMATION</legend>
            <label for="id_kategori">ID Kategori : </label>
            <input id="id_kategori" name="id_kategori" type="text" value="<?php echo $id_kategori; ?>" disabled="disabled"/>
            <input id="id_kategori" name="id_kategori" type="hidden" value="<?php echo $id_kategori; ?>"/>
            <br />
            <label for="kategori">Kategori : </label>
            <textarea name="kategori"><?php echo $kategori; ?></textarea>
            <br />
        </fieldset>
        <div align="center">
            <input name="proses" id="button1" type="submit" value="Send" onclick='editor.post();' />
            <input id="button2" type="reset" />
        </div>
    </form>