<article>
<p><a href="index.php">Home</a> / Master Produk    </p>
    <h2 style="font-weight:900;">Master Produk  </h2>
    <?php
    include_once "koneksi.php";

    $query = "SELECT * FROM produk ORDER BY id_produk";
    $sql = mysqli_query($conn, $query);
    ?>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>NAMA PRODUK</th>
            <th>SATUAN</th>
            <th>HARGA</th>
            <th>STOCK</th>
            <th>PROSES</th>
        </tr>
        <?php
           if (mysqli_num_rows($sql)) {

        while ($row = mysqli_fetch_assoc($sql)) {
            $id_produk = $row['id_produk'];
            $nm_produk = $row['nm_produk'];
            $satuan = $row['satuan'];
            $harga = $row['harga'];
            $stock = $row['stock'];
        ?>
            <tr>
                <td align="center"><?php echo $id_produk ?></td>
                <td align="center"><?php echo $nm_produk ?></td>
                <td align="center"><?php echo $satuan ?></td>
                <td align="center"><?php echo $harga ?></td>
                <td align="center"><?php echo $stock ?></td>
                <td align="center" >
                    <a  class="link2" href="index.php?page=produk_edit&produk=<?= $id_produk ?>">Edit </a>
                    <a  class="link3 hapus"  onclick="peringatan()" >Delete</a>
                </td>
            </tr>
        <?php }}else{
             echo '<tr><td align="center" colspan = "7"><strong>Data Produk Tidak Ada</strong></td></tr>';
        } ?>
    </table> <br />
    <h4>
    <a href="index.php?page=produk_add" class="button">+ Tambah Produk Baru</a>
    </h4>

    <script>
        function peringatan() {
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Hapus Data Pelanggan",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Tidak!',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href="index.php?page=produk_del&produk=<?= $id_produk ?>"
                }
            })
        }
    </script>
</article>