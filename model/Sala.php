<?php

    class Sala {
        private $id_sala;
        private $nombre_sala;
        private $descripcion_sala;
        private $id_museo;

        // Metodo Constructor
        public function inicializar($id_sala, $nombre_sala, $descripcion_sala, $id_museo){
            $this->id_sala = $id_sala;
            $this->nombre_sala = $nombre_sala;
            $this->descripcion_sala = $descripcion_sala;
            $this->id_museo = $id_museo;
        }

        // Metodo que implementa la conexión a la base de datos
        public function conexionDB(){
            $con = mysqli_connect("localhost","root","","musearch")
            or die ("No se pudo establecer con a la BD");
            return $con;
        }

        // Metodo que consulta a la base y muestra los resultados en una tabla
        public function consultaSala(){
            $consulta = mysqli_query($this->conexionDB(),
            "SELECT * FROM sala INNER JOIN museo ON
            sala.id_museo=museo.id_museo order by nombre_museo");
            echo
                '<table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Nombre Museo</th>
                            <th class="text-center">Nombre Sala</th>
                            <th class="text-center">Descripción</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>';
            while ($l = mysqli_fetch_array($consulta)) {
                echo
                        "<tr>
                            <td class='text-center'> ". $l['nombre_museo'] . "</td>
                            <td class='text-center'> ". $l['nombre_sala'] . "</td>
                            <td class='text-center'> ". $l['descripcion_sala'] . "</td>";
                echo
                            '<td class="text-center">

                                <button type="button" class="btn btn-warning" title="Modificar"
                                onClick="javascript: modificarSala(' . $l['id_sala'] . ',
                                                                 \'' . $l['nombre_sala'] . '\',
                                                                 \'' . $l['descripcion_sala'] . '\',
                                                                   ' . $l['id_museo'] . ')">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                </button>

                                <button id="eliminar_' .$l['id_museo']. '" title="Borrar"
                                type="button" class="btn btn-danger"
                                onClick="javascript: borrarSala(' . $l['id_sala'] . ', \''
                                                                  . $l['nombre_sala'] . '\')">
                                        <span class="glyphicon glyphicon-trash"></span>
                                </button>

                            </td>
                        </tr>';
            }
            echo    "</tbody>
                </table>";
        }

        // Metodo que consulta los museos y los imprime en un select para posteriormente
        // mostrarlo en en el modal de insertar y modificar sala
        public function consultaMuseo(){
            $consulta = mysqli_query($this->conexionDB(), "SELECT id_museo, nombre_museo FROM museo")
            or die ("Problemas en la consulta" .mysqli_error($this->conexionDB()));
            while ($s = mysqli_fetch_array($consulta)) {
                echo "<option value=".$s['id_museo']." >".$s['nombre_museo']."</option>";
            }
        }

        // Metodo para insertar en la base de datos
        public function insertar(){
            mysqli_query($this->conexionDB(), "INSERT INTO sala VALUES('','$this->nombre_sala','$this->descripcion_sala',
            '$this->id_museo')") or die ("Problemas al insertar".mysqli_error($this->conexionDB()));
            header("Location: ../view/vistaSala.php");
        }

        // Metodo para eliminar en la base de datos
        public function eliminar($id_sala){
            mysqli_query($this->conexionDB(),
            "DELETE FROM sala WHERE id_sala = ". $id_sala);
            header("Location: ../view/vistaSala.php");
        }

        // Metodo para modificar en la base de datos
        public function modificar($id_sala, $nombre_sala, $descripcion_sala, $id_museo){
            $sql = "UPDATE sala set nombre_sala = '$nombre_sala',
            descripcion_sala = '$descripcion_sala', id_museo = $id_museo where
            id_sala = $id_sala";
            mysqli_query($this->conexionDB(), $sql) or die
            ("Problemas con actualizar <br />". $sql . '<br />' . mysqli_error($this->conexionDB()));
            header("Location: ../view/vistaSala.php");
		}

        // Metodo que cierra la conexion de la base de datos
        public function cerrar(){
            mysqli_close($this->conexionDB());
        }



    }


?>
