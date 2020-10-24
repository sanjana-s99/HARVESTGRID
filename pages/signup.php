<?php
    include "../includes/signup.php";
    session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!--weuse-styles-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
    <style type="text/css"> #map {width: 50%; height: 480px;} </style>
    <title>weuse signup</title>
</head>

<body>

    <div class="container">
        <!--weuse-signup-->
        <br><br>
        <form action="" class="needs-validation" method="post" novalidate>
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter Name" name="user_name" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
        </div>

        <div class="form-group">
            <label for="nic">NIC Number : </label>
            <input type="text" class="form-control" id="nic" placeholder="Enter NIC Number" name="user_nic" pattern=".{10,12}" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please enter valid NIC number.</div>
        </div>

        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter Email" id="user_email" name="user_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please enter valid email address.</div>
        </div>

        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter Password" name="user_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  required>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters.</div>
        </div>

        <div class="form-group">
            <label for="sel1">Product Type :</label>
            <select class="form-control" id="sel1" name="crop" placeholder="Select Your Product" require>
                <option value="Rice">Rice</option>
                <option value="Tea">Tea</option>
                <option value="Coconur">Coconut</option>
                <option value="Spices">Spices</option>
                <option value="Fruits_and_begetable">Fruits and Vegetable</option>
                <option value="Other">Other</option>
            </select>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Select A Product.</div>
        </div>

        <div class="form-group">
            <label for="sel1">Mark Your Location :</label>
            <div id="map"></div>
            <input type="hidden" name="lat" id="lat">
            <input type="hidden" name="lng" id="lng">
        </div>

        <div class="form-group form-check">
            <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="remember" required> I agree on this fucking conditions.
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Check this checkbox to continue.</div>
            </label>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        </form>        
    <?php show(); ?>
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