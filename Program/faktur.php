<article>
<p><a href="index.php">Home</a> / Faktur Penjualan    </p>
<h2  style="font-weight:900;">Faktur Penjualan</h2>

<?php
    include_once "koneksi.php";

    $query = "SELECT * FROM faktur ORDER BY id_faktur";
    $sql = mysqli_query($conn, $query);
    
    ?>
    <table border="1">
        <tr>
        <th>ID Faktur</th>
         <th>ID Pesan</th>
         <th>Tanggal</th>
         <th>ACTION</th>
        </tr>
        <?php
         if (mysqli_num_rows($sql)) {
        while ($row = mysqli_fetch_assoc($sql)){
            $id_faktur  = $row['id_faktur'];
            $id_pesan   =  $row['id_pesan'];
            $tgl_faktur = date('d-m-Y', strtotime($row['tgl_faktur']));
        ?>
        <tr>
            <td align="center"><?php echo $id_faktur ?></td>
            <td align="center"><?php echo $id_pesan ?></td>
            <td align="center"><?php echo $tgl_faktur ?></td>
            <td align="center">
            <a  class="link2" href="index.php?page=lihat_faktur&faktur=<?= $id_pesan ?>">Lihat Faktur </a>
             
            </td>
        </tr>
        <?php }}else{
            echo '<tr><td align="center" colspan = "4"><strong>Data Faktur Tidak Ada</strong></td></tr>';
        } ?>
    </table><br />
    <h4><a  class="button" href="index.php?page=faktur_add">+ Buat Faktur Baru</a></h4>
        </article>