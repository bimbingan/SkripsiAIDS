<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class solusi2 extends ApplicationBase{
	
	function __construct(){
		parent::__construct();
		// load model
        $this->load->model('solusi/m_solusi2');
        // load library
        $this->load->library('tnotification');
        // load library
        $this->load->library('pagination');
	}

	function index() {
		/* PART 1 : mengatur rule halaman*/ 
		// set page rules
        $this->_set_page_rule("R");

        /* PART 2 : set view */
        // set template content
        $this->smarty->assign("template_content", "solusi/solusi2/list.html");


        /* PART 3 : load data from database */
        $solusi2 = $this->m_solusi2->get_all_solusi2();
        $this->smarty->assign("rs_id", $solusi2); // view list.html akan mengenali data indikator1 dengan nama rs_id

        /* PART 4 : notifikasi dan display view */

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();

	}

	function add(){
		
	}


}