<?php

session_start();

if(isset($_SESSION["email"])){
    echo "<h3>Login efetuado com sucesso, seja bem-vindo ". $_SESSION["email"] . "</h3>";

    echo '<br><br><a href="logout.php">Sair</a>';
} else {
    header("Location: index.php");
}