<?php

namespace App\Session;

class Login{


    /**
     * Inicia a sessão
     */
    public static function init(){

        //VERIFICA SE JA EXISTE UMA SESSÃO, SE NÃO, INICIA UMA
        if(session_status() !== PHP_SESSION_ACTIVE){
            session_start();
        }
    }
    
        /**
        * Loga o usuário e cria a sessão
      *@param Usuario
          */
    public static function login($obUsuario){
        //INICIA A SESSÃO
        self::init();

        //SESSÃO DE USUÁRIO
        $_SESSION['usuario']=[
            'id' =>$obUsuario->id,
            'nome'=>$obUsuario->nome,
            'email'=>$obUsuario->email
        ];

        //ENVIA USUÁRIO PARA INDEX
        header('location: index.php');
        exit;
    }

    //DESLOGA O USUÁRIO
    public static function logout(){
        self::init();
      
        //MATA A SESSÃO DO USUÁRIO
        unset($_SESSION['usuario']);

        header('location: login.php');
        exit;

    }

    /**
     * Retorna os dados do usuário logado
     */
    public static function getUsuarioLogado(){
        self::init();

        return self::isLogged() ? $_SESSION['usuario'] : null;


    }
    
    /**
     * Verifica se o usuário está logado
     */
     public static function isLogged(){
        self::init();   

        //VALIDA A SESSÃO
        return isset($_SESSION['usuario']['id']);
     }


     /**
      * Obriga o usuário a estar logado para acessar
      */
     public static function requireLogin(){
        if(!self::isLogged()){
            header('location: login.php');
            exit;
        }
     }

     /**
      * Obriga o usuário a estar deslogado
      */
     public static function requireLogout(){
        if(self::isLogged()){
            header('location: index.php');
            exit;
        }
     }

}