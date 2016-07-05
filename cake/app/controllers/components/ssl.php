<?php 
class SslComponent extends Object {
    
    var $components = array('RequestHandler');
    
    var $Controller = null;
    
    function initialize(&$Controller) {
        $this->Controller = $Controller;
    }
    
    function force() {
        if(!$this->RequestHandler->isSSL()) {
            $this->Controller->redirect('https://'.$this->__url());
        }
    }
    function unforce() {
        $this->Controller->redirect('http://'.$this->__url1());
    }
    
    function __url() {
        $port = env('SERVER_PORT') == 80 ? '' : ':'.env('SERVER_PORT');

        return env('SERVER_NAME').$port.env('REQUEST_URI');
    }
    
    function __url1() {
        $port = env('SERVER_PORT') == 80 ? '' : ':'.env('SERVER_PORT');

        return env('SERVER_NAME').env('REQUEST_URI');
    }
}
?> 
