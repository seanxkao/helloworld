<?php	
	include('setup.php');	
?>

<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8">
	
	<?php	
		include('link.php');	
	?>
	
	<title>
		<?php
			echo $currentPage['title'].' | '.$SITE_TITLE;
		?>
	</title>

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
			#如果是除錯模式(debug = 1)則開啟除錯區域
			if($debug == 1){
				echo '<br><br>DEBUG!!!<br><br>';
				echo '<br><br><pre>'.print_r(get_defined_vars()).'</pre><br><br>';
				echo '<pre>'.print_r($currentPage).'</pre>'; 
			}
		?>
	</div>
	

	<div id="theme">
		<h1><?php echo $currentPage['header']; ?></h1>
		<?php echo $currentPage['body_formatted']; ?>
		<?php 
			$allPage = getAllPage($database);
			while($page = mysqli_fetch_assoc($allPage)){
		?>
				<a <?php makeHref($page['id'], 1, 1); ?>><?php echo $page['title']; ?></a>
		<?php
			}
		?>
	</div>
	
	
	<?php
		include("pages/$pagePath.php"); 
	?>

	

</body>

</html>