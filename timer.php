<?php 
	session_start();
	$present = time();
	if(isset($_SESSION['atstart']) && isset($_SESSION['timer']))
	{
		$period = $present - $_SESSION['atstart'];
		$rem = abs($_SESSION['timer'] - $period);
		
		if($rem < 1){
		   echo "Time Up!!!!";
		   echo '<script type="text/javascript">
					document.getElementById("butn").disabled=true;
				</script>';
				unset($_SESSION['atstart']);
				unset($_SESSION['timer']);
				session_destroy();
		}
		else
		{
			echo $rem.' secs';
		}
	}
	else
	{
		 echo "Time Up!!!!";
		   echo '<script type="text/javascript">
					document.getElementById("butn").disabled=true;
				</script>';
	}
?>