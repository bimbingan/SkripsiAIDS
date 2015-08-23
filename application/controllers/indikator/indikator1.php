<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class indikator1 extends ApplicationBase{
	
    function __construct(){
        parent::__construct();
	   // load model
        $this->load->model('indikator/m_indikator1');
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
      $this->smarty->assign("template_content", "indikator/indikator1/list.html");


      /* PART 3 : load data from database */
      $indikator1 = $this->m_indikator1->get_all_indikator1();
        $this->smarty->assign("rs_id", $indikator1); // view list.html akan mengenali data indikator1 dengan nama rs_id

        /* PART 4 : notifikasi dan display view */

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();

    }

    function add(){
      $this->_set_page_rule("C");
      $this->smarty->assign("template_content", "indikator/indikator1/add.html");


      // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }


    function process_add(){
        $this->_set_page_rule("C");

        $this->tnotification->set_rules('kode_indikator1', 'Kode', 'trim|required|max_length[5]');
        $this->tnotification->set_rules('ket_indikator1', 'Keterangan', 'trim|required|max_length[200]');


        if($this->tnotification->run() !== FALSE){
            $params = array(
                'kode_indikator1' => $this->input->post('kode_indikator1'), 
                'ket_indikator1' => $this->input->post('ket_indikator1')
            );
            echo "<pre>";
            print_r($params);
            
            if($this->m_indikator1->insert_indikator1($params)){
                
                 // success
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Data berhasil disimpan");
            }else{

                // default error
                $this->tnotification->sent_notification("error", "Data gagal disimpan");
            }

        }else{
            // default error
            $this->tnotification->sent_notification("error", "Data gagal disimpan");
        }


        redirect("indikator/indikator1/add");
    }   

}