<?php 
    session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Clínica X</title>
    </head>
    <body>
        <h1>Área Restrita - Clínica X</h1>
        <?php
            echo("Olá, ".$_SESSION['login-session']);
        ?>
        <br>
        <a href='logout.php'>Sair</a>
        <br><br><br>
        <a href='form-paciente.php'>Cadastro de Pacientes</a>
        <br>
        <a href='form-profissional.php'>Cadastro de Profissionais</a>
        <br>
        <a href='form-agenda.php'>Agendamento</a>

        <?php
            require_once("../model/Paciente.php");
            require_once("../model/Profissional.php");
            require_once("../model/Agenda.php");
            try {
                $paciente = new Paciente();
                $profissional = new Profissional();
                $agenda = new Agenda();
                
                $listapaciente = $paciente->listar();
                $listaprofissional = $profissional->listar();
                $listaagenda = $agenda->listar();

            } catch(Exception $e) {
                echo $e->getMessage();
            }
        ?>

        <h2>Agendamento</h2>
        <form action="cadastra-agenda.php" method="post">
            <label>Data: </label>
            <input type="date" name="txtData">
            <br>
            <label>Hora:</label>
            <input type="time" name="txtHora">
            <br>
            <label>Paciente:</label>
            <select name="paciente">
                <option value="0">Selecione</option>
                <?php foreach ($listapaciente as $linha){ ?>
                    <option value="<?php echo $linha['idpaciente'] ?>">
                        <?php echo $linha['nomepaciente'] ?>
                    </option>
                <?php } ?>
            </select>
            <br>
            <label>Profissional:</label>
            <select name="profissional">
                <option value="0">Selecione</option>
                <?php foreach ($listaprofissional as $linha){ ?>
                    <option value="<?php echo $linha['idprofissional'] ?>">
                        <?php echo $linha['nomeprofissional'] ?>
                    </option>
                <?php } ?>
            </select>
            <br>
            <input type="submit" value="Cadastrar">
        </form>

         <div class="col-11 get-margin">
          <h1 style="margin: 5px auto 10px auto;">Pacientes</h1>
          <table style="margin: auto auto auto auto;" class="table get-margin">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">Cpf</th>
                <th scope="col">Nascimento</th>
                <th scope="col">E-mail</th>
                <th scope="col">Rg</th>
                <th scope="col">Telefone</th>
                <th scope="col">Celular</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
            <tbody>
                <?php foreach ($listaagenda as $linha){ ?>
                    <tr>
                        <td><?php echo $linha['idagenda'] ?></td>
                        <td><?php echo $linha['dtagenda'] ?></td>
                        <td><?php echo $linha['horaagenda'] ?></td>
                        <td><?php echo $linha['nomepaciente'] ?></td>
                        <td><?php echo $linha['nomeprofissional'] ?></td>
                        <td><a href="#">Editar</a></td>
                        <td><a href="#">Excluir</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>