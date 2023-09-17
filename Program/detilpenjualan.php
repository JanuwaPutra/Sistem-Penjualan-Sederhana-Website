<article>
    <div class="card">
        <?php
        include_once "koneksi.php";

        $query = "SELECT * FROM pesan ORDER BY id_pesan";
        $sql = mysqli_query($conn, $query);


        while ($row = mysqli_fetch_assoc($sql)) {
            $idpesan = $row['id_pesan'];
            $idpesan;
        }
        ?>

      

       

            <h2 align="center" style="color:#0059be">Entri Detil Penjualan</h2>

            <form action="" method="POST">
                <label style="color:#647cff" for="id_pesan">Id Pesan</label> <input class="box" id="id_pesan" value="<?php echo $idpesan ?>" type="text" name="id_pesan" placeholder="Id Pesan" maxlength="10" readonly required oninvalid="this.setCustomValidity('Isi Id Pesan!')" oninput="this.setCustomValidity('')" /> <br />
                <br>
                <label style="color:#647cff" for="id_produk">Nama Produk</label> <select id="id_produk" class="box3" name="id_produk" required oninvalid="this.setCustomValidity('Isi Id Produk!')" oninput="this.setCustomValidity('')">
                    <option value=""></option>
                    <?php
                    include "koneksi.php";
                    $q = "SELECT * from produk";
                    $resultq = mysqli_query($conn, $q);
                    while ($x = mysqli_fetch_array($resultq)) {
                    ?>
                        <option value="<?php echo $x['id_produk']; ?>">
                            <?php echo $x['nm_produk']; ?>
                        </option>
                    <?php
                    }
                    ?>
                </select><br />
                <label style="color:#647cff" for="Jumlah">Jumlah</label> <input id="Jumlah" class="box2" type="text" name="jumlah" placeholder="Jumlah" required oninvalid="this.setCustomValidity('Isi Jumlah!')" oninput="this.setCustomValidity('')" /> <br />
                <label style="color:#647cff" for="Harga Jual">Harga Jual</label> <input id="Harga Jual" class="box2" type="text" name="hargajual" placeholder="Harga Jual" required oninvalid="this.setCustomValidity('Isi Harga Jual')" oninput="this.setCustomValidity('')" /> <br />




                <input type="submit" class="submit" onclick="simpan" name="submit" value="Entry">

            </form>
            <?php
            $stock = "SELECT * FROM `produk` WHERE id_produk = '$'";
            
            if (isset($_POST['submit'])) {
                $id_pesan     = $_POST['id_pesan'];
                $id_produk     = $_POST['id_produk'];
                $jumlah     = $_POST['jumlah'];
                $hargajual     = $_POST['hargajual'];

                

                $query = "INSERT INTO detil_pesan VALUES ('$id_pesan','$id_produk',' $jumlah' ,' $hargajual')";
                $sql = mysqli_query($conn,$query);


                if ($sql) {
                    echo '<script>
    setTimeout(function() {
        swal({
            title: "Tambah Data",
            text: "Tambah Pesanan Berhasil",
    
        }, function() {
            window.location = "index.php?page=detilpenjualan";
        });
    });
    </script>';
                } else {
                    echo '<script>
    setTimeout(function() {
        swal({
            title: "Tambah Data",
            text: "Tambah Pesanan Gagal",
    
        }, function() {
            window.location = "index.php?page=detilpenjualan";
        });
    });
    </script>';
                }
            }
            ?>

            <br>


            <table border="1" align="center">
                <tr>
                    <th>ID Produk</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                </tr>

                <tr>
                    <?php
                    include_once "koneksi.php";

                    $query = "SELECT * FROM detil_pesan WHERE id_pesan ='$idpesan' ";
                    $sql = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($sql)) {
                        $id_produk  = $row['id_produk'];
                        $jumlah     = $row['jumlah'];
                        $harga      = $row['harga'];
                    ?>
                        <td><?php echo $id_produk; ?></td>
                        <td><?php echo $jumlah; ?></td>
                        <td><?php echo $harga; ?></td>
                </tr>
            <?php
                    }
            ?>
            </table>
    </div>

</article>