<?php

    class Profissional{

        private $idProfissional;
        private $nomeProfissional;
        private $cpfProfissional;
        private $rgProfissional;

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
        

    }

?>