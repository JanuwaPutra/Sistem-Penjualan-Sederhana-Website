<article>
<p><a href="index.php">Home</a> / Kuitansi Penjualan    </p>
<h2  style="font-weight:900;">Kuitansi</h2>

<?php
    include_once "koneksi.php";

    $query = "SELECT * FROM kuitansi ORDER BY id_kuitansi";
    $sql = mysqli_query($conn, $query);
   
    ?>
    <table border="1">
        <tr>
         <th>ID KUITANSI</th>
         <th>ID FAKTUR</th>
         <th>TANGGAL KUITANSI</th>
        </tr>
        <?php
         if (mysqli_num_rows($sql)) {
        while ($row = mysqli_fetch_assoc($sql)){
            $id_kuitansi  = $row['id_kuitansi'];
            $id_faktur   =  $row['id_faktur'];
            $tgl_kuitansi = date('d-m-Y', strtotime($row['tgl_kuitansi']));
        ?>
        <tr>
            <td align="center"><?php echo $id_kuitansi ?></td>
            <td align="center"><?php echo $id_faktur ?></td>
            <td align="center"><?php echo $tgl_kuitansi ?></td>
             
            </td>
        </tr>
        <?php }}else{
             echo '<tr><td align="center" colspan = "3"><strong>Data Kuitansi Tidak Ada</strong></td></tr>';
        } ?>
    </table><br />
    <h4><a  class="button" href="index.php?page=kuitansi_add">+ Tambah Kuitansi Baru</a></h4>
        </article>