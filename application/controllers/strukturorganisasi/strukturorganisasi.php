<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class strukturorganisasi extends ApplicationBase{
	
	function __construct(){
		parent::__construct();
		// load model
        $this->load->model('strukturorganisasi/m_strukturorganisasi');
        $this->load->model('jabatanorganisasi/m_jabatanorganisasi');
        $this->load->model('karyawan/m_karyawan');
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
        $this->smarty->assign("template_content", "strukturorganisasi/list.html");


        /* PART 3 : load data from database */
        $strukturorganisasi = $this->m_strukturorganisasi->get_all_strukturorganisasi();
        $this->smarty->assign("rs_id", $strukturorganisasi); // view list.html akan mengenali data indikator1 dengan nama rs_id

        /* PART 4 : notifikasi dan display view */

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();

	}

	function add(){
                $this->_set_page_rule("C");
      $this->smarty->assign("template_content", "strukturorganisasi/add.html");

      $this->smarty->assign("rs_jabatan", $this->m_jabatanorganisasi->get_all_jabatanorganisasi());
      $this->smarty->assign("rs_karyawan", $this->m_karyawan->get_all_karyawan());
      // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }


    function process_add(){
        $this->_set_page_rule("C");

        $this->tnotification->set_rules('id_jabatan', 'Id Jabatan', 'trim|required|max_length[5]');
        $this->tnotification->set_rules('id_karyawan', 'Id Karyawan', 'trim|required|max_length[5]');
              

        if($this->tnotification->run() !== FALSE){
            $params = array(
                'id_jabatan' => $this->input->post('id_jabatan'), 
                'id_karyawan' => $this->input->post('id_karyawan'), 
                
            );
            
            if($this->m_strukturorganisasi->insert_strukturorganisasi($params)){
                
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


        redirect("strukturorganisasi/strukturorganisasi/add");
		
	}

    function edit($params){
        $this->_set_page_rule("U");
        $this->smarty->assign("template_content", "strukturorganisasi/edit.html");

        $strukturorganisasi = $this->m_strukturorganisasi->get_one_strukturorganisasi($params);
        $this->smarty->assign("result", $strukturorganisasi);

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

     function process_edit(){
        $this->_set_page_rule("U");

        $this->tnotification->set_rules('id_jabatan', 'Id Jabatan', 'trim|required|max_length[5]');
        $this->tnotification->set_rules('id_karyawan', 'Id Karyawan', 'trim|required|max_length[5]');


        if($this->tnotification->run() !== FALSE){
            $params = array(
                'id_karyawan' => $this->input->post('id_karyawan')
            );

            $where = array(
                'id_jabatan' => $this->input->post('id_jabatan')
            );
            
            if($this->m_strukturorganisasi->update_strukturorganisasi($params, $where)){
                
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


        redirect("strukturorganisasi/strukturorganisasi/edit/". $this->input->post('nama_jabatan'));
    }

    function delete($params){
        $this->_set_page_rule("D");

        if($this->m_strukturorganisasi->delete_strukturorganisasi($params)){
              // success
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Data berhasil dihapus");
        }else{
            $this->tnotification->sent_notification("error", "Data gagal dihapus");

        }
        redirect("strukturorganisasi/strukturorganisasi/");
    }


}