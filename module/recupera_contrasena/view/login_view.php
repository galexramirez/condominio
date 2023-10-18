<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no,">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="module/recupera_contrasena/view/img/logo.ico">

    <title> <?= DF_TITULO; ?> <?= DF_MENSAJE; ?></title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="services/resources/bootstrap/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="module/recupera_contrasena/view/login_view.css" rel="stylesheet">

    <!-- Librerias externas para mostrar u ocultar el password -->
    <link rel='stylesheet' href='services/resources/bootstrap-4.5.2-dist/css/bootstrap.min.css' type='text/css' media='all'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  </head>

  <body class="text-center" >
    <form class="form-signin" id="form_recupera" action="recupera_contrasena" method="post" >
      <img class="mb-4" src="module/recupera_contrasena/view/img/logo.png" alt="" height="100">
      <h1 class="h3 mb-3 font-weight-normal" style="font-size: 18px; ">Por favor ingrese su correo electronico</h1>
      <label for="input_email" class="sr-only">Correo Electronico</label>
      <div class="input-group mb-3">
			  <span class="input-group-text">@</span>
        <input type="text" name="maes_email" id="maes_email" class="form-control usuario" placeholder="john@example.com" required autofocus autocomplete="off">
			</div>
      <div class="checkbox mb-3">
        <br>
      </div>
      <button class="btn btn-lg btn-success btn-block" type="submit">Continuar</button>
      <br>
      <p class="mt-5 mb-3 text-muted">&copy; copyright 2018</p>
    </form>
    
    <!-- Librerias externas para mostrar u ocultar el password -->
    <footer>
      <script src='services/resources/jquery-3.2.1/jquery-3.2.1.min.js' type='text/javascript'></script> 
      <script src='services/resources/bootstrap-4.5.2-dist/js/bootstrap.min.js' type='text/javascript'></script>
      <script src='module/recupera_contrasena/view/local_view.js' type='text/javascript'></script>
      <script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    </footer>
  
  </body>
</html>