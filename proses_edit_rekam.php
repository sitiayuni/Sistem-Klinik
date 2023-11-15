<?php
    include 'koneksi.php';

    $id = $_POST['id'];
    $no_rekam = $_POST['no_rekam'];
    $kode_pasien = $_POST['kode_pasien'];
    $berat_badan = $_POST['berat_badan'];
    $tinggi_badan =  $_POST['tinggi_badan'];
    $suhu_badan =  $_POST['suhu_badan'];
    $tanggal = $_POST['tanggal'];
    $keluhan = $_POST['keluhan'];
    $obat = $_POST['obat'];
    $kode_dokter = $_POST['kode_dokter'];

    $query = "UPDATE rekam_medis SET no_rekam_medis = '$no_rekam', kode_pasien = '$kode_pasien',berat_badan = '$berat_badan',tinggi_badan = '$tinggi_badan',suhu_badan = '$suhu_badan', tanggal = '$tanggal', keluhan = '$keluhan', obat = '$obat', kode_dokter = '$kode_dokter'  WHERE id = '$id'";

    $result = mysqli_query($conn, $query);

    if(!$result){
        die("Query Error : ".mysqli_errno($conn)." - ".mysqli_error($conn));
    } else{
        echo "<script>alert('Data berhasil disimpan!');window.location='dashboard-dokter/rekam-medis.php';</script>";
    }
      
?>

