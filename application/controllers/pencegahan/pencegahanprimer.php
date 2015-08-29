<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class pencegahanprimer extends ApplicationBase{
	
	function __construct(){
		parent::__construct();
		// load model
        $this->load->model('pencegahan/m_pencegahanprimer');
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
        $this->smarty->assign("template_content", "pencegahan/pencegahanprimer/list.html");


        /* PART 3 : load data from database */
        $pencegahanprimer = $this->m_pencegahanprimer->get_all_pencegahanprimer();
        $this->smarty->assign("rs_id", $pencegahanprimer); // view list.html akan mengenali data pencegahanprimer dengan nama rs_id

        /* PART 4 : notifikasi dan display view */

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();

	}

	function add(){
        $this->_set_page_rule("C");
      $this->smarty->assign("template_content", "pencegahan/pencegahanprimer/add.html");


      // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }


    function process_add(){
        $this->_set_page_rule("C");

        $this->tnotification->set_rules('kode_pencegahanprimer', 'Kode', 'trim|required|max_length[5]');
        $this->tnotification->set_rules('konsep_abcd', 'Konsep', 'trim|required|max_length[5]');
         $this->tnotification->set_rules('pencegahan_primer', 'Pencegahan', 'trim|required|max_length[350]');


        if($this->tnotification->run() !== FALSE){
            $params = array(
                'kode_pencegahanprimer' => $this->input->post('kode_pencegahanprimer'), 
                'konsep_abcd' => $this->input->post('konsep_abcd'),
                'pencegahan_primer' => $this->input->post('pencegahan_primer')
            );
            echo "<pre>";
            print_r($params);
            
            if($this->m_pencegahanprimer->insert_pencegahanprimer($params)){
                
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


        redirect("pencegahan/pencegahanprimer/add");
		
	}

    function edit($params){
        $this->_set_page_rule("U");
        $this->smarty->assign("template_content", "pencegahan/pencegahanprimer/edit.html");

        $pencegahanprimer = $this->m_pencegahanprimer->get_one_pencegahanprimer($params);
        $this->smarty->assign("result", $pencegahanprimer);

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

     function process_edit(){
        $this->_set_page_rule("U");

        $this->tnotification->set_rules('kode_pencegahanprimer', 'Kode', 'trim|required|max_length[5]');
        $this->tnotification->set_rules('konsep_abcd', 'Konsep', 'trim|required|max_length[5]');
        $this->tnotification->set_rules('pencegahan_primer', 'Keterangan', 'trim|required|max_length[350]');


        if($this->tnotification->run() !== FALSE){
            $params = array(
                'pencegahan_primer' => $this->input->post('pencegahan_primer'),
                'konsep_abcd' => $this->input->post('konsep_abcd')
            );

            $where = array(
                'kode_pencegahanprimer' => $this->input->post('kode_pencegahanprimer')
            );
            
            if($this->m_pencegahanprimer->update_pencegahanprimer($params, $where)){
                
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


        redirect("pencegahan/pencegahanprimer/edit/". $this->input->post('kode_pencegahanprimer'));
    }

    function delete($params){
        $this->_set_page_rule("D");

        if($this->m_pencegahanprimer->delete_pencegahanprimer($params)){
              // success
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Data berhasil dihapus");
        }else{
            $this->tnotification->sent_notification("error", "Data gagal dihapus");

        }
        redirect("pencegahan/pencegahanprimer/");
    }



}