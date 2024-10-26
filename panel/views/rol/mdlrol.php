<?php
/* --- Declaramos las extenciones/clases/archivos a utlizar --- */
    require_once('../../sistema.php');

        class Rol extends sistema{
                //declaramos las variables qu utilizaremos que son cada atributo de la tabla sin contar las llaves foraneas
                public $id_rol;
                public $nombre_rol;

                /* <!-- Geters & Seters  --> */
                public function getId_rol(){
                    return $this->id_rol;
                }

                public function setId_rol($id_rol){
                    $this->id_rol = $id_rol;
                    return $this;
                }
                public function getNombre_rol(){
                    return $this->nombre_rol;
                }

                public function setNombre_rol($nombre_rol){
                    $this->nombre_rol = $nombre_rol;
                    return $this;
                }    
                
                /* <!-- Metodos CRUD --> */
                        public function read(){
                                $this->connect();
                                $sql = "SELECT * FROM rol";
                                $stmt = $this->con->prepare($sql);
                                $stmt->execute();
                                $datosrols = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                return $datosrols; 
                        }

                        public function readOne($id_rol){
                                $this->connect();
                                $sql = "SELECT r.nombre_rol
                                        from rol r
                                        WHERE r.id_rol = :id_rol;";
                                $stmt = $this->con->prepare($sql);
                                $stmt -> bindParam(':id_rol', $id_rol, PDO::PARAM_STR);
                                $stmt->execute();
                                $datosrol = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                $datosrol = (isset($datosrol[0]))?$datosrol[0]:null;
                                return $datosrol;
                        }

                        public function create($datosFormulariorol){
                                $this->connect();
                                $sql = "INSERT INTO rol (nombre_rol) 
                                               VALUES        (:nombre_rol);"; 
                                $stmt = $this->con->prepare($sql);
                                $stmt -> bindParam(':nombre_rol', $datosFormulariorol['nombre_rol'], PDO::PARAM_STR);
                                $rs = $stmt->execute();
                                return  $stmt->rowCount();
                        }

                        public function update($datosFormulariorolUP, $id_rol){
                                $this->connect();
                                    $sql = "UPDATE rol SET nombre_rol = :nombre_rol
                                                WHERE id_rol = :id_rol;";
                                $stmt = $this->con->prepare($sql);
                                $stmt -> bindParam(':nombre_rol', $datosFormulariorolUP['nombre_rol'], PDO::PARAM_STR);
                                $stmt -> bindParam(':id_rol', $id_rol, PDO::PARAM_STR);
                                $rs = $stmt->execute();
                                return  $stmt->rowCount();
                        }

                        public function delete($id_rol){
                                $this->connect();
                                $sql = "DELETE FROM rol WHERE id_rol = :id_rol";
                                $stmt = $this->con->prepare($sql);
                                $stmt -> bindParam(':id_rol', $id_rol, PDO::PARAM_STR);
                                $rs = $stmt->execute();
                                return $stmt->rowCount();
                        }
        }


    /* Declaracion del objeto de la clase */
    $rol = new Rol;
    
?>