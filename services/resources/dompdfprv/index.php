<?php

require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

class Usuario 
{	
	var $cnx;
	var $sql;
	var $rpta;
	var $cant;
	var $fila=array();

	function __construct()
	{
		$this->cnx=new PDO('mysql:host=192.168.20.254; dbname=limabus','programacion','2424lbi');
		$this->cnx->exec("SET CHARACTER SET utf8");
	}


	function programacionActual($dni,$Sem_ini,$Sem_fin)
	{
	$this->sql=
		"
			SELECT 
				(SELECT name_user FROM user where id_user=p.id_user) as codigo,
				(SELECT dni_user FROM user where id_user=p.id_user) as DNI,
				(SELECT nombrecompleto_user FROM user where id_user=p.id_user) as Nombre,
				DATE_FORMAT(programa_date, '%d-%m-%Y') as Fecha,
				programa_tabla,
				DATE_FORMAT(programa_hora_origen, '%H:%i') as H_origen,
				DATE_FORMAT(programa_hora_destino, '%H:%i') as H_Destino,
				(SELECT nombre_servicio  FROM servicio where id_servicio=p.id_servicio) as Servicio,
				(SELECT codigo_bus  FROM bus where id_bus=p.id_bus) as Bus,
				(SELECT nombre_lugar  FROM lugar where id_lugar=p.id_origen) as Origen,
				(SELECT nombre_lugar  FROM lugar where id_lugar=p.id_destino) as Destino,
				(SELECT nombre_evento  FROM evento where id_evento=p.id_evento) as Evento,
				programa_lbi 
			FROM programa p
			where (programa_date>='".$Sem_ini."' and programa_date<='".$Sem_fin."')
				and (SELECT dni_user FROM user where id_user=p.id_user)='".$dni."'
				order by programa_date , programa_hora_origen
		";

	
		
		$this->rpta=$this->cnx->prepare($this->sql);
		$this->rpta->execute();
		$this->cant=$this->rpta->rowCount();
        
        if($this->cant==0):
        	return 'vacio';
		else :
			return $this->rpta;	
		endif;
    }    
}

//:::: DETERMINA LA PROGRAMACION ACTUAL O PROXIMA PROGRAMACION

if ($_GET['pdf']==1):

	if(date('l')=='Monday'){ $Sem_ini = date('Y-m-d');             $Sem_ini_view = date('d-m-Y');}
	else { $Sem_ini = date('Y-m-d', strtotime('last Monday'));     $Sem_ini_view = date('d-m-Y', strtotime('last Monday'));}

	if(date('l')=='Sunday'){ $Sem_fin = date('Y-m-d');             $Sem_fin_view = date('d-m-Y');} 
	else { $Sem_fin = date('Y-m-d', strtotime('next Sunday'));     $Sem_fin_view = date('d-m-Y', strtotime('next Sunday')); }

else :

	if(date('l')=='Sunday'){ $Sem_ini = date('Y-m-d', strtotime('next Monday'));     $Sem_ini_view = date('d-m-Y', strtotime('next Monday'));       } 
	else { $Sem_ini = date('Y-m-d', strtotime('Monday next week'));                  $Sem_ini_view = date('d-m-Y', strtotime('Monday next week'));  }
	
	if(date('l')=='Sunday'){ $Sem_fin = date('Y-m-d', strtotime('next Sunday'));     $Sem_fin_view = date('d-m-Y', strtotime('next Sunday'));       } 
	else { $Sem_fin = date('Y-m-d', strtotime('Sunday next week'));                  $Sem_fin_view = date('d-m-Y', strtotime('Sunday next week'));  }

endif;	


//::: CREACION DE OBJETO PARA COBSULTAR LA PROGRAMACION

$progamacion=array();
$Obj = new Usuario();
$dni=$_GET['dni'];
$progamacion=$Obj->programacionActual($dni,$Sem_ini,$Sem_fin);

