<?php
include("../../includes/db.php");
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: ../signin.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Harvestgrid Farmer-Profile</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">

  <style>
    .profile-head {
      transform: translateY(5rem)
    }

    .cover {
      background-image: url(https://images.unsplash.com/photo-1530305408560-82d13781b33a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1352&q=80);
      background-size: cover;
      background-repeat: no-repeat
    }
  </style>

</head>

<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="../../index.php"><span>HarvestGrid</span></a></h1>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="../../index.php">Home</a></li>
          <li><a href="../admindashboard.php">Dashboard</a></li>
          <li><a><?php echo "Hi, " . $_SESSION['username']; ?></a></li>
          <li class="get-started"><a href="../../includes/signout.php">Sign Out</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Farmer Profile</h2>
          <ol>
            <li><a href="../../index.php">Home</a></li>
            <li>Farmer Profile</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <?php
    if ($_SESSION['user_role'] != "F") {
      if (isset($_GET["user_id"])) {
        $user_id = $_GET['user_id'];
        $query = "SELECT *  FROM users WHERE user_id = $user_id";
        $result = mysqli_query($con, $query);
        $query1 = "SELECT COUNT(rqst_id) FROM farmerrqst WHERE user_id = $user_id AND status = 'N'";
        $result1 = mysqli_query($con, $query1);
        $query2 = "SELECT COUNT(rqst_id) FROM farmerrqst WHERE user_id = $user_id AND status = 'A'";
        $result2 = mysqli_query($con, $query2);
        $query3 = "SELECT COUNT(rqst_id) FROM farmerrqst WHERE user_id = $user_id AND status = 'C'";
        $result3 = mysqli_query($con, $query3);
        $query4 = "SELECT COUNT(rqst_id) FROM farmerrqst WHERE user_id = $user_id AND status = 'R'";
        $result4 = mysqli_query($con, $query4);
        if (!$result || !$result1 || !$result2 || !$result3 || !$result4) {
          die("FAILD!!" . mysqli_error($con));
        }

        while ($row1 = mysqli_fetch_assoc($result1)) {
          $new = $row1['COUNT(rqst_id)'];
        }

        while ($row2 = mysqli_fetch_assoc($result2)) {
          $approved = $row2['COUNT(rqst_id)'];
        }

        while ($row3 = mysqli_fetch_assoc($result3)) {
          $collected = $row3['COUNT(rqst_id)'];
        }

        while ($row4 = mysqli_fetch_assoc($result4)) {
          $rejected = $row4['COUNT(rqst_id)'];
        }

        while ($row = mysqli_fetch_assoc($result)) {
          $name = $row['user_name'];
          $nic = $row['user_nic'];
          $email = $row['user_email'];
          $tp = $row['user_tp'];
          $gender = $row['user_gender'];
          $age = $row['user_age'];
          $img = $row['user_img'];
          if ($gender == "M")
            $gender = "Male";
          elseif ($gender == "F")
            $gender = "Female";
          $crop = $row['user_crop'];
          $rating = $row['user_rating'];
          $v6 = $row['user_lat'];
          $v7 = $row['user_lng'];

          //get address using lat,lng
          $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=" . $v6 . ',' . $v7 . "&key=AIzaSyC5YjkAepzUoPgY5mmhMdPkOXx4cXY4cbs&sensor=false";

          $json = @file_get_contents($url);
          $data = json_decode($json);
          $status = $data->status;
          if ($status == "OK") {
            $address =  $data->results[0]->formatted_address;
          } else {
            $address = "N/A";
          }
        }
    ?>

        <!-- ======= profile Section ======= -->
        <section id="profile" class="features">
          <div class="container">
            <div class="section-title">
              <h2>Farmer Profile</h2>
            </div>
            <!-- Profile widget -->
            <div class="bg-white shadow rounded overflow-hidden">
              <div class="px-4 pt-0 pb-4 cover">
                <div class="media align-items-end profile-head">
                  <div class="profile mr-3"><img src="../../uploads/propic/<?php echo $img; ?>" alt="NoProPic" width="130" class="rounded mb-2 img-thumbnail"></div>
                  <div class="media-body mb-5 text-white">
                    <div class="float-left">
                      <h4 class="mt-0 mb-0"> <?php echo $name; ?></h4>
                      <p class="small mb-4"><i class="icofont-basket"></i> <?php echo "Crop Type : " . $crop; ?></p>
                    </div>
                    <div class="float-right p-4 d-flex justify-content-end text-center">
                      <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                          <h5 class="font-weight-bold mb-0 d-block"><?php echo $rating; ?>/10<i class="icofont-star"></i></h5><small class="text-muted">Quality Rating</small>
                        </li>
                        <li class="list-inline-item">
                          <h5 class="font-weight-bold mb-0 d-block"><?php echo $new; ?></h5><small class="text-muted">New</small>
                        </li>
                        <li class="list-inline-item">
                          <h5 class="font-weight-bold mb-0 d-block"><?php echo $approved; ?></h5><small class="text-muted">Approved</small>
                        </li>
                        <li class="list-inline-item">
                          <h5 class="font-weight-bold mb-0 d-block"><?php echo $collected; ?></h5><small class="text-muted">Collected</small>
                        </li>
                        <li class="list-inline-item">
                          <h5 class="font-weight-bold mb-0 d-block"><?php echo $rejected; ?></h5><small class="text-muted">Rejected</small>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="px-4 py-3">
                <h5 class="mb-0">About</h5>
                <div class="p-4 rounded shadow-sm bg-light row">
                  <div class="col">
                    <p class="font-italic mb-0"><strong>Address : </strong> <?php echo $address; ?></p>
                    <p class="font-italic mb-0"><strong>Age : </strong> <?php echo $age; ?></p>
                    <p class="font-italic mb-0"><strong>Gender : </strong> <?php echo $gender; ?></p>
                    <p class="font-italic mb-0"><strong>NIC No : </strong> <?php echo $nic; ?></p>
                    <p class="font-italic mb-0"><strong>Email : </strong> <?php echo $email; ?></p>
                    <p class="font-italic mb-0"><strong>Contact No : </strong> <?php echo $tp; ?></p>
                  </div>
                  <div id="map" style="width:50%;height:200px;" class="col"></div>
                </div>
              </div>
            </div>
        </section><!-- End Profile Section -->

        <?php
        $query = "SELECT *  FROM farmerrqst WHERE user_id = $user_id";
        $result = mysqli_query($con, $query);
        if (!$result) {
          die("FAILD!!" . mysqli_error($con));
        }
        ?>
        <!-- ======= stats Section ======= -->
        <section id="stats" class="features">
          <div class="container">
            <div class="section-title">
              <h2>Statistics</h2>
            </div>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th width="10%">Request Id</th>
                  <th>Weight</th>
                  <th>Harvested Date</th>
                  <th>Requested Date</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
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
                  if ($u4 == "A") {
                    echo "<td ><span class='badge badge-success'> </span> Approved</td>";
                  } elseif ($u4 == "N") {
                    echo "<td ><span class='badge badge-warning'> </span> New Request</td>";
                  } elseif ($u4 == "R") {
                    echo "<td ><span class='badge badge-danger'> </span> Rejected</td>";
                  } elseif ($u4 == "C") {
                    echo "<td ><span class='badge badge-primary'> </span> Collected</td>";
                  }
                  echo "</tr>";
                }

                ?>
              </tbody>
            </table>
          </div>
        </section><!-- End stats Section -->
      <?php } ?>

  </main><!-- End #main -->

<?php
    } else { ?>
  <div class="container">
    <br><br><br>
    <img class="mx-auto d-block" src="../../images/passinstructionsent.svg" style="max-width:400px;width:100%;">
    <h2 class="text-center mt-3">Accedd Denied!</h2>
    <h5 class="text-center mt-3">You will be redirected in <span id="counter"> 5 </span> second(s).</h5>
    <script>
      function countdown() {
        var i = document.getElementById('counter');
        if (parseInt(i.innerHTML) <= 0) {
          location.href = '../../index.php';
        }
        if (parseInt(i.innerHTML) != 0) {
          i.innerHTML = parseInt(i.innerHTML) - 1;
        }
      }
      setInterval(function() {
        countdown();
      }, 1000);
    </script>
  </div>
  <br><br><br>
<?php } ?>

