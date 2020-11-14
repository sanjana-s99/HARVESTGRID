<?php
include("../includes/db.php");
include("../includes/charts.php");
session_start(); //starting session
if (!isset($_SESSION["username"])) {
  header("Location: ../pages/signin.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>HarvestGrid Staff-Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">



</head>

<body>
  <main>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
      <div class="container d-flex align-items-center">

        <div class="logo mr-auto">
          <h1 class="text-light"><a href="../index.php"><span>HarvestGrid</span></a></h1>
        </div>

        <nav class="nav-menu d-none d-lg-block">
          <ul>
            <li><a href="#collect">To Be Collected</a></li>
            <li><a href="#crop">Crop Requests</a></li>
            <li><a href="#quality">Product Quality</a></li>
            <?php if ($_SESSION['user_role'] == "A") { ?>
              <li><a href="#staff">Staff Member</a></li>
            <?php } ?>
            <li><a href="#farmer">Farmer</a></li>
            <li><a href="#stats">Statistics</a></li>
            <?php if (isset($_SESSION['username'])) { ?>
              <li><a><?php echo "Hi, " . $_SESSION['username']; ?></a></li>
              <li class="get-started"><a href="../includes/signout.php">Sign Out</a></li>
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
            <h2>Staff Dashboard</h2>
            <ol>
              <li><a href="../index.php">Home</a></li>
              <li>Staff Dashboard</li>
            </ol>
          </div>

        </div>
      </section><!-- End Breadcrumbs Section -->

      <?php
      if ($_SESSION['user_role'] != "F") {
      $query = "SELECT *  FROM users WHERE user_role = 'S' OR user_role = 'k'";
      $result = mysqli_query($con, $query);
      $query1 = "SELECT *  FROM users WHERE user_role = 'F'";
      $result1 = mysqli_query($con, $query1);
      $query2 = "SELECT farmerrqst.weight, farmerrqst.date, farmerrqst.rqst_id, farmerrqst.status, users.user_name, users.user_crop, users.user_city FROM farmerrqst JOIN users ON farmerrqst.user_id = users.user_id";
      $result2 = mysqli_query($con, $query2);
      if (!$result || !$result1) {
        die("FAILD!!" . mysqli_error($con));
      }
      ?>

      <!-- ======= collect Section ======= -->
      <section id="collect" class="features">
        <div class="container">
          <div class="section-title">
            <h2>To Be Collected</h2>
          </div>
          <div id="map" style="width:100%;height:600px;"></div>
        </div>
      </section><!-- End collect Section -->

      <!-- ======= crop rqst Section ======= -->
      <section id="crop" class="features">
        <div class="container">
          <div class="section-title">
            <h2>Crop Requests</h2>
          </div>
          <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Request Id</th>
                <th>Name</th>
                <th>Crop Type</th>
                <th>Location</th>
                <th>Weight</th>
                <th>Date</th>
                <th>Status</th>
                <th width="10%">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($row2 = mysqli_fetch_assoc($result2)) {
                $w0 = $row2['rqst_id'];
                $w1 = $row2['user_name'];
                $w2 = $row2['user_crop'];
                $w3 = $row2['weight'];
                $w4 = $row2['date'];
                $w5 = $row2['status'];
                $w6 = $row2['user_city'];

                if ($w5 == "A")
                  $w5 = "<span class='badge badge-success'> </span> Approved";
                elseif ($w5 == "N")
                  $w5 = "<span class='badge badge-warning'> </span> New Request";
                elseif ($w5 == "C")
                  $w5 = "<span class='badge badge-primary'> </span> Collected";
                elseif ($w5 == "R")
                  $w5 = "<span class='badge badge-danger'> </span> Rejected";

                echo "<tr>";
                echo "<td>{$w0}</td>";
                echo "<td>{$w1}</td>";
                echo "<td>{$w2}</td>";
                echo "<td>{$w6}</td>";
                echo "<td>{$w3} KG</td>";
                echo "<td>{$w4}</td>";
                echo "<td>{$w5}</td>";
                echo "<td><a class='btn btn-outline-info btn-sm' href='farmer/farmer.php?rqst_id=$w0'>More Informations</a></td>";
                echo "</tr>";
              }

              ?>

            </tbody>
          </table>
        </div>
      </section><!-- End crop rqst Section -->

      <!-- ======= quality Section ======= -->
      <section id="quality" class="features">
        <div class="container">
          <div class="section-title">
            <h2>Product Quality</h2>
          </div>
        </div>
      </section><!-- End quality Section -->

      <?php if ($_SESSION['user_role'] == "A") { ?>

        <!-- ======= Staff Section ======= -->
        <section id="staff" class="features">
          <div class="container">
            <div class="section-title">
              <h2>Staff Memebers</h2>
            </div>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>NIC</th>
                  <th>Email</th>
                  <th>Contact Number</th>
                  <th>Gender</th>
                  <th>Age</th>
                  <th>Account Type</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                  $u0 = $row['user_name'];
                  $u1 = $row['user_nic'];
                  $u2 = $row['user_email'];
                  $u3 = $row['user_tp'];
                  $u4 = $row['user_gender'];
                  $u5 = $row['user_age'];
                  $u6 = $row['user_id'];
                  $u7 = $row['user_role'];
                  echo "<tr>";
                  echo "<td>{$u0}</td>";
                  echo "<td>{$u1}</td>";
                  echo "<td>{$u2}</td>";
                  echo "<td>{$u3}</td>";
                  if ($u4 == "M")
                    echo "<td >Male</td>";
                  elseif ($u4 == "F")
                    echo "<td>Female</td>";
                  echo "<td>{$u5}</td>";
                  if ($u7 == "S")
                    echo "<td >DoA Staff</td>";
                  elseif ($u7 == "K")
                    echo "<td>Keels Staff</td>";
                  echo "<td><a onclick='clicked1();' class='btn btn-outline-danger btn-sm' id='staffval' name='$u6'>Remove</a></td>";
                  echo "</tr>";
                }

                ?>
              </tbody>
            </table>
          </div>
        </section><!-- End Staff Section -->

      <?php } ?>

      <!-- ======= Farmer Section ======= -->
      <section id="farmer" class="features">
        <div class="container">
          <div class="section-title">
            <h2>Farmers</h2>
          </div>
          <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Name</th>
                <th>NIC</th>
                <th>Contact Number</th>
                <th>city</th>
                <th width="18%">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($row1 = mysqli_fetch_assoc($result1)) {
                $v0 = $row1['user_name'];
                $v1 = $row1['user_nic'];
                $v3 = $row1['user_tp'];
                $v6 = $row1['user_id'];
                $v7 = $row1['status'];
                $v8 = $row1['user_city'];
                echo "<tr>";
                echo "<td>{$v0}</td>";
                echo "<td>{$v1}</td>";
                echo "<td>{$v3}</td>";
                echo "<td>{$v8}</td>";
                if ($v7 == "N")
                  echo "<td><a onclick='clicked2();' class='btn btn-outline-success btn-sm' id='farmerval1' name='$v6'>Approve</a> <a href='farmer/farmerprofile.php?user_id=$v6' class='btn btn-outline-primary btn-sm'>View Profile</a></td>";
                else
                  echo "<td><a onclick='clicked();' class='btn btn-outline-danger btn-sm' id='farmerval' name='$v6'>Remove</a> <a href='farmer/farmerprofile.php?user_id=$v6' class='btn btn-outline-primary btn-sm'>View Profile</a></td>";
                echo "</tr>";
              }

              ?>
            </tbody>
          </table><br><br>
          <?php if($_SESSION['user_role']=="S" || $_SESSION['user_role']=="A"){ ?>
            <table width="100%">
              <tr>
                <td>
                  <div id="chartContainer5" style="height: 370px;"></div>
                </td>
              </tr>
            </table>
          <?php } ?>
        </div>
      </section><!-- End Farmer Section -->

      <!-- ======= stats Section ======= -->
      <section id="stats" class="features">
        <div class="container">
          <div class="section-title">
            <h2>Statistics</h2>
          </div>
          <table width="100%">
            <tr>
              <td>
                <div id="chartContainer1" style="height: 370px;"></div>
              </td>
              <td width="5%"> </td>
              <td>
                <div id="chartContainer2" style="height: 370px;"></div>
              </td>
            </tr>
          </table>
          <br><br>
          <table width="100%">
            <tr>
              <td>
                <div id="chartContainer3" style="height: 370px;"></div>
              </td>
              <td width="5%"> </td>
              <td>
                <div id="chartContainer4" style="height: 370px;"></div>
              </td>
            </tr>
          </table>
        </div>
      </section><!-- End stats Section -->

    </main><!-- End #main -->

    <?php
    } else { ?>
        <div class="container">
            <br><br><br>
            <img class="mx-auto d-block" src="../images/passinstructionsent.svg" style="max-width:400px;width:100%;">
            <h2 class="text-center mt-3">Accedd Denied!</h2>
            <h5 class="text-center mt-3">You will be redirected in <span id="counter"> 5 </span> second(s).</h5>
            <script>
                function countdown() {
                    var i = document.getElementById('counter');
                    if (parseInt(i.innerHTML) <= 0) {
                        location.href = '../index.php';
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
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>


    <!--  Main JS File -->
    <script src="../assets/js/main.js"></script>


    <!-- Bootstrap core JavaScript-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script>
      function clicked() {
        var value1 = document.getElementById("farmerval").name;
        Swal.fire({
          title: 'are your sure??',
          text: 'do you want to remove this farmer',
          imageUrl: '../images/invalid.svg',
          imageHeight: 250,
          imageAlt: 'delete rqst',
          showCancelButton: true,
          confirmButtonColor: '#ff5454',
          cancelButtonColor: '#ff5454',
          confirmButtonText: 'Delete',
          cancelButtonText: 'Cancel'
        }).then((result) => {
          if (result.value) {
            window.location.href = "../includes/action.php?delete=" + value1;
          }
        })
      }

      function clicked1() {
        var value1 = document.getElementById("staffval").name;
        Swal.fire({
          title: 'are your sure??',
          text: 'do you want to remove this staff member',
          imageUrl: '../images/invalid.svg',
          imageHeight: 250,
          imageAlt: 'delete rqst',
          showCancelButton: true,
          confirmButtonColor: '#ff5454',
          cancelButtonColor: '#ff5454',
          confirmButtonText: 'Delete',
          cancelButtonText: 'Cancel'
        }).then((result) => {
          if (result.value) {
            window.location.href = "../includes/action.php?delete=" + value1;
          }
        })
      }

      function clicked2() {
        var value1 = document.getElementById("farmerval1").name;
        Swal.fire({
          title: 'are your sure??',
          text: 'do you want approve this farmer',
          imageUrl: '../images/confirmed.svg',
          imageHeight: 250,
          imageAlt: 'delete rqst',
          showCancelButton: true,
          confirmButtonColor: '#ff5454',
          cancelButtonColor: '#ff5454',
          confirmButtonText: 'Approve',
          cancelButtonText: 'Cancel'
        }).then((result) => {
          if (result.value) {
            window.location.href = "../includes/action.php?approve=" + value1;
          }
        })
      }

      $(document).ready(function() {
        $('#dataTable').DataTable();
      });

      $(document).ready(function() {
        $('#dataTable1').DataTable();
      });

      $(document).ready(function() {
        $('#dataTable2').DataTable();
      });

      window.onload = function() {

        var chart1 = new CanvasJS.Chart("chartContainer1", {
          animationEnabled: true,
          exportEnabled: true,
          theme: "light2", // "light1", "light2", "dark1", "dark2"
          title: {
            text: "Approved Harvest"
          },
          data: [{
            type: "pie", //change type to bar, line, area, pie, etc  
            indexLabelFontSize: 16,
            indexLabel: "{label} - #percent%",
            yValueFormatString: "#,##0KG",
            dataPoints: <?php echo json_encode($approved, JSON_NUMERIC_CHECK); ?>
          }]
        });

        var chart2 = new CanvasJS.Chart("chartContainer2", {
          animationEnabled: true,
          exportEnabled: true,
          theme: "light2", // "light1", "light2", "dark1", "dark2"
          title: {
            text: "New Harvest Requests"
          },
          data: [{
            type: "pie", //change type to bar, line, area, pie, etc  
            indexLabelFontSize: 16,
            indexLabel: "{label} - #percent%",
            yValueFormatString: "#,##0KG",
            dataPoints: <?php echo json_encode($tobeapproved, JSON_NUMERIC_CHECK); ?>
          }]
        });

        var chart3 = new CanvasJS.Chart("chartContainer3", {
          animationEnabled: true,
          exportEnabled: true,
          theme: "light2", // "light1", "light2", "dark1", "dark2"
          title: {
            text: "Collected Harvest"
          },
          data: [{
            type: "pie", //change type to bar, line, area, pie, etc  
            indexLabelFontSize: 16,
            indexLabel: "{label} - #percent%",
            yValueFormatString: "#,##0KG",
            dataPoints: <?php echo json_encode($collected, JSON_NUMERIC_CHECK); ?>
          }]
        });

        var chart4 = new CanvasJS.Chart("chartContainer4", {
          animationEnabled: true,
          exportEnabled: true,
          theme: "light2", // "light1", "light2", "dark1", "dark2"
          title: {
            text: "Rejected Harvest"
          },
          data: [{
            type: "pie", //change type to bar, line, area, pie, etc  
            indexLabelFontSize: 16,
            indexLabel: "{label} - #percent%",
            yValueFormatString: "#,##0KG",
            dataPoints: <?php echo json_encode($rejected, JSON_NUMERIC_CHECK); ?>
          }]
        });

        var chart5 = new CanvasJS.Chart("chartContainer5", {
          animationEnabled: true,
          exportEnabled: true,
          theme: "light2", // "light1", "light2", "dark1", "dark2"
          title: {
            text: "Farmer's Locations"
          },
          data: [{
            type: "column", //change type to bar, line, area, pie, etc  
            yValueFormatString: "#,##0",
            dataPoints: <?php echo json_encode($farmers_city, JSON_NUMERIC_CHECK); ?>
          }]
        });

        chart1.render();
        chart2.render();
        chart3.render();
        chart4.render();
        chart5.render();

      }
    </script>
    <script>
      //Google Map Script

      var customLabel = {
        Rice: {
          label: 'R'
        },
        Tea: {
          label: 'T'
        },
        Coconut: {
          label: 'C'
        },
        Spices: {
          label: 'S'
        },
        Fruits_and_Vegetable: {
          label: 'F&V'
        },
        Other: {
          label: 'O'
        }
      };

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(7.927079, 79.861244),
          zoom: 7.7
        });
        var infoWindow = new google.maps.InfoWindow;

        // Change this depending on the name of your PHP or XML file
        downloadUrl('../includes/map/mapdata2.php', function(data) {
          var xml = data.responseXML;
          var markers = xml.documentElement.getElementsByTagName('marker');
          Array.prototype.forEach.call(markers, function(markerElem) {
            var linkid = markerElem.getAttribute('id');
            var id = "Request Id : " + markerElem.getAttribute('id');
            var type1 = markerElem.getAttribute('crop');
            var type = "Content : " + markerElem.getAttribute('crop') + "[" + markerElem.getAttribute('weight') + "KG]";
            var name = "Farmer : " + markerElem.getAttribute('name');
            var image = markerElem.getAttribute('image');
            var date = "Harvested Date : " + markerElem.getAttribute('date');
            var point = new google.maps.LatLng(
              parseFloat(markerElem.getAttribute('lat')),
              parseFloat(markerElem.getAttribute('lng')));

            var infowincontent = document.createElement('div');
            var strong = document.createElement('h3');
            strong.textContent = id
            infowincontent.appendChild(strong);
            var typee = document.createElement('p');
            typee.textContent = type
            infowincontent.appendChild(typee);
            var text = document.createElement('p');
            text.textContent = name
            infowincontent.appendChild(text);
            var text1 = document.createElement('p');
            text1.textContent = date
            infowincontent.appendChild(text1);
            var link = document.createElement('a');
            var click = document.createElement('button');
            link.setAttribute('href', "farmer/farmer.php?rqst_id=" + linkid);
            click.textContent = "View More"
            click.setAttribute("class", "btn btn-outline-primary btn-sm");
            link.appendChild(click);
            infowincontent.appendChild(link);
            infowincontent.appendChild(document.createElement('br'));
            infowincontent.appendChild(document.createElement('br'));

            var img = document.createElement("IMG");
            img.setAttribute("src", "../uploads/" + image);
            img.setAttribute("width", "200");
            img.setAttribute("height", "150");
            infowincontent.appendChild(img);
            var icon = customLabel[type1] || {};
            var marker = new google.maps.Marker({
              map: map,
              position: point,
              label: icon.label
            });
            marker.addListener('click', function() {
              infoWindow.setContent(infowincontent);
              infoWindow.open(map, marker);
            });
          });
        });
      }

      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
          new ActiveXObject('Microsoft.XMLHTTP') :
          new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6XkaPZ0poj76FV4fvv39OPnVHeFKV8C0&callback=initMap">
    </script>




</html>