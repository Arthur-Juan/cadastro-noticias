<?php

namespace App\Entity;

use \App\Database\Database;

class Noticias{


    /**
     * Identificador único da noticia
     * @var integer
     */
    public $id;

    /**
     * Título da vaga
     * @var string
     */
    public $titulo;

    /**
     * Conteúdo da noticia
     * @var string
     */
    public $conteudo;

    /**
     * Categoría da noticia
     */
    public $categoria;

    /**
     * Método responsável por cadastrar uma nova noticia no banco de dados
     * @return boolean
     */
    public function cadastrar(){
        
        //INSERIR A NOTICIA NO BANCO
        $obDatabase = new Database('noticias');
        //INSERE NO BANCO DE DADOS POR UM ARRYA ASSOCIATIVO, ONDE A CHAVE É O NOME DA CATEGORIA DO BANCO 
        //E O VALOR O NOME DO CONTEUDO
        $this->id = $obDatabase->insert([

            'titulo'=>$this->titulo,
            'conteudo'=>$this->conteudo,
            'categoria'=>$this->categoria
        ]);

        //RETORNAR SUCESSO

        return true; 
    }
}
