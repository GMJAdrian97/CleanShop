<?php
/* --- Declaramos las extenciones/clases/archivos a utlizar --- */
        require_once('mdlestado.php');

    /* $rolUsuario = $sistema -> validarRol('Administrador'); */

    /* <!-- Validamos el id_estado de la estado y la accion las cuales se mandan por metodo GET(Por URL) 
            para evaluar la accion que se realizará  --> */
        $id_estado = NULL;
        $accion = NULL;
        if(isset($_GET['accion'])){/* Si la URL tiene una accion  */
            $id_estado = isset($_GET['id_estado']) ? $_GET['id_estado'] : NULL; /* Si id_estado contiene informacion se la asigna a la variable $estado y si no la deja como null */
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
                require_once('formularioestado.php');
            break;

            case 'add':
                /* cachamos tosdos los datos del fromulario que se mandaron por $_POST en la variable $datosFormularioestado */
                $datosFormularioestado = $_POST;
                /* llamamos al metodo create del objeto estado de la clase estado y mandamos de parametreo la variable $datosFormularioestado que contiene los datos que mandamos del fromulario */
                $resultado = $estado->create($datosFormularioestado);
                /* llamamos al metodo read del objeto estado de la clase estado para hacer un select de todos los datos para despues mostrarlos en la tabla del index */
                $datosestados = $estado->read();
                /* Llamamos al index */
                require_once('index.php');
            break;

            case 'modify':
                /* se genera una variable "$datosestado" para obtener los datos de una estado dependiendo su id declarondo el 
                objeto en su metodo readOne y mandamos el id_estado como para parametro*/
                $datosestado = $estado->readOne($id_estado);
                /* Si nos devuelve un arreglo entra al formulario para poderlo editar */
                if(is_array($datosestado)){
                    require_once('formularioestado.php');
                } else{
                    require_once('index.php'); /* Si no nos devuelve un arreglo entra al index */
                    }
            break;
    
            case 'update':
                /* Caso Update se genera unavariable "$datosFormularioestadoUP" para almacenar los datos que se modificaron de los
                 atributo que se espesifico con el id mediante el formulario que se manda por $_POST*/
                $datosFormularioestadoUP=$_POST;
                /* Se manda a llamar el metodo de update del objeto estado para relizar el update de los datos que anteriomente alamcenamos 
                en la variable $datosFormularioestadoUP mandando esta comno parametro*/
                $resultado = $estado->update($datosFormularioestadoUP,$id_estado);
                /* Se vuelve a mostrar la lista de estados actualizada */
                $datosestados = $estado->read();
                require_once('index.php');
            break;

            case 'delete':
                $resultado = $estado->delete($id_estado);

            /* Caso por default accion = a lo que sea */
            default: 
            /* $datosestados sera igual al array que el objeto estado en su metodo read nos devuelva */
            $datosestados = $estado->read();
            require_once('index.php'); /* Incluimos el index de estado */
        }

    /* <!-- Switch para ejecutar la accion correspondiente --> */


        require_once('../../../componentes/footer.php');  //incluimos el footer 


?>