<?php
class c_plantilla_templon
    {
            
    function VistaGeneral_A($InsertHead,$NombreDeModulo)
        {

        echo "<h1></h1>";
        // Datos para de usaurio para la vista
        $NombreUsuario= $_SESSION['USUA_NOMBRECORTO'];
        $FotoUsuario = $_SESSION['USUA_FOTOGRAFIA'];
             
        // Construye el SIDEBAR   
        SController('consulta_modulos','c_consulta_modulos'); 
	    $instancia2 = new c_consulta_modulos();     
        $Data = $instancia2->ListaModulosDelUsuario();     	    
                   
        SView('plantilla_templon','opciones_sidebar');        
        $instancia = new opciones_sidebar();     
        $OpcionesSidebar="";    
        foreach ($Data as $row) 
            {
            $respuesta = $instancia->OpcionSimple($row['mod_nombre'],$row['mod_nombre_vista'],$row['mod_icono'],$NombreDeModulo);      
            $OpcionesSidebar = $OpcionesSidebar."".$respuesta; 
            }    
                           
        // Trae y muestra la VIstaGeneral_A    
        SView('plantilla_templon','vista_general_a',compact('NombreUsuario','FotoUsuario','OpcionesSidebar','InsertHead'));
        }     

    function VistaGeneral_B($InserFooter)
        {
        SView('plantilla_templon','vista_general_b',compact('InserFooter'));
        }   
    }    