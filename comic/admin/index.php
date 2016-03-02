<?php
	include('setup.php');	
?>

<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header('Location: login.php');
	}
	$currentUser = getUser($database, $_SESSION['username']);
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
		$debug = getSetting($database, 'debugStatus');
		if($debug == 1){
			echo '<button id="btnDebug">Debug</button>';
		}
	?>

	
	<div id="divDebug">
		<?php
			#除錯區域
			if($debug == 1){
				echo '<br><br>DEBUG!!!<br><br>';
				echo '<br><br><pre>'.print_r(get_defined_vars()).'</pre><br><br>';
				echo '<pre>'.print_r($currentPage).'</pre>'; 
			}
		?>
	</div>
	
	<div id="theme" >
		<h1><?php echo $currentPage['header']; ?></h1>
		<p><?php echo 'Welcome! '.$currentUser['first'].$currentUser['last'];?></p>
		
			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					<ul class="nav navbar-nav">
						<?php
							$allPage = getAllAdminPage($database); 
							while($page = mysqli_fetch_assoc($allPage)){
						?>
								<li><a <?php makeAdminHref($page['id']); ?>><?php echo $page['title']; ?></a><li>
						<?php
							}
						?>
					</ul>
				</div>
				<div class="pull-right">
					<ul class="nav navbar-nav">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown<span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="logout.php">LogOut</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		
	</div>
	
	<?php
		include("pages/$pagePath.php"); 
	?>

	

</body>

</html>