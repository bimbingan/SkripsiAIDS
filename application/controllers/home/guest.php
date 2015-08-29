<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/GuestBase.php' );

class guest extends ApplicationBase{

    public function __construct(){
        parent::__construct();
        //Codeigniter : Write Less Do More
    }

    function index(){

        


        parent::display();
    }

}
