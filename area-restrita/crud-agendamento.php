<?php
session_start();
$isLogged = $_SESSION["logged"] ?? null;

if ($_SESSION["logged"] != True) {
  die("Não tens acesso a essa página!!");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <link rel="stylesheet" href="..//assets//css//menu.css">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" sizes="96x96" href="../assets/img/favicon.png">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="menu.css">
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
  <?php

  require_once("../model/Agenda.php");
  require_once("../model/Paciente.php");
  try {
    $paciente = new Paciente();
    $profissional = new Profissional();
    $agenda = new Agenda();


    $listaprofissional = $profissional->listar();
    $listapaciente = $paciente->listar();
    $lista_agenda = $agenda->listar();
  } catch (Exception $e) {
    echo $e->getMessage();
  }

  require_once("templates.php");
  echo ("$menu");

  ?>

  <section class="home-section">
    <div class="home-content">
      <i class="bx bx-menu"></i>
      <!-- Colocar a tabela aqui caso de ruim na formatação do layout -->
    </div>
    <div class="col-11 get-margin">
      <h1 style="margin: 5px auto 10px auto;">Agendamentos</h1>
      <button style="margin: 10px auto auto auto; float: left;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Cadastrar</button>
      <table style="margin: auto auto auto auto;" class="table get-margin">
        <thead>
          <tr>
            <th scope="col">Id consulta</th>
            <th scope="col">Data da consulta</th>
            <th scope="col">Hora</th>
            <th scope="col">Profissional</th>
            <th scope="col">Paciente</th>
            <th scope="col">Açoes</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($lista_agenda as $lista) { ?>
            <tr>
              <th scope="row"><?php echo $lista['idagenda'] ?></th>
              <td><?php echo $lista['dtagenda'] ?></td>
              <td><?php echo $lista['horaagenda'] ?></td>
              <td><?php echo $lista['nomeProfissional'] ?></td>
              <td><?php echo $lista['nomePaciente'] ?></td>
              <td>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $lista['idagenda'] ?>">
                  Editar
                </button>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $lista['idagenda'] ?>">
                  Excluir
                </button>
              </td>

              <!-- DELETAR AGENDAMENTO -->
              <form method="post" action="../controller/delete-agendamento.php">
                <div class="modal fade" id="ModalDelete<?php echo $lista['idagenda'] ?>" tabindex="-1" aria-labelledby="ModalDelete<?php echo $lista['idagenda'] ?>" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deletar Agendamento: <?php echo $lista['idagenda'] ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Deseja mesmo deletar o agendamento: <?php echo $lista['idagenda'] ?>?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" name="txtId" id="txtId" value="<?php echo $lista['idagenda'] ?>" class="btn btn-outline-danger">Deletar</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>

              <!-- EDITAR AGENDAMENTO -->
              <form method="post" action="../controller/editar-agendamento.php">
                <div class="modal fade" id="ModalEdit<?php echo $lista['idagenda'] ?>" tabindex="-1" aria-labelledby="ModalEdit<?php echo $lista['idagenda'] ?>" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar Agendamento: <?php echo $lista['idagenda'] ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>

                      <div class="mb-3">
                        <label class="form-label">Selecione o Paciente</label>
                        <select class="form-select" aria-label="Default select example" name="paciente">
                          <option value="<?php echo $lista['idagenda'] ?>" selected><?php echo $lista['nomePaciente'] ?></option>
                          <?php
                          foreach ($listapaciente as $linha) {
                          ?>
                            <option value="<?php echo $linha['idPaciente'] ?>">
                              <?php echo $linha['nomePaciente'] ?>
                            </option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>

                      <div class="mb-3">
                        <label class="form-label">Selecione o Profissional</label>
                        <select class="form-select" aria-label="Default select example" name="profissional">
                          <option value="<?php echo $lista['idagenda'] ?>" selected><?php echo $lista['nomeProfissional'] ?></option>
                          <?php foreach ($listaprofissional as $linha) { ?>
                            <option value="<?php echo $linha['idProfissional'] ?>">
                              <?php echo $linha['nomeProfissional'] ?>
                            </option>
                          <?php } ?>
                        </select>
                      </div>

                      <div class="mb-3">
                        <label class="form-label">Data: </label>
                        <input type="date" name="txtData" class="form-control">
                      </div>

                      <div class="mb-3">
                        <label class="form-label">Hora:</label>
                        <input type="time" name="txtHora" class="form-control">
                      </div>

                              
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" name="txtId" id="txtId" value="<?php echo $lista['idagenda'] ?>" class="btn btn-primary">Editar</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>

            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </section>

  <!-- CRIAR AGENDAMENTO -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cadastrar paciente</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="../controller/cadastra-agenda.php" method="POST">
            <div class="mb-3">
              <label class="form-label">Selecione o Paciente</label>
              <select class="form-select" aria-label="Default select example" name="paciente">
                <?php
                foreach ($listapaciente as $linha) {
                ?>
                  <option value="<?php echo $linha['idPaciente'] ?>">
                    <?php echo $linha['nomePaciente'] ?>
                  </option>
                <?php
                }
                ?>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label">Selecione o Profissional</label>
              <select class="form-select" aria-label="Default select example" name="profissional">
                <?php foreach ($listaprofissional as $linha) { ?>
                  <option value="<?php echo $linha['idProfissional'] ?>">
                    <?php echo $linha['nomeProfissional'] ?>
                  </option>
                <?php } ?>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label">Data: </label>
              <input type="date" name="txtData" class="form-control">
            </div>

            <div class="mb-3">
              <label class="form-label">Hora:</label>
              <input type="time" name="txtHora" class="form-control">
            </div>


            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Cadastrar</button>
            </div>
          </form>

        </div>
      </div>
    </div>
    <script>
      const btn = document.querySelector(".bx-menu");
      const sidebar = document.querySelector(".sidebar");
      const searchBtn = document.querySelector("bx-search");

      btn.addEventListener("click", () => {
        sidebar.classList.toggle("close");
      });
    </script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>