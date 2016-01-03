<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class jabatanorganisasi extends ApplicationBase{
	
    function __construct(){
        parent::__construct();
	   // load model
        $this->load->model('jabatanorganisasi/m_jabatanorganisasi');
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
      $this->smarty->assign("template_content", "jabatanorganisasi/list.html");


      /* PART 3 : load data from database */
      $jabatanorganisasi = $this->m_jabatanorganisasi->get_all_jabatanorganisasi();
        $this->smarty->assign("rs_id", $jabatanorganisasi); // view list.html akan mengenali data jabatan_organisasi dengan nama rs_id

        /* PART 4 : notifikasi dan display view */

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();

    }

    function add(){
      $this->_set_page_rule("C");
      $this->smarty->assign("template_content", "jabatanorganisasi/add.html");
      

      // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }


    function process_add(){
        $this->_set_page_rule("C");

        $this->tnotification->set_rules('id_jabatan', 'ID', 'trim|required|max_length[5]');
        $this->tnotification->set_rules('nama_jabatan', 'Nama jabatan', 'trim|required|max_length[200]');
       
        if($this->tnotification->run() !== FALSE){
            $params = array(
                'id_jabatan' => $this->input->post('id_jabatan'),
                'nama_jabatan' => $this->input->post('nama_jabatan')
            );
            
            if($this->m_jabatanorganisasi->insert_jabatanorganisasi($params)){
                
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


        redirect("jabatanorganisasi/jabatanorganisasi/add");
    } 


    function edit($params){
        $this->_set_page_rule("U");
        $this->smarty->assign("template_content", "jabatanorganisasi/edit.html");

        $jabatanorganisasi = $this->m_jabatanorganisasi->get_one_jabatanorganisasi($params);
        $this->smarty->assign("result", $jabatanorganisasi);

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

     function process_edit(){
        $this->_set_page_rule("U");

        $this->tnotification->set_rules('id_jabatan', 'ID', 'trim|required|max_length[5]');
        $this->tnotification->set_rules('nama_jabatan', 'Nama jabatan', 'trim|required|max_length[200]');


        if($this->tnotification->run() !== FALSE){
            $params = array(
                'nama_jabatan' => $this->input->post('nama_jabatan')
                
            );

            $where = array(
                'id_jabatan' => $this->input->post('id_jabatan')
            );
            
            if($this->m_jabatanorganisasi->update_jabatanorganisasi($params, $where)){
                
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


        redirect("jabatanorganisasi/jabatanorganisasi/edit/". $this->input->post('id_jabatan'));
    }

    function delete($params){
        $this->_set_page_rule("D");

        if($this->m_jabatanorganisasi->delete_jabatanorganisasi($params, $where)){
              // success
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Data berhasil dihapus");
        }else{
            $this->tnotification->sent_notification("error", "Data gagal dihapus");

        }
        redirect("jabatanorganisasi/jabatanorganisasi/");
    }



}