


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">

      <link rel="stylesheet" type="text/css" href="asset/bootstrap.min.css">
      <script type="text/javascript" src="asset/js/jquery.min.js"></script>
      <script type="text/javascript" src="asset/js/jquery.min.js"></script>
      <script src="asset/js/bootstrap.min.js" type="text/javascript"></script>

</head>
<body>
<div class="panel panel-default">
  <div class="panel-body" align="center">
   <h4 >LOGIN</h4>
  </div>
</div>
  <form class="form-horizontal" method="POST" >
  <fieldset>

  <div class="row">
    <div class="col-xs-6 col-sm-4">
      
    </div>

  </div>

  <div class="row">
  
    <div class="col-md-6 col-md-offset-3">
    <div class="form-group">
      <label for="inputEmail" name="username"  class="col-lg-2 control-label"></label>
      <div class="col-lg-8">
        <input type="text" name="NAMA" class="form-control" id="inputUsername" placeholder="Username">
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail" name="username"  class="col-lg-2 control-label"></label>
      <div class="col-lg-8">
        <input type="password" name="password" class="form-control" id="inputUsername" placeholder="Password" >
      </div>
    </div>

    <div class="col-md-8 col-md-offset-2" >
  
        <button type="submit" id="login" name="login" class="btn btn-success btn-block">MASUK</button>
    </div>  
  </div>
    </div>
    <?php 
session_start();
if (isset($_POST['login'])) {
  require './asset/koneksi.php';
  $Username = $_POST['NAMA'];
  $password = $_POST['password'];
  $result = mysqli_query($koneksi, 'select * from user where NAMA ="'.$Username.'" and password="'.$password.'" ');

  if (mysqli_num_rows($result)==1) {
    $_SESSION['NAMA'] = $Username;
    header("Location:index.php");
  }
  else{
    echo ' <div class="col-md-7 col-md-offset-4" >
    <div class="col-lg-6 control-label">
         <div class="alert alert-danger" role="alert">
    <strong>Username dan Kata sandi salah!</strong> <a href="login.php" class="alert-link">Klik disini</a> dan coba login kembali
         </div>
    
    </div> 
      </div>  '; 
  }
  
}
 ?>

    
</fieldset>
</form>
</body>
</html>
