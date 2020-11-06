<?php
    include "db.php";
	if(isset($_GET['delete'])){
				$user_id = $_GET['delete'];
                $query = "DELETE FROM users WHERE user_id = {$user_id}";
                echo $query;
				$result = mysqli_query($con,$query);
                header("Location: ../pages/admindashboard.php");
				if(!$result){
				    die("Error in deleting....".mysqli_error($con));
				}
									
	 }


?>