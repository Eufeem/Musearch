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
	<script src="../js/jqery.js"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" type="text/css" href="../css/adm.css">
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
				<li><a class="btn btn-default active" href="vistaMuseo.php">Museos</a></li><br>
		        <li><a class="btn btn-default" href="vistaPiezas.php">Piezas</a></li><br>
				<li><a class="btn btn-default" href="vistaSala.php">Salas</a></li><br>
		        <li><a class="btn btn-default" href="vistaServicios.php">Servicios</a></li><hr>
		    </ul>
		</div>
	</div>

	<!-- Contenido -->
	<div class="col-md-9"><br>
		<div class="container">
			<h2 class="text-center">Gestión de Museos</h2>
			<!-- ***** Modal Agrega ***** -->
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar">
				<span class="glyphicon glyphicon-plus"></span>&nbsp; Agregar Museo
			</button><hr>

			<!-- ***** Consulta ***** -->
			<?php
				include '../model/Museo.php';
				$museo = new Museo();
				$museo->consultaMuseo();
				$museo->cerrar();
			?>
		</div>
	</div>

	<!-- ***** Modal Agregar *****  -->
	<div id="agregar" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<form action="../control/CtrlMuseo.php" method="post" enctype="multipart/form-data">
				<!-- Contenido -->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title text-center">Agregar nuevo museo</h3>
					</div>
					<div class="modal-body">
						<!-- Formulario -->
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="nombre_museo">Museo:</label>
									<input type="text" name="nombre_museo" class="form-control"
	                                        id="nombre_museo" required >
								</div>
								<div class="form-group">
									<label for="servicio_museo">Servicio:</label>
									<select class="form-control" required name="nombre_servicio"
											id="nombre_servicio">
										<option selected="selected" disabled="disabled">
											---------- Seleccione ----------
										</option>
								        <?php
											$museo->consultaSer();
										?>
								     </select>
								</div>
								<div class="form-group">
									<label for="costo">Costo Servcio:</label>
									<input type="number" name="costo" class="form-control"
	                                        id="costo" required >
								</div>
								<div class="form-group">
									<label for="telefono_museo">Teléfono:</label>
									<input type="number" name="telefono_museo" class="form-control"
	                                        id="telefono_museo" required >
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="colonia_museo">Colonia:</label>
									<input type="text" name="colonia_museo" class="form-control"
											id="colonia_museo" required>
								</div>
								<div class="form-group">
									<label for="calle_museo">Calle:</label>
									<input type="text" name="calle_museo" class="form-control"
	                                        id="calle_museo" required >
								</div>
								<div class="form-group">
									<label for="numero_museo"># Número:</label>
									<input type="number" name="numero_museo" class="form-control"
	                                        id="numero_museo" min="1" max="200" required >
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="descripcion_museo">Descripción:</label>
									<textarea class="form-control" id="descripcion_museo" name="descripcion_museo" required rows="4"></textarea>
								</div>
							</div>
						</div>
						<!-- Subida de imagen -->
						<div class="row">
							<div class="col-md-12">
								<label for="imagen">Imagen</label>
								<input type="file" name="imagen" size="20" required>
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
			<form action="../control/CtrlMuseo.php" method="post">
				<!-- Contenido -->
				<div class="modal-content">
				    <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
				        <h3 class="modal-title text-center">Borrar Museo</h3>
				    </div>
				    <div class="modal-body">
				        <!-- Formulario -->
				            <div class="row">
				                <div class="col-md-12">
				                    <div class="form-group">
										<h2 id="mensaje" class="text-center"></h2>
										<input type="hidden" id="id_museo" name="id_museo" value="0" />
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

	<!-- ***** Modal Modifica *****  -->
	<div id="modificar" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<form action="../control/CtrlMuseo.php" method="post" enctype="multipart/form-data">
				<!-- Contenido -->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title text-center">Modificar museo</h3>
					</div>
					<div class="modal-body">
						<!-- Formulario -->
						<div class="row">
							<input type="hidden" id="id_museoM" name="id_museoM" value="" />
							<div class="col-md-6">
								<div class="form-group">
									<label for="nombre_museoM">Museo:</label>
									<input type="text" name="nombre_museoM" class="form-control"
	                                        id="nombre_museoM" required >
								</div>
								<div class="form-group">
									<label for="servicio_museoM">Servicio:</label>
									<select class="form-control" required name="nombre_servicioM"
											id="nombre_servicioM">
										<option>
											---------- Seleccione ----------
										</option>
								        <?php
											$museo->consultaSer();
										?>
								     </select>
								</div>
								<div class="form-group">
									<label for="costoM">Costo Servcio:</label>
									<input type="number" name="costoM" class="form-control"
	                                        id="costoM" required >
								</div>
								<div class="form-group">
									<label for="telefono_museoM">Teléfono:</label>
									<input type="number" name="telefono_museoM" class="form-control"
	                                        id="telefono_museoM" required >
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="calle_museoM">Calle:</label>
									<input type="text" name="calle_museoM" class="form-control"
	                                        id="calle_museoM" required >
								</div>
								<div class="form-group">
									<label for="colonia_museoM">Colonia:</label>
									<input type="text" name="colonia_museoM" class="form-control"
	                                        id="colonia_museoM" required>
								</div>
								<div class="form-group">
									<label for="numero_museoM"># Número:</label>
									<input type="number" name="numero_museoM" class="form-control"
	                                        id="numero_museoM" min="1" max="200" required >
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="descripcion_museoM">Descripción:</label>
									<textarea class="form-control" id="descripcion_museoM" name="descripcion_museoM" required rows="4" id="comment"></textarea>
								</div>
							</div>
						</div>
						<!-- Subida de imagen -->
						<div class="row">
							<div class="col-md-12">
								<label for="imagen">Imagen</label>
								<input type="file" name="imagen" size="20" required>
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


	<!-- ***** Modal Detalles *****  -->
	<div id="detallesMuseo" class="modal fade" role="dialog">
		<div class="modal-dialog">
				<!-- Contenido -->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title text-center">Detalles museo</h3>
					</div>
					<div class="modal-body">
						<!-- Formulario -->
							<div class="row">
								<div class="col-md-6">
									<h4 id="dNombre" name="dNombre"></h4>
									<h4 id="dServicio" name="dServicio"></h4>
									<h4 id="dCosto" name="dCosto"></h4>
									<h4 id="dTelefono" name="dTelefono"></h4>
								</div>

								<div class="col-md-6">
									<h4 id="dColonia" name="dColonia"></h4>
									<h4 id="dCalle" name="dCalle"></h4>
									<h4 id="dNumero" name="dNumero"></h4>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<h4 id="dDescripcion" name="dDescripcion"></h4>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<h4 id="dImagen" name="dImagen"></h4>
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
