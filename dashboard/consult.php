<?php 
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>


  <link href="../assets/dashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="../assets/dashboard/css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <style type="text/css">
      .btn_roxo {
        background-color: #352961;
      }
      .text-color {
        color: white;
        text-decoration: bold;
      }



  </style>
</head>

<body id="page-top">

  <?php   

    $dataUser = "";

    if(isset($_SESSION['UserLoged']))
    {
      $dataUser = $_SESSION['UserData'];
    }

    if(isset($_SESSION['OrganLoged']))
    {
      $dataUser = $_SESSION['OrganData'];
    }

    if(isset($_SESSION['ManegerLoged']))
    {
      $dataUser = $_SESSION['ManegerData'];
    } 
  ?>

  <?php 
    if(!isset($_SESSION['ManegerLoged']))
    {
      header('Location: ../index.php');
      exit();
    }

  ?>

  <div id="wrapper">

    <ul class="navbar-nav btn_roxo sidebar sidebar-dark accordion" id="accordionSidebar">

      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.php">
        
        <div class="sidebar-brand-text mx-3">Dashboard</div>
      </a>

      <hr class="sidebar-divider my-0">

      <li class="nav-item active">
        <a class="nav-link" href="../dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Gerencimento
      </div>

      <!-- Cadastro Voluntario -->
     

      <li class="nav-item">
        <a class="nav-link collapsed" href="register.php"  aria-expanded="true" aria-controls="collapseTwo" id="register">
          <i class="fas fa-fw fa-cog"></i>
          <span><b>Cadastrar Usuário</b></span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="consult.php"  aria-expanded="true" aria-controls="collapseTwo" id="consult">
          <i class="fas fa-fw fa-cog"></i>
          <span><b>Consultar/Excluir Usuário</b></span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="registerHelp.php"  aria-expanded="true" aria-controls="collapseTwo" >
          <i class="fas fa-fw fa-cog"></i>
          <span><b>Cadastrar Ajudas</b></span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="consultHelp.php"  aria-expanded="true" aria-controls="collapseTwo" id="consult">
          <i class="fas fa-fw fa-cog"></i>
          <span><b>Consultar/Excluir Ajudas</b></span>
        </a>
      </li>

    </ul>

    <div id="content-wrapper" class="d-flex flex-column">

      <div id="content">

        <!-- HEADER DA PAGINA -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <a style="padding: 0px 20px -10px 20px; margin: 10px;" class="btn btn_roxo text-color" href="../logout.php" role="button"><b>Sair</b></a>

            <div class="topbar-divider d-none d-sm-block"></div>
            
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" style="margin-right: 5px; margin-left: 5px;" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">

                <b style="font-size: 20px;"><?php echo $dataUser["name"] ?></b></span>
                
              </a>
              
            </li>

          </ul>

        </nav>

        <!-- Conteudo Principal -->

        <div class="container-fluid">

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>


      
          <div class=""></div>
          <?php 
            include('../ValidationMessages.php'); 
          ?>
            <div class="container">
              <div class="card p-5 shadow-lg m-5">

                <div class="row">
                  
                  <div class="col-12">
                    <h3>Consultar</h3>
                    <p>Informe um nome para pesquisar um usuario.</p>
                    <form class="form-group" action="" method="GET">
                      <div class="row">
                        <div class="col-8">
                          <input class="form-control" type="text" name="search" required>
                        </div>
                        <div class="col-4">
                          <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                      </div>
                    </form>
                  </div>

                </div>
                <br>
                

                <?php 
                  include('../connection.php');
                  include('../ManagerRepository.php');

                  $data = "";
                  

                  if(isset($_GET['search']) && !empty($_GET['search']))
                  {

                    $search = mysqli_real_escape_string($connectionUser, $_GET['search']);

                    $data = consultUserManager($search);
                  }

                  

                ?>

                <h4>Resultado:</h4>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Nome</th>
                      <th scope="col">E-mail</th>
                      <th scope="col">Telefone</th>
                      <th scope="col">Endereço</th>
                      <th scope="col">CNPJ/CPF</th>
                      <th scope="col">Tipo Usuário</th>
                      <th><center><b>X</b></center></th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php 
                        if(!empty($data))
                        {
                          

                          while($dataArray = mysqli_fetch_array($data))
                          {
                    ?>
                          <tr>
                            <td><?php echo $dataArray["id"] ?></td>
                            <td><?php echo $dataArray["name"] ?></td>
                            <td><?php echo $dataArray["email"] ?></td>
                            <td><?php echo $dataArray["fone"] ?></td>
                            <td><?php echo $dataArray["street"]; ?>, <?php echo $dataArray["cep"]; ?> - <?php echo $dataArray["neighborhood"]; ?></td>
                            <td><?php echo $dataArray["cnpjAndCpf"] ?></td>
                            <td><?php echo $dataArray["typeUser"] ?></td>
                            <td>
                              <center>
                                <form action="../ManagerController.php" method="POST">
                                  <input type="hidden" name="cnpjAndCpf" value=<?php echo $dataArray["cnpjAndCpf"] ?> >
                                  <input type="hidden" value="FULL" name="remove">
                                  <button type="submit" class="btn btn-danger">Excluir</button>
                                </form>
                              </center>
                            </td>
                          </tr>
                    <?php
                          }  
                        } else if(!$data) {

                          ?>
                            <td><center><b>Sem resultados ...</b></center></td>
                          <?php 

                        }

                    ?>
                  </tbody>
                </table>
              </div>       
            </div>
          


      </div>

      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>

  </div>

  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="../assets/dashboard/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/dashboard/js/sb-admin-2.min.js"></script>

</body>

</html>
