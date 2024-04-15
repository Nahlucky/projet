<?php
	include('dbinfo.php');
	
	$id = $_POST['supprId'];
	
	try{
		$PDO = new PDO($DSN, $USER, $PASSWORD);
		$request = $PDO->prepare('DELETE FROM liste WHERE id=?');
		$request->bindValue(1, $id);
		$request->execute();
		
		header('location: index.php');
	} catch( PDOException $pe){
		header('location:error.html');
	}
?>
