<div id="back"></div>

<div class="login-box">

  <div class="login-logo">

    <img src="vistas/img/plantilla/logo-blanco-bloque.png" class="img-responsive" style="min-width:300px"  align="center">

  </div>

  <div class="login-box-body" style="border-radius:5px;">

    <p class="login-box-msg">Ingresar al sistema</p>

    <form method="post" >

      <div class="form-group has-feedback">

        <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>

      </div>

      <div class="form-group has-feedback">

        <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

      </div>

      <div class="row">

        <div class="col-xs-12 " style="text-align:center">

          <button type="submit" style="border-radius:5px;" class="btn btn-primary btn-block btn-flat">Ingresar</button>


        </div>
        <div class="col-lg-12">
          <div class="" style="margin-top:20px; text-align:center;" >
            <h2></h2>
             <p>¿Problemas para ingresar?<b> soporte@grupobenchmark.com  </b></p>
          </div>
        </div>

      </div>

      <?php

        $login = new ControladorUsuarios();
        $login -> ctrIngresoUsuario();

      ?>

    </form>

  </div>

</div>
