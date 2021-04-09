<?php

use Conexao;

class Model{

    public function create($nome, $email, $senha){

            $sql = "INSERT INTO usuarios (nome, email, passwd) VALUES (:nome, :email, :senha)";
            $stmt = Conexao::getInstance()->prepare($sql);
            $stmt->bindValue(":nome", $nome);
            $stmt->bindValue(":email", $email);
            $stmt->bindValue(":senha", $senha);
            $stmt->execute();

            return $stmt;

    }
}