<!-- ======= Footer ======= -->
<footer id="footer">
  <div class="container">
    <div class="row d-flex align-items-center">
      <div class="col-lg-6 text-lg-left text-center">
        <div class="copyright">
          Made with <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" style="width:16px;overflow:visible">
            <path class="breathing" d="M24.85 10.126c2.018-4.783 6.628-8.125 11.99-8.125 7.223 0 12.425 6.179 13.079 13.543 0 0 .353 1.828-.424 5.119-1.058 4.482-3.545 8.464-6.898 11.503L24.85 48 7.402 32.165c-3.353-3.038-5.84-7.021-6.898-11.503-.777-3.291-.424-5.119-.424-5.119C.734 8.179 5.936 2 13.159 2c5.363 0 9.673 3.343 11.691 8.126z" fill="#d75a4a"></path>
          </svg> in <strong>Sri Lanka</strong>.
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
  });

  function initMap() {
    const myLatLng = {
      lat: <?php echo $v6; ?>,
      lng: <?php echo $v7; ?>
    };
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 15,
      center: myLatLng,
    });
    new google.maps.Marker({
      position: myLatLng,
      map,
      icon: '../../images/icon.png'
    });
  }
</script>
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6XkaPZ0poj76FV4fvv39OPnVHeFKV8C0&callback=initMap&libraries=&v=weekly" defer></script>

</html>