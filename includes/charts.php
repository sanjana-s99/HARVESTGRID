<?php
    include ('db.php');

    $approved = array();
    $tobeapproved = array();
    $collected = array();
    $rejected = array();

    $query1 = "SELECT  SUM(farmerrqst.weight) AS 'y', users.user_crop AS 'x' FROM farmerrqst JOIN users ON farmerrqst.user_id = users.user_id WHERE farmerrqst.status = 'A' GROUP BY users.user_crop";
    $result1 = mysqli_query($con, $query1);
    $query2 = "SELECT  SUM(farmerrqst.weight) AS 'y', users.user_crop AS 'x' FROM farmerrqst JOIN users ON farmerrqst.user_id = users.user_id WHERE farmerrqst.status = 'N' GROUP BY users.user_crop";
    $result2 = mysqli_query($con, $query2);
    $query3 = "SELECT  SUM(farmerrqst.weight) AS 'y', users.user_crop AS 'x' FROM farmerrqst JOIN users ON farmerrqst.user_id = users.user_id WHERE farmerrqst.status = 'C' GROUP BY users.user_crop";
    $result3 = mysqli_query($con, $query3);
    $query4 = "SELECT  SUM(farmerrqst.weight) AS 'y', users.user_crop AS 'x' FROM farmerrqst JOIN users ON farmerrqst.user_id = users.user_id WHERE farmerrqst.status = 'R' GROUP BY users.user_crop";
    $result4 = mysqli_query($con, $query4);

    if(!$result1 || !$result2 || !$result3 || !$result4){
        die("FAILD!!".mysqli_error());
    }

    while($row1 = mysqli_fetch_assoc($result1)){
        array_push($approved, array("label"=> $row1['x'], "y"=> $row1['y']));
    }

    while($row2 = mysqli_fetch_assoc($result2)){
        array_push($tobeapproved, array("label"=> $row2['x'], "y"=> $row2['y']));
    }

    while($row3 = mysqli_fetch_assoc($result3)){
        array_push($collected, array("label"=> $row3['x'], "y"=> $row3['y']));
    }

    while($row4 = mysqli_fetch_assoc($result4)){
        array_push($rejected, array("label"=> $row4['x'], "y"=> $row4['y']));
    }
	
?>