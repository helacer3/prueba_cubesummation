<?php
/*ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);*/
include_once ("controllers/matriz3d.php");

// Session Start
session_start();

// Instance class.
$Matriz3d = new Matriz3d;

// Form Parameters
if ((int)$_POST['pag'] == 1) {
	// Get Principal Method.
	$result = $Matriz3d->setVars();
	// Show result.
	echo json_encode($result);	

	// Form Queries
}else if ((int)$_POST['pag'] == 2) {
	if ($_SESSION['m'] == 0) {
		$_SESSION['message'] = "Ha llegado al tope, del numero de consultas permitidas";
		echo json_encode(
			array(
				'value' => 2,
				'mensaje'=> $_SESSION['message']
			)
		);
	} else {
		$_SESSION['m']--;
		// Get Method Queries.
		$rstQuery = $Matriz3d->setQueryMatriz();
		echo json_encode($rstQuery);
	}
}
?>