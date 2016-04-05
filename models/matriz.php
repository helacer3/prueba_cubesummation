<?php
class matriz {	
	/*
	* Create Matriz Method
	*/
	public function createMatriz() {
		$n = $_SESSION['n'];
		$matriz = array();
		for($x=1;$x<$n;$x++) {
			for($y=1;$y<$n;$y++) {
				for($z=1;$z<$n;$z++) {
					$matriz[$x][$y][$z] = 0;
				}
			}
		}
		$_SESSION['message'] = "Matriz creada correctamente";
		$_SESSION['matriz'] = $matriz;
	}
	/*
	* Update Matriz Method
	*/
	public function updateMatriz($x,$y,$z,$valor) {
		$matriz = $_SESSION['matriz'];
		if (array_key_exists($x,$matriz)) {
			if (array_key_exists($y,$matriz[$x])) {			
				if (array_key_exists($z,$matriz[$x][$y])) {
					$_SESSION['message'] = "Posicion de la matriz actualizada";
					return $_SESSION['matriz'][$x][$y][$z] = $valor;
				}
			}
		}
		$_SESSION['message'] = "No existe la posición de la matriz; razón por la cual, no se realizó el Update.";
	}
	/*
	* Query Matriz Method
	*/
	public function queryMatriz($ix,$iy,$iz,$fx,$fy,$fz) {
		$suma = 0;
		for($x=$ix;$x<=$fx;$x++) {
			for($y=$iy;$y<=$fy;$y++) {
				for($z=$iz;$z<=$fz;$z++) {
					//echo $x."-".$y."-".$z."-".$_SESSION['matriz'][$x][$y][$z]."\n";
					$suma += (int)@$_SESSION['matriz'][$x][$y][$z];
				}
			}
		}
		$_SESSION['message'] = "Se ejecutó el cálculo del query correctamente";
		return $suma;
	}
	/*
	* Run Query Matriz Method
	*/
	public function runQueryMatriz($query) {
		$arrquery = explode(" ",$query);		
		if (stripos($query,"UPDATE") === 0){
			$this->updateMatriz($arrquery[1],$arrquery[2],$arrquery[3],$arrquery[4]);
			return $arrquery[4];
		} else if (stripos($query,"QUERY") === 0) {
			return $this->queryMatriz($arrquery[1],$arrquery[2],$arrquery[3],$arrquery[4],$arrquery[5],$arrquery[6]);			
		} else {
			$_SESSION['message'] = "El query digitado es incorrecto. Favor regrese e intente nuevamente";
			return 0;			
		}
	}
}
?>