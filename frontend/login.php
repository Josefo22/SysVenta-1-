 <?php 
session_start();
    if (isset($_SESSION['id'])){
        header('Location: administrador/escritorio.php');
    }
include_once '../backend/php/login.php'

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema-ventas</title>
  <link rel="icon" type="image/png" href="../backend/img/logo.png">
  <link rel="stylesheet" type="text/css" href="../backend/css/style.css">
  <style type="text/css">

.load_animation{
  width: 100%;
  height: 100vh;
  font-size: 4rem ;
  background-color: #101970;
  z-index: 500;
  position: fixed;
  top: 0;
  left: 0;
  overflow: hidden;
  
}
.animation {
  position: absolute;
  top: 50%;
  left: 50%;
  border: 3px solid rgb(0, 0, 0);
  border-radius: 50%;
  box-sizing: content-box;
  padding: 10px;
  transform: translate(-50% , -50%) ;
  opacity: .5;
  animation: spinner 1s infinite;
  transition: .1s;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}
@keyframes spinner {
  50% {
    transform: translate(-50% , -50%) ;
    border: 2px solid rgba(0, 0, 0, 0.178);
    padding: 30px;
  }
  100% {
    opacity: 1;
    transform:translate(-50% , -50%) rotate(360deg);
    border: 3px solid rgba(0, 0, 0, 0);
    padding: 17rem;
    color: #233975;
  }

}


    </style>
</head>
<body>
  <div class="loader-container">
    <div class="load_animation">
        <ion-icon name="bag-handle-outline" class="animation"></ion-icon>
    </div>
</div>
  <div class="wrapper">
    <div class="loader"></div>
  </div>

    <div class="split-sceen">
      <div class="left">
        <section class="copy">
          <h1>Sistema-ventas</h1>
          <p>Tu mejor Programa para ventas</p>
          
        </section>
      </div>

      <div class="right">
        <form method="POST" role="form" onsubmit="return validacion()">
          <section class="copy">
            <h2>Iniciar sesión</h2>
          <?php 
                            if (isset($errMsg)) {
                                echo '
    <div style="color:#101970;text-align:center;font-size:20px; font-weight:bold;">'.$errMsg.'</div>
    ';  ;
                            }

                        ?>
          </section>
          <div class="input-container name">
            <label for="fname">Nombre de usuario</label>
            <input type="text" id="usuario" name="username" value="<?php if(isset($_POST['username'])) echo $_POST['username'] ?>"  autocomplete="off"  autocomplete="off" >

          </div>

          <div class="input-container password">
            <label for="password">Contraseña</label>
            <input type="password" id="contra"  name="password" value="<?php if(isset($_POST['password'])) echo MD5($_POST['password']) ?>" placeholder="Mínimo de 6 carácteres">
            <i class="far fa-eye-slash"></i>
          </div>

          <div class="input-container cta">
            <label class="checkbox-container">
              <input type="checkbox">
              <span class="checkmark"></span>
              Mantener la sesión
            </label>
          </div>

          <button name='login' class="signup-btn" type="submit">Entrar</button>

          <section class="copy legal">
            <p><span class="small">Sistema hecho por Juan José <br><a href="#">Privacy Policy </a>&amp; <a href="#">Terms of Service</a>.</span></p>
            
          </section>

        </form>
      </div>
    </div>
<script type="text/javascript" src="../backend/js/script.js"></script>
<script type="text/javascript" src="../backend/js/validate.js"></script>
<script type="text/javascript" src="../backend/js/reenvio.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
 <script type="text/javascript">
        $(window).on("load",function(){
            $(".load_animation").fadeOut(1000);
        });
    </script>

     <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>