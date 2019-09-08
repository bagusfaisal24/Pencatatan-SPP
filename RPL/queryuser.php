<?php 
include "./asset/koneksi.php";

$NIS = $_POST['NIS']; // [1] merupakan variabel 
$TINGKAT = $_POST['tahun_angkatan']; // [1]
$NAMA = $_POST['NAMA']; // [1]



$sql = "INSERT INTO user(NIS,tahun_angkatan,NAMA) VALUES ('$NIS','$TINGKAT','$NAMA')"; // [2] query sql untuk menginputkan  
																				// data ke table user 

if ($koneksi->query($sql)===TRUE) {                              // [3] merupakan perintah validasi setelah input data
	echo '<script>alert("Data berhasil di input ! ");</script>';
	header("location: index.php");
    
}else{
	echo "DATA TIDAK BERHASIL DI INPUT";
}$koneksi->close();

 ?>