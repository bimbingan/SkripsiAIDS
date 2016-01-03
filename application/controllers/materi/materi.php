<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class materi extends ApplicationBase{
	
	function __construct(){
		parent::__construct();
		// load model
        $this->load->model('materi/m_materi');
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
      $this->smarty->assign("template_content", "materi/list.html");


      /* PART 3 : load data from database */
      $materi = $this->m_materi->get_all_materi();
        $this->smarty->assign("rs_id", $materi); // view list.html akan mengenali data indikator1 dengan nama rs_id

        /* PART 4 : notifikasi dan display view */

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();

    }

    function add(){
        $this->_set_page_rule("C");
        $this->smarty->assign("template_content", "materi/add.html");


      // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }


    function process_add(){
        $this->_set_page_rule("C");

        $this->tnotification->set_rules('id_materi', 'Id', 'trim|required|max_length[5]');
        $this->tnotification->set_rules('judul_materi', 'Judul', 'trim|required|max_length[300]');
        $this->tnotification->set_rules('tanggal_penyampaian', 'Tanggal Penyampaian', 'trim|required|max_length[6]');
        $this->tnotification->set_rules('tempat', 'Tempat', 'trim|required|max_length[300]');

        if($this->tnotification->run() !== FALSE){
            $params = array(
                'id_materi' => $this->input->post('kode_materi'), 
                'judul_materi' => $this->input->post('judul_materi'),
                'tanggal_penyampaian' => $this->input->post('tanggal_penyampaian'),
                'tempat' => $this->input->post('tempat'),
                );
            
            if($this->m_materi->insert_materi($params)){

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


        redirect("materi/materi/add");

    }

    function edit($params){
        $this->_set_page_rule("U");
        $this->smarty->assign("template_content", "materi/edit.html");

        $materi = $this->m_materi->get_one_materi($params);
        $this->smarty->assign("result", $materi);

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    function process_edit(){
        $this->_set_page_rule("U");

        $this->tnotification->set_rules('id_materi', 'Id', 'trim|required|max_length[5]');
        $this->tnotification->set_rules('judul_materi', 'Judul', 'trim|required|max_length[300]');
        $this->tnotification->set_rules('tanggal_penyampaian', 'Tanggal Penyampaian', 'trim|required|max_length[6]');
        $this->tnotification->set_rules('tempat', 'Tempat', 'trim|required|max_length[300]');

        if($this->tnotification->run() !== FALSE){
            $params = array(
                'tempat' => $this->input->post('tempat'),
                'tanggal_penyampaian' => $this->input->post('tanggal_penyampaian'),
                'judul-materi' => $this->input->post('judul-materi')
                );

            $where = array(
                'id_materi' => $this->input->post('kode_materi')
                );
            
            if($this->m_materi->update_materi($params, $where)){

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


        redirect("materi/materi/edit/". $this->input->post('kode_materi'));
    }

    function delete($params){
        $this->_set_page_rule("D");

        if($this->m_materi->delete_materi($params)){
              // success
            $this->tnotification->delete_last_field();
            $this->tnotification->sent_notification("success", "Data berhasil dihapus");
        }else{
            $this->tnotification->sent_notification("error", "Data gagal dihapus");

        }
        redirect("materi/materi/");
    }


}