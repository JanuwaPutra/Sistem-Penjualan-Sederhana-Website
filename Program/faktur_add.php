<article>
<p><a href="index.php">Home </a> /  <a href="index.php?page=faktur">Faktur Penjualan</a> / Buat Faktur 
   <div class="card">
      <?php
      include_once "koneksi.php";

      $query = "SELECT * FROM faktur ORDER BY id_faktur";
      $sql = mysqli_query($conn, $query);

      $no = 1;
      while ($row = mysqli_fetch_assoc($sql)) {
         $no = $row['id_faktur'];
         $no++;
      }
      $timestamp = date("Y-m-d") ;
      ?>



      <h2 align="center" style="color:#0059be">Buat Faktur Baru</h2>
      </form>
      <form action="" method="POST">
         <label style="color:#647cff" for="id_faktur">Id Faktur</label> <input class="box" readonly value="<?php echo $no ?>" id="id_faktur" type="text" name="id_faktur" placeholder="id faktur" Faktur" maxlength="10" required oninvalid="this.setCustomValidity('Isi Id Faktur!')" oninput="this.setCustomValidity('')" /> <br />

         <br>
         <label style="color:#647cff" for="id_pesan">Id Pesan</label> <select id="id_pesan" class="box3" name="id_pesan" required oninvalid="this.setCustomValidity('Isi Id Pesan!')" oninput="this.setCustomValidity('')">
            <option value=""></option>
            <?php
            include "koneksi.php";
            $q = "SELECT * from pesan";
            $resultq = mysqli_query($conn, $q);
            while ($x = mysqli_fetch_array($resultq)) {
            ?>
               <option value="<?php echo $x['id_pesan']; ?>">
                  <?php echo $x['id_pesan']; ?>
               </option>
            <?php
            }
            ?>
         </select><br />



         <label style="color:#647cff" for="tglfaktur">Tanggal Faktur</label> <input id="tglfaktur"  class="box6" type="date" name="tgl_faktur" placeholder="Tanggal Faktur" value="<?php echo $timestamp?>" required oninvalid="this.setCustomValidity('Isi Tanggal Faktur!')" oninput="this.setCustomValidity('')" /> <br />

         <input type="submit" class="submit" name="faktur_baru" value="Simpan & Lihat Faktur">
         <div></div>
      </form>

      <?php
      include_once "koneksi.php";

      if (isset($_POST['faktur_baru'])) {
         $id_faktur     = $_POST['id_faktur'];
         $id_pesan      = $_POST['id_pesan'];
         $tgl_faktur    = date('Y-m-d', strtotime($_POST['tgl_faktur']));

         $query = "INSERT INTO faktur VALUES ('$id_faktur','$id_pesan','$tgl_faktur')";
         $sql = mysqli_query($conn, $query);

         if ($sql) {
            echo '<script>
            setTimeout(function() {
                swal({
                    title: "Tambah Data",
                    text: "Tambah Data Faktur Sukses!",
                    type: "success"
                }, function() {
                    window.location = "index.php?page=faktur";
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
                    window.location = "index.php?page=faktur";
                });
            });
        </script>';
         }
      }
      ?>
</article>