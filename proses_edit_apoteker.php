<?php
    include 'koneksi.php';

    $id = $_POST['id'];
    $kode_apoteker = $_POST['kode_apoteker'];
    $nama_apoteker = $_POST['nama_apoteker'];
    $umur_apoteker =  $_POST['umur_apoteker'];
    $alamat = $_POST['alamat_apoteker'];
    $telepon = $_POST['nohp_apoteker'];
    $status =  $_POST['status'];

    $query = "UPDATE apoteker SET kode_apoteker = '$kode_apoteker',nama_apoteker = '$nama_apoteker',umur_apoteker = '$umur_apoteker',alamat_apoteker = '$alamat',telepon_apoteker = '$telepon', status = '$status'";
    $query .= "WHERE id = '$id'";

    $result = mysqli_query($conn, $query);

    if(!$result){
        die("Query Error : ".mysqli_errno($conn)." - ".mysqli_error($conn));
    } else{
        echo "<script>alert('Data berhasil disimpan!');window.location='dashboard-admin/data-apoteker.php';</script>";
    }
      
?>

