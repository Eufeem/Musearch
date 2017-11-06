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

<body onload="lista_museos('');">
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
	      		<a class="navbar-brand" href="index.php">Musearch</a>
	    		</div>
		    	<div class="collapse navbar-collapse" id="myNavbar">
		      		<ul class="nav navbar-nav navbar-right">
						<li><a href="index.php">Inicio</a></li>
						<li><a href="museos.php">
							<span class="glyphicon glyphicon-search"></span> Busqueda Museos</a></li>
						<li><a data-toggle="modal" data-target="#sesion">
							<span class="glyphicon glyphicon-log-in"></span> Iniciar Sesión</a>
						</li>
		      		</ul>
		    	</div>
	  		</div>
	</nav>

	<!-- ***** JUMBOTRON ***** -->
		<div id="logo" class="jumbotron text-center">
			<h1>M u s e a r c h</h1>
			<hr>
			<p>Una web con diferentes museos de historia.</p>
		</div>
	</div>

	<!-- ***** CONTENIDO PRINCIPAL ***** -->
	<div class="container" id="principal">
		<div class="row">
            <!-- ***** BUSQUEDA ***** -->
            <div class="form-group">
                <div class="col-md-4 col-sm-12">

                </div>
                <div class="col-md-4 col-sm-12 text-center">
                    <label for="buscar" class="control-label">Buscar:</label>
					<div class="input-group">
						<input  type="text" name="buscar" id="buscar" class="form-control"
						onkeyup="lista_museos(this.value);" placeholder="Buscar por museo, descripcion y colonia"/>
						<div class="input-group-btn">
						<button class="btn btn-default" type="">
							<i class="glyphicon glyphicon-search"></i>
						</button>
						</div>
					</div>
                </div>
            </div>
		</div>
		<hr>
		<div class="row">
			<div class="form-group">
                <div id="lista"></div>
            </div>
		</div>
		<br><br>
	</div>


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


<!-- JavaScript -->
<script src="js/museos.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
