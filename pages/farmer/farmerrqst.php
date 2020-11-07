<?php
    include "../../includes/farmerrqst.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HarvestGrid Request-For-Pickup</title>

    <!-- Main css -->
    <link href="../../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="../../assets/css/formstyle.css" rel="stylesheet">

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
            <li><a href="../../index.php">Home</a></li>
            <li class="active"><a href="../pages/signup.php">Register</a></li>
            <li class="get-started"><a href="../signin.php">Sign In</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->
<br><br><br>
<div class="wrapper bg-white mt-sm-5">
    <h4 class="pb-4 border-bottom">HarvestGrid - Request For Pickup</h4>
    <form action=""  method="post" enctype="multipart/form-data">
        <div class="py-2">
            <div class="row py-2">
                <label for="weight">Total Weight:</label>
                <input type="text" class="form-control" id="weight" placeholder="Enter Weight(KG)" name="weight" required>
            </div>
            <div class="row py-2">
                <label for="date">Harvested Date:</label>
                <input type="date" class="form-control" id="date" placeholder="Enter Harvested Date"  name="date" required>
            </div>
            <div class="row py-2">
                <label for="img1">Image To Prove #1:</label>
                <input type="file" class="form-control" id="file1" placeholder="Add Image" name="img1"   required>
            </div>
            <div class="row py-2">
                <label for="img2">Image To Prove #2:</label>
                <input type="file" class="form-control" id="file2" placeholder="Add Image" name="img2"   required>
            </div>
            <div class="row py-2">
                <label for="img3">Image To Prove #3: [If Need]</label>
                <input type="file" class="form-control" id="file3" placeholder="Add Image" name="img3">
            </div>
        </div>
        <div class="py-3 pb-4 border-bottom"> <button type="submit" class="btn btn-primary mr-3">Submit</button></div>
    </form>
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</body>
</html>