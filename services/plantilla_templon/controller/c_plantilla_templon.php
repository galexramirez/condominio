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
        /*foreach ($Data as $row) {
            $respuesta = $instancia->OpcionSimple($row['mod_nombre'],$row['mod_nombre_vista'],$row['mod_icono'],$NombreDeModulo);      
            $OpcionesSidebar = $OpcionesSidebar."".$respuesta; 
        }*/

        $mod_plegable       = "";
        $menu_plegable      = "";
        $total_modulos      = count($Data);
        $contador           = 0;
        $ultimo_registro    = "";
        $nombre_plegable    = "";

        foreach ($Data as $row) 
        {
            if($row['mod_nombre']==$NombreDeModulo){
                $nombre_plegable = $row['mod_plegable'];
            }
        }
       
        foreach ($Data as $row) 
        {
            $contador++;
            if($contador==$total_modulos){
                $ultimo_registro = "ultimo";
            }
            if($row['mod_tipo']=='Plegable'){
                if($mod_plegable==""){
                    $mod_plegable = $row['mod_nombre_vista'];
                    $menu_plegable = "inicio";
                }else{
                    $menu_plegable = "nuevo";
                }
            }else{
                $menu_plegable = "submenu";
            }
            $respuesta = $instancia->OpcionMultiple($row['mod_nombre'], $row['mod_nombre_vista'], $row['mod_icono'], $row['mod_nombre_vista'], $menu_plegable, $ultimo_registro, $NombreDeModulo, $nombre_plegable);
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