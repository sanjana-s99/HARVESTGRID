<?php

	include('database_connection.php');

	session_start();

	if(!isset($_SESSION['user_id']))
	{
		header("location:../pages/signin.php");
	}

?>

<html>  
    <head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>HarvestGrid</title>  
		<!--  Main CSS File -->
		 <link href="../assets/css/style.css" rel="stylesheet">

		  <!-- Vendor CSS Files -->
		<link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  		<script src="https://cdn.rawgit.com/mervick/emojionearea/master/dist/emojionearea.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
		  
    </head>  
    <body>
	
		<!-- ======= Header ======= -->
		<header id="header" class="fixed-top d-flex align-items-center">
			<div class="container d-flex align-items-center">

			<div class="logo mr-auto">
				<h1 class="text-light"><a href="../index.php"><span>HarvestGrid</span></a></h1>
			</div>

			<nav class="nav-menu d-none d-lg-block">
				<ul>
				<?php if($_SESSION['user_role']=="A" || $_SESSION['user_role']=="S"){ ?>
					<li><a href="../pages/admindashboard.php">Dashboard</a></li>
				<?php }elseif($_SESSION['user_role']=="F"){ ?>
					<li><a href="../pages/farmer/farmerdashboard.php">Dashboard</a></li>
				<?php }if(isset($_SESSION['username'])){ ?>
					<li><a><?php echo "Hi, " . $_SESSION['username']; ?></a></li>
					<li class="get-started"><a href="../includes/signout.php">Sign Out</a></li>
				<?php } ?>
				</ul>
			</nav><!-- .nav-menu -->

			</div>
		</header><!-- End Header -->

		<main id="main">
			<!-- ======= Breadcrumbs ======= -->
			<section id="breadcrumbs" class="breadcrumbs">
			<div class="container">
				<div class="d-flex justify-content-between align-items-center">
				<h2>Direct Message</h2>
				<ol>
					<li><a href="../index.php">Home</a></li>
					<li>Dirrect Message</li>
				</ol>
				</div>
			</div>
			</section><!-- End Breadcrumbs -->

			<div class="container">
			<br><br><br>
				<div class="table-responsive">				
					<div id="user_details"></div>
					<div id="user_model_details"></div>
				</div>
			<br>					
			</div>
		</main><!-- end of main -->

				<!-- ======= Footer ======= -->
		<footer id="footer">
			<div class="container">
			<div class="row d-flex align-items-center">
				<div class="col-lg-6 text-lg-left text-center">
				<div class="copyright">
				Made with <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" style="width:16px;overflow:visible"><path class="breathing" d="M24.85 10.126c2.018-4.783 6.628-8.125 11.99-8.125 7.223 0 12.425 6.179 13.079 13.543 0 0 .353 1.828-.424 5.119-1.058 4.482-3.545 8.464-6.898 11.503L24.85 48 7.402 32.165c-3.353-3.038-5.84-7.021-6.898-11.503-.777-3.291-.424-5.119-.424-5.119C.734 8.179 5.936 2 13.159 2c5.363 0 9.673 3.343 11.691 8.126z" fill="#d75a4a"></path></svg> in <strong>Sri Lanka</strong>.
				</div>
				</div>
				<div class="col-lg-6">
				<nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
					<a href="#intro" class="scrollto">Home</a>
					<a href="#about" class="scrollto">About</a>
					<a href="#">Privacy Policy</a>
					<a href="#">Terms of Use</a>
				</nav>
				</div>
			</div>
			</div>
		</footer><!-- End Footer -->
		<script src="../assets/js/chat.js"></script>
    </body>  
</html>  


