<?php

namespace App\Entity;

class Pagination{

    /**
     * número máximo de registros por páginas
     * @var integer
     */
    private $limit;

    /**
     * Quantidade total de resultados do banco
     * @var integer
     */
    private $results;

    /**
     * Quantidade de páginas
     * @var integer
     */
    private $pages;

    /**
     * Pagina atual
     * @var integer
     */
    private $currentPage;

    /**
     * construtor da classe
     */
    public function __construct($results, $currentPage = 1, $limit = 10){
        $this->results = $results;
        $this->currentPage = (is_numeric($currentPage) and $currentPage > 0) ? $currentPage : 1;

        $this->limit = $limit;

        $this->calculate();
    }

    /**
     * calcula o total de paginas
     */
    public function calculate(){
        $this->pages = $this->results > 0 ? ceil($this->results/$this->limit) : 1;
        //ceil arredonta o resultado pra cima

        //VERIFICA SE  A PAGINA ATUAL EXCEDE O NÚMERO DE PÁGINAS   
        $this->currentPage = $this->currentPage <= $this->pages ? $this->currentPage : $this->pages;
       
        
    }

    /**
     * Método reponsável por retornar a cláusula limit do sql
     * @return string
     */
    public function getLimit(){
        $offset = ($this->limit *($this->currentPage - 1));
       
        return $offset . ','. $this->limit;
    }

    /**
     * Método responsável por retornar as opções de páginas disponpiveis
     * @return array
     */
    public function getPages(){
        //NÃO RETORNA PÁGINAS
        if($this->pages ==1){
            return [];
        }

        //PAGINAS
        $paginas = [];

        for($i = 1;$i <= $this->pages; $i++){
           
            $paginas[] = [
                'pagina' => $i,
                'atual' => $i == $this->currentPage
            ];

        }

        return $paginas;
    }

   

  
}