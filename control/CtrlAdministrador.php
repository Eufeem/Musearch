<?php

    include '../model/Administrador.php';
    $adm1 = new Administrador();

    // Inserta un servicio
    if (isset($_POST['i'])) {
        $adm1->inicializar($_POST['id_admi'], $_POST['nombre_admi'], $_POST['correo_admi'],
                            $_POST['contrasena_admin'], $_POST['telefono_admi'],
                            $_POST['direccion_admi']);
        $adm1->insertar();
        $adm1->cerrar();
    }

    if (isset($_POST['e'])) {
        $adm1->eliminar($_POST['id_admi']);
        $adm1->cerrar();
    }

    if (isset($_POST['m'])) {
        $adm1->modificar($_POST['id_admiM'], $_POST['nombre_admiM'], $_POST['correo_admiM'],
                            $_POST['contrasena_adminM'], $_POST['telefono_admiM'],
                            $_POST['direccion_admiM']);
        $adm1->cerrar();
    }

?>
