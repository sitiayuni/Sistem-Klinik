<?php
    include 'koneksi.php';

    $no_rekam = $_POST['no_rekam'];
    $kode_pasien = $_POST['kode_pasien'];
    $berat_badan = $_POST['berat_badan'];
    $tinggi_badan =  $_POST['tinggi_badan'];
    $suhu_badan =  $_POST['suhu_badan'];
    $tanggal = $_POST['tanggal'];
    $keluhan = $_POST['keluhan'];
    $obat = $_POST['obat'];
    $kode_dokter = $_POST['kode_dokter'];


    $query = "INSERT INTO rekam_medis(no_rekam_medis, kode_pasien, berat_badan, tinggi_badan, suhu_badan, tanggal, keluhan, obat, kode_dokter) VALUES ('$no_rekam','$kode_pasien', '$berat_badan', '$tinggi_badan', '$suhu_badan', '$tanggal', '$keluhan', '$obat', '$kode_dokter')";
            
    $result = mysqli_query($conn, $query);

    if(!$result){
        die("Query Error : ".mysqli_errno($conn)." - ".mysqli_error($conn));
    } else{
        echo "<script>alert('Data berhasil ditambahkan!');window.location='dashboard-dokter/rekam-medis.php';</script>";
    }
      
?>