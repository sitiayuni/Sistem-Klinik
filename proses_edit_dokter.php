<?php
    include 'koneksi.php';

    $id = $_POST['id'];
    $kode_dokter = $_POST['kode_dokter'];
    $nama_dokter = $_POST['nama_dokter'];
    $umur_dokter =  $_POST['umur_dokter'];
    $alamat = $_POST['alamat_dokter'];
    $telepon = $_POST['nohp_dokter'];
    $poli =  $_POST['poli'];

    $query = "UPDATE dokter SET kode_dokter = '$kode_dokter',nama_dokter = '$nama_dokter',umur_dokter = '$umur_dokter',alamat_dokter = '$alamat',telepon_dokter = '$telepon', poli = '$poli'";
    $query .= "WHERE id = '$id'";

    $result = mysqli_query($conn, $query);

    if(!$result){
        die("Query Error : ".mysqli_errno($conn)." - ".mysqli_error($conn));
    } else{
        echo "<script>alert('Data berhasil disimpan!');window.location='dashboard-admin/data-dokter.php';</script>";
    }
      
?>

