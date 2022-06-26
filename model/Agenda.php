<?php

    require_once("Conexao.php");
    require_once("Paciente.php");
    require_once("Profissional.php");

    class Agenda{
        private $idagenda;
        private $dtagenda;
        private $horaagenda;
        private $paciente;
        private $profissional;

        public function getIdAgenda(){
            return $this->idagenda;
        }
        public function setIdAgenda($idagenda){
            $this->idagenda = $idagenda;
        }
        public function getDtAgenda(){
            return $this->dtagenda;
        }
        public function setDtAgenda($dtagenda){
            $this->dtagenda = $dtagenda;
        }
        public function getHoraAgenda(){
            return $this->horaagenda;
        }
        public function setHoraAgenda($horaagenda){
            $this->horaagenda = $horaagenda;
        }
        public function getIdPaciente(){
            return $this->Idpaciente;
        }
        public function setIdPaciente($paciente){
            $this->Idpaciente = $paciente;
        }
        public function getIdProfissional(){
            return $this->Idprofissional;
        }
        public function setIdProfissional($profissional){
            $this->Idprofissional = $profissional;
        }

        public function cadastrar($agenda){
            $conexao = Conexao::conectar();

            $stmt = $conexao->prepare("INSERT INTO tbagenda(dtagenda, horaagenda,
                            idPaciente, idProfissional) VALUES(?, ?, ?, ?)");

            $stmt->bindValue(1, $agenda->getDtAgenda());
            $stmt->bindValue(2, $agenda->getHoraAgenda());
            $stmt->bindValue(3, $agenda->getIdPaciente());
            $stmt->bindValue(4, $agenda->getIdProfissional());
            
            $stmt->execute();
        }

        public function listar(){
            $conexao = Conexao::conectar();
            $querySelect = "SELECT idagenda, dtagenda, horaagenda, 
                            nomePaciente, nomeProfissional FROM tbagenda
                             INNER JOIN tbPaciente ON tbPaciente.idPaciente = tbagenda.idPaciente
                             INNER JOIN tbProfissional ON tbProfissional.idProfissional = tbagenda.idProfissional";
            $resultado = $conexao->query($querySelect);
            $lista_agenda = $resultado->fetchAll();
            return $lista_agenda;   
        }

        public function deletar($idagenda) {
            $conexao = Conexao::conectar();
            $querySelect = "DELETE FROM tbAgenda WHERE idAgenda = $idagenda";
            $resultado = $conexao->query($querySelect);
            return  $resultado;
        }

        public function editar($idagenda, $nomePaciente, $nomeProfissional, $data, $hora) {
            $conexao = Conexao::conectar();
            $querySelect = "UPDATE tbAgenda SET 
            idPaciente = '$nomePaciente', 
            idProfissional = '$nomeProfissional',
            dtAgenda = '$data',
            horaAgenda = '$hora'
            WHERE idAgenda = $idagenda";
            $resultado = $conexao->query($querySelect);
            return  $resultado;
        }

}

?>