<?php
$page=$_GET['p'];

if($page==""){ 
  echo "
  <table>
    <tr>
        <td>
            <h1>Welcome !</h1><br>
            <p>Hi <strong>$_SESSION[nma_lengkap]</strong>, welcome to the Administrator page.</p>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <p align=\"right\">";
                function DateToIndo($date) { // fungsi atau method untuk mengubah tanggal ke format indonesia
                   // variabel BulanIndo merupakan variabel array yang menyimpan nama-nama bulan
                        $BulanIndo = array("Januari", "Februari", "Maret",
                                           "April", "Mei", "Juni",
                                           "Juli", "Agustus", "September",
                                           "Oktober", "November", "Desember");
                    
                        $tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
                        $bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
                        $tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
                        
                        $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
                        return($result);
                }

                    echo "Login : ";                
                    echo(DateToIndo(Date("Y-m-d"))); //Akan menghasilkan 25 Agustus 2011
                    echo " | ";
                    echo Date("H:i:s");
             echo "

            </p>
        </td>
    </tr>
</table>
  ";
}
elseif($page=="home"){ include "modul/index.php"; }
elseif($page=="reservasi_l"){ include "modul/reservasi_l.php"; }
elseif($page=="reservasi_detail"){ include "modul/reservasi_d.php"; }
elseif($page=="reservasi_periode"){ include "modul/reservasi_p.php"; }
elseif($page=="aksi"){ include "modul/aksi.php"; }
elseif($page=="delete"){ include "modul/delete.php"; }
elseif($page=="kategori_l"){ include "modul/kategori_l.php"; }
elseif($page=="kategori"){ include "modul/kategori.php"; }
elseif($page=="kategori_e"){ include "modul/kategori_e.php"; }
elseif($page=="kategori_t"){ include "modul/kategori_t.php"; }
elseif($page=="kategori_es"){ include "modul/kategori_es.php"; }
elseif($page=="lapangan"){ include "modul/lapangan.php"; }
elseif($page=="lapangan_l"){ include "modul/lapangan_l.php"; }
elseif($page=="lapangan_e"){ include "modul/lapangan_e.php"; }
elseif($page=="lapangan_es"){ include "modul/lapangan_es.php"; }
elseif($page=="lapangan_t"){ include "modul/lapangan_t.php"; }
elseif($page=="member"){ include "modul/member.php"; }
elseif($page=="member-detail"){ include "modul/member-detail.php"; }

elseif($page=="user"){ include "modul/user.php"; }
elseif($page=="user_l"){ include "modul/user_l.php"; }
elseif($page=="user_t"){ include "modul/user_t.php"; }
elseif($page=="user_e"){ include "modul/user_e.php"; }
elseif($page=="user_es"){ include "modul/user_es.php"; }
elseif($page=="user_n"){ include "modul/user_n.php"; }
elseif($page=="user_y"){ include "modul/user_y.php"; }
elseif($page=="user_cari"){ include "modul/user_cari.php"; }
elseif($page=="profil_l"){ include "modul/profil_l.php"; }
elseif($page=="profil_e"){ include "modul/profil_e.php"; }
elseif($page=="profil_es"){ include "modul/profil_es.php"; }

//Jika Tidak ada
else{
  echo "<p><b>MODUL BELUM ADA...</b></p>";
}
?>