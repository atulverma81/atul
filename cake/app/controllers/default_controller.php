<?php

class DefaultController extends AppController{

	var $uses=NULL;
	var $helpers 	= array('Html','Javascript','Ajax',"time");	
	var $components = array ('RequestHandler');

	public function index(){
	   $this->checkUserSession();
	   $this->layout='home';
	}
      }
?>