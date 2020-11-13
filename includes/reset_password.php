<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Main css -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="../assets/css/formstyle.css" rel="stylesheet">
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
    <title>Harvestgrid reset-password</title>
</head>

<body>
    <div class="container">
        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top d-flex align-items-center">
            <div class="container d-flex align-items-center">

                <div class="logo mr-auto">
                    <h1 class="text-light"><a href="index.html"><span>HarvestGrid</span></a></h1>
                </div>

                <nav class="nav-menu d-none d-lg-block">
                    <ul>
                        <li><a href="../index.php">Home</a></li>
                        <li class="get-started"><a href="../pages/signin.php">Signin</a></li>
                    </ul>
                </nav><!-- .nav-menu -->

            </div>
        </header><!-- End Header -->
        <br><br><br><br><br><br>

        <?php
        include('../includes/db.php');
        if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"] == "reset") && !isset($_POST["action"])) {
            $key = $_GET["key"];
            $email = $_GET["email"];
            $curDate = date("Y-m-d H:i:s");
            $query = mysqli_query($con, "SELECT * FROM verify WHERE skey='$key' and email='$email';");
            $row = mysqli_num_rows($query);
            if ($row == "") {
                $error .= '<img class="mx-auto d-block mt-2 mb-2" src="../images/invalid.svg" style="max-width:400px;width:100%;"><h2 class="mx-auto d-block" >Invalid Link</h2>
    <h5  class="text-center" >The link is invalid/expired. Either you did not copy the correct link from the email, 
    or you have already used the key in which case it is deactivated.</h5>
    <h5   class="text-center"><a href="../pages/forgetpass.php">Click here to reset password.</a></h5>';
            } else {
                $row = mysqli_fetch_assoc($query);
                $expDate = $row['expDate'];
                if ($expDate >= $curDate) {
        ?>

                    <div class="wrapper bg-white mt-sm-5">
                        <h4 class="pb-4 border-bottom">HarvestGrid Reset-Password</h4>
                        <form action="" name="update" class="needs-validation" method="post" novalidate>
                            <input type="hidden" name="action" value="update" />

                            <div class="form-group">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" placeholder="Enter Password" name="pass1" id="forminput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters.</div>
                            </div>


                            <div class="form-group">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" placeholder="Enter Password" name="pass2" id="forminput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters.</div>
                            </div>
                            <input type="hidden" name="email" value="<?php echo $email; ?>" />

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

        <?php
                } else {
                    $error .= '<img class="mx-auto d-block mt-2 mb-2" src="../images/timeout.svg" style="max-width:400px;width:100%;"><h2 class="mx-auto d-block" >Expired Link</h2>
<h5  class="text-center" >The link is expired. You are trying to use the expired link which was valid for only 24 hours (1 days after request).</h5>
<h5   class="text-center"><a href="https://www.weuse.work/pages/forgetpass.php">Click here to reset password.</a></h6>
';
                }
            }
            if ($error != "") {
                echo "$error";
            }
        } // isset email key validate end


        if (isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"] == "update")) {
            $error = "";
            $pass1 = mysqli_real_escape_string($con, $_POST["pass1"]);
            $pass2 = mysqli_real_escape_string($con, $_POST["pass2"]);
            $email = $_POST["email"];
            $curDate = date("Y-m-d H:i:s");
            if ($pass1 != $pass2) {
                $error .= "<script>
            window.onload = function() {
                Swal.fire({
                    title: 'Passwords do not match',
                    text: 'both passwords should be same.',
                    imageUrl: '../images/invalid.svg',
                    imageHeight: 250,
                    imageAlt: 'password didnt match',
                    confirmButtonColor: '#ff5454',
                    confirmButtonText: 'my bad',
                }).then( function() {
            window.location.href = 'javascript:history.go(-1)';
        })
            };
        </script>";
            }
            if ($error != "") {
                echo "$error";
            } else {
                $pass1 = password_hash($pass1, PASSWORD_DEFAULT);

                mysqli_query($con, "UPDATE users SET user_password='$pass1' WHERE user_email='$email';");

                mysqli_query($con, "DELETE FROM verify WHERE `email`='$email';");

                echo "<script>
    window.onload = function() {
        Swal.fire({
            title: 'Congratulations! ',
            text: 'Your password has been updated successfully.',
            imageUrl: '../images/pwresetdone.svg',
            imageHeight: 250,
            imageAlt: 'password reset done',
            confirmButtonColor: '#ff5454',
            confirmButtonText: 'nice',
        }).then( function() {
            window.location.href = '../pages/signin.php';
        })
    };
    </script>";
            }
        }
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</body>

</html>