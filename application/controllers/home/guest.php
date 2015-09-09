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
    	$result_tentang_aids = $this->m_preference->get_preference_by_id("81");
    	$result_tentang_kpa = $this->m_preference->get_preference_by_id("82");
    	$result_tentang_arv = $this->m_preference->get_preference_by_id("83");
    	$result_vctcst = $this->m_preference->get_preference_by_id("84");
        $result_pencegahan = $this->m_preference->get_preference_by_id("85");

        $this->smarty->assign("result_tenctang_aids", $result_tentang_aids); // view list.html akan mengenali data indikator1 dengan nama rs_id
         $this->smarty->assign("result_tentang_kpa", $result_tentang_kpa);
        $this->smarty->assign("result_tentang_arv", $result_tentang_arv); // view list.html akan mengenali data indikator1 dengan nama rs_id
        $this->smarty->assign("result_vctcst", $result_vctcst);
        $this->smarty->assign("result_pencegahan", $result_pencegahan);

        parent::display();
    }


}
