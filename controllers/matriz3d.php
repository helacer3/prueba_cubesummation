<?php
include_once ("models/validate.php");
include_once ("models/matriz.php");
class Matriz3d {	
	/*
	* SetVars Method
	*/
	function setVars() {
		// Get / Post vars
		$cnt_test = $_POST['cnt_test'];
		$inf_matriz = $_POST['inf_matriz'];
		// Set Session Message
		$_SESSION['message'] = "";
		// Set class vars.
		if ($this->settest($cnt_test)) {
			if ($this->setnym($inf_matriz)) {
				// Instance Class.
				$matriz = new matriz;
				// Call Method.
				$resultado = $matriz->createMatriz();
				return 	array (						
					'value' => 1,				
					'return' => true,
					'mensaje'=> $_SESSION['message'],
				);
			}
		}		
		return 	array (					
			'value' => 2,	
			'return' => false,
			'mensaje'=> $_SESSION['message'],
		);
	}
	/*
	* Set Test Method
	*/
	function settest($value) {
		if (Validate::validateParameters("T",$value) === true) {
			$_SESSION['test'] = $value;
			return true;
		}
		else {
			return false;
		}
	}
	/*
	* Set N Method
	*/
	function setn($value) {
		if (Validate::validateParameters("N",$value) === true) {
			$_SESSION['n'] = $value;
			return true;
		}
		else {
			return false;
		}
	}
	/*
	* Set M Method
	*/
	function setm($value) {
		if (Validate::validateParameters("M",$value) === true) {
			$_SESSION['m'] = $value;
			return true;
		}
		else {
			return false;
		}
	}
	
	/*
	* Set NyM Method
	*/
	function setnym($value) {
		$params = explode(" ",$value);
		if (count($params) == 2) {
			$this->setn($params[0]);
			$this->setm($params[1]);
			return true;
		} else {
			$_SESSION['message'] = "Debe digitar los valores de la dimension de la matriz y cantidad de operaciones separada por un espacio Ejemplo: 2 4";
			return false;
		}
	}
	
	/*
	* Set Query Matriz Method
	*/
	function setQueryMatriz() {
		// Get / Post vars
		$txt_query = trim($_POST['txt_query']);
		// Instance Class.
		$matriz = new matriz;
		// Call Method.
		$resultado = $matriz->runQueryMatriz($txt_query);
		return 	array (
			'value' => 1,
			'mensaje'=> $_SESSION['message'],
			'resultado'=> $resultado
		);	
	}
}
?>