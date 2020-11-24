<?php
include "../includes/adduser.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HarvestGrid Add-User</title>

    <link rel='shortcut icon' type='image/x-icon' href='../images/favicon.svg' />

    <!-- Main css -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="../assets/css/formstyle.css" rel="stylesheet">
</head>

<body>
    <!-- ======= Header ======= -->
    <br><br><br><br><br>
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <div class="logo mr-auto">
                <h1 class="text-light"><a href="../index.php"><span>HarvestGrid</span></a></h1>
            </div>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="admindashboard.php">Dashboard</a></li>
                    <?php if (isset($_SESSION['username'])) { ?>
                        <li><a><?php echo "Hi, " . $_SESSION['username']; ?></a></li>
                        <li class="get-started"><a href="../includes/signout.php">Sign Out</a></li>
                    <?php } ?>
                </ul>
            </nav><!-- .nav-menu -->

        </div>
    </header><!-- End Header -->
    <?php if ($_SESSION['user_role'] == "A") { ?>
        <div class="wrapper bg-white mt-sm-5">
            <h4 class="pb-4 border-bottom">HarvestGrid Add - Staff Members</h4>
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
                            <input type="email" class="form-control" id="email" placeholder="Enter Email" id="user_email" name="user_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please enter valid email address.</div>
                        </div>
                        <div class="col-md-6 pt-md-0 pt-3 form-group">
                            <label for="tp">Contact Number:</label>
                            <input type="text" class="form-control" id="tp" placeholder="Enter Contact Number" id="user_tp" name="user_tp" pattern=".{10}" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Please enter valid phone number.</div>
                        </div>
                    </div>
                    <div class="row py-2">
                        <div class="col-md-12 pt-md-0 pt-3 form-group">
                            <label for="sel1">Account Type :</label>
                            <select class="form-control" id="sel1" name="user_role" placeholder="Select Your Product" require>
                                <option value="S">DoA Staff</option>
                                <option value="K">Kells Staff</option>
                            </select>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Select A Product.</div>
                        </div>
                    </div>
                </div>
                <div class="py-3 pb-4 border-bottom"> <button type="submit" class="btn btn-primary mr-3">Submit</button></div>
        </div>
        <?php show(); ?>
        </form>

    <?php
    } else { ?>
        <div class="container">
            <br><br><br>
            <img class="mx-auto d-block" src="../images/passinstructionsent.svg" style="max-width:400px;width:100%;">
            <h2 class="text-center mt-3">Access Denied!</h2>
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</body>

</html>