$filasprogramacion=""; 
$fecha="primerafila";
$HoraDestino="";
$content="";
$EncabezadosTabla="
<tr>
	<td style='height: 25px;border-left: 1px solid white;border-right: 1px solid white;font-size: 12px;'' colspan='9' class='celdaTabla'>".$diasEspaniol[date('l',strtotime($row_progamacion['Fecha']))]." ".$row_progamacion['Fecha']."</td></tr>
<tr  class='primeraFila' style=' font-size: 11px; font-weight: bolder;'>
						<th style='width: 30px; height: 25px; COLOR: WHITE;      FONT-WEIGHT: BOLDER;' class='celdaTabla'>TABLA</td>
						<th style='width: 30px; COLOR: WHITE;     FONT-WEIGHT: BOLDER;' class='celdaTabla'>H/ORI</td>
						<th style='width: 30px;COLOR: WHITE;     FONT-WEIGHT: BOLDER;' class='celdaTabla'>H/DES</td>
						<th style='width: 80px;COLOR: WHITE;     FONT-WEIGHT: BOLDER;' class='celdaTabla'>SERVICIO</td>
						<th style='width: 30px;COLOR: WHITE;     FONT-WEIGHT: BOLDER;' class='celdaTabla'>BUS</td>
						<th style='width: 95px;COLOR: WHITE;     FONT-WEIGHT: BOLDER;' class='celdaTabla'>ORIGEN</td>
						<th style='width: 95px;COLOR: WHITE;     FONT-WEIGHT: BOLDER;' class='celdaTabla'>DESTINO</td>
						<th style='width: 95px;COLOR: WHITE;     FONT-WEIGHT: BOLDER;' class='celdaTabla'>EVENTO</td>
						<th style='width: 190px;COLOR: WHITE;     FONT-WEIGHT: BOLDER;' class='celdaTabla'>OBSERVACIONES</td>	
				</tr>";


$diasEspaniol=array(
					'Monday'   => 'Lunes',
					'Tuesday'  => 'Martes',
					'Wednesday'=> 'Miercoles',
					'Thursday' => 'Jueves',
					'Friday'   => 'Viernes',
					'Saturday' => 'Sabado',
					'Sunday'   => 'Domingo'
					);


if($progamacion=='vacio')
	{
		$content ="<!DOCTYPE html>
					<html lang='es'>
						<head>
							<meta charset='UTF-8'>
							<title>Document</title>
							<link rel='stylesheet'  href='programacionpilotos.css' type='text/css' media='all'>
						</head>
						<body style='text-align: center'; >
							<br><br><br><br><br><br><br><br><br><br> 
							<img class='logo' src='LOGO-FINAL-02.png'> <br>
							Programacion aun no disponible.
						</body>
					</html>";
	}	
