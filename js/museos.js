function lista_museos(valor) {
	$.ajax({

		url:'control/museos.php',
		type:'POST',
		data:'valor='+valor+'&boton=buscar'

	}).done(function(resp){
		//alert(resp);
		var valores = eval(resp);

		html="<div class='container' id='principal'><div class='row'>"

		for(i=0;i<valores.length;i++){
			html+="<div class='col-md-12'><div class='col-md-4'><h3 class='hdr'><b>"+valores[i][1]+"</b></h3><img class='img-responsive' src='images/"+valores[i][9]+"' alt='logo'></div><div class='col-md-8'><br><br><div class='row'><div class='col-md-12'><h3>Descripción</h3><p class='justificado'>" +valores[i][2]+"<p></div><div class='col-md-12'><h3>Dirección</h3><p>Colonia: " +valores[i][3]+ "</p><p>Calle: "+valores[i][4]+"</p><p>Número: #"+valores[i][5]+"</p><p>Teléfono: "+valores[i][6]+"</p></div></div></div></div>";
		}

		html+="</div></div>"

		$("#lista").html(html);
	});
}
