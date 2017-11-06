    <?php
    class Servicios{
        private $id_servicio;
        private $nombre_servicio;
        private $descripcion_servicio;

        public function inicializar($id_servicio,$nombre_servicio, $descripcion_servicio){
            $this->id_servicio=$id_servicio;
            $this->nombre_servicio=$nombre_servicio;
            $this->descripcion_servicio=$descripcion_servicio;
        }

        // Función para conectar a la Base de Datos
        public function conexionDB(){
            $con = mysqli_connect("localhost", "root", "", "musearch")
            or die ("No se pudo establecer la conexión con la bd");
            return $con;
        }

        //Función para la consulta de los servicios
        public function consultaSer(){
            $consulta = mysqli_query($this->conexionDB(), "SELECT * FROM servicio")
            or die ("Problemas en la consulta" .mysqli_error($this->conexionDB()));
            echo
                '<table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Servicio</th>
                            <th class="text-center">Descripción</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>';
            while ($l = mysqli_fetch_array($consulta)) {
                echo
                        "<tr>
                            <td class='text-center'> ". $l['nombre_servicio'] . "</td>
                            <td class='text-center'> ". $l['descripcion_servicio'] . "</td>";
                echo
                            '<td class="text-center">

                                <button type="button" class="btn btn-warning" title="Modificar"
                                    onClick="javascript: modificarServicio(
                                      ' . $l['id_servicio'] . ',
                                    \'' . $l['nombre_servicio'] . '\',
                                    \'' . $l['descripcion_servicio'] . '\')">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                </button>
                                <button id="eliminar_' .$l['id_servicio']. '" title="Borrar"
                                type="button" class="btn btn-danger"
                                onClick="javascript: borrarServicio(' . $l['id_servicio'] . ', \''
                                                                      . $l['nombre_servicio'] . '\')">
                                        <span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </td>
                        </tr>';
                }
            echo    "</tbody>
                </table>";

        }

        // Función que inserta servicios a la BD
        public function insertar(){
            mysqli_query($this->conexionDB(), "INSERT INTO servicio VALUES('','$this->nombre_servicio','$this->descripcion_servicio')")
            or die ("Problemas al insertar".mysqli_error($this->conexionDB()));
            header("Location: ../view/vistaServicios.php");
        }

        // Función que elimina servicios de la BD
        public function eliminar($id_servicio){
            mysqli_query($this->conexionDB(),
            "DELETE FROM servicio WHERE id_servicio = ". $id_servicio);
            header("Location: ../view/vistaServicios.php");
		}

        // Función que modifique servicios de la BD
        public function modificar($id_servicio, $nombre_servicio, $descripcion_servicio){
            $sql = "UPDATE servicio set nombre_servicio = '$nombre_servicio',
            descripcion_servicio = '$descripcion_servicio' where
            id_servicio = $id_servicio";
            mysqli_query($this->conexionDB(), $sql) or die
            ("Problemas con actualizar <br />". $sql . '<br />' . mysqli_error($this->conexionDB()));
            header("Location: ../view/vistaServicios.php");
		}

        // Función que cierra la conexión a la Base de Datos
        public function cerrar(){
            mysqli_close($this->conexionDB());
        }

    }
?>
