<?php
error_reporting(0);
//include "../koneksi.php";

koneksi();
//nama tabel
$tabel = "lapangan";

include "../lib/inc.librari.php";

$auto = kdauto($tabel,"LAP");

?>

<center>
    <div id="notif" align="center">
        <?php
        if($_GET['bsi']=='tambah'){
            echo"<div class=\"n_ok\"><p> Data Berhasil Ditambahkan ! </p></div>";
            echo "<meta http-equiv=\"refresh\" content=\"2; url=admin.php?p=lapangan_l\">";
        }
 
        elseif($_GET['bsi']=='gagal'){
            echo"<div class=\"n_error\"><p>Data Tidak Berhasil Ditambahkan !</p></div>";
        }
        ?>
    </div>
</center>
<h3 class="page-header"> <a href="lapangan.php"> Add Field </a></h3>
  <form id="form" action="?p=lapangan_t" method="post" enctype="multipart/form-data">
    <fieldset id="personal">
     <legend>ARENA INFORMATION</legend>
        <label for="id_lapangan">ID Lapangan : </label>
        <input id="id_lapangan" name="id_lapangan" type="text" value="<?php echo $auto; ?>" disabled="disabled"/>
        <input id="id_lapangan" name="id_lapangan" type="hidden" value="<?php echo $auto; ?>"/>
        <br />
        <label for="nm_lapangan">Nama Lapangan : </label>
        <input id="nm_lapangan" size="30" type="text" name="nm_lapangan">
        <br />
        <label for="id_kategori">ID Kategori : </label>
        <select name="id_kategori">
          <option value=""> --Select Category-- </option>
          <?php

          $tabel2 = "kategori";
          $sql = "select * from $tabel2";
          $qry = mysql_query($sql) or die ("ERROR..".mysql_error());
          while ($data = mysql_fetch_array($qry)) {
          ?>
          <option value="<?php echo $data['id_kategori']; ?>"> <?php echo $data['kategori']; ?> </option><?php } ?>
        </select>
        <br />
        <label>Gambar : </label>
        <input name="gambar" id="gambar" type="file" />
        <br />
        <label>Harga Sewa : Rp.</label>
        <input name="harga" id="harga" type="text">,-
        <br />
        <label>Keterangan : </label>
        <div class="clearer"></div>
        <center>
        <textarea name="keterangan" id="tinyeditor" class="textarea" rows="10" ><?php if ($keterangan) echo $keterangan;  ?></textarea>
        <script>
        var editor = new TINY.editor.edit('editor', {
          id: 'tinyeditor',
          width: 700,
          height: 150,
          cssclass: 'tinyeditor',
          controlclass: 'tinyeditor-control',
          rowclass: 'tinyeditor-header',
          dividerclass: 'tinyeditor-divider',
          controls: ['bold', 'italic', 'underline', 'strikethrough', '|', 'subscript', 'superscript', '|', 'orderedlist', 'unorderedlist', '|', 'outdent', 'indent', '|', 'leftalign', 'centeralign', 'rightalign', 'blockjustify', '|', 'unformat', '|', 'undo', 'redo', 'n', 'font', 'size', 'style', '|', 'image', 'hr', 'link', 'unlink', '|', 'print'],
          footer: true,
          fonts: ['Verdana','Calibri','Arial','Georgia','Trebuchet MS'],
          xhtml: true,
          cssfile: 'custom.css',
          bodyid: 'editor',
          footerclass: 'tinyeditor-footer',
          toggle: {text: 'source', activetext: 'wysiwyg', cssclass: 'toggle'},
          resize: {cssclass: 'resize'}});
        </script>
        <br /></center>
    </fieldset>
    <div align="center">
      <input name="proses" id="button1" type="submit" value="Send" onclick='editor.post();' />
      <input id="button2" type="reset" value="Reset" />
    </div>
</form>