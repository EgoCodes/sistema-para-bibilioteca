<?php
  session_start();

  if( (isset($_SESSION['idU'])) ){
      header('Location: ./libros.php');
  }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion | Mi biblioteca</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        .padre{
            padding: 0 1rem;
            margin: 1rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login{
            width: 550px;
            margin-top: 15%;
        }

        .titulo{
            text-align: center;
        }
    </style>
</head>

<body>
    
        <div class="padre">
            <div class="login">
                <form  method="post" id="formulariol">
                <div class="form-group titulo">
                        <h1>Inicio sesion</h1>
                    </div>

                    <div class="form-group">
                        <label for="usuario_L" class="col-sr-2 col-form-label info">Correo</label>
                        <input type="mail" class="form-control texto" id="correo" placeholder="pepito_09@gmail.com" required>
                    </div>

                    <div class="form-group">
                        <label for="clave_L" class="col-sr-2 col-form-label info">Contraseña</label>
                        <input type="password" class="form-control texto" id="contrasena" placeholder="••••••••" required>
                    </div>
                    <div class="form-group" id="ss">

                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary btn-block" id="boton_L" type="submit" value="Entrar">
                    </div>
                </form>
            </div>
        </div>
    
    <script src="src/js/popper.js"></script>
    <script src="src/js/bootstrap.js"></script>
    <script src="src/js/jquery.js"></script>
    <script src="src/js/main.js"></script>
    <script>
        $('#formulariol').submit(function (e) {
            e.preventDefault();
            let correo =  $('#correo').val();
            let contrasena =  $('#contrasena').val();
            $.ajax({
                type: "POST",
                url: "src/php/login.php",
                data: {correo, contrasena},
                success: function (response) {
                    if(response == 0){
                        $('#ss').empty();
                        $('#ss').append('<p class="text-warning">Revisa tu información, debe habae un dato erroneo</p>');
                    }else{
                        window.location.reload(); 
                    }
                }
            });
        });
    </script>
</body>
</html>