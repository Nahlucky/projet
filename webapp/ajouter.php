<?php
	include('dbinfo.php');
	
	// Données du formulaire
	$titre = $_POST['titre'];
	$corps = $_POST['corps'];
	
	echo "titre: $titre, corps: $corps"."<BR>";
	
	try{
		$PDO = new PDO($DSN, $USER, $PASSWORD);
		
		$request = $PDO->prepare('INSERT INTO liste (titre, corps) VALUES (?, ?)');
		$request->bindValue(1, $titre);
		$request->bindValue(2, $corps);
		$request->execute();
		
		header('location:index.php');
	} catch(Exception $e) {
			header('location:error.html');
	}
	
?>
