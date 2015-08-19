<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class tentangaids extends ApplicationBase{
	
	function __construct(){
		parent::__construct();
		// load model
        $this->load->model('tentangaids/m_tentangaids');
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
        $this->smarty->assign("template_content", "tentangaids/list.html");


        /* PART 3 : load data from database */
        $tentangaids = $this->m_tentangaids->get_all_tentangaids();
        $this->smarty->assign("rs_id", $tentangaids); // view list.html akan mengenali data indikator1 dengan nama rs_id

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