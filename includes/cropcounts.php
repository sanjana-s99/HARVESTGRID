<?php
    require("db.php");

    $query1= "SELECT * FROM users WHERE user_crop = 'Rice'";
    $result1 = mysqli_query($con,$query1) or die(mysql_error());
    $rice=mysqli_num_rows($result1);

    $query2= "SELECT * FROM users WHERE user_crop = 'Tea'";
    $result2 = mysqli_query($con,$query2) or die(mysql_error());
    $tea=mysqli_num_rows($result2);

    $query3= "SELECT * FROM users WHERE user_crop = 'Coconut'";
    $result3 = mysqli_query($con,$query3) or die(mysql_error());
    $coconut=mysqli_num_rows($result3);

    $query4= "SELECT * FROM users WHERE user_crop = 'Spices'";
    $result4 = mysqli_query($con,$query4) or die(mysql_error());
    $spices=mysqli_num_rows($result4);

    $query5= "SELECT * FROM users WHERE user_crop = 'Fruits_and_vegetable'";
    $result5 = mysqli_query($con,$query5) or die(mysql_error());
    $vnf=mysqli_num_rows($result5);

    $query6= "SELECT * FROM users WHERE user_crop = 'Other'";
    $result6 = mysqli_query($con,$query6) or die(mysql_error());
    $other=mysqli_num_rows($result6);


?>