<?php
    include 'koneksi.php';

    $id = $_POST['id'];
    $kode_transaksi = $_POST['kode_transaksi'];
    $nama_pasien = $_POST['nama_pasien'];
    $biaya_d =  $_POST['biaya_daftar'];
    $layanan =  $_POST['layanan'];
    $biaya_m = $_POST['biaya_medis'];
    $biaya_o = $_POST['biaya_obat'];
    $tanggal = $_POST['tanggal'];

    $query = "UPDATE transaksi SET kode_transaksi = '$kode_transaksi',nama_pasien = '$nama_pasien',biaya_daftar = '$biaya_d',layanan = '$layanan',biaya_medis = '$biaya_m',biaya_obat = '$biaya_o', tanggal = '$tanggal'";
    $query .= "WHERE id = '$id'";

    $result = mysqli_query($conn, $query);

    if(!$result){
        die("Query Error : ".mysqli_errno($conn)." - ".mysqli_error($conn));
    } else{
        echo "<script>alert('Data berhasil disimpan!');window.location='dashboard-admin/transaksi.php';</script>";
    }
      
?>

