<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--weuse-meta-tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--weuse-favicons-->
    <link rel="apple-touch-icon" sizes="180x180" href="../images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon/favicon-16x16.png">
    <link rel="manifest" href="../images/favicon/site.webmanifest">
    <link rel="mask-icon" href="../images/favicon/safari-pinned-tab.svg" color="#ff5454">
    <link rel="shortcut icon" href="../images/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#000000">
    <meta name="msapplication-config" content="../images/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <!--weuse-styles-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../styles/weuse.css">
    <!--keep-font-disabled-for-now
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">-->
<title>weuse reset password</title>
</head>
<body>
<div class="container-fluid">
        <!--weuse-SEO-->
        <div class="row mt-3 mb-1">
            <div class="col-12">
                <h2 class="mx-auto d-block" id="doitfortheseo">yayish</h2>
            </div>
        </div>
        <!--weuse-logo-->
        <div class="row mt-1 mb-3">
            <div class="col-12">
                <img class="mx-auto d-block" src="../images/weuse.svg">
            </div>
        </div>
		<div class="row mt-4 mx-auto d-block">
			<div class="col-8 mx-auto d-block">

			<?php
include('../includes/db.php');
if (isset($_GET["key"]) && isset($_GET["email"])
&& isset($_GET["action"]) && ($_GET["action"]=="reset")
&& !isset($_POST["action"])){
$key = $_GET["key"];
$email = $_GET["email"];
$curDate = date("Y-m-d H:i:s");
$query = mysqli_query($con,"
SELECT * FROM `password_reset_temp` WHERE `key`='$key' and `email`='$email';");
$row = mysqli_num_rows($query);
if ($row==""){
$error .= '<img class="mx-auto d-block mt-2 mb-2" src="../images/invalid.svg" style="max-width:400px;width:100%;"><h2 class="mx-auto d-block" >Invalid Link</h2>
<h5  class="text-center" >The link is invalid/expired. Either you did not copy the correct link from the email, 
or you have already used the key in which case it is deactivated.</h5>
<h5   class="text-center"><a href="https://www.weuse.work/pages/forgetpass.php">Click here to reset password.</a></h5>';
	}else{
	$row = mysqli_fetch_assoc($query);
	$expDate = $row['expDate'];
	if ($expDate >= $curDate){
	?>


<form   class="mx-auto d-block" method="post" action="" name="update" class="mb-5">
		<input type="hidden" name="action" value="update" />

		<p  class="mx-auto d-block">Enter New Password:</p>
		<input type="password" name="pass1" id="forminput" class="mx-auto d-block  mb-3" placeholder="&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;" required />

		<p  class="mx-auto d-block">Re-Enter New Password:</p>
		<input type="password" name="pass2" id="forminput" class="mx-auto d-block  mb-3" placeholder="&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;&#8226;" required />

		<input type="hidden" name="email" value="<?php echo $email;?>"/>
    <input type="submit" name="submit" value="⟳ RESET PASSWORD" class="mx-auto d-block mb-3" id="button"/>
	</form>

<?php
}else{
$error .= '<img class="mx-auto d-block mt-2 mb-2" src="../images/timeout.svg" style="max-width:400px;width:100%;"><h2 class="mx-auto d-block" >Expired Link</h2>
<h5  class="text-center" >The link is expired. You are trying to use the expired link which was valid for only 24 hours (1 days after request).</h5>
<h5   class="text-center"><a href="https://www.weuse.work/pages/forgetpass.php">Click here to reset password.</a></h6>
';
				}
		}
if($error!=""){
	echo "$error";
	}
} // isset email key validate end


if(isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"]=="update")){
$error="";
$pass1 = mysqli_real_escape_string($con,$_POST["pass1"]);
$pass2 = mysqli_real_escape_string($con,$_POST["pass2"]);
$email = $_POST["email"];
$curDate = date("Y-m-d H:i:s");
if ($pass1!=$pass2){
		$error .= "<script>
        window.onload = function() {
            Swal.fire({
                title: 'Passwords do not match',
                text: 'both passwords should be same.',
                imageUrl: '../images/invalid.svg',
                imageHeight: 250,
                imageAlt: 'password didnt match',
                confirmButtonColor: '#ff5454',
                confirmButtonText: 'my bad',
            }).then( function() {
        window.location.href = 'javascript:history.go(-1)';
    })
        };
    </script>";
		}
	if($error!=""){
		echo "$error";
		}else{

mysqli_query($con,
"UPDATE `users` SET `user_password`='$pass1', `user_regdate`='$curDate' WHERE `user_email`='$email';");	

mysqli_query($con,"DELETE FROM `password_reset_temp` WHERE `email`='$email';");		
	
echo "<script>
window.onload = function() {
    Swal.fire({
        title: 'Congratulations! ',
        text: 'Your password has been updated successfully.',
        imageUrl: '../images/pwresetdone.svg',
        imageHeight: 250,
        imageAlt: 'password reset done',
        confirmButtonColor: '#ff5454',
        confirmButtonText: 'nice',
    }).then( function() {
        window.location.href = '../pages/signin.php';
    })
};
</script>";
		}		
}
?>
            </div>
		</div>
</div>
    <!--weuse-help-and-footer-->
    <?php include "../pages/misc/help.php"; ?>
    <!--weuse-scripts-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="../scripts/weuse.js"></script>
</body>
</html>