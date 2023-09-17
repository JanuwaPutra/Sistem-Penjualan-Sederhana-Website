<article>

    <p><a href="index.php">Home</a> / Master Pelanggan </p>
    <h2 style="font-weight:900;">Data Pelanggan</h2>



    <table border="1">
        <tr>
            <th>ID</th>
            <th>NAMA PELANGGAN</th>
            <th>ALAMAT</th>
            <th>TELEPON</th>
            <th>EMAIL</th>
            <th>ACTION</th>
        </tr>
        <?php

        error_reporting(0);
        include_once "koneksi.php";
        $nama = $_POST['namapelanggan'];

        if ($nama != '') {
            $query = "SELECT * from pelanggan WHERE nm_pelanggan LIKE '" . $nama . "' ";
            $sql = mysqli_query($conn, $query);
        } else {
            $query = "SELECT * FROM pelanggan ORDER BY id_pelanggan";
            $sql = mysqli_query($conn, $query);
        }
        if (mysqli_num_rows($sql)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $id_pelanggan = $row['id_pelanggan'];
                $namapelanggan = $row['nm_pelanggan'];
                $alamat = $row['alamat'];
                $telepon = $row['telepon'];
                $email = $row['email'];
            ?>
                <tr>
                    <td align="center"><?php echo $id_pelanggan ?></td>
                    <td align="center"><?php echo $namapelanggan ?></td>
                    <td><?php echo $alamat ?></td>
                    <td align="center"><?php echo $telepon ?></td>
                    <td align="center"> <?php echo $email ?></td>
                    <td align="center">
                        <a class="link2" href="index.php?page=pelanggan_edit&pelanggan=<?= $id_pelanggan ?>">Edit </a>
                        <a class="link3 hapus" onclick="peringatan()">Delete</a>
                    </td>
                </tr>
        <?php }
        } else {
            echo '<tr><td align="center" colspan = "7"><strong>Data Pelanggan Tidak Ada</strong></td></tr>';
        }  ?>
    </table><br />
    <h4><a class="button" href="index.php?page=pelanggan_add">+ Tambah Pelanggan Baru</a></h4>

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
                    window.location.href = "index.php?page=pelanggan_del&pelanggan=<?= $id_pelanggan ?>";
                }
            })
        }
    </script>
</article>