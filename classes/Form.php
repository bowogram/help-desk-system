<?php
class Form {





	public function isPost($field = null) {
		if (!empty($field)) {
			if (isset($_POST[$field])) {
				return true;
			}
			return false;			
		} else {
			if (!empty($_POST)) {
				return true;
			}
			return false;
		}
	}
	
	
	
	
	
	
	
	
	public function getPost($field = null) {
		if (!empty($field)) {
			return $this->isPost($field) ? 
					strip_tags($_POST[$field]) : 
					null;
		}
	}
    
    
    public function getPostArray($expected = null) {
		$out = array();
		if(!empty($expected)){
            foreach($_POST as $key => $value ){
                $out[]=($value);
            }
            return $out;
        }
		return $out;
	}
	

}
?>