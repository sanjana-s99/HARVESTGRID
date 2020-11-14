<?php
    global $val;
    require "../../includes/db.php";
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: ../signin.php");
    }
    $name = $_SESSION['username'];
    $user_id = $_SESSION['user_id'];


    if(isset($_POST['weight'])){
            $weight = $_POST['weight'];
            $date = $_POST['date'];
            $img1 = $_FILES['img1']['name'];
            $img1_temp = $_FILES['img1']['tmp_name'];
            $img2 = $_FILES['img2']['name'];
            $img2_temp = $_FILES['img2']['tmp_name'];

            move_uploaded_file($img1_temp,"../../uploads/$img1");
            move_uploaded_file($img2_temp,"../../uploads/$img2");

            $img3 = "NA.jpg";

            if($_FILES['img3']['name']!=null){
                $img3 = $_FILES['img3']['name'];
                $img3_temp = $_FILES['img3']['tmp_name'];

                move_uploaded_file($img3_temp,"../../uploads/$img3");
            }
            
            
            $query = "INSERT INTO farmerrqst(user_id,weight,date,image1,image2,image3,status)";
            $query .= "VALUES('{$user_id }','{$weight }','{$date}','{$img1}','{$img2}','{$img3}','N')";
            
            $result1 = mysqli_query($con,$query);
            if(!$result1){
                die('query failed'.mysqli_error($con));
            }
                
            $val = 1;
        }

        function show(){
            global $val;
            if($val==1){
                echo    "<script>
                            window.onload = function myFunction() {
                                Swal.fire({
                                    title: 'request successful',
                                    text: 'Request forward to harvestgrid team',
                                    imageUrl: '../../images/submissionsuccess.svg',
                                    imageHeight: 250,
                                    imageAlt: 'rqst success',
                                    showCancelButton: true,
                                    confirmButtonColor: '#ff5454',
                                    cancelButtonColor: '#ff5454',
                                    confirmButtonText: 'Okayy',
                                    cancelButtonText: 'Add Another'
                                }).then((result) => {
                                    if (result.value) {
                                        window.location.href = 'farmerdashboard.php';
                                    }
                                })
                            };
                        </script>";
            }
        }
