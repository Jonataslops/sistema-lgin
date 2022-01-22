<?php
require_once '<classes/usuarios.php';
$u = new Usuario;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="corpo-form">
    <h1> Entrar </h1>
    <form method="POST">
        <input type="email" placeholder="Usuário" name="email">
        <input type="password" placeholder="Senha"name="senha">
       
        <button class="btn-login">Acessar</button>

        <a href="cadastro.php">Ainda não é inscrito?<strong> Cadastre-se!</strong>

    </form>
</div>
<?php
if(isset($_POST['email']))
{
    
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    
    if(!empty($email) && !empty($senha))
    {
        $u->conectar("login","localhost","root", "");
        if ($u->msgErro == "")
        {
            if($u->logar($email,$senha))
            {
                header ("location: AreaPrivada.php");
            }
            else
            {
            ?>
                <div class="msg-erro">
                Email e/ou senha Incorretos!
                </div>
            <?php
            }
        }
        else
        {
            echo "Erro: ".$u->msgErro;
        }
    }else
    {
        ?>
        <div class="msg-erro">
        Preencha todos os campos!
    </div>
        <?php
    }

}
?>
</body>
</html>