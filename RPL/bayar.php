<?php 
include "./asset/koneksi.php"; // [1]
include "./asset/import.php";


if(isset($_GET['NIS'])){
$NIS = $_GET['NIS'];

$query = mysqli_query($koneksi, "select a.NIS, a.NAMA, b.tagihan from user a, setting b where a.tahun_angkatan = b.tahun_angkatan 
                                and NIS='$NIS'"); // [2]
$res=mysqli_fetch_array($query);
}

if(isset($_POST['simpan'])){ // [3]
$NIS=$_POST['NIS'];
$jumlah = $_POST['jumlah'];
$sql = "INSERT INTO pembayaran(NIS,tanggal,jumlah)  VALUES ('$NIS',now(),'$jumlah')";


if ($koneksi->query($sql)===TRUE) { // [4]
 header("location: index.php");
}else{
  echo "DATA TIDAK BERHASIL DI INPUT";
}$koneksi->close();

}


 ?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
	
</head>
<body>
   
<?php
 $now = date('Y-m');
 // echo $now;
$sqlcek = mysqli_query($koneksi,"SELECT * FROM `pembayaran` WHERE nis = '".$res['NIS']."' && tanggal LIKE '%".$now."%'");
$jum = mysqli_num_rows($sqlcek);
// echo $jum;

if($jum>=1){
$tagihan = 00000;
}else{
  $tagihan = $res['tagihan'];

}

?>
<form class="form-horizontal" method="post" action="bayar.php">
      <fieldset>
          <div class="form-group">
   <div class="col-lg-6" style="margin-left: 15px;">
  <label class="control-label"  for="inputSmall">NIS</label>
  <input type="text" name="NIS" value="<?php echo $res['NIS']?>" class="form-control input-sm" id="inputSmall" readonly>
  </div>
          </div>

         <div class="form-group">
  <div class="col-lg-6" style="margin-left: 15px;">
  <label class="control-label" for="inputSmall">NAMA</label>
  <input type="text" name="NAMA"  value="<?php echo $res['NAMA']?>" class="form-control input-sm"  id="inputSmall" required="">
  </div>
    <div class="form-group">
  <div class="col-lg-6" style="margin-left: 30px;">
  <label class="control-label" for="inputSmall">BULAN BAYAR</label>
  <input type="text" name="" disabled="" value="<?php echo date('M Y'); ?>"  class="form-control input-sm" ></div></div>
  
         <!-- </div>
         <div class="form-group">
  <div class="col-lg-6" style="margin-left: 15px;">
  <label class="control-label" for="tanggal">Tanggal</label></br>
  <input type="text" name="tanggal" class="tanggal form-control input-sm">
  </div>
  <script type="text/javascript">
            $(document).ready(function () {
                $('.tanggal').datepicker({
                    format: "dd-mm-yyyy",
                    autoclose:true
                });
            });
        </script>
         </div> -->
         <div class="form-group">
  <div class="col-lg-6" style="margin-left: 30px;">
  <label class="control-label" for="inputSmall">TAGIHAN</label>
  <input type="text" name="jumlah" value="<?php echo $tagihan ?>" class="form-control input-sm"  id="inputSmall" readonly>
  </div>
         </div>
 
 
      <div class="modal-footer" style="margin-right: 10px;">
        <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>

        <?php 
        if ($tagihan>0) {
    echo '<button type="submit" class="btn btn-primary" name="simpan">Simpan</button>';
          }
          else
            echo '<button type="submit" class="btn btn-primary" name="simpan" disabled="">Simpan</button>';
        ?>
        
      </div>

        </fieldset>
              </form>

</body>
</html>