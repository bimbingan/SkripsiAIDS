<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class stadium extends ApplicationBase{
    
    function __construct(){
        parent::__construct();
       // load model
        $this->load->model('stadium/m_stadium');
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
      $this->smarty->assign("template_content", "stadium/list.html");


      /* PART 3 : load data from database */
      $stadium = $this->m_stadium->get_all_stadium();
        $this->smarty->assign("rs_id", $stadium); // view list.html akan mengenali data indikator1 dengan nama rs_id

        /* PART 4 : notifikasi dan display view */

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();

    }

    function add(){
      $this->_set_page_rule("C");
      $this->smarty->assign("template_content", "stadium/add.html");


      // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }


    function process_add(){
        $this->_set_page_rule("C");

        $this->tnotification->set_rules('kode_stadium', 'Kode', 'trim|required|max_length[5]');
        $this->tnotification->set_rules('nama_stadium', 'Nama Stadium', 'trim|required|max_length[30]');
        $this->tnotification->set_rules('ket_stadium', 'Keterangan', 'trim|required|max_length[1000]');
        $this->tnotification->set_rules('solusi', 'Solusi', 'trim|required|max_length[1000]');


        if($this->tnotification->run() !== FALSE){
            $params = array(
                'kode_stadium' => $this->input->post('kode_stadium'),
                'nama_stadium' => $this->input->post('nama_stadium'), 
                'ket_stadium' => $this->input->post('ket_stadium'),
                'solusi' => $this->input->post('solusi')
            );
            
            if($this->m_stadium->insert_stadium($params)){
                
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


        redirect("stadium/stadium/add");
        
    }

    function edit($params){
        $this->_set_page_rule("U");
        $this->smarty->assign("template_content", "stadium/edit.html");

        $stadium = $this->m_stadium->get_one_stadium($params);
        $this->smarty->assign("result", $stadium);

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

     function process_edit(){
        $this->_set_page_rule("U");

        $this->tnotification->set_rules('kode_stadium', 'Kode', 'trim|required|max_length[5]');
        $this->tnotification->set_rules('nama_stadium', 'Nama Stadium', 'trim|required|max_length[30]');
        $this->tnotification->set_rules('ket_stadium', 'Keterangan', 'trim|required|max_length[1000]');
        $this->tnotification->set_rules('solusi', 'Solusi', 'trim|required|max_length[1000]');

        if($this->tnotification->run() !== FALSE){
            $params = array(
                'solusi' => $this->input->post('solusi'),
                'ket_stadium' => $this->input->post('ket_stadium'),
                'nama_stadium' => $this->input->post('nama_stadium')
            );

            $where = array(
                'kode_stadium' => $this->input->post('kode_stadium')
            );
            
            if($this->m_stadium->update_stadium($params, $where)){
                
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


        redirect("stadium/stadium/edit/". $this->input->post('kode_stadium'));
    }

    function delete($params){
        $this->_set_page_rule("D");

        if($this->m_stadium->delete_stadium($params)){
              // success
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Data berhasil dihapus");
        }else{
            $this->tnotification->sent_notification("error", "Data gagal dihapus");

        }
        redirect("stadium/stadium");
    }



}