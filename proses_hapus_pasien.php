<?php
include 'koneksi.php';

$id = $_GET['id'];
$query ="DELETE FROM pasien WHERE id='$id'";
$result = mysqli_query($conn,$query);

if(!$result){
    die("Query Error : ".mysqli_errno($conn)." - ".mysqli_error($conn));
} else{
    echo "<script>alert('Data berhasil dihapus!');window.location='dashboard-admin/data-pasien.php';</script>";
}

?>