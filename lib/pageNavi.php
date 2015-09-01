<?php
	class pageNavi_Home{
		// Fungsi untuk mencek halaman dan posisi data
		function cariPosisi($batas) {
			if(empty($_GET['page'])) {
				$posisi = 0;
				$_GET['page'] = 1;
			} else {
				$posisi = ($_GET['page'] - 1) * $batas;
			}
			return $posisi;
		}
		
		// Fungsi untuk menghitung total halaman
		function jumlahHalaman($jmldata, $batas) {
			$jmlhalaman = ceil($jmldata/$batas);
			return $jmlhalaman;
		}
		
		// Fungsi untuk link halaman 1,2,3 
		function navHalaman($halaman_aktif, $jmlhalaman) {
			global $link;
			
			$link_halaman = "";
		
			// Link ke halaman pertama (first) dan sebelumnya (prev)
			if($halaman_aktif > 1) {
				$prev = $halaman_aktif - 1;
	
				if($prev > 1) { 
					$link_halaman .= "<a class=\"first\" href=\"jadwal-terkini-page-1.html\"><< First</a> | ";
				}			
				$link_halaman .= "<a class=\"previouspostslink\" href=\"jadwal-terkini-page-".$prev.".html\">< Previous</a> | ";
			}
		
			// Link halaman 1,2,3, ...
			$angka = ($halaman_aktif > 3 ? "<span>...</span>" : " "); 
			for($i = $halaman_aktif-2;$i < $halaman_aktif;$i++) {
				if ($i < 1) continue;
				$angka .= "<a href=\"jadwal-terkini-page-".$i.".html\"> ".$i." </a>";
			}
			$angka .= "<span class=\"current\"> ".$halaman_aktif." </span>";
			  
			for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++) {
				if($i > $jmlhalaman) break;
				$angka .= "<a href=\"jadwal-terkini-page-".$i.".html\"> ".$i." </a>";
			}
			$angka .= ($halaman_aktif+2 < $jmlhalaman ? "<span>...</span><a href=\"jadwal-terkini-page-".$jmlhalaman.".html\">".$jmlhalaman."</a>" : " ");
		
			$link_halaman .= $angka;
			
			// Link ke halaman berikutnya (Next) dan terakhir (Last) 
			if($halaman_aktif < $jmlhalaman) {
				$next = $halaman_aktif + 1;
				$link_halaman .= "| <a class=\"nextpostslink\" href=\"jadwal-terkini-page-".$next.".html\">Next > </a>";
				
				if($halaman_aktif != $jmlhalaman - 1) {
					$link_halaman .= "| <a class=\"last\" href=\"jadwal-terkini-page-".$jmlhalaman.".html\">Last >></a>";
				}
			}
			
			return $link_halaman;
		}

		// Fungsi untuk link halaman 1,2,3 
		function navHalaman2($halaman_aktif, $jmlhalaman) {
			global $link;
			
			$link_halaman = "";
		
			// Link ke halaman pertama (first) dan sebelumnya (prev)
			if($halaman_aktif > 1) {
				$prev = $halaman_aktif - 1;
	
				if($prev > 1) { 
					$link_halaman .= "<a class=\"first\" href=\"dashboard-page-1.html\"><< First</a> | ";
				}			
				$link_halaman .= "<a class=\"previouspostslink\" href=\"dashboard-page-".$prev.".html\">< Previous</a> | ";
			}
		
			// Link halaman 1,2,3, ...
			$angka = ($halaman_aktif > 3 ? "<span>...</span>" : " "); 
			for($i = $halaman_aktif-2;$i < $halaman_aktif;$i++) {
				if ($i < 1) continue;
				$angka .= "<a href=\"dashboard-page-".$i.".html\"> ".$i." </a>";
			}
			$angka .= "<span class=\"current\"> ".$halaman_aktif." </span>";
			  
			for($i=$halaman_aktif+1; $i<($halaman_aktif+3); $i++) {
				if($i > $jmlhalaman) break;
				$angka .= "<a href=\"dashboard-page-".$i.".html\"> ".$i." </a>";
			}
			$angka .= ($halaman_aktif+2 < $jmlhalaman ? "<span>...</span><a href=\"dashboard-page-".$jmlhalaman.".html\">".$jmlhalaman."</a>" : " ");
		
			$link_halaman .= $angka;
			
			// Link ke halaman berikutnya (Next) dan terakhir (Last) 
			if($halaman_aktif < $jmlhalaman) {
				$next = $halaman_aktif + 1;
				$link_halaman .= "| <a class=\"nextpostslink\" href=\"dashboard-page-".$next.".html\">Next > </a>";
				
				if($halaman_aktif != $jmlhalaman - 1) {
					$link_halaman .= "| <a class=\"last\" href=\"dashboard-page-".$jmlhalaman.".html\">Last >></a>";
				}
			}
			
			return $link_halaman;
		}
	}	
	
?>