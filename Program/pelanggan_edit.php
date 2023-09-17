<article>
<p><a href="index.php">Home </a> /  <a href="index.php?page=pelanggan">Master Pelanggan</a> / Edit Pelanggan   
    <div class="card">
    <h2 align="center" style="color:#0059be">Edit Data Pelanggan</h2>
    <?php
    // ambil data user di db
    include_once "koneksi.php";
    $user_edited = $_GET['pelanggan'];
    $query = "SELECT id_pelanggan, nm_pelanggan, alamat, telepon, email FROM pelanggan
            WHERE id_pelanggan='$user_edited'";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        $row = mysqli_fetch_array($sql);
        $id_pelanggan = $row['id_pelanggan'];
        $namapelanggan = $row['nm_pelanggan'];
        $alamat = $row['alamat'];
        $telepon = $row['telepon'];
        $email = $row['email'];
    ?>
        <form action="" method="post">
        <label style="color:#647cff" for="id_pelanggan">Id Pelanggan</label> <input class="box" id="id_pelanggan" type="text" name="id_pelanggan" placeholder="Id Pelanggan" value="<?= $row['id_pelanggan'] ?>" required  readonly/> <br />
        <label style="color:#647cff" for="nama">Nama</label> <input id="nama" class="box2" type="name" name="nm_pelanggan" placeholder="Nama" value="<?= $row['nm_pelanggan'] ?>" required oninvalid="this.setCustomValidity('Isi Nama Pelanggan!')"  oninput="this.setCustomValidity('')"/> <br />
        <label style="color:#647cff" for="alamat">Alamat</label> <textarea id="alamat" type="text" name="alamat" placeholder="Alamat" required oninvalid="this.setCustomValidity('Isi Alamat Pelanggan!')"  oninput="this.setCustomValidity('')"><?= $row['alamat']?></textarea> <br /><br />
        <label style="color:#647cff" for="telepon">Telepon</label> <input id="telepon" class="box2" type="tel" name="telepon" placeholder="Telepon" value="<?= $row['telepon'] ?>" required oninvalid="this.setCustomValidity('Isi Telepon Pelanggan!')"  oninput="this.setCustomValidity('')"/> <br />
        <label style="color:#647cff" for="email">Email</label> <input id="email" class="box2" type="email" name="email" placeholder="Email" value="<?= $row['email'] ?>" required oninvalid="this.setCustomValidity('Isi Email Pelanggan!')"  oninput="this.setCustomValidity('')"/> <br />
            <input  class="submit" type="submit" name="edit" value="Edit" />
            <input type="hidden" name="user_edited" value="<?= $user_edited ?>">
        </form>

    <?php  } ?>
    <?php
    if (isset($_POST['edit'])) {
        $id_pelanggan = $_POST['user_edited'];
        $nm_pelanggan = $_POST['nm_pelanggan'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telepon'];
        $email = $_POST['email'];

        include_once "koneksi.php";
        $query = "UPDATE pelanggan SET nm_pelanggan='$nm_pelanggan', alamat='$alamat', telepon='$telepon', email='$email' WHERE id_pelanggan='$id_pelanggan'";
        $exequery = mysqli_query($conn, $query) or die($query);
        if ($exequery) {
             echo '<script>
    setTimeout(function() {
        swal({
            title: "Edit Pelanggan",
            text: "Edit Pelanggan Sukses",
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
                    title: "Edit Pelanggan",
                    text: "Edit Pelanggan Gagal",
                }, function() {
                    window.location = "index.php?page=pelanggan";
                });
            });
        </script>';
        }
       
    }
    ?>
</div>
</article>