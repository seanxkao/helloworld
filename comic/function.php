<?php 

	function getPage($database, $pageid){
		$q = "SELECT * FROM pages WHERE id=$pageid";
		$r = mysqli_query($database, $q);
		return mysqli_fetch_assoc($r);
	}

	function getAllPage($database){
		$q = "SELECT * FROM pages";
		$r = mysqli_query($database, $q);
		return $r;
	}
	
	function getAdminPage($database, $pageid){
		$q = "SELECT * FROM admin WHERE id=$pageid";
		$r = mysqli_query($database, $q);
		return mysqli_fetch_assoc($r);
	}

	function getAllAdminPage($database){
		$q = "SELECT * FROM Admin";
		$r = mysqli_query($database, $q);
		return $r;
	}

	function getSetting($database, $id){
		$q = "SELECT * FROM settings WHERE id='$id'";
		$r = mysqli_query($database, $q);
		$debug = mysqli_fetch_assoc($r);
		return $debug['value'];
	}
	function getUser($database, $id){
		$q = "SELECT * FROM users WHERE email = '$id'";
		$r = mysqli_query($database, $q);
		$user = mysqli_fetch_assoc($r);
		return $user;
	}
	function getAllUser($database){
		$q = "SELECT * FROM users";
		$r = mysqli_query($database, $q);
		return $r;
	}
	
	function getComic($database, $comicId){
		$q = "SELECT * FROM comics WHERE id = '$comicId'";
		$r = mysqli_query($database, $q);
		$comic = mysqli_fetch_assoc($r);
		return $comic;
	}
	function getAllComic($database){
		$q = "SELECT * FROM comics";
		$r = mysqli_query($database, $q);
		return $r;
	}
	
	function makeHref($page, $comicId , $comicPage){
		echo "href=\"?page=$page&comicId=$comicId&comicPage=$comicPage\" ";
	}
	
	function makeAdminHref($page){
		echo "href=\"?page=$page\" ";
	}
	
	function makeDisabled($bool){
		if($bool){
			echo 'disabled';
		}
	}

?>