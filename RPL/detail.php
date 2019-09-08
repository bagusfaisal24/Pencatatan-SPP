<?php 
include "./asset/import.php";
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
<table class="table">

<?php 
  include "./asset/koneksi.php";
$nis = $_GET['NIS'];
$query = "select NIS, NAMA from user where NIS = '$nis' limit 1";
$result = mysqli_query($koneksi, $query) or die (mysqli_error());
  while($row = mysqli_fetch_object($result)){
    ?>

  <tr>
    <th>NAMA</th>
    <td><?php echo $row -> NAMA;?></td>
  </tr>
  <tr>
    <th>NIS</th>
    <td><?php echo $row -> NIS;?></td>
  </tr>
<?php

  }
?>
</table>
 
 <table class="table table-striped table-hover">
 <thead>
    <tr>
      <th>NO</th>
      <th>TANGGAL BAYAR</th>
      <th>JUMLAH</th>
      <th>AKSI</th>

    </tr>
  </thead>
  <tbody>

  <?php 
  include "./asset/koneksi.php";
  $nis=$_GET['NIS'];
  $query = "select a.NIS, a.NAMA,b.id_bayar, b.tanggal, b.jumlah from user a, pembayaran b where a.NIS= b.NIS and a.NIS='$nis'";

    $result = mysqli_query($koneksi,$query) or die(mysqli_error());
    $no=1;
    $total =0;
  while($row = mysqli_fetch_object($result)){
    ?>
   
  <tr>
    <td><?php echo $no?></td>
      <td><?php echo $row -> tanggal;?></td>
      <td><?php echo $row -> jumlah;?></td>
      <td><a href="cetak.php?id_bayar=<?php echo $row -> id_bayar;?>" class="btn btn-primary">Cetak</a></td>
    </tr>
    <?php
    $no++;

    $total = $total + $row-> jumlah;
  }
?>
<table>
  <tr>
  <th>TOTAL PEMBAYARAN &nbsp;&nbsp;</th>
  <th><button type="submit" class="btn btn-primary" name="simpan" disabled=""> <?php echo $total; ?></button>
</th>
  </tr>
    
  </tbody>
</table> 
 </body>
 </html>