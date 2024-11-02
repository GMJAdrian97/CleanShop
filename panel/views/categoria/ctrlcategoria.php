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
                /* Para obtener datos de llaves foraneas declarar una variable y llenarla mediate el metodo del objeto coreespondiente */
                /* Ejemplo; $datosUnudadPeso = $unidadPeso->read(); */
                /* Llama al formulario */
                require_once('formulariocategoria.php');
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
                /* se genera una variable "$datoscategoria" para obtener los datos de una categoria dependiendo su id declarondo el 
                objeto en su metodo readOne y mandamos el id_categoria como para parametro*/
                $datoscategoria = $categoria->readOne($id_categoria);
                /* Si nos devuelve un arreglo entra al formulario para poderlo editar */
                if(is_array($datoscategoria)){
                    require_once('formulariocategoria.php');
                } else{
                    require_once('index.php'); /* Si no nos devuelve un arreglo entra al index */
                    }
            break;
    
            case 'update':
                /* Caso Update se genera unavariable "$datosFormulariocategoriaUP" para almacenar los datos que se modificaron de los
                 atributo que se espesifico con el id mediante el formulario que se manda por $_POST*/
                $datosFormulariocategoriaUP=$_POST;
                /* Se manda a llamar el metodo de update del objeto categoria para relizar el update de los datos que anteriomente alamcenamos 
                en la variable $datosFormulariocategoriaUP mandando esta comno parametro*/
                $resultado = $categoria->update($datosFormulariocategoriaUP,$id_categoria);
                /* Se vuelve a mostrar la lista de categorias actualizada */
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