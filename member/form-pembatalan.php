<?php
$ids = $_GET['id'];
?>
  <section class="post">
    <form id="form" action="simpan-konfirmasi-<?php echo $ids;?>.html" method="post" enctype="multipart/form-data">
      <h3>Form Pembatalan</h3><hr><br>
      <table>
        <tr>
          <td>Nomor Rekening</td>
          <td>:</td>
          <td><input type="text" name="no_rek" size="30"></td>
        </tr>
        <tr>
          <td>Atas Nama</td>
          <td>:</td>
          <td><input type="text" name="an" size="30"></td>
        </tr>
        <tr>
          <td>Bukti Gambar</td>
          <td>:</td>
          <td><input name="gambar_bukti" id="gambar" type="file" /> *)Silahkan upload struk bukti pembayaran anda</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td><input name="proses" id="button1" type="submit" value="Confirm" /></td>
        </tr>
      </table>         
    </form>        
    <div class="cl">&nbsp;</div>
  </section>