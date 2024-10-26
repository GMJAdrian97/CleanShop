<?php
/* --- Declaramos las extenciones/clases/archivos a utlizar --- */
        require_once('mdlcalidad.php');

    /* $rolUsuario = $sistema -> validarRol('Administrador'); */

    /* <!-- Validamos el id_calidad de la calidad y la accion las cuales se mandan por metodo GET(Por URL) 
            para evaluar la accion que se realizará  --> */
        $id_calidad = NULL;
        $accion = NULL;
        if(isset($_GET['accion'])){/* Si la URL tiene una accion  */
            $id_calidad = isset($_GET['id_calidad']) ? $_GET['id_calidad'] : NULL; /* Si id_calidad contiene informacion se la asigna a la variable $calidad y si no la deja como null */
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
                require_once('formulariocalidad.php');
            break;

            case 'add':
                /* cachamos tosdos los datos del fromulario que se mandaron por $_POST en la variable $datosFormulariocalidad */
                $datosFormulariocalidad = $_POST;
                /* llamamos al metodo create del objeto calidad de la clase calidad y mandamos de parametreo la variable $datosFormulariocalidad que contiene los datos que mandamos del fromulario */
                $resultado = $calidad->create($datosFormulariocalidad);
                /* llamamos al metodo read del objeto calidad de la clase calidad para hacer un select de todos los datos para despues mostrarlos en la tabla del index */
                $datoscalidads = $calidad->read();
                /* Llamamos al index */
                require_once('index.php');
            break;

            case 'modify':
                /* se genera una variable "$datoscalidad" para obtener los datos de una calidad dependiendo su id declarondo el 
                objeto en su metodo readOne y mandamos el id_calidad como para parametro*/
                $datoscalidad = $calidad->readOne($id_calidad);
                /* Si nos devuelve un arreglo entra al formulario para poderlo editar */
                if(is_array($datoscalidad)){
                    require_once('formulariocalidad.php');
                } else{
                    require_once('index.php'); /* Si no nos devuelve un arreglo entra al index */
                    }
            break;
    
            case 'update':
                /* Caso Update se genera unavariable "$datosFormulariocalidadUP" para almacenar los datos que se modificaron de los
                 atributo que se espesifico con el id mediante el formulario que se manda por $_POST*/
                $datosFormulariocalidadUP=$_POST;
                /* Se manda a llamar el metodo de update del objeto calidad para relizar el update de los datos que anteriomente alamcenamos 
                en la variable $datosFormulariocalidadUP mandando esta comno parametro*/
                $resultado = $calidad->update($datosFormulariocalidadUP,$id_calidad);
                /* Se vuelve a mostrar la lista de calidads actualizada */
                $datoscalidads = $calidad->read();
                require_once('index.php');
            break;

            case 'delete':
                $resultado = $calidad->delete($id_calidad);

            /* Caso por default accion = a lo que sea */
            default: 
            /* $datoscalidads sera igual al array que el objeto calidad en su metodo read nos devuelva */
            $datoscalidads = $calidad->read();
            require_once('index.php'); /* Incluimos el index de calidad */
        }

    /* <!-- Switch para ejecutar la accion correspondiente --> */


        require_once('../../../componentes/footer.php');  //incluimos el footer 


?>