<?php
/* --- Declaramos las extenciones/clases/archivos a utlizar --- */
        require_once('mdlcategoria.php');

    /* $rolUsuario = $sistema -> validarRol('Administrador'); */

    /* <!-- Validamos el id_categoria de la categoria y la accion las cuales se mandan por metodo GET(Por URL) 
            para evaluar la accion que se realizará  --> */
        $id_categoria = NULL;
        $accion = NULL;
        if(isset($_GET['accion'])){/* Si la URL tiene una accion  */
            $id_categoria = isset($_GET['id_categoria']) ? $_GET['id_categoria'] : NULL; /* Si id_categoria contiene informacion se la asigna a la variable $categoria y si no la deja como null */
            $accion = $_GET['accion'];  /* la accion que se manda por la URL se le asigna a la variable $accion */
        }

        /* incluimos el header  */
        require_once('../../../componentes/header.php');

    /* <!-- Switch para ejecutar la accion correspondiente --> */

        switch($accion){
            /* Case new es para hacdr una insersion en la tabla */
            case 'new':
                /* Llama al formulario */
                require_once('formulariocategoria.php');
                /* Para obtener datos de llaves foraneas declarar una variable y llenarla mediate el metodo del objeto coreespondiente */
                /* Ejemplo; $datosUnudadPeso = $unidadPeso->read(); */
            break;

            case 'add':
                /* cachamos tosdos los datos del fromulario que se mandaron por $_POST en la variable $datosFormulariocategoria */
                $datosFormulariocategoria = $_POST;
                /* llamamos al metodo create del objeto categoria de la clase categoria y mandamos de parametreo la variable $datosFormulariocategoria que contiene los datos que mandamos del fromulario */
                $resultado = $categoria->create($datosFormulariocategoria);
                /* llamamos al metodo read del objeto categoria de la clase categoria para hacer un select de todos los datos para despues mostrarlos en la tabla del index */
                $datoscategorias = $categoria->read();
                /* Llamamos al index */
                require_once('index.php');
            break;

            case 'modify':
                $datoscategoria = $categoria->readOne($id_categoria);
                if(is_array($datoscategoria)){
                    require_once('formulariocategoria.php');
                } else{
                    require_once('formulariocategoria.php');
                    }
            break;
    
            case 'update':
                $datosFormulariocategoriaUP=$_POST;
                $resultado = $categoria->update($datosFormulariocategoriaUP,$id_categoria);
                $datoscategorias = $categoria->read();
                require_once('index.php');
            break;

            case 'delete':
                $resultado = $categoria->delete($id_categoria);

            /* Caso por default accion = a lo que sea */
            default: 
            /* $datoscategorias sera igual al array que el objeto categoria en su metodo read nos devuelva */
            $datoscategorias = $categoria->read();
            require_once('index.php'); /* Incluimos el index de categoria */
        }

    /* <!-- Switch para ejecutar la accion correspondiente --> */


        require_once('../../../componentes/footer.php');  //incluimos el footer 


?>