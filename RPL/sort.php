<?php
include('./asset/koneksi.php');
$maxp = 10;

if (isset($_GET["page"])) 
	{ $page  = $_GET["page"]; }
else { $page = 1; }  

$start_from = ($page-1) * $maxp;  
 $no = 1+$start_from; 

if (isset($_GET["month"]))
	{ $month = date('m', strtotime($_GET["month"]));
	  $sql = "SELECT * FROM pembayaran a, user b
			  WHERE a.NIS = b.NIS AND MONTH(a.t_tanggal) = '$month' AND b.tanggal < now()
			  ORDER BY id_bayar";
	} 
else if (isset($_GET["select"]))
	{ $sql = "SELECT * FROM pembayaran a, user b
			  WHERE a.NIS = b.NIS AND a.tanggal > now() AND a.tanggal <= now()
			  ORDER BY id_bayar DESC LIMIT $start_from, $maxp";
	}
else
	{ $sql = "SELECT * FROM pembayaran a, user b
			  WHERE a.NIS = b.NIS 
			  ORDER BY id_bayar DESC LIMIT $start_from, $maxp";
	}

$rs_result = mysqli_query($koneksi, $sql); 
?>

<?php $omset=0;
while ($row = mysqli_fetch_array($rs_result)) 
	{ ?>  
            <tr>
            <td><?php echo $no.".";?></td>  
            <td><?php echo $row["NIS"]; ?></td>  
            <td><?php echo $row["NAMA"]; ?></td> 
            <td><?php echo $row["tanggal"]; ?></td> 
            <td><?php echo $row["jumlah"]; ?></td> 
            <td><?php echo date('d F Y',strtotime($row["id_bayar"])); ?>
            	<br> <?php echo date('h:i:s A',strtotime($row["id_bayar"])); ?>
            </td>
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
	
$que = "SELECT COUNT(*) as total FROM pembayaran"; 
     $re = mysqli_query($koneksi,$que);
     if (!isset($_GET["month"]))
     	{ $ro = mysqli_fetch_array($re); $ro = ceil($ro['total']); }
echo ($start_from+1)." - ".($no-1);
		if (!isset($_GET["month"]) && !isset($_GET["select"]))
     	{ echo " dari ".$ro; }  
?>