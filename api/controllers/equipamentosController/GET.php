<?php if ($acao == 'index' && $parametro == '') {

    if (empty($_GET['gerencia'])) {
        $db = DB::connect();
        $sql = $db->prepare("SELECT tag, categoria, disponivel, idgerencia as gerencia FROM equipamentos");
        $sql->execute();
        $obj = $sql->fetchAll(PDO::FETCH_ASSOC);

        if (!$obj) {
            $response = array(
                "message" => "Nenhum equipamento encontrado!"
            );
            echo json_encode($response);
            exit;
        }

        echo json_encode($obj);
        exit;
    } else {
        $db = DB::connect();
        $sql = $db->prepare("SELECT tag, categoria, disponivel, idgerencia as gerencia FROM equipamentos where equipamentos.idgerencia = ?");
        $sql->execute($_GET['gerencia']);
        $obj = $sql->fetchAll(PDO::FETCH_ASSOC);

        if (!$obj) {
            $response = array(
                "message" => "Nenhum equipamento encontrado!"
            );
            echo json_encode($response);
            exit;
        }

        echo json_encode($obj);
        exit;
    }
}

if ($acao == 'show' && $parametro != '') {
    $db = DB::connect();
    $sql = $db->prepare("SELECT tag, categoria, disponivel, idgerencia as gerencia FROM equipamentos WHERE equipamentos.tag = '{$parametro}'");
    $sql->execute();
    $obj = $sql->fetchObject();

    if ($obj) {
        echo json_encode($obj);
    } else {
        $response = array(
            "message" => "Nenhum equipamento encontrado!"
        );
        echo json_encode($response);
    }
    exit;
}
