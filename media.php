<?php
include_once("koneksi.php");
koneksi();

include 'lib/inc.librari.php';
include 'lib/tgl_indo.php';
include 'lib/pageNavi.php';
error_reporting(0);
session_start();
if(!isset($_SESSION['session'])){
    $ids = date("ymdHis");//membuat id transaksi yang unik berdasarkan waktu
    $_SESSION['session'] = $ids;
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> Home | Arena Futsal </title>
  <link href="css/images/favicon.ico" rel="icon" type="image/x-icon" />
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" >
  $(document).ready(function() {
    $(".account").click(function() {
      var X=$(this).attr('id');

      if(X==1) {
        $(".submenu").hide();
        $(this).attr('id', '0'); 
      } else {
        $(".submenu").show();
        $(this).attr('id', '1');
      }    
    });

  //Mouseup textarea false
    $(".submenu").mouseup(function() {
      return false
    });
    $(".account").mouseup(function() {
      return false
    });

  //Textarea without editing.
  $(document).mouseup(function() {
  $(".submenu").hide();
  $(".account").attr('id', '');
  });
    
  });
  
  </script>
</head>
<body>
  <div class="wrapper">
    <div class="container">
      <header id="header">
      	<h1 id="logo"><a href="#"> Web Reservasi Arena Futsal </a></h1>
      </header>
      <nav id="navigation">
      	<ul class="a">
      	  <li><a href="index.php"> HOME </a></li>
          <li><a href="reservasi.html"> RESERVATION </a></li>
          <li><a href="jadwal-terkini.html"> SCHEDULE </a></li>
          <li><a href="kontak-kami.html"> CONTACT </a></li>         
      	</ul>
        <?php
        if (empty($_SESSION[namauser]) AND empty($_SESSION[passuser])) {
          if ($_GET[module]=='login-member') {
            echo "<p>&nbsp;</p>";
          } else {
        echo "
        <form action=\"cek_login.php\" method=\"post\">
          <input type=\"text\" name=\"username\" placeholder=\"Username\"><input type=\"password\" name=\"password\" placeholder=\"Password\">
          <input type=\"submit\" id=\"button1\" name=\"submit\" value=\"Sign in\">
        </form>";
          }
        } else {
          echo "
          <div class=\"dropdown\">
          <a class=\"account\">Welcome,<span> $_SESSION[namauser]</span></a>
            <div class=\"submenu\" style=\"display: none;\">
              <ul class=\"root\">
              <li><a href=\"dashboard.html\">Dashboard</a></li>
              <li><a href=\"change-password.html\">Change Password</a></li>
              <li><a href=\"logout.php\">Sign Out</a></li>
            </ul>
          </div>
          </div>
          ";
        }
        ?>
        
      </nav>
      <!--<ul class="breadcrumb">
        <li>HOME </li>
      </ul>-->
      <div class="main">
        <?php
        if (empty($_SESSION[namauser]) AND empty($_SESSION[passuser])) {
          if ($_GET[module]=='login-member') {
            echo "<p>&nbsp;</p>";
          } else {
            echo "<p style=\"text-align:right; padding-bottom:30px; padding-right:20px;\">Are you already a member? <a href=\"registrasi.html\">Register here!</a></p>";
          }
        } else {
          echo "&nbsp";
        }
        include 'modul.php';
        ?>
      </div>
      <div id="footer">
        <nav class="footer-nav">
          <ul>
            <li><a href="index.php"> HOME </a></li>
            <li><a href="reservasi.html"> RESERVATION </a></li>
            <li><a href="jadwal-terkini.html"> SCHEDULE </a></li>
            <li><a href="kontak-kami.html"> CONTACT </a></li>
            <li><a href="syarat-ketentuan.html"> TERMS & CONDITIONS </a></li>
          </ul>
        </nav>
        <p class="copy">&copy; Copyright 2015 Web Reservasi Arena Futsal | <strong>By <a target="_blank" href="http://twitter.com/muhamad_shb">Muhamad Syihabudin</a></strong></p>
        <div class="cl">&nbsp;</div>
      </div>
      </div>
    </div>
  </div>
</body>
</html>