<?php
include('../../includes/db.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel='shortcut icon' type='image/x-icon' href='../../images/favicon.svg' />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <?php
    if (
        isset($_GET["key"]) && isset($_GET["email"])
        && isset($_GET["action"]) && ($_GET["action"] == "verify")
        && !isset($_POST["action"])
    ) {
        $key = $_GET["key"];
        $email = $_GET["email"];
        $curDate = date("Y-m-d H:i:s");
        $query = mysqli_query($con, "
    SELECT * FROM verify WHERE `skey`='$key' and `email`='$email';");
        $row = mysqli_num_rows($query);
        if ($row == "") {
            $error .= '    <div class="container">
    <br><br><br><br><br><br>
                <img class="mx-auto d-block" src="../../images/invalid.svg" style="max-width:400px;width:100%;">
                <br>
                <h2 class="text-center mt-3">Email Not Confirmed</h2>
                <h5 class="text-center mt-3">The link is invalid. Either you did not copy the correct link from the email, 
or you have already used the key in which case it is deactivated.</h5>
                <h5 class="text-center mt-3">You will be redirected in <span id="counter"> 10 </span> second(s).</h5>
                <script>
                    function countdown() {
                        var i = document.getElementById("counter");
                        if (parseInt(i.innerHTML) <= 0) {
                            location.href = "../../index.php";
                        }
                        if (parseInt(i.innerHTML) != 0) {
                            i.innerHTML = parseInt(i.innerHTML) - 1;
                        }
                    }
                    setInterval(function() {
                        countdown();
                    }, 1000);

                </script>
    </div>';
        } else {
            $row = mysqli_fetch_assoc($query);
            $expDate = $row['expDate'];
            if ($expDate >= $curDate) {

                mysqli_query(
                    $con,
                    "UPDATE users SET `status`='A' WHERE `user_email`='$email';"
                );

                mysqli_query($con, "DELETE FROM verify WHERE `email`='$email';");

    ?>

                <div class="container">
                    <br><br><br><br><br><br>
                    <img class="mx-auto d-block" src="../../images/confirmed.svg" style="max-width:400px;width:100%;">
                    <h2 class="text-center mt-3">Email Confirmed</h2>
                    <h5 class="text-center mt-3">You will be redirected in <span id="counter"> 10 </span> second(s).</h5>
                    <script>
                        function countdown() {
                            var i = document.getElementById('counter');
                            if (parseInt(i.innerHTML) <= 0) {
                                location.href = '../signin.php';
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
    <?php
            } else {
                $error .= '    <div class="container">
    <br><br><br><br><br><br>
                <img class="mx-auto d-block" src="../../images/timeout.svg" style="max-width:500px;width:100%;">
                <br>
                <h2 class="text-center mt-3">Email Not Confirmed</h2>
                <h5 class="text-center mt-3">The link is expired. You are trying to use an expired link which was valid for only 24 hours (1 day after request).</h5>
                <h5 class="col-8 text-center mt-3">You will be redirected in <span id="counter"> 10 </span> second(s).</h5>
                <script>
                    function countdown() {
                        var i = document.getElementById("counter");
                        if (parseInt(i.innerHTML) <= 0) {
                            location.href = "../../index.php";
                        }
                        if (parseInt(i.innerHTML) != 0) {
                            i.innerHTML = parseInt(i.innerHTML) - 1;
                        }
                    }
                    setInterval(function() {
                        countdown();
                    }, 1000);

                </script>
    </div>';
            }
        }
        if ($error != "") {
            echo "<div>" . $error . "</div><br />";
        }
    } // isset email key validate end
    ?>
    <!--weuse-scripts-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../../scripts/weuse.js"></script>
</body>

</html>