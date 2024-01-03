<?php
if ($acao == 'index' && $parametro == '') {

    // ---------------------------------------
    // PEGA TODOS OS OPERADORES
    // ---------------------------------------

    if (!empty($_GET['turma']) || !empty($_GET['gerencia'])) {

        $turma = $_GET['turma'];
        $gerencia = $_GET['gerencia'];

        $db = DB::connect();
        // $sql = $db->prepare("SELECT operadores.matricula, usuarios.nome, operadores.disponivel, usuarios.matriculasupervisor from operadores, usuarios");
        $sql = $db->prepare("SELECT operadores.matricula, usuarios.nome, usuarios.turma, gerencia.nome as gerencia, usuarios.matriculasupervisor, operadores.disponivel from usuarios, operadores, gerencia where operadores.matricula = usuarios.matricula and gerencia.id = usuarios.idgerencia and usuarios.matricula > 5 and usuarios.turma = ? and usuarios.idgerencia = ?");
        $sql->execute([$turma, $gerencia]);
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
    if (empty($_GET['turma']) || empty($_GET['gerencia'])) {
        $db = DB::connect();
        // $sql = $db->prepare("SELECT operadores.matricula, usuarios.nome, operadores.disponivel, usuarios.matriculasupervisor from operadores, usuarios");
        $sql = $db->prepare("SELECT usuarios.nome, usuarios.turma, gerencia.nome as gerencia, usuarios.matriculasupervisor, operadores.disponivel from usuarios, operadores, gerencia where operadores.matricula = usuarios.matricula and gerencia.id = usuarios.idgerencia and usuarios.matricula > 5");
        $sql->execute();
        $obj = $sql->fetchAll(PDO::FETCH_ASSOC);

        $sql = $db->prepare("SELECT * from operadores where operadores.matricula > 5");
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
    }

    if (empty($_GET['gerencia'])) {

        $turma = $_GET['turma'];

        $db = DB::connect();
        $sql = $db->prepare("SELECT operadores.matricula, usuarios.nome, usuarios.turma, gerencia.nome as gerencia, usuarios.matriculasupervisor, operadores.disponivel from usuarios, operadores, gerencia where operadores.matricula = usuarios.matricula and gerencia.id = usuarios.idgerencia and usuarios.matricula > 5 and usuarios.turma = ?");
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

    if (empty($_GET['turma'])) {

        $gerencia = $_GET['gerencia'];

        $db = DB::connect();
        $sql = $db->prepare("SELECT operadores.matricula, usuarios.nome, usuarios.turma, gerencia.nome as gerencia, usuarios.matriculasupervisor, operadores.disponivel from usuarios, operadores, gerencia where operadores.matricula = usuarios.matricula and gerencia.id = usuarios.idgerencia and usuarios.matricula > 5 and usuarios.idgerencia = ?");
        $sql->execute([$gerencia]);
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
