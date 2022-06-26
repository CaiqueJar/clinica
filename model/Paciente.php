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
            $this->idPaciente = $idPaciente;
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
            $querySelect = "SELECT idPaciente, nomePaciente,
             cpfPaciente, dataNasc, emailPaciente, rgPaciente,
              telefonePaciente, celPaciente FROM tbPaciente";
            $resultado = $conexao->query($querySelect);
            $lista_paciente = $resultado->fetchAll();
            return $lista_paciente;   
        }

        public function deletar($idPaciente) {
            $conexao = Conexao::conectar();
            $querySelect = "DELETE FROM tbPaciente WHERE idPaciente = $idPaciente";
            $resultado = $conexao->query($querySelect);
            return  $resultado;
        }

        public function editar($idPaciente, $nomePaciente, $data, $cpfPaciente, $email, $telefone, $celular, $rgPaciente) {
            $conexao = Conexao::conectar();
            $querySelect = "UPDATE tbPaciente SET 
            cpfPaciente = '$cpfPaciente', 
            rgPaciente = '$rgPaciente', 
            nomePaciente = '$nomePaciente',
            emailPaciente = '$email',
            dataNasc = '$data',
            telefonePaciente = '$telefone',
            celPaciente = '$celular' 
            WHERE idPaciente = $idPaciente";
            $resultado = $conexao->query($querySelect);
            return  $resultado;
        }

    }
?>