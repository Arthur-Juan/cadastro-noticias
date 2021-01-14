



<main class='text-light'>
<h2><?=TITLE?></h2>


<form method="post">
    <div class='form-group'>
    <p>Confirmar exclusão da notícia <strong><?=$obNoticia->titulo?></strong>?</p> 
    </div>

     <div class='form-group'>
    <a href="index.php">
        <button type='button' class='btn btn-success'>Cancelar</button>    
    </a>

        <button class='btn btn-danger' name='excluir'>Excluir</button>
    </div>
</form>
</main>