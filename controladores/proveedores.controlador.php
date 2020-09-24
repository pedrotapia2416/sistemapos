<?php

  class ControladorProveedores{


 /*==== CREAR PROVEEDOR ====*/

    static public function ctrCrearProveedor(){

          	if(isset($_POST["nuevoProveedor"])){

              if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoProveedor"]) &&
                 preg_match('/^[0-9]+$/', $_POST["nuevoCuitId"]) &&
                 preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["nuevoEmail"]) &&
                 preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoTelefono"]) &&
                 preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["nuevaDireccion"]) &&
                 preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["nuevaConsignacion"])){

                  $tabla = "proveedores";

                  $datos = array("nombre"=>$_POST["nuevoProveedor"],
                             "cuit"=>$_POST["nuevoCuitId"],
                             "email"=>$_POST["nuevoEmail"],
                             "telefono"=>$_POST["nuevoTelefono"],
                             "direccion"=>$_POST["nuevaDireccion"],
                             "consignacion"=>$_POST["nuevaConsignacion"]);

                  $respuesta = ModeloProveedores::mdlIngresarProveedor($tabla, $datos);

                  if($respuesta == "ok"){

                  echo'<script>

                  swal({
                      type: "success",
                      title: "El proveedor ha sido guardado correctamente",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                      }).then(function(result){
                          if (result.value) {

                          window.location = "proveedores";

                          }
                        })

                  </script>';

                }

              }else{

                echo'<script>

                  swal({
                      type: "error",
                      title: "¡El proveedor no puede ir vacío o llevar caracteres especiales!",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                      }).then(function(result){
                      if (result.value) {

                      window.location = "proveedores";

                      }
                    })

                  </script>';

              }
            }

    }
    /*=============================================
  	MOSTRAR PROVEEDORES
  	=============================================*/

  	static public function ctrMostrarProveedores($item, $valor){

  		$tabla = "proveedores";

  		$respuesta = ModeloProveedores::mdlMostrarProveedores($tabla, $item, $valor);

  		return $respuesta;

  	}

    /*==== EDITAR PROVEEDORES ====*/

       static public function ctrEditarProveedor(){

               if(isset($_POST["editarProveedor"])){

                 if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarProveedor"]) &&
                    preg_match('/^[0-9]+$/', $_POST["editarCuitId"]) &&
                    preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["editarEmail"]) &&
                    preg_match('/^[()\-0-9 ]+$/', $_POST["editarTelefono"]) &&
                    preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["editarDireccion"]) &&
                    preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["editarConsignacion"])){

                     $tabla = "proveedores";

                     $datos = array("id"=>$_POST["idProveedor"],
                                "nombre"=>$_POST["editarProveedor"],
                                "cuit"=>$_POST["editarCuitId"],
                                "email"=>$_POST["editarEmail"],
                                "telefono"=>$_POST["editarTelefono"],
                                "direccion"=>$_POST["editarDireccion"],
                                "consignacion"=>$_POST["editarConsignacion"]);

                     $respuesta = ModeloProveedores::mdlEditarProveedor($tabla, $datos);

                     if($respuesta == "ok"){

                     echo'<script>

                     swal({
                         type: "success",
                         title: "El proveedor ha sido guardado correctamente",
                         showConfirmButton: true,
                         confirmButtonText: "Cerrar"
                         }).then(function(result){
                             if (result.value) {

                             window.location = "proveedores";

                             }
                           })

                     </script>';

                   }

                 }else{

                   echo'<script>

                     swal({
                         type: "error",
                         title: "¡El proveedor no puede ir vacío o llevar caracteres especiales!",
                         showConfirmButton: true,
                         confirmButtonText: "Cerrar"
                         }).then(function(result){
                         if (result.value) {

                         window.location = "proveedores";

                         }
                       })

                     </script>';

                 }

               }

          }

                 /*=============================================
               	ELIMINAR PROVEEDOR
               	=============================================*/

               	static public function ctrEliminarProveedor(){

               		if(isset($_GET["idProveedor"])){

               			$tabla ="proveedores";
               			$datos = $_GET["idProveedor"];

               			$respuesta = ModeloProveedores::mdlEliminarProveedor($tabla, $datos);

               			if($respuesta == "ok"){

               				echo'<script>

               				swal({
               					  type: "success",
               					  title: "El proveedor ha sido borrado correctamente",
               					  showConfirmButton: true,
               					  confirmButtonText: "Cerrar",
               					  closeOnConfirm: false
               					  }).then(function(result){
               								if (result.value) {

               								window.location = "proveedores";

               								}
               							})

               				</script>';

               			}

               		}

               	}
               }
