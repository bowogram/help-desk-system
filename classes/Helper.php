<?php
class Helper{
    
    
    public static function string2hash($string = null) {
		if (!empty($string)) {
			return hash('md5', $string);
		}
	}
    
    public static function redirect($url = null) {
		if (!empty($url)) {
			header("Location: {$url}");
			exit;
			//echo "<script>window.location = '$url'<\/script>";
		}
	}

	public static function getParam($par) {
		return isset($_GET[$par]) && $_GET[$par] != "" ?
				$_GET[$par] : null;
	}

	public static function startSession(){
		if(session_status() != PHP_SESSION_ACTIVE) session_start();
	}

	public static function getSession($name = null) {
		if (!empty($name)) {
			return isset($_SESSION[$name]) ? $_SESSION[$name] : null;
		}
	}
	
	public static function setSession($name = null, $value = null) {
		if (!empty($name) && !empty($value)) {
			$_SESSION[$name] = $value;
		}
	}
    
    
    
    public static function cleanInput($input){
        if(!empty($input)){
            $input = trim($input);
            $input = stripslashes($input);
            $input = htmlspecialchars($input);
            return $input;
        }
    }
}
?>