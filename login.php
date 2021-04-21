<?php
require __DIR__ .'/vendor/autoload.php';

use \App\Session\Login;
use \App\Entity\Usuario;

//OBRIGA O USUÁRIO A ESTAR LOGADO

Login::requireLogout();

//MENSAGEM DE ALERTA DOS FORMULÁRIOS
$alertaLogin = '';
$alertaCadastro ='';

//VALIDAÇÃO DO POST
if(isset($_POST['acao'])){
    switch($_POST['acao']){

        case 'logar':
            //BUSCA USUÁRIO POR EMAIL
            $obUsuario = Usuario::getUsuarioPorEmail($_POST['email']);

            if(!$obUsuario instanceof Usuario || !password_verify($_POST['senha'], $obUsuario->senha)){
                $alertaLogin = "E-mail ou senha inválidos!";

                break;
            }
            //LOGA O USUARIO
            Login::login($obUsuario);
            break;

        case 'cadastrar':
               //BUSCA USUÁRIO POR EMAIL
               $obUsuario = Usuario::getUsuarioPorEmail($_POST['email']);
                if($obUsuario instanceof Usuario){
                    $alertaCadastro = 'O e-mail digitado já está sendo usado!';
                    break;
                }

            if(isset($_POST['nome'], $_POST['email'], $_POST['senha'])){

                $obUsuario = new Usuario();
                $obUsuario->nome = $_POST['nome'];
                $obUsuario->email = $_POST['email'];
                $obUsuario->senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

                $obUsuario->cadastrar();

                 //LOGA O USUARIO
                Login::login($obUsuario);

                
                
            }


            break;


    }


}

define('TITLE', 'Login');



include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario-login.php';
include __DIR__ . '/includes/footer.php';