<?php
if ($acao == 'index' && $parametro == '') {

    // ---------------------------------------
    // PEGA TODOS OS OPERADORES
    // ---------------------------------------
    $db = DB::connect();

    $sql = $db->prepare("SELECT * from transporte");
    $sql->execute();
    $obj = $sql->fetchAll(PDO::FETCH_ASSOC);

    if (!$obj) {
        $response = array(
            "message" => "Nenhum transporte encontrado!"
        );
        echo json_encode($response);
        exit;
    }

    echo json_encode($obj);
    exit;
}

if ($acao == 'show' && $parametro != '') {
    // ---------------------------------------
    // PEGA UM OPERADOR ESPECÍFICO
    // ---------------------------------------


    $db = DB::connect();
    $sql = $db->prepare("SELECT * from transporte where transporte.tag = ?");
    $sql->execute([$parametro]);
    $obj = $sql->fetchObject();

    if (!$obj) {
        $response = array(
            "message" => "Nenhum transporte encontrado!"
        );
        echo json_encode($response);
        exit;
    }

    echo json_encode($obj);
    exit;
}
