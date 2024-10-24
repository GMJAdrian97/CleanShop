<?php
/* --- Declaramos las extenciones/clases/archivos a utlizar --- */
        require_once('mdlsucursal.php');
        require_once('../municipio/mdlmunicipio.php');

    /* $rolUsuario = $sistema -> validarRol('Administrador'); */

    /* <!-- Validamos el id_sucursal de la sucursal y la accion las cuales se mandan por metodo GET(Por URL) 
            para evaluar la accion que se realizará  --> */
        $id_sucursal = NULL;
        $accion = NULL;
        if(isset($_GET['accion'])){/* Si la URL tiene una accion  */
            $id_sucursal = isset($_GET['id_sucursal']) ? $_GET['id_sucursal'] : NULL; /* Si id_sucursal contiene informacion se la asigna a la variable $sucursal y si no la deja como null */
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
                //Llamamos al obejeto municipio en su metodo read para utilizarlo en los select del formulario
                $datosmunicipios = $municipio->read();
                /* Llama al formulario */
                require_once('formulariosucursal.php');
            break;

            case 'add':
                /* cachamos tosdos los datos del fromulario que se mandaron por $_POST en la variable $datosFormulariosucursal */
                $datosFormulariosucursal = $_POST;
                /* llamamos al metodo create del objeto sucursal de la clase sucursal y mandamos de parametreo la variable $datosFormulariosucursal que contiene los datos que mandamos del fromulario */
                $resultado = $sucursal->create($datosFormulariosucursal);
                /* llamamos al metodo read del objeto sucursal de la clase sucursal para hacer un select de todos los datos para despues mostrarlos en la tabla del index */
                $datossucursals = $sucursal->read();
                /* Llamamos al index */
                require_once('index.php');
            break;

            case 'modify':
                /* se genera una variable "$datossucursal" para obtener los datos de una sucursal dependiendo su id declarondo el 
                objeto en su metodo readOne y mandamos el id_sucursal como para parametro*/
                $datossucursal = $sucursal->readOne($id_sucursal);
                /* Si nos devuelve un arreglo entra al formulario para poderlo editar */
                if(is_array($datossucursal)){
                //Llamamos al obejeto municipio en su metodo read para utilizarlo en los select del formulario
                $datosmunicipios = $municipio->read();
                    require_once('formulariosucursal.php');
                } else{
                    require_once('index.php'); /* Si no nos devuelve un arreglo entra al index */
                    }
            break;
    
            case 'update':
                /* Caso Update se genera unavariable "$datosFormulariosucursalUP" para almacenar los datos que se modificaron de los
                 atributo que se espesifico con el id mediante el formulario que se manda por $_POST*/
                $datosFormulariosucursalUP=$_POST;
                /* Se manda a llamar el metodo de update del objeto sucursal para relizar el update de los datos que anteriomente alamcenamos 
                en la variable $datosFormulariosucursalUP mandando esta comno parametro*/
                $resultado = $sucursal->update($datosFormulariosucursalUP,$id_sucursal);
                /* Se vuelve a mostrar la lista de sucursals actualizada */
                $datossucursals = $sucursal->read();
                require_once('index.php');
            break;

            case 'delete':
                $resultado = $sucursal->delete($id_sucursal);

            /* Caso por default accion = a lo que sea */
            default: 
            /* $datossucursals sera igual al array que el objeto sucursal en su metodo read nos devuelva */
            $datossucursals = $sucursal->read();
            require_once('index.php'); /* Incluimos el index de sucursal */
        }

    /* <!-- Switch para ejecutar la accion correspondiente --> */


        require_once('../../../componentes/footer.php');  //incluimos el footer 


?>