<?php
error_reporting(0);

include_once("koneksi.php");

koneksi();
$tabel = "user";
$username = $_SESSION[namauser];

//ambil nilai variabel URL
$id=$_GET['id'];

$query="SELECT * FROM $tabel WHERE id = '$id'";
//echo $query;
$hasil = mysql_query($query);
while ($data = mysql_fetch_array($hasil))
    {   

    if(mysql_affected_rows() > 0)
        {
        $namalengkap=$data["namalengkap"];
        $username=$data["username"];
        $password=$data["password"];
        $email=$data["email"];
        $blokir=$data["blokir"];
        $level=$data["level"];
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
            echo "<meta http-equiv=\"refresh\" content=\"2; url=admin.php?p=profil_l\">";
        }
 
        elseif($_GET['bsi']=='gagal'){
            echo"<div class=\"n_error\"><p>Data Tidak Berhasil Diubah !</p></div>";
        }

        elseif($_GET['bsi']=='gagal_pass'){
            echo"<div class=\"n_error\"><p>Ulang Kata Sandi Tidak Sama !</p></div>";
        }

        elseif($_GET['bsi']=='pass_kosong'){
            echo"<div class=\"n_error\"><p>Password Tidak Boleh Kosong !</p></div>";
        }
        ?>
    </div>
</center>
<h3 class="page-header"> <a href="?p=user"> Add User </a></h3>
    <form id="form" action="?p=profil_es" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <fieldset id="personal">
            <legend>USER INFORMATION</legend>
            <label>Nama Lengkap : </label>
            <input name="namalengkap" id="namalengkap" type="text" tabindex="2" value="<?php echo $namalengkap;?>" />
            <br />
            <label>Nama User : </label>
            <input name="username" id="username" type="text" tabindex="2" value="<?php echo $username;?>" />
            <br />
            <label>Kata Sandi : </label>
            <input name="password" id="password" type="password" tabindex="2" />
            <br />
            <label>Ulang Kata Sandi : </label>
            <input name="password2" id="password" type="password" tabindex="2" />
            <br />
            <label>Email : </label>
            <input name="email" id="email" type="text" tabindex="2" value="<?php echo $email;?>" />
            <br />
            <label>Level : </label>
            <input name="level" id="level" type="hidden" tabindex="2" value="<?php echo $level;?>" />
            <input name="level" id="level" type="text" tabindex="2" value="<?php echo $level;?>" disabled />
            <br />
            <label>Blokir : </label>
            <input name="blokir" id="blokir" type="radio" value="N" tabindex="2" checked /> N <input name="blokir" id="blokir" type="radio" value="Y" tabindex="2" disabled /> Y
            <br />
        </fieldset>
        <div align="center">
            <input name="proses" id="button1" type="submit" value="Send" onclick='editor.post();' />
            <input id="button2" type="reset" />
        </div>
    </form>