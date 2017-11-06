<?php
    class Administrador{
        private $id_admi;
        private $nombre_admi;
        private $correo_admi;
        private $contrasena_admin;
        private $telefono_admi;
        private $direccion_admi;

        public function inicializar($id_admi, $nombre_admi, $correo_admi, $contrasena_admin,
                                    $telefono_admi, $direccion_admi){
            $this->id_admi=$id_admi;
            $this->nombre_admi=$nombre_admi;
            $this->correo_admi=$correo_admi;
            $this->contrasena_admin=$contrasena_admin;
            $this->telefono_admi=$telefono_admi;
            $this->direccion_admi=$direccion_admi;
        }

        public function conexionDB(){
            $con = mysqli_connect("localhost", "root", "", "musearch")
            or die ("No se pudo establecer la conexión con la bd");
            return $con;
        }

        public function consultaAdm(){
            $consulta = mysqli_query($this->conexionDB(), "SELECT * FROM administrador")
            or die ("Problemas en la consulta" .mysqli_error($this->conexionDB()));
            echo
                '<table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Correo</th>
                            <th class="text-center">Contrasena</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>';
            while ($l = mysqli_fetch_array($consulta)) {
                echo
                        "<tr>
                            <td class='text-center'> ". $l['nombre_admi'] . "</td>
                            <td class='text-center'> ". $l['correo_admi'] . "</td>
                            <td class='text-center'> ". $l['contrasena_admin'] . "</td>";
                echo
                            '<td class="text-center">

                                <button type="button" class="btn btn-warning" title="Modificar"
                                    onClick="javascript: modificarAdministrador(' . $l['id_admi'] . ',
                                    \'' . $l['nombre_admi'] . '\',
                                    \'' . $l['correo_admi'] . '\',
                                    \'' . $l['contrasena_admin'] . '\',
                                      ' . $l['telefono_admi'] . ',
                                    \'' . $l['direccion_admi'] . '\')">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </button>

                                <button type="button" class="btn btn-info" title="Detalles"
                                    onClick="javascript: detallesAdministrador(
                                    \'' . $l['nombre_admi'] . '\',
                                    \'' . $l['correo_admi'] . '\',
                                    \'' . $l['contrasena_admin'] . '\',
                                      ' . $l['telefono_admi'] . ',
                                    \'' . $l['direccion_admi'] . '\')">
                                    <span class="glyphicon glyphicon-list"></span>
                                </button>
                                
                                <button
                                type="button" class="btn btn-danger" title="Borrar"
                                onClick="javascript: borrarAdministrador(' . $l['id_admi'] . ',
                                                                       \'' . $l['nombre_admi'] . ' \')">
                                        <span class="glyphicon glyphicon-trash"></span>
                                </button>
                            </td>
                        </tr>';
                }
            echo    "</tbody>
                </table>";
        }

        public function insertar(){
            mysqli_query($this->conexionDB(), "INSERT INTO administrador VALUES('','$this->nombre_admi','$this->correo_admi','$this->contrasena_admin'
            ,'$this->telefono_admi','$this->direccion_admi')")
            or die ("Problemas al insertar".mysqli_error($this->conexionDB()));
            header("Location: ../view/vistaAdministrador.php");
        }

        public function eliminar($id_admi){
            mysqli_query($this->conexionDB(),
            "delete from administrador where id_admi = ". $id_admi);
            header("Location: ../view/vistaAdministrador.php");
        }

        public function modificar($id_admi, $nombre_admi, $correo_admi, $contrasena_admin,
                                 $telefono_admi, $direccion_admi) {
            $sql = "UPDATE administrador set nombre_admi = '$nombre_admi',
            correo_admi = '$correo_admi', contrasena_admin = '$contrasena_admin',
            telefono_admi = $telefono_admi, direccion_admi = '$direccion_admi'
            where id_admi = $id_admi";
            mysqli_query($this->conexionDB(), $sql) or die
            ("Problemas con actualizar <br />". $sql . '<br />' . mysqli_error($this->conexionDB()));
            header("Location: ../view/vistaAdministrador.php");
        }

        public function cerrar(){
            mysqli_close($this->conexionDB());
        }

    }
?>
