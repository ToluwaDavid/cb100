<?php

include('includes/header.php');
//include('includes/config.php'); 
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'cbt');
//mysqli_select_db($conn, 'cb100');
// $email = $_SESSION['email'] ;
// echo $email;
$firstname = $_SESSION['firstname'];
echo $firstname;
$q = "SELECT * FROM questions";
$query = mysqli_query($conn, $q);
$na= " ";
// $id = 
// $quest = mysqli_query($conn, "SELECT * FROM questions");
// $ee = mysqli_fetch_array($quest);
// $ff = $ee['question'];
// $rr = msqli_num_rows($ff);
// print_r($ff);
// echo $ff;

// $you = mysqli_query($conn, "SELECT question FROM questions");
// $num = mysqli_num_rows($you);
// $yo  = mysqli_fetch_array($you);
// $roy = $yo['question'];
//  print_r($num);

// for ($i=0; $i < $num; $i++) { 

// 	print_r($roy);
// }
//print_r($you);
//print_r($roy);

?>


	<title>Quiz</title>
</head>
<body>
	<div class="container">
		<div class="col-md-10 offset-md-2 form">
			<h4 align="center">Select one option only</h4>
				<form method="post">
						<?php
						while ($rows = mysqli_fetch_array($query)) {
						?>
					<div class="form-group">
						<input type="text" name="question" disabled class="form-control"  value="<?php echo $rows['question'] ?>">
					</div>
					<div class="form-check">
						<label class="form-check-label" for="radio1">
							<input type="radio" name="<?php echo $rows['qid'] ;?>"  value="<?php echo $rows['opt1'] ?>">&nbsp;<span class="text"><?php echo $rows['opt1'] ?></span>
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label" for="radio2">
							<input type="radio"   name="<?php echo $rows['qid'] ;?>" value="<?php echo $rows['opt2'] ?>">&nbsp;<span class="text"><?php echo $rows['opt2'] ?></span>
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label" for="radio3">
							<input type="radio"   name="<?php echo $rows['qid'] ;?>" value="<?php echo $rows['opt3'] ?>">&nbsp;<span class="text"><?php echo $rows['opt3'] ?></span>
						</label>
					</div>
					<div class="form-check">
						<label class="form-check-label" for="radio4">
							<input type="radio"  name="<?php echo $rows['qid'] ;?>" value="<?php echo $rows['opt4'] ?>">&nbsp;<span class="text"><?php echo $rows['opt4'] ?></span>
						</label>
					</div>
					<?php
						}
						$na=" "; $q1=" "; $q2=" "; $q3=" "; $q4=" "; 
						$score = 0;
						if (isset ($_POST['Submit'])) {
						// 	$na = $rows['qid'];
						// $selected_radio = $_POST['$na'];
						// echo $selected_radio;
					//header("location:result.php");

							for($i = 1; $i <= 4; $i++){ 
								if($_POST["$i"]){
									$q1 = "SELECT ans FROM questions where qid = $i";
									$query1 = mysqli_query($conn, $q1);
									 while($row = mysqli_fetch_assoc($query1)) {
										if($row['ans'] == $_POST["$i"]){
											$score += 1;
											$_SESSION['score']= $score;
										}
									}
								}
							}
					//echo $score;	
							header('location:result.php');
						}
					?>
					<input type="submit" name="Submit" value="Submit"  >
				</form>
		</div>
	</div>
</body>
</html>

<?php

include("includes/footer.php");
?>