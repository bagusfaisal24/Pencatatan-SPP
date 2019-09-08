<?php 
require './fpdf/fpdf.php';
include './asset/koneksi.php';


$id=$_GET['id_bayar'];
$query = "select a.NIS, a.NAMA, b.tanggal, b.jumlah from user a, pembayaran b where a.NIS= b.NIS and b.id_bayar='$id'";
$result = mysqli_query($koneksi,$query)or die(mysqli_error());

class Report extends FPDF{
	public function buatTable($kolom,$baris){
		for($i=0;$i<count($kolom);$i++){
			$this->Cell(48,10,$kolom[$i],1);
		}
		
		$this->Ln();
		foreach ($baris as $bar) {
			$this->Cell(48,10,$bar[0],1,'','C');
			$this->Cell(48,10,$bar[1],1,'','C');
			$this->Cell(48,10,$bar[2],1,'','C');
			$this->Cell(48,10,$bar[3],1,'','C');
			$this->Ln();
		}
	}
}


$pdf = new Report();
$pdf->AddPage();
$pdf->SetFont('Arial','B',15);
$pdf->Cell(80);
$pdf->Cell(30,10,'Struk pembayaran SPP',0,0,'C');
$pdf->Ln();
$pdf->SetFont("Arial","",14);
while($row = mysqli_fetch_object($result)){
$kolom = array("NIS","NAMA","TANGGAL BAYAR","JUMLAH");
$baris[0] = array($row -> NIS,$row -> NAMA,$row -> tanggal,$row -> jumlah);
$pdf->buatTable($kolom,$baris);
$pdf->Output();	
}
 ?>
