<?php 

namespace Anax\FlashMessage;

class CFlashMessage {
    

    //
    // Variables
    //
    public $message = null;
    
    //
    // Constructor
    //
    public function __construct() {
        
        if(!isset($_SESSION['message'])) {
            $_SESSION['message'] = [];
        }  
        
        $this->message = $_SESSION['message'];
        unset($_SESSION['message']);
    }
    
    //
    // Set message
    //
    public function setFlash($type, $message) {
        
        // Valid types: success, notice, warning and error.
        
        $flash = ['type' => "flash-" . $type, 'message' => $message];
        $_SESSION['message'] = $this->message = $flash;
        
    }
     
    //
    // Do session have a message?
    // 
    public function hasFlash() {
        
        return isset($this->message) && count($this->message) > 0;
        
    }
    
    //
    // Get message
    //
    public function getFlash() {
        
        return $this->message;
        
    }

}