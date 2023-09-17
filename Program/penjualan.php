<article>
<p><a href="index.php">Home</a> / Master Penjualan    </p>
    <div class="card">

    <?php
      include_once "koneksi.php";

      $query = "SELECT * FROM pesan ORDER BY id_pesan";
      $sql = mysqli_query($conn, $query);

      $no = 1;
      while ($row = mysqli_fetch_assoc($sql)) {
         $no = $row['id_pesan'];
         $no++;
        
      }
     $timestamp = date("Y-m-d") ;
   
      ?>


        <h2 align="center" style="color:#0059be">Entri Penjualan</h2>
        </form>
        <form action="" method="POST">
        <label style="color:#647cff" for="id_pesan">Id Pesan</label> <input class="box" id="id_faktur" value="<?php echo $no ?>" type="text" name="id_pesan" placeholder="Id Pesan" maxlength="10" readonly required oninvalid="this.setCustomValidity('Isi Id Pesan!')" oninput="this.setCustomValidity('')" /> <br />
      <br>
      <label style="color:#647cff" for="id_pelanggan">Id Pelanggan</label> <select id="id_pelanggan" class="box3" name="id_pelanggan" required oninvalid="this.setCustomValidity('Isi Id Pelanggan!')" oninput="this.setCustomValidity('')">
                <option value=""></option>
                <?php
                include "koneksi.php";
                $q = "SELECT * from pelanggan";
                $resultq = mysqli_query($conn, $q);
                while ($x = mysqli_fetch_array($resultq)) {
                ?>
                    <option value="<?php echo $x['id_pelanggan']; ?>">
                        <?php echo $x['nm_pelanggan']; ?>
                    </option>
                <?php
                }
                ?>
            </select><br />

     
               
            <label style="color:#647cff" for="tglpesan">Tanggal Pesan</label> <input type="date"    id="tglpesan" class="box6"    name="tgl_pesan" placeholder="Tanggal Pesan" value="<?php echo $timestamp?>" required oninvalid="this.setCustomValidity('Isi Tanggal Pesan!')" oninput="this.setCustomValidity('')" /> <br />
      
      <input type="submit"  class="submit" name="faktur_baru" value="Entry">
      <div></div>
   </form>

<?php 
   include_once "koneksi.php";

   if(isset($_POST['faktur_baru'])) {
      $id_pesan     = $_POST['id_pesan'];
      $id_pelanggan     = $_POST['id_pelanggan'];
      $tgl_pesan    = date('Y-m-d', strtotime($_POST['tgl_pesan']));

   $query = "INSERT INTO pesan VALUES ('$id_pesan','$id_pelanggan','$tgl_pesan')";
   $sql = mysqli_query($conn,$query);

   if($sql) {
      header('Location: index.php?page=detilpenjualan');

   } else {
      echo '<script>
      setTimeout(function() {
          swal({
              title: "Kesalahan",
              text: "Silahkan Coba Lagi!",
          }, function() {
              window.location = "index.php?page=penjualan";
          });
      });
  </script>';
   }
}
?>


</article>