<?php

    require_once('Conexao.php');

    class Paciente {

        private $idPaciente;
        private $nomePaciente;
        private $cpfPaciente;
        private $dataNascPaciente;
        private $emailPaciente;
        private $fonePaciente;
        private $celularPaciente;
        private $rgPaciente;

        public function getNomePaciente() {
            return $this->nomePaciente;
        }

        public function setNomePaciente($nomePaciente) {
            $this->nomePaciente = $nomePaciente;
        }

        public function getIdPaciente() {
            return $this->idPaciente;
        }

        public function setIdPaciente($idPaciente) {
            $this->nomePaciente = $idPaciente;
        }

        public function getCpfPaciente() {
            return $this->cpfPaciente;
        }

        public function setCpfPaciente($cpfPaciente) {
            $this->cpfPaciente = $cpfPaciente;
        }

        public function getDataNascPaciente() {
            return $this->dataNascPaciente;
        }

        public function setDataNascPaciente($dataNascPaciente) {
            $this->dataNascPaciente = $dataNascPaciente;
        }

        public function getEmailPaciente() {
            return $this->emailPaciente;
        }

        public function setEmailPaciente($emailPaciente) {
            $this->emailPaciente = $emailPaciente;
        }

        public function getFonePaciente() {
            return $this->fonePaciente;
        }

        public function setFonePaciente($fonePaciente) {
            $this->fonePaciente = $fonePaciente;
        }

        public function getCelularPaciente() {
            return $this->celularPaciente;
        }

        public function setCelularPaciente($celularPaciente) {
            $this->celularPaciente = $celularPaciente;
        }

        public function getRgPaciente() {
            return $this->rgPaciente;
        }

        public function setRgPaciente($rgPaciente) {
            $this->rgPaciente = $rgPaciente;
        }


        public function cadastrar($paciente){
            // $conexao = Conexao::conectar();
            $conexao = Conexao::conectar();
            $stmt = $conexao -> prepare ("INSERT INTO tbPaciente (nomePaciente, cpfPaciente,dataNasc,emailPaciente, rgPaciente, telefonePaciente, celPaciente  )
            VALUES (?, ?, ?, ?, ?, ?, ? )");


            $stmt -> bindValue (1, $paciente->getNomePaciente());
            $stmt -> bindValue (2, $paciente->getCpfPaciente());
            $stmt -> bindValue (3, $paciente->getDataNascPaciente());
            $stmt -> bindValue (4, $paciente -> getEmailPaciente());
            $stmt -> bindValue (5, $paciente -> getRgPaciente());
            $stmt -> bindValue (6, $paciente -> getFonePaciente());
            $stmt -> bindValue (7, $paciente -> getCelularPaciente());


            $stmt -> execute();

        }

        public function listar(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idpaciente, nomepaciente,
             cpfPaciente, dataNasc, emailPaciente, rgPaciente,
              telefonePaciente, celPaciente FROM tbpaciente";
            $resultado = $conexao->query($querySelect);
            $lista = $resultado->fetchAll();
            return $lista;   
        }


    }
?>