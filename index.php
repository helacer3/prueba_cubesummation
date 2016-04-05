<html>
	<head>
		<title>Prueba Cube Summation</title>
		<link rel="stylesheet" type="text/css" href="css/default.css">
	</head>
	<body>
		<div id="con_mensaje"></div>
		<div id="con_parametriza">
			<form id="frm_parametriza" action="#" method="post">
				<label>Cantidad de pruebas: </label>
				<input type="number" name="cnt_test" id="cnt_test" min="1" max="50" required><br />
				<label>Dimensión Matriz y cantidad de operaciones: </label>
				<input type="text" name="inf_matriz" id="inf_matriz" required><br />
				<input type="submit" name="snd_info" value="generar matriz">
			</form><br /><br />
		</div>
		<div id="con_consultas">
			<form id="frm_consultas" action="#" method="post">
				<label>Digite sus consultas: </label>
				<input type="text" name="txt_query" id="txt_query" value="" required>
				<input type="submit" name="snd_query" value="ejecutar consulta">
			</form>
		</div>
		<div id="con_resultados"></div>
		<script type="text/javascript" src="js/jquery-1.12.2.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>