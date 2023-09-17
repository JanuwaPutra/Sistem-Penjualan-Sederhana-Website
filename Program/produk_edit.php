<article>
<p><a href="index.php">Home </a> /  <a href="index.php?page=produk">Master Produk</a> / Edit Produk  
    <div class="card">
        <h2 align="center" style="color:#0059be">Edit Produk</h2>
        <?php
        // ambil data user di db
        include_once "koneksi.php";
        $code_edited = $_GET['produk'];
        $query = "SELECT * FROM produk
            WHERE id_produk='$code_edited'";
        $sql = mysqli_query($conn, $query);
        if ($sql) {
            $row = mysqli_fetch_array($sql);
            $id_produk = $row['id_produk'];
            $nmproduk = $row['nm_produk'];
            $satuan = $row['satuan'];
            $harga = $row['harga'];
            $stock = $row['stock'];

        ?>
            <form action="" method="post">
            <label style="color:#647cff" for="id_produk">Id Produk</label> <input class="box" id="id_produk" type="text" name="id_produk" placeholder="Nim" value="<?= $row['id_produk'] ?>" required /> <br />
        <label style="color:#647cff" for="nama">Nama Produk</label> <input id="nama" class="box2" type="name" name="nm_produk" placeholder="Nama Produk" value="<?= $row['nm_produk'] ?>" required oninvalid="this.setCustomValidity('Isi Nama Produk!')"  oninput="this.setCustomValidity('')"/> <br />
        <label style="color:#647cff" for="satuan">Satuan</label> <input id="satuan" class="box2" type="tect"   name="satuan" placeholder="Satuan" value="<?= $row['satuan'] ?>" required oninvalid="this.setCustomValidity('Isi Satuan Produk!')"  oninput="this.setCustomValidity('')"/> <br />
        <label style="color:#647cff" for="harga">Harga</label> <input id="harga" class="box2" type="number" name="harga" min="1" step="any" placeholder="Harga" value="<?= $row['harga'] ?>" required oninvalid="this.setCustomValidity('Isi Harga Produk!')"  oninput="this.setCustomValidity('')"/> <br />
        <label style="color:#647cff" for="stock">Stock</label> <input id="stock" class="box2" type="number" name="stock" min="1" placeholder="Stock" value="<?= $row['stock'] ?>" required oninvalid="this.setCustomValidity('Isi Stock Produk!')"  oninput="this.setCustomValidity('')"/> <br />
                <input class="submit" type="submit" name="edit" value="Edit" />
                <input type="hidden" name="code_edited" value="<?= $code_edited ?>">
            </form>

        <?php  } ?>
        <?php
        if (isset($_POST['edit'])) {
            $id_produk = $_POST['code_edited'];
            $nmproduk = $_POST['nm_produk'];
            $satuan = $_POST['satuan'];
            $harga = $_POST['harga'];
            $stock = $_POST['stock'];

            include_once "koneksi.php";
            $query = "UPDATE produk SET nm_produk='$nmproduk',satuan='$satuan' , harga='$harga' , stock='$stock' WHERE id_produk='$id_produk'";



            $exequery = mysqli_query($conn, $query) or die($query);
            if ($exequery) {
                echo '<script>
                setTimeout(function() {
                    swal({
                        title: "Edit Data",
                        text: "Edit Data Produk Sukses!",
                        type: "success"
                    }, function() {
                        window.location = "index.php?page=produk";
                    });
                });
            </script>';
            } else {
                echo '<script>
                setTimeout(function() {
                    swal({
                        title: "TEdit Data",
                        text: "Edit Data Produk Sukses!",
                    }, function() {
                        window.location = "index.php?page=produk";
                    });
                });
            </script>';
            }

         
        }
        ?>
    </div>
</article>