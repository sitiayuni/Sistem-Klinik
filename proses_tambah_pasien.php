<?php
    include 'koneksi.php';

    $nomor_identitas = $_POST['nomor_identitas'];
    $nama_pasien = $_POST['nama_pasien'];
    $umur_pasien =  $_POST['umur_pasien'];
    $jk =  $_POST['jk'];
    $alamat = $_POST['alamat_pasien'];
    $telepon = $_POST['nohp_pasien'];
    $tanggal = $_POST['tanggal'];

    // Cek apakah nomor identitas sudah dipakai
    $cek_query = "SELECT nomor_identitas FROM pasien WHERE nomor_identitas = '$nomor_identitas'";
    $cek_result = mysqli_query($conn, $cek_query);

    if(mysqli_num_rows($cek_result) > 0){
        // Nomor identitas sudah dipakai, tampilkan pesan error
        echo "<script>alert('Nomor identitas sudah dipakai!');window.location='dashboard-admin/tambah-pasien.php';</script>";
    } else {
        // Nomor identitas belum dipakai, lakukan penambahan data
        $query = "INSERT INTO pasien (nomor_identitas, nama_pasien, umur_pasien, jenis_kelamin, alamat, telepon, tanggal) VALUES ('$nomor_identitas', '$nama_pasien', '$umur_pasien', '$jk', '$alamat', '$telepon', '$tanggal')";
        $result = mysqli_query($conn, $query);

        if(!$result){
            die("Query Error : ".mysqli_errno($conn)." - ".mysqli_error($conn));
        } else {
            echo "<script>alert('Data berhasil ditambahkan!');window.location='dashboard-admin/data-pasien.php';</script>";
        }
    }
?>
