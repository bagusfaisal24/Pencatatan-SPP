<?php
session_start();
if (!isset($_SESSION['NAMA'])) {
  header("location:login.php");
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<?php
include "asset/import.php";
 ?>
 <style type="text/css">
   li a:hover{
            text-decoration: none;
            background-color: #235ec4;
      }
 </style>

</head>
<body>
<div class="form-group">

<nav class="navbar navbar-default panel" style="margin-top:10;">
  <div class="container-fluid"style="margin-top:10;">
    <div class="navbar-header"style="margin-top:10;">
    <h4 style="color:#ffffff">APLIKASI PEMBAYARAN SPP SEDERHANA</h4>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php" class="btn btn-lg" style="color:#ffffff">
        <span class="glyphicon glyphicon-off"></span></a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="row">
  <div class="col-md-3 cek">
  <ul class="nav nav-pills nav-stacked" >
  <li class="home panel"><a href="#"><span class="glyphicon glyphicon-home text"></span> Home</a></li>
  <li class="reg panel"><a href="#"><span class="glyphicon glyphicon-user text"></span> Registrasi Siswa</a></li>
  <li class="pembayaran panel"><a href="#"><span class="glyphicon glyphicon-pencil text"></span>  Pembayaran</a></li>
  <li class="rekap panel"><a href="#"><span class="glyphicon glyphicon-list-alt"></span>  Rekap pembayaran</a></li>
  <li class="setting panel"><a href="#"><span class="glyphicon glyphicon glyphicon-wrench text"></span>  Setting pembayaran</a></li>
  </ul>
  </div>


  <div class="col-md-9 cek">
  <div class="utama">

  </div>
  </div>
</div>
</div>



</body>
</html>
