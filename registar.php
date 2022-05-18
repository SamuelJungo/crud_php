<?php
  session_start();
  ob_start();
  require_once './conexao/conexao.php';
?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Adicionando</title>

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
            <h1>clientes</h1>
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
                  <div class="form-group">
            
                  <div class="form-group">
                    <label>Nome </label>
                    <input name="nome" type="text" class="form-control" placeholder="Nome">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input name="email" type="text" class="form-control" placeholder="sldsds@gmail.com">
                  </div>
                  <div class="form-group">
                    <label>Telefone</label>
                    <input name="telefone" type="text" class="form-control" placeholder="97866677">
                  </div>
                  <div class="form-group">
                    <label>Sexo</label>
                    <select class="form-control" name="sexo" id="sexo">
                      <option value="1">Homem</option>
                      <option value="2">Mulher</option>
                    </select>
                  </div>
                 
                  <div class="form-group">
                    <label >Imagem</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="imagem" type="file" class="custom-file-input" >
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
                  <button type="submit" name="btn_registar" class="btn btn-primary">Adicionar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
  </div>

<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="./plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>
