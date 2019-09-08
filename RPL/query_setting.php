<?php 
include "./asset/koneksi.php";

$TINGKAT = $_POST['id_setting'];
$TAGIHAN = $_POST['tagihan'];	

$sql = "INSERT INTO setting(id_setting,tagihan) VALUES ('$TINGKAT','$TAGIHAN')";

if ($koneksi->query($sql)===TRUE) {
	echo '<script>alert("Data berhasil di input ! ");</script>';
	// header("location: index.php");
    
}else{
	echo "DATA TIDAK BERHASIL DI INPUT";
}$koneksi->close();

 ?>