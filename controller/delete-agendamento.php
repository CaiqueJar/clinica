
<?php
    header("Location: ../area-restrita/crud-agendamento.php");
    require_once("../model/Agenda.php");

     $id = $_POST['txtId'];

    $agenda = new Agenda();
    $agenda->deletar($id);

?> 

