<?php
    session_start();
    include 'koneksi.php';

    $username = $_POST['username'];
    $password = $_POST['pass'];

    $query = "SELECT * FROM user WHERE username = '$username'";
    $hasil = mysqli_query($conn,$query);
    $data = mysqli_fetch_array($hasil);

    if ($password == $data['password'])
    {
    echo "sukses";
        $_SESSION['level'] = $data['level'];
        $_SESSION['username'] = $data['username'];
        header('location: portal.php');
    }
    else 
    echo '<h1>Login gagal</h1>';
?>