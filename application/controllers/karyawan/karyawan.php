<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class karyawan extends ApplicationBase{
	
	function __construct(){
		parent::__construct();
		// load model
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
      $this->smarty->assign("template_content", "karyawan/list.html");


      /* PART 3 : load data from database */
      $karyawan = $this->m_karyawan->get_all_karyawan();
        $this->smarty->assign("rs_id", $karyawan); // view list.html akan mengenali data indikator1 dengan nama rs_id

        /* PART 4 : notifikasi dan display view */

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();

    }

    function add(){
        $this->_set_page_rule("C");
        $this->smarty->assign("template_content", "karyawan/add.html");


      // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }


    function process_add(){
        $this->_set_page_rule("C");

        $this->tnotification->set_rules('id_karyawan', 'Kode', 'trim|required|max_length[5]');
        // $this->tnotification->set_rules('nik', 'NIK', 'trim|required|max_length[30]');
        $this->tnotification->set_rules('nama_karyawan', 'Nama', 'trim|required|max_length[100]');

        if($this->tnotification->run() !== FALSE){
            $params = array(
                'id_karyawan' => $this->input->post('id_karyawan'), 
                // 'nik' => $this->input->post('nik'),
                'nama_karyawan' => $this->input->post('nama_karyawan'),
                );
            
            if($this->m_karyawan->insert_karyawan($params)){

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


        redirect("karyawan/karyawan/add");
        
    }

    function edit($params){
        $this->_set_page_rule("U");
        $this->smarty->assign("template_content", "karyawan/edit.html");

        $karyawan = $this->m_karyawan->get_one_karyawan($params);
        $this->smarty->assign("result", $karyawan);

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    function process_edit(){
        $this->_set_page_rule("U");

        $this->tnotification->set_rules('id_karyawan', 'Kode', 'trim|required|max_length[5]');
        // $this->tnotification->set_rules('nik', 'NIK', 'trim|required|max_length[30]');
        $this->tnotification->set_rules('nama_karyawan', 'Nama', 'trim|required|max_length[100]');


        if($this->tnotification->run() !== FALSE){
            $params = array(
                 // 'NIK' => $this->input->post('NIK'),
             'nama_karyawan' => $this->input->post('nama_karyawan')
             );

            $where = array(
                'id_karyawan' => $this->input->post('id_karyawan')
                );
            
            if($this->m_karyawan->update_karyawan($params, $where)){

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


        redirect("karyawan/karyawan/edit/". $this->input->post('kode_karyawan'));
    }

    function delete($params){
        $this->_set_page_rule("D");

        if($this->m_karyawan->delete_karyawan($params)){
              // success
            $this->tnotification->delete_last_field();
            $this->tnotification->sent_notification("success", "Data berhasil dihapus");
        }else{
            $this->tnotification->sent_notification("error", "Data gagal dihapus");

        }
        redirect("karyawan/karyawan/");
    }


}