<?php
if ($acao == 'index' && $parametro == '') {

    // ---------------------------------------
    // PEGA TODOS OS OPERADORES
    // ---------------------------------------

    // $json = file_get_contents("php://input");
    // $dados = json_decode($json, true);

    // if (!$dados) {
    //     $response = array(
    //         "message" => 'Parâmetro \'turma\' não encontrado.'
    //     );
    //     echo json_encode($response);
    //     exit;
    // }

    // if (!array_key_exists('turma', $dados)) {
    //     $response = array(
    //         "message" => 'Parâmetro \'turma\' não encontrado.'
    //     );
    //     echo json_encode($response);
    //     exit;
    // }

    if (empty($_GET['turma'])) {
        $db = DB::connect();
        // $sql = $db->prepare("SELECT operadores.matricula, usuarios.nome, operadores.disponivel, usuarios.matriculasupervisor from operadores, usuarios");
        $sql = $db->prepare("SELECT operadores.matricula, usuarios.nome, gerencia.nome as gerencia, usuarios.matriculasupervisor, operadores.disponivel from usuarios, operadores, gerencia where operadores.matricula = usuarios.matricula and gerencia.id = usuarios.idgerencia and usuarios.matricula > 5");
        $sql->execute();
        $obj = $sql->fetchAll(PDO::FETCH_ASSOC);

        if (!$obj) {
            $response = array(
                "message" => "Nenhum operador encontrado!"
            );
            echo json_encode($response);
            exit;
        }

        echo json_encode($obj);
        exit;
    } else {

        $turma = $_GET['turma'];

        $db = DB::connect();
        $sql = $db->prepare("SELECT operadores.matricula, usuarios.nome, gerencia.nome as gerencia, usuarios.matriculasupervisor, operadores.disponivel from usuarios, operadores, gerencia where operadores.matricula = usuarios.matricula and gerencia.id = usuarios.idgerencia and usuarios.matricula > 5 and usuarios.turma = ?");
        $sql->execute([$turma]);
        $obj = $sql->fetchAll(PDO::FETCH_ASSOC);

        if (!$obj) {
            $response = array(
                "message" => "Nenhum operador encontrado!"
            );
            echo json_encode($response);
            exit;
        }

        echo json_encode($obj);
        exit;
    }
}

if ($acao == 'show' && $parametro != '') {
    // ---------------------------------------
    // PEGA UM OPERADOR ESPECÍFICO
    // ---------------------------------------


    $db = DB::connect();
    $sql = $db->prepare("SELECT operadores.matricula, usuarios.nome, gerencia.nome as gerencia, usuarios.matriculasupervisor, operadores.disponivel from usuarios, operadores, gerencia where operadores.matricula = usuarios.matricula and gerencia.id = usuarios.idgerencia and operadores.matricula = ?");
    $sql->execute([$parametro]);
    $obj = $sql->fetchObject();

    if (!$obj) {
        $response = array(
            "message" => "Nenhum operador encontrado!"
        );
        echo json_encode($response);
        exit;
    }

    echo json_encode($obj);
    exit;
}
