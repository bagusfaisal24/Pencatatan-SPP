<?php 
session_start();
include('./asset/koneksi.php');

session_destroy();

header('location:login.php');

 ?>