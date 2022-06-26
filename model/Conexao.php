<?php

    class Conexao
    {
        public static function conectar()
        {
            /*
                $variavel = new PDO(
                    tipo:host=local; 
                    dbname=nome do banco,
                    usuário de acesso ao banco, 
                    senha de acesso ao banco
                )
            */
            $conexao = new PDO("mysql:host=localhost;
                                dbname=dbclinica", 
                                "root",
                                "20092004");
            $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexao->exec("SET CHARACTER SET utf8");
            
            return $conexao;
        }
    }
?>