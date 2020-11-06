<?php
    require('db.php');
    if(isset($_GET["action"])){
        echo $_GET['action'];
        echo $_GET['rqst_id'];
        $rqst_id = $_GET["rqst_id"];

        if($_GET['action']=="approve"){
            $query="UPDATE farmerrqst SET status = 'A' WHERE rqst_id = $rqst_id";
            mysqli_query($con, $query);
        }elseif ($_GET['action']=="reject") {
            $query="UPDATE farmerrqst SET status = 'R' WHERE rqst_id = $rqst_id";
            mysqli_query($con, $query);
        }
    }
?>