<?php

    include '../model/Piezas.php';
    $p1 = new Piezas();

    if (isset($_POST['i'])) {
        $p1->inicializar($_POST['id_pieza'],$_POST['nombre_pieza'],$_POST['tipo_pieza'],
                            $_POST['descripcion_pieza'],$_POST['id_sala']);
        $p1->insertar();
        $p1->cerrar();
    }

    if (isset($_POST['e'])) {
        $p1->eliminar($_POST['id_pieza']);
        $p1->cerrar();
    }


    if (isset($_POST['m'])) {
        $p1->modificar($_POST['id_piezaM'],$_POST['nombre_piezaM'],$_POST['tipo_piezaM'],
                            $_POST['descripcion_piezaM'],$_POST['id_salaM']);
        $p1->cerrar();
    }


?>
