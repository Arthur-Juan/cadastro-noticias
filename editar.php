<?php
require __DIR__ .'/vendor/autoload.php';

use \App\Entity\Noticias;
use \App\Session\Login;

//OBRIGA O USUÁRIO A ESTAR LOGADO

Login::requireLogin();


define('TITLE', 'Editar Notícia');

//VALIDAÇÃO DO ID
if( ! isset($_GET['id']) or ! is_numeric($_GET['id'])){
    header("location: index.php?status=error");
    exit;
}

//CONSULTA A NOTICIA NO BANCO DE DADOS
$obNoticia = Noticias::getNoticia($_GET['id']);

//VALIDAÇÃO DA NOTICIA

if(! $obNoticia instanceof Noticias){
    header('location: index.php?status=error');
    exit;
}
/**
 * Seta os inputs do usuário nas variaveis da classe
 */
if(isset($_POST['titulo'], $_POST['conteudo'], $_POST['categoria'])){
    
    $obNoticia = new Noticias();
    $obNoticia->titulo      = $_POST['titulo'];
    $obNoticia->conteudo    = $_POST['conteudo'];
    $obNoticia->categoria   = $_POST['categoria'];
    
    $obNoticia->atualizar();
    
    header('location: index.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';