<?php
/* --- Declaramos las extenciones/clases/archivos a utlizar --- */
    require_once('../../sistema.php');

        class Proveedor extends sistema{
                //declaramos las variables qu utilizaremos que son cada atributo de la tabla sin contar las llaves foraneas
                public $id_proveedor;
                public $nombre_proveedor;
                public $telefono_proveedor;

                /* <!-- Geters & Seters  --> */
                public function getId_proveedor(){
                    return $this->id_proveedor;
                }

                public function setId_proveedor($id_proveedor){
                    $this->id_proveedor = $id_proveedor;
                    return $this;
                }
                public function getNombre_proveedor(){
                    return $this->nombre_proveedor;
                }

                public function setNombre_proveedor($nombre_proveedor){
                    $this->nombre_proveedor = $nombre_proveedor;
                    return $this;
                }    

                public function getTelefono_proveedor()
                {
                     return $this->telefono_proveedor;
                }

                public function setTelefono_proveedor($telefono_proveedor)
                {
                      $this->telefono_proveedor = $telefono_proveedor;
                      return $this;
                }
                
                /* <!-- Metodos CRUD --> */
                        public function read(){
                                $this->connect();
                                $sql = "SELECT * FROM proveedores";
                                $stmt = $this->con->prepare($sql);
                                $stmt->execute();
                                $datosproveedors = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                return $datosproveedors; 
                        }

                        public function readOne($id_proveedor){
                                $this->connect();
                                $sql = "SELECT p.nombre_proveedor, 
                                               p.telefono_proveedor
                                        from proveedores p
                                        WHERE p.id_proveedor = :id_proveedor;";
                                $stmt = $this->con->prepare($sql);
                                $stmt -> bindParam(':id_proveedor', $id_proveedor, PDO::PARAM_STR);
                                $stmt->execute();
                                $datosproveedor = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                $datosproveedor = (isset($datosproveedor[0]))?$datosproveedor[0]:null;
                                return $datosproveedor;
                        }

                        public function create($datosFormularioproveedor){
                                $this->connect();
                                $sql = "INSERT INTO proveedores (nombre_proveedor,
                                                    telefono_proveedor) 
                                               VALUES        (:nombre_proveedor,
                                                              :telefono_proveedor);"; 
                                $stmt = $this->con->prepare($sql);
                                $stmt -> bindParam(':nombre_proveedor', $datosFormularioproveedor['nombre_proveedor'], PDO::PARAM_STR);
                                $stmt -> bindParam(':telefono_proveedor', $datosFormularioproveedor['telefono_proveedor'], PDO::PARAM_STR);
                                $rs = $stmt->execute();
                                return  $stmt->rowCount();
                        }

                        public function update($datosFormularioproveedorUP, $id_proveedor){
                                $this->connect();
                                    $sql = "UPDATE proveedores SET nombre_proveedor = :nombre_proveedor, 
                                                                   telefono_proveedor = :telefono_proveedor
                                                WHERE id_proveedor = :id_proveedor;";
                                $stmt = $this->con->prepare($sql);
                                $stmt -> bindParam(':nombre_proveedor', $datosFormularioproveedorUP['nombre_proveedor'], PDO::PARAM_STR);
                                $stmt -> bindParam(':telefono_proveedor', $datosFormularioproveedorUP['telefono_proveedor'], PDO::PARAM_STR);
                                $stmt -> bindParam(':id_proveedor', $id_proveedor, PDO::PARAM_STR);
                                $rs = $stmt->execute();
                                return  $stmt->rowCount();
                        }

                        public function delete($id_proveedor){
                                $this->connect();
                                $sql = "DELETE FROM proveedores WHERE id_proveedor = :id_proveedor";
                                $stmt = $this->con->prepare($sql);
                                $stmt -> bindParam(':id_proveedor', $id_proveedor, PDO::PARAM_STR);
                                $rs = $stmt->execute();
                                return $stmt->rowCount();
                        }

               
        }


    /* Declaracion del objeto de la clase */
    $proveedor = new Proveedor;
    
?>