<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/GuestBase.php' );

class welcome extends ApplicationBase{

    public function __construct(){
        parent::__construct();
        // load model
        $this->load->model('pengaturan/m_preference');
        $this->load->model('diagnosa/m_diagnosa1');
        $this->load->model('diagnosa/m_diagnosa2');
        $this->load->model('indikator/m_indikator1');
        $this->load->model('indikator/m_indikator2');
        $this->load->model('solusi/m_solusi');
        $this->load->model('stadium/m_stadium');
    }

    function index(){
        $this->smarty->assign('template_content', "page/home.html");
        parent::display();
    }

    function visimisi(){
        $visimisi = $this->m_preference->get_preference_by_group_and_name(array('deskripsi', 'visimisi'));
        $this->smarty->assign('template_content', "guest/info/index.html");
        $this->smarty->assign('info', $visimisi[0]);
        parent::display();
    }

    function kebijakan(){
        $kebijakan = $this->m_preference->get_preference_by_group_and_name(array('deskripsi', 'kebijakan'));
        $this->smarty->assign('template_content', "guest/info/index.html");
        $this->smarty->assign('info', $kebijakan[0]);
        parent::display();
    }

    function strukturorganisasi(){
        $this->load->model('strukturorganisasi/m_strukturorganisasi');
        $this->load->model('jabatanorganisasi/m_jabatanorganisasi');
        $strukturorganisasi = array();
        $jabatan = $this->m_jabatanorganisasi->get_all_jabatanorganisasi();
        foreach ($jabatan as $key => $jab) {
            $jabatan[$key]['anggota'] = $this->m_strukturorganisasi->get_struktur_by_jabatan($jab);
        }

        $this->smarty->load_javascript('resource/js/raphael/raphael.js');
        $this->smarty->load_javascript('resource/js/treant/treant.min.js');

        $this->smarty->load_style('treant/treant.css');
        $this->smarty->assign('template_content', "guest/strukturorganisasi/index.html");
        $this->smarty->assign('jabatan', $jabatan);
        parent::display();
    }

    function kpa(){
        $kpa = $this->m_preference->get_preference_by_group_and_name(array('deskripsi', 'kpa'));
        $this->smarty->assign('template_content', "guest/info/index.html");
        $this->smarty->assign('info', $kpa[0]);
        parent::display();
    }

    function aids(){
        $aids = $this->m_preference->get_preference_by_group_and_name(array('deskripsi', 'aids'));
        $this->smarty->assign('template_content', "guest/info/index.html");
        $this->smarty->assign('info', $aids[0]);
        parent::display();
    }

    function pencegahan(){
        $pencegahan = $this->m_preference->get_preference_by_group_and_name(array('deskripsi', 'pencegahan'));
        $this->smarty->assign('template_content', "guest/info/index.html");
        $this->smarty->assign('info', $pencegahan[0]);
        parent::display();
    }

    function arv(){
        $arv = $this->m_preference->get_preference_by_group_and_name(array('deskripsi', 'arv'));
        $this->smarty->assign('template_content', "guest/info/index.html");
        $this->smarty->assign('info', $arv[0]);
        parent::display();
    }

    function vctcst(){
        $vctcst = $this->m_preference->get_preference_by_group_and_name(array('deskripsi', 'vctcst'));
        $this->smarty->assign('template_content', "guest/info/index.html");
        $this->smarty->assign('info', $vctcst[0]);
        parent::display();
    }

    function agenda(){
        $agenda = $this->m_preference->get_preference_by_group_and_name(array('deskripsi', 'agenda'));
        $this->smarty->assign('template_content', "guest/info/index.html");
        $this->smarty->assign('info', $agenda[0]);
        parent::display();
    }

    function kegiatan(){
        $this->load->model('kegiatan/m_kegiatan');
        $this->smarty->load_javascript('resource/js/fullcalendar/lib/moment.min.js');
        $this->smarty->load_javascript('resource/js/fullcalendar/fullcalendar.min.js');
        $this->smarty->load_javascript('resource/js/fullcalendar/lang/id.js');
        
        $this->smarty->load_style('fullcalendar/fullcalendar.css');
        $this->smarty->load_style('fullcalendar/fullcalendar.print.css', 'print');

        $kegiatan = $this->m_kegiatan->get_all_kegiatan();

        $this->smarty->assign('template_content', "guest/kegiatan/index.html");
        $this->smarty->assign('kegiatan', $kegiatan);
        parent::display();
    }

