<?php
if ($api == 'listaEscalas') {


    if ($metodo == 'GET') {
        require_once(realpath(dirname(__FILE__) . '/GET.php'));
        // if ((Usuarios::verificar('supervisores')) || (Usuarios::verificar('operadores'))) {
        // } else {
        //     echo json_encode([
        //         'error' => true,
        //         'message' => 'Você não está logado, ou seu token é inválido.'
        //     ]);
        //     exit;
        // }
    }

    if ($metodo == 'PUT') {
        if (Usuarios::verificar('supervisores')) {
            require_once(realpath(dirname(__FILE__) . '/PUT.php'));
        } else {
            echo json_encode([
                'error' => true,
                'message' => 'Você não está logado, ou seu token é inválido.'
            ]);
            exit;
        }
    }

    if ($metodo == "POST") {
        require_once(realpath(dirname(__FILE__) . '/POST.php'));
        // if (Usuarios::verificar('supervisores')) {
        // } else {
        //     echo json_encode([
        //         'error' => true,
        //         'message' => 'Você não está logado, ou seu token é inválido.'
        //     ]);
        //     exit;
        // }
    }

    if ($metodo == 'DELETE') {
        if (Usuarios::verificar('supervisores')) {
            require_once(realpath(dirname(__FILE__) . '/DELETE.php'));
        } else {
            echo json_encode([
                'error' => true,
                'message' => 'Você não está logado, ou seu token é inválido.'
            ]);
            exit;
        }
    }
}