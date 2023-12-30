<?php
if ($api == 'supervisores') {

    if ($metodo == 'GET') {
        require_once(realpath(dirname(__FILE__) . '/GET.php'));
        // if (Usuarios::verificar('supervisores')) {
        // } else {
        //     echo json_encode([
        //         'error' => true,
        //         'message' => 'Você não está logado, ou seu token é inválido.'
        //     ]);
        //     exit;
        // }
    }
}