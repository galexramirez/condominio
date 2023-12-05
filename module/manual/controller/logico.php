<?php
//session_start();
class logico
{
	var $modulo = "manual";

	public function Contenido($NombreDeModuloVista)    
	{		
		MView($this->modulo,'local_view',compact('NombreDeModuloVista') );
	}
	
    public function select_roles($roles_perfil, $roles_campo)
	{
		MModel($this->modulo, 'crud');
		$instancia_ajax  = new crud();
		$respuesta = $instancia_ajax->select_roles($roles_perfil, $roles_campo);

		$html = '<option value="">Seleccione una opcion</option>';

		foreach ($respuesta as $row) {
			$html .= '<option value="'.$row['nombres'].'">'.$row['nombres'].'</option>';
		}
		echo $html;
	}

    public function select_combo($nombre_tabla, $es_campo_unico, $campo_select, $campo_inicial, $condicion_where)
	{
		MModel($this->modulo, 'crud');
		$instancia_ajax = new crud();
		$respuesta = $instancia_ajax->select_combo($nombre_tabla, $es_campo_unico, $campo_select, $condicion_where);

		$html = '<option value="">Seleccione una opcion</option>';
		
		if($campo_inicial!=""){
            $html .= "<option value='".$campo_inicial."'>".$campo_inicial."</option>";
		}

		foreach ($respuesta as $row) {
			if($row['detalle']!=$campo_inicial){
                $html .= "<option value='".$row['detalle']."'>".$row['detalle']."</option>";
			}
		}
		echo $html;
	}

    public function buscardatabd($tablabd, $campobd, $databuscar)
    {
        MModel($this->modulo,'crud');
        $instancia_ajax  = new crud();
        $respuesta = $instancia_ajax->buscardatabd($tablabd, $campobd, $databuscar);

        print json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }

    public function buscar_data_bd($tabla, $c_where)
    {
        MModel($this->modulo,'crud');
        $instancia_ajax  = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla, $c_where);

        print json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }

	public function calculo_fecha($inicio, $calculo)
    {
        $rptaFecha = "";
        switch ($inicio)
        {
            case "hoy":
                if($calculo=="0"){
                    $rptaFecha = date("Y-m-d");
                }
                if(strlen($calculo)>0 && $calculo!="0"){
                    $f = strtotime($calculo);
                    $rptaFecha = date("Y-m-d",$f);
                }
            break;
        }
        echo $rptaFecha;
    }

    public function comparar_fecha_actual($fecha)
    {
        $rpta_comparar = "";
        $fecha_actual = strtotime(date("d-m-Y H:i:00",time()));
        $fecha_entrada = strtotime($fecha);
            
        if($fecha_actual > $fecha_entrada){
            $rpta_comparar = "MAYOR";
        }else{
            $rpta_comparar = "MENOR IGUAL";
        }
        echo $rpta_comparar;
    }

    public function diferencia_fecha($inicio, $final)
    {
        $rpta_diferencia = "NO";
        $first_date  = new DateTime($inicio);
        $second_date = new DateTime($final);
        $intvl = $first_date->diff($second_date);
        
        if($intvl->days < "366"){
            $rpta_diferencia = "SI";
        }
        echo $rpta_diferencia;
    }

    public function dias_diferencia_fechas($inicio, $final)
    {
        $rpta_dias = "";
        $first_date  = new DateTime($inicio);
        $second_date = new DateTime($final);
        $intvl = $first_date->diff($second_date);
        $rpta_dias = $intvl->days;

        echo $rpta_dias;
    }

    public function document_root()
    {
        $mi_carpeta = '';
        $mi_host    = $_SERVER['HTTP_HOST'];
        $mi_referer = $_SERVER['HTTP_REFERER'];
        $mi_carpeta = substr($mi_referer,0,strpos($mi_referer,$mi_host)).$mi_host.'/';
        echo $mi_carpeta;
    }

    public function buscar_dato($nombre_tabla, $campo_buscar, $condicion_where)
	{
		$rpta_buscar_dato = "";
        MModel($this->modulo, 'crud');
		$instancia_ajax = new crud();
		$respuesta = $instancia_ajax->buscar_dato($nombre_tabla, $campo_buscar, $condicion_where);

        foreach ($respuesta as $row) {
			$rpta_buscar_dato = $row[$campo_buscar];
		}
		echo $rpta_buscar_dato;
	}

    public function contar_dato($nombre_tabla, $campo_buscar, $condicion_where)
	{
		$rpta_contar_dato = "";
        MModel($this->modulo, 'crud');
		$instancia_ajax = new crud();
		$respuesta = $instancia_ajax->contar_dato($nombre_tabla, $campo_buscar, $condicion_where);

        foreach ($respuesta as $row) {
			$rpta_contar_dato = $row['cantidad'];
		}
		echo $rpta_contar_dato;
	}

    public function select_modulo_nombre()
	{
		MModel($this->modulo, 'crud');
		$instancia_ajax = new crud();
		$respuesta = $instancia_ajax->select_modulo_nombre();

		$html = '<option value="">Seleccione una opcion</option>';
		
		foreach ($respuesta as $row) {
            $html .= "<option value='".$row['detalle']."'>".$row['detalle']."</option>";
		}
		echo $html;
	}

}