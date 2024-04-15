<?php
	include('dbinfo.php');
	
	$id = $_POST['id'];
	$titre = $_POST['titre'];
	$corps = $_POST['corps'];
	
	try{
		$PDO = new PDO($DSN, $USER, $PASSWORD);
		$request = $PDO->prepare('UPDATE liste SET titre=? , corps=? WHERE id=?');
		$request->bindValue(1, $titre);
		$request->bindValue(2, $corps);
		$request->bindValue(3, $id);
		$request->execute();
		
		header('location: index.php');
	} catch( PDOException $pe){
		header('location:error.html');
	}
?>
