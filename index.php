<?php

session_start();

require 'conexao.php';

$message = '';


if(isset($_POST["login"]))
{
    if(empty($_POST["email"]) || empty($_POST["senha"]))
    {
        $message = "<label>Favor preencher todos os dados!</label>";
    } else {
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $query = "SELECT * FROM usuarios WHERE email = :email AND passwd = :senha";
        $stmt = Conexao::getInstance()->prepare($query);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":senha", $senha);
        $stmt->execute();

        $count = $stmt->rowCount();

        if($count > 0){
            $_SESSION["email"] = $_POST["email"];
            header("Location: login_success.php");
        } else {
            $message = "<label>E-mail ou senha são inválidos!</label>";
        }
    }

}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Controle de Acesso</title>
</head>

<body>

    <?php

    if(isset($message)){
        echo '<label class="text-danger">'.$message.'</label>';
    }


    ?>

    <form class="form-signin" method="POST">
        <div class="card">

            <div class="card-top"></div>
                <img class="imglogin" src="img/user-login.jpg" alt="login">
                <h2 class="title">Painel de Acesso</h2>

            <div class="card-group">
                <label>E-mail</label>
                <input type="email" name="email" placeholder="Digite seu e-mail" >

            </div>

            <div class="card-group">
                <label>Senha</label>
                <input type="password" name="senha" placeholder="Digite sua senha" >

            </div>

            <div class="card-group">
                <label><input type="checkbox"> Lembre-me</label>
               
            </div>

            <div class="card-group btn">
                <button type="submit" name="login" value="login">Acessar</button>
               
            </div>
            <div class="card-group btn">
                
                <button type="submit"><a href="cadastre.php">Cadastre-se</a></button>
                
            </div>
        </div>

    </form>

</body>

</html>