<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class home extends ApplicationBase{

function index(){

$this->data['page'] = 'home';
$this->load->view('index',$this->data);	

}


}