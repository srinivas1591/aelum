<?php
	session_start();
	if(!isset($_SESSION['timer'])){
    	$_SESSION['timer'] = 180;
    	$_SESSION['atstart'] = time();
	}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home | FORM</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
	<style type="text/css">
		.jumbotron{
			width: 350px;
			margin-top: 20px;
			padding: 15px;
		}
		.captcha
		{
			width: 100%;
			padding: 5px;
			border-radius: 2px;
			background-color: white;
			margin-bottom: 15px;
			font-size: 20px;
			letter-spacing: 35px;
		}
	</style>
</head>
<body>
	<center>
	<?php 
		$time=uniqid();
		$_SESSION['tempvar']=substr($time, 0,5);
		if(isset($_SESSION['warning']))
		{
			echo '<div class="alert alert-success">
			  <strong>Sorry!</strong> '.$_SESSION['warning'].'
			</div>';
			unset($_SESSION['warning']);
		}
	?>


	
		<div class="jumbotron">
			<p>Time Remaining to fill the form : <span class="badge badge-primary timer"></span></p>
			<form action="details.php" method="post">
				<div class="form-group">
				    <label for="email">Name</label>
				    <input type="text" class="form-control" placeholder="Enter name" name="name" id="email" required>
				</div>
				<div class="form-group">
				    <label for="pwd">Email</label>
				    <input type="email" class="form-control" placeholder="Enter email" name="email" id="pwd" required>
				</div>
				<div class="form-group">
				    <label for="email">Date Of Birth</label>
				    <input type="date" class="form-control" placeholder="Enter DOB" name="dob" id="email" required>
				</div>
				<div class="form-group">
				    <label for="comment">About yourself</label>
  					<textarea class="form-control" rows="3" id="comment" required name="abt"></textarea>
				</div>
				<div class="form-group">
				    <label for="cap">Enter Captcha</label>
				    <div class="captcha"><i><s><?php echo $_SESSION['tempvar']; ?></s></i></div>
				    <input type="text" class="form-control" placeholder="Enter captcha" name="captcha" id="cap" required>
				</div>
				<button type="submit" class="btn btn-primary" id="butn">Submit</button>
			</form> 
		</div>
	</center>

	<script type="text/javascript">

		$(document).ready(function(){
			setInterval(function(){
				$('.timer').load('timer.php');
			},500);
		});	
	</script>
</body>
</html>