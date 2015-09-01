<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/GuestBase.php' );

class guest extends ApplicationBase{

    public function __construct(){
        parent::__construct();
        // load model
        $this->load->model('pengaturan/m_preference');
    }

    function index(){
    	$result = $this->m_preference->get_preference_by_id("81");
        
        $this->smarty->assign("result_tentang_aids", $result); // view list.html akan mengenali data indikator1 dengan nama rs_id

        parent::display();
    }

}
