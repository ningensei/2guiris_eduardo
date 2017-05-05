<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// ------------------------------------------------------------------------

function log_visita($seccion) {
	$CI =& get_instance();
	$data = array(
        'seccion' => $seccion,
        'ip' => $_SERVER['REMOTE_ADDR']
	);

	$CI->db->insert('visitas', $data);
}

function renderBreadcrumbs($breadcrumbs) {
	$res = '<div class="breadcrumbs">';
	foreach($breadcrumbs as $key => $bread) {
		if($bread['url']){
			$res .= '<a href="'.$bread['url'].'">';
			$res .= '<span>'.$bread['name'].'</span></a>';
		} else {
			$res .= '<span class="active">'.$bread['name'].'</span>';
		}
		
		if($key < count($breadcrumbs) - 1) {
			$res .= ' <i class="fa fa-arrow-right" aria-hidden="true"></i>
 ';
		}
	}
	$res .= '</div>';
	return $res;
}
function httpGet($url) {

    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $output=curl_exec($ch);
    curl_close($ch);
    return $output;
}

function cleanString($string){
	$a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ', 'Ά', 'ά', 'Έ', 'έ', 'Ό', 'ό', 'Ώ', 'ώ', 'Ί', 'ί', 'ϊ', 'ΐ', 'Ύ', 'ύ', 'ϋ', 'ΰ', 'Ή', 'ή');
	$b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o', 'Α', 'α', 'Ε', 'ε', 'Ο', 'ο', 'Ω', 'ω', 'Ι', 'ι', 'ι', 'ι', 'Υ', 'υ', 'υ', 'υ', 'Η', 'η');
	return str_replace($a, $b, $string);
}

function matchFile($string){
	return preg_match('/^.*\.(jpg|jpeg|png|gif)$/i', $string);
}


function xcopy($source, $dest, $permissions = 0755)
{
    // Check for symlinks
    if (is_link($source)) {
        return symlink(readlink($source), $dest);
    }

    // Simple copy for a file
    if (is_file($source)) {
        return copy($source, $dest);
    }

    // Make destination directory
    if (!is_dir($dest)) {
        mkdir($dest, $permissions);
    }

    // Loop through the folder
    $dir = dir($source);
    while (false !== $entry = $dir->read()) {
        // Skip pointers
        if ($entry == '.' || $entry == '..') {
            continue;
        }

        // Deep copy directories
        xcopy("$source/$entry", "$dest/$entry");
    }
}


function date_diff_years($date1,$date2){
	$diff = abs(strtotime($date2) - strtotime($date1));
	$years = floor($diff / (365*60*60*24));
	return $years;
}

function date_diff_days($date1,$date2){
	$diff = abs(strtotime($date2) - strtotime($date1));
	$d = floor($diff / (60*60*24));
	return $d;
}



function uid() {
	$CI =& get_instance();
	$user = $CI->session->userdata('user');
	return $user->id;
}

function readonly() {
	$CI =& get_instance();
	return $CI->session->userdata('readonly');
}

function static_url() {
	$CI =& get_instance();
	return $CI->config->item('static_url');
}

function status($status) {
	switch ($status) {
		case 0: return ""; break;
		case 1: return "approved"; break;
		case 2: return "failed"; break;
		case 3: return "pending"; break;
	}
}

function esAdmin() {
	$CI =& get_instance();
	return $CI->session->userdata('es_admin');
}


function vimeo_thumb($id,$download=false) {
    $data = file_get_contents("http://vimeo.com/api/v2/video/$id.json");
    $data = json_decode($data);
	
	if($download){
		file_put_contents('./uploads/temp/'.$id.'.jpg',$data[0]->thumbnail_medium);
		$filePath = '/uploads/temp/'.$id.'.jpg';
		$fileName = basename($filePath);
        $fileSize = filesize($filePath);

        header("Cache-Control: private");
        header("Content-Type: application/stream");
        header("Content-Length: ".$fileSize);
        header("Content-Disposition: attachment; filename=".$fileName);
        readfile($filePath);
	}
	else{
		return $data[0]->thumbnail_medium;
	}
}

//default para player de front
function vimeo_player($url,$w=1170,$h=658,$margin='3%'){
	$params = explode('/',$url);
	$video_id = $params[count($params)-1];
	
	return '<div style="margin:'.$margin.';" class="embed-container"><iframe src="//player.vimeo.com/video/'.$video_id.'?title=0&byline=0&;portrait=0" width="'.$w.'" height="'.$h.'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></div>';
}

function get_vimeo_url($url){
	$params = explode('/',$url);
	$video_id = $params[count($params)-1];
	return '//player.vimeo.com/video/'.$video_id.'?title=0&byline=0&;portrait=0';
}

function youtube_embed_url($url) {
	return 'http://www.youtube.com/embed/'.youtube_id($url);
}

function youtube_id($url) {
	parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
	if (isset($my_array_of_vars['v'])) {
		return $my_array_of_vars['v'];	
	}
	else
		return "";
}

function admin_username(){
	$CI =& get_instance();
	return ($CI->session->userdata('usuario')) ? $CI->session->userdata('usuario') : '';
}


function getSession() {
	$CI =& get_instance();
	$id = $CI->session->userdata('id');
	if ($id) {
		$CI->id = $CI->session->userdata('id');
		$CI->nombre = $CI->session->userdata('nombre');
		$CI->email = $CI->session->userdata('email');
	}
}

