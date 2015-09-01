<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
  <link href="../css/images/favicon.ico" rel="icon" type="image/x-icon" />
  <link rel="stylesheet" type="text/css" href="css/style-login.css">
</head>
<body>
  <div id="notif">
<center>
<?php

if($_GET['bsi']=='welcome'){
        echo"<h2>SELAMAT DATANG DI HALAMAN LOGIN ADMIN</h2>";
    }
    
    elseif($_GET['bsi']=='gagallogin'){
        echo"<div class=\"n_error\"><p>Login Gagal!!! Username dan Password salah atau sedang di blokir.</p></div>";
        echo "<meta http-equiv=\"refresh\" content=\"3; url=index.php\">";
    }
    
    elseif($_GET['bsi']=='denied'){
        echo"<div class=\"n_warning\"><p>Silahkan Login Terlebih Dahulu untuk mengakses halaman!</p></div>";
        echo "<meta http-equiv=\"refresh\" content=\"3; url=index.php\">";
    }
    
    elseif($_GET['bsi']=='logout'){
        echo"<div class=\"n_ok\"><p>Anda telah sukses keluar dari sistem <b>[LOGOUT]<b></p></div>";
        echo "<meta http-equiv=\"refresh\" content=\"3; url=index.php\">";
    }
?>
</center>
</div>
	<section class="container">
    <div class="login">
      <h1>Login to Web Administrator</h1>
      <form method="post" action="modul/cek_login.php">
        <p>Username :</p>
        <p><input type="text" name="username" value="" placeholder="Username"></p>
        <p>Password :</p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>
        <p class="remember_me">
          <label>
            
          </label>
        </p>
        <p class="submit"><input type="submit" name="Submit" value="Login"></p>
      </form>
    </div>
  </section>
</body>
</html>