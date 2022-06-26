<?php
    header("Location: ../area-restrita/crud-agendamento.php");
    require_once("../model/Agenda.php");

    $id = $_POST['txtId'];
    $paciente = $_POST['paciente'];
    $profissional = $_POST['profissional'];
    $data = $_POST['txtData'];
    $hora = $_POST['txtHora'];

    $agenda = new Agenda();

    $agenda->editar($id, $paciente, $profissional, $data, $hora);

?>
