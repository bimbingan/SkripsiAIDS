<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class solusi extends ApplicationBase{
	
	function __construct(){
		parent::__construct();
		// load model
        $this->load->model('solusi/m_solusi');
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
        $this->smarty->assign("template_content", "solusi/list.html");


        /* PART 3 : load data from database */
        $solusi = $this->m_solusi->get_all_solusi();
        $this->smarty->assign("rs_id", $solusi); // view list.html akan mengenali data indikator1 dengan nama rs_id

        /* PART 4 : notifikasi dan display view */

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();

	}

	function add(){
                $this->_set_page_rule("C");
      $this->smarty->assign("template_content", "solusi/add.html");


      // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }


    function process_add(){
        $this->_set_page_rule("C");

        $this->tnotification->set_rules('kode_solusi', 'Kode', 'trim|required|max_length[5]');
        $this->tnotification->set_rules('hasil', 'Hasil', 'trim|required|max_length[300]');
        $this->tnotification->set_rules('ket_solusi', 'Keterangan', 'trim|required|max_length[350]');

        if($this->tnotification->run() !== FALSE){
            $params = array(
                'kode_solusi' => $this->input->post('kode_solusi'), 
                'hasil' => $this->input->post('hasil'),
                'ket_solusi' => $this->input->post('ket_solusi'),
            );
            
            if($this->m_solusi->insert_solusi($params)){
                
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


        redirect("solusi/solusi/add");
		
	}

    function edit($params){
        $this->_set_page_rule("U");
        $this->smarty->assign("template_content", "solusi/edit.html");

        $solusi = $this->m_solusi->get_one_solusi($params);
        $this->smarty->assign("result", $solusi);

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

     function process_edit(){
        $this->_set_page_rule("U");

        $this->tnotification->set_rules('kode_solusi', 'Kode', 'trim|required|max_length[5]');
        $this->tnotification->set_rules('hasil', 'Hasil', 'trim|required|max_length[300]');
        $this->tnotification->set_rules('ket_solusi', 'Keterangan', 'trim|required|max_length[350]');


        if($this->tnotification->run() !== FALSE){
            $params = array(
                'ket_solusi' => $this->input->post('ket_solusi'),
                'hasil' => $this->input->post('hasil')
            );

            $where = array(
                'kode_solusi' => $this->input->post('kode_solusi')
            );
            
            if($this->m_solusi->update_solusi($params, $where)){
                
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


        redirect("solusi/solusi/edit/". $this->input->post('kode_solusi'));
    }

    function delete($params){
        $this->_set_page_rule("D");

        if($this->m_solusi->delete_solusi($params)){
              // success
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Data berhasil dihapus");
        }else{
            $this->tnotification->sent_notification("error", "Data gagal dihapus");

        }
        redirect("solusi/solusi/");
    }


}