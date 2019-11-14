<?php

include('includes/header.php');
include('includes/config.php'); 

if (isset($_POST['start'])) {
	
	header('location:questions.php');
}
else
{
	//header('location:start.php');
}



?>
	<title>Start</title>
</head>
<body>
	<div class="container">
		<div class="col-md-6 offset-md-3 form">
			<h4>Welcome,to attempt this quiz click the button below</h4>
			<form method="post" enctype="multipart/form-data">
				<div class="form-group">
					<input type="submit" name="start" value="Attempt quiz now">
				</div>
			</form>
		</div>
	</div>
</body>
</html>

<?php

include("includes/footer.php");
?>