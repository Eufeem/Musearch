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
		        <li><a class="btn btn-default active" href="vistaAdministrador.php">Administradores</a></li><br>
				<li><a class="btn btn-default" href="vistaMuseo.php">Museos</a></li><br>
		        <li><a class="btn btn-default" href="vistaPiezas.php">Piezas</a></li><br>
				<li><a class="btn btn-default" href="vistaSala.php">Salas</a></li><br>
		        <li><a class="btn btn-default" href="vistaServicios.php">Servicios</a></li><hr>
		    </ul>
		</div>
	</div>

	<!-- Contenido -->
	<div class="col-md-9"><br>
		<div class="container">
			<h2 class="text-center">Gestión de Administradores</h2>
			<!-- ***** Modal Agrega ***** -->
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar">
				<span class="glyphicon glyphicon-plus"></span>&nbsp; Agregar Administrador
			</button><hr>

			<!-- ***** Consulta ***** -->
			<?php
				include '../model/Administrador.php';
				$adm = new Administrador();
				$adm->consultaAdm();
				$adm->cerrar();
			?>
		</div>
	</div>

	<!-- ***** Modal Modifica *****  -->
	<div id="modificarAdministrador" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<form action="../control/CtrlAdministrador.php" method="post">
				<!-- Contenido -->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title text-center">Modificar administrador</h3>
					</div>
					<div class="modal-body">
						<!-- Formulario -->
							<div class="row">
								<input type="hidden" id="id_admiM" name="id_admiM" value="" />
								<div class="col-md-6">
									<div class="form-group">
										<label for="nombre_admiM">Nombre:</label>
										<input type="text" name="nombre_admiM" class="form-control"
												id="nombre_admiM" required>
									</div>
									<div class="form-group">
										<label for="contrasena_adminM">Contraseña:</label>
										<input type="text" name="contrasena_adminM" class="form-control"
												id="contrasena_adminM" required>
									</div>
									<div class="form-group">
										<label for="direccion_admiM">Dirección:</label>
										<input type="text" name="direccion_admiM" class="form-control"
												id="direccion_admiM" required>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="correo_admiM">Correo:</label>
										<input type="email" name="correo_admiM" class="form-control"
												id="correo_admiM" required>
									</div>
									<div class="form-group">
										<label for="telefono_admiM">Teléfono(8-10 digitos):</label>
										<input type="number" name="telefono_admiM" class="form-control"
												id="telefono_admiM" min="10000000" max="9999999999" required>
									</div>
								</div>
							</div>
					</div>
					<!-- ***** Pie de modal ***** -->
					<div class="modal-footer">
						<button type="submit" name='m' value="Modificar" class="btn btn-success">
							<span class="glyphicon glyphicon-pencil"></span>&nbsp; Modificar
						</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</form>
		</div>
	</div>


	<!-- ***** Modal Agregar *****  -->
	<div id="agregar" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<form action="../control/CtrlAdministrador.php" method="post">
				<!-- Contenido -->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title text-center">Agregar Administrador</h3>
					</div>
					<div class="modal-body">
						<!-- Formulario -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="nombre_admi">Nombre:</label>
										<input type="text" name="nombre_admi" class="form-control"
		                                        id="nombre_admi" required autofocus>
									</div>
									<div class="form-group">
										<label for="contrasena_admin">Contraseña:</label>
										<input type="text" name="contrasena_admin" class="form-control"
		                                        id="contrasena_admin" required>
									</div>
		                            <div class="form-group">
										<label for="direccion_admi">Dirección:</label>
										<input type="text" name="direccion_admi" class="form-control"
		                                        id="direccion_admi" required>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="correo">Correo:</label>
										<input type="email" name="correo_admi" class="form-control"
		                                        id="correo_admi" required>
									</div>
		                            <div class="form-group">
										<label for="telefono_admi">Teléfono(8-10 digitos):</label>
										<input type="number" name="telefono_admi" class="form-control"
		                                        id="telefono_admi" min="10000000" max="9999999999" required>
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

	<!-- ***** Modal Borrar *****  -->
	<div id="borrar" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<form action="../control/CtrlAdministrador.php" method="post">
				<!-- Contenido -->
				<div class="modal-content">
				    <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h3 class="modal-title text-center">Borrar Administrador</h3>
				    </div>
				    <div class="modal-body">
				        <!-- Formulario -->
				            <div class="row">
				                <div class="col-md-12">
				                    <div class="form-group">
										<h2 id="mensajeB" class="text-center"></h2>
										<input type="hidden" id="id_admi" name="id_admi" value="0" />
				                	</div>
				            	</div>
				    		</div>
				    <!-- ***** Pie de modal ***** -->
				    <div class="modal-footer">
				        <button type="submit" name="e" value="Eliminar" class="btn btn-success">
				            <span class="glyphicon glyphicon-trash"></span>&nbsp; Borrar
				        </button>
				        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
				    </div>
					</div>
				</div>
			</form>
		</div>
	</div>


	<!-- ***** Modal Detalles *****  -->
	<div id="detallesAdministrador" class="modal fade" role="dialog">
		<div class="modal-dialog">
				<!-- Contenido -->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title text-center">Detalles administrador</h3>
					</div>
					<div class="modal-body">
						<!-- Formulario -->
							<div class="row">
								<div class="col-md-6">
									<h4 id="dNombre" name="dNombre"></h4>
									<h4 id="dContrasena" name="dContrasena"></h4>
									<h4 id="dDireccion" name="dDireccion"></h4>
								</div>

								<div class="col-md-6">
									<h4 id="dCorreo" name="dCorreo"></h4>
									<h4 id="dTelefono" name="dTelefono"></h4>
								</div>
							</div>
					</div>
					<!-- ***** Pie de modal ***** -->
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
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
