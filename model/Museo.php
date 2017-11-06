<?php
    class Museo{
        private $id_museo;
        private $nombre_museo;
        private $descripcion_museo;
        private $colonia_museo;
        private $calle_museo;
        private $numero_museo;
        private $telefono_museo;
        private $nombre_servicio;
        private $costo;
        private $imagen;

        public function inicializar($id_museo, $nombre_museo, $descripcion_museo, $colonia_museo, $calle_museo, $numero_museo, $telefono_museo, $nombre_servicio, $costo, $imagen){
            $this->id_museo=$id_museo;
            $this->nombre_museo=$nombre_museo;
            $this->descripcion_museo=$descripcion_museo;
            $this->colonia_museo=$colonia_museo;
            $this->calle_museo=$calle_museo;
            $this->numero_museo=$numero_museo;
            $this->telefono_museo=$telefono_museo;
            $this->nombre_servicio=$nombre_servicio;
            $this->costo=$costo;
            $this->imagen=$imagen;
        }

        public function conexionDB(){
            $con = mysqli_connect("localhost","root","","musearch")
            or die ("No se pudo establecer con a la BD");
            return $con;
        }

        public function consultaMuseo(){
            $consulta = mysqli_query($this->conexionDB(), "SELECT * FROM museo")
            or die ("Problemas en la consulta" .mysqli_error($this->conexionDB()));

            echo
                '<table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Museo</th>
                            <th class="text-center">Colonia</th>
                            <th class="text-center">Teléfono</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>';
            while ($l = mysqli_fetch_array($consulta)) {
                echo
                        "<tr>
                            <td class='text-center'> ". $l['nombre_museo'] . "</td>
                            <td class='text-center'> ". $l['colonia_museo'] . "</td>
                            <td class='text-center'> ". $l['telefono_museo'] . "</td>";
                echo
                            '<td class="text-center">

                                <button type="button" class="btn btn-warning" title="Modificar"
                                    onClick="javascript: modificarMuseo(
                                      ' . $l['id_museo'] . ',
                                    \'' . $l['nombre_museo'] . '\',
                                    \'' . $l['descripcion_museo'] . '\',
                                    \'' . $l['colonia_museo'] . '\',
                                    \'' . $l['calle_museo'] . '\',
                                      ' . $l['numero_museo'] . ',
                                      ' . $l['telefono_museo'] . ',
                                    \'' . $l['nombre_servicio'] . '\',
                                      ' . $l['costo'] . ')">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                </button>

                                <button type="button" class="btn btn-info" title="Detalles"
                                    onClick="javascript: detallesMuseo(
                                    \'' . $l['nombre_museo'] . '\',
                                    \'' . $l['descripcion_museo'] . '\',
                                    \'' . $l['colonia_museo'] . '\',
                                    \'' . $l['calle_museo'] . '\',
                                      ' . $l['numero_museo'] . ',
                                      ' . $l['telefono_museo'] . ',
                                    \'' . $l['nombre_servicio'] . '\',
                                      ' . $l['costo'] . ',
                                    \'' . $l['imagen'] . '\')">
                                    <span class="glyphicon glyphicon-list"></span>
                                </button>

                                <button id="eliminar_' .$l['id_museo']. '" title="Borrar"
                                type="button" class="btn btn-danger"
                                onClick="javascript: borrarMuseo(' . $l['id_museo'] . ',
                                                               \'' . $l['nombre_museo'] . '\')">
                                        <span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </td>
                        </tr>';
            }
            echo    "</tbody>
                </table>";
        }

        public function consultaSer(){
            $consulta = mysqli_query($this->conexionDB(), "SELECT nombre_servicio FROM servicio")
            or die ("Problemas en la consulta" .mysqli_error($this->conexionDB()));
            while ($s = mysqli_fetch_array($consulta)) {
                echo "<option value=".$s['nombre_servicio']." >".$s['nombre_servicio']."</option>";
            }
        }

        public function consultaVistaMuseo(){
            $consulta = mysqli_query($this->conexionDB(), "SELECT * FROM museo")
            or die ("Problemas en la consulta" .mysqli_error($this->conexionDB()));

            while ($l = mysqli_fetch_array($consulta)) {
                echo "<div class='col-md-12'>
                        <div class='col-md-4'>
                            <h3 class='hdr'><b>". $l['nombre_museo'] ."</b></h3>
                            <img class='img-responsive' src='images/".$l['imagen']."' alt='logo' >
                        </div>
                        <div class='col-md-8'>
                            <br><br>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <h3>Descripción</h3>
                                    <p class='justificado'>" . $l['descripcion_museo'] ."<p>
                                </div>
                                <div class='col-md-12'>
                                    <h3>Dirección</h3>
                                    <p>Colonia: " . $l['colonia_museo'] . "</p>
                                    <p>Calle: ". $l['calle_museo'] ."</p>
                                    <p>#: ". $l['numero_museo'] ."</p>
                                    <p>Teléfono: ". $l['telefono_museo'] ."</p>
                                </div>
                            </div>
                        </div>
                    </div>";
            }
        }

        public function insertar($id_museo, $nombre_museo, $descripcion_museo, $colonia_museo, $calle_museo, $numero_museo, $telefono_museo, $nombre_servicio, $costo, $imagen){

            // INICIO INSTRUCCIONES IMAGEN
            $nombre_imagen = $_FILES['imagen']['name'];
            $tipo_imagen = $_FILES['imagen']['type'];
            $tamano_imagen = $_FILES['imagen']['size'];

            if ($tamano_imagen<=8000000) {
                if ($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/jpg"
                    || $tipo_imagen == "image/png" || $tipo_imagen == "image/gif") {
                    $carpeta_destino = '../images/';
                    move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino . $nombre_imagen);
                } else {
                    echo "Solo se pueden subir imagenes(jpeg, jpg, png y gif)";
                }
            } else {
                echo "El tamaño excede el limite";
            }
            // CIERRE INSTRUCCIONES IMAGEN

            mysqli_query($this->conexionDB(), "INSERT INTO museo VALUES('','$nombre_museo','$descripcion_museo',
            '$colonia_museo','$calle_museo','$numero_museo', '$telefono_museo','$nombre_servicio','$costo','$nombre_imagen')")
            or die ("Problemas al insertar".mysqli_error($this->conexionDB()));
            header("Location: ../view/vistaMuseo.php");
        }

        public function eliminar($id_museo){
            mysqli_query($this->conexionDB(),
            "DELETE FROM museo WHERE id_museo = ". $id_museo);
            header("Location: ../view/vistaMuseo.php");
		}

        public function modificar($id_museo, $nombre_museo, $descripcion_museo, $colonia_museo, $calle_museo, $numero_museo, $telefono_museo, $nombre_servicio, $costo, $imagen) {

            // INICIO INSTRUCCIONES IMAGEN
            $nombre_imagen = $_FILES['imagen']['name'];
            $tipo_imagen = $_FILES['imagen']['type'];
            $tamano_imagen = $_FILES['imagen']['size'];

            if ($tamano_imagen<=8000000) {
                if ($tipo_imagen == "image/jpeg" || $tipo_imagen == "image/jpg"
                    || $tipo_imagen == "image/png" || $tipo_imagen == "image/gif") {
                    $carpeta_destino = '../images/';
                    move_uploaded_file($_FILES['imagen']['tmp_name'], $carpeta_destino . $nombre_imagen);
                } else {
                    echo "Solo se pueden subir imagenes(jpeg, jpg, png y gif)";
                }
            } else {
                echo "El tamaño excede el limite";
            }
            // CIERRE INSTRUCCIONES IMAGEN

            $sql = "UPDATE museo set nombre_museo = '$nombre_museo',
            descripcion_museo = '$descripcion_museo', colonia_museo = '$colonia_museo',
            calle_museo = '$calle_museo', numero_museo = $numero_museo,
            telefono_museo = $telefono_museo, nombre_servicio = '$nombre_servicio',
            costo = $costo, imagen = '$nombre_imagen'  where id_museo = $id_museo";
            mysqli_query($this->conexionDB(), $sql) or die
            ("Problemas con actualizar <br />". $sql . '<br />' . mysqli_error($this->conexionDB()));
            header("Location: ../view/vistaMuseo.php");
        }

        public function cerrar(){
            mysqli_close($this->conexionDB());
        }

    }
?>
