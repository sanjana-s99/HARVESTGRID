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
        $query = "SELECT * FROM users WHERE user_email='$user_email'";
        $result = mysqli_query($con,$query);
        $row = mysqli_fetch_assoc($result);
        if(isset($row["user_password"]) && password_verify($user_password, $row["user_password"])){
            if($row['status']=='A'){
                $_SESSION['username'] =  strstr($row['user_name'], " ", "true"); //assign session user_name
                $_SESSION['user_id'] =  $row['user_id']; //assign session user_id
                $_SESSION['user_role'] =  $row['user_role']; //assign session user_role
                $sub_query = "INSERT INTO login_details (user_id) VALUES ('".$row['user_id']."')";
                mysqli_query($con,$sub_query);
                $_SESSION['login_details_id'] = mysqli_insert_id($con);
                echo $_SESSION['login_details_id'];
                setcookie("harvestgrid_user_name", $row['user_name'], time()+100000, "/","", 0); //set cookie to store user_name
                header("Location: ../index.php"); // Redirect user to index.php
            }else{
                $val=200;
            }
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

    }elseif($val==200){
        echo "<script>
        window.onload = function() {
            Swal.fire({
                title: '',
                text: 'your account not approved yet.',
                imageUrl: '../images/verifyfirst.svg',
                imageHeight: 250,
                imageAlt: 'not approved',
                confirmButtonColor: '#ff5454',
                confirmButtonText: 'Oh Okay',
            })
        };
    </script>";//error message
    }
}
?>