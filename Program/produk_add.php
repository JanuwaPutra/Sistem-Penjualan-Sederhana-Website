<article>
<p><a href="index.php">Home </a> /  <a href="index.php?page=produk">Master Produk</a> / Tambah Produk  
    <div class ="card">
    <?php
    include_once "koneksi.php";

    $query = "SELECT max(id_produk) AS maxID FROM produk";
    $sql = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($sql);

    $code = $data['maxID'];
    $kode = (int)substr($code , 1, 4);
    
    $kode++;
    $ket = "B";
    $kodeauto = $ket .sprintf("%04s", $kode);

    ?>

    <h2 align="center" style="color:#0059be">Input Produk</h2>
    <form  id="Form" action="" method="post">
    <label style="color:#647cff" for="id_produk">Id Produk</label> <input class="box" id="Id Produk" type="text"  value="<?php echo $kodeauto ?>" maxlength="5" name="id_produk" placeholder="Id Produk" required /> <br />
        <label style="color:#647cff" for="nama">Nama Produk</label> <input id="nama" class="box2" type="name" name="nm_produk" placeholder="Nama Produk"  required oninvalid="this.setCustomValidity('Isi Nama Produk!')"  oninput="this.setCustomValidity('')"/> <br />
        <label style="color:#647cff" for="satuan">Satuan</label> <input id="satuan" class="box2" type="text" name="satuan" placeholder="Satuan"  required oninvalid="this.setCustomValidity('Isi Satuan Produk!')"  oninput="this.setCustomValidity('')"/> <br />
        <label style="color:#647cff" for="Harga">Harga</label> <input id="telepon" class="box2" type="number"  min="1"  name="harga" placeholder="Harga"  required oninvalid="this.setCustomValidity('Isi Harga!')"  oninput="this.setCustomValidity('')"/> <br />
        <label style="color:#647cff" for="Stock">Stock</label> <input id="Stock" class="box2" type="number"  min="1" name="stock" placeholder="Stock" required oninvalid="this.setCustomValidity('Isi Stock')"  oninput="this.setCustomValidity('')"/> <br />
        <input class="submit" type="submit" name="input" value="Input" /> <br/>
        <input class="submit" type="button" onclick="myFunction()" value="Reset">
    </form>

    <?php
    if (isset($_POST['input'])) {
        $id_produk = $_POST['id_produk'];
        $nmproduk = $_POST['nm_produk'];
        $satuan = $_POST['satuan'];
        $harga = $_POST['harga'];
        $stock = $_POST['stock'];
        include_once "koneksi.php";
        $query = "INSERT INTO produk values ('$id_produk', '$nmproduk', '$satuan', '$harga', '$stock')";

        $exequerry = mysqli_query($conn, $query);


        if ($exequerry) {
            echo '<script>
            setTimeout(function() {
                swal({
                    title: "Tambah Data",
                    text: "Tambah Data Produk Sukses!",
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
                    title: "Tambah Data",
                    text: "Tambah Data Produk Gagal!",
                }, function() {
                    window.location = "index.php?page=produk";
                });
            });
        </script>';
        }
    }
    ?>
    <script>
        function myFunction() {
            document.getElementById("Form").reset();
        }
    </script>

</div>

</article>