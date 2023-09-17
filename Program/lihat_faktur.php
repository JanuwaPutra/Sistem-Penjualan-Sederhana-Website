<article>
<p><a href="index.php">Home </a> /  <a href="index.php?page=faktur">Faktur Penjualan</a> / Lihat Faktur
    <div class="card">
        <h2 align="center" style="color:#0059be">Lihat Faktur</h2>
        <?php
        // ambil data user di db
        include_once "koneksi.php";
        $user = $_GET['faktur'];
        $query = "SELECT * FROM pelanggan INNER JOIN pesan ON pelanggan.id_pelanggan = pesan.id_pelanggan 
        INNER JOIN faktur ON pesan.id_pesan = faktur.id_pesan WHERE faktur.id_pesan = '$user'";
        $sql = mysqli_query($conn, $query);
        if ($sql) {
            $row = mysqli_fetch_array($sql);
            $id_pesan = $row['id_pesan'];
            $tgl_pesan = date('d-m-Y', strtotime($row['tgl_pesan']));
            $id_pelanggan = $row['id_pelanggan'];
            $nm_pelanggan = $row['nm_pelanggan'];
        ?>
            <table>
                <tr>
                    <td>Id Pesan</td>
                    <td>:</td>
                    <td><?php echo $id_pesan ?></td>
                </tr>
                <tr>
                    <td>Tanggal Pesan</td>
                    <td>:</td>
                    <td> <?php echo $tgl_pesan ?></td>
                </tr>
                <tr>
                    <td>Id Pelanggan</td>
                    <td>:</td>
                    <td> <?php echo $id_pelanggan ?></td>
                </tr>
                <tr>
                    <td>Nama Pelanggan</td>
                    <td>:</td>
                    <td> <?php echo $nm_pelanggan ?></td>
                </tr>
            </table>
        <?php  } ?>
        <table border="1" align="center">
            <tr>
                <th>ID PRODUK</th>
                <th>NAMA PRODUK</th>
                <th>JUMLAH</th>
                <th>HARGA</th>
            </tr>
                <br>
            <tr>
                <?php
                include_once "koneksi.php";

                $query = "SELECT * FROM produk INNER JOIN detil_pesan ON produk.id_produk = detil_pesan.id_produk 
                    INNER JOIN pesan ON detil_pesan.id_pesan = pesan.id_pesan INNER JOIN pelanggan ON pesan.id_pelanggan =
                     pelanggan.id_pelanggan where pesan.id_pesan = '$user' ";
                $sql = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($sql)) {
                    $id_produk  = $row['id_produk'];
                    $nm_produk  = $row['nm_produk'];
                    $jumlah     = $row['jumlah'];
                    $harga      = $row['harga'];
                ?>
                    <td><?php echo $id_produk; ?></td>
                    <td><?php echo $nm_produk; ?></td>
                    <td><?php echo $jumlah; ?></td>
                    <td><?php echo $harga; ?></td>
            </tr>
        <?php
                }
        ?>
        </table>
    </div>


</article>