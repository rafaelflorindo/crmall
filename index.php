<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRMALL</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="./API/imagens/logo.png" width="50%"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-sm-10">
                &nbsp;
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10">
                <h4 class="display-6">Sistema para cadastro de clientes</h4>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <?php
                if (isset($_GET["mensagem"]) && !empty($_GET["mensagem"])) {
                    $mensagem =  filter_input(INPUT_GET, "mensagem", FILTER_SANITIZE_STRING);
                    if ($mensagem == "sucesso") {
                ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="alert-heading">Sucesso!!!</h4>
                            <hr>
                            <p>Operacação realizada com sucesso!!!</p>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="alert alert-danger" role="alert">
                            Ocorreu um erro em sua operação!!!
                        </div>
                <?php
                    }
                } else {
                    echo " ";
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10">
                <a href="./API/views/formulario.php"><button type="button" class="btn btn-success">Cadastrar Cliente</button></a>
                <hr>
            </div>
        </div>
        <?php
        require_once("./API/model/Cliente.php");
        $listar = new Cliente();
        if($retorno = $listar->listarTodosClientes())
            $dados = json_decode($retorno);

        if (isset($dados) && !empty($dados)) {
        ?>
            <div class="row">
                <div class="col-sm-12 border border-secondary">
                    <div class="row">
                        <div class="col-sm-10">
                            &nbsp;
                        </div>
                    </div>

                    <table class="table table-striped" id="table_id">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Data Nascimento</th>
                                <th scope="col">Cidade</th>
                                <th scope="col">AÇÕES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            foreach ($dados as $key => $value) {
                                $date = new DateTime($value->dataNascimento);
                            ?>
                                <tr>
                                    <th scope="row"><?= $value->id; ?></td>
                                    <td><?= strtoupper($value->nome); ?></td>
                                    <td><?= $date->format('d/m/Y'); ?></td>
                                    <td><?= strtoupper($value->cidade); ?></td>
                                    <td><a href="./API/views/formulario.php?id=<?= $value->id; ?>&acao=buscar"><button type="button" class="btn btn-warning btn-sm">Editar</button></a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#excluir<?= $value->id; ?>">Excluir</button>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="excluir<?= $value->id; ?>" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="TituloModalCentralizado">Excluir Cliente</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Deseja realmente excluir a cliente
                                                <b><?= $value->nome; ?>?</b>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="./API/controller/cliente.php?id=<?= $value->id; ?>&acao=excluir"><button type="button" class="btn btn-danger btn-sm">Sim</button></a>
                                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Não</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

        <?php
        } else {
        ?>
            <div class="row">
                <div class="col-12">
                    <p>Não há registros armazenados na base de dados!!!</p>
                </div>
            </div>

        <?php
        }
        ?>

    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
</body>

</html>