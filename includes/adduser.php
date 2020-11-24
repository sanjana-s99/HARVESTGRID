<?php
    require('db.php');
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: signin.php");
    }
    global $val;
    global $user_email;
    global $user_name;

    if (isset($_REQUEST['user_name'])){
        $user_nic = stripslashes($_REQUEST['user_nic']);// removes backslashes
        $user_name = stripslashes($_REQUEST['user_name']) . " "; 
        $user_name = mysqli_real_escape_string($con,$user_name); //escapes special characters in a string
        $user_email = stripslashes($_REQUEST['user_email']);
        $user_tp = stripslashes($_REQUEST['user_tp']);
        $user_email = mysqli_real_escape_string($con,$user_email);
        $user_password = password_hash("newuser", PASSWORD_DEFAULT);
        $user_role = stripslashes($_REQUEST['user_role']);

        // get user birthyear from nic
        if (strlen($user_nic) == 10) {
            $year = "19" . substr($user_nic, 0, 2);
            $daytext = (int)substr($user_nic, 2, 3);
        } else {
            $year = substr($user_nic, 0, 4);
            $daytext = (int)substr($user_nic, 4, 3);
        }

        // get user gender from nic
        if ($daytext > 500) {
            $user_gender = "F";
            $daytext = $daytext - 500;
        } else {
            $user_gender = "M";
        }
        
        //calculate user age
        $user_age = (int)date("Y") - $year;
        
        $query1 = "SELECT * FROM users WHERE user_email = '$user_email';";
        $result1 = mysqli_query($con,$query1);
        $check=mysqli_num_rows($result1);
        
        if($check>=1){
            $val=1;
        }else{
            
            $query = "INSERT into users (user_nic, user_name, user_password, user_email, user_tp, user_gender, user_age ,user_role, status) VALUES ('$user_nic' , '$user_name', '$user_password' , '$user_email', '$user_tp', '$user_gender' , '$user_age', '$user_role', 'C')"; //adding values to users table
            $result = mysqli_query($con,$query);
            if($result){            
                $val=2;        
            }
        }
    }


    function show(){
        global $val;
        global $resend;
        if($val==1){
            echo    "<script>
                        window.onload = function myFunction() {
                            Swal.fire({
                                title: 'user alrady exists',
                                text: 'Try your username or contact us to recover your username',
                                imageUrl: '../images/userexists.svg',
                                imageHeight: 250,
                                imageAlt: 'user exists',
                                showCancelButton: true,
                                confirmButtonColor: '#ff5454',
                                cancelButtonColor: '#ff5454',
                                confirmButtonText: 'recover',
                                cancelButtonText: 'try again'
                            }).then((result) => {
                                if (result.value) {
                                    window.location.href = 'mailto:hello@weuse.work';
                                }
                            })
                        };
                    </script>";
        }
        if($val==2){
            echo "<script>
                    window.onload = function myFunction() {
                        Swal.fire({
                            title: 'Successfuly Created',
                            text: 'Staff Member Account Creation Successful.',
                            imageUrl: '../images/emailsent.svg',
                            imageHeight: 250,
                            imageAlt: 'account added',
                            showCancelButton: true,
                            confirmButtonColor: '#2f2e41',
                            cancelButtonColor: '#ff5454',
                            confirmButtonText: 'okay',
                            cancelButtonText: 'create another'
                        }).then((result) => {
                            if (result.value) {
                                window.location.href = 'admindashboard.php';
                            }
                        })
                    };

                </script>";
        }
    }

?>