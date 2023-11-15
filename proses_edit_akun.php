<?php
    include 'koneksi.php';

    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['pass'];
    $level = $_POST['level'];
    $nama_depan =  $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $alamat = $_POST['alamat'];

    $query = "UPDATE user SET username = '$username',password = '$password', level= '$level',nama_depan = '$nama_depan',nama_belakang = '$nama_belakang',alamat = '$alamat'";
    $query .= "WHERE id = '$id'";

    $result = mysqli_query($conn, $query);

    if(!$result){
        die("Query Error : ".mysqli_errno($conn)." - ".mysqli_error($conn));
    } else{
        if($level == 'admin'){
            echo "<script>alert('Data berhasil disimpan!');window.location='dashboard-admin/edit-akun.php';</script>";
        } if($level == 'apoteker'){
            echo "<script>alert('Data berhasil disimpan!');window.location='dashboard-apoteker/akun.php';</script>";
        } if($level == 'dokter'){
            echo "<script>alert('Data berhasil disimpan!');window.location='dashboard-dokter/akun.php';</script>";
        }
    }
      
?>

