
<html>
<head>
  <title></title>
  <meta charset="UTF-8">
      <link rel="stylesheet" type="text/css" href="bootstrap/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="bootstrap/fonts/glyphicons-halflings-regular.ttf">

</head>
<body>


<form class="form-horizontal" method="post" action="queryuser.php">
      <fieldset>
          <div class="form-group">
   <div class="col-lg-6">
  <label class="control-label" for="inputSmall">NIS</label>
  <input type="text" name="NIS" class="form-control input-sm" id="inputSmall" required="">
  </div>
          </div>

         <div class="form-group">
  <div class="col-lg-6">
  <label class="control-label" for="inputSmall">NAMA</label>
  <input type="text" name="NAMA" class="form-control input-sm"  id="inputSmall">
  </div>
         </div>

         <div class="form-group">
  <div class="col-lg-6">
  <label class="control-label" for="inputSmall">TAHUN MASUK</label>
  <SELECT name="tahun_angkatan" class="form-control input-sm" >
  <option>2013</option>
   <option>2014</option>
   <option>2015</option>
   <option>2016</option>
   <option>2017</option>
   <option>2018</option>
   <option>2019</option>
   <option>2020</option></SELECT>  
  </div>
         </div>
 <div class="form-group">
                    <div class="col-lg-3">
                      <button type="reset" class="btn btn-default">Cancel</button>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
        </fieldset>
              </form>
 
</body>
</html>