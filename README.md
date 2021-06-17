
<h2>Teste cadastro de clientes</h2>
<h3>Rafael Alves Florindo</h3>
<h3>Objetivo:</h3>

<p>Desenvolver sistema para cadastro de clientes com as funcionalidades de listagem, adição/edição e remoção.              </p>
<ul>
<li>1ª tela: Listagem dos clientes cadastrados em grid, disponibilizar botões: Adicionar, editar e remover clientes.</li>

<li>2ª tela: Tela para adicionar/editar clientes.</li>
</ul>
 

<h3>Diretrizes:</h3>
<ul>
    <li> - Utilizar qualquer framework/biblioteca em PHP que preferir.</li>
    <li> - Utilizar Mysql como banco de dados.</li>
    <li> - Campos para o cadastro de cliente: Nome, data de nascimento, sexo, cep, endereço, número, complemento, bairro, estado, cidade.</li>
    <li> - Consumir webservice para consulta de cep: https://viacep.com.br/, preencher campos do cadastro após a consulta do cep.</li>
    <li>- Validar cadastro de cliente: Nome, data de nascimento e sexo obrigatórios.</li>
</ul>

<h3>Envio do teste:</h3>
    - Disponibilizar o teste com o script de criação do banco de dados (ou migrations) através de um repositório no github.

<h3>Recursos Utilizados</h3>
<ul>
    <li>PHP</li>
    <li>JQUERY</li>
    <li>PDO</li>
    <li>Mysql</li>
    <li>HTML</li>
    <li>Bootstrap</li>
    <li>Consumo API - ViaCep</li>
</ul>

<h3>Como executar o projeto</h3>
1 - Clonar o projeto em seu servidor.
2 - Editar a classe Cliente (API/model/) e inserir os dados de conexão com o servidor de banco de dados, caso usuário e senha estejam fora do padrão.
3 - Executar o diretorio raiz no navegador.
