<?php
  session_start();
  ob_start();
  include('./conexao/conexao.php');
?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="./plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">


  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>


    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>clientes<a class="btn btn-primary" href="./registar.php"> <i class="fa fa-plus"></i> </a></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">clientes</h3>
              </div>
              <?php
                $consulta = "SELECT * FROM clientes";
                $resultado = $conn->prepare($consulta);
                $resultado->execute();
              ?>
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Sexo</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php while($linha = $resultado->fetch(PDO::FETCH_ASSOC)){ ?>
                    <tr>
                      <td><?php echo $linha['nome']; ?></td>
                      <td><?php echo $linha['email']; ?></td>
                      <td><?php echo $linha['telefone']; ?></td>
                      <td><?php echo $linha['sexo']; ?></td>
                     
                      <td>
                        <a class="btn btn-primary" href="editar.php?id=<?php echo $linha['id']; ?>"> <i class="fa fa-edit"></i> </a>
                      </td>
                      <td>
                      <button type="hidden" href="javascript:void(0)" class="btn btn-danger btn_excluir_value excluir_btn_ajax" value="<?php echo $linha['id']; ?>" name="btn_excluir"> <i class="fa fa-trash"></i>
                      
                      </button>
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>

                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>



<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="./plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.js"></script>
<script src="./dist/js/sweetalert.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="../plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="../plugins/raphael/raphael.min.js"></script>
<script src="../plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="../plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
</body>
</html>
