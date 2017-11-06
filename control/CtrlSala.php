<?php

    include '../model/Sala.php';
    $sala1 = new Sala();

    // Control para el metodo de insertar en la base de datos
    if (isset($_POST['i'])) {
        $sala1->inicializar($_POST['id_sala'],$_POST['nombre_sala'],
                            $_POST['descripcion_sala'],$_POST['id_museo']);
        $sala1->insertar();
        $sala1->cerrar();
    }

    // Control para el metodo de eliminar en la base de datos
    if (isset($_POST['e'])) {
        $sala1->eliminar($_POST['id_sala']);
        $sala1->cerrar();
    }

    // Control para el metodo de modificar en la base de datos
    if (isset($_POST['m'])) {
        $sala1->modificar($_POST['id_salaM'], $_POST['nombre_salaM'],
                            $_POST['descripcion_salaM'],$_POST['id_museoM']);
        $sala1->cerrar();
    }
?>
