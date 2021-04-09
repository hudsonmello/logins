<?php

require 'conexao.php';
require 'model.php';

if(isset($_POST["cadastro"]))
{
    if(empty($_POST["nome"]) || empty($_POST["email"]) || empty($_POST["senha"]))
    {
        $message = "<label>Favor preencher todos os dados!</label>";
    } else {

        $u = new Model();

        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        
        $user = $u->create($nome, $email, $senha);

    }

    header("Location: index.php");

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

    <form class="form-signin" method="post">
        <div class="card">

            <div class="card-top"></div>
                <img class="imglogin" src="img/user-login.jpg" alt="login">
                <h2 class="title">Cadastro de Usuário</h2>

            <div class="card-group">
                <label>Nome</label>
                <input type="text" name="nome" placeholder="Digite seu nome" >

            </div>

            <div class="card-group">
                <label>E-mail</label>
                <input type="email" name="email" placeholder="Digite seu e-mail" >

            </div>

            <div class="card-group">
                <label>Senha</label>
                <input type="password" name="senha" placeholder="Digite sua senha" >

            </div>

            <div class="card-group btn">
                <button type="submit" name="cadastro" value="cadastro">Cadastrar</button>
       
        </div>

    </form>

</body>

</html>


