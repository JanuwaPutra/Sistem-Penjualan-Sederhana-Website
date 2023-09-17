<article>
<?php
include_once 'koneksi.php';

$id = $_GET['produk'];

$query="DELETE from produk where id_produk='$id'";
$exequerry = mysqli_query($conn, $query);
if($exequerry) {
    echo '<script>
    setTimeout(function() {
        swal({
            title: "Hapus Data Produk",
            text: "Hapus Data Sukses!",
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
            title: "Hapus Data Produk",
            text: "Hapus Data Gagal!",
        }, function() {
            window.location = "index.php?page=produk";
        });
    });
</script>';
}




?>
</article>