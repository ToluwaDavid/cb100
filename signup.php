<?php  
include('includes/header.php');
include('includes/config.php'); 
session_start();
$msg=" "; $msg1=" "; $msg2=" "; $msg3=" "; $msg4=" "; $firstname=''; $lastname=''; $phone=''; $email='';

if (isset($_POST['submit'])) {
	
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$_SESSION['firstname'] = $firstname;  
	if (empty($firstname)) {
		$msg = '<div class="error">Please fill out your first</div>';
	}
	else if (empty($lastname)) {
		$msg1 = '<div class="error">Please fill out your lastname</div>';
	}
	else if (empty($phone)) {
		$msg2 = '<div class="error">Please fill out your phone</div>';
	}
	elseif(strlen($phone) >11 || strlen($phone) < 11){
		$msg2 = '<div class="error">Your number should not be less than or greater than 11 characters</div>';
	}
	else if(empty($email)){
		$msg4 = '<div class="error">Please fill out your email </div>';
	}
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$msg4 = '<div class="error">Please fill out a valid email</div>';
	}
	else{
		mysqli_query($con, "INSERT INTO users(firstname,lastname,phone,mail) VALUES ('$firstname','$lastname','$phone','$email')");
		$msg3 = '<div class="success"><b>Registration Successful</b></div>';
		//header("location:login.php");
	}

}
 else{
// 	mysqli_errorlist('error');
 	//header("location:admin.php");
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
			<h3>Sign up here</h3>
			<form method="post" enctype="multipart/form-data">
			<?php echo $msg3; ?>
				<div class="form-group">
					<label>First name</label>
					<input type="text" name="firstname" placeholder="First name here" class="form-control" value="<?php echo $firstname;?>">
					<?php echo $msg; ?>
				</div>
				<div class="form-group">
					<label>Surname</label>
					<input type="text" name="lastname" placeholder="Last name here please" class="form-control" value="<?php echo $lastname;?>">
					<?php echo $msg1; ?>
				</div>	
				<div class="form-group">
					<label>Phone Number</label>
					<input type="phone" name="phone" placeholder="Phone number here please" class="form-control" value="<?php echo $phone;?>">
					<?php echo $msg2; ?>
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="email" name="email" placeholder="Email here please" class="form-control" value="<?php echo $email;?>">
					<?php echo $msg4; ?>
				</div>
				<div>
					<a href="login.php">Already Signed up before? Login in here</a>
				</div>	
				<br>
				<div class="from-group">
					<input type="submit" name="submit" value="Sign up">
				</div>		
			</form>
		</div>
	</div>
<?php  
	include("includes/footer.php")
?>