<?php
    require('db.php');
    if(isset($_GET["rqst_id"])){
        $rqst_id = $_GET["rqst_id"];
        $query = "SELECT farmerrqst.weight, farmerrqst.date, farmerrqst.image1, farmerrqst.image2, farmerrqst.image3, users.user_id, users.user_name, users.user_crop FROM farmerrqst JOIN users ON farmerrqst.user_id = users.user_id WHERE rqst_id = $rqst_id";
        $result = mysqli_query($con, $query);
        if(!$result){
            die("FAILD!!".mysqli_error());
        }
        while($row = mysqli_fetch_assoc($result)){
            $user_id = $row['user_id'];
            $user_name = $row['user_name'];
            $user_crop = $row['user_crop'];
            $rqst_weight = $row['weight'];
            $rqst_date = $row['date'];
            $img1 = $row['image1'];
            $img2 = $row['image2'];
            $img3 = $row['image3'];
        }
    }
?>