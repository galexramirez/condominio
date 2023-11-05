<?php 
// 1.0 DATOS A USARSE EN EL MODULO - MODIFICAR SI SE CREA NUEVO MODULO
    $NombreDeModulo="cta_pagar"; // Como figura en la BD
    $NombreDeModuloVista="Cuentas por Pagar"; // Como se muestra la usuario

// 2.0 VERIFICA PERMISOS DEL USUARIO SOBRE EL MODULO

    // Valida si hay usario activo en sesion activo
    if (!isset($_SESSION['USUARIO_ID']))
        { session_destroy();  header('Location: /inicio'); }

    // Valida si el usuario tiene acceso al Modulo

    SController('consulta_modulos','c_consulta_modulos'); 
	$Instancia2 = new c_consulta_modulos();     
    $Respuesta = $Instancia2->ValidaModulo($NombreDeModulo);     	    
    if ($Respuesta == "Falso")
        { session_destroy();  header('Location: /inicio'); }

 // 3.0 RECURSOS PARA EL MODULO     
    $InsertHead="   <link rel='stylesheet' href='module/cta_pagar/view/local_view.css' type='text/css' media='all'>
                    <link rel='stylesheet' type='text/css' href='services/resources/DataTables-10.25/datatables/datatables.min.css'> 
                    <link rel='stylesheet' type='text/css' href='services/resources/DataTables-10.25/datatables/DataTables-1.10.25/css/dataTables.bootstrap4.min.css'>
                    <link rel='stylesheet' type='text/css' href='services/resources/DataTables-10.25/datatables/Buttons-1.7.1/css/buttons.bootstrap4.min.css'>
                    <link rel='stylesheet' type='text/css' href='services/resources/cdn.datatables.net/fixedheader/3.1.9/css/fixedHeader.dataTables.min.css'>
                    <link rel='stylesheet' href='https://pro.fontawesome.com/releases/v5.10.0/css/all.css' integrity='sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p' crossorigin='anonymous'/>  ";

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
                    <script type='text/javascript' src='services/resources/cdn.datatables.net/fixedheader/3.1.9/js/dataTables.fixedHeader.min.js'></script>
                    <script src='module/cta_pagar/view/local_view_inicio.js' type='text/javascript'></script>
                    <script src='module/cta_pagar/view/local_view_listado.js' type='text/javascript'></script>
                    <script src='module/cta_pagar/view/local_view_registro.js' type='text/javascript'></script>
                    <script src='module/cta_pagar/view/local_view_proveedor.js' type='text/javascript'></script>
                    <script src='module/cta_pagar/view/local_view_reporte.js' type='text/javascript'></script>
                    <script src='module/cta_pagar/view/local_view_tc_cta_pagar_usuario.js' type='text/javascript'></script>
                    <script src='module/cta_pagar/view/local_view_tc_cta_pagar_sistema.js' type='text/javascript'></script>";
                    
// 4.0 CONTRUCCION DE LA VISTA

    SController('plantilla_templon','c_plantilla_templon');
    $Instancia2 = new c_plantilla_templon();     
    
    // PLANTILLA PARTE A
    $Respuesta=$Instancia2->VistaGeneral_A($InsertHead,$NombreDeModulo);  
   
    // VISTA DEL MODULO
    MController($NombreDeModulo,'logico');
    $InstanciaModelo = new logico();     
    $Respuesta=$InstanciaModelo->Contenido($NombreDeModuloVista);

    // PLANTILLA PARTE B
    $Respuesta=$Instancia2->VistaGeneral_B($InserFooter);