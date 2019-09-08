 	<link rel="stylesheet" type="text/css" href="asset/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="asset/css/bootstrap-datepicker3.css">
 	<link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
      <script type="text/javascript" src="asset/js/jquery.min.js"></script>
      <script src="asset/js/bootstrap.min.js"type="text/javascript"></script>
      <script src="asset/js/bootstrap-datepicker.js"></script>
      <style type="text/css">
      .panel{background: #286090};
	.text{color:#0e0f0f };
      </style>

      <script type="text/javascript">
      	$("document").ready(function(){
      		$(".home").click(function(){home();});
      		$(".reg").click(function(){reg();});
      		$(".pembayaran").click(function(){pembayaran();});
                  $(".setting").click(function(){setting();});
                  $(".detail").click(function(){detail();});
                  $(".rekap").click(function(){rekap();});


      	});

      	function home(){$(".utama").load("text.php");}
      	function reg(){$(".utama").load("register.php");}
      	function pembayaran(){$(".utama").load("inspp.php");}
        function setting(){$(".utama").load("setting.php");}
        function detail(){$(".utama").load("detail.php");}
        function rekap(){$(".utama").load("rekap.php");}

      </script>

      <style rel="stylesheet">
      .cek{display: table; float: left;height: 100%;}
      .utama{height: 100%;}
      </style>
