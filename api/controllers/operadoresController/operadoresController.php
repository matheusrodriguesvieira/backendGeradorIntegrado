<?php
if ($api == 'operadores') {

    if ($metodo == 'GET') {
        if (!empty($_GET['login'])) {
            $login = $_GET['login'];
            $funcao = 'supervisores';
            if (Usuarios::validarToken($login) && Usuarios::autorizar($funcao, $login)) {
                require_once(realpath(dirname(__FILE__) . '/GET.php'));
            } else {
                echo json_encode([
                    'error' => true,
                    'message' => 'Você não está logado, ou seu token é inválido.'
                ]);
                exit;
            }
        } else {
            echo json_encode([
                'error' => true,
                'message' => "Parâmetro 'login' está ausente!"
            ]);
            exit;
        }
    }

    if ($metodo == 'PUT') {

        if (!empty($_GET['login'])) {
            $login = $_GET['login'];
            $funcao = 'supervisores';
            if (Usuarios::validarToken($login)) {
                require_once(realpath(dirname(__FILE__) . '/PUT.php'));
            } else {
                echo json_encode([
                    'error' => true,
                    'message' => 'Você não está logado, ou seu token é inválido.'
                ]);
                exit;
            }
        } else {
            echo json_encode([
                'error' => true,
                'message' => "Parâmetro 'login' está ausente!"
            ]);
            exit;
        }
    }
}
