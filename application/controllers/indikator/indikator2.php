<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class indikator2 extends ApplicationBase{
	
	function __construct(){
		parent::__construct();
		// load model
        $this->load->model('indikator/m_indikator2');
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
        $this->smarty->assign("template_content", "indikator/indikator2/list.html");


        /* PART 3 : load data from database */
        $indikator2 = $this->m_indikator2->get_all_indikator2();
        $this->smarty->assign("rs_id", $indikator2); // view list.html akan mengenali data indikator1 dengan nama rs_id

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