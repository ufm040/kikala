<?php

namespace Utils;


class FormValidator {

	private $errors;
    private $isValid;


    public function __construct() {
        $this->errors = array(); 
        $this->isValid = true;      
    }

    protected function addError($field,$message){

    	$this->errors[$field] = $message  ;
        $this->isValid = false;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function isValid() {
        return $this->isValid;
    }

    public function validateNotEmpty($value ,$field,$message) {
    	if ($value ==="") {
    		$this->addError($field,$message);
    	}
    }

    public function showErrors($field) {

        if ( ! $this->isValid) {
            if(array_key_exists ( $field , $this->errors )) {
                echo $this->errors[$field];
            }
        }
    }


    public function convertSpecialCaractere($value) {
        return htmlspecialchars($value, ENT_HTML5);
    }
}