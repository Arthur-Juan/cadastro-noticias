<?php
namespace App\Database;

use \PDO;
use \PDOException;

class Database{

    /**
     * Host de conexão com o banco de dados
     * @var string
     */
    const HOST='localhost';

    /**
     * Nome do banco de dados
     * @var string
     */
    const NAME = 'noticias';

    /**
     * Usuário do banco de dados
     */
    const USER = 'root';

    /**
     * Senha de acesso ao banco de dados
     */
    const PASS = '';

    /**
     * nome da tabela a ser manipulada
     * @var string
     */
    
    private $table;
    /**
     * Instancia da conexão com o banco de dados
     * @var PDO
     */
    private $connection;

    /**
     * Define a tabela e instancia a conexão
     * @param string $table
     */
    public function __construct($table = null){
        $this->table = $table;
        $this->setConnection();
    }

    /**
     * Método responsável por criar uma conexão como o banco de dados
     */
    private function setConnection(){
        try{
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die('ERROR '.$e->getMessage());
        }

    }

    /**
     * Método responsável por executar as querys dentro do banco de dados
     * @param string $query
     * @param array $params
     * @return PDOStatement
     */
    public function execute($query, $params=[]){
        try{
            $statement = $this->connection->prepare($query);//PREPARA A QUERY
            $statement->execute($params);//EXECURA A QUERY COM OS PARAMETROS
            return $statement;
        }catch(PDOException $e){
            die('ERROR '. $e->getMessage());
        }
    }

    /**
     * Metodo responsável por inserir dados no banco de dados
     * @param array $values [fild=>value]
     * @return integer $id
     */ 
    public function insert($values){
        //DADOS DA QUERY
        $fields =  array_keys($values); //filds pegou as chaves do array values
        $binds = array_pad([], count($fields), '?');
        
        //MONTA A QUERY
        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')'; //CADA ? É UM VALOR DINAMICO
        
        //EXECUTA O INSERT INTO
        $this->execute($query, array_values($values));

        //RETORNA O ID INSERIDO
        return $this->connection->lastInsertId();
    }
}