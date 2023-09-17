<article>
<p><a href="index.php">Home</a> / Laporan Per Tanggal </p>
    <h2 style="font-weight:900;">Laporan Per Tanggal</h2>

    <form method="post">
        <input class="box5" type="date" name="tgl_mulai"> s/d
        <input class="box5" type="date" name="tgl_selesai" >
        <button type="submit"class="filter" name="filter_tgl">Filter</button>
    </form>
    <br>

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
        if(isset ($_POST['filter_tgl'])){
            $mulai = $_POST['tgl_mulai'];
            $selesai = $_POST['tgl_selesai'];
            $query = "SELECT pesan.id_pesan, pesan.tgl_pesan, pelanggan.nm_pelanggan, detil_pesan.jumlah, detil_pesan.harga FROM 
            detil_pesan INNER JOIN pesan ON detil_pesan.id_pesan= pesan.id_pesan INNER JOIN pelanggan ON 
            pesan.id_pelanggan=pelanggan.id_pelanggan WHERE pesan.tgl_pesan BETWEEN '".$mulai."' AND '".$selesai."'";
             $sql = mysqli_query($conn, $query);
        }else{
        $query = "SELECT pesan.id_pesan, pesan.tgl_pesan, pelanggan.nm_pelanggan, detil_pesan.jumlah, detil_pesan.harga 
        FROM detil_pesan INNER JOIN pesan ON detil_pesan.id_pesan= pesan.id_pesan
         INNER JOIN pelanggan ON pesan.id_pelanggan=pelanggan.id_pelanggan ORDER BY id_pesan";
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