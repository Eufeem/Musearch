<!DOCTYPE html>
<html>
<head>
</head>

<body>
    <?php
    $s = intval($_GET['s']);

    $con = mysqli_connect('localhost','root','','musearch');

    if (!$con) {
        die('No se puede conectar: ' . mysqli_error($con));
    }

    mysqli_select_db($con,"sala");

    $sql="SELECT * FROM sala WHERE id_museo = '".$s."'";
    $result = mysqli_query($con,$sql);

    echo '<div class="form-group">
                <label for="tipo_pieza">Sala:</label>
                <select class="form-control" name="pieza"required name="id_sala"
                        id="id_sala" onchange="showPieza(this.value)">
                    <option  selected="selected" disabled="disabled" value="">Seleccione la sala</option>';

                    while($row = mysqli_fetch_array($result)) {
                        echo "<option value=".$row['id_sala']." >".$row['nombre_sala']."</option>";
                    }

    echo '      </select>
            </div>';



    mysqli_close($con);
    ?>
</body>
</html>
