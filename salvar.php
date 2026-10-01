<?php
    include "config/conexao.php";
    //post é uma variável especial do php, ele recebe dados enviados pelo formolário quando usamos o METHOD="POST" do html//
    $cliente = $_POST["cliente"];
    $equipamento = $_POST["equipamento"];
    $problema = $_POST["problema"];
    $data_entrada = $_POST["data_entrada"];
    $status = $_POST["status"];

    $sql = "insert into ordens_servico
            (cliente, equipamento, problema, data_entrada, status)
            values (?, ?, ?, ?, ?)";
    
    //statement
    $stmt = $conexao->prepare($sql);

    $stmt->bind_param(
        "sssss",//esses 5s são o tipo das variáveis s de string
        $cliente,
        $equipamento,
        $problema,
        $data_entrada,
        $status
    );

    if($stmt->execute()){
        header("Location:index.php");
        exit;
    } else {
        echo "Erro ao cadastrar ordem de serviço.";
    }
?>