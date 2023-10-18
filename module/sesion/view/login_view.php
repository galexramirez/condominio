<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no,">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="module/sesion/view/img/logo.ico">

    <title> <?= DF_TITULO; ?> <?= DF_MENSAJE; ?></title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="services/resources/bootstrap/css/bootstrap.min.css">

    <!-- Custom styles for this template -->
    <link href="module/sesion/view/login_view.css" rel="stylesheet">

    <!-- Librerias externas para mostrar u ocultar el password -->
    <link rel='stylesheet' href='services/resources/bootstrap-4.5.2-dist/css/bootstrap.min.css' type='text/css' media='all'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  
  </head>

  <body class="text-center" >

 
    <form class="form-signin" id="loginform" action="inicio" method="post" >
      <img class="mb-4" src="module/sesion/view/img/logo.png" alt="" height="100">
      <h1 class="h3 mb-3 font-weight-normal" style="font-size: 18px; ">Por favor ingrese sus datos</h1>
      <label for="inputEmail" class="sr-only">Nombre de Usuario</label>
      <input type="text" name="user_login" id="user_login" class="form-control usuario" placeholder="Nombre de Usuario" required autofocus autocomplete="off">
      <label for="inputPassword" class="sr-only">Contraseña</label>
      <div class="input-group">
        <input type="password" name="user_pass" class="form-control m-0 contraseña" id="user_pass" placeholder="Contraseña" required autocomplete="off">
				<div class="input-group-append">
				  <button id="show_password" class="btn btn-success" type="button" onclick="mostrar_password()"> <span class="fa fa-eye-slash icon"></span></button>
				</div>
      </div>

      <br>
      <a href="recupera_contrasena" class="text-decoration-none">¿Has olvidado tu contraseña?</a>

      <div class="checkbox mb-3">
        <br>
      </div>
      <button class="btn btn-lg btn-success btn-block" type="submit">Ingresar</button>
      <br>
      <p class="mt-5 mb-3 text-muted">&copy; copyright 2018</p>
    </form>
    
    <!-- Librerias externas para mostrar u ocultar el password -->
    <footer>
      <script src='services/resources/jquery-3.2.1/jquery-3.2.1.min.js' type='text/javascript'></script> 
      <script src='services/resources/bootstrap-4.5.2-dist/js/bootstrap.min.js' type='text/javascript'></script>
      <script src='module/sesion/view/local_view.js' type='text/javascript'></script>
    </footer>
  
  </body>
</html>