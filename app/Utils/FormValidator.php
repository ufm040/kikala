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

    public function validateEmail($value,$field,$message) {
        
        if ( ! filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->addError($field,$message);
        }       
    } 

    public function validateYear($value,$field,$message) {
        if (!preg_match("#^(19|20)\d{2}$#", $value)) {
            $this->addError($field,$message);  
        }
    } 

    public function validateCharacter($value,$field,$message) {
        if (!preg_match("#^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$#", $value)) {
            $this->addError($field,$message);  
        }       
    }      
}