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
      $this->_set_page_rule("C");
      $this->smarty->assign("template_content", "indikator/indikator2/add.html");


      // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }


    function process_add(){
        $this->_set_page_rule("C");

        $this->tnotification->set_rules('kode_indikator2', 'Kode', 'trim|required|max_length[5]');
        $this->tnotification->set_rules('ket_indikator2', 'Keterangan', 'trim|required|max_length[1000]');


        if($this->tnotification->run() !== FALSE){
            $params = array(
                'kode_indikator2' => $this->input->post('kode_indikator2'), 
                'ket_indikator2' => $this->input->post('ket_indikator2')
            );
            
            if($this->m_indikator2->insert_indikator2($params)){
                
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


        redirect("indikator/indikator2/add");
    } 


    function edit($params){
        $this->_set_page_rule("U");
        $this->smarty->assign("template_content", "indikator/indikator2/edit.html");

        $indikator2 = $this->m_indikator2->get_one_indikator2($params);
        $this->smarty->assign("result", $indikator2);

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    function process_edit(){
        $this->_set_page_rule("U");

        $this->tnotification->set_rules('kode_indikator2', 'Kode', 'trim|required|max_length[5]');
        $this->tnotification->set_rules('ket_indikator2', 'Keterangan', 'trim|required|max_length[1000]');


        if($this->tnotification->run() !== FALSE){
            $params = array(
                'ket_indikator2' => $this->input->post('ket_indikator2')
            );

            $where = array(
                'kode_indikator2' => $this->input->post('kode_indikator2')
            );
            
            if($this->m_indikator2->update_indikator2($params, $where)){
                
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


        redirect("indikator/indikator2/edit/". $this->input->post('kode_indikator2'));
    }

    function delete($params){
        $this->_set_page_rule("D");

        if($this->m_indikator2->delete_indikator2($params, $where)){
              // success
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Data berhasil dihapus");
        }else{
            $this->tnotification->sent_notification("error", "Data gagal dihapus");

        }
        redirect("indikator/indikator2/");
    }



}