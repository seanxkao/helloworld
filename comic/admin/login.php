<?php

	session_start();
	include('setup.php');	
?>

<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	<title>
		<?php
			echo $currentPage['title'].' | '.$SITE_TITLE;
		?>
	</title>
	
	<?php	
		include('link.php');	
	?>

</head>

<body>
	
	<?php
		if($_POST){
			$q = "SELECT * FROM users WHERE email = '$_POST[email]' AND password = SHA1('$_POST[password]')";
			$r = mysqli_query($database, $q);
			if(mysqli_num_rows($r) == 1){
				$_SESSION['username'] = $_POST['email'];
				
				header('Location: index.php');
			}
		}
	?>
	
	<div class="row">
		<div class="col-md-4 col-md-offset-3">
			<div class="panel panel-info">
				<div class="panel-heading"><h2>Log in</h2></div>
				<div class="panel-body">
					<form method='post'>
						<div class="input-group">
							<label>Email:</label>
							<input type="text" class="form-control" name="email"></input>
						</div>
						<div class="input-group">
							<label>Password:</label>
							<input type="password" class="form-control"  name="password"></input>
						</div>
						<input type='submit' value='submit'></input>
					</form>
				</div><!--End panel body-->
			</div><!-- End panel -->
		</div><!-- End col -->
	</div><!-- End row -->
	
	

	

</body>

</html>