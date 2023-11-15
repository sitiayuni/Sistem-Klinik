<?php
    include 'koneksi.php';

    $kode_obat = $_POST['kode_obat'];
    $nama_obat = $_POST['nama_obat'];
    $kategori =  $_POST['kategori'];
    $stok =  $_POST['stok'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $status = $_POST['status'];


    $query = "INSERT INTO obat (kode_obat, nama_obat, kategori, stok, harga_beli, harga_jual, status) VALUES ('$kode_obat', '$nama_obat', '$kategori', '$stok', '$harga_beli', '$harga_jual', '$status')";
            
    $result = mysqli_query($conn, $query);

    if(!$result){
        die("Query Error : ".mysqli_errno($conn)." - ".mysqli_error($conn));
    } else{
        echo "<script>alert('Data berhasil ditambahkan!');window.location='dashboard-apoteker/data-obat.php';</script>";
    }
      
?>