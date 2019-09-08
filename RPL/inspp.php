  <?php
  include "./asset/import.php";

   ?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
 <link rel="stylesheet" type="text/css" href="./asset/data_tables.css">
   <script src="./asset/data_tables.js" type="text/javascript"></script>
</head>
<body>

        <table class="table table-hover" id="data_siswa">
  <thead>
    <tr>
      <th>NO</th>
      <th>NIS</th>
      <th>NAMA</th>
      <th>TAHUN MASUK</th>
      <th>AKSI</th>

    </tr>
  </thead>
  <tbody>
  <?php
 include "./asset/koneksi.php"; //[1]

 $query = "select * from user";

    $query="SELECT  a.NIS, a.NAMA, b.id_setting FROM user a, setting b where a.id_setting = b.id_setting  "; //[2]
 // }
    $result = mysqli_query($koneksi,$query) or die(mysqli_error()); // [3]
    $no=1;
  while($row = mysqli_fetch_object($result)){ // [4]
    ?>
  <tr>
    <td><?php echo $no?></td>
      <td><?php echo $row -> NIS; ?></td>
      <td><?php echo $row -> NAMA;?></td>
      <td><?php echo $row -> id_setting;?></td>
      <td><a href="bayar.php?NIS=<?php echo $row -> NIS;?>" class="btn btn-primary" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Bayar</a><!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Bayar</button> -->
      <a href="detail.php?NIS=<?php echo $row -> NIS;?>" class="btn btn-primary">Detail</a></td>
    </tr>
    <?php
    $no++;
  }
  ?>

  </tbody>
</table>



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Setting Pembayaran</h4>
      </div>
      <div class="modal-body">


      <div class="modal-footer">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>

    </fieldset>
    </form>
  </div>
</div>

<script>
  $('#data_siswa').DataTable();
</script>
</body>
</html>
