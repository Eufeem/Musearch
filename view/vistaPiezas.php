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

	<!-- ***** Script que se ejecuta al cambiar los select de las tablas ***** -->
	<script>
        function showPieza(str) {
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }

                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                };

                xmlhttp.open("GET","getPieza.php?q="+str,true);
                xmlhttp.send();
            }
        }

		// ***** Script que se ejecuta al cambiar de museo en el select *****
		function showSala(str) {
            if (str == "") {
                document.getElementById("txtSala").innerHTML = "";
                return;
            } else {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }

                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtSala").innerHTML = this.responseText;
                    }
                };

                xmlhttp.open("GET","getSala.php?s="+str,true);
                xmlhttp.send();
            }
        }

    </script>
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

	<!-- ***** Navegación Lateral ***** -->
	<div class="lateral">
		<div class="col-md-3"><br><br>
		    <img src="../images/logo.png" style="height:50px; margin:auto;" class="img-responsive" alt="musearch"><hr>
		    <ul class="nav" role="tablist">
		        <li><a class="btn btn-default" href="vistaAdministrador.php">Administradores</a></li><br>
				<li><a class="btn btn-default" href="vistaMuseo.php">Museos</a></li><br>
		        <li><a class="btn btn-default active" href="#">Piezas</a></li><br>
				<li><a class="btn btn-default" href="vistaSala.php">Salas</a></li><br>
		        <li><a class="btn btn-default" href="vistaServicios.php">Servicios</a></li><hr>
		    </ul>
		</div>
	</div>

	<!-- ***** Contenido ***** -->
	<?php
		include '../model/Piezas.php';
		$p = new Piezas();
	?>

	<div class="col-md-9"><br>
		<div class="container">
			<h2 class="text-center">Gestión de Piezas</h2>
			<!-- ***** Modal Agrega ***** -->
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar">
				<span class="glyphicon glyphicon-plus"></span>&nbsp; Agregar Pieza
			</button><hr>


			<form class="" action="index.html" method="post">
				<div class="col-md-4">
					<div class="form-group">
						<label for="id_museo">Museo:</label>
						<select class="form-control" required name="id_museo"
								id="id_museo" onchange="showSala(this.value)">
							<option selected="selected" disabled="disabled" value="">Seleccione un museo</option>
							<?php
								$p->consultaMuseo();
							?>
						 </select>
					</div>
				</div>

				<div class="col-md-4">
					<div id="txtSala">
						<div class="form-group">
							<label for="tipo_pieza">Sala:</label>
							<select class="form-control" name="pieza"required name="id_sala"
									id="id_sala" onchange="showPieza(this.value)">
								<option  selected="selected" disabled="disabled" value="">Seleccione la sala</option>
							 </select>
						</div>
					</div>
				</div>
			</form>

			<!-- ***** Consulta ***** -->
			<div id="txtHint"></div>

		</div>
	</div>

	<!-- ***** Modal Agregar *****  -->
	<div id="agregar" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<form action="../control/CtrlPieza.php" method="post">
				<!-- Contenido -->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title text-center">Agregar Pieza</h3>
					</div>
					<div class="modal-body">
						<!-- Formulario -->
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="nombre_pieza">Nombre:</label>
										<input type="text" name="nombre_pieza" class="form-control" id="nombre_pieza" required autofocus="nombre_servicio">
									</div>
									<div class="form-group">
										<label for="descripcion_pieza">Descripción:</label>
										<input type="text" name="descripcion_pieza" class="form-control" id="descripcion_pieza" required>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="tipo_pieza">Tipo:</label>
										<input type="text" name="tipo_pieza" class="form-control" id="tipo_pieza">
									</div>
                                    <div class="form-group">
										<label for="tipo_pieza">Sala:</label>
                                        <select class="form-control" required name="id_sala"
    											id="id_sala">
    										<option selected="selected" disabled="disabled">
    											---------- Seleccione ----------
    										</option>
    								        <?php
    											$p->consultaSala();
    										?>
    								     </select>
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
			<form action="../control/CtrlPieza.php" method="post">
				<!-- Contenido -->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title text-center">Borrar Pieza</h3>
					</div>
					<div class="modal-body">
						<!-- Formulario -->
							<div class="row">
								<div class="col-md-12">
									<h2 id="mensaje" class="text-center"></h2>
										<input type="hidden" id="id_pieza" name="id_pieza" value="0" />
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

    <!-- ***** Modal Modifica *****  -->
	<div id="modificar" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<form action="../control/CtrlPieza.php" method="post">
				<!-- Contenido -->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3 class="modal-title text-center">Modificar Pieza</h3>
					</div>
					<div class="modal-body">
						<!-- Formulario -->
							<div class="row">
                                <input type="hidden" id="id_piezaM" name="id_piezaM" value="0" />
								<div class="col-md-6">
									<div class="form-group">
										<label for="nombre_piezaM">Nombre:</label>
										<input type="text" name="nombre_piezaM" class="form-control" id="nombre_piezaM" required autofocus="nombre_servicio">
									</div>
									<div class="form-group">
										<label for="descripcion_piezaM">Descripción:</label>
										<input type="text" name="descripcion_piezaM" class="form-control" id="descripcion_piezaM" required>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label for="tipo_piezaM">Tipo:</label>
										<input type="text" name="tipo_piezaM" class="form-control" id="tipo_piezaM">
									</div>
                                    <div class="form-group">
										<label for="id_salaM">Sala:</label>
                                        <select class="form-control" required name="id_salaM"
    											id="id_salaM">
    										<option>
    											---------- Seleccione ----------
    										</option>
    								        <?php
    											$p->consultaSala();
    										?>
    								     </select>
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
