
<?php
    header("Location: ../area-restrita/crud-paciente.php");
    require_once("../model/Paciente.php");

    $id = $_POST['idProfissional'];
    $nome = $_POST["txtNome"];
    $data = $_POST["txtData"];
    $cpf = $_POST ["txtCpf"];
    $email = $_POST["txtEmail"];
    $telefone = $_POST["txtTelefone"];
    $celular = $_POST["txtCelular"];
    $rg = $_POST ["txtRg"];

    $paciente = new Paciente();

    $paciente ->editar($id, $nome, $data, $cpf, $email, $telefone, $celular, $rg);

?>
