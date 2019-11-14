<?php

function check_email($email, $con)
{

	$row = mysqli_query($con, "SELECT id FROM users WHERE mail = '$email'");


	if (mysqli_num_rows($row)==1) 
	{
		return true;
	}
	else
	{
		return false;
	}


}
?>

<!-- function email_exists($email,$con)
{
	$row = mysqli_query($con, "SELECT id FROM users WHERE email='$email'");	
	//print_r($row);
	{

	if(mysqli_num_rows($row)==1)
	{
		return true;
	}
	else
	{
		return false;
	}
	}
} -->