    function artikel1(){
        $artikel1 = $this->m_preference->get_preference_by_group_and_name(array('deskripsi', 'artikel1'));
        $this->smarty->assign('template_content', "guest/info/index.html");
        $this->smarty->assign('info', $artikel1[0]);
        parent::display();
    }

    function artikel2(){
        $artikel2 = $this->m_preference->get_preference_by_group_and_name(array('deskripsi', 'artikel2'));
        $this->smarty->assign('template_content', "guest/info/index.html");
        $this->smarty->assign('info', $artikel2[0]);
        parent::display();
    }

    function artikel3(){
        $artikel3 = $this->m_preference->get_preference_by_group_and_name(array('deskripsi', 'artikel3'));
        $this->smarty->assign('template_content', "guest/info/index.html");
        $this->smarty->assign('info', $artikel3[0]);
        parent::display();
    }

    function artikel4(){
        $artikel4 = $this->m_preference->get_preference_by_group_and_name(array('deskripsi', 'artikel4'));
        $this->smarty->assign('template_content', "guest/info/index.html");
        $this->smarty->assign('info', $artikel4[0]);
        parent::display();
    }

    function artikel5(){
        $artikel5 = $this->m_preference->get_preference_by_group_and_name(array('deskripsi', 'artikel5'));
        $this->smarty->assign('template_content', "guest/info/index.html");
        $this->smarty->assign('info', $artikel5[0]);
        parent::display();
    }

    function artikel6(){
        $artikel6 = $this->m_preference->get_preference_by_group_and_name(array('deskripsi', 'artikel6'));
        $this->smarty->assign('template_content', "guest/info/index.html");
        $this->smarty->assign('info', $artikel6[0]);
        parent::display();
    }

    function mitosaids(){
        $mitosaids = $this->m_preference->get_preference_by_group_and_name(array('deskripsi', 'mitosaids'));
        $this->smarty->assign('template_content', "guest/info/index.html");
        $this->smarty->assign('info', $mitosaids[0]);
        parent::display();
    }

    function pengidaphiv(){
        $pengidaphiv = $this->m_preference->get_preference_by_group_and_name(array('deskripsi', 'pengidaphiv'));
        $this->smarty->assign('template_content', "guest/info/index.html");
        $this->smarty->assign('info', $pengidaphiv[0]);
        parent::display();
    }

    function pertanyaan(){
        $rs_indikator1 = $this->m_indikator1->get_all_indikator1();
        // load javascript
        $this->smarty->load_javascript("resource/js/jquery/jquery.min.js");
        // load style
        $this->smarty->load_style("guest/test/test.css");
        $this->smarty->assign("rs_indikator1", $rs_indikator1);
        $this->smarty->assign("no", 1);
        parent::display("guest/pertanyaan/index.html");
    }

