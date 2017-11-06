<?php

    class Piezas {
        private $id_pieza;
        private $nombre_pieza;
        private $tipo_pieza;
        private $descripcion_pieza;
        private $id_sala;

        public function inicializar($id_pieza, $nombre_pieza, $tipo_pieza, $descripcion_pieza, $id_sala){
            $this->id_pieza=$id_pieza;
            $this->nombre_pieza = $nombre_pieza;
            $this->tipo_pieza = $tipo_pieza;
            $this->descripcion_pieza = $descripcion_pieza;
            $this->id_sala = $id_sala;
        }

        public function conexionDB(){
            $con = mysqli_connect("localhost","root","","musearch")
            or die ("No se pudo establecer con a la BD");
            return $con;
        }

        public function consultaPieza(){
            $consulta = mysqli_query($this->conexionDB(),
            "SELECT * FROM piezas JOIN sala ON piezas.id_sala=sala.id_sala");
            echo
                '<table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Nombre Sala</th>
                            <th class="text-center">Pieza</th>
                            <th class="text-center">Tipo</th>
                            <th class="text-center">Descripción</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>';
            while ($l = mysqli_fetch_array($consulta)) {
                echo
                        "<tr>
                            <td class='text-center'> ". $l['nombre_sala'] . "</td>
                            <td class='text-center'> ". $l['nombre_pieza'] . "</td>
                            <td class='text-center'> ". $l['tipo_pieza'] . "</td>
                            <td class='text-center'> ". $l['descripcion_pieza'] . "</td>";
                echo
                            '<td class="text-center">

                                <button title="Borrar"
                                type="button" class="btn btn-danger"
                                onClick="javascript: borrarPieza(' . $l['id_pieza'] . ', \''
                                                                  . $l['nombre_pieza'] . '\')">
                                        <span class="glyphicon glyphicon-trash"></span>
                                </button>

                                <button type="button" class="btn btn-warning" title="Modificar"
                                onClick="javascript: modificarPieza(' . $l['id_pieza'] . ',
                                                                  \'' . $l['nombre_pieza'] . '\',
                                                                  \'' . $l['tipo_pieza'] . '\',
                                                                  \'' . $l['descripcion_pieza'] . '\',
                                                                    ' . $l['id_sala'] . ')">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                </button>

                            </td>
                        </tr>';
            }
            echo    "</tbody>
                </table>";
        }

        public function insertar(){
            mysqli_query($this->conexionDB(), "INSERT INTO piezas VALUES('','$this->nombre_pieza','$this->tipo_pieza', '$this->descripcion_pieza',
            '$this->id_sala')") or die ("Problemas al insertar".mysqli_error($this->conexionDB()));
            header("Location: ../view/vistaPiezas.php");
        }

        public function eliminar($id_pieza){
            mysqli_query($this->conexionDB(),
            "DELETE FROM piezas WHERE id_pieza = ". $id_pieza);
            header("Location: ../view/vistaPiezas.php");
		}

        public function modificar($id_pieza, $nombre_pieza, $tipo_pieza, $descripcion_pieza, $id_sala){
            $sql = "UPDATE piezas set nombre_pieza = '$nombre_pieza', tipo_pieza = '$tipo_pieza',
            descripcion_pieza = '$descripcion_pieza', id_sala = $id_sala where
            id_pieza = $id_pieza";
            mysqli_query($this->conexionDB(), $sql) or die
            ("Problemas con actualizar <br />". $sql . '<br />' . mysqli_error($this->conexionDB()));
            header("Location: ../view/vistaPiezas.php");
		}

        // Metodo para consultar todos los museos.
        public function consultaMuseo(){
            $consulta = mysqli_query($this->conexionDB(), "SELECT id_museo, nombre_museo FROM museo ORDER BY nombre_museo")
            or die ("Problemas en la consulta" .mysqli_error($this->conexionDB()));
            while ($s = mysqli_fetch_array($consulta)) {
                echo "<option value=".$s['id_museo']." >".$s['nombre_museo']."</option>";
            }
        }

        // Metodo para consultar todos las salas de un museo
        public function consultaSala(){
            $consulta = mysqli_query($this->conexionDB(), "SELECT id_sala, nombre_sala FROM sala ORDER BY nombre_sala")
            or die ("Problemas en la consulta" .mysqli_error($this->conexionDB()));
            while ($s = mysqli_fetch_array($consulta)) {
                echo "<option value=".$s['id_sala']." >".$s['nombre_sala']."</option>";
            }
        }

        public function cerrar(){
            mysqli_close($this->conexionDB());
        }

    }


?>
