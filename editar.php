<?php 
  include('./conexao/conexao.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Editar</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini dark-mode">


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Equipamentos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">General Form</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Formulário de clientes</h3>
              </div>
              <form action="proc_registar.php" enctype='multipart/form-data' method="post">
                <div class="card-body">
                  <?php 
                    if(isset($_GET['id']))
                    {
                      $id = $_GET['id'];

                      $sql = "SELECT * FROM clientes WHERE id = :id";
                      $result = $conn->prepare($sql);
                      $data = ['id' => $id];
                      $result->execute($data);

                      $row = $result->fetch(PDO::FETCH_OBJ);
                    }
                  ?>
                  <div class="form-group">
                    <input name="id" type="hidden" value="<?= $row->id; ?>">
                  </div>
                  <div class="form-group">
                    <label>Nome </label>
                    <input name="nome" type="text" class="form-control" value="<?= $row->nome; ?>">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input name="email" type="text" class="form-control" value="<?= $row->email; ?>">
                  </div>
                  <div class="form-group">
                    <label>telefone</label>
                    <input name="telefone" type="text" class="form-control" value="<?= $row->telefone; ?>">
                  </div>
                  <div class="form-group">
                    <label>sexo</label>
                    <input name="sexo" type="text" class="form-control" value="<?= $row->sexo; ?>">
                  </div>
                  <div class="form-group">
                    <label >Imagem</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="imagem" type="file" class="custom-file-input" value="<?= $row->imagem; ?>">
                        <label class="custom-file-label" >Escolher arquivo</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="btn_editar" class="btn btn-primary">Editar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  </div>


<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="./plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
