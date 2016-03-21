<?php 

namespace Anax\FlashMessage;

class CFlashMessageTest extends \PHPUnit_Framework_TestCase {
    
    public function testSetFlash() {
        
        $fl = new CFlashMessage();
        
        $fl->setFlash('success', 'message');        
        $exp = is_array($_SESSION['message']);
        
        $this->assertTrue($exp);
    }
    
    public function testHasFlash() {
        
        $fl = new CFlashMessage();
        
        $fl->setFlash('success', 'message');
        $exp = $fl->hasFlash();
        $this->assertTrue($exp);
        
    }
    
    public function testGetFlash() {
     
        $fl = new CFlashMessage();
        
        $fl->setFlash('success', 'message');
        
        $res = $fl->getFlash();
        $key = $res['type'];
        $exp = 'flash-success';
        $this->assertEquals($key, $exp, "Type missmatch");
        
        $res = $fl->getFlash();
        $key = $res['message'];
        $exp = 'message';
        $this->assertEquals($key, $exp, "Message
        missmatch");
        
    }
    
}