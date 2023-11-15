<?php
  include 'koneksi.php';

  error_reporting(0);
  session_start();
  if (isset($_SESSION['level']))
  {

    if ($_SESSION['level'] == "pimpinan")
    {
      header('location: dashboard-pimpinan/index.php');
    }

    if ($_SESSION['level'] == "admin")
    {
      header('location: dashboard-admin/index.php');
    }

    if ($_SESSION['level'] == "apoteker")
    {
      header('location: dashboard-apoteker/index.php');
    }

    if ($_SESSION['level'] == "dokter")
    {
      header('location: dashboard-dokter/index.php');
    }
  }
?>