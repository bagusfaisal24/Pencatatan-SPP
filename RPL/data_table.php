<div class="col col-md-12" style="text-align: right; margin-bottom: 1%;">
<label for="bulan" class="col col-md control-label">Pilihan  &nbsp; : &nbsp; &nbsp;</label>
	<div class="btn-group">
	<?php 
if (isset($_GET["month"])) 
	{ $month  = $_GET["month"];	}
else if (isset($_GET["select"])) 
	{ $month  = 'On Going';	}
else { $month = 'Semua'; }
 ?>
		<a class="btn btn-default" style="pointer-events: none;"><?php echo $month ?></a>
		<a class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li>
					<a href='datapesan.php?page=1'>Seaamua</a>
				</li>
				<li>
					<a href='datapesan.php?select=ongoing'>On Going</a>
				</li>
				<li class="divider"></li>

			<?php 
			include('konek.php');
			$sql = "SELECT COUNT(kode_pesan) AS c_kp, t_kembali
					FROM pesan
					WHERE t_kembali <= now()
					GROUP BY MONTH(t_kembali)
					ORDER BY t_kembali ASC";

			$rs_result = mysqli_query($koneksi, $sql);  $no=1;
			while ($row = mysqli_fetch_array($rs_result)) 
				{ $month = date(' F ',strtotime($row["t_kembali"])); ?>  
				<li>
					<a href='datapesan.php?month=<?php echo $month;?>'>
					<?php echo $month ?> &nbsp; &nbsp; &nbsp;
						<span class="badge">
							<?php echo $row["c_kp"]; ?>
						</span>
					</a>
				</li>
		  <?php }; ?>
		</ul>
	</div>
</div>

<table class="table table-striped table-hover" id="data_pemesanan">
  <thead>
    <tr>
      <th>No</th>
      <th>Pemesan</th>
      <th>Mobil</th>
      <th>Tanggal Pesan</th>
      <th>Tanggal Ambil</th>
      <th>Tanggal Kembali</th>
      <th>Lama</th>
      <th>Total</th>
    </tr>
  </thead>
  <tbody>
   <?php include ('/pagination.php')  ?>
  </tbody> 
</table>

<nav style="text-align: center;"><ul class="pagination">
    <?php 
	include ('konek.php'); $que = "SELECT COUNT(*) as total FROM pesan"; 
	 $maxp = 10;
     $re = mysqli_query($koneksi,$que) or die(mysqli_error($koneksi));
     $ro = mysqli_fetch_array($re); $total_pages = ceil($ro['total']/$maxp); 

if (isset($_GET["page"])) 
	{ $icurrent  = $_GET["page"]; }
else { $icurrent = 1; }  
	
	if (!isset($_GET["month"]) && !isset($_GET["select"]))
    	{ if(!empty($total_pages))
    		{ for($i=1; $i<=$total_pages; $i++)
                { if($i == $icurrent)
                 	{ ?> <li class='active'><a href='datapesan.php?page=<?php echo $i;?>'><?php echo $i;?></a></li> <?php }
           		  else 
            	 	{ ?> <li><a href='datapesan.php?page=<?php echo $i;?>'><?php echo $i;?></a></li> <?php } 
            	}
            }
        }   ?>
</ul></nav>

    