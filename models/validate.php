<?php
class Validate {
	public static function validateParameters($type, $value){
		$val = 1;
		switch($type) {
			// validate T
			case "T":
				if ($value < 1 || $value > 50) {
					$val = 50;
				}
				break;
			// validate N
			case "N":
				if (!$value >= 1 && !$value <= 100) {
					$val = 100;
				}
				break;
			// validate M
			case "M":
				if (!$value >= 1 && !$value <= 1000) {
					$val = 1000;
				}
				break;
			
		}
		// return result
		if ($val == 1) {
			return true;
		}
		else {
			$_SESSION['message'] = "El valor de ".$type." debe estar en el rango 1 a ".$val;
			return false;
		}
	}
}
?>