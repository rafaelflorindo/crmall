<?php
require_once('../model/Cliente.php');

if ($_POST) {
    if (
        isset($_POST["nome"]) && isset($_POST["sexo"]) && isset($_POST["dataNascimento"])
        && !empty($_POST["nome"]) && !empty($_POST["sexo"]) && !empty($_POST["dataNascimento"])
    ) {

        $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_STRING);
        $sexo = filter_input(INPUT_POST, "sexo", FILTER_SANITIZE_STRING);
        $dataNascimento = filter_input(INPUT_POST, "dataNascimento", FILTER_DEFAULT);
        $cep = filter_input(INPUT_POST, "cep", FILTER_DEFAULT);
        $endereco = filter_input(INPUT_POST, "endereco", FILTER_SANITIZE_STRING);
        $numero = filter_input(INPUT_POST, "numero", FILTER_DEFAULT);
        $complemento = filter_input(INPUT_POST, "complemento", FILTER_SANITIZE_STRING);
        $bairro = filter_input(INPUT_POST, "bairro", FILTER_SANITIZE_STRING);
        $estado = filter_input(INPUT_POST, "estado", FILTER_SANITIZE_STRING);
        $cidade = filter_input(INPUT_POST, "cidade", FILTER_SANITIZE_STRING);
       
        if (isset($_POST["id"]) && !empty($_POST["id"])) {
            $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
          
            $editarCliente = new Cliente();
            $resposta = $editarCliente->editarCliente($id, $nome, $sexo, $dataNascimento, $cep, $endereco, $numero, $complemento, $bairro, $estado, $cidade);
            if($resposta = 1) header('location: ../../index.php?mensagem=sucesso');
            else header('location: ../views/formulario.php?mensagem=erro');
        } else {
            $adicionarCliente = new Cliente();
            $resposta = $adicionarCliente->adicionarCliente($nome, $sexo, $dataNascimento, $cep, $endereco, $numero, $complemento, $bairro, $estado, $cidade);
            if($resposta = 1) header('location: ../../index.php?mensagem=sucesso');
            else header('location: ../views/formulario.php?mensagem=erro');
        }
    }else{
        echo "Campos obrigatórios não preenchidos!!!";
    }
} elseif ($_GET) {
    if (isset($_GET["id"]) && !empty($_GET["id"]) && isset($_GET["acao"]) && !empty($_GET["acao"])) {
        $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
        $acao = filter_input(INPUT_GET, "acao", FILTER_SANITIZE_STRING);
        
        if($acao == "excluir"){
            $buscarCliente = new Cliente();
            $resposta = $buscarCliente->excluirCliente($id);
            if($resposta > 0)           
                header('location: ../../index.php?mensagem=sucesso');
            else {
                header('location: ../../index.php?mensagem=erro');
            }
        }
    }
}
