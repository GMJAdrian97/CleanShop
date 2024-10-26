<?php
/* --- Declaramos las extenciones/clases/archivos a utlizar --- */
        require_once('mdlrol.php');

    /* $rolUsuario = $sistema -> validarRol('Administrador'); */

    /* <!-- Validamos el id_rol de la rol y la accion las cuales se mandan por metodo GET(Por URL) 
            para evaluar la accion que se realizará  --> */
        $id_rol = NULL;
        $accion = NULL;
        if(isset($_GET['accion'])){/* Si la URL tiene una accion  */
            $id_rol = isset($_GET['id_rol']) ? $_GET['id_rol'] : NULL; /* Si id_rol contiene informacion se la asigna a la variable $rol y si no la deja como null */
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
                require_once('formulariorol.php');
            break;

            case 'add':
                /* cachamos tosdos los datos del fromulario que se mandaron por $_POST en la variable $datosFormulariorol */
                $datosFormulariorol = $_POST;
                /* llamamos al metodo create del objeto rol de la clase rol y mandamos de parametreo la variable $datosFormulariorol que contiene los datos que mandamos del fromulario */
                $resultado = $rol->create($datosFormulariorol);
                /* llamamos al metodo read del objeto rol de la clase rol para hacer un select de todos los datos para despues mostrarlos en la tabla del index */
                $datosrols = $rol->read();
                /* Llamamos al index */
                require_once('index.php');
            break;

            case 'modify':
                /* se genera una variable "$datosrol" para obtener los datos de una rol dependiendo su id declarondo el 
                objeto en su metodo readOne y mandamos el id_rol como para parametro*/
                $datosrol = $rol->readOne($id_rol);
                /* Si nos devuelve un arreglo entra al formulario para poderlo editar */
                if(is_array($datosrol)){
                    require_once('formulariorol.php');
                } else{
                    require_once('index.php'); /* Si no nos devuelve un arreglo entra al index */
                    }
            break;
    
            case 'update':
                /* Caso Update se genera unavariable "$datosFormulariorolUP" para almacenar los datos que se modificaron de los
                 atributo que se espesifico con el id mediante el formulario que se manda por $_POST*/
                $datosFormulariorolUP=$_POST;
                /* Se manda a llamar el metodo de update del objeto rol para relizar el update de los datos que anteriomente alamcenamos 
                en la variable $datosFormulariorolUP mandando esta comno parametro*/
                $resultado = $rol->update($datosFormulariorolUP,$id_rol);
                /* Se vuelve a mostrar la lista de rols actualizada */
                $datosrols = $rol->read();
                require_once('index.php');
            break;

            case 'delete':
                $resultado = $rol->delete($id_rol);

            /* Caso por default accion = a lo que sea */
            default: 
            /* $datosrols sera igual al array que el objeto rol en su metodo read nos devuelva */
            $datosrols = $rol->read();
            require_once('index.php'); /* Incluimos el index de rol */
        }

    /* <!-- Switch para ejecutar la accion correspondiente --> */


        require_once('../../../componentes/footer.php');  //incluimos el footer 


?>