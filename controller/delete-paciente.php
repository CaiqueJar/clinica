
<?php
    header("Location: ../area-restrita/crud-paciente.php");
    require_once("../model/Paciente.php");

     $id = $_POST['txtId'];

    $paciente = new Paciente();
    $paciente->deletar($id);

?> 

