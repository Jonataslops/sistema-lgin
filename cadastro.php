<?php
    require_once 'classes/usuarios.php';
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
    <div id="corpo-form-cad">
    <h1> Cadastro </h1>
    <form method="POST">
        <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
        <input type="text" name="telefone" placeholder="Telefone" maxlength="30">
        <input type="email" name="email" placeholder="e-mail" maxlength="40">
        <input type="password" name="senha" placeholder="Senha" maxlength="15">
        <input type="Password" name="confsenha" placeholder="Confirmar Senha">
        <button class="btn-login">Cadastrar</button>

    </form>
</div>
<?php
    if(isset($_POST['nome']))
{
    $nome = addslashes($_POST['nome']);
    $telefone = addslashes($_POST['telefone']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $confirmarSenha = addslashes($_POST['confsenha']);
    //verificar se está preenchido
    if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty ($confirmarSenha))
    {
        $u->conectar("login","localhost","root", "");
        if($u->msgErro =="")//se não tiver nenhum erro
        {
            if($senha == $confirmarSenha)
            {
               if ($u->cadastrar($nome,$telefone,$email,$senha))
               {
                   ?>
                   <div id="msg-sucesso">
                    Email e Senha cadastrado com Sucesso!
                    <?php
               }
               else{
                   ?>
                   <div class="msg-erro">
                   Email já cadastrado
                   <?php
               }
            }
            else
            {
                echo "As senhas não correspodem!" ?>
                <div class="msg-erro">
                As senhas não correspondem!
                <?php
            }
        }
        else
    {
        echo "Erro:".$u->msgErro;
    }
    }else
    {
        ?>
        <div class="msg-erro">
        
        Preencha todos os campos!
        <?php
    }

}



?>
</body>
</html>