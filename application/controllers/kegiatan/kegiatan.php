<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/OperatorBase.php' );

class kegiatan extends ApplicationBase {

    function __construct() {
        parent::__construct();
        // load model
        $this->load->model('kegiatan/m_kegiatan');
        $this->load->model('kegiatan/m_kegiatan');
        // load library
        $this->load->library('tnotification');
        // load library
        $this->load->library('pagination');
    }

    function index() {
        // set page rules
        $this->_set_page_rule("R");
        // set template content
        $this->smarty->assign("template_content", "kegiatan/list.html");
        // load js
        $this->smarty->load_javascript("resource/js/moment/moment.js");
        $this->smarty->load_javascript("resource/js/datetimepicker/bootstrap-datetimepicker.min.js");
        // load css
        $this->smarty->load_style("datetimepicker/bootstrap-datetimepicker.min.css");
        // session
        $search = $this->tsession->userdata('search_kegiatan_kegiatan');
        $this->smarty->assign('search', $search);
        // params
        $id_kegiatan = !empty($search['id_kegiatan']) ? $search['id_kegiatan'] : $periode['id_kegiatan'];
        $nama_kegiatan = !empty($search['nama_kegiatan']) ? $search['nama_kegiatan'] : "%";
        $tempat_kegiatan = !empty($search['tempat_kegiatan']) ? $search['tempat_kegiatan'] : "%";
        $tanggal_mulai = !empty($search['tanggal_mulai']) ? $search['tanggal_mulai'] : "%";
        $tanggal_selesai = !empty($search['tanggal_selesai']) ? $search['tanggal_selesai'] : "%";
        $kalender_st = !empty($search['kalender_st']) ? "%" . $search['kalender_st'] . "%" : "%";
        $params = array($kalender_st, $tanggal_mulai, $tanggal_selesai, $id_kegiatan, $nama_kegiatan, $tempat_kegiatan);

        // pagination
        $config['base_url'] = site_url("kegiatan/kegiatan/index/");
        $config['total_rows'] = $this->m_kegiatan->get_total_kegiatan($params);

        $config['uri_segment'] = 4;
        $config['per_page'] = 10;
        $this->pagination->initialize($config);
        $pagination['data'] = $this->pagination->create_links();

        // pagination attribute
        $start = $this->uri->segment(4, 0) + 1;
        $end = $this->uri->segment(4, 0) + $config['per_page'];
        $end = (($end > $config['total_rows']) ? $config['total_rows'] : $end);
        $pagination['start'] = ($config['total_rows'] == 0) ? 0 : $start;
        $pagination['end'] = $end;
        $pagination['total'] = $config['total_rows'];

        // pagination assign value
        $this->smarty->assign("pagination", $pagination);
        $this->smarty->assign("no", $start);

        // /* end of pagination ---------------------- */
        // get list data
        $params = array($kalender_st, $tanggal_mulai, $tanggal_selesai, $id_kegiatan, $nama_kegiatan, $tempat_kegiatan, ($start - 1), $config['per_page']);

        $this->smarty->assign("rs_id", $this->m_kegiatan->get_list_kegiatan($params));
        $this->smarty->assign("rs_kegiatan", $this->m_kegiatan->get_all_kegiatan());
        // set localization
        setlocale(LC_TIME, 'id');
        // notification

        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    // pencarian
    public function search_process() {
        // set page rules
        $this->_set_page_rule("R");
        //--
        if ($this->input->post('save') == 'Cari') {
            $params = array(
                "id_kegiatan" => $this->input->post('id_kegiatan'),
                "nama_kegiatan" => $this->input->post('nama_kegiatan'),
                "tempat_kegiatan" => $this->input->post('tempat_kegiatan'),
                "tanggal_mulai" => $this->input->post('tanggal_mulai'),
                "tanggal_selesai" => $this->input->post('tanggal_selesai'),
                "kalender_st" => $this->input->post('kalender_st')
                );
            // set
            $this->tsession->set_userdata('search_kegiatan_kegiatan', $params);
        } else {
            // unset
            $this->tsession->unset_userdata('search_kegiatan_kegiatan');
        }
        //--
        redirect('kegiatan/kegiatan');
    }

    // form tambah kalender
    function add() {
        // set page rules
        $this->_set_page_rule("C");
        // set template content
        $this->smarty->assign("template_content", "kegiatan/add.html");
        // load js
        $this->smarty->load_javascript("resource/js/moment/moment.js");
        $this->smarty->load_javascript("resource/js/datetimepicker/bootstrap-datetimepicker.min.js");
        // load css
        $this->smarty->load_style("datetimepicker/bootstrap-datetimepicker.min.css");

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    // tambah kalender
    function process_add() {
        // set page rules
        $this->_set_page_rule("C");
        // cek input
        $this->tnotification->set_rules('id_kegiatan', 'Id Kegiatan', 'trim|required');
        $this->tnotification->set_rules('nama_kegiatan', 'Nama Kegiatan', 'trim|max_length[50]');
        $this->tnotification->set_rules('tempat_kegiatan', 'Tempat Kegiatan', 'trim|max_length[50]');
        $this->tnotification->set_rules('tanggal_mulai', 'Tanggal Mulai', 'trim|required');
        $this->tnotification->set_rules('tanggal_selesai', 'Tanggal Selesai', 'trim|required');
        $this->tnotification->set_rules('kalender_st', 'Status', 'trim|required');
        // process

        if ($this->tnotification->run() !== FALSE) {
            // -- end of process data
            $params = array(
                'id_kegiatan' => $this->input->post('id_kegiatan'),
                'nama_kegiatan' => $this->input->post('nama_kegiatan'),
                'tempat_kegiatan' => $this->input->post('tempat_kegiatan'),
                'tanggal_mulai' => $this->input->post('tanggal_mulai'),
                'tanggal_selesai' => $this->input->post('tanggal_selesai'),
                'kalender_st' => $this->input->post('kalender_st')
                );
            // insert
            if ($this->m_kegiatan->insert_kegiatan($params)) {
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Data berhasil disimpan");
            } else {
                // default error
                $this->tnotification->sent_notification("error", "Data gagal disimpan");
            }
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Data gagal disimpan");
        }
        // default redirect
        redirect("kegiatan/kegiatan/add");
    }

    // form edit kalender
    function edit($param) {
        // set page rules
        $this->_set_page_rule("U");
        // set template content
        $this->smarty->assign("template_content", "kegiatan/edit.html");
        // load js
        $this->smarty->load_javascript("resource/js/moment/moment.js");
        $this->smarty->load_javascript("resource/js/datetimepicker/bootstrap-datetimepicker.min.js");
        // load css
        $this->smarty->load_style("datetimepicker/bootstrap-datetimepicker.min.css");
        // send data
        $this->smarty->assign("result", $this->m_kegiatan->get_kegiatan_by_id($param));

        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }

    // process edit kalender
    function process_edit() {
        // set page rules
        $this->_set_page_rule("U");
        // cek input
        $this->tnotification->set_rules('id_kegiatan', 'Id Kegiatan', 'trim|required');
        $this->tnotification->set_rules('nama_kegiatan', 'Nama Kegiatan', 'trim|max_length[50]');
        $this->tnotification->set_rules('tempat_kegiatan', 'Tempat Kegiatan', 'trim|max_length[50]');
        $this->tnotification->set_rules('tanggal_mulai', 'Tanggal Mulai', 'trim|required');
        $this->tnotification->set_rules('tanggal_selesai', 'Tanggal Selesai', 'trim|required');
        $this->tnotification->set_rules('kalender_st', 'Status', 'trim|required');
        // process
        if ($this->tnotification->run() !== FALSE) {
            // pre process data
            $tgl_start = date_create($this->input->post('tgl_start'));
            $tgl_end = date_create($this->input->post('tgl_end'));
            $datediff = date_diff($tgl_end, $tgl_start);
            $count = $datediff->days;
            // -- end of process data

            $params = array(
               'id_kegiatan' => $this->input->post('id_kegiatan'),
               'nama_kegiatan' => $this->input->post('nama_kegiatan'),
               'tempat_kegiatan' => $this->input->post('tempat_kegiatan'),
               'tanggal_mulai' => $this->input->post('tanggal_mulai'),
               'tanggal_selesai' => $this->input->post('tanggal_selesai'),
               'kalender_st' => $this->input->post('kalender_st'),
               'mdb' => $this->com_user['user_id'],
               'mdd' => date('Y-m-d')
               );
            $where = array(
                'id_kegiatan' => $this->input->post('id_kegiatan')
                );
            // insert
            if ($this->m_kegiatan->update_kegiatan($params, $where)) {
                $this->tnotification->delete_last_field();
                $this->tnotification->sent_notification("success", "Data berhasil disimpan");
            } else {
                // default error
                $this->tnotification->sent_notification("error", "Data gagal disimpan");
            }
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Data gagal disimpan");
        }
        // default redirect
        redirect("kegiatan/kegiatan/edit/".$this->input->post('id_kegiatan'));
    }

    // process delete kalender
    function delete($params) {
        // set page rules
        $this->_set_page_rule("D");
        if ($this->m_kegiatan->delete_kegiatan($params)) {
            $this->tnotification->delete_last_field();
            $this->tnotification->sent_notification("success", "Data berhasil dihapus");
        } else {
            // default error
            $this->tnotification->sent_notification("error", "Data gagal dihapus");
        }

        redirect("kegiatan/kegiatan/");
    }

    // view as kalender
    function view() {
        // set page rules
        $this->_set_page_rule("R");
        // load js
        $this->smarty->load_javascript("resource/js/fullcalendar/lib/moment.min.js");
        $this->smarty->load_javascript("resource/js/fullcalendar/fullcalendar.min.js");
        $this->smarty->load_javascript("resource/js/fullcalendar/lang/id.js");
        $this->smarty->load_javascript("resource/js/jquery/jquery-ui-1.9.2.custom.min.js");
        // load css
        $this->smarty->load_style("jquery.ui/redmond/jquery-ui-1.8.13.custom.css");
        $this->smarty->load_style("fullcalendar/fullcalendar.css");
        $this->smarty->load_style("fullcalendar/fullcalendar.print.css", "print");
        // session
        $search = $this->tsession->userdata("search_kegiatan_view");
        $this->smarty->assign("search", $search);

        // set template content
        $this->smarty->assign("template_content", "kegiatan/kegiatan.html");

        $kegiatan = $this->m_kegiatan->get_all_active_periode();
        $id_kegiatan = (!empty($search['id_kegiatan'])) ? $search['id_kegiatan'] : $kegiatan['id_kegiatan'];

        // $periode = $this->m_periode->get_periode_by_kode($periode_kode);
        // $this->smarty->assign('periode_aktif', $periode);
        // $this->smarty->assign('rs_periode', $this->m_periode->get_all_periode());
        // $this->smarty->assign('rs_bulan', $this->m_kalender->get_months_year($periode['periode_kode']));
        // $this->smarty->assign('sekolah', $this->m_preference->get_sekolah());
        // $this->smarty->assign('periode', $this->m_periode->get_periode_by_kode($periode_kode));
        // $this->smarty->assign('image', $this->m_preference->get_preference_by_group_and_name(array('gambar', 'logo_grayscale')));


        // notification
        $this->tnotification->display_notification();
        $this->tnotification->display_last_field();
        // output
        parent::display();
    }


    function search_kegiatan(){
        // set page rules
        $this->_set_page_rule("R");
        //--
        if ($this->input->post('save') == 'Cari') {
            $params = array(
                "id_kegiatan" => $this->input->post('id_kegiatan')
                );
            // set
            $this->tsession->set_userdata('search_kegiatan_view', $params);
        } else {
            // unset
            $this->tsession->unset_userdata('search_kegiatan_view');
        }
        //--
        redirect('kegiatan/kegiatan/view');
    }

    // get json data for fullcalendar
    function get_json_data($id_kegiatan) {
        $result = $this->m_kegiatan->get_all_for_kegiatan($id_kegiatan);
        $arrResult = array();
        foreach ($result as $key => $rs) {
            $arrResult[$key] = array(
                'id' => $rs['id_kegiatan'],
                'title' => $rs['nama_kegiatan'],
                'start' => $rs['tanggal_mulai'],
                'end' => $rs['tanggal_selesai'],
                'editable' => false
                );
            switch ($rs['kalender_st']) {
                case 'kegiatan':
                $arrResult[$key]['className'] = '';
                break;
                case 'event':
                $arrResult[$key]['className'] = 'green';
                break;
                case 'libur':
                $arrResult[$key]['className'] = 'red';
                break;

                default:

                break;
            }
        }
        echo json_encode($arrResult);
    }

}


// <?php

// if (!defined('BASEPATH'))
// 	exit('No direct script access allowed');
// // load base class if needed
// require_once( APPPATH . 'controllers/base/OperatorBase.php' );

// class kegiatan extends ApplicationBase{

// 	function __construct(){
// 		parent::__construct();
// 		// load model
//         $this->load->model('kegiatan/m_kegiatan');
//         // load library
//         $this->load->library('tnotification');
//         // load library
//         $this->load->library('pagination');
// 	}

// 	function index() {
// 		/* PART 1 : mengatur rule halaman*/ 
// 		// set page rules
//         $this->_set_page_rule("R");

//         /* PART 2 : set view */
//         // set template content
//         $this->smarty->assign("template_content", "kegiatan/list.html");


//         /* PART 3 : load data from database */
//         $kegiatan = $this->m_kegiatan->get_all_kegiatan();
//         $this->smarty->assign("rs_id", $kegiatan); // view list.html akan mengenali data indikator1 dengan nama rs_id

//         /* PART 4 : notifikasi dan display view */

//         // notification
//         $this->tnotification->display_notification();
//         $this->tnotification->display_last_field();
//         // output
//         parent::display();

// 	}

// 	function add(){
//         $this->_set_page_rule("C");
//         $this->smarty->assign("template_content", "kegiatan/add.html");

//         // load js
//         $this->smarty->load_javascript('resource/js/moment/moment.js');
//         $this->smarty->load_javascript('resource/js/datetimepicker/bootstrap-datetimepicker.min.js');
//         // load css
//         $this->smarty->load_style('datetimepicker/bootstrap-datetimepicker.min.css');

//       // notification
//         $this->tnotification->display_notification();
//         $this->tnotification->display_last_field();
//         // output
//         parent::display();
//     }


//     function process_add(){
//         $this->_set_page_rule("C");

//         $this->tnotification->set_rules('id_kegiatan', 'Id', 'trim|required|max_length[5]');
//         $this->tnotification->set_rules('nama_kegiatan', 'Nama Kegiatan', 'trim|required|max_length[300]');
//         $this->tnotification->set_rules('tempat_kegiatan', 'Tempat Kegiatan', 'trim|required|max_length[300]');
//         $this->tnotification->set_rules('tanggal_mulai', 'Tanggal Mulai', 'trim|required');
//         $this->tnotification->set_rules('tanggal_selesai', 'Tanggal Selesai', 'trim|required');
//         $this->tnotification->set_rules('kalender_st', 'Kalender', 'trim|required');

//         if($this->tnotification->run() !== FALSE){
//             $params = array(
//                 'id_kegiatan' => $this->input->post('id_kegiatan'), 
//                 'nama_kegiatan' => $this->input->post('nama_kegiatan'),
//                 'tempat_kegiatan' => $this->input->post('tempat_kegiatan'),
//                 'tanggal_mulai' => $this->input->post('tanggal_mulai'),
//                 'tanggal_selesai' => $this->input->post('tanggal_selesai'),
//                 'kalender_st' => $this->input->post('kalender_st'),
//             );

//             if($this->m_kegiatan->insert_kegiatan($params)){

//                  // success
//                 $this->tnotification->delete_last_field();
//                 $this->tnotification->sent_notification("success", "Data berhasil disimpan");
//             }else{

//                 // default error
//                 $this->tnotification->sent_notification("error", "Data gagal disimpan");
//             }

//         }else{
//             // default error
//             $this->tnotification->sent_notification("error", "Data gagal disimpan");
//         }


//         redirect("kegiatan/kegiatan/add");

// 	}

//     function edit($params){
//         $this->_set_page_rule("U");
//         $this->smarty->assign("template_content", "kegiatan/edit.html");

//         $kegiatan = $this->m_kegiatan->get_one_kegiatan($params);
//         $this->smarty->assign("result", $kegiatan);

//         // notification
//         $this->tnotification->display_notification();
//         $this->tnotification->display_last_field();
//         // output
//         parent::display();
//     }

//      function process_edit(){
//         $this->_set_page_rule("U");

//         $this->tnotification->set_rules('id_kegiatan', 'Id', 'trim|required|max_length[5]');
//         $this->tnotification->set_rules('nama_kegiatan', 'Nama Kegiatan', 'trim|required|max_length[300]');
//         $this->tnotification->set_rules('tempat_kegiatan', 'Tempat Kegiatan', 'trim|required|max_length[300]');
//         $this->tnotification->set_rules('tanggal_mulai', 'Nama', 'trim|required|max_length');
//         $this->tnotification->set_rules('tanggal_selesai', 'Tanggal Mulai', 'trim|required');
//         $this->tnotification->set_rules('kalender_st', 'Tanggal Selesai', 'trim|required');

//         if($this->tnotification->run() !== FALSE){
//             $params = array(
//                  'kalender_st' => $this->input->post('kalender_st'),
//                  'tanggal_selesai' => $this->input->post('tanggal_selesai'),
//                  'tanggal_mulai' => $this->input->post('tanggal_mulai'),
//                  'tempat_kegiatan' => $this->input->post('tempat_kegiatan'),
//                  'nama_kegiatan' => $this->input->post('nama_kegiatan')
//             );

//             $where = array(
//                 'id_kegiatan' => $this->input->post('id_kegiatan')
//             );

//             if($this->m_kegiatan->update_kegiatan($params, $where)){

//                  // success
//                 $this->tnotification->delete_last_field();
//                 $this->tnotification->sent_notification("success", "Data berhasil disimpan");
//             }else{

//                 // default error
//                 $this->tnotification->sent_notification("error", "Data gagal disimpan");
//             }

//         }else{
//             // default error
//             $this->tnotification->sent_notification("error", "Data gagal disimpan");
//         }


//         redirect("kegiatan/kegiatan/edit/". $this->input->post('kode_kegiatan'));
//     }

//     function delete($params){
//         $this->_set_page_rule("D");

//         if($this->m_kegiatan->delete_kegiatan($params)){
//               // success
//                 $this->tnotification->delete_last_field();
//                 $this->tnotification->sent_notification("success", "Data berhasil dihapus");
//         }else{
//             $this->tnotification->sent_notification("error", "Data gagal dihapus");

//         }
//         redirect("kegiatan/kegiatan/");
//     }


// }