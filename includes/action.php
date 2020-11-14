<?php
    include "db.php";
	if(isset($_GET['delete'])){
		$user_id = $_GET['delete'];
		$query = "DELETE FROM users WHERE user_id = {$user_id}";
		$result = mysqli_query($con,$query);
		header("Location: ../pages/admindashboard.php");
		if(!$result){
			die("Error in deleting....".mysqli_error($con));
		}
									
	 }

	 if(isset($_GET['approve'])){
		$user_id = $_GET['approve'];
		$query = "UPDATE users SET status = 'A' WHERE user_id = {$user_id}";
		$result = mysqli_query($con,$query);
		header("Location: ../pages/admindashboard.php");
		if(!$result){
			die("Error in Approving....".mysqli_error($con));
		}
	}
				
	if(isset($_GET['deleter'])){
		$rqst_id = $_GET['deleter'];
		$query = "DELETE FROM farmerrqst WHERE rqst_id = {$rqst_id}";
		$result = mysqli_query($con,$query);
		header("Location: ../pages/farmer/farmerdashboard.php");
		if(!$result){
			die("Error in deleting....".mysqli_error($con));
		}
								
	 }
	 
	 if(isset($_GET['reapply'])){
		$rqst_id = $_GET['reapply'];
		$query = "UPDATE farmerrqst SET status = 'N' WHERE rqst_id = {$rqst_id}";
		echo $query;
		$result = mysqli_query($con,$query);
		header("Location: ../pages/farmer/farmerdashboard.php");
		if(!$result){
			die("Error....".mysqli_error($con));
		}
								
 	}
?>