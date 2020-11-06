<?php 
    include ("../../includes/db.php");
    session_start(); //starting session
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Harvestgrid - farmer dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="index.php"><span>HarvestGrid</span></a></h1>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
            <li class="active"><a href="index.php">Home</a></li>
            <?php if(isset($_SESSION['user_role'])){
                    if($_SESSION['user_role']=="S" || $_SESSION['user_role']=="A"){ ?>
                      <li><a href="#farmers">Farmer Details</a></li>
            <?php } }?>
            <li><a href="#about">About</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="drop-down"><a href="">Drop Down</a>
            <ul>
                <li><a href="#">Drop Down 1</a></li>
                <li class="drop-down"><a href="#">Drop Down 2</a>
                <ul>
                    <li><a href="#">Deep Drop Down 1</a></li>
                    <li><a href="#">Deep Drop Down 2</a></li>
                    <li><a href="#">Deep Drop Down 3</a></li>
                    <li><a href="#">Deep Drop Down 4</a></li>
                    <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
                </li>
                <li><a href="#">Drop Down 3</a></li>
                <li><a href="#">Drop Down 4</a></li>
                <li><a href="#">Drop Down 5</a></li>
            </ul>
        </li>
        <?php     if(isset($_SESSION['username'])){ ?>
            <li><a href="chatapplication/">Chat</a></li>
            <li><a><?php echo "Hi, " . $_SESSION['username']; ?></a></li>
            <li class="get-started"><a href="includes/signout.php">Sign Out</a></li>
        <?php }else{ ?>
            <li><a href="pages/signup.php">Register</a></li>
            <li class="get-started"><a href="pages/signin.php">Sign In</a></li>
        <?php } ?>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Farmer Dashboard</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Farmer Dashboard</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <?php
          $user_id = $_SESSION['user_id'];
          $query = "SELECT *  FROM farmerrqst WHERE user_id = $user_id";
          $result = mysqli_query($con, $query);
          if(!$result){
            die("FAILD!!".mysqli_error());
          }
    ?>
    <section class="inner-page">
      <div class="container">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Request Id</th>
                    <th>Weight</th>
                    <th>Harvested Date</th>
                    <th>Requested Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php
                    while($row = mysqli_fetch_assoc($result)){
                        $u0 = $row['rqst_id'];
                        $u1 = $row['weight'];
                        $u2 = $row['date'];
                        $u3 = $row['rdate'];
                        $u4 = $row['status'];
                        echo "<tr>";
                            echo "<td>{$u0}</td>";
                            echo "<td>{$u1}</td>";
                            echo "<td>{$u2}</td>";
                            echo "<td>{$u3}</td>";
                            if($u4=="A")
                              echo "<td ><span class='badge badge-success'> </span> Approved</td>";
                            elseif ($u4=="N") 
                              echo "<td ><span class='badge badge-warning'> </span> Not Approved</td>";
                            elseif ($u4=="R") 
                              echo "<td ><span class='badge badge-danger'> </span> Rejected</td>";  
                        echo "</tr>";
                    }
                    
                    ?>
            </tbody>
        </table>
      </div>
    </section>

  </main><!-- End #main -->
  
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

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
<script src="../../assets/vendor/jquery/jquery.min.js"></script>


<!--  Main JS File -->
<script src="../../assets/js/main.js"></script>

  
  <!-- Bootstrap core JavaScript-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Page level plugin JavaScript-->
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

<script>
        $(document).ready(function() {
              $('#dataTable').DataTable();
        });
</script>




</html>