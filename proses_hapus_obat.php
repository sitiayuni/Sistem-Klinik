<?php
include 'koneksi.php';

$id = $_GET['id'];
$query ="DELETE FROM obat WHERE id='$id'";
$result = mysqli_query($conn,$query);

if(!$result){
    die("Query Error : ".mysqli_errno($conn)." - ".mysqli_error($conn));
} else{
    echo "<script>alert('Data berhasil dihapus!');window.location='dashboard-apoteker/data-obat.php';</script>";
}

?>