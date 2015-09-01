<?php
include_once("koneksi.php");
koneksi();

date_default_timezone_set("Asia/Jakarta");

$tabel = "reservasi";
$auto = kdauto($tabel,"RVS");
$j_now = date("H:i:s");

if(isset($_SESSION['session'])){
  $ids = date("ymdHis");//membuat id transaksi yang unik berdasarkan waktu
  $_SESSION['session'] = $ids;
}
$ids = $_SESSION['session'];
?>
  <section class="post">
    <div style="float:left;">
    <form id-"form" action="detail-reservasi.html" method="post">
      <fieldset id="personal"> <input type="hidden" name="id_reservasi" value="<?php echo $auto;?>">
        <legend>RESERVASI</legend>
          <label>Tanggal : </label>
          <?php
          $tanggal ="";
          $hari = array("Sun"=>"Minggu","Mon"=>"Senin","Tue"=>"Selasa","Wed"=>"Rabu","Thu"=>"  Kamis","Fri"=>"Jum'at","Sat"=>"Sabtu");
          $bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

          $jumlah = 90; // Jumlah hari yang akan di tampilkan
          for ($i = 0; $i <= $jumlah; $i++) {
            $v = date("Y-m-d");
            $tgl = date('d') + $i;
            $strt = strtotime("$i days", strtotime($v));
            $hr =  date("D",$strt);
            $tg = date("d",$strt);
            $bl = date("m",$strt);
            $th = date("Y",$strt);
            $tanggal .= '<option value=' .$th."-".$bl."-".$tg.'>' .$hari[$hr].", ". $tg ." ". $bulan[$bl-1] ." ".$th.'</option>'; 
          }
            echo "<select name=tanggal><option value=> --Select Date-- </option>$tanggal</select>";
        ?>
          </select>
        <br />
        <label>Jam : </label>
          <select name="start">
            <option value=""> --Select Time-- </option>
            <?php  for ($jam=7; $jam <= 23; $jam++) { echo "<option value=\"$jam\">Jam $jam:00 </option>"; }  ?>
          </select>
          s/d
          <select name="end">
            <option value=""> --Select Time-- </option>
            <?php  for ($jam=8; $jam <= 24; $jam++) { echo "<option value=\"$jam\">Jam $jam:00 </option>"; }  ?>
          </select>
        <br />
        <label>Lapangan : </label>
          <select name="lapangan">
            <option value=""> --Select Field-- </option>
            <?php  
            $sql = mysql_query("select * from lapangan");
            while ($data = mysql_fetch_array($sql)) {  ?>
            <option value="<?php echo $data['id_lapangan']; ?>"> <?php echo $data['nm_lapangan']; ?> </option><?php } ?>
          </select>
        <br /><br />
        <div align="center">
          <input name="proses" id="button1" type="submit" value="Check" onclick='editor.post();' />
        </div>
      </fieldset>            
    </form>
    </div>
    <div style="float:right; margin-left:10px; margin-top:10px;">
      <ol><p><strong> Cara Reservasi </strong></p>
        <li> Buka halaman reservasi </li>
        <li> Pilih tanggal, jam mulai dan jam selesai. Kemudian tekan <br>tombol "Check" </li>
        <li> Setelah halaman detail reservasi muncul tekan tombol <br>"Booking" </li>
        <li> Apabila anda telah menjadi member maka cukup login pada <br>form login samping kanan dan tekan "Login". Bila belum, lakukan <br>registrasi pada form registrasi sebelah kiri dan tekan "Register" </li>
        <li> Setelah itu maka akan muncul halaman bukti reservasi dan <br>tekan "Print" </li>
        <li> Lakukan pembayaran sesuai metode yang ada pada halaman <br>bukti pembayaran </li>
        <li> Untuk <a href="syarat-ketentuan.html">Syarat & Ketentuan</a>, silahkan klik <a href="syarat-ketentuan.html">disini</a> </li>
      </ol>
    </div>          
    <div class="cl">&nbsp;</div>
  </section>