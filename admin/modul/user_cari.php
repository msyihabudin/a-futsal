<h3 class="page-header"> <a href="#"> Find User </a></h3>
<div class="clearer"></div>

	<p>Masukan Username atau Nama Lengkap untuk mencari User dibawah ini:</p>
	<form action="" method="POST" id="form">
		<input type="text" name="kata" size="30"> &nbsp;&nbsp;&nbsp; <input type="submit" id="button1" name="go" value="Search">
	</form>

	<?php
	include_once('koneksi.php');
	koneksi();

	if (isset($_POST['go'])){
	  // menghilangkan spasi di kiri dan kanannya
	  $kata = trim($_POST['kata']);
	  // mencegah XSS
	  $kata = htmlentities(htmlspecialchars($kata), ENT_QUOTES);

	  // pisahkan kata per kalimat lalu hitung jumlah kata
	  $pisah_kata = explode(" ",$kata);
	  $jml_katakan = (integer)count($pisah_kata);
	  $jml_kata = $jml_katakan-1;

	  $cari = "SELECT * FROM user WHERE " ;
	    for ($i=0; $i<=$jml_kata; $i++){
	      $cari .= "namalengkap LIKE '%$pisah_kata[$i]%' OR username LIKE '%$pisah_kata[$i]%'";
	      if ($i < $jml_kata ){
	        $cari .= " OR ";
	      }
	    }
	  $cari .= " ORDER BY id DESC LIMIT 6";
	  $hasil  = mysql_query($cari);
	  $ketemu = mysql_num_rows($hasil);

	  echo "<h4>Hasil Pencarian</h4>";

	  if ($ketemu > 0){
	  echo "<div class='table3'>Ditemukan <b>$ketemu</b> User dengan kata <font style='background-color:#D5F1FF'><b>$kata</b></font> <b>:</b> </div>";
	  	echo "
	  	<table>
		        <thead>
		        <tr>
		            <th scope=colstyle=\"width: 30px;\">ID User</th>
		            <th scope=col>Nama Lengkap</th>
		            <th scope=col>Username</th>
		            <th scope=col>Email</th>
		            <th scope=col>Blokir</th>
		            <th scope=col>Level</th>
		            <th scope=col style=\"width: 130px;\">Modify</th>
		        </tr>
		        </thead>
	  	";
	    while($t=mysql_fetch_array($hasil)){
	      // Tampilkan hanya sebagian isi produk
	      $namalengkap = htmlentities(strip_tags($t['namalengkap'])); // mengabaikan tag html
	    	  echo "
		        <tbody>
		    	  <tr>
		            <td align=center>$t[id]</td>
		            <td>$t[namalengkap]</td>
		            <td>$t[username]</td>
		            <td>$t[email]</td>
		            <td align=\"center\">$t[blokir]</td>
		            <td>$t[level]</td>
		            <td>
		                <a href=\"admin.php?p=user_e&id=$t[id]\" title=\"Edit\"> Edit |</a>";
		                if ($t['blokir'] == 'N') {
		                    echo "<a href=\"admin.php?p=user_n&id=$t[id]\" name=\"blokir\" title=\"Blokir\"> Blokir |</a>";
		                } else if ($t['blokir'] == 'Y') {
		                    echo "<a href=\"admin.php?p=user_y&id=$t[id]\" name=\"blokir\" title=\"Unblokir\"> Unblokir |</a>";
		                }
		                
		                echo "<a href=\"admin.php?p=delete&id=$t[id]&tabel=user\" onClick=\"return confirm('Anda yakin ingin menghapus user: $t[namalengkap] ?')\" title=\"Delete\"> Delete </a>
		            </td>
		        </tr>
		        </tbody>
	    	  "; 
	      }        
	    }                                                          
	  else{
	    echo "<p>Tidak ditemukan User dengan kata <font style='background-color:#D5F1FF'><b>$kata</b></p>";
	  }
	}

	?>