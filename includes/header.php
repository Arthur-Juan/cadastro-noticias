<?php

  use \App\Session\Login;

  $usuarioLogado = Login::getUsuarioLogado();


  //DETALHES DO USUARIO 
  $usuario = $usuarioLogado ? '<div class="dropdown mr-5">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  '.$usuarioLogado['nome'].'
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="logout.php">Deslogar</a>
  
  </div>' : 
  '<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  Visitante
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="login.php">Logar</a>
  
  </div>' 
?>


<!doctype html>
<html lang="pt_BR">
  <head>
    <title>Noticias</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body class='bg-dark'>

  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow p-3 mb-5 bg-white rounded">
  <a class="navbar-brand" href='index.php'>Noticias</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="cadastrar.php">Cadastrar notícia <span class="sr-only">(current)</span></a>
      </li>
    
      

      </li>
      <li class="nav-item">
    
</div>
      </li>
    </ul>
    <div class="d-flex justify-content-end"> 
      <?=$usuario?>
    </div>
    
  </div>
</nav>

<div class='container'>

   