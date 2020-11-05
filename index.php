<?php 
    session_start();
    include ("includes/cropcounts.php");
    include ("includes/db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Harvestgrid</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!--  Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">


  <!-- Map -->
    <style>
        /* Always set the map height explicitly to define the size of the div
        * element that contains the map. */
        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            `margin: 0;
            padding: 0;
        }
    </style>
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
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Grow your business with HarvestGrid</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">We are team of talanted designers making websites with Bootstrap</h2>
          <div data-aos="fade-up" data-aos-delay="800">
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
            <div id="map" class="img-fluid"></div>
        </div>
      </div>
    </div>

  </section><!-- End Hero -->
  <!-- ======= Counts Section ======= -->
  <section id="counts" class="counts">
    <div class="container align-items-center">

        <div class="col-xl-12 d-flex align-items-stretch pt- pt-xl-0 center" data-aos="fade-left" data-aos-delay="300">
          <div class="content d-flex flex-column justify-content-center">
            <div class="row">

              <div class="col-md-2 d-md-flex align-items-md-stretch">
                <div class="count-box">
                  <i class="icofont-simple-smile"></i>
                  <span data-toggle="counter-up"><?php echo $rice; ?></span>
                  <p><strong>Rice</strong> consequuntur voluptas nostrum aliquid ipsam architecto ut</p>
                </div>
              </div>

              <div class="col-md-2 d-md-flex align-items-md-stretch">
                <div class="count-box">
                  <i class="icofont-simple-smile"></i>
                  <span data-toggle="counter-up"><?php echo $tea; ?></span>
                  <p><strong>Tea</strong> consequuntur voluptas nostrum aliquid ipsam architecto ut</p>
                </div>
              </div>

              <div class="col-md-2 d-md-flex align-items-md-stretch">
                <div class="count-box">
                  <i class="icofont-simple-smile"></i>
                  <span data-toggle="counter-up"><?php echo $coconut; ?></span>
                  <p><strong>Coconut</strong> consequuntur voluptas nostrum aliquid ipsam architecto ut</p>
                </div>
              </div>

              <div class="col-md-2 d-md-flex align-items-md-stretch">
                <div class="count-box">
                  <i class="icofont-simple-smile"></i>
                  <span data-toggle="counter-up"><?php echo $spices; ?></span>
                  <p><strong>Spices</strong> consequuntur voluptas nostrum aliquid ipsam architecto ut</p>
                </div>
              </div>

              <div class="col-md-2 d-md-flex align-items-md-stretch">
                <div class="count-box">
                  <i class="icofont-simple-smile"></i>
                  <span data-toggle="counter-up"><?php echo $vnf; ?></span>
                  <p><strong>Fruits & Vegetable</strong> consequuntur voluptas nostrum aliquid ipsam architecto ut</p>
                </div>
              </div>

              <div class="col-md-2 d-md-flex align-items-md-stretch">
                <div class="count-box">
                  <i class="icofont-simple-smile"></i>
                  <span data-toggle="counter-up"><?php echo $other; ?></span>
                  <p><strong>Other</strong> consequuntur voluptas nostrum aliquid ipsam architecto ut</p>
                </div>
              </div>

            </div>
          </div><!-- End .content-->
        </div>
      </div>
  </section><!-- End Counts Section -->
  
    <?php
      if(isset($_SESSION['user_role'])){
        if($_SESSION['user_role']=="S" || $_SESSION['user_role']=="A"){

          $query = "SELECT * FROM users WHERE user_role = 'F'";
          $result = mysqli_query($con, $query);
          if(!$result){
            die("FAILD!!".mysqli_error());
          }
    ?>
          <!-- ======= Farmers Section ======= -->
          <section id="farmers" class="features">
            <div class="container">
              <div class="section-title" data-aos="fade-up">
                <h2>Farmer Details</h2>
              </div>
              <div data-aos="fade-up" data-aos-delay="300">
                <table class="table table-bordered" id="farmertable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>Name</th>
                          <th>Crop Type</th>
                          <th>Weight</th>
                          <th>Status</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php
                    while($row = mysqli_fetch_assoc($result)){
                        $u0 = $row['user_id'];
                        $u1 = $row['user_name'];
                        $u2 = $row['user_crop'];
                        $u3 = "N/A";
                        $u4 = "N/A";
                        echo "<tr>";
                            echo "<td>{$u1}</td>";
                            echo "<td>{$u2}</td>";
                            echo "<td>{$u3}</td>";
                            echo "<td>{$u4}</td>";
                            echo "<td><a class='btn btn-info btn-sm' href='pages/farmer.php?farmer_id=$u0'>More Info</a></td>";
                        echo "</tr>";
                    }
                    
                    ?>

                  </tbody>
                </table>
              </div>
            </div>
          </section><!-- End Farmer Section -->
    <?php } }?>

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>About Us</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="150">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
              <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
              <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
              culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <a href="#" class="btn-learn-more">Learn More</a>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Services</h2>
          <p>Magnam dolores commodi suscipit eius consequatur ex aliquid fug</p>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4 class="title"><a href="">Lorem Ipsum</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
              <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title"><a href="">Magni Dolores</a></h4>
              <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4 class="title"><a href="">Nemo Enim</a></h4>
              <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Contact Us</h2>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="contact-about">
              <h3>HarvestGrid</h3>
              <p>Cras fermentum odio eu feugiat. Justo eget magna fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
              <div class="social-links">
                <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
                <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
            <div class="info">
              <div>
                <i class="ri-map-pin-line"></i>
                <p>123, Tech city.<br>Colombo, Sri Lanka.</p>
              </div>

              <div>
                <i class="ri-mail-send-line"></i>
                <p>info@harvestgrid.com</p>
              </div>

              <div>
                <i class="ri-phone-line"></i>
                <p>011 2123123</p>
              </div>

            </div>
          </div>

          <div class="col-lg-5 col-md-12" data-aos="fade-up" data-aos-delay="300">
            <form action="includes/contact.php" method="post" role="form" class="php-email-form">
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

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
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!--  Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- Bootstrap core JavaScript-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

 <!--Google Map Script -->

 <script>
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
        center: new google.maps.LatLng( 7.927079, 79.861244),
        zoom: 7
    });
    var infoWindow = new google.maps.InfoWindow;

        // Change this depending on the name of your PHP or XML file
        downloadUrl('includes/mapdata.php', function(data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName('marker');
        Array.prototype.forEach.call(markers, function(markerElem) {
        var id = markerElem.getAttribute('id');
        var name = markerElem.getAttribute('name');
        var address = markerElem.getAttribute('address');
        var type = markerElem.getAttribute('type');
        var point = new google.maps.LatLng(
            parseFloat(markerElem.getAttribute('lat')),
            parseFloat(markerElem.getAttribute('lng')));

        var infowincontent = document.createElement('div');
        var strong = document.createElement('strong');
        strong.textContent = name
        infowincontent.appendChild(strong);
        infowincontent.appendChild(document.createElement('br'));
        var text = document.createElement('text');
        text.textContent = address
        infowincontent.appendChild(text);
        var icon = customLabel[type] || {};
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
    <script defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6XkaPZ0poj76FV4fvv39OPnVHeFKV8C0&callback=initMap">
    </script>

    <script>
        $(document).ready(function() {
              $('#farmertable').DataTable();
        });
    </script>


</body>

</html>