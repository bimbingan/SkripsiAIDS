<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class pencegahankhusus extends ApplicationBase{
    
    function __construct(){
        parent::__construct();
       // load model
        $this->load->model('pencegahan/m_pencegahankhusus');
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
      $this->smarty->assign("template_content", "pencegahan/pencegahankhusus/list.html");


      /* PART 3 : load data from database */
      $pencegahankhusus = $this->m_pencegahankhusus->get_all_pencegahankhusus();
        $this->smarty->assign("rs_id", $pencegahankhusus); // view list.html akan mengenali data indikator1 dengan nama rs_id

        /* PART 4 : notifikasi dan display view */

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();

    }

    function add(){
      $this->_set_page_rule("C");
      $this->smarty->assign("template_content", "pencegahan/pencegahankhusus/add.html");


      // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }


    function process_add(){
        $this->_set_page_rule("C");

        $this->tnotification->set_rules('kode_pencegahankhusus', 'Kode', 'trim|required|max_length[5]');
        $this->tnotification->set_rules('pencegahan_khusus', 'Pencegahan', 'trim|required|max_length[350]');


        if($this->tnotification->run() !== FALSE){
            $params = array(
                'kode_pencegahankhusus' => $this->input->post('kode_pencegahankhusus'), 
                'pencegahan_khusus' => $this->input->post('pencegahan_khusus')
            );
            
            if($this->m_pencegahankhusus->insert_pencegahankhusus($params)){
                
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


        redirect("pencegahan/pencegahankhusus/add");
    } 


    function edit($params){
        $this->_set_page_rule("U");
        $this->smarty->assign("template_content", "pencegahan/pencegahankhusus/edit.html");

        $pencegahankhusus = $this->m_pencegahankhusus->get_one_pencegahankhusus($params);
        $this->smarty->assign("result", $pencegahankhusus);

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

     function process_edit(){
        $this->_set_page_rule("U");

        $this->tnotification->set_rules('kode_pencegahankhusus', 'Kode', 'trim|required|max_length[5]');
        $this->tnotification->set_rules('pencegahan_khusus', 'Pencegahan', 'trim|required|max_length[350]');


        if($this->tnotification->run() !== FALSE){
            $params = array(
                'pencegahan_khusus' => $this->input->post('pencegahan_khusus')
            );

            $where = array(
                'kode_pencegahankhusus' => $this->input->post('kode_pencegahankhusus')
            );
            
            if($this->m_pencegahankhusus->update_pencegahankhusus($params, $where)){
                
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


        redirect("pencegahan/pencegahankhusus/edit/". $this->input->post('kode_pencegahankhusus'));
    }

    function delete($params){
        $this->_set_page_rule("D");

        if($this->m_pencegahankhusus->delete_pencegahankhusus($params)){
              // success
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Data berhasil dihapus");
        }else{
            $this->tnotification->sent_notification("error", "Data gagal dihapus");

        }
        redirect("pencegahan/pencegahankhusus/");
    }



}