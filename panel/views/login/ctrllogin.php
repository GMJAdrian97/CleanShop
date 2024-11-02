<?php
    require_once('../../sistema.php');
    /* require_once('../usuario/mdlUsuario.php');
    require_once('../empleados/mdlEmpleado.php'); */
    $accion = NULL;
    if(isset($_GET['accion'])){
        $accion = $_GET['accion'];
    }

    require_once('../../../componentes/headerlogin.php');  //incluimos el header 

    switch($accion){

         case 'loginpato';
                header('Location: ../productos/ctrlproductos.php');
            break;

         case 'login';
                $datos = $_POST;
                if($usuario->login($datos['correo'], $datos['contrasena'])){
                    $usuario -> credentials($datos['correo']);
                    switch($_SESSION['roles'][0]){
                        case 'Administrador':
                            header('Location: ../telefonos/ctrlTelefono.php');
                        break;

                        case 'Supervisor':
                            //print_r($_SESSION['roles'][0]); die();
                            //$datosEmpleado = $empleado->read();
                            header('Location: ../telefonos/ctrlTelefono.php');
                        break;
                        

                        default: //empleado
                            //print_r($_SESSION['roles'][0]); die();
                            header('Location: ../telefonos/ctrlTelefono.php');
                    }
                }
                else{
                    //$sistema -> message(0,"Usuario o contraseña invalidas, porfavor ingresa campos validos");
                    $sistema -> logOut();
                    require_once('index.php');
                    }
        break;

        case 'logOut';
                //$sistema -> message(1,"La sesion se ha cerrado");
                $sistema -> logOut();
                header('Location: ctrlLogin.php');
                break; 

        default:
        require_once('index.php');
    }
    require_once('../../../componentes/footer.php'); 
?>