<?php
/* --- Declaramos las extenciones/clases/archivos a utlizar --- */
        require_once('mdlproveedor.php');

    /* $rolUsuario = $sistema -> validarRol('Administrador'); */

    /* <!-- Validamos el id_proveedor de la proveedor y la accion las cuales se mandan por metodo GET(Por URL) 
            para evaluar la accion que se realizará  --> */
        $id_proveedor = NULL;
        $accion = NULL;
        if(isset($_GET['accion'])){/* Si la URL tiene una accion  */
            $id_proveedor = isset($_GET['id_proveedor']) ? $_GET['id_proveedor'] : NULL; /* Si id_proveedor contiene informacion se la asigna a la variable $proveedor y si no la deja como null */
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
                /* Llama al formulario */
                require_once('formularioproveedor.php');
            break;

            case 'add':
                /* cachamos tosdos los datos del fromulario que se mandaron por $_POST en la variable $datosFormularioproveedor */
                $datosFormularioproveedor = $_POST;
                /* llamamos al metodo create del objeto proveedor de la clase proveedor y mandamos de parametreo la variable $datosFormularioproveedor que contiene los datos que mandamos del fromulario */
                $resultado = $proveedor->create($datosFormularioproveedor);
                /* llamamos al metodo read del objeto proveedor de la clase proveedor para hacer un select de todos los datos para despues mostrarlos en la tabla del index */
                $datosproveedors = $proveedor->read();
                /* Llamamos al index */
                require_once('index.php');
            break;

            case 'modify':
                /* se genera una variable "$datosproveedor" para obtener los datos de una proveedor dependiendo su id declarondo el 
                objeto en su metodo readOne y mandamos el id_proveedor como para parametro*/
                $datosproveedor = $proveedor->readOne($id_proveedor);
                /* Si nos devuelve un arreglo entra al formulario para poderlo editar */
                if(is_array($datosproveedor)){
                    require_once('formularioproveedor.php');
                } else{
                    require_once('index.php'); /* Si no nos devuelve un arreglo entra al index */
                    }
            break;
    
            case 'update':
                /* Caso Update se genera unavariable "$datosFormularioproveedorUP" para almacenar los datos que se modificaron de los
                 atributo que se espesifico con el id mediante el formulario que se manda por $_POST*/
                $datosFormularioproveedorUP=$_POST;
                /* Se manda a llamar el metodo de update del objeto proveedor para relizar el update de los datos que anteriomente alamcenamos 
                en la variable $datosFormularioproveedorUP mandando esta comno parametro*/
                $resultado = $proveedor->update($datosFormularioproveedorUP,$id_proveedor);
                /* Se vuelve a mostrar la lista de proveedors actualizada */
                $datosproveedors = $proveedor->read();
                require_once('index.php');
            break;

            case 'delete':
                $resultado = $proveedor->delete($id_proveedor);

            /* Caso por default accion = a lo que sea */
            default: 
            /* $datosproveedors sera igual al array que el objeto proveedor en su metodo read nos devuelva */
            $datosproveedors = $proveedor->read();
            require_once('index.php'); /* Incluimos el index de proveedor */
        }

    /* <!-- Switch para ejecutar la accion correspondiente --> */


        require_once('../../../componentes/footer.php');  //incluimos el footer 


?>