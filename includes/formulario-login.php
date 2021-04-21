<?php

$alertaLogin = strlen($alertaLogin) ? '<div class="alert alert-danger">'.$alertaLogin.'</div>' :'';
$alertaCadastro = strlen($alertaCadastro) ? '<div class="alert alert-danger">'.$alertaCadastro.'</div>' :'';

?>


<div class="jumbotron text-dark">

    <div class="row">

        <div class="col">
        
        <form method="post">
            <h2>Login</h2>  
            <?=$alertaLogin?>

            <div class="form-group">
                <label>E-mail:</label>
                <input class='form-control' type="email" name="email" id="email" required>
            </div>
           
            <div class="form-group">
                <label>Senha:</label>
                <input class='form-control' type="password" name="senha" id="senha" required>
            </div>
          
            <div class="form-group">
            <button type="submit" class="btn btn-primary" name='acao' value="logar">Logar</button>
            </div>

        </form>
        
        </div>

        <div class="col">
        <form method="post">
            <h2>Cadastrar</h2>
            <?=$alertaCadastro?>
            <div class="form-group">
                <label>Nome:</label>
                <input class='form-control' type="text" name="nome" id="nome" required>
            </div>

            <div class="form-group">
                <label>E-mail:</label>
                <input class='form-control' type="email" name="email" id="email" required>
            </div>
           
            <div class="form-group">
                <label>Senha:</label>
                <input class='form-control' type="password" name="senha" id="senha" required>
            </div>
          
            <div class="form-group">
            <button type="submit" class="btn btn-primary" name='acao' value="cadastrar">Cadastrae</button>
            </div>

        </form>
        </div>

    </div>

</div>