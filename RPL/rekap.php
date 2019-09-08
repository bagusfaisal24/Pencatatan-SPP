<?php 
include "./asset/import.php";

 ?>
<html>
<head>
  <title></title>
   <link rel="stylesheet" type="text/css" href="./asset/data_tables.css">
   <script src="./asset/data_tables.js" type="text/javascript"></script>
</head>
</head>
  <body>
                      <table class="table table-striped table-hover" id="rekap">
  <thead>
    <tr>
      <th>NO</th>
      <th>NIS</th>
      <th>NAMA</th>
      <th>TANGGAL</th>
      <th>JUMLAH</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  include "./asset/koneksi.php"; //[1]

 $query = "select * from pembayaran";
   
    $query="SELECT  a.NIS, a.NAMA, b.tanggal, b.jumlah FROM user a, pembayaran b where a.NIS = b.NIS  "; // [2]
 // }
    $result = mysqli_query($koneksi,$query) or die(mysqli_error()); // [3]
    $no=1;
    $total =0;
  while($row = mysqli_fetch_object($result)){
    ?>
  <tr>
    <td><?php echo $no?></td>
      <td><?php echo $row -> NIS; ?></td>
      <td><?php echo $row -> NAMA;?></td>
      <td><?php echo $row -> tanggal;?></td>
      <td><?php echo $row -> jumlah;?></td>
    </tr>
    <?php
    $no++;

    $total = $total + $row-> jumlah;
  }
  ?>
    
  </tbody>
</table>
<table>
  <tr>
  <th>TOTAL PEMBAYARAN &nbsp;&nbsp;</th>
  <th><button type="submit" class="btn btn-primary" name="simpan" disabled=""> <?php echo $total; ?></button> 
</th>
  </tr>
</table>
<script>
  $('#rekap').DataTable();
</script>
</body>

</html>