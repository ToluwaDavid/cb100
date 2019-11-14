<?php
include('includes/header.php');
include('includes/config.php'); 
include('includes/functions.php'); 
 session_start();

 $email = $_SESSION['email'] ;
 $firstname = $_SESSION['firstname'];
 $score = $_SESSION['score'];
// echo $firstname;
// echo $score;

// $score = 0;
// $i=0;
// for($i = 1; $i <= 4; $i++){
// 	if($_POST["$i"]){
// 		$q1 = "SELECT ans FROM questions where qid = $i";
// 		$query1 = mysqli_query($conn, $q1);
// 		while($row = mysqli_fetch_assoc($query1)) {
// 		if($row['ans'] == $_POST["$i"]){
// 		$score += 1;
// 	}
// 	}
// 	}
// 	}
// 	echo $score;	
 ?>

 	<title></title>
 </head>
 <body>
 	<div class="jumbotron">
 		<div class="col-md-6 offset-md-3" align="center">Congratations <?php echo $firstname ?> Your score is <?php echo $score?></div> 
 	</div>
 </body>

 <?php  
	include("includes/footer.php")
?>