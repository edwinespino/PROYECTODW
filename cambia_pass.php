<?php
require 'conexion.php';
require 'funciones.php';

if (empty($_GET['user_id'])) {
    header('Location: index.php');
}
if (empty($_GET['token'])) {
    header('Location: index.php');
}

$user_id = $mysqli->real_escape_string($_GET['user_id']);
$token = $mysqli->real_escape_string($_GET['token']);

echo $user_id.$token;
    if(verificaTokenPass($user_id,$token)==false){
        echo 'no se pudo verificar los datos';
        exit;
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RECUPERAR PASSWORD</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
    integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Trirong&effect=neon|outline|emboss|shadow-multiple">
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap/bootstrap-theme.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="container d-flex justify-content-center col-12 ">
    <div id="loginbox bg-warning" style="margin-top:15%; margin-left:10%;" class=" card
        mainbox col-md-10 col-md-offset-3 col-md-10 col-sm-offset-3">
      <div class="card-body">
        <div class="card-header bg-dark text-light">
          <div class="panel-title font-effect-emboss">Recuperar Password</div>
          <div style="font-size:70%; position: relative; left:70%; top:-25%"><a class="text-light"
              href="index.php">Iniciar
              Sesión</a></div>
        </div>

        <div style="padding-top:30px" class="card-body">

          <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

          <form id="loginform" class="form-horizontal" role="form" action="guardar_pass.php" method="POST"
            autocomplete="off">
            <input id="user_id" type="hidden" class="form-control" name="user_id" value="<?php echo $user_id; ?>" />
            <input id="token" type="hidden" class="form-control" name="token" value="<?php echo $token; ?>" />


            <div class="form-group d-block ">
              <label for="password" class="col-md-3-control-label mx-2">Nueva Password</label><br>
              <div class="col-md-9">
                <input id="" type="password" class="form-control" name="password" placeholder="password" required="">
              </div>
            </div>
            <div class="form-group d-block ">
              <label for="password" class="col-md-3-control-label mx-2"> Confirmar Password</label><br>
              <div class="col-md-9">
                <input id="" type="password" class="form-control" name="password" placeholder="password" required>
              </div>
            </div>

            <div style="margin-top:10px" class="form-group">
              <div class="col-sm-12 controls">
                <button id="btn-login" type="submit" class="btn btn-warning">Enviar
                </button>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-12 control">
                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%">

                </div>
              </div>
            </div>
          </form>
          <?php #echo resultBlock($errors);
                    ?>
        </div>
      </div>
    </div>
  </div>
</body>

</html>