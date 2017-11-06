<!DOCTYPE html>
<html>
<head>
</head>

<body>

    <?php
    $q = intval($_GET['q']);

    $con = mysqli_connect('localhost','root','','musearch');

    if (!$con) {
        die('No se puede conectar: ' . mysqli_error($con));
    }

    mysqli_select_db($con,"piezas");
    $sql="SELECT * FROM piezas WHERE id_sala = '".$q."'";
    $result = mysqli_query($con,$sql);

    echo '<table class="table table-striped">
            <thead>
                <tr>
                    <th class="text-center">Pieza</th>
                    <th class="text-center">Tipo</th>
                    <th class="text-center">Descripción</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>';

    while($row = mysqli_fetch_array($result)) {
        echo
                "<tr>
                    <td class='text-center'> ". $row['nombre_pieza'] . "</td>
                    <td class='text-center'> ". $row['tipo_pieza'] . "</td>
                    <td class='text-center'> ". $row['descripcion_pieza'] . "</td>";
        echo
                    '<td class="text-center">

                        <button type="button" class="btn btn-warning" title="Modificar"
                        onClick="javascript: modificarPieza(' . $row['id_pieza'] . ',
                                                          \'' . $row['nombre_pieza'] . '\',
                                                          \'' . $row['tipo_pieza'] . '\',
                                                          \'' . $row['descripcion_pieza'] . '\',
                                                            ' . $row['id_sala'] . ')">
                                <span class="glyphicon glyphicon-pencil"></span>
                        </button>

                        <button title="Borrar"
                        type="button" class="btn btn-danger"
                        onClick="javascript: borrarPieza(' . $row['id_pieza'] . ', \''
                                                          . $row['nombre_pieza'] . '\')">
                                <span class="glyphicon glyphicon-trash"></span>
                        </button>
                    </td>
                </tr>';
    }
    echo    "</tbody>
            </table>";

    mysqli_close($con);
    ?>
</body>
</html>
