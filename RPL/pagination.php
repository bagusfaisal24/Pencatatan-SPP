<?php
include('konek.php');
$maxp = 10;

if (isset($_GET["page"])) 
	{ $page  = $_GET["page"]; }
else { $page = 1; }  

$start_from = ($page-1) * $maxp;  
 $no = 1+$start_from; 

if (isset($_GET["month"]))
	{ $month = date('m', strtotime($_GET["month"]));
	  $sql = "SELECT * FROM mobil a, pesan b, cos c
			  WHERE a.kode = b.kode AND c.imel = b.imel AND MONTH(b.t_kembali) = '$month' AND b.t_kembali < now()
			  ORDER BY kode_pesan";
	} 
else if (isset($_GET["select"]))
	{ $sql = "SELECT * FROM mobil a, pesan b, cos c
			  WHERE a.kode = b.kode AND c.imel = b.imel AND b.t_kembali > now() AND b.t_ambil <= now()
			  ORDER BY kode_pesan DESC LIMIT $start_from, $maxp";
	}
else
	{ $sql = "SELECT * FROM mobil a, pesan b, cos c
			  WHERE a.kode = b.kode AND c.imel = b.imel
			  ORDER BY kode_pesan DESC LIMIT $start_from, $maxp";
	}

$rs_result = mysqli_query($koneksi, $sql); 
?>

<?php $omset=0;
while ($row = mysqli_fetch_array($rs_result)) 
	{ ?>  
            <tr>
            <td><?php echo $no.".";?></td>  
            <td><?php echo $row["nama_cos"]; ?><br><?php echo $row["imel"]; ?></td>  
            <td><?php echo $row["merk_mobil"]; ?><br><?php echo $row["nama_mobil"]; ?></td> 
            <td><?php echo date('d F Y',strtotime($row["kode_pesan"])); ?>
            	<br> <?php echo date('h:i:s A',strtotime($row["kode_pesan"])); ?>
            </td> 
            <td><?php echo date('d F Y',strtotime($row["t_ambil"])); ?></td>
            <td><?php echo date('d F Y',strtotime($row["t_kembali"])); ?></td> 
            <td><?php echo $row["lama"]." Hari"; ?></td>    
            <td><?php echo "Rp. ".number_format($row["total"], 0, '.', '.'); ?></td>  
            </tr>
<?php  $no++; $omset = $omset + $row["total"];
	}; if (isset($_GET["month"])) 
			{ ?>
				<td colspan="7" style="text-align: right;">
					<strong style="font-size: 115%;">TOTAL :</strong> 
				</td>
				<td>
					<strong style="font-size: 115%;"><?php echo "Rp. ".number_format($omset, 0, '.', '.'); ?></strong>
				</td>  
	<?php	}
	
$que = "SELECT COUNT(*) as total FROM pesan"; 
     $re = mysqli_query($koneksi,$que);
     if (!isset($_GET["month"]))
     	{ $ro = mysqli_fetch_array($re); $ro = ceil($ro['total']); }
echo ($start_from+1)." - ".($no-1);
		if (!isset($_GET["month"]) && !isset($_GET["select"]))
     	{ echo " dari ".$ro; }  
?>