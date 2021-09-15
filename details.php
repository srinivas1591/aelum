<?php
	session_start();
	$chk=$_SESSION['tempvar'];
	if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['dob']) && isset($_POST['abt']) && isset($_POST['captcha']))
	{
		if(strlen($_POST['name'])==0 || strlen($_POST['email'])==0 || strlen($_POST['dob'])==0 || strlen($_POST['abt'])==0 || strlen($_POST['captcha'])==0)
		{
			$_SESSION['warning']="please fill all fields";
			header('location:index.php');
		}
		else
		{
			$a=$_POST['name'];
			$b=$_POST['email'];
			$c=$_POST['dob'];
			$d=$_POST['abt'];
			$e=$_POST['captcha'];
			if($chk!=$e)
			{
				$_SESSION['warning']="Captcha not matched";
				unset($_SESSION['tempvar']);
				header('location:index.php');
			}
		}
	}
	else
	{
		$_SESSION['warning']="please fill all fields";
		header('location:index.php');
	}
	unset($_SESSION['timer']);
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Details</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
	<style type="text/css">
		.card{
			margin-top: 50px;
		}
		
	</style>
</head>
<body>
	<center>
			<div class="card" style="width:350px">
			  <img class="card-img-top" src="profileicon.png" alt="Card image">
			  <div class="card-body">
			    <h4 class="card-title"><?php echo $a; ?></h4>
			    <b><?php echo $b; ?></b>
			    <p class="card-text"><?php echo 'DOB :'.$c; ?></p>
			    <p class="card-text"><?php echo $d; ?></p>
			    <a href="index.php" class="btn btn-primary">Go Back</a>
			  </div>
			</div>
	</center>
</body>
</html>