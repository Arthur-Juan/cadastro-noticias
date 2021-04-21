<?php

namespace App\Entity;
use \App\Database\Database;
use \PDO;

class Usuario{

    //ID DO USUARIO
    public $id;

    public $nome;

    public $email;

    //HASH DA SENHA
    public $senha;

    /**
     * Cadastra um novo usuário no banco
     * @return bool
     */
    public function cadastrar(){
        //DATABASE
        $obDatabase = new Database('usuarios');

        //INSERE UM NOVO USUÁRIO
        $this->id = $obDatabase->insert([

            'nome'=>$this->nome,
            'email'=>$this->email,
            'senha'=>$this->senha
        ]);

        return true;
    }


    /**
     * Retorna uma instância de usuário pelo email
     * @return Usuario
     */
    public static function getUsuarioPorEmail($email){
        return (new Database('usuarios'))->select('email = "'.$email .'"' )->fetchObject(self::class);
    }

}