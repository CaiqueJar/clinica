<?php

    require_once('Conexao.php');

    class Profissional{

        private $idProfissional;
        private $nomeProfissional;
        private $cpfProfissional;
        private $rgProfissional;


        public function getIdProfissional() {
            return $this->idProfissional;
        }

        public function setIdProfissional($idProfissional) {
            $this->idProfissional = $idProfissional;
        }

        public function getNomeProfissional (){
            return $this->nomeProfissional;

        }

        public function setNomeProfissional($nomeProfissional){
            $this -> nomeProfissional = $nomeProfissional;

        }

        public function getCpfProfissional (){
            return $this->cpfProfissional;

        }

        public function setCpfProfissional($cpfProfissional){
            $this -> cpfProfissional = $cpfProfissional;

        }

        public function getRgProfissional (){
            return $this->rgProfissional;

        }

        public function setRgProfissional($rgProfissional){
            $this -> rgProfissional = $rgProfissional;

        }
        

        public function cadastrar($profissional){
            // $conexao = Conexao::conectar();
            $conexao = Conexao::conectar();
            $stmt = $conexao -> prepare ("INSERT INTO tbProfissional (nomeProfissional, cpfProfissional, rgProfissional)
            VALUES (?, ?, ?)");


            $stmt -> bindValue (1, $profissional->getNomeProfissional());
            $stmt -> bindValue (2, $profissional->getCpfProfissional());
            $stmt -> bindValue (3, $profissional->getRgProfissional());
            $stmt -> execute();

        }

        public function listar(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idProfissional, nomeProfissional,
             cpfProfissional, rgProfissional FROM tbProfissional";
            $resultado = $conexao->query($querySelect);
            $lista_profissionais = $resultado->fetchAll();
            return $lista_profissionais;   
        }

        public function deletar($idProfissional) {
            $conexao = Conexao::conectar();
            $querySelect = "DELETE FROM tbProfissional WHERE idprofissional = $idProfissional";
            $resultado = $conexao->query($querySelect);
            return  $resultado;
        }

        public function editar($idProfissional, $nomeProfissional, $cpfProfissional, $rgProfissional) {
            $conexao = Conexao::conectar();
            $querySelect = "UPDATE tbProfissional SET cpfProfissional = '$cpfProfissional', rgProfissional = '$rgProfissional', nomeProfissional = '$nomeProfissional' WHERE idprofissional = $idProfissional";
            $resultado = $conexao->query($querySelect);
            return  $resultado;
        }

    }

?>