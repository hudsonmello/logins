<?php

session_start();

use \PDO;
use \PDOException;

class Conexao
{
    // constantes usadas na conexão com o banco de dados
    private const HOST = "localhost";
    private const USER = "root";
    private const DBNAME = "crud";
    private const PASSWD = "root";

    private const OPTIONS = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, // converter qualquer result como objeto
        PDO::ATTR_CASE => PDO::CASE_NATURAL // manter os mesmos nomes das colunas da tabela do banco
    ];

    // armazena o objeto PDO e garante apenas uma única conexão
    private static $instance;

    /**
     * @return PDO
     */
    public static function getInstance(): PDO
    {
        if (empty(self::$instance)) {
            try {
                self::$instance = new PDO(
                    "mysql:host=" . self::HOST . ";dbname=" . self::DBNAME,
                    self::USER,
                    self::PASSWD,
                    self::OPTIONS
                );
            } catch (PDOException $exception) {
                die("<h1>Whoops! Erro ao conectar...</h1>");
            }
        }

        return self::$instance;
    }

    // rotinas que não podem ser executadas mesmo que herdadas
    final private function __construct()
    {
    }

    final private function __clone()
    {
    }
}
