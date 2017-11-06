<?php

    include '../model/Museo.php';
    $mus1 = new Museo();

    if (isset($_POST['i'])) {
        $mus1->insertar($_POST['id_museo'], $_POST['nombre_museo'],
                           $_POST['descripcion_museo'], $_POST['colonia_museo'],
                           $_POST['calle_museo'],$_POST['numero_museo'],
                           $_POST['telefono_museo'], $_POST['nombre_servicio'],
                           $_POST['costo'], $_POST['imagen']);
        $mus1->cerrar();
    }

    if (isset($_POST['e'])) {
        $mus1->eliminar($_POST['id_museo']);
        $mus1->cerrar();
    }

    if (isset($_POST['m'])) {
        $mus1->modificar($_POST['id_museoM'], $_POST['nombre_museoM'],
                           $_POST['descripcion_museoM'], $_POST['colonia_museoM'],
                           $_POST['calle_museoM'],$_POST['numero_museoM'],
                           $_POST['telefono_museoM'], $_POST['nombre_servicioM'],
                           $_POST['costoM'], $_POST['imagen']);
        $mus1->cerrar();
    }
?>
