<?php
/* --- Declaramos las extenciones/clases/archivos a utlizar --- */
    require_once('../../sistema.php');

        class Sucursal extends sistema{
             //declaramos las variables qu utilizaremos que son cada atributo de la tabla sin contar las llaves foraneas
                public $id_sucursal;
                public $nombre_sucursal;
                public $direccion_sucursal;
                public $telefono_sucursal;

                /* <!-- Geters & Seters  --> */
                public function getId_sucursal(){
                    return $this->id_sucursal;
                }

                public function setId_sucursal($id_sucursal){
                    $this->id_sucursal = $id_sucursal;
                    return $this;
                }
                public function getNombre_sucursal(){
                    return $this->nombre_sucursal;
                }

                public function setNombre_sucursal($nombre_sucursal){
                    $this->nombre_sucursal = $nombre_sucursal;
                    return $this;
                }    

                public function getDireccion_sucursal(){
                    return $this->direccion_sucursal;
                }

                public function setDireccion_sucursal($direccion_sucursal){
                    $this->direccion_sucursal = $direccion_sucursal;
                    return $this;
                }

                public function getTelefono_sucursal(){
                    return $this->telefono_sucursal;
                }

                public function setTelefono_sucursal($telefono_sucursal){
                    $this->telefono_sucursal = $telefono_sucursal;
                    return $this;
                }
                
                /* <!-- Metodos CRUD --> */
                        public function read(){
                                $this->connect();
                                $sql = "SELECT s.id_sucursal,
                                                s.nombre_sucursal,
                                                s.direccion_sucursal,
                                                s.telefono_sucursal,
                                                m.nombre_municipio AS municipio
                                        FROM sucursal s
                                        INNER JOIN municipio m ON m.id_municipio = s.id_municipio";
                                $stmt = $this->con->prepare($sql);
                                $stmt->execute();
                                $datossucursals = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                return $datossucursals; 
                        }

                        public function readOne($id_sucursal){
                                $this->connect();
                                $sql = "SELECT s.nombre_sucursal,
                                                s.direccion_sucursal,
                                                s.telefono_sucursal,
                                                m.nombre_municipio AS municipio
                                        FROM sucursal s
                                        INNER JOIN municipio m ON m.id_municipio = s.id_municipio
                                        WHERE s.id_sucursal =  :id_sucursal;";
                                $stmt = $this->con->prepare($sql);
                                $stmt -> bindParam(':id_sucursal', $id_sucursal, PDO::PARAM_STR);
                                $stmt->execute();
                                $datossucursal = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                $datossucursal = (isset($datossucursal[0]))?$datossucursal[0]:null;
                                return $datossucursal;
                        }

                        public function create($datosFormulariosucursal){
                                $this->connect();
                                $sql = "INSERT INTO sucursal (nombre_sucursal,
                                                              direccion_sucursal,
                                                              telefono_sucursal,
                                                              id_municipio) 
                                               VALUES        (:nombre_sucursal,
                                                              :direccion_sucursal,
                                                              :telefono_sucursal,
                                                              :id_municipio);"; 
                                $stmt = $this->con->prepare($sql);
                                $stmt -> bindParam(':nombre_sucursal', $datosFormulariosucursal['nombre_sucursal'], PDO::PARAM_STR);
                                $stmt -> bindParam(':direccion_sucursal', $datosFormulariosucursal['direccion_sucursal'], PDO::PARAM_STR);
                                $stmt -> bindParam(':telefono_sucursal', $datosFormulariosucursal['telefono_sucursal'], PDO::PARAM_STR);
                                $stmt -> bindParam(':id_municipio', $datosFormulariosucursal['id_municipio'], PDO::PARAM_INT);
                                $rs = $stmt->execute();
                                return  $stmt->rowCount();
                        }

                        public function update($datosFormulariosucursalUP, $id_sucursal){
                                $this->connect();
                                    $sql = "UPDATE sucursal SET nombre_sucursal = :nombre_sucursal,
                                                                direccion_sucursal = :direccion_sucursal,
                                                                telefono_sucursal = :telefono_sucursal,
                                                                id_municipio = :id_municipio
                                                WHERE id_sucursal = :id_sucursal;";
                                $stmt = $this->con->prepare($sql);
                                $stmt -> bindParam(':nombre_sucursal', $datosFormulariosucursalUP['nombre_sucursal'], PDO::PARAM_STR);
                                $stmt -> bindParam(':direccion_sucursal', $datosFormulariosucursalUP['direccion_sucursal'], PDO::PARAM_STR);
                                $stmt -> bindParam(':telefono_sucursal', $datosFormulariosucursalUP['telefono_sucursal'], PDO::PARAM_STR);
                                $stmt -> bindParam(':id_municipio', $datosFormulariosucursalUP['id_municipio'], PDO::PARAM_INT);
                                $stmt -> bindParam(':id_sucursal', $id_sucursal, PDO::PARAM_INT);
                                $rs = $stmt->execute();
                                return  $stmt->rowCount();
                        }

                        public function delete($id_sucursal){
                                $this->connect();
                                $sql = "DELETE FROM sucursal WHERE id_sucursal = :id_sucursal";
                                $stmt = $this->con->prepare($sql);
                                $stmt -> bindParam(':id_sucursal', $id_sucursal, PDO::PARAM_STR);
                                $rs = $stmt->execute();
                                return $stmt->rowCount();
                        }
        }


    /* Declaracion del objeto de la clase */
    $sucursal = new Sucursal;
    
?>