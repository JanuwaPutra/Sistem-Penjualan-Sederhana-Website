<article>
<?php
include_once 'koneksi.php';

$id_pelanggan = $_GET['pelanggan'];

$query="DELETE from pelanggan where id_pelanggan='$id_pelanggan'";
$exequerry = mysqli_query($conn, $query);
if($exequerry) {
    echo '<script>
    setTimeout(function() {
        swal({
            title: "Hapus Data Pelanggan!",
            text: "Hapus Data Sukses!",
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
            title: "Hapus Data Pelanggan!",
            text: "Hapus Data Gagal",
        }, function() {
            window.location = "index.php?page=pelanggan";
        });
    });
</script>';
}

?>'
</article>