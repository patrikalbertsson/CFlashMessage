<?php 

namespace Anax\FlashMessage;

class CFlashMessageTest extends \PHPUnit_Framework_TestCase {
    
    public function testSetFlash() {
        
        $fl = new \Anax\FlashMessage\CFlashMessage();
        
        $fl->setFlash('success', 'message');        
        $exp = is_array($_SESSION['message']);
        
        $this->assertTrue($exp);
    }
    
    public function testHasFlash() {
        
    }
    
    public function testGetFlash() {
        
    }
    
}