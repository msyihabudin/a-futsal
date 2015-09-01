<?php
// Halaman utama (Home)
if ($_GET[module]=='home'){  
    $qry = mysql_query("SELECT * FROM lapangan, kategori WHERE lapangan.id_kategori = kategori.id_kategori ORDER BY lapangan.id_lapangan DESC");
    while ($h = mysql_fetch_array($qry)) {
      echo "
      <section class=\"post\">
      <div class=\"img-holder\"> <img src=\"admin/img/image/$h[gambar]\" width=\"435\" height=\"245\" alt=> </div>
        <div class=\"post-cnt\">
          <h2>$h[nm_lapangan] ($h[kategori])</h2>
          <p>$h[keterangan]</p>
        </div>
      <div class=\"cl\">&nbsp;</div>
  </section>"; }

//-----------Modul Reservasi-------------------
} elseif ($_GET[module]=='reservasi'){
  include"modul/reservasi.php";
} elseif ($_GET[module]=='checking'){
  include"modul/checking.php";
} elseif ($_GET[module]=='detail-reservasi'){
  include"modul/detail-reservasi.php";
} elseif ($_GET[module]=='booking') {
  include"modul/booking.php";
} elseif ($_GET[module]=='login-member') {
  include"modul/login-member.php";
} elseif ($_GET[module]=='getting') {
  include"modul/getting.php";
} elseif ($_GET[module]=='bukti-reservasi') {
  include"modul/bukti-reservasi.php";
//-----------End Modul Reservasi----------------

//-----------Halaman Member---------------------
} elseif ($_GET[module]=='index-member'){
include"member/index-member.php";
} elseif ($_GET[module]=='ganti-sandi'){
include"member/ganti-sandi.php";
} elseif ($_GET[module]=='savenewpassword'){
include"member/ganti-sandi-simpan.php";
} elseif ($_GET[module]=='konfirmasi'){
include"member/konfirmasi.php";
} elseif ($_GET[module]=='konfirmasi_s'){
include"member/simpan-konfirmasi.php";
} elseif ($_GET[module]=='batal'){
include"member/pembatalan.php";
//------------End Halaman Member----------------

} elseif ($_GET[module]=='schedule'){
include"jadwal.php";
} elseif ($_GET[module]=='syarat-ketentuan'){
include"syarat-ketentuan.php";
} elseif ($_GET[module]=='kontak'){
include"contact.php";
} elseif ($_GET[module]=='reg'){
include"reg.php";
} elseif ($_GET[module]=='reg-detail'){
include"reg-detail.php";
}

?>
			
			