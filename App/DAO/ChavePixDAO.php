<?php

namespace App\DAO;

use App\Model\ChavePixModel;
use PDO;

class ChavePixDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();       
    }

    public function save(ChavePixModel $model) : ?ChavePixModel
    {
        return ($model->id == null) ? $this->insert($model) : $this->update($model);
    }

    /**
     * Método que recebe um model e extrai os dados do model para realizar o insert
     * na tabela correspondente ao model. Note o tipo do parâmetro declarado.
     */
    public function insert(ChavePixModel $model) : ?ChavePixModel
    {
        $sql = "INSERT INTO chave_pix (id_conta, tipo, chave) VALUES (?, ?, ?) ";
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->id_conta);
        $stmt->bindValue(2, $model->tipo);
        $stmt->bindValue(3, $model->chave);

        $stmt->execute();

        $model->id = $this->conexao->lastInsertId();

        return $model;
    }


    /**
     * Método que recebe o Model preenchido e atualiza no banco de dados.
     * Note que neste model é necessário ter a propriedade id preenchida.
     */
    public function update(ChavePixModel $model) : ?ChavePixModel
    {
        $sql = "UPDATE chave_pix SET id_conta=?, tipo=?, chave=? WHERE id=? ";
        $stmt = $this->conexao->prepare($sql);

        $stmt->bindValue(1, $model->id_conta);
        $stmt->bindValue(2, $model->tipo);
        $stmt->bindValue(3, $model->chave);
        $stmt->bindValue(3, $model->id);

        $stmt->execute();

        $model->id = $this->conexao->lastInsertId();

        return $model;
    }


    /**
     * Método que retorna todas os registros da tabela pessoa no banco de dados.
     */
    public function select(int $id_conta)
    {
        $sql = "SELECT * FROM chave_pix WHERE id_conta = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id_conta);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);        
    }

    /**
     * Remove um registro da tabela pessoa do banco de dados.
     * Note que o método exige um parâmetro $id do tipo inteiro.
     */
    public function delete(ChavePixModel $model) : bool
    {
        $sql = "DELETE FROM chave_pix WHERE id=? AND id_conta=? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->id);
        $stmt->bindValue(1, $model->id_conta);
        
        return $stmt->execute();
    }
}