<?php
require __DIR__ .'/vendor/autoload.php';

use \App\Entity\Noticias;
$obNoticia = new Noticias();
$busca ='';

define('TITLE', 'Cadastrar Notícia');
/**
 * Seta os inputs do usuário nas variaveis da classe
 */
if(isset($_POST['titulo'], $_POST['conteudo'], $_POST['categoria'])){
    
    $obNoticia->titulo      = $_POST['titulo'];
    $obNoticia->conteudo    = $_POST['conteudo'];
    $obNoticia->categoria   = $_POST['categoria'];
    
    $obNoticia->cadastrar();
    
    header('location: index.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';