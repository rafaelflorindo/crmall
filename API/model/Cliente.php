<?php

class Cliente
{
    private $id, $nome, $sexo, $dataNascimento, $cep, $endereco, $numero, $complemento, $bairro, $estado, $cidade;
    public $conectar;

    public function __construct()
    {
        try {
            $this->conectar = new PDO("mysql:host=localhost;dbname=crmall", "root", "");
            $this->conectar->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            //echo 'Error: ' . $e->getMessage();
            header('location: ./migrations/index.php');
        }
    }
    public function adicionarCliente($nome, $sexo, $dataNascimento, $cep, $endereco, $numero, $complemento, $bairro, $estado, $cidade)
    {
        $this->dados($nome, $sexo, $dataNascimento, $cep, $endereco, $numero, $complemento, $bairro, $estado, $cidade);
        try {
            $stmt = $this->conectar->prepare(
                "INSERT INTO cliente (nome, sexo, dataNascimento, cep, endereco, numero, complemento, bairro, estado, cidade) 
                VALUES (:NOME, :SEXO, :DATANASCIMENTO, :CEP, :ENDERECO, :NUMERO, :COMPLEMENTO, :BAIRRO, :ESTADO, :CIDADE)"
            );
            $stmt->execute(
                array(
                    ":NOME" => $this->nome,
                    ":SEXO" => $this->sexo,
                    ":DATANASCIMENTO" => $this->dataNascimento,
                    ":CEP" => $this->cep,
                    ":ENDERECO" => $this->endereco,
                    ":NUMERO" => $this->numero,
                    ":COMPLEMENTO" => $this->complemento,
                    ":BAIRRO" => $this->bairro,
                    ":ESTADO" => $this->estado,
                    ":CIDADE" => $this->cidade
                )
            );
            $stmt->rowCount();
            return 1;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function dados($nome, $sexo, $dataNascimento, $cep, $endereco, $numero, $complemento, $bairro, $estado, $cidade)
    {
        $this->setNome($nome);
        $this->setSexo($sexo);
        $this->setDataNascimento($dataNascimento);
        $this->setCep($cep);
        $this->setEndereco($endereco);
        $this->setNumero($numero);
        $this->setComplemento($complemento);
        $this->setBairro($bairro);
        $this->setEstado($estado);
        $this->setCidade($cidade);
    }
    public function editarCliente($id, $nome, $sexo, $dataNascimento, $cep, $endereco, $numero, $complemento, $bairro, $estado, $cidade)
    {
        $this->setid($id);
        $this->dados($nome, $sexo, $dataNascimento, $cep, $endereco, $numero, $complemento, $bairro, $estado, $cidade);
        try {
            $stmt = $this->conectar->prepare(
                "UPDATE cliente SET nome=:NOME, sexo=:SEXO, dataNascimento=:DATANASCIMENTO, cep=:CEP, endereco=:ENDERECO, 
            numero=:NUMERO, complemento=:COMPLEMENTO, bairro=:BAIRRO, estado=:ESTADO, cidade=:CIDADE WHERE id=:ID"
            );
            $stmt->execute(array(
                ":ID" => $this->id,
                ":NOME" => $this->getNome(),
                ":SEXO" => $this->getSexo(),
                ":DATANASCIMENTO" => $this->getDataNascimento(),
                ":CEP" => $this->getCep(),
                ":ENDERECO" => $this->getEndereco(),
                ":NUMERO" => $this->getNumero(),
                ":COMPLEMENTO" => $this->getComplemento(),
                ":BAIRRO" => $this->getBairro(),
                ":ESTADO" => $this->getEstado(),
                ":CIDADE" => $this->getCidade()
            ));
            return 1;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function excluirCliente($id)
    {
        $this->setid($id);
        try {
            $stmt = $this->conectar->prepare("DELETE FROM cliente where id = :ID");
            $stmt->execute(array(":ID" => $this->id));
            $retorno = $stmt->rowCount();
            return $retorno;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function listarTodosClientes()
    {
        $stmt = $this->conectar->prepare("SELECT * FROM cliente ORDER BY nome ASC");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($results);
    }
    public function carregarCliente($id)
    {
        $this->setid($id);
        $stmt = $this->conectar->prepare("SELECT * FROM cliente where id = :ID ORDER BY nome ASC");
        $stmt->execute(array(":ID" => $this->id));
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($results);
    }

    private function setId($id)
    {
        $this->id = $id;
    }
    private function setNome($nome)
    {
        $this->nome = $nome;
    }
    private function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }
    private function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
    }
    private function setCep($cep)
    {
        $this->cep = $cep;
    }
    private function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }
    private function setNumero($numero)
    {
        $this->numero = $numero;
    }
    private function setComplemento($complemento)
    {
        $this->complemento = $complemento;
    }
    private function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }
    private function setEstado($estado)
    {
        $this->estado = $estado;
    }
    private function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function getSexo()
    {
        return $this->sexo;
    }
    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }
    public function getCep()
    {
        return $this->cep;
    }
    public function getEndereco()
    {
        return $this->endereco;
    }
    public function getNumero()
    {
        return $this->numero;
    }
    public function getComplemento()
    {
        return $this->complemento;
    }
    public function getBairro()
    {
        return $this->bairro;
    }
    public function getEstado()
    {
        return $this->estado;
    }
    public function getCidade()
    {
        return $this->cidade;
    }
   
}
