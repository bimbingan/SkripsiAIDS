<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class pencegahan extends ApplicationBase{

    function __construct(){
        parent::__construct();
        // load model
        $this->load->model('pengaturan/m_preference');
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
        $this->smarty->assign("template_content", "pencegahan/list.html");
        // load js
        $this->smarty->load_javascript("resource/js/ckeditor/ckeditor.js");

        /* PART 3 : load data from database */
        $result = $this->m_preference->get_preference_by_id("85");

        $this->smarty->assign("result", $result); // view list.html akan mengenali data indikator1 dengan nama rs_id

        /* PART 4 : notifikasi dan display view */

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();

    }

        function process_edit(){

                $this->tnotification->set_rules('pencegahan_id', 'ID', 'trim|required');
                $this->tnotification->set_rules('pencegahan', 'Pencegahan AIDS', 'trim|max_length[5000]');

                if($this->tnotification->run() !== FALSE){
                    $params = array(
                        'pref_value' => $this->input->post('pencegahan')
                    );

                    $where = array(
                        'pref_id' => $this->input->post('pencegahan_id')
                    );

                    if($this->m_preference->update_preference($params, $where)){

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

                redirect("pencegahan");
        }
}
