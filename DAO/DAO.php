<?php

namespace APPAPI\DAO;

use Exception;
use PDO;
use PDOException;

abstract class DAO extends PDO
{

    public $conexao;
    public function __construct()
    {
        try {
            $options = [
                PDO::ATTR_ERRMODE => 'ERRMODE_EXCEPTION',
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
            ];
            $dsn = "mysql:host". $_ENV['db'] ['host'] .
                ";dbname=". $_ENV['db']['database'];

            $this->conexao = new PDO($dsn, $_ENV ['db']['user'],
            $_ENV['db']['pass'], $options);

              
        } catch (PDOException $e) {
            throw new   Exception("Ocorreu um erro ao tentar conectar ao MYSQL", 0, $e);
        }
    }
}
