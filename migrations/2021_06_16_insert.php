<?php
class InsertData
{
    public function insert()
    {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=crmall", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $slqInsertData = "
            
            INSERT INTO cliente (id, nome, dataNascimento, sexo, cep, endereco, numero, complemento, bairro, estado, cidade) VALUES
(NULL, 'Manoela Ferreira Lopes', '1990-05-10', 'Feminino', '87043550', 'Rua Porto Seguro', 3, 'sei la', 'Conjunto João de Barro Itaparica', 'PR', 'Maringá'),
(NULL, 'JULIANA CRISTINA DE OLIVEIRA CASSIANO SILVA FLORINDO', '2021-06-01', 'Masculino', '87047550', 'Rua José Granado Parra', 78, '456', 'Jardim Paulista', 'PR', 'Maringá'),
(NULL, 'Murilo OLIVEIRA CASSIANO SILVA FLORINDO', '2021-06-04', 'Feminino', '87047550', 'Rua José Granado Parra', 3, 'lado ímpar', 'Jardim Paulista', 'PR', 'Maringá'),
(NULL, 'Ricardo Alves Florindo', '1986-04-06', 'Masculino', '71965-18', 'Rua Treze de Maio', 456, 'Condomínio Salas', 'Areal (Águas Claras)', 'PI', 'Teresina'),
(NULL, 'Carlos Danilo Luz', '2000-12-25', 'Masculino', '74550-14', 'Rua 510', 451, 'Zona Sul', 'Setor Centro Oeste', 'GO', 'Goiânia'),
(NULL, 'Gustavo Geraldino', '1089-10-14', 'Masculino', '76962-01', 'Rua Almirante Barroso', 12, 'até 2357/2358', 'Novo Horizonte', 'RO', 'Cacoal'),
(NULL, 'Ronie Tokumoto', '1980-10-10', 'Masculino', '77825-86', 'Rua 19', 78, '', 'Parque Bom Viver', 'TO', 'Araguaína'),
(NULL, 'Ronie Tokumoto', '1980-10-10', 'Masculino', '77825-86', 'Rua 19', 78, '', 'Parque Bom Viver', 'TO', 'Araguaína'),
(NULL, 'Anderson Silva', '1976-10-14', 'Masculino', '45078-15', 'Rua Doze', 0, '(Vl Serrana II)', 'Zabelê', 'BA', 'Vitória da Conquista'),
(NULL, 'Milena Souza Alcantara', '1952-12-10', 'Feminino', '57084-56', 'Rua Caina', 78, '', 'Benedito Bentes', 'AL', 'Maceió'),
(NULL, 'Tereza Souza', '1965-10-10', 'Feminino', '63118-28', 'Travessa São José', 45, '', 'Parque Recreio', 'CE', 'Crato');
            ";
            $stmt = $pdo->prepare($slqInsertData);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
}
