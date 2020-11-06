<?php
    include ('db.php');

    $approved = array();
    $tobeapproved = array();

    $query1 = "SELECT  SUM(farmerrqst.weight) AS 'y', users.user_crop AS 'x' FROM farmerrqst JOIN users ON farmerrqst.user_id = users.user_id WHERE farmerrqst.status = 'A' GROUP BY users.user_crop";
    $result1 = mysqli_query($con, $query1);
    $query2 = "SELECT  SUM(farmerrqst.weight) AS 'y', users.user_crop AS 'x' FROM farmerrqst JOIN users ON farmerrqst.user_id = users.user_id WHERE farmerrqst.status = 'N' GROUP BY users.user_crop";
    $result2 = mysqli_query($con, $query2);
    if(!$result1 || !$result2){
        die("FAILD!!".mysqli_error());
    }

    while($row1 = mysqli_fetch_assoc($result1)){
        array_push($approved, array("label"=> $row1['x'], "y"=> $row1['y']));
    }

    while($row2 = mysqli_fetch_assoc($result2)){
        array_push($tobeapproved, array("label"=> $row2['x'], "y"=> $row2['y']));
    }
	
?>