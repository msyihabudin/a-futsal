<?php
include_once("koneksi.php");
koneksi();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> Reservasi | Arena Futsal </title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="wrapper">
    <div class="container">
      <header id="header">
      	<h1 id="logo"><a href="#"> Nama Perusahaan </a></h1>
      	<div class="search">
      	  <form method="post" action="#">
      	  	<input type="text" class="field" value="keywords here ..." title="keywords here ...">
      	  	<input type="submit" class="search-btn" value="">
      	  </form>
      	</div>
      </header>
      <nav id="navigation">
      	<ul>
      	  <li><a href="index.php"> HOME </a></li>
          <li><a href="reservasi.php"> RESERVASI </a></li>
          <li><a href="contact.php"> CONTACT </a></li>
      	</ul>
        <form action="#" method="post">
          <p>Welcome, <strong><?php echo $_SESSION[namauser]; ?></strong> [ <a href="logout.php">Logout</a> ]</p>
        </form>
      </nav>
      <!--<ul class="breadcrumb">
        <li>HOME </li>
      </ul>-->
      <div class="main">
        <section class="post">
          <h1>Selamat anda telah masuk ke halaman member!</h1>
        </section>
      </div>
      <div class="socials">
        <div class="socials-inner">
          <h3>Follow me :</h3>
          <ul>
            <li><a href="#" class="facebook-ico"><span></span>Facebook</a></li>
            <li><a href="#" class="twitter-ico"><span></span>Twitter</a></li>
          </ul>
          <div class="cl">&nbsp;</div>
        </div>
      </div>
      <div id="footer">
        <nav class="footer-nav">
          <ul>
            <li><a href="#"> HOME </a></li>
            <li><a href="#"> RESERVASI </a></li>
            <li><a href="#"> CONTACT </a></li>
          </ul>
        </nav>
        <p class="copy">&copy; Copyright 2015 Arena Futsal | <strong>By <a target="_blank" href="http://twitter.com/muhamad_shb">Muhamad Syihabudin</a></strong></p>
        <div class="cl">&nbsp;</div>
      </div>
      </div>
    </div>
  </div>
</body>
</html>