<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class solusi1 extends ApplicationBase{
	
	function __construct(){
		parent::__construct();
		// load model
        $this->load->model('solusi/m_solusi1');
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
        $this->smarty->assign("template_content", "solusi/solusi1/list.html");


        /* PART 3 : load data from database */
        $solusi1 = $this->m_solusi1->get_all_solusi1();
        $this->smarty->assign("rs_id", $solusi1); // view list.html akan mengenali data indikator1 dengan nama rs_id

        /* PART 4 : notifikasi dan display view */

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();

	}

	function add(){
                $this->_set_page_rule("C");
      $this->smarty->assign("template_content", "solusi/solusi1/add.html");


      // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }


    function process_add(){
        $this->_set_page_rule("C");

        $this->tnotification->set_rules('kode_solusi1', 'Kode', 'trim|required|max_length[5]');
        $this->tnotification->set_rules('hasil', 'hasil', 'trim|required|max_length[300]');
        $this->tnotification->set_rules('ket_solusi1', 'Keterangan', 'trim|required|max_length[350]');

        if($this->tnotification->run() !== FALSE){
            $params = array(
                'kode_solusi1' => $this->input->post('kode_solusi1'), 
                'hasil' => $this->input->post('hasil'),
                'ket_solusi1' => $this->input->post('ket_solusi1'),
            );
            echo "<pre>";
            print_r($params);
            
            if($this->m_solusi1->insert_solusi1($params)){
                
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


        redirect("solusi/solusi1/add");
		
	}

    function edit($params){
        $this->_set_page_rule("U");
        $this->smarty->assign("template_content", "solusi/solusi1/edit.html");

        $solusi1 = $this->m_solusi1->get_one_solusi1($params);
        $this->smarty->assign("result", $solusi1);

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

     function process_edit(){
        $this->_set_page_rule("U");

        $this->tnotification->set_rules('kode_solusi1', 'Kode', 'trim|required|max_length[5]');
        $this->tnotification->set_rules('hasil', 'Hasil', 'trim|required|max_length[300]');
        $this->tnotification->set_rules('ket_solusi1', 'Keterangan', 'trim|required|max_length[350]');


        if($this->tnotification->run() !== FALSE){
            $params = array(
                'ket_solusi1' => $this->input->post('ket_solusi1'),
                'hasil' => $this->input->post('hasil')
            );

            $where = array(
                'kode_solusi1' => $this->input->post('kode_solusi1')
            );
            
            if($this->m_solusi1->update_solusi1($params)){
                
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


        redirect("solusi/solusi1/edit/". $this->input->post('kode_solusi1'));
    }

    function delete($params){
        $this->_set_page_rule("D");

        if($this->m_solusi1->delete_solusi1($params)){
              // success
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Data berhasil dihapus");
        }else{
            $this->tnotification->sent_notification("error", "Data gagal dihapus");

        }
        redirect("solusi/solusi1/");
    }


}