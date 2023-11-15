<?php
    include 'koneksi.php';

    $id = $_POST['id'];
    $nomor_identitas = $_POST['nomor_identitas'];
    $nama_pasien = $_POST['nama_pasien'];
    $umur_pasien =  $_POST['umur_pasien'];
    $jk =  $_POST['jk'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['nohp_pasien'];
    $tanggal = $_POST['tanggal'];

    $query = "UPDATE pasien SET nomor_identitas = '$nomor_identitas',nama_pasien = '$nama_pasien',umur_pasien = '$umur_pasien',jenis_kelamin = '$jk',alamat = '$alamat',telepon = '$telepon', tanggal = '$tanggal'";
    $query .= "WHERE id = '$id'";

    $result = mysqli_query($conn, $query);

    if(!$result){
        die("Query Error : ".mysqli_errno($conn)." - ".mysqli_error($conn));
    } else{
        echo "<script>alert('Data berhasil disimpan!');window.location='dashboard-admin/data-pasien.php';</script>";
    }
      
?>

