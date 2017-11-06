<?php
	session_start();
	$con = mysqli_connect("localhost","root","","musearch") or die
    ("No se pudo establecer con a la BD");

	if (isset($_SESSION["user"])) {
		header("Location: view/vistaAdministrador.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="css/index.css">
	<script src="js/jqery.js"></script>
	<link href="images/log.png" rel="shortcut icon" type="image/png"/>
    <title>Musearch</title>
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
	<!-- ***** ENCABEZADO ***** -->
	<div class="encabezado">
		<!-- ***** BARRA DE NAVEGACIÓN ***** -->
		<nav class="navbar navbar-default navbar-fixed-top">
	  		<div class="container">
	    		<div class="navbar-header">
	     		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        		<span class="icon-bar"></span>
	        		<span class="icon-bar"></span>
	        		<span class="icon-bar"></span>
	     		</button>
	      		<a class="navbar-brand" href="#myPage">Musearch</a>
	    		</div>
		    	<div class="collapse navbar-collapse" id="myNavbar">
		      		<ul class="nav navbar-nav navbar-right">
						<li><a href="index.php">Inicio</a></li>
						<li>
							<a href="museos.php">
							<span class="glyphicon glyphicon-search"></span> Busqueda Museos</a>
						</li>
						<li>
							<a data-toggle="modal" data-target="#sesion">
							<span class="glyphicon glyphicon-log-in"></span> Iniciar Sesión
							</a>
						</li>
		      		</ul>
		    	</div>
	  		</div>
	</nav>

	<!-- ***** JUMBOTRON ***** -->
		<div id="logo" class="jumbotron text-center">
			<h1>M u s e a r c h</h1>
			<hr>
			<p>Una web con información de museos de historia.</p>
		</div>
	</div>

	<!-- ***** CONTENIDO PRINCIPAL ***** -->
	<div class="container" id="principal">
		<div class="row">
			<div class="col-md-9">
				<h2 class="text-center hdr">¡Bienvenidos!</h2>
				<img src="images/Antropologia/antro.jpg" class="img-responsive imgP">
				<p class="justificado">
					La Ciudad de México es rica en tradiciones, solidaridad, costumbres y cultura; ésta última se muestra en cada rincón que concentra la multiculturalidad de la sociedad mexicana. La capital del país es una de las que posee la mayor cantidad de museos en el mundo, con relación a sus habitantes.
				</p>
				<hr>

				<h2 class="text-center hdr">Musearch</h2>
				<p class="justificado">
					Musearch fue creado para toda la comunidad estudiantil que cursa en nivel primaria hasta nivel bachillerato, nuestro objetivo es ayudar a todos esos alumnos con sus investigaciones o visitas a los museos de historia para que desde nuestro sitio web puedan buscar toda la información de ese museo en especifico para evitar ir hasta ese museo que esta lejos de sus casas.
				</p>
			</div>

			<div class="col-md-3">
				<h2 class="text-center hdr">Acerca</h2>
				<img src="images/logo.png" class="img-responsive"
					style="height:50px" alt="presentación">
				<p>
					Somos un grupo de estudiantes que estamos cursando el quinto cuatrimestre en la Universidad Tecnológica de Nezahualcóyotl (UTN) en la división Sistemas Informaticos Área TIC Área Sistemas Informáticos
					<br><br>
					El equipo esta conformado por:
					<ul>
						<li>Cervantes Jr Ricardo</li>
						<li>Curiel Barrera Cristina</li>
						<li>Estrada Cruz Daniel</li>
						<li>García Ortega Carlos J.</li>
						<li>Vega Galicia Jorge</li>
					</ul>
				</p>
			</div>
		</div>
		<br><br>
	</div>

	<!-- ***** CAROUSEL ***** -->
	<div class="container-fluid bg-grey">
	  	<div id="myCarousel" class="carousel slide text-center bg-grey" data-ride="carousel">
	    <!-- Indicators -->
		<ol class="carousel-indicators">
	       <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	       <li data-target="#myCarousel" data-slide-to="1"></li>
	       <li data-target="#myCarousel" data-slide-to="2"></li>
	    </ol>
	    <!-- Wrapper for slides -->
	    <div class="carousel-inner" role="listbox">
	      	<div class="item active">
	        	<h4>¿Buscas algun museo?<br>
					<span style="font-style:normal;">¡Utiliza nuestro buscador!</span>
				</h4>
	      	</div>
	      	<div class="item">
	        	<h4>Imagenes<br>
					<span style="font-style:normal;">
						¡Descubre los diferentes museos en la CDMX!
					</span>
				</h4>
	      	</div>
	      	<div class="item">
	        	<h4>¿Ubicación?<br>
				<span style="font-style:normal;">
					No te preocupes, nosotros te damos la ubicación del museo que buscas. ;)
				</span>
				</h4>
	      	</div>
	    </div>

	    <!-- Left and right controls -->
	    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
	      	<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		  	<span class="sr-only">Previous</span>
	    </a>
	    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
	      	<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
	      	<span class="sr-only">Next</span>
	    </a>
	  </div>
	</div>

	<!-- ***** FOOTER ***** -->
	<footer class="container-fluid text-center">
		<a href="#myPage" title="To Top">
			<span class="glyphicon glyphicon-chevron-up hdr"></span>
		</a>
	  	<div class="container">
			<div class="col-md-12">
				<p>
					Todas las imagenes publicadas de los museos en este sitio web son copyright de Musearch© y son únicamente para uso educativo, personal y / o no comercial para cualquier otro uso, porfavor pongase en contacto con nuestro correo electronico personal: musearch@gmail.com
				</p>
			  	<hr>
				<h3 class="hdr">Musearch © 2017<br></h3>
				<h4 class="hdr">Todos los derechos reservados.</h4>
			</div>
	  	</div>
	</footer>


	<!-- ***** MODAL ***** -->
	<div id="sesion" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<form class="" action="control/validar.php" method="post">
				<!-- ***** Contenido modal ***** -->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title text-center">Iniciar Sesión</h3>
					</div>
					<div class="modal-body">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="nombre_admi">Usuario:</label>
										<input type="text" name="nombre_admi" class="form-control" id="nombre_admi">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="contrasena_admin">Contraseña:</label>
										<input type="password" name="contrasena_admin" class="form-control" id="contrasena_admin">
									</div>
								</div>
							</div>
					</div>

					<div class="modal-footer">
						<button type="submit" name="login" value="Aceptar" class="btn btn-success">
							Iniciar Sesión
						</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</form>
		</div>
	  </div>


	<script>
	$(document).ready(function(){
	  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
	    if (this.hash !== "") {
	      event.preventDefault();
	      var hash = this.hash;
	      $('html, body').animate({
	        scrollTop: $(hash).offset().top
	      }, 900, function(){
	        window.location.hash = hash;
	      });
	    }
	  });
	  $(window).scroll(function() {
	   $(".slideanim").each(function(){
		 var pos = $(this).offset().top;
		 var winTop = $(window).scrollTop();
		   if (pos < winTop + 600) {
			 $(this).addClass("slide");
		   }
	   });
	 });
	})
</script>


<!-- JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>

</html>
