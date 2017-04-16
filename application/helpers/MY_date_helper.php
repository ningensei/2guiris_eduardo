<?php

	function fecha_formato($date,$formato){
		$time = strtotime($date);
		$new_fecha = date($formato,$time);
		return $new_fecha;
	}
	
	/*
	Funcion que devuelve la fecha con el formato de dia y año invertido segun yy-mm-dd ó dd-mm-yy, incluyendo la hora si es que tiene.
	*/
	
	function change_format($date,$sep='-',$hora=false){
		$fecha = explode(' ',$date);			
		$new_date = explode('-',$fecha[0]);
		$new_date = $new_date[2].$sep.$new_date[1].$sep.$new_date[0];

		if(!isset($fecha[1]))
			return $new_date;
		else{
			if($hora)
				return $new_date.' '.$fecha[1];
			else
				return $new_date;
		}
	}
	
    function suma_fechas($fecha,$ndias){
       return date("Y-m-d", strtotime("+$ndias days", strtotime($fecha)));   
    }
    
    function nombreMes($mes){
		switch($mes){
			case 1:
				$nombre_mes = "January";
			break;
			case 2:
				$nombre_mes = "February";
			break;
			case 3:
				$nombre_mes = "March";
			break;
			case 4:
				$nombre_mes = "April";
			break;
			case 5:
				$nombre_mes = "May";
			break;
			case 6:
				$nombre_mes = "June";
			break;
			case 7:
				$nombre_mes = "July";
			break;
			case 8:
				$nombre_mes = "August";
			break;
			case 9:
				$nombre_mes = "September";
			break;
			case 10:
				$nombre_mes = "October";
			break;
			case 11:
				$nombre_mes = "November";
			break;
			case 12:
				$nombre_mes = "December";
			break;
		}
		return $nombre_mes;
	}
    
    function nombreMesAbreviado($mes){
		switch($mes){
			case 1:
				$nombre_mes = "Jan";
			break;
			case 2:
				$nombre_mes = "Feb";
			break;
			case 3:
				$nombre_mes = "Mar";
			break;
			case 4:
				$nombre_mes = "Apr";
			break;
			case 5:
				$nombre_mes = "May";
			break;
			case 6:
				$nombre_mes = "Jun";
			break;
			case 7:
				$nombre_mes = "Jul";
			break;
			case 8:
				$nombre_mes = "Aug";
			break;
			case 9:
				$nombre_mes = "Sep";
			break;
			case 10:
				$nombre_mes = "Oct";
			break;
			case 11:
				$nombre_mes = "Nov";
			break;
			case 12:
				$nombre_mes = "Dec";
			break;
		}
		return $nombre_mes;
	}
    
    //funcion que sirve para armar el calendario para fechas no disponibles
    function makeTDs($nombre_dia){
        switch($nombre_dia){
			case 'Sun':
                $j = 0;
			break;
			case 'Mon':
			    $j = 1;
			break;
			case 'Tue':
			    $j = 2;	
			break;
			case 'Wed':
			    $j = 3;
			break;
			case 'Thu':
			    $j = 4;
            break;
			case 'Fri':
			    $j = 5;
            break;
			case 'Sat':
			    $j = 6;
            break;
		}
		return $j;
    }
    
    //function que muestra un calendario para dos meses (el recibido por parametro y el siguiente)
    function showCalendar($mes,$ano){
        
        
        $calendar = new Calendar();
        
        $str = '';
        for($i=0;$i < 6;$i++){
            $str .= '<div class="slide">';
            
            if ($mes==13){
                $ano++;
                $mes=1;
            }elseif($mes==14){
                $ano++;
                $mes=2;
            }
            
            $first_day = $ano . "-" . $mes . "-01";
            
            $ano_siguiente = date("Y", strtotime("+1 month", strtotime($first_day)));
            $mes_siguiente = date("m", strtotime("+1 month", strtotime($first_day)));
            
            $str .= $calendar->output_calendar($ano,$mes);
            $str .= $calendar->output_calendar($ano_siguiente,$mes_siguiente);
            $str .= '</div>';
            $mes = $mes + 2;
        }
        return $str;
    } 

if ( ! function_exists('fechaFormato'))
{
    function formatDate($fecha){
        $dia = date("d", $fecha); 
        $mes = date("F", $fecha);
        $ano = date("Y", $fecha);  
		
        /*switch($mes){
            case "January":
                $mes = "Enero";
                break;
            case "February":
                $mes = "Febrero";
                break;
            case "March":
                $mes = "Marzo";
                break;
            case "April":
                $mes = "Abril";
                break;
            case "May":
                $mes = "Mayo";
                break;
            case "June":
                $mes = "Junio";
                break;
            case "July":
                $mes = "Julio";
                break;
            case "August":
                $mes = "Agosto";
                break;
            case "September":
                $mes = "Setiembre";
                break;
            case "October":
                $mes = "Octubre";
                break;
            case "November":
                $mes = "Noviembre";
                break;
            case "December":
                $mes = "Diciembre";
                break;            
        }*/
        //return $dia.' de '.$mes.' de '.$ano;
        return $mes.' '.$dia.', '.$ano;
    }
}

