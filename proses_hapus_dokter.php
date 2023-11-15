<?php
include 'koneksi.php';

$id = $_GET['id'];
$query ="DELETE FROM dokter WHERE id='$id'";
$result = mysqli_query($conn,$query);

if(!$result){
    die("Query Error : ".mysqli_errno($conn)." - ".mysqli_error($conn));
} else{
    echo "<script>alert('Data berhasil dihapus!');window.location='dashboard-admin/data-dokter.php';</script>";
}

?>