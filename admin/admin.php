<?php
include_once("koneksi.php");
error_reporting(0);
session_start();

if ($_SESSION[bsi]=='Copyright-syihab'){
    if (empty($_SESSION[nm_user]) AND empty($_SESSION[pas_user])) {
        echo "<center>Untuk Mengakses modul, Anda harus login!..<br>";
        echo "<a href=login.php?bsi=welcome><b>LOGIN</b></a></center>";
    } else {
?>
<!DOCTYPE html>
<html>
<head>
  <title> Halaman Administrator </title>
  <link href="../css/images/favicon.ico" rel="icon" type="image/x-icon" />
  <link rel="stylesheet" type="text/css" href="css/style-admin.css">  
  <link rel="stylesheet" type="text/css" href="css/tinyeditor.css" />
  <link type="text/css" rel="stylesheet" href="js/themes/ui-lightness/ui.all.css" />
    
  <script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
  <script type="text/javascript" src="js/ui/ui.core.js"></script>
  <script type="text/javascript" src="js/ui/ui.datepicker.js"></script>
  <script type="text/javascript" src="js/ui/i18n/ui.datepicker-id.js"></script>
  <script type="text/javascript" src="js/tiny.editor.packed.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#tgl").datepicker({
        dateFormat : "yy/mm/dd",
        changeMonth : true,
        changeYear : true
      });
      $("#tgl2").datepicker({
        dateFormat : "yy/mm/dd",
        changeMonth : true,
        changeYear : true
      });
   });
  </script>
</head>
<body>
  <div class="wrapper">
  	<div id="header">
  	  <h3> Web Reservasi Arena Futsal </h3> <p>Welcome, <strong><?php echo $_SESSION[nma_lengkap]; ?></strong> [ <a href="modul/logout.php">Logout</a> ]</p>
  	</div>
  	<div id="sidebar">
  	  <div class="nav-sidebar">
        <?php if($_SESSION[leveluser]=='All-Privileges' OR $_SESSION[leveluser]=='User'){ ?>
        <ul>
          <li><a href="?p=home" class="house">Home</a></li>
          <li><a href="../home" class="report">Reservation</a></li>
          <li><a href="?p=reservasi_l" class="report">Reservation Report</a></li>
        </ul>
        <?php } if($_SESSION[leveluser]=='All-Privileges'){  ?>
        <ul>
          <li><a href="?p=lapangan_l" class="cart">Futsal Field</a></li>
          <li><a href="?p=kategori_l" class="folder">Categories</a></li>
          <li><a href="?p=member" class="kota">Members</a></li>
        </ul>
        <?php } if($_SESSION[leveluser]=='All-Privileges'){  ?>
        <ul>
          <li><a href="?p=user" class="useradd">Add user</a></li>
          <li><a href="?p=user_l" class="group">User groups</a></li>
          <li><a href="?p=user_cari" class="search">Find user</a></li>
        </ul>
        <?php } if($_SESSION[leveluser]=='All-Privileges' OR $_SESSION[leveluser]=='User'){ ?>
        <ul>
          <li><a href="?p=profil_l" class="useredit">Edit My Profile</a></li>
        </ul>
        <?php } ?>
  	  </div>
  	</div>
    <div class="clearer"></div>
  	<div id="content">
  	  <?php
      include "content.php";
      ?>
  	</div>
  </div>
</body>
</html>
<?php
    }
}else{
    session_start();
    session_destroy();
    
    header('location:index.php?bsi=denied');
}
?>