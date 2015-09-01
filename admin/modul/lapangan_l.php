<h3 class="page-header"> <a href="?p=lapangan"> Product Report </a></h3>
<p><a href="?p=lapangan">Add new field</a></p>
<div class="clearer"></div>
    <?php
    include_once("koneksi.php");
    include "../lib/class_paging.php";
    include "../lib/inc.librari.php";
    koneksi();

    $p = new Paging;
    $batas = 10;
    $posisi = $p->cariPosisi($batas);
    
    //nama tabel
    $tabel = "lapangan";

    //perintah query utk mengambil data
    $query="SELECT * FROM $tabel ORDER BY id DESC LIMIT $posisi,$batas";
    $hasil=mysql_query($query);
    $i = $posisi+1;
    
    //cetak header table
    ?>
    <table>
        <thead>
        <tr>
            <th scope=col style="width: 25px;">No</th>
            <th scope=col></th>
            <th scope=col style="width: 75px;">ID Lapangan</th>
            <th scope=col style="width: 100px;">Nama Lapangan</th>
            <th scope=col>Kategori</th>
            <th scope=col>Harga Sewa</th>
            <th scope=col>Keterangan</th>
            <th scope=col style="width: 85px;">Modify</th>
        </tr>
        </thead>
        <tbody>
        <?php
        //cetak hasil query
        while ($data=mysql_fetch_array($hasil)){
        ?>
        
        <tr>
            <td align=center><?php echo $i;?></td>
            <td><img src="img/image/<?php echo $data['gambar'];?>" width="50" height="50"></td>
            <td><?php echo $data['id_lapangan'];?></td>
            <td><?php echo $data['nm_lapangan'];?></td>
            <td><?php echo $data['id_kategori'];?></td>
            <td>Rp.<?php echo format_angka($data['harga']);?>,-</td>
            <td><?php echo substr($data['keterangan'], 0,150);?>...</td>
            <td>
                <a href="admin.php?p=lapangan_e&id=<?php echo $data['id'];?>" title=Edit> Edit |</a>
                <a href="admin.php?p=delete&id=<?php echo $data['id'];?>&tabel=<?php echo $tabel;?>" onClick="return confirm('Anda yakin ingin menghapus <?php echo $data[kategori]; ?> ?')" title=Delete> Hapus </a>
            </td>
        </tr>
        <?php        $i++;        }        ?>
        <tr>
            <td colspan=4>
                <?php
                $jmldata = mysql_num_rows(mysql_query("SELECT * FROM $tabel"));
                $jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
                $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
            
                echo "Hal: $linkHalaman";
                ?>
            </td>
        </tr>
        </tbody> </table>