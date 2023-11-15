<?php
    include 'koneksi.php';

    $id = $_POST['id'];
    $kode_obat = $_POST['kode_obat'];
    $nama_obat = $_POST['nama_obat'];
    $kategori =  $_POST['kategori'];
    $stok =  $_POST['stok'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $status = $_POST['status'];

    $query = "UPDATE obat SET kode_obat = '$kode_obat',nama_obat = '$nama_obat',kategori = '$kategori',stok = '$stok',harga_beli = '$harga_beli', harga_jual = '$harga_jual', status = '$status' WHERE id = '$id'";

    $result = mysqli_query($conn, $query);

    if(!$result){
        die("Query Error : ".mysqli_errno($conn)." - ".mysqli_error($conn));
    } else{
        echo "<script>alert('Data berhasil disimpan!');window.location='dashboard-apoteker/data-obat.php';</script>";
    }
      
?>

