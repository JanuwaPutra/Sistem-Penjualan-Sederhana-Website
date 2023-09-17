<article>
    <p><a href="index.php">Home</a> / Laporan Per Produk </p>
    <h2 style="font-weight:900;">Laporan Per Produk</h2>

    <form action="" method="post">
        <select id="id_produk" class="box5" name="id_produk">
            <option value=""></option>
            <?php
            include "koneksi.php";
            $q = "SELECT * from produk";
            $resultq = mysqli_query($conn, $q);
            while ($x = mysqli_fetch_array($resultq)) {
            ?>
                <option value="<?php echo $x['nm_produk']; ?>">
                    <?php echo $x['nm_produk']; ?>
                </option>
            <?php
            }
            ?>
        </select>

        <button type="submit" class="filter" name="filter_produk">Filter</button>
    </form><br />

    <table border="1">
        <tr>
            <th>ID PESAN</th>
            <th>TANGGAL PESAN</th>
            <th>PELANGGAN</th>
            <th>JUMLAH PRODUK</th>
            <th>TOTAL HARGA</th>
        </tr>
        <?php
        include_once "koneksi.php";
        if (isset($_POST['filter_produk'])) {
            $id_produk = $_POST['id_produk'];
            $query = "SELECT * FROM produk INNER JOIN detil_pesan ON produk.id_produk = detil_pesan.id_produk INNER JOIN pesan ON detil_pesan.id_pesan = pesan.id_pesan INNER JOIN pelanggan ON pesan.id_pelanggan = pelanggan.id_pelanggan
             WHERE produk.nm_produk  LIKE '" . $id_produk . "'";
            $sql = mysqli_query($conn, $query);
        } else {
            $query = "SELECT * FROM produk INNER JOIN detil_pesan ON produk.id_produk = detil_pesan.id_produk 
        INNER JOIN pesan ON detil_pesan.id_pesan = pesan.id_pesan
         INNER JOIN pelanggan ON pesan.id_pelanggan = pelanggan.id_pelanggan ORDER BY detil_pesan.id_pesan";
            $sql = mysqli_query($conn, $query);
        }
        if(mysqli_num_rows($sql)){
        while ($row = mysqli_fetch_assoc($sql)) {
            $id_pesan = $row['id_pesan'];
            $tanggal_pesan = date('d-m-Y', strtotime($row['tgl_pesan']));
            $pelanggan = $row['nm_pelanggan'];
            $jumlah = $row['jumlah'];
            $harga = $row['harga'];
        ?>
            <tr>
                <td align="center"><?php echo $id_pesan ?></td>
                <td align="center"><?php echo  $tanggal_pesan ?></td>
                <td align="center"><?php echo $pelanggan ?></td>
                <td align="center"><?php echo  $jumlah ?></td>
                <td align="center"><?php echo  $harga ?></td>
            </tr>
        <?php } } else{
                  echo '<tr><td colspan ="5"align="center" ><strong> Data Tidak Ditemukan</strong></td></tr>';
        } ?>
    </table><br />







</article>