$(function() {
	$('#frm_parametriza').submit(function() {
		event.preventDefault();
		$.ajax({
			data:  {
				cnt_test: $("#cnt_test").val(),
				inf_matriz: $("#inf_matriz").val(),
				pag: 1
			},
			url:   'matriz.php',
			type:  'post',
			beforeSend: function () {
					$("#con_mensaje").html("Procesando, espere por favor...");
			},
			success:  function (response) {
				var obj = $.parseJSON(response);		
				
				if (obj.value == 1) {
					$("#con_consultas").show();
				}
				else {
					$("#con_consultas").hide();
				}
				$("#con_mensaje").html(obj.mensaje);
			}
        });
	});
	$('#frm_consultas').submit(function() {
		event.preventDefault();
		$.ajax({
			data:  {
				txt_query: $("#txt_query").val(),
				pag: 2
			},
			url:   'matriz.php',
			type:  'post',
			beforeSend: function () {
					$("#con_mensaje").html("Procesando, espere por favor...");
			},
			success:  function (response) {
				var obj = $.parseJSON(response);		
				
				if (obj.value == 1) {
					$("#con_resultados").append("<br />"+obj.resultado);
					$("#con_mensaje").html(obj.mensaje);
				}
				else {
					$("#con_mensaje").html(obj.mensaje);
				}
			}
        });
	});
});
