<h3 class="page-header"> <a href="?p=kategori"> Category Report </a></h3>
<p><a href="?p=kategori">Add new category</a></p>
<div class="clearer"></div>
    <?php
    include_once("koneksi.php");
    include "../lib/class_paging.php";
    koneksi();

    $p = new Paging;
    $batas = 10;
    $posisi = $p->cariPosisi($batas);
    
    //nama tabel
    $tabel = "kategori";
    
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
            <th scope=col style="width: 300px;">ID Kategori</th>
            <th scope=col>Kategori</th>
            <th scope=col style="width: 100px;">Modify</th>
        </tr>
        </thead>
        <tbody>
        <?php
        //cetak hasil query
        while ($data=mysql_fetch_array($hasil)){
        ?>
        
        <tr>
            <td align=center><?php echo $i;?></td>
            <td><?php echo $data['id_kategori'];?></td>
            <td><?php echo $data['kategori'];?></td>

            <td align="center">
                <a href="admin.php?p=kategori_e&id=<?php echo $data['id'];?>" title=Edit> Edit |</a>
                <a href="admin.php?p=delete&id=<?php echo $data['id'];?>&tabel=<?php echo $tabel;?>" onClick="return confirm('Anda yakin ingin menghapus <?php echo $data[kategori]; ?> ?')" title=Delete> Hapus </a>
            </td>
        </tr>
        <?php        $i++;        }        ?>
        <tr>
            <td colspan=4>
                <?php
                $jmldata = mysql_num_rows(mysql_query("SELECT * FROM $tabel"));
                $jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
                $linkHalaman = $p->navHalaman3($_GET[halaman], $jmlhalaman);
            
                echo "Hal: $linkHalaman";
                ?>
            </td>
        </tr>
        </tbody> </table>