<?php

/*
    En ocasiones el usuario puede volver al login
    aun si ya existe una sesion iniciada, lo correcto
    es no mostrar otra ves el login sino redireccionarlo
    a su pagina principal mientras exista una sesion entonces
    creamos un archivo que controle el redireccionamiento
  */

session_start();

// isset verifica si existe una variable o eso creo xd
if (isset($_SESSION['id'])) {
  header('location: controller/redirec.php');
}

?>


<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
    <title>Login en PHP</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Importamos los estilos de Bootstrap -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Font Awesome: para los iconos -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- Sweet Alert: alertas JavaScript presentables para el usuario (más bonitas que el alert) -->
  <link rel="stylesheet" href="css/sweetalert.css">
  <!-- Estilos personalizados: archivo personalizado 100% real no feik -->
  <link rel="stylesheet" href="css/style.css">

</head>

<body>

  <!--
      Las clases que utilizo en los divs son propias de Bootstrap
    -->


  <!-- Formulario Login -->
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-4 col-md-offset-4">
        <!-- Margen superior (css personalizado )-->
        <div class="spacing-1"></div>

        <form id="formulario_registro">
          <!-- Estructura del formulario -->
          <fieldset>

            <legend class="center">Registro</legend>

            <!-- Caja de texto para usuario -->
            <label class="sr-only" for="user">Nombre</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-user"></i></div>
              <input type="text" class="form-control" name="name" placeholder="Ingresa tu nombre">
            </div>

            <!-- Div espaciador -->
            <div class="spacing-2"></div>

            <!-- Caja de texto para usuario -->
            <label class="sr-only" for="user">Email</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-user"></i></div>
              <input type="text" class="form-control" name="email" placeholder="Ingresa tu email">
            </div>
            <!-- Caja de texto para usuario -->
            <label class="sr-only" for="user">Rol</label>
            <div class="input-group rol">
              <div class="input-group-addon"><i class="fa fa-user"></i></div>
              <select name="cargo" id="cargo" class="form-control">
                <option value="1">Administrador</option>
                <option value="2">Usuario</option>
              </select>
            </div>

            <!-- Div espaciador -->
            <div class="spacing-2"></div>

            <!-- Caja de texto para la clave-->
            <label class="sr-only" for="clave">Contraseña</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-lock"></i></div>
              <input ID="txtPassword" type="password" autocomplete="off" class="form-control" name="clave" placeholder="Ingresa tu clave">
              <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
            </div>
            <div id="strengthMessage"></div>
            <!-- Div espaciador -->
            <div class="spacing-2"></div>

            <!-- Caja de texto para la clave-->
            <label class="sr-only" for="clave">Verificar contraseña</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-lock"></i></div>
              <input ID="txtPassword2" type="password" autocomplete="off" class="form-control" name="clave2" placeholder="Verificar contraseña">
              <button id="show_password2" class="btn btn-primary" type="button" onclick="mostrarPassword2()"> <span class="fa fa-eye-slash icon2"></span> </button>
            </div>

            <!-- Animacion de load (solo sera visible cuando el cliente espere una respuesta del servidor )-->
            <div class="row" id="load" hidden="hidden">
              <div class="col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
                <img src="img/load.gif" width="100%" alt="">
              </div>
              <div class="col-xs-12 center text-accent">
                <span>Validando información...</span>
              </div>
            </div>
            <!-- Fin load -->

            <!-- boton #login para activar la funcion click y enviar el los datos mediante ajax -->
            <div class="row">
              <div class="col-xs-8 col-xs-offset-2">
                <div class="spacing-2"></div>
                <button type="button" class="btn btn-primary btn-block" name="button" id="registro">Registrate</button>
              </div>
            </div>

          </fieldset>
        </form>
        <section class="text-accent center">
          <div class="spacing-2"></div>

          <p>
            Ya tienes una cuenta? <a href="index.php"> Inicia sesión!</a>
          </p>
        </section>
      </div>
    </div>
  </div>

  <!-- / Final Formulario login -->

  <!-- Jquery -->
  <script src="js/jquery.js"></script>
  <!-- Bootstrap js -->
  <script src="js/bootstrap.min.js"></script>
  <!-- SweetAlert js -->
  <script src="js/sweetalert.min.js"></script>
  <!-- Js personalizado -->
  <script src="js/operaciones.js"></script>
  <!-- show and hide password -->
  <script type="text/javascript">
    function mostrarPassword() {
      var cambio = document.getElementById("txtPassword");
      if (cambio.type == "password") {
        cambio.type = "text";
        $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
      } else {
        cambio.type = "password";
        $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
      }
    }

    $(document).ready(function() {
      //CheckBox mostrar contraseña
      $('#ShowPassword').click(function() {
        $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
      });
    });
  </script>
  <script type="text/javascript">
    function mostrarPassword2() {
      var cambio2 = document.getElementById("txtPassword2");
      if (cambio2.type == "password") {
        cambio2.type = "text";
        $('.icon2').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
      } else {
        cambio2.type = "password";
        $('.icon2').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
      }
    }

    $(document).ready(function() {
      //CheckBox mostrar contraseña
      $('#ShowPassword2').click(function() {
        $('#Password2').attr('type', $(this).is(':checked') ? 'text' : 'password');
      });
    });
  </script>
  <!-- secure password -->
  <script>
    $(document).ready(function() {
      $('#txtPassword').keyup(function() {
        $('#strengthMessage').html(checkStrength($('#txtPassword').val()))
      })

      function checkStrength(password) {
        var strength = 0
        if (password.length < 12) {
          $('#strengthMessage').removeClass()
          $('#strengthMessage').addClass('Corta')
          return 'Muy Corta minimo 12 caracteres'
        }
        if (password.length > 7) strength += 1
        // If password contains both lower and uppercase characters, increase strength value.
        if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
        // If it has numbers and characters, increase strength value.
        if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
        // If it has one special character, increase strength value.
        if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
        // If it has two special characters, increase strength value.
        if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
        // Calculated strength value, we can return messages
        // If value is less than 2
        if (strength < 2) {
          $('#strengthMessage').removeClass()
          $('#strengthMessage').addClass('Debil')
          return 'Debil'
        } else if (strength == 2) {
          $('#strengthMessage').removeClass()
          $('#strengthMessage').addClass('Bien')
          return 'Bien'
        } else {
          $('#strengthMessage').removeClass()
          $('#strengthMessage').addClass('Fuerte')
          return 'Fuerte'
        }
      }
    });
  </script>
</body>

</html>