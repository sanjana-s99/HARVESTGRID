<?php
global $val;
require('db.php');
	session_start();// sarting new session
    // If form submitted, insert values into the database.
    if (isset($_POST['user_email'])){
		
		$user_email = stripslashes($_REQUEST['user_email']); // removes backslashes
		$user_email = mysqli_real_escape_string($con,$user_email); //escapes special characters in a string
		$user_password = stripslashes($_REQUEST['user_password']);
		$user_password = mysqli_real_escape_string($con,$user_password);
		
	//Checking is user existing in the database or not
        $query = "SELECT * FROM users WHERE user_email='$user_email' AND user_password='$user_password'";
        $result = mysqli_query($con,$query) or die(mysql_error());
        $row = mysqli_fetch_assoc($result);
		$rows = mysqli_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $row['user_name']; //assign session user_name value
            setcookie("harvestgrid_user_name", $row['user_name'], time()+100000, "/","", 0); //set cookie to store user_name
            header("Location: ../index.php"); // Redirect user to index.php
            }else{
                $val = 100;
				}
    }

function show(){
    global $val;
    if($val==100){
        echo "<script>
        window.onload = function() {
            Swal.fire({
                title: '',
                text: 'You might wanna recheck that username or password',
                imageUrl: '../images/password.svg',
                imageHeight: 250,
                imageAlt: 'wrong password',
                confirmButtonColor: '#ff5454',
                confirmButtonText: 'Oh Okay',
            })
        };
    </script>";//error message
    }
}
?>
