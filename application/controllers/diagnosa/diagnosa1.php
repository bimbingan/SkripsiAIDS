<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class diagnosa1 extends ApplicationBase{
	
    function __construct(){
        parent::__construct();
	   // load model
        $this->load->model('diagnosa/m_diagnosa1');
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
      $this->smarty->assign("template_content", "diagnosa/diagnosa1/list.html");


      /* PART 3 : load data from database */
        $diagnosa1 = $this->m_diagnosa1->get_all_diagnosa1();
        $this->smarty->assign("rs_id", $diagnosa1); // view list.html akan mengenali data indikator1 dengan nama rs_id

        /* PART 4 : notifikasi dan display view */

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();

    }

    function add(){
      $this->_set_page_rule("C");
      $this->smarty->assign("template_content", "diagnosa/diagnosa1/add.html");


      // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }


    function process_add(){
        $this->_set_page_rule("C");

        $this->tnotification->set_rules('kode_diagnosa1', 'Kode Diagnosa 1', 'trim|required|max_length[5]');
        $this->tnotification->set_rules('kode_indikator1', 'Kode Indikator 1', 'trim|required|max_length[5]');
        $this->tnotification->set_rules('kode_solusi1', 'Kode Solusi 1', 'trim|required|max_length[5]');
        $this->tnotification->set_rules('mb', 'Mb', 'trim|required|max_length[5]');
        $this->tnotification->set_rules('md', 'Md', 'trim|required|max_length[5]');


        if($this->tnotification->run() !== FALSE){
            $params = array(
                'kode_diagnosa1' => $this->input->post('kode_diagnosa1'),
                'kode_indikator1' => $this->input->post('kode_indikator1'),
                'kode_solusi1' => $this->input->post('kode_solusi1'),
                'mb' => $this->input->post('mb'),
                'md' => $this->input->post('md')
            );
            
            if($this->m_diagnosa1->insert_diagnosa1($params)){
                
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


        redirect("diagnosa/diagnosa1/add");
    } 


    function edit($params){
        $this->_set_page_rule("U");
        $this->smarty->assign("template_content", "diagnosa/diagnosa1/edit.html");

        $diagnosa1 = $this->m_diagnosa1->get_one_diagnosa1($params);
        $this->smarty->assign("result", $diagnosa1);

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

     function process_edit(){
        $this->_set_page_rule("U");

       $this->tnotification->set_rules('kode_diagnosa1', 'Kode Diagnosa 1', 'trim|required|max_length[5]');
        $this->tnotification->set_rules('kode_indikator1', 'Kode Indikator 1', 'trim|required|max_length[5]');
        $this->tnotification->set_rules('kode_solusi1', 'Kode Solusi 1', 'trim|required|max_length[5]');
        $this->tnotification->set_rules('mb', 'Mb', 'trim|required|max_length[5]');
        $this->tnotification->set_rules('md', 'Md', 'trim|required|max_length[5]');

        if($this->tnotification->run() !== FALSE){
            $params = array(
                'md' => $this->input->post('md'),
                'mb' => $this->input->post('mb'),
                'kode_solusi1' => $this->input->post('kode_solusi1'),
                'kode_indikator1' => $this->input->post('kode_indikator1')
            );

            $where = array(
                'kode_diagnosa1' => $this->input->post('kode_diagnosa1')
            );
            
            if($this->m_diagnosa1->update_diagnosa1($params, $where)){
                
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


        redirect("diagnosa/diagnosa1/edit/". $this->input->post('kode_diagnosa1'));
    }

    function delete($params){
        $this->_set_page_rule("D");

        if($this->m_diagnosa1->delete_diagnosa1($params, $where)){
              // success
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Data berhasil dihapus");
        }else{
            $this->tnotification->sent_notification("error", "Data gagal dihapus");

        }
        redirect("diagnosa/diagnosa1/");
    }



}