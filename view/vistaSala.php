<?php
	session_start();
	if (isset($_SESSION["user"])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" type="text/css" href="../css/adm.css">
	<script src="../js/jqery.js"></script>
	<link href="../images/log.png" rel="shortcut icon" type="image/png"/>
    <title>Administración</title>
</head>

<body id="myPage" class="bg-grey" data-spy="scroll" data-target=".navbar" data-offset="60">
	<!-- Barra de navegación lateral -->
	<nav class="navbar menu navbar-inverse navbar-fixed-top">
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
					<li><a href="../control/logout.php">
						<span class="glyphicon glyphicon-log-out"></span> Cerrar Sesión</a>
					</li>
				</ul>
			</div>
		</div>
	</nav><br><br>

	<!-- Navegación Lateral -->
	<div class="lateral">
		<div class="col-md-3"><br><br>
		    <img src="../images/logo.png" style="height:50px; margin:auto;" class="img-responsive" alt="musearch"><hr>
		    <ul class="nav" role="tablist">
		        <li><a class="btn btn-default" href="vistaAdministrador.php">Administradores</a></li><br>
				<li><a class="btn btn-default" href="vistaMuseo.php">Museos</a></li><br>
		        <li><a class="btn btn-default" href="vistaPiezas.php">Piezas</a></li><br>
				<li><a class="btn btn-default active" href="#">Salas</a></li><br>
		        <li><a class="btn btn-default" href="vistaServicios.php">Servicios</a></li><hr>
		    </ul>
		</div>
	</div>

	<!-- Contenido -->
	<div class="col-md-9"><br>
		<div class="container">
			<h2 class="text-center">Gestión de Salas</h2>
			<!-- ***** Modal Agrega ***** -->
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar">
				<span class="glyphicon glyphicon-plus"></span>&nbsp; Agregar Sala
			</button><hr>

			<!-- ***** Consulta ***** -->
			<?php
				include '../model/Sala.php';
				$sala = new Sala();
				$sala->consultaSala();
				$sala->cerrar();
			?>
		</div>
	</div>

	<!-- ***** Modal Agregar *****  -->
	<div id="agregar" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<form action="../control/CtrlSala.php" method="post">
				<!-- Contenido -->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title text-center">Agregar Sala</h3>
					</div>
					<div class="modal-body">
						<!-- Formulario -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="nombre_sala">Sala:</label>
										<input type="text" name="nombre_sala" class="form-control"
		                                        id="nombre_sala" required autofocus>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label for="id_museo">Museo:</label>
                                        <select class="form-control" required name="id_museo"
    											id="id_museo">
    										<option selected="selected" disabled="disabled">
    											---------- Seleccione ----------
    										</option>
    								        <?php
    											$sala->consultaMuseo();
    										?>
    								     </select>
									</div>
                                </div>

								<div class="col-md-12">
									<div class="form-group">
										<label for="descripcion_sala">Descripción:</label>
										<textarea class="form-control" id="descripcion_sala" name="descripcion_sala" required rows="3"></textarea>
									</div>
								</div>
							</div>
					</div>
					<!-- ***** Pie de modal ***** -->
					<div class="modal-footer">
						<button type="submit" name='i' value="Registrar" class="btn btn-success">
							<span class="glyphicon glyphicon-plus"></span>&nbsp; Agregar
						</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<!-- ***** Modal Eliminar *****  -->
	<div id="borrar" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<form action="../control/CtrlSala.php" method="post">
				<!-- Contenido -->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title text-center">Borrar Sala</h3>
					</div>
					<div class="modal-body">
						<!-- Formulario -->
							<div class="row">
								<div class="col-md-12">
									<h2 id="mensaje" class="text-center"></h2>
										<input type="hidden" id="id_sala" name="id_sala" value="0" />
								</div>
							</div>
					</div>
					<!-- ***** Pie de modal ***** -->
					<div class="modal-footer">
						<button type="submit" name='e' value="Eliminar" class="btn btn-success">
							<span class="glyphicon glyphicon-trash"></span>&nbsp; Eliminar
						</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</form>
		</div>
	</div>

	<!-- ***** Modal Modificar *****  -->
	<div id="modificar" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<form action="../control/CtrlSala.php" method="post">
				<!-- Contenido -->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title text-center">Modificar Sala</h3>
					</div>
					<div class="modal-body">
						<!-- Formulario -->
							<div class="row">
								<input type="hidden" id="id_salaM" name="id_salaM" value="0" />
								<div class="col-md-6">
									<div class="form-group">
										<label for="nombre_salaM">Sala:</label>
										<input type="text" name="nombre_salaM" class="form-control"
		                                        id="nombre_salaM" required autofocus>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label for="id_museoM">Museo:</label>
                                        <select class="form-control" required name="id_museoM"
    											id="id_museoM">
    										<option>
    											---------- Seleccione ----------
    										</option>
    								        <?php
    											$sala->consultaMuseo();
    										?>
    								     </select>
									</div>
                                </div>

								<div class="col-md-12">
									<div class="form-group">
										<label for="descripcion_salaM">Descripción:</label>
										<textarea class="form-control" id="descripcion_salaM" name="descripcion_salaM" required rows="3"></textarea>
									</div>
								</div>
							</div>
					</div>
					<!-- ***** Pie de modal ***** -->
					<div class="modal-footer">
						<button type="submit" name='m' value="Registrar" class="btn btn-success">
							<span class="glyphicon glyphicon-pencil"></span>&nbsp; Modificar
						</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</form>
		</div>
	</div>



<script src="../js/funciones.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
<?php
	} else {
		echo '<script>alert("Debe iniciar sesión");</script>';
		echo '<script> window.location="../index.php"; </script>';
	}
?>
