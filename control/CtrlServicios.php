<?php

    include '../model/Servicios.php';
    $ser1 = new Servicios();

    // Control para el metodo de insertar en la base de datos
    if (isset($_POST['i'])) {
        $ser1->inicializar($_POST['id_servicio'],$_POST['nombre_servicio'],
                            $_POST['descripcion_servicio']);
        $ser1->insertar();
        $ser1->cerrar();
    }

    // Control para el metodo de eliminar en la base de datos
    if (isset($_POST['e'])) {
        $ser1->eliminar($_POST['id_servicio']);
        $ser1->cerrar();
    }

    // Control para el metodo de modificar en la base de datos
    if (isset($_POST['m'])) {
        $ser1->modificar($_POST['id_serviciom'],$_POST['nombre_serviciom'],
                        $_POST['descripcion_serviciom']);
        $ser1->cerrar();
    }
?>