    function indikator1_process(){
        $rs_indikator1 = $this->m_indikator1->get_all_indikator1();

        $jawaban =  array();
        $this->smarty->load_style("guest/test/test.css");
        $solusi = array_column($this->m_solusi->get_all_solusi(), 'kode_solusi');
        $kode_indikator1 = array();
        foreach ($rs_indikator1 as $key => $indikator1) {
            if( $this->input->post('indikator1_jawab'.$indikator1['kode_indikator1']) == "1"){
                $jawaban[] = $this->input->post('indikator1_jawab'.$indikator1['kode_indikator1']);
                $kode_indikator1[] = $indikator1['kode_indikator1'];
            }
        }
        
        $mb_hasil = array();
        $md_hasil = array();
        $cf = array();
        for($i=0;$i<3;$i++){
            $mb1 = 0.0;
            $mb2 = 0.0;
            $md1 = 0.0;
            $md2 = 0.0;

            foreach($jawaban as $key => $jawab){

                if($key == count($jawaban)){
                    continue;
                }

                $params = array($kode_indikator1[$key], $solusi[$i]);
                $mb1 = ($key == 0) ? $this->m_diagnosa1->get_mb($params) : $mb_hasil[$i];
                $md1 = ($key == 0) ? $this->m_diagnosa1->get_md($params) : $md_hasil[$i];

                $params = ($key == 0) ? array($kode_indikator1[$key+1], $solusi[$i]) : array($kode_indikator1[$key], $solusi[$i]) ;
                

                $mb2 = $this->m_diagnosa1->get_mb($params);
                $md2 = $this->m_diagnosa1->get_md($params);


                $mb_hasil[$i] = $mb1 + ($mb2 * ( 1 - $mb1 ));
                $md_hasil[$i] = $md1 + ($md2 * ( 1 - $md1 ));
                
                $cf[$i] = $mb_hasil[$i] - $md_hasil[$i];
            }

        }

        $max = array_keys($cf, max($cf));

        $solusi = $this->m_solusi->get_all_solusi();

        $hasil_solusi = $solusi[$max[0]];

        $this->smarty->assign("solusi", $hasil_solusi);
        $this->smarty->assign("cf", $cf);
        $this->smarty->assign("max", $max);
        $this->smarty->assign("mb", $mb_hasil);
        $this->smarty->assign("md", $md_hasil);

        parent::display("guest/hasil/index.html");

    }

    function diagnosa(){
        $rs_indikator2 = $this->m_indikator2->get_all_indikator2();
        $this->smarty->load_javascript("resource/js/jquery/jquery.min.js");
        // load style
        $this->smarty->load_style("guest/test/test.css");
        $this->smarty->assign("rs_indikator2", $rs_indikator2);
        $this->smarty->assign("no", 1);
        parent::display("guest/diagnosa/index.html");
    }

    function indikator2_process(){
        $rs_indikator2 = $this->m_indikator2->get_all_indikator2();

        $jawaban =  array();
        $this->smarty->load_style("guest/test/test.css");
        $stadium = array_column($this->m_stadium->get_all_stadium(), 'kode_stadium');
        $kode_indikator2 = array();
        foreach ($rs_indikator2 as $key => $indikator2) {
            if( $this->input->post('indikator2_jawab'.$indikator2['kode_indikator2']) == "1"){
                $jawaban[] = $this->input->post('indikator2_jawab'.$indikator2['kode_indikator2']);
                $kode_indikator2[] = $indikator2['kode_indikator2'];
            }
        }


        $mb_hasil = array();
        $md_hasil = array();
        $cf = array();
        for($i=0;$i<4;$i++){
            $mb1 = 0.0;
            $mb2 = 0.0;
            $md1 = 0.0;
            $md2 = 0.0;

            foreach($jawaban as $key => $jawab){

                if($key == count($jawaban)){
                    continue;
                }

                $params = array($kode_indikator2[$key], $stadium[$i]);
                $mb1 = ($key == 0) ? $this->m_diagnosa2->get_mb($params) : $mb_hasil[$i];
                $md1 = ($key == 0) ? $this->m_diagnosa2->get_md($params) : $md_hasil[$i];

                $params = ($key == 0) ? array($kode_indikator2[$key+1], $solusi[$i]) : array($kode_indikator2[$key], $stadium[$i]) ;
                

                $mb2 = $this->m_diagnosa2->get_mb($params);
                $md2 = $this->m_diagnosa2->get_md($params);


                $mb_hasil[$i] = $mb1 + ($mb2 * ( 1 - $mb1 ));
                $md_hasil[$i] = $md1 + ($md2 * ( 1 - $md1 ));
                
                $cf[$i] = $mb_hasil[$i] - $md_hasil[$i];
            }

        }

        $max = array_keys($cf, max($cf));

        $stadium = $this->m_stadium->get_all_stadium();

        $hasil_stadium = $stadium[$max[0]];

        $this->smarty->assign('stadium', $hasil_stadium);
        parent::display("guest/hasil/diagnosa.html");

    }
}
