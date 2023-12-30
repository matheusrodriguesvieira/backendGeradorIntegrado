<?php
if ($api == 'validate-token') {

    if ($metodo == 'GET') {
        if ($acao == "supervisor" && $parametro == "") {
            if (Usuarios::validarToken('supervisores')) {
                echo json_encode([
                    'error' => false,
                    'message' => 'Token válido.'
                ]);
                exit;
            } else {
                echo json_encode([
                    'error' => true,
                    'message' => 'Você não está logado, ou seu token é inválido.'
                ]);
                exit;
            }
        }

        if ($acao == "operador" && $parametro == "") {
            if (Usuarios::validarToken('operadores')) {
                echo json_encode([
                    'error' => false,
                    'message' => 'Token válido.'
                ]);
                exit;
            } else {
                echo json_encode([
                    'error' => true,
                    'message' => 'Você não está logado, ou seu token é inválido.'
                ]);
                exit;
            }
        }
    }
}