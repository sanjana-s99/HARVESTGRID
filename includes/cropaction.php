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
            
        }
    }
?>