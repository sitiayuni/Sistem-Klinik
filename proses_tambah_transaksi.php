<?php
    include 'koneksi.php';

    $kode_transaksi = $_POST['kode_transaksi'];
    $id = $_POST['id'];
    $biaya_daftar = $_POST['biaya_daftar'];
    $id_layanan = $_POST['id_layanan'];
    $tanggal = $_POST['tanggal'];

    // Cek keberadaan kode transaksi sebelum melakukan INSERT
    $query_check = "SELECT kode_transaksi FROM transaksi WHERE kode_transaksi = '$kode_transaksi'";
    $result_check = mysqli_query($conn, $query_check);

    if (!$result_check) {
        die("Query Error : " . mysqli_errno($conn) . " - " . mysqli_error($conn));
    }

    // Jika kode transaksi sudah ada, tampilkan pesan error
    if (mysqli_num_rows($result_check) > 0) {
        echo "<script>alert('Kode transaksi sudah ada!');window.location='dashboard-admin/transaksi.php';</script>";
        exit();
    }

    // Jika kode transaksi belum ada, lakukan operasi INSERT
    $query_insert = "INSERT INTO transaksi (kode_transaksi, id, biaya_daftar, id_layanan, tanggal) 
                     VALUES ('$kode_transaksi', '$id', '$biaya_daftar', '$id_layanan', '$tanggal')";

    $result_insert = mysqli_query($conn, $query_insert);

    if (!$result_insert) {
        die("Query Error : " . mysqli_errno($conn) . " - " . mysqli_error($conn));
    } else {
        echo "<script>alert('Data berhasil ditambahkan!');window.location='dashboard-admin/transaksi.php';</script>";
    }
?>