function cleanForShortURL($toClean) {
    $normalizeChars = array(
            'Š'=>'S', 'š'=>'s', 'Ð'=>'Dj','Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 
            'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 
            'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 
            'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 
            'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 
            'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 
            'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f'
        );
    $toClean     =    strtr($toClean, $normalizeChars);
    $toClean     =    str_replace(' ', '-', $toClean);
    $toClean     =    str_replace('--', '-', $toClean);
    $toClean     =    trim(preg_replace('/[^a-z0-9-]/i', '', $toClean));//remove all illegal chars
    return $toClean;
}


function formatFecha($fecha, $iso='es') {
	$strfecha = "";
	
	$dateinfo = getdate(strtotime($fecha));
	switch ($iso) {
		case 'es':
			switch ($dateinfo['weekday']) {
				case 'Sunday': $dateinfo['weekday'] = "Domingo"; break;
				case 'Monday': $dateinfo['weekday'] = "Lunes"; break;
				case 'Tuesday': $dateinfo['weekday'] = "Martes"; break;
				case 'Wednesday': $dateinfo['weekday'] = "Miércoles"; break;
				case 'Thursday': $dateinfo['weekday'] = "Jueves"; break;
				case 'Friday': $dateinfo['weekday'] = "Viernes"; break;
				case 'Saturday': $dateinfo['weekday'] = "Sábado"; break;
			}
			switch ($dateinfo['mon']) {
				case '1': $dateinfo['month'] = "enero"; break;
				case '2': $dateinfo['month'] = "febrero"; break;
				case '3': $dateinfo['month'] = "marzo"; break;
				case '4': $dateinfo['month'] = "abril"; break;
				case '5': $dateinfo['month'] = "mayo"; break;
				case '6': $dateinfo['month'] = "junio"; break;
				case '7': $dateinfo['month'] = "julio"; break;
				case '8': $dateinfo['month'] = "agosto"; break;
				case '9': $dateinfo['month'] = "septiembre"; break;
				case '10': $dateinfo['month'] = "octubre"; break;
				case '11': $dateinfo['month'] = "noviembre"; break;
				case '12': $dateinfo['month'] = "diciembre"; break;
			}
			$strfecha = $dateinfo['weekday'].' '.$dateinfo['mday'].' de '.$dateinfo['month'].' de '.$dateinfo['year'];
			break;
		case 'pt':
			switch ($dateinfo['weekday']) {
				case 'Sunday': $dateinfo['weekday'] = "Domingo"; break;
				case 'Monday': $dateinfo['weekday'] = "Segunda-Feira"; break;
				case 'Tuesday': $dateinfo['weekday'] = "Terça-Feira"; break;
				case 'Wednesday': $dateinfo['weekday'] = "Quarta-Feira"; break;
				case 'Thursday': $dateinfo['weekday'] = "Quinta-Feira"; break;
				case 'Friday': $dateinfo['weekday'] = "Sexta-Feira"; break;
				case 'Saturday': $dateinfo['weekday'] = "Sábado"; break;
			}
			switch ($dateinfo['mon']) {
				case '1': $dateinfo['month'] = "janeiro"; break;
				case '2': $dateinfo['month'] = "fevereiro"; break;
				case '3': $dateinfo['month'] = "março"; break;
				case '4': $dateinfo['month'] = "abril"; break;
				case '5': $dateinfo['month'] = "maio"; break;
				case '6': $dateinfo['month'] = "junho"; break;
				case '7': $dateinfo['month'] = "julho"; break;
				case '8': $dateinfo['month'] = "agosto"; break;
				case '9': $dateinfo['month'] = "setembro"; break;
				case '10': $dateinfo['month'] = "outubro"; break;
				case '11': $dateinfo['month'] = "novembro"; break;
				case '12': $dateinfo['month'] = "dezembro"; break;
			}
			$strfecha = $dateinfo['weekday'].' '.$dateinfo['mday'].' de '.$dateinfo['month'].' de '.$dateinfo['year'];
			break;
		case 'en':
			$strfecha = $dateinfo['weekday'].' '.$dateinfo['month'].' '.$dateinfo['mday'].', '.$dateinfo['year'];
			break;
	}
	
	return $strfecha;
}
?>