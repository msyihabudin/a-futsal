<?php
//Class paging untuk halaman administrator
class Paging{
	
	// Fungsi  untuk mengecek halaman dan posisi data
	function cariPosisi($batas){
		if(empty($_GET['halaman'])){
			$posisi = 0;
			$_GET['halaman'] = 1;
		}else{
			$posisi = ($_GET[halaman]-1) * $batas;
		}
		return $posisi;
	}
	
	// Fungsi untuk menghitung total halaman
	function jumlahHalaman($jmldata, $batas){
		$jmlhalaman = ceil($jmldata/$batas);
		return $jmlhalaman;
	}
	
	// Fungsi untuk link 1,2,3 (untuk admin)
	function navHalaman($halaman_aktif, $jmlhalaman){
		$link_halaman = "";
		
		// Link halaman 1,2,3, ...
		for ($i=1; $i<=$jmlhalaman; $i++){
			if ($i == $halaman_aktif){
				$link_halaman .= "<b>$i</b> | ";
			}else{
				$link_halaman .= "<a href=admin.php?p=lapangan_l&halaman=$i>$i</a> | ";
			}
		$link_halaman .= " ";
		}
	return $link_halaman;
	}
	
	function navHalaman2($halaman_aktif, $jmlhalaman){
		$link_halaman = "";
		
		// Link halaman 1,2,3, ...
		for ($i=1; $i<=$jmlhalaman; $i++){
			if ($i == $halaman_aktif){
				$link_halaman .= "<b>$i</b> | ";
			}else{
				$link_halaman .= "<a href=admin.php?p=user_l&halaman=$i>$i</a> | ";
			}
		$link_halaman .= " ";
		}
	return $link_halaman;
	}
	
	function navHalaman3($halaman_aktif, $jmlhalaman){
		$link_halaman = "";
		
		// Link halaman 1,2,3, ...
		for ($i=1; $i<=$jmlhalaman; $i++){
			if ($i == $halaman_aktif){
				$link_halaman .= "<b>$i</b> | ";
			}else{
				$link_halaman .= "<a href=admin.php?p=reservasi_l&halaman=$i>$i</a> | ";
			}
		$link_halaman .= " ";
		}
	return $link_halaman;
	}

	function navHalaman4($halaman_aktif, $jmlhalaman){
		$link_halaman = "";
		
		// Link halaman 1,2,3, ...
		for ($i=1; $i<=$jmlhalaman; $i++){
			if ($i == $halaman_aktif){
				$link_halaman .= "<b>$i</b> | ";
			}else{
				$link_halaman .= "<a href=jadwal-terkini.html&halaman=$i>$i</a> | ";
			}
		$link_halaman .= " ";
		}
	return $link_halaman;
	}
}
?>