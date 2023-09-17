<article>
<p><a href="index.php">Home </a> /  <a href="index.php?page=kuitansi">Kuitansi Penjualan</a> / Buat kuitansi 
    <div class="card">
    <?php
      include_once "koneksi.php";

      $query = "SELECT * FROM kuitansi ORDER BY id_kuitansi";
      $sql = mysqli_query($conn, $query);

      $no = 1;
      while ($row = mysqli_fetch_assoc($sql)) {
         $no = $row['id_kuitansi'];
         $no++;
      }
      $timestamp = date("Y-m-d") ;
      ?>


        <h2 align="center" style="color:#0059be">Buat kuitansi Baru</h2>
        </form>
        <form action="" method="POST">
        <label style="color:#647cff" for="id_kuitansi">Id Kuitansi</label> <input class="box"  readonly value="<?php echo $no ?>"  id="id_faktur" type="text" name="id_kuitansi" placeholder="id Kuitansi" maxlength="10" required oninvalid="this.setCustomValidity('Isi Id Kuitansi!')" oninput="this.setCustomValidity('')" /> <br />
      <br>
      <label style="color:#647cff" for="id_pesan">Id Faktur</label> <select id="nim" class="box3" name="id_faktur" required oninvalid="this.setCustomValidity('Isi Id Pesan!')" oninput="this.setCustomValidity('')">
                <option value=""></option>
                <?php
                include "koneksi.php";
                $q = "SELECT * from faktur";
                $resultq = mysqli_query($conn, $q);
                while ($x = mysqli_fetch_array($resultq)) {
                ?>
                    <option value="<?php echo $x['id_faktur']; ?>">
                        <?php echo $x['id_faktur']; ?>
                    </option>
                <?php
                }
                ?>
            </select><br />

     

            <label style="color:#647cff" for="tglkuitansi">Tanggal Kuitansi</label> <input id="tglkuitansi" class="box6" type="date" name="tgl_kuitansi" placeholder="Tanggal Kuitansi" value="<?php echo $timestamp?>" required oninvalid="this.setCustomValidity('Isi Tanggal Kwitansi!') " oninput="this.setCustomValidity('')" /> <br />
      
      <input type="submit"  class="submit" name="faktur_baru" value="Simpan Kuitansi">
      <div></div>
   </form>

<?php 
   include_once "koneksi.php";

   if(isset($_POST['faktur_baru'])) {
      $id_faktur     = $_POST['id_kuitansi'];
      $id_pesan      = $_POST['id_faktur'];
      $tgl_faktur    = date('Y-m-d', strtotime($_POST['tgl_kuitansi']));

   $query = "INSERT INTO kuitansi VALUES ('$id_faktur','$id_pesan','$tgl_faktur')";
   $sql = mysqli_query($conn,$query);

   if($sql) {
      echo '<script>
            setTimeout(function() {
                swal({
                    title: "Tambah Data",
                    text: "Tambah Data Kuitansi Sukses!",
                    type: "success"
                }, function() {
                    window.location = "index.php?page=kuitansi";
                });
            });
        </script>';

   } else {
      echo '<script>
            setTimeout(function() {
                swal({
                    title: "Tambah Data",
                    text: "Tambah Data Kuitansi Sukses!",
                }, function() {
                    window.location = "index.php?page=kuitansi";
                });
            });
        </script>';
   }
}
?>
</article>