function login($id, $nombre, $email) {
	$CI =& get_instance();
	$CI->session->set_userdata('id', $id);
	$CI->session->set_userdata('nombre', $nombre);
	$CI->session->set_userdata('email', $email);
}

function logout() {
	$CI =& get_instance();
	$CI->session->sess_destroy();
}

function userloggedId(){
	$CI =& get_instance();
	if( $CI->session->userdata('admin_id') ){
		return $CI->session->userdata('admin_id');
	}
	else
		return false;
}


//funcion que recibe datos de un model y exporta el excel.
function exportExcel($results,$filename='archivo'){
    //results debe llegar como ->result() para que funcione
  
    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=".$filename.".xls");
  
    echo "<table>
        <tr>";
  
    $i = 1;
    //nombre de columnas
    foreach($results as $pos=>$rows){
        foreach($rows as $key=>$val){
            echo "<td style='font-weight:bold; border:.6px solid #000000; text-align:center;'>".strtoupper($key)."</td>";
        }
        if($i==1) break;
    }
    
    echo "</tr>";
   
    foreach($results as $pos=>$rows){
          echo "<tr>";
            foreach($rows as $key=>$val){
                echo "<td style='border:.6px solid #000000; text-align:center;'>".utf8_decode($val)."</td>";
            }
            echo "</tr>";
    }
    echo "</table>";
}

function shortdate($d) {
	$mes = date('m', strtotime($d));
	return date('d', strtotime($d)).'-'.substr(monthName($mes), 0, 3).'-'.date('Y', strtotime($d));
}

function monthName($m) {
	switch ($m) {
		case '01': return "Enero"; break;
		case '02': return "Febrero"; break;
		case '03': return "Marzo"; break;
		case '04': return "Abril"; break;
		case '05': return "Mayo"; break;
		case '06': return "Junio"; break;
		case '07': return "Julio"; break;
		case '08': return "Agosto"; break;
		case '09': return "Septiembre"; break;
		case '10': return "Octubre"; break;
		case '11': return "Noviembre"; break;
		case '12': return "Diciembre"; break;
	}
}

function formato_fecha($fecha){
	$d = strtotime($fecha);

	return date('d', $d).'-'.substr(monthName(date('m', $d)),0,3).'-'.date('Y', $d);
}

function zerofill($entero, $largo){
    // Limpiamos por si se encontraran errores de tipo en las variables
    $entero = (int)$entero;
    $largo = (int)$largo;
     
    $relleno = '';
     
    /**
     * Determinamos la cantidad de caracteres utilizados por $entero
     * Si este valor es mayor o igual que $largo, devolvemos el $entero
     * De lo contrario, rellenamos con ceros a la izquierda del número
     **/
    if (strlen($entero) < $largo) {
        $relleno = str_repeat('0',$largo-strlen($entero));
    }
    return $relleno . $entero;
}

function genRandomString($type="alnum",$length = 10) {
    return random_string($type,$length);
}


function get_curl_data($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	$output = curl_exec($ch); 		
	curl_close($ch);
	return $output;
}

function post($url, $fields){ 
	$fields_string = "";
	foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
	rtrim($fields_string, '&');
	
	$ch = curl_init();

	curl_setopt($ch,CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_POST, count($fields));
	curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
	
	$result = curl_exec($ch);
	
	curl_close($ch);
	
	return $result;
}

function player_youtube($url, $width, $height) {
	preg_match(
    	    '/[\\?\\&]v=([^\\?\\&]+)/',
	        $url,
        	$matches
    	);
	$id = $matches[1];
 
	return '<object width="' . $width . '" height="' . $height . '"><param name="movie" value="http://www.youtube.com/v/' . $id . '&amp;hl=en_US&amp;fs=1?rel=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/' . $id . '&amp;hl=en_US&amp;fs=1?rel=0" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="' . $width . '" height="' . $height . '"></embed></object>';
}

function thumb_youtube($url, $n) {
	preg_match(
    	    '/[\\?\\&]v=([^\\?\\&]+)/',
	        $url,
        	$matches
    	);
	$id = $matches[1];
 
	return 'http://img.youtube.com/vi/'.$id.'/'.$n.'.jpg';
}

function isValidEmail($email,$multipleEmails=false){
	if($multipleEmails){
		//devuelve true or false segun haya algun email no valido
		$emails = explode(',',$email);
		$valid = array();
		foreach( $emails as $email ) {
			if($email != '')
				if( preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email) )
					$valid[] = $email;
		}
		return (count($valid) > 0) ? $valid : 0;
	}
	else{
		return preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email);
	}
}

function download_file($file_source,$download_name){
    if($file_source != ''){
		$aux = $file_source;
		
		$aux = explode('.',$aux);
		header("Content-type:application/".$aux[1]);
		
		header("Content-Disposition:attachment;filename='".$download_name."'");
		
		readfile($file_source);
	}
}

function array_to_obj($array, &$obj)
  {
    foreach ($array as $key => $value)
    {
      if (is_array($value))
      {
      $obj->$key = new stdClass();
      array_to_obj($value, $obj->$key);
      }
      else
      {
        $obj->$key = $value;
      }
    }
  return $obj;
  }

function arrayToObject($array)
{
 $object= new stdClass();
 return array_to_obj($array,$object);
}