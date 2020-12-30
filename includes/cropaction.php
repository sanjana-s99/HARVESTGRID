<?php
    require('db.php');
    if(isset($_GET["action"])){
        $rqst_id = $_GET["rqst_id"];

        if($_GET['action']=="approve"){
            $query="UPDATE farmerrqst SET status = 'A' WHERE rqst_id = $rqst_id";
            echo $query;
            mysqli_query($con, $query);
            header("Location: ../pages/farmer/farmer.php?rqst_id=$rqst_id");

        }elseif ($_GET['action']=="reject") {
            $query="UPDATE farmerrqst SET status = 'R' WHERE rqst_id = $rqst_id";
            mysqli_query($con, $query);
            header("Location: ../pages/farmer/farmer.php?rqst_id=$rqst_id");
            
        }elseif ($_GET['action']=="collected") {
            $query="UPDATE farmerrqst SET status = 'C' WHERE rqst_id = $rqst_id";
            mysqli_query($con, $query);
            header("Location: ../pages/farmer/farmer.php?rqst_id=$rqst_id");
            
        }elseif ($_GET['action']=="gquality") {
            $query = "SELECT user_id FROM farmerrqst WHERE rqst_id = {$rqst_id}";
            $result = mysqli_query($con,$query);
            while($row = mysqli_fetch_assoc($result)){
                $user_id = $row['user_id'];
            }
            $query = "SELECT user_rating FROM users WHERE user_id = {$user_id}";
            $result = mysqli_query($con,$query);
            while($row = mysqli_fetch_assoc($result)){
                $rating = $row['user_rating'];
            }
            $query2 = "UPDATE farmerrqst SET quality = 'G' WHERE rqst_id = {$rqst_id}";
            mysqli_query($con, $query2);
            if($g<9){
                $query3 = "UPDATE users SET user_rating = user_rating + 1 WHERE user_id = {$user_id}";
                mysqli_query($con, $query3);
            }
            header("Location: ../pages/farmer/farmer.php?rqst_id=$rqst_id");
            
        }elseif ($_GET['action']=="pquality") {
            $query = "SELECT user_id FROM farmerrqst WHERE rqst_id = {$rqst_id}";
            $result = mysqli_query($con,$query);
            while($row = mysqli_fetch_assoc($result)){
                $user_id = $row['user_id'];
            }
            $query = "SELECT user_rating FROM users WHERE user_id = {$user_id}";
            $result = mysqli_query($con,$query);
            while($row = mysqli_fetch_assoc($result)){
                $rating = $row['user_rating'];
            }
            $query2 = "UPDATE farmerrqst SET quality = 'P' WHERE rqst_id = {$rqst_id}";
            mysqli_query($con, $query2);
            if($g>1){
                $query3 = "UPDATE users SET user_rating = user_rating - 1 WHERE user_id = {$user_id}";
                mysqli_query($con, $query3);
            }
            header("Location: ../pages/farmer/farmer.php?rqst_id=$rqst_id");
            
        }
    }
?>