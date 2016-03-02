
<?php
	# 載入資料庫
	$database = mysqli_connect('localhost', 'seanxkao', 'lplplplp', 'NewDatabase') or die('Could not connect because '.mysqli_connect_error()) ;
	$database->set_charset("utf8");
	
	# 載入函式庫
	include('../function.php');
	
	# 常數
	$SITE_TITLE = 'Sean&Amber';
	
	
	# 取得網頁編號page
	if(isset($_GET['page'])){
		$pageid = $_GET['page'];
	}
	else{
		$pageid = 1;
	}
	#從資料庫中載入動態網頁
	$currentPage = getAdminPage($database, $pageid);
	$pagePath = $currentPage['path'];

	
?>