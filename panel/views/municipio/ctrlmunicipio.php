<?php
/* --- Declaramos las extenciones/clases/archivos a utlizar --- */
        require_once('mdlmunicipio.php');

    /* $rolUsuario = $sistema -> validarRol('Administrador'); */

    /* <!-- Validamos el id_municipio de la municipio y la accion las cuales se mandan por metodo GET(Por URL) 
            para evaluar la accion que se realizará  --> */
        $id_municipio = NULL;
        $accion = NULL;
        if(isset($_GET['accion'])){/* Si la URL tiene una accion  */
            $id_municipio = isset($_GET['id_municipio']) ? $_GET['id_municipio'] : NULL; /* Si id_municipio contiene informacion se la asigna a la variable $municipio y si no la deja como null */
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
                require_once('formulariomunicipio.php');
            break;

            case 'add':
                /* cachamos tosdos los datos del fromulario que se mandaron por $_POST en la variable $datosFormulariomunicipio */
                $datosFormulariomunicipio = $_POST;
                /* llamamos al metodo create del objeto municipio de la clase municipio y mandamos de parametreo la variable $datosFormulariomunicipio que contiene los datos que mandamos del fromulario */
                $resultado = $municipio->create($datosFormulariomunicipio);
                /* llamamos al metodo read del objeto municipio de la clase municipio para hacer un select de todos los datos para despues mostrarlos en la tabla del index */
                $datosmunicipios = $municipio->read();
                /* Llamamos al index */
                require_once('index.php');
            break;

            case 'modify':
                /* se genera una variable "$datosmunicipio" para obtener los datos de una municipio dependiendo su id declarondo el 
                objeto en su metodo readOne y mandamos el id_municipio como para parametro*/
                $datosmunicipio = $municipio->readOne($id_municipio);
                /* Si nos devuelve un arreglo entra al formulario para poderlo editar */
                if(is_array($datosmunicipio)){
                    require_once('formulariomunicipio.php');
                } else{
                    require_once('index.php'); /* Si no nos devuelve un arreglo entra al index */
                    }
            break;
    
            case 'update':
                /* Caso Update se genera unavariable "$datosFormulariomunicipioUP" para almacenar los datos que se modificaron de los
                 atributo que se espesifico con el id mediante el formulario que se manda por $_POST*/
                $datosFormulariomunicipioUP=$_POST;
                /* Se manda a llamar el metodo de update del objeto municipio para relizar el update de los datos que anteriomente alamcenamos 
                en la variable $datosFormulariomunicipioUP mandando esta comno parametro*/
                $resultado = $municipio->update($datosFormulariomunicipioUP,$id_municipio);
                /* Se vuelve a mostrar la lista de municipios actualizada */
                $datosmunicipios = $municipio->read();
                require_once('index.php');
            break;

            case 'delete':
                $resultado = $municipio->delete($id_municipio);

            /* Caso por default accion = a lo que sea */
            default: 
            /* $datosmunicipios sera igual al array que el objeto municipio en su metodo read nos devuelva */
            $datosmunicipios = $municipio->read();
            require_once('index.php'); /* Incluimos el index de municipio */
        }

    /* <!-- Switch para ejecutar la accion correspondiente --> */


        require_once('../../../componentes/footer.php');  //incluimos el footer 


?>