
<?php 
include "./asset/koneksi.php";
include "./asset/import.php";


?>
<html>
<head>
  <title></title>
  <meta charset="UTF-8">
      <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="bootstrap/fonts/glyphicons-halflings-regular.ttf">

</head>
<body>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tambah</button>


 <table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>TAHUN MASUK</th>
      <th>TAGIHAN</th>
      <th>AKSI</th>

    </tr>
  </thead>
  <tbody>
  <?php 
  include "./asset/koneksi.php";
 $query = "select * from setting";
 // if (isset($_POST['cari'])) {
   
    $query="SELECT * from setting";
 // }
    $result = mysqli_query($koneksi,$query) or die(mysqli_error());
    $no=1;
  while($row = mysqli_fetch_object($result)){
    ?>
  <tr>
      <td><?php echo $row -> id_setting; ?></td>
      <td><?php echo $row -> tagihan;?></td>
      <td><a href="editbayar.php?id_setting=<?php echo $row -> id_setting; ?>" class="btn btn-primary" class="btn btn-primary">UPDATE</a>
     </td>
    </tr>
    <?php
    $no++;
  }
  ?>
    
  </tbody>
</table> 
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Setting Pembayaran</h4>
      </div>
      <div class="modal-body">
<form class="form-horizontal" method="post" action="query_setting.php">
      <fieldset>
         <div class="form-group">
  <div class="col-lg-6">
  <label class="control-label" for="inputSmall">TAHUN MASUK</label>
  <SELECT name="id_setting" class="form-control input-sm" >
  <option>2013</option>
   <option>2014</option>
   <option>2015</option>
   <option>2016</option>
   <option>2017</option>
   <option>2018</option>
   <option>2019</option>
   <option>2020</option></SELECT>  
  </div></div>

         <div class="form-group">
  <div class="col-lg-6">
  <label class="control-label" for="inputSmall">TAGIHAN</label>
  <input type="text" name="tagihan" class="form-control input-sm"  id="inputSmall">
  </div>
         </div>
  
              
      <div class="modal-footer">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
    
    </fieldset>
    </form>
  </div>
</div>
</body>
</html>