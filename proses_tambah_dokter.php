<?php
    include 'koneksi.php';

    $kode_dokter = $_POST['kode_dokter'];
    $nama_dokter = $_POST['nama_dokter'];
    $umur_dokter =  $_POST['umur_dokter'];
    $alamat = $_POST['alamat_dokter'];
    $telepon = $_POST['nohp_dokter'];
    $poli =  $_POST['poli'];

    $query = "INSERT INTO dokter (kode_dokter, nama_dokter, umur_dokter, alamat_dokter, telepon_dokter, poli) VALUES ('$kode_dokter', '$nama_dokter', '$umur_dokter', '$alamat', '$telepon', '$poli')";
            
    $result = mysqli_query($conn, $query);

    if(!$result){
        die("Query Error : ".mysqli_errno($conn)." - ".mysqli_error($conn));
    } else{
        echo "<script>alert('Data berhasil ditambahkan!');window.location='dashboard-admin/data-dokter.php';</script>";
    }
      
?>