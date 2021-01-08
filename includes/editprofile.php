<?php
    require('db.php');
    global $val;
    global $user_email;
    global $user_name;


    if (isset($_REQUEST['user_name'])){
        $user_id = $_REQUEST['user_id'];
        $user_nic = stripslashes($_REQUEST['user_nic']);// removes backslashes
        $user_name = stripslashes($_REQUEST['user_name']) . " "; 
        $user_name = mysqli_real_escape_string($con,$user_name); //escapes special characters in a string
        $user_email = stripslashes($_REQUEST['user_email']);
        $user_tp = stripslashes($_REQUEST['user_tp']);
        $user_email = mysqli_real_escape_string($con,$user_email);
        if($_FILES['img']['name'] != ''){
            $img = $_FILES['img']['name'];
            $img_temp = $_FILES['img']['tmp_name'];
        }else{
            $img = "nopropic.webp";
        }

        move_uploaded_file($img_temp,"../uploads/propic/$img");

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

            
        $query = "UPDATE users SET user_nic = '$user_nic', user_name = '$user_name', user_email = '$user_email', user_tp = '$user_tp', user_gender = '$user_gender', user_age = '$user_age', status = 'N', user_img = '$img' WHERE user_id =  '$user_id'"; //adding values to users table
        $result = mysqli_query($con,$query);
        if(!$result){
            die("Error in updating category".mysqli_error($con));
        }
        if($result){            
            mailsend();
            $val=2;            
        }
    }


    function show(){
        global $val;
        if($val==2){
            echo "<script>
                    window.onload = function myFunction() {
                        Swal.fire({
                            title: 'confirmation sent',
                            text: 'An email has been sent to you with instructions on how to confirm your email. Make sure to check your SPAM and JUNK folders',
                            imageUrl: '../images/emailsent.svg',
                            imageHeight: 250,
                            imageAlt: 'not a company email',
                            showCancelButton: true,
                            confirmButtonColor: '#2f2e41',
                            cancelButtonColor: '#ff5454',
                            confirmButtonText: 'resend',
                            cancelButtonText: 'alright'
                        }).then((result) => {
                            if (result.value) {
                                location.reload();
                                myFunction();
                            }else{
                                window.location.href = '../includes/signout.php';
                            }
                        })
                    };

                </script>";
        }
    }

    function mailsend(){
        require('db.php');
        global $user_email;
        global $key;
        
        $expFormat = mktime(date("H"), date("i"), date("s"), date("m")  , date("d")+1, date("Y"));
        $expDate = date("Y-m-d H:i:s",$expFormat);
        //generate a security key
        $key = md5((2418*2) . $user_email);
        $addKey = substr(md5(uniqid(rand(),1)),3,10);
        $key = $key . $addKey;
        $query = "INSERT INTO verify (email, skey, expDate) VALUES ('$user_email', '$key', '$expDate');";
        // Insert Temp Table        
        mysqli_query($con, $query);
        send();
                            
    }   

    function send(){
        global $user_email;
        global $key;
        global $user_name;
        
        $output='<p>Dear '.$user_name.',</p>';
        $output.='<p>Please click on the following link to verify your email.</p>';
        $output.='<p>-------------------------------------------------------------</p>';
        $output.='<p><a href="localhost/harvestgrid/pages/misc/confirmed.php?key='.$key.'&email='.$user_email.'&action=verify" target="_blank">Click Me!!</a></p>';		
        $output.='<p>-------------------------------------------------------------</p>';
        $output.='<p>Please be sure to copy the entire link onto your browser. The link will expire after 1 day for security reasons.</p>';
        $output.='<p>If you did not signup, ignore this email.</p>';   	
        $output.='<p>Thanks,</p>';
        $output.='<p>Weuse Team</p>';
        $body = $output; 
        $subject = "Verify Email - harvestgrid.com";
                        
        $email_to = $user_email;
        $fromserver = "noreply@harvestgrid.com"; 
        require("../phpmailer/PHPMailerAutoload.php");
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Host = "smtp.gmail.com"; // Enter your host here
        $mail->SMTPAuth = true;
        $mail->Username = "weuse.work@gmail.com"; // Enter your email here
        $mail->Password = "lebdkufvlhhmlvvv"; //Enter your passwrod here
        $mail->Port = 587;
        $mail->IsHTML(true);
        $mail->From = "noreply@harvestgrid.com";
        $mail->FromName = "HARVESTGRID";
        $mail->Sender = $fromserver; // indicates ReturnPath header
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($email_to);
        if(!$mail->Send()){
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
                        
    }
