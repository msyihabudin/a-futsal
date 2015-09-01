<h3 class="page-header"> <a href=""> Members </a></h3>    
<div class="clearer"></div>

<?php
    include_once("koneksi.php");
    include_once("../lib/class_paging.php");
    koneksi();

    $p = new Paging;
    $batas = 10;
    $posisi = $p->cariPosisi($batas);

    //nama tabel
    $tabel = "member2";
    
    //perintah query utk mengambil data
    $query="SELECT * FROM $tabel ORDER BY id_member DESC LIMIT $posisi,$batas";
    $hasil=mysql_query($query);
    $i = $posisi+1;
    
    //cetak header table
    ?>
    <table>
        <thead>
        <tr>
            <th scope=col>No</th>
            <th scope=col>ID Member</th>
            <th scope=col>Nama Lengkap</th>
            <th scope=col>Username</th>
            <th scope=col>Email</th>
            <th scope=col>No Hp</th>
            <th scope=col>Alamat</th>
            <th scope=col>No KTP/Kartu Pelajar</th>
            <th scope=col style="width: 40px;"></th>
        </tr>
        </thead>
        <tbody>
    <?php
    //cetak hasil query
    while ($data=mysql_fetch_array($hasil))
        {
    
    ?>
        <tr>
            <td align=center><?php echo $i;?></td>
            <td align="center"><?php echo $data['id_member'];?></td>
            <td><?php echo $data['namalengkap'];?></td>
            <td><?php echo $data['username'];?></td>
            <td><?php echo $data['email'];?></td>
            <td><?php echo $data['no_hp'];?></td>
            <td><?php echo $data['alamat'];?></td>
            <td><?php echo $data['no_ktp'];?></td>
            <td align="center">
                <a href="?p=member-detail&id_member=<?php echo $data[id_member];?>" title="Lihat">Lihat</a>
            </td>

        </tr>
        <?php
        $i++;
        } ?> 
        <tr align="left">
            <td colspan="9" align="left">
                <?php
                $jmldata = mysql_num_rows(mysql_query("SELECT * FROM $tabel"));
                $jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
                $linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);
            
                echo "Hal: $linkHalaman";
                ?>
            </td>
        </tr>
        </tbody>