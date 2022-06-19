<?php
    session_start();
    $isLogged = $_SESSION["logged"] ?? null;

    if($_SESSION["logged"] != True) {
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
          require_once("templates.php");
          echo($menu);
        ?>

        <section class="home-section">
          <div class="home-content">
              <i class="bx bx-menu"></i>
              <!-- Colocar a tabela aqui caso de ruim na formatação do layout -->
          </div>
          <div class="col-8 get-margin">
          <h1 style="margin: 5px auto 10px auto;">Agendamentos</h1>
          <table style="margin: auto auto auto auto;" class="table get-margin">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>123</td>
                <td>Athirsoles cria da Etec</td>
                <td>
                  <button type="button" class="btn btn-success">Editar</button>
                  <button type="button" class="btn btn-danger">Excluir</button>
                </td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>456</td>
                <td>Caicores do grau</td>
                <td>
                  <button type="button" class="btn btn-success">Editar</button>
                  <button type="button" class="btn btn-danger">Excluir</button>
                </td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>789</td>
                <td>Pequenos óculos</td>
                <td>
                  <button type="button" class="btn btn-success">Editar</button>
                  <button type="button" class="btn btn-danger">Excluir</button>
                </td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>000</td>
                <td>Glaubolinos bódi biuder</td>
                <td>
                  <button type="button" class="btn btn-success">Editar</button>
                  <button type="button" class="btn btn-danger">Excluir</button>
                </td>
              </tr>
            </tbody>
          </table>
          <button style="margin: 10px auto auto auto; float: right;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Cadastrar</button>
          </div>
        </section>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Cadastrar paciente</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            <form action="../controller/cadastro-paciente.php" method="POST">
              
              <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" name="txtNome" id="txtNome" class="form-control">
              </div>
              
              <div class="mb-3">
                <label class="form-label">Data de nascimento</label>
                <input type="date" name="txtData" id="txtData" class="form-control">
              </div>

              <div class="mb-3">
                <label class="form-label">Cpf</label>
                <input type="text" name="txtCpf" id="txtCpf" class="form-control">
              </div>

              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" name="txtEmail" id="txtEmail" class="form-control">
              </div>

              <div class="mb-3">
                <label class="form-label">Telefone</label>
                <input type="number" name="txtTelefone" id="txtTelefone" class="form-control">
              </div>
              
              <div class="mb-3">
                <label class="form-label">Celular</label>
                <input type="number" name="txtCelular" id="txtCelular" class="form-control">
              </div>

              <div class="mb-3">
                <label class="form-label">Rg</label>
                <input type="text" name="txtRg" id="txtRg" class="form-control">
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
            
            btn.addEventListener("click", ()=>{
                sidebar.classList.toggle("close");
            });
            
        </script>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
            integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
            integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
            crossorigin="anonymous"></script>

    </body>
</html>
