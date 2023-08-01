<?php

namespace App\Model;

use App\DAO\ChavePixDAO;

class ChavePixModel extends Model
{
    public $id, $id_conta, $tipo, $chave;

    public function save() : ?ChavePixModel
    {
        return (new ChavePixDAO())->save($this);
    }

    public function remove() : bool
    {
        return (new ChavePixDAO())->delete($this);  
    }
}