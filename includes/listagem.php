<?php
$resultados = '';

foreach ($noticias as $noticia){
    $resultados .= ' <div class="col-md-4">
     <div class="card mb-4 shadow-sm">
                
    <div class="card-body">
        <h5 class="card-body">'.$noticia->titulo.'<h5>
        <h6 class="card-subtitle mb-2 text-muted">'.$noticia->categoria.'</h6>
      <p class="card-text">'.$noticia->conteudo.'</p>
      <div class="d-flex justify-content-between align-items-center">
        <div class="btn-group">
          <a href ="excluir.php?id='.$noticia->id.'" class="btn btn-sm btn-outline-danger mr-1">Excluir</a>
          <a href="editar.php?id='.$noticia->id.'" class="btn btn-sm btn-outline-info">Editar</a>
        </div>
      </div>
    </div>
  </div>
  </div>';
}

?>


<main>


<div class=" py-5 bg-light rounded">
        <div class="container">

          <div class="row">
           
             <?=$resultados?>
         
          </div>
        </div>






</main>