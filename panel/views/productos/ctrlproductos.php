<?php

    /* <!-- Estados de los que se alimenta la el Estado Ciudad --> */

        require_once('mdlproductos.php');
        /* require_once('../categoria/mdlcategoria.php'); */

    /* <!--  Estados de los que se alimenta la el Estado Ciudad --> */

    /* $rolUsuario = $sistema -> validarRol('Administrador'); */

    /* <!-- Cachamos el id_producto del Ciudad y la accion que deseamos realizar  --> */

        $id_producto = NULL;
        $accion = NULL;
        if(isset($_GET['accion'])){
            $id_producto = isset($_GET['id_producto']) ? $_GET['id_producto'] : NULL;
            $accion = $_GET['accion'];
        }

    /* <!-- Cachamos el id_producto del Ciudad y la accion que deseamos realizar  --> */

        require_once('../../../componentes/header.php');  //incluimos el header 

    /* <!-- Switch para ejecutar la accion correspondiente --> */

        switch($accion){

            case 'new':
                $datosEstados = $estado->read(); //incluimos la lectura de los datos Estados para que nos traiga todas las categorias esxitentes en la BD
                require_once('formularioCiudad.php');
            break;

            case 'add':
                $datosFormularioCiudad = $_POST; // cachamos tosdos los datos del fromulario que se mandaron por $_POST en la variable $datosFormularioCiudad
                $resultado = $ciudad->create($datosFormularioCiudad); // llamamos al metodo create del objeto Ciudad de la clasd Ciudad y mandsms de parametreo la variable $datosFormularioCiudad que contiene los datos que mandamos del fromulario
                $datosCiudades = $ciudad->read(); //llamamos al metodo read del objeto Ciudad de la clase Ciudad para hacer un select
                require_once('index.php');
            break;

            case 'modify':
                $datosCiudad = $ciudad->readOne($id_producto);
                $datosEstados = $estado->read();
                if(is_array($datosCiudad)){
                    require_once('formularioCiudad.php');
                } else{
                    $datosEstados = $estado->read();
                    require_once('formularioCiudad.php');
                    }
            break;
    
            case 'update':
                $datosFormularioCiudadUP=$_POST;
                $resultado = $ciudad->update($datosFormularioCiudadUP,$id_producto);
                $datosCiudades = $ciudad->read();
                require_once('index.php');
            break;

            case 'delete':
                $resultado = $ciudad->delete($id_producto);

            default: 
            $datosProductos = $producto->read();
            require_once('index.php');
        }

    /* <!-- Switch para ejecutar la accion correspondiente --> */


        require_once('../../../componentes/footer.php');  //incluimos el footer 


?>