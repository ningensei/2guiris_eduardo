$('#formContacto').on('submit', function(e) {
	e.preventDefault();
	$.post(baseURL+'contacto/post', $(this).serialize(), function(res) {
		if(res.status == 'success') {
			swal("Éxito", "Hemos recibido su mensaje, gracias por contactarse", "success");

		} else {
			swal("Error", res.msg, "error");
		}
	}, 'json');
});