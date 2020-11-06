<?php
    include "../includes/signup.php";
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

    <!-- Main css -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script>
        // Disable form submissions if there are invalid fields
        (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Get the forms we want to add validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
            });
        }, false);
        })();
    </script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD6XkaPZ0poj76FV4fvv39OPnVHeFKV8C0"></script>
    <script src="https://unpkg.com/location-picker/dist/location-picker.min.js"></script>
    <style type="text/css"> #map {width: 100%; height: 350px;} </style>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: aliceblue
        }

        .wrapper {
            padding: 30px 50px;
            border: 1px solid #ddd;
            border-radius: 15px;
            margin: 10px auto;
            max-width: 600px
        }

        label {
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 500;
            color: #777;
            padding-left: 3px
        }

        .form-control {
            border-radius: 10px
        }


        .form-control:focus {
            box-shadow: none;
            border: 1.5px solid #0779e4
        }

        select {
            display: block;
            width: 100%;
            border: 1px solid #ddd;
            border-radius: 10px;
            height: 40px;
            padding: 5px 10px
        }

        select:focus {
            outline: none
        }

        .button {
            background-color: #fff;
            color: #0779e4
        }

        .button:hover {
            background-color: #0779e4;
            color: #fff
        }
    </style>
</head>

<body>
<!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="index.html"><span>HarvestGrid</span></a></h1>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
            <li><a href="../index.php">Home</a></li>
            <li class="active"><a href="pages/signup.php">Register</a></li>
            <li class="get-started"><a href="signin.php">Sign In</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->
<div class="wrapper bg-white mt-sm-5">
    <h4 class="pb-4 border-bottom">HarvestGrid Sign-Up</h4>
    <form action="" class="needs-validation" method="post" novalidate>
        <div class="py-2">
            <div class="row py-2">
                <div class="col-md-6 form-group">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter Name" name="user_name" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
                <div class="col-md-6 pt-md-0 pt-3 form-group">
                    <label for="nic">NIC Number : </label>
                    <input type="text" class="form-control" id="nic" placeholder="Enter NIC Number" name="user_nic" pattern=".{10,12}" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please enter valid NIC number.</div>
                </div>
            </div>
            <div class="row py-2">
                <div class="col-md-6 form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter Email" name="user_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please enter valid email address.</div>
                </div>
                <div class="col-md-6 pt-md-0 pt-3 form-group">
                    <label for="tp">Contact Number:</label>
                    <input type="text" class="form-control" id="tp" placeholder="Enter Contact Number" name="user_tp" pattern=".{10}" required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please enter valid phone number.</div>
                </div>
            </div>
            <div class="row py-2">
                <div class="col-md-6 form-group"> 
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter Password" name="user_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters.</div>
                </div>
                <div class="col-md-6 pt-md-0 pt-3 form-group">
                    <label for="sel1">Product Type :</label>
                    <select class="form-control" id="sel1" name="crop" placeholder="Select Your Product" require>
                        <option value="Rice">Rice</option>
                        <option value="Tea">Tea</option>
                        <option value="Coconut">Coconut</option>
                        <option value="Spices">Spices</option>
                        <option value="Fruits_and_vegetable">Fruits and Vegetable</option>
                        <option value="Other">Other</option>
                    </select>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Select A Product.</div>
                </div>
            </div>
            <div class="row form-group">
                    <label for="sel1">Mark Your Location :</label>
                    <div id="map"></div>
                    <input type="hidden" name="lat" id="lat">
                    <input type="hidden" name="lng" id="lng">
            </div>
            </div>
            <div class="py-3 pb-4 border-bottom"> <button type="submit" class="btn btn-primary mr-3">Submit</button></div>
        </div>
        <?php show(); ?>
    </form>
</div>
    <!--GMaps Script-->
    <script>
        // Get element references
        var lat = document.getElementById('lat');
        var lng = document.getElementById('lng');

        // Initialize locationPicker plugin
        var lp = new locationPicker('map', {
            setCurrentPosition: true, // You can omit this, defaults to true
        }, {
            zoom: 15 // You can set any google map options here, zoom defaults to 15
        });

        // Listen to map idle event, listening to idle event more accurate than listening to ondrag event
        google.maps.event.addListener(lp.map, 'idle', function (event) {
            // Get current location and show it in HTML
            var location = lp.getMarkerPosition();
            lat.value =  location.lat;
            lng.value =  location.lng;
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</body>
</html>