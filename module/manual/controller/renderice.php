<?php 
// 1.0 DATOS A USARSE EN EL MODULO - MODIFICAR SI SE CREA NUEVO MODULO
    $NombreDeModulo = "manual"; // Como figura en la BD
    $NombreDeModuloVista = "Manual de Usuario"; // Como se muestra la usuario

// 2.0 VERIFICA PERMISOS DEL USUARIO SOBRE EL MODULO

    // Valida si hay usario activo en sesion activo
    if (!isset($_SESSION['USUARIO_ID']))
        { session_destroy();  header('Location: /inicio'); }

    // Valida si el usuario tiene acceso al Modulo
    SController('consulta_modulos','c_consulta_modulos'); 
	$instancia2 = new c_consulta_modulos();     
    $respuesta = $instancia2->ValidaModulo($NombreDeModulo);     	    
    if ($respuesta=="Falso")
        { session_destroy();  header('Location: /inicio'); }

// 3.0 RECURSOS PARA EL MODULO     
    $InsertHead="   <link rel='stylesheet' href='module/manual/view/local_view.css' type='text/css' media='all'>
                    <link rel='stylesheet' type='text/css' href='services/resources/DataTables-10.25/datatables/datatables.min.css'> 
                    <link rel='stylesheet' type='text/css' href='services/resources/DataTables-10.25/datatables/DataTables-1.10.25/css/dataTables.bootstrap4.min.css'>
                    <link rel='stylesheet' type='text/css' href='services/resources/DataTables-10.25/datatables/Buttons-1.7.1/css/buttons.bootstrap4.min.css'>
                    <link rel='stylesheet' href='https://pro.fontawesome.com/releases/v5.10.0/css/all.css' integrity='sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p' crossorigin='anonymous'/>
                    <link rel='stylesheet' type='text/css' href='services/resources/cdn.datatables.net/fixedheader/3.1.9/css/fixedHeader.dataTables.min.css'>
                    <link rel='stylesheet' type='text/css' href='services/resources/cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css'>
                    <link rel='stylesheet' href='services/resources/jquery-ui-1.12.1/jquery-ui.min.css'> ";

    $InserFooter="  <script type='text/javascript' src='services/resources/DataTables-10.25/datatables/datatables.min.js'></script>
                    <script type='text/javascript' src='services/resources/DataTables-10.25/datatables/JSZip-2.5.0/jszip.min.js'></script>
                    <script type='text/javascript' src='services/resources/DataTables-10.25/datatables/pdfmake-0.1.36/pdfmake.min.js'></script>
                    <script type='text/javascript' src='services/resources/DataTables-10.25/datatables/pdfmake-0.1.36/vfs_fonts.js'></script>
                    <script type='text/javascript' src='services/resources/DataTables-10.25/datatables/DataTables-1.10.25/js/jquery.dataTables.min.js'></script>
                    <script type='text/javascript' src='services/resources/DataTables-10.25/datatables/DataTables-1.10.25/js/dataTables.bootstrap4.min.js'></script>
                    <script type='text/javascript' src='services/resources/DataTables-10.25/datatables/Buttons-1.7.1/js/dataTables.buttons.min.js'></script>
                    <script type='text/javascript' src='services/resources/DataTables-10.25/datatables/Buttons-1.7.1/js/buttons.bootstrap4.min.js'></script>
                    <script type='text/javascript' src='services/resources/DataTables-10.25/datatables/Buttons-1.7.1/js/buttons.html5.min.js'></script>
                    <script type='text/javascript' src='services/resources/DataTables-10.25/datatables/Buttons-1.7.1/js/buttons.print.min.js'></script>
                    <script src='module/manual/view/local_view_inicio.js' type='text/javascript'></script>
                    <script src='module/manual/view/local_view_listado.js' type='text/javascript'></script>
                    <script src='module/manual/view/local_view_manual.js' type='text/javascript'></script>
                    <script type='text/javascript' src='services/resources/cdn.datatables.net/fixedheader/3.1.9/js/dataTables.fixedHeader.min.js'></script>
                    <script type='text/javascript' src='services/resources/cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js'></script>
                    <script src='services/resources/jquery-ui-1.12.1/jquery-ui.min.js'></script>
                    <script src='services/resources/tinymce_6.7.2_dev/tinymce/js/tinymce/tinymce.min.js' referrerpolicy='origin'></script> ";

                    //<script src='https://cdn.tiny.cloud/1/zk5fdrzjc8vn41f8lvc5tl1o1j6fuccttpo0ap39hocc48ey/tinymce/6/tinymce.min.js' referrerpolicy='origin'></script>";

// 4.0 CONTRUCCION DE LA VISTA

    SController('plantilla_templon','c_plantilla_templon');
    $instancia2 = new c_plantilla_templon();     
    
    // PLANTILLA PARTE A
    $respuesta = $instancia2->VistaGeneral_A($InsertHead,$NombreDeModulo);  
    
    // VISTA DEL MODULO
    MController('manual','logico');
    $instancia_modelo = new logico();     
    $respuesta = $instancia_modelo->Contenido($NombreDeModuloVista);

    // PLANTILLA PARTE B
    $respuesta = $instancia2->VistaGeneral_B($InserFooter);