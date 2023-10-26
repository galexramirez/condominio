<?php
class c_consulta_modulos
    {
    var $datos=array();
    function __construct()
        {
        SModel('consulta_modulos','m_consulta_modulos');
        $instancia3 = new modulos_m();       
        $this->datos = $instancia3->ModulosPorUsuario();
        }    
    
    // Recibe "", Identifica Modulo de inicio para el usuario, Nonbre  Modulo Inicio.      
    function ModuloDeInicio()
        {
        $PrimerModuloConsulta="";
        $ModuloDeInicio="";    

        foreach ($this->datos as $row) 
            {
               
            if($PrimerModuloConsulta=='')    
                {
                $PrimerModuloConsulta=$row['mod_nombre'];
                }

            if($row['per_modulo_inicio']=='SI')    
                {
                $ModuloDeInicio=$row['mod_nombre'];     
                }
            }
       
        if($ModuloDeInicio=='')
            {
                $ModuloDeInicio=$PrimerModuloConsulta;  
            }    
        return $ModuloDeInicio;        
        }   
    
   // Recibe Nombre Modulo, Valida acceso al modulo para el usuario, Verdadero/Falso  
   function ValidaModulo($NombreDeModulo)
        {
        $Resultado="Falso";    
        foreach ($this->datos as $row) 
            {
            if($row['mod_nombre']==$NombreDeModulo)    
                {
                $Resultado="Verdadero";
                }
            }
        return $Resultado;
        }
   
   // Recibe "", Crea Lista los modulos que tiene activo el usuario, Array  
   function ListaModulosDelUsuario()
        {

        return $this->datos;

        }

}