else 
	{
			while($row_progamacion=$progamacion->fetch(PDO::FETCH_ASSOC))
			    {  
			       	$Nombre_Piloto=$row_progamacion['Nombre'];
			    	$Codigo_Piloto=$row_progamacion['codigo'];
				   
				   	if($fecha<>$row_progamacion['Fecha']):
			       		
			       		if($fecha=="primerafila"):
			    			$filasprogramacion.="<table class='programacion'>";
			    		endif;	

			    		$filasprogramacion.="
<tr>
	<td style='height: 25px;border-left: 1px solid white;border-right: 1px solid white;border-top: 1px solid white;font-size: 12px;text-align: left;' colspan='9' class='celdaTabla'>".$diasEspaniol[date('l',strtotime($row_progamacion['Fecha']))]." ".$row_progamacion['Fecha']."</td></tr>
<tr  class='primeraFila' style=' font-size: 11px; font-weight: bolder;'>
						<th style='width: 30px; height: 25px; COLOR: WHITE;      FONT-WEIGHT: BOLDER;' class='celdaTabla'>TABLA</td>
						<th style='width: 30px; COLOR: WHITE;     FONT-WEIGHT: BOLDER;' class='celdaTabla'>H/ORI</td>
						<th style='width: 30px;COLOR: WHITE;     FONT-WEIGHT: BOLDER;' class='celdaTabla'>H/DES</td>
						<th style='width: 80px;COLOR: WHITE;     FONT-WEIGHT: BOLDER;' class='celdaTabla'>SERVICIO</td>
						<th style='width: 30px;COLOR: WHITE;     FONT-WEIGHT: BOLDER;' class='celdaTabla'>BUS</td>
						<th style='width: 95px;COLOR: WHITE;     FONT-WEIGHT: BOLDER;' class='celdaTabla'>ORIGEN</td>
						<th style='width: 95px;COLOR: WHITE;     FONT-WEIGHT: BOLDER;' class='celdaTabla'>DESTINO</td>
						<th style='width: 95px;COLOR: WHITE;     FONT-WEIGHT: BOLDER;' class='celdaTabla'>EVENTO</td>
						<th style='width: 190px;COLOR: WHITE;     FONT-WEIGHT: BOLDER;' class='celdaTabla'>OBSERVACIONES</td>	
				</tr>";
			    		$fecha=$row_progamacion['Fecha'];
			    		$HoraDestino='1';
			    	endif;

			    	if($HoraDestino<>'1' and $HoraDestino<>$row_progamacion['H_origen']):
			    		
			    		$filasprogramacion.="<tr><td style='height: 25px;' colspan='9' class='celdaTabla'>DESCANSO</td></tr>";
			    	
			    	endif;	

			    	$filasprogramacion.="<tr style='height: 25px;'>
											<td style='height: 25px;' class='celdaTabla'>".$row_progamacion['programa_tabla']."</td>
											<td class='celdaTabla'>".$row_progamacion['H_origen']."</td>
											<td class='celdaTabla'>".$row_progamacion['H_Destino']."</td>
											<td class='celdaTabla'>".$row_progamacion['Servicio']."</td>
											<td class='celdaTabla'>".$row_progamacion['Bus']."</td>
											<td class='celdaTabla'>".$row_progamacion['Origen']."</td>
											<td class='celdaTabla'>".$row_progamacion['Destino']."</td>
											<td class='celdaTabla'>".$row_progamacion['Evento']."</td>
											<td class='celdaTabla'>".$row_progamacion['programa_lbi']."</td>	
										</tr>";

					$HoraDestino=$row_progamacion['H_Destino'];
				}

			$filasprogramacion.="</table>";
			$progamacion->closeCursor();


			$content ="<!DOCTYPE html>
							<html lang='es'>
							<head>
								<meta charset='UTF-8'>
								<title>Document</title>
								<link rel='stylesheet'  href='programacionpilotos.css' type='text/css' media='all'>
							</head>
							<body >
								<div class='encabezado'>  
									<table class='encabezadoTabla'>
										<tr>		
										<td style='
								    width: 250px;'>
											<img class='logo' src='LOGO-FINAL-02.png'> 
										</td>
										<td>
										<span class='titulos'>
											Sr. ".$Nombre_Piloto." <br> Codigo: ".$Codigo_Piloto."  <br>Programación Semanal ".$Sem_ini_view." AL ".$Sem_fin_view." 
										</span>
									
										</td>
										</tr>	
									</table>
								</div>
									".$filasprogramacion."

							</body>
							</html>
							";
	}

//echo $content;

$dompdf = new Dompdf();
$dompdf->loadHtml($content);
$dompdf->setPaper('A4', ''); // (Opcional) Configurar papel y orientación landscape
$dompdf->render(); // Generar el PDF desde contenido HTML
//$pdf = $dompdf->output(); // Obtener el PDF generado
$filename = 'Programacion.pdf';
//$dompdf->stream($filename); // Enviar el PDF generado al navegador
