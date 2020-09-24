<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar Proveedores

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar categorías</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarProveedor">

          Agregar proveedor

        </button>

      </div>

      <div class="box-body">

       <table class="table table-bordered table-striped dt-responsive tablas">

        <thead>

         <tr>

           <th style="width:10px">#</th>
           <th>Nombre</th>
           <th>C.U.I.T</th>
           <th>E-mail</th>
           <th>Teléfono</th>
           <th>Dirección</th>
           <th>Tipo de Consignación</th>
           <th>Total de Productos Vendidos</th>
           <th>Inrgeso al Sistema</th>
           <th>Acciones</th>



         </tr>

        </thead>

        <tbody>
          <?php
            $item = null;
            $valor = null;

            $proveedores = ControladorProveedores::ctrMostrarProveedores($item, $valor);


            foreach ($proveedores as $key => $value) {


              echo '<tr>

                      <td>'.($key+1).'</td>

                      <td>'.$value["nombre"].'</td>

                      <td>'.$value["cuit"].'</td>

                      <td>'.$value["email"].'</td>

                      <td>'.$value["telefono"].'</td>

                      <td>'.$value["direccion"].'</td>

                      <td>'.$value["consignacion"].'</td>

                      <td>'.$value["ventas"].'</td>

                      <td>'.$value["fecha"].'</td>

                      <td>

                        <div class="btn-group">

                          <button class="btn btn-warning btnEditarProveedor" data-toggle="modal" data-target="#modalEditarProveedor" idProveedor="'.$value["id"].'"><i class="fa fa-pencil"></i></button>';

                        if($_SESSION["perfil"] == "Administrador"){

                            echo '<button class="btn btn-danger btnEliminarProveedor" idProveedor="'.$value["id"].'"><i class="fa fa-times"></i></button>';

                        }

                        echo '</div>

                      </td>

                    </tr>';

              }
           ?>








        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR PROVEEDOR
======================================-->

<div id="modalAgregarProveedor" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Proveedor</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-truck"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoProveedor" placeholder="Ingresar Nombre del Proveedor o Razón Social" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL CUIT ID-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                <input type="number" min="0" class="form-control input-lg" name="nuevoCuitId" placeholder="Ingresar el CUIT del Proveedor" >

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                <input type="email" class="form-control input-lg" name="nuevoEmail" placeholder="Ingresar email" >

              </div>

            </div>

            <!-- ENTRADA PARA EL TELEFONO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input type="text" class="form-control input-lg" name="nuevoTelefono" placeholder="Ingresar teléfono" data-inputmask="'mask' : '(9999) 999-9999'" data-mask >

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="text" class="form-control input-lg" name="nuevaDireccion" placeholder="Ingresar dirección" >

              </div>

            </div>

            <!-- ENTRADA PARA TIPO DE CONSIGNACION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-shopping-bag"></i></span>

                <input type="text" class="form-control input-lg" name="nuevaConsignacion" placeholder="Tipo de consignación" >

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar categoría</button>

        </div>

      </form>

      <?php

      $crearProveedor = new ControladorProveedores();
      $crearProveedor -> ctrCrearProveedor();

       ?>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR PROVEEDOR
======================================-->

<div id="modalEditarProveedor" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Proveedor</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-truck"></i></span>

                <input type="text" class="form-control input-lg" name="editarProveedor" id="editarProveedor"  required>
                <input type="hidden" id="idProveedor" name="idProveedor" value="">
              </div>

            </div>

            <!-- ENTRADA PARA EL CUIT ID-->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                <input type="number" min="0" class="form-control input-lg" name="editarCuitId" id="editarCuitId" >

              </div>

            </div>

            <!-- ENTRADA PARA EL EMAIL -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                <input type="email" class="form-control input-lg" name="editarEmail" id="editarEmail"  >

              </div>

            </div>

            <!-- ENTRADA PARA EL TELEFONO -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                <input type="text" class="form-control input-lg" name="editarTelefono" id="editarTelefono"  data-inputmask="'mask' : '(9999) 999-9999'" data-mask >

              </div>

            </div>

            <!-- ENTRADA PARA LA DIRECCION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>

                <input type="text" class="form-control input-lg" name="editarDireccion" id="editarDireccion"  >

              </div>

            </div>

            <!-- ENTRADA PARA TIPO DE CONSIGNACION -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-shopping-bag"></i></span>

                <input type="text" class="form-control input-lg" name="editarConsignacion" id="editarConsignacion" >

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      </form>

      <?php

      $editarProveedor = new ControladorProveedores();
      $editarProveedor -> ctrEditarProveedor();

       ?>

    </div>

  </div>

</div>

<?php

$eliminarProveedor = new ControladorProveedores();
$eliminarProveedor -> ctrEliminarProveedor();

 ?>
