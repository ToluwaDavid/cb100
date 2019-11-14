<?php  
include('includes/header.php');
include('includes/config.php'); 
include('includes/functions.php'); 
 session_start();
$msg=" "; $msg1=" "; $msg2=" "; $msg3=" "; $msg4=" "; $firstname=''; $lastname=''; $phone=''; $email='';

if (isset($_POST['submit'])) {
	
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$_SESSION['email'] = $email; 

	if (empty($phone)) {
		$msg = '<div class="error">Please fill out your phone number</div>';
	}
	else if (empty($email)) {
		$msg1 = '<div class="error">Please fill out your Email</div>';	
	}
	else if(check_email($email, $con)) {
		$mail = mysqli_query($con , "SELECT mail FROM users WHERE mail = '$email'");

		$email_array = mysqli_fetch_array($mail);
		$dmail = $email_array['mail'];
		echo $dmail;
		if ($dmail !== $email) {
			header("location: login.php");
		}
		else if($dmail == $email){
			header("location: start.php");	
		}
		

	}

}
 else{
 	//header("location: signup.php");
}

?>
<title>Login</title>
<style type="text/css">
	
	.error {
		color: red;
	}
	.success{
		color: green;
		margin: 0 auto;
	}

</style>
</head>
<body>
	<div class="container">
		<div class="col-md-6 offset-md-3 form">
			<h3>Login here</h3>
			<form method="post" enctype="multipart/form-data">
			<?php echo $msg2; ?>	
				<div class="form-group">
					<label>Phone Number</label>
					<input type="phone" name="phone" placeholder="Phone number here please" class="form-control" value="<?php echo $phone;?>">
					<?php echo $msg; ?>
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" name="email" placeholder="Email here please" class="form-control" value="<?php echo $email;?>">
					<?php echo $msg1; ?>
				</div>
				<div>
					<a href="signup.php">Haven't Signed up before? sign up here</a>
				</div>	
				<br>
				<div class="from-group">
					<input type="submit" name="submit" value="Login here">
				</div>		
			</form>
		</div>
	</div>
<?php  
	include("includes/footer.php")
?>