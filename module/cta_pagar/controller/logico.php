<?php
class logico
{
	var $modulo = "cta_pagar";

	function Contenido($NombreDeModuloVista)    
	{		
		MView($this->modulo,'local_view',compact('NombreDeModuloVista') );
	}

	public function select_categoria($tabla, $tc_ficha, $tc_categoria1)
	{
		MModel($this->modulo, 'crud');
		$instancia_ajax = new crud();
		$respuesta = $instancia_ajax->select_categoria($tabla, $tc_ficha, $tc_categoria1);

		$html = '<option value="">Seleccione una opcion</option>';

		foreach ($respuesta as $row) {
			$html .= '<option value="'.$row['Detalle'].'">'.$row['Detalle'].'</option>';
		}
		echo $html;
	}

	public function select_nombre_corto($roles_perfil)
	{
		MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->select_nombre_corto($roles_perfil);

		$html = '<option value="">Seleccione una opcion</option>';

		foreach ($respuesta as $row) {
			$html .= '<option value="'.$row['nombre_corto'].'">'.$row['nombre_corto'].'</option>';
		}
		echo $html;
	}

	public function buscar_data_bd($tabla_bd, $campo_bd, $data_buscar)
    {
        MModel($this->modulo,'crud');
        $instancia_ajax = new crud();
        $respuesta = $instancia_ajax->buscar_data_bd($tabla_bd,$campo_bd,$data_buscar);

        print json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    }

    public function document_root()
    {
        $mi_carpeta = '';
        $mi_host    = $_SERVER['HTTP_HOST'];
        $mi_referer = $_SERVER['HTTP_REFERER'];
        $mi_carpeta = substr($mi_referer,0,strpos($mi_referer,$mi_host)).$mi_host.'/';
        echo $mi_carpeta;
    }

    public function calculo_fecha($inicio, $calculo)
    {
        $rpta_fecha = "";
        switch ($inicio)
        {
            case "hoy":
                if($calculo=="0"){
                    $rpta_fecha = date("Y-m-d");
                }
                if(strlen($calculo)>0 && $calculo!="0"){
                    $f = strtotime($calculo);
                    $rpta_fecha = date("Y-m-d",$f);
                }
            break;
        }
        echo $rpta_fecha;
    }

    public function mayor_fecha($inicio, $final)
    {
        $rpta_mayor = "NO";
        $fecha_inicio = strtotime( $inicio );
        $fecha_final = strtotime( $final );
        
        if( $fecha_final > $fecha_inicio ) {
            $rpta_mayor = "SI";
        }  
        echo $rpta_mayor;
    }

    public function diferencia_fecha($inicio, $final)
    {
        $rpta_diferencia = "NO";
        $firstDate  = new DateTime($inicio);
        $secondDate = new DateTime($final);
        $intvl = $firstDate->diff($secondDate);
        
        if($intvl->days < "366"){
            $rpta_diferencia = "SI";
        }
        echo $rpta_diferencia;
    }

    public function calcular_diferencia_horas($hora_inicio, $hora_final)
    {
        $calculo    = '';
        $hora_n     = intval(substr($hora_final,0,2));
        $hora_24    = 24;
        if($hora_n>$hora_24){
        	$hora_final = "2023-01-02".substr(("0".($hora_n-$hora_24)),-2).substr($hora_final,2,2);
        	$hora_inicio = "2023-01-01".$hora_inicio;
        }
        $h_inicial   = new DateTime($hora_inicio);
        $h_final     = new DateTime($hora_final);
        
        $interval   = $h_inicial->diff($h_final);
        $hora       = $interval->format('%H');
        $minuto     = $interval->format('%i');
        $calculo    = mktime($hora,$minuto);

        echo date("H:i",$calculo);
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

    public function select_combo($nombre_tabla, $es_campo_unico, $campo_select, $campo_inicial, $condicion_where, $order_by)
	{
		MModel($this->modulo, 'crud');
		$instancia_ajax = new crud();
		$respuesta = $instancia_ajax->select_combo($nombre_tabla, $es_campo_unico, $campo_select, $condicion_where, $order_by);

		$html = '<option value="">Seleccione una opcion</option>';
		
		if($campo_inicial!=""){
			$html .= '<option value="'.$campo_inicial.'">'.$campo_inicial.'</option>';
		}

		foreach ($respuesta as $row) {
			if($row['detalle']!=$campo_inicial){
				$html .= '<option value="'.$row['detalle'].'">'.$row['detalle'].'</option>';
			}
		}
		echo $html;
	}

}