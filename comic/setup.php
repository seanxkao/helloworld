
<?php
	# 載入資料庫
	$database = mysqli_connect('sql100.byethost13.com', 'b13_16199199', 'lplplplp', 'b13_16199199_backtoschool') or die('Could not connect because '.mysqli_connect_error()) ;
	$database->set_charset("utf8");
	
	# 載入函式庫
	include('function.php');
	
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
	$currentPage = getPage($database, $pageid);
	$pagePath = $currentPage['path'];
	
	#無格式版本
	$currentPage['body_nohtml'] = strip_tags($currentPage['body']);
	if($currentPage['body_nohtml'] == $currentPage['body']){
		$currentPage['body_formatted'] = '<p>'.$currentPage['body'].'</p>';
	}
	else{
		$currentPage['body_formatted'] = $currentPage['body'];
	}
	
	
	#載入漫畫
	if(isset($_GET['comicId'])){
		$comicId = $_GET['comicId'];
	}
	else{
		$comicId = 1;
	}
	$currentComic = getComic($database, $comicId);
	$comicLength = $currentComic['length'];
	$comicPath = $currentComic['path'];
	$comicName = $currentComic['name'];
	
	#漫畫頁數
	if(isset($_GET['comicPage'])){
		$comicPage = $_GET['comicPage'];
	}
	else{
		$comicPage = 1;
	}
	
?>