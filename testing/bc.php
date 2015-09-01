<?php
if($_GET['module']=='home'){
	echo "<span class='current'>HOME</span>";
}
elseif($_GET['module']=='reservasi'){
	echo "<span class='current'>RESERVASI</span>";
}
elseif($_GET['module']=='kontak'){
	echo "<span class='current'>KONTAK KAMI</span>";
}
elseif($_GET['module']=='reg'){
	echo "<span class='current'>REGISTRASI</span>";
}
elseif($_GET['module']=='reg-detail'){
	echo "<span class='current'>REGISTRASI DETAIL</span>";
}
?>
