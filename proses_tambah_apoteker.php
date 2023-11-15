<?php
    include 'koneksi.php';

    $kode_apoteker = $_POST['kode_apoteker'];
    $nama_apoteker = $_POST['nama_apoteker'];
    $umur_apoteker =  $_POST['umur_apoteker'];
    $alamat = $_POST['alamat_apoteker'];
    $telepon = $_POST['nohp_apoteker'];
    $status=  $_POST['status'];

    $query = "INSERT INTO apoteker (kode_apoteker, nama_apoteker, umur_apoteker, alamat_apoteker, telepon_apoteker,status) VALUES ('$kode_apoteker', '$nama_apoteker', '$umur_apoteker', '$alamat', '$telepon', '$status')";
            
    $result = mysqli_query($conn, $query);

    if(!$result){
        die("Query Error : ".mysqli_errno($conn)." - ".mysqli_error($conn));
    } else{
        echo "<script>alert('Data berhasil ditambahkan!');window.location='dashboard-admin/data-apoteker.php';</script>";
    }
      
?>