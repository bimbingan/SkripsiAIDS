<?php

if (!defined('BASEPATH'))
exit('No direct script access allowed');
// load base class if needed
require_once( APPPATH . 'controllers/base/GuestBase.php' );

class guest extends ApplicationBase{

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
        $result_tentang_aids = $this->m_preference->get_preference_by_id("81");
        $result_tentang_kpa = $this->m_preference->get_preference_by_id("82");
        $result_tentang_arv = $this->m_preference->get_preference_by_id("83");
        $result_vctcst = $this->m_preference->get_preference_by_id("84");
        $result_pencegahan = $this->m_preference->get_preference_by_id("85");

        $this->smarty->assign("result_tentang_aids", $result_tentang_aids); // view list.html akan mengenali data indikator1 dengan nama rs_id
        $this->smarty->assign("result_tentang_kpa", $result_tentang_kpa);
        $this->smarty->assign("result_tentang_arv", $result_tentang_arv); // view list.html akan mengenali data indikator1 dengan nama rs_id
        $this->smarty->assign("result_vctcst", $result_vctcst);
        $this->smarty->assign("result_pencegahan", $result_pencegahan);

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
