<!doctype html>
<html lang="en">
  <head>
  	<title>halaman user</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../css/style.css">
  </head>
  <body style="background-color: #94b4b9;">
  <style>
      #sidebar{
        background-color: #33757e;
      }
	  .P-4{
		background-color: #0f373d;
	  }
    </style>
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
				<div class="p-4">
		  		<h1><a href="index.php" class="logo">APLIKASI <span>ABSENSI ONLINE</span></a></h1>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <a href="home.php" target="konten"><span class="fa fa-home mr-3"></span> Home</a>
	          </li>
	          <li>
              <a href="input.php" target= "konten"><i class="bi bi-person-fill-add"></i> ABSEN</a>
	          </li>
	        
			  <li>
              <a href="data.php" target="konten"><span class="fa fa-suitcase mr-3"></span> riwayat absen</a>
	          </li>
	          <li>
              
	          <li>
              <a href="logout.php"><span class="fa fa-cogs mr-3"></span> logout</a>
	          </li>
	        </ul>

	        <div class="mb-5">
						<h3 class="h6 mb-3">Subscribe for muklis</h3>
						<form action="#" class="subscribe-form">

	          </form>
					</div>
				
         <?php
session_start();

if (!isset($_SESSION['username'])) {
    header('location:../index.php');
    exit();
} else {
    $username = $_SESSION['username'];
    $welcomeMessage = "hallo, $username!";
	echo $username;
}
?>


	      </div>
    	</nav>



        
      <div id="content" class="p-4 p-md-5 pt-5">
        <iframe src="home.php" name="konten" frameborder="0" width="100%" height="650"></iframe>
		
	
      </div>
		</div>

		
		

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>