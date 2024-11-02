<?php
/* --- Declaramos las extenciones/clases/archivos a utlizar --- */
        require_once('mdlproductos.php');
        require_once('../categoria/mdlcategoria.php');
        require_once('../marcas/mdlmarca.php');
        require_once('../proveedores/mdlproveedor.php');
        require_once('../sucursal/mdlsucursal.php');

    /* $rolUsuario = $sistema -> validarRol('Administrador'); */

    /* <!-- Validamos el id_producto de la producto y la accion las cuales se mandan por metodo GET(Por URL) 
            para evaluar la accion que se realizará  --> */
        $id_producto = NULL;
        $accion = NULL;
        if(isset($_GET['accion'])){/* Si la URL tiene una accion  */
            $id_producto = isset($_GET['id_producto']) ? $_GET['id_producto'] : NULL; /* Si id_producto contiene informacion se la asigna a la variable $producto y si no la deja como null */
            $accion = $_GET['accion'];  /* la accion que se manda por la URL se le asigna a la variable $accion */
        }

        /* incluimos el header  */
        require_once('../../../componentes/header.php');

    /* <!-- Switch para ejecutar la accion correspondiente --> */

        switch($accion){
            /* Case new es para hacdr una insersion en la tabla */
            case 'new':
                /* Para obtener datos de llaves foraneas declarar una variable y llenarla mediate el metodo del objeto coreespondiente */
                /* Ejemplo; $datosUnudadPeso = $unidadPeso->read(); */
                $datosCategorias = $categoria->read();
                $datosMarcas = $marca->read();
                $datosProveedors = $proveedor->read();
                $datosSucursals = $sucursal->read();
                /* Llama al formulario */
                require_once('formproductos.php');
            break;

            case 'add':
                /* cachamos tosdos los datos del fromulario que se mandaron por $_POST en la variable $datosFormularioProducto */
                $datosFormularioProducto = $_POST;
                /* llamamos al metodo create del objeto producto de la clase producto y mandamos de parametreo la variable $datosFormularioProducto que contiene los datos que mandamos del fromulario */
                $resultado = $producto->create($datosFormularioProducto);
                /* llamamos al metodo read del objeto producto de la clase producto para hacer un select de todos los datos para despues mostrarlos en la tabla del index */
                $datosProductos = $producto->read();
                /* Llamamos al index */
                
                require_once('index.php');
            break;

            case 'modify':
                /* se genera una variable "$datosProductos" para obtener los datos de una producto dependiendo su id declarondo el 
                objeto en su metodo readOne y mandamos el id_producto como para parametro*/
                $datosProductos = $producto->readOne($id_producto);
                /* Si nos devuelve un arreglo entra al formulario para poderlo editar */
                if(is_array($datosProductos)){
                     //Llamamos al obejeto municipio en su metodo read para utilizarlo en los select del formulario
                     $datosCategorias = $categoria->read();
                     $datosMarcas = $marca->read();
                     $datosProveedors = $proveedor->read();
                     $datosSucursals = $sucursal->read();
                    require_once('formproductos.php');
                } else{
                    require_once('index.php'); /* Si no nos devuelve un arreglo entra al index */
                    }
            break;
    
            case 'update':
                /* Caso Update se genera unavariable "$datosFormularioProductoUP" para almacenar los datos que se modificaron de los
                 atributo que se espesifico con el id mediante el formulario que se manda por $_POST*/
                $datosFormularioProductoUP=$_POST;
                /* Se manda a llamar el metodo de update del objeto producto para relizar el update de los datos que anteriomente alamcenamos 
                en la variable $datosFormularioProductoUP mandando esta comno parametro*/
                $resultado = $producto->update($datosFormularioProductoUP,$id_producto);
                /* Se vuelve a mostrar la lista de productos actualizada */
                $datosProductos = $producto->read();
                require_once('index.php');
            break;

            case 'delete':
                $resultado = $producto->delete($id_producto);

            /* Caso por default accion = a lo que sea */
            default: 
            /* $datosproductos sera igual al array que el objeto producto en su metodo read nos devuelva */
            $datosProductos = $producto->read();
            require_once('index.php'); /* Incluimos el index de producto */
        }

    /* <!-- Switch para ejecutar la accion correspondiente --> */


        require_once('../../../componentes/footer.php');  //incluimos el footer 


?>