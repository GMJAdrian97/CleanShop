<?php

session_start();

    class Sistema{
        public $con;

        public function connect(){
            $dbDriver = "mysql";
            $dbHost = "localhost";
            /*$dbUser = "u820929871_telefonia";*/
             $dbUser = "clean_shop";
            /*$dbPass = "041DMcomunicaciones223"; */
             $dbPass = "12345";
             /*$db = "u820929871_telefonia"; */
            $db = "clean_shop";
            /*$this->con = new mysqli($dbHost,$dbUser,$dbPass,$db);*/
            $this->con = new PDO($dbDriver.':host='.$dbHost.';dbname='.$db, $dbUser, $dbPass);
        }

        public function query($sql){
            $this->connect();
            $rs = $this->con->query($sql);
            return $rs;
        }

         //Login
         /* public function login($correo,$contrasena){
            $this->connect();
            if($this->validarCorreo($correo)){
                $contrasena = md5($contrasena);
                $sql = "SELECT * FROM usuario 
                    WHERE correo = :correo 
                    and contrasena = :contrasena";
                $stmt = $this->con->prepare($sql);
                $stmt -> bindParam(':correo', $correo, PDO::PARAM_STR);
                $stmt -> bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
                $stmt->execute();
                $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
                if(isset($datos[0])){
                    return true;
                }
                return false; 
            }
        } */

        //eliminar la sesion 
       /*  public function logOut(){
            unset($_SESSION);
            session_destroy();
        } */


        /* public function validarRol($rol){
            $roles = array();
            if(isset($_SESSION['roles'])){
                $roles = $_SESSION['roles'];
            }
            
            if(!in_array($rol,$roles)){

                //require_once '../../../Componentes/headerSinM.php';
                //$this->message(0,"Usted no tiene el rol necesario, consulate al administrador" );
                //require_once '../../../Componentes/footer.php';
                echo "no seas tramposo no tienes los permisos necesarios, tu eres un: "."".$roles[0];
                die();
            }
            return $roles[0];
            
        } */


        //validar correo
       /*  public function validarCorreo($correo){
            if(filter_var($correo, FILTER_VALIDATE_EMAIL)){
                return true;
            }
            return false;
        } */

        //Cargar Imegnes
        /* public function cargarImagen($dimension, $destino) {
            if (isset($_FILES[$dimension])) {
                if ($_FILES[$dimension]['error'] == 0) { // Verificar si no hay errores al subir el archivo
                    $tiposPermitidos = array("image/jpeg", "image/gif", "image/png", "image/jpg");
        
                    if (in_array($_FILES[$dimension]['type'], $tiposPermitidos)) { // Validar si el tipo de archivo es permitido
                        if ($_FILES[$dimension]['size'] <= 10000000) { // Validar el tamaño máximo del archivo (512 KB en este caso)
                            $nombre = md5(time()); // Generar un nombre único basado en el tiempo actual
                            $extension = explode("/", $_FILES[$dimension]['type']);
                            $nombre = $nombre . "." . $extension[1]; // Agregar la extensión al nombre del archivo
                            $destino = $destino . $nombre; // Construir la ruta completa de destino
        
                            if (move_uploaded_file($_FILES[$dimension]['tmp_name'], $destino)) { // Mover el archivo al destino final
                                return $nombre; // Devolver el nombre del archivo como indicación de éxito
                            }
                        }
                    }
                }
            }
        
            return null; // Devolver null si no se pudo cargar la imagen
        } */
        
    }

    $sistema = new Sistema();
?>