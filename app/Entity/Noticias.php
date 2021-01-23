<?php

namespace App\Entity;

use \App\Database\Database;

use \PDO;
use \PDOException;

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

        //CHAMA A FUNÇÃO INSERT DO BANCO DE DADOS PASSANDO OS INPUTS DO USUARIO COMO PARAMETRO
        $this->id = $obDatabase->insert([

            'titulo'=>$this->titulo,
            'conteudo'=>$this->conteudo,
            'categoria'=>$this->categoria
        ]);

        //RETORNAR SUCESSO

        return true; 
    }

    public function atualizar(){
        return (new Database('noticias'))->update('id = '.$this->id,[
            'titulo'=>$this->titulo,
            'conteudo'=>$this->conteudo,
            'categoria'=>$this->categoria
                                                                  ]);
      }

      /**
       * Método responsável por excluir uma vaga do banco
       * @return boolean
       */
      public function excluir(){
        return (new Database('noticias'))->delete('id= '.$this->id);
      }
    
    //QUERY DE CONSULTA

    /**
     * Método responsável por obter as noticias do banco de dados
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */
    public static function getNoticias($where = null, $order = null, $limit = null){
        return (new Database('noticias'))->select($where, $order, $limit) //RETORNA O PDOStatement
                                        ->fetchAll(PDO::FETCH_CLASS, self::class); //MÉTODO QUE TRANSOFRMA A INSTANCIA EM ARRAY
    }

    /**
     * Método responsável por buscar uma vaga com base em seu base
     * @var integer $id
     * @return Noticia
     */
    public static function getNoticia($id){
        return (new Database('noticias'))->select("id= ".$id) //RETORNA O PDOStatement
        ->fetchObject(self::class); //TRANSOFRMA UMA POSIÇÃO DO BANCO EM OBJETO
    }

    /**
     * Método responsável por buscar uma vaga com base em seu base
     * @var integer $id
     * @return Noticia
     */
    public static function getQuantidadeNoticia($where = null){
        return (new Database('noticias'))->select($where, null, null, 'COUNT(*) as qtd')
        ->fetchObject()
        ->qtd;
    }


}
