<article>
<p><a href="index.php">Home </a> /  <a href="index.php?page=pelanggan">Master Pelanggan</a> / Tambah Pelanggan   
    <div class="card">
    <?php
    include_once "koneksi.php";

    $query = "SELECT max(id_pelanggan) AS maxID FROM pelanggan";
    $sql = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($sql);

    $code = $data['maxID'];
    $kode = (int)substr($code , 1, 4);
    
    $kode++;
    $ket = "P";
    $kodeauto = $ket .sprintf("%04s", $kode);
    


    ?>

        <h2 align="center" style="color:#0059be">Input Data Pelanggan</h2>
        </form>
        <form id="Form" action="" method="post">
            <label style="color:#647cff" for="id_pelanggan">Id Pelanggan</label> <input class="box" id="id_pelanggan" type="text" name="id_pelanggan" placeholder="id  pelanggan" value="<?php echo $kodeauto ?>" maxlength="5" required oninvalid="this.setCustomValidity('Isi Id Pelanggan!')"  oninput="this.setCustomValidity('')" /> <br />
            <label style="color:#647cff" for="nama">Nama Pelanggan</label><input class="box2" id="nama" type="text" name="nama" placeholder="Nama" required oninvalid="this.setCustomValidity('Isi Nama Pelanggan!')" oninput="this.setCustomValidity('')" /> <br />
            <label style="color:#647cff" for="alamat">Alamat</label> <textarea rows="3" id="alamat" name="alamat" placeholder="Alamat" required oninvalid="this.setCustomValidity('Isi Alamat Pelanggan!')" oninput="this.setCustomValidity('')"></textarea> <br /><br />
            <label style="color:#647cff" for="telepon">Telepon</label><input class="box2" id="telepon" type="tel" name="telepon" placeholder="Telepon" required oninvalid="this.setCustomValidity('Isi Telepon Pelanggan!')" oninput="this.setCustomValidity('')" /> <br />
            <label style="color:#647cff" for="email">Email</label><input class="box2" id="email" type="email" name="email" placeholder="Email" required oninvalid="this.setCustomValidity('Isi Email Pelanggan!')" oninput="this.setCustomValidity('')" /> <br />       
            <input class="submit"  type="submit" name="input" value="Input" /> <br />
            <input class="submit" type="button" onclick="myFunction()" value="Reset"><br />
        </form>
        
        <?php   
        if (isset($_POST['input'])) {
            $id = $_POST['id_pelanggan'];
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $telepon = $_POST['telepon'];
            $email = $_POST['email'];

            include_once "koneksi.php";
            $query = "INSERT INTO pelanggan values ('$id', '$nama', '$alamat' , '$telepon' , '$email')";

            $exequerry = mysqli_query($conn, $query);


            if ($exequerry) {
                echo '<script>
    setTimeout(function() {
        swal({
            title: "Tambah Data",
            text: "Tambah Data Pelanggan Sukses!",
            type: "success"
        }, function() {
            window.location = "index.php?page=pelanggan";
        });
    });
</script>';
            } else {
                echo '<script>
                setTimeout(function() {
                    swal({
                        title: "Tambah Data",
                        text: "Tambah Data Pelanggan Gagal!",
                    }, function() {
                        window.location = "index.php?page=pelanggan";
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