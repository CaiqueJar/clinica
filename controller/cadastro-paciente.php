
<?php
    header("Location: ../area-restrita/crud-paciente.php");
    require_once("../model/Paciente.php");

    $nome = $_POST["txtNome"];
    $cpf = $_POST["txtCpf"];
    $dataNasc = $_POST["txtData"];
    $email = $_POST ["txtEmail"];
    $tel = $_POST ["txtTelefone"];
    $cel = $_POST ["txtCelular"];
    $rg = $_POST ["txtRg"];

    $paciente = new Paciente();

    $paciente -> setNomePaciente($nome);

    $paciente -> setCpfPaciente($cpf);

    $paciente -> setDataNascPaciente($dataNasc);

    $paciente -> setEmailPaciente($email);

    $paciente -> setFonePaciente($tel);

    $paciente -> setCelularPaciente($cel);

    $paciente -> setRgPaciente($rg);

    $paciente->cadastrar($paciente);

?> 

