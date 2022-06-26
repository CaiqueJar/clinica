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

  <script type="text/javascript" src="../assets/js/jquery-3.6.0.js"></script>
  <script type="text/javascript" src="../assets/js/jquery.mask.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $("#cpfProfissional").mask("000.000.000-00")
      $("#rgProfissional").mask("99.999.999-9")
    })
  </script>

</head>

<body>
  <?php
  require_once("../model/Profissional.php");
  try {
    $profissional = new Profissional();
    $lista = $profissional->listar();
  } catch (Exception $e) {
    echo $e->getMessage();
  }

  require_once("templates.php");
  echo ("$menu");

  ?>

  <section class="home-section">
    <div class="home-content">
      <i class="bx bx-menu"></i>
    </div>
    <div class="col-11 get-margin">
      <h1 style="margin: 5px auto 10px auto;">Profissionais</h1>
      <button style="margin: 10px auto auto auto; float: left;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Cadastrar</button>
      <table style="margin: auto auto auto auto;" class="table get-margin">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">Cpf</th>
            <th scope="col">Rg</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($lista as $linhaProfissional) { ?>
            <tr>
              <th scope="row"><?php echo $linhaProfissional['idProfissional'] ?></th>
              <td><?php echo $linhaProfissional['nomeProfissional'] ?></td>
              <td><?php echo $linhaProfissional['cpfProfissional'] ?></td>
              <td><?php echo $linhaProfissional['rgProfissional'] ?></td>
              <td>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $linhaProfissional['idProfissional'] ?>">
                  Editar
                </button>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $linhaProfissional['idProfissional'] ?>">
                  Excluir
                </button>
              </td>

              <!-- EXCLUIR PROFISSIONAL -->
              <form method="post" action="../controller/delete-profissional.php">
                <div class="modal fade" id="ModalDelete<?php echo $linhaProfissional['idProfissional'] ?>" tabindex="-1" aria-labelledby="ModalDelete<?php echo $linhaProfissional['idProfissional'] ?>" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deletar <?php echo $linhaProfissional['nomeProfissional'] ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Deseja mesmo deletar o profissional <?php echo $linhaProfissional['nomeProfissional'] ?>?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" name="idProfissional" id="idProfissional" value="<?php echo $linhaProfissional['idProfissional'] ?>" class="btn btn-outline-danger">Deletar</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>]

              <!-- EDITAR Profissional -->
              <form method="post" action="../controller/editar-profissional.php">
                <div class="modal fade" id="ModalEdit<?php echo $linhaProfissional['idProfissional'] ?>" tabindex="-1" aria-labelledby="ModalEdit<?php echo $linhaProfissional['idProfissional'] ?>" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Editar <?php echo $linhaProfissional['nomeProfissional'] ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="mb-3">
                          <label class="form-label">Nome</label>
                          <input type="text" value="<?php echo $linhaProfissional['nomeProfissional'] ?>" name="nomeProfissional" id="nomeProfissional<?php echo $linhaProfissional['idProfissional'] ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                          <label class="form-label">Cpf</label>
                          <input type="text" value="<?php echo $linhaProfissional['cpfProfissional'] ?>" name="cpfProfissional" id="cpfProfissional<?php echo $linhaProfissional['idProfissional'] ?>" class="form-control">
                        </div>

                        <div class="mb-3">
                          <label class="form-label">Rg</label>
                          <input type="text" value="<?php echo $linhaProfissional['rgProfissional'] ?>" name="rgProfissional" id="rgProfissional<?php echo $linhaProfissional['idProfissional'] ?>" class="form-control">
                        </div>

                        <script type="text/javascript">
                          $(document).ready(function() {
                            $("#cpfProfissional<?php echo $linhaProfissional['idProfissional'] ?>").mask("000.000.000-00")
                            $("#rgProfissional<?php echo $linhaProfissional['idProfissional'] ?>").mask("99.999.999-9")

                          })
                        </script>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" name="idProfissional" id="idProfissional" value="<?php echo $linhaProfissional['idProfissional'] ?>" class="btn btn-primary">Editar</button>
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
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cadastrar profissional</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form action="../controller/cadastro-profissional.php" method="POST">

            <div class="mb-3">
              <label class="form-label">Nome</label>
              <input type="text" name="nomeProfissional" id="nomeProfissional" class="form-control">
            </div>

            <div class="mb-3">
              <label class="form-label">Cpf</label>
              <input type="text" name="cpfProfissional" id="cpfProfissional" class="form-control">
            </div>

            <div class="mb-3">
              <label class="form-label">Rg</label>
              <input type="text" name="rgProfissional" id="rgProfissional" class="form-control">
            </div>

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