<?php

namespace App\DAO;

use App\Model\CorrentistaModel;

/**
 * As classes DAO (Data Access Object) são responsáveis por executar os
 * SQL junto ao banco de dados.
 */
class CorrentistaDAO extends DAO
{
     /**
     * Método construtor, sempre chamado na classe quando a classe é instanciada.
     * Exemplo de instanciar classe (criar objeto da classe):
     * $dao = new PessoaDAO();
     */
    public function __construct()
    {
        /**
         * Chamando o construtor da classe DAO, isto é, toda vez que chamos o consturo da classe DAO
         * estamos fazendo a conexão com o banco de dados.
         */
        parent::__construct();       
    }

    /**
     * 
     */
    public function save(CorrentistaModel $m) : CorrentistaModel
    {
        return ($m->id == null) ? $this->insert($m) : $this->update($m);
    }


    /**
     * Método que recebe um model e extrai os dados do model para realizar o insert
     * na tabela correspondente ao model. Note o tipo do parâmetro declarado.
     */
    private function insert(CorrentistaModel $model)
    {
        // Trecho de código SQL com marcadores ? para substituição posterior, no prepare
        $sql = "INSERT INTO correntista
                            (nome, email, cpf, data_nascimento, senha) 
                VALUES 
                            (?, ?, ?, ?, sha1(?) ) ";

        // Declaração da variável stmt que conterá a montagem da consulta. Observe que
        // estamos acessando o método prepare dentro da propriedade que guarda a conexão
        // com o MySQL, via operador seta "->". Isso significa que o prepare "está dentro"
        // da propriedade $conexao e recebe nossa string sql com os devidor marcadores.
        // Para saber mais sobre Preparated Statements, leia: https://www.codigofonte.com.br/artigos/evite-sql-injection-usando-prepared-statements-no-php
        $stmt = $this->conexao->prepare($sql);


        // Nesta etapa os bindValue são responsáveis por receber um valor e trocar em uma 
        // determinada posição, ou seja, o valor que está em 3, será trocado pelo terceiro ?
        // No que o bindValue está recebendo o model que veio via parâmetro e acessamos
        // via seta qual dado do model queremos pegar para a posição em questão.
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->email);
        $stmt->bindValue(3, $model->cpf);
        $stmt->bindValue(4, $model->data_nascimento);
        $stmt->bindValue(5, $model->senha);

         // Ao fim, onde todo SQL está montando, executamos a consulta.
        $stmt->execute();

        $model->id = $this->conexao->lastInsertId();

        return $model;
    }


    /**
     * 
     */
    private function update(CorrentistaModel $m) {

    }


    /**
     * Retorna um registro específico da tabela pessoa do banco de dados.
     * Note que o método exige um parâmetro $id do tipo inteiro.
     */
    public function selectByCpfAndSenha($cpf, $senha) : CorrentistaModel
    {
        $sql = "SELECT * FROM correntista WHERE cpf = ? AND senha = sha1(?) ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $cpf);
        $stmt->bindValue(2, $senha);
        $stmt->execute();

        /**
         * Aqui estamos organizando os dados vindos do banco como um Model CorrentistaModel
         * mas se a query não tiver nenhum resultado fetchObject retorna um bool false e portanto,
         * neste caso fetchObject pode retornar um objeto ou um bool.
         */
        $obj = $stmt->fetchObject("App\Model\CorrentistaModel");

        /**
         * Aqui verificamos se o retorno do banco foi um objeto do tipo model
         * (portando o usuário colocou CPF e Senha corretos e um resultado foi encontrado) ou
         * um bool false, que indica que nenhum resultado foi encontrado.
         * Se for um bool, nós iremos retornar um model Vazio (por padrão as propriedades são null)
         * e iremos verificar no App se a propriedade Id é null ou não.
         */
        return is_object($obj) ? $obj : new CorrentistaModel();
    }
}