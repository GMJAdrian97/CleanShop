<?php
/* --- Declaramos las extenciones/clases/archivos a utlizar --- */
        require_once('mdlmarca.php');

    /* $rolUsuario = $sistema -> validarRol('Administrador'); */

    /* <!-- Validamos el id_marca de la marca y la accion las cuales se mandan por metodo GET(Por URL) 
            para evaluar la accion que se realizará  --> */
        $id_marca = NULL;
        $accion = NULL;
        if(isset($_GET['accion'])){/* Si la URL tiene una accion  */
            $id_marca = isset($_GET['id_marca']) ? $_GET['id_marca'] : NULL; /* Si id_marca contiene informacion se la asigna a la variable $marca y si no la deja como null */
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
                require_once('formulariomarca.php');
            break;

            case 'add':
                /* cachamos tosdos los datos del fromulario que se mandaron por $_POST en la variable $datosFormulariomarca */
                $datosFormulariomarca = $_POST;
                /* llamamos al metodo create del objeto marca de la clase marca y mandamos de parametreo la variable $datosFormulariomarca que contiene los datos que mandamos del fromulario */
                $resultado = $marca->create($datosFormulariomarca);
                /* llamamos al metodo read del objeto marca de la clase marca para hacer un select de todos los datos para despues mostrarlos en la tabla del index */
                $datosmarcas = $marca->read();
                /* Llamamos al index */
                require_once('index.php');
            break;

            case 'modify':
                /* se genera una variable "$datosmarca" para obtener los datos de una marca dependiendo su id declarondo el 
                objeto en su metodo readOne y mandamos el id_marca como para parametro*/
                $datosmarca = $marca->readOne($id_marca);
                /* Si nos devuelve un arreglo entra al formulario para poderlo editar */
                if(is_array($datosmarca)){
                    require_once('formulariomarca.php');
                } else{
                    require_once('index.php'); /* Si no nos devuelve un arreglo entra al index */
                    }
            break;
    
            case 'update':
                /* Caso Update se genera unavariable "$datosFormulariomarcaUP" para almacenar los datos que se modificaron de los
                 atributo que se espesifico con el id mediante el formulario que se manda por $_POST*/
                $datosFormulariomarcaUP=$_POST;
                /* Se manda a llamar el metodo de update del objeto marca para relizar el update de los datos que anteriomente alamcenamos 
                en la variable $datosFormulariomarcaUP mandando esta comno parametro*/
                $resultado = $marca->update($datosFormulariomarcaUP,$id_marca);
                /* Se vuelve a mostrar la lista de marcas actualizada */
                $datosmarcas = $marca->read();
                require_once('index.php');
            break;

            case 'delete':
                $resultado = $marca->delete($id_marca);

            /* Caso por default accion = a lo que sea */
            default: 
            /* $datosmarcas sera igual al array que el objeto marca en su metodo read nos devuelva */
            $datosmarcas = $marca->read();
            require_once('index.php'); /* Incluimos el index de marca */
        }

    /* <!-- Switch para ejecutar la accion correspondiente --> */


        require_once('../../../componentes/footer.php');  //incluimos el footer 


?>