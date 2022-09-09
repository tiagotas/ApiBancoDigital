<?php

namespace App\Controller;

/**
 * Definimos aqui que nossa classe precisa incluir uma classe de outro subnamespace
 * do projeto, no caso a classe PessoaModel do subnamespace Model
 */
use App\Model\ClienteModel;


/**
 * Classes Controller são responsáveis por processar as requisições do usuário.
 * Isso significa que toda vez que um usuário chama uma rota, um método (função)
 * de uma classe Controller é chamado.
 * O método poderá devolver uma View (fazendo um include), acessar uma Model (para
 * buscar algo no banco de dados), redirecionar o usuário de rota, ou mesmo,
 * chamar outra Controller.
 */
class ClienteController extends Controller
{
    /**
     * Preenche um Model para que seja enviado ao banco de dados para salvar.
     */
    public static function login()
    {
        // Transformando os dados da entrada enviada do app em
        // JSON para um objeto em PHP.
        $data = json_decode(file_get_contents('php://input'));


       // Abaixo cada propriedade do objeto sendo abastecida com os dados informados
       // pelo usuário no formulário (note o envio via POST)
       $model = new ClienteModel();

       // Copiando para a Model 
       $model->id_categoria = $data->id_categoria;
       $model->id_cidadao = $data->id_cidadao;
       $model->id_bairro = $data->id_bairro;
       $model->descricao = $data->descricao;
       $model->titulo = $data->titulo;
       $model->endereco = $data->endereco;
       $model->latitude = $data->latitude;
       $model->longitude = $data->longitude;  

       
       /**
        * A cópia também poderia ser feita de forma dinâmica assim:

        * foreach (get_object_vars($object) as $key => $value) {
        *    $this->$key = $value;
        * }
        */

       $model->save(); // chamando o método save da model.

       parent::setResponseAsJSON('Reclamação inserida com sucesso!');       
    }

    /**
     * Preenche um Model para que seja enviado ao banco de dados para salvar.
     */
    public static function salvar()
    {
        // Transformando os dados da entrada enviada do app em
        // JSON para um objeto em PHP.
        $data = json_decode(file_get_contents('php://input'));


       // Abaixo cada propriedade do objeto sendo abastecida com os dados informados
       // pelo usuário no formulário (note o envio via POST)
       $model = new ClienteModel();

       // Copiando para a Model 
       $model->id_categoria = $data->id_categoria;
       $model->id_cidadao = $data->id_cidadao;
       $model->id_bairro = $data->id_bairro;
       $model->descricao = $data->descricao;
       $model->titulo = $data->titulo;
       $model->endereco = $data->endereco;
       $model->latitude = $data->latitude;
       $model->longitude = $data->longitude;  

       
       /**
        * A cópia também poderia ser feita de forma dinâmica assim:

        * foreach (get_object_vars($object) as $key => $value) {
        *    $this->$key = $value;
        * }
        */

       $model->save(); // chamando o método save da model.

       parent::setResponseAsJSON('Reclamação inserida com sucesso!');       
    }
}