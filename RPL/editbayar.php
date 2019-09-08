<?php 
include "./asset/koneksi.php";
// include "./asset/import.php";

if(isset($_GET['id_setting'])){

   $id_setting = $_GET['id_setting'];

   $query = mysqli_query($koneksi, "SELECT * FROM setting WHERE id_setting= '$id_setting'");

   $res = mysqli_fetch_array($query);


}

if(isset($_POST['simpan'])){

    $TAHUNMASUK = $_POST['id_setting'];
    $TAGIHAN= $_POST['tagihan'];

    $sql = mysqli_query($koneksi,"UPDATE setting SET id_setting='$TAHUNMASUK', tagihan='$TAGIHAN' WHERE id_setting='$TAHUNMASUK'");

    if ($koneksi->query($sql)===TRUE) {
      
        echo "DATA TIDAK BERHASIL DI INPUT";
    }else{
      header("location: index.php");
    }$koneksi->close();
     
}
 ?>

<form class="form-horizontal" method="post" action="editbayar.php">
      <fieldset>
         <div class="form-group">
            <div class="col-lg-6"  style="margin-left: 15px;">
            <label class="control-label" for="inputSmall">TAHUN MASUK</label>
            <input type="text" name="id_setting" value="<?php echo $res['id_setting']?>" class="form-control input-sm"  
            id="inputSmall" readonly>
            </div>
         </div>

          <div class="form-group">
            <div class="col-lg-6"  style="margin-left: 15px;">
            <label class="control-label" for="inputSmall">TAGIHAN</label>
            <input type="text" name="tagihan" value="<?php echo number_format($res['tagihan'], 0, '.','.')?>" class="form-control input-sm"  id="inputSmall">
            </div>
         </div> 

      <div class="form-group">
      <div class="col-lg-3" style="margin-left: 500px;">
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
      </div> 
      </div>
     
</fieldset>
    </form>
