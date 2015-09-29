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
        $this->load->model('solusi/m_solusi1');
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
        $this->smarty->assign("rs_indikator1", $rs_indikator1);
        $this->smarty->assign("no", 1);
        parent::display("guest/pertanyaan/index.html");
    }

    function indikator1_process(){
        $rs_indikator1 = $this->m_indikator1->get_all_indikator1();
        
        $jawaban =  array();
        $solusi = array_column($this->m_solusi1->get_all_solusi1(), 'kode_solusi1');
        $kode_indikator1 = array();
        foreach ($rs_indikator1 as $key => $indikator1) {
            if( $this->input->post('indikator1_jawab'.$indikator1['kode_indikator1']) == "1"){
                $jawaban[] = $this->input->post('indikator1_jawab'.$indikator1['kode_indikator1']); 
                $kode_indikator1[] = $indikator1['kode_indikator1']; 
            }
        }


        for($i=0;$i<3;$i++){
            $mb1 = 0.0;
            $mb2 = 0.0;
            $mb_hasil = 0.0;
            $cf = 0;
            foreach($jawaban as $key => $jawab){
                if($key == count($jawaban)){
                    continue;
                }
                $params = array($kode_indikator1[$key], $solusi[$i]);

                $mb1 = ($key == 0) ? $this->m_diagnosa1->get_mb($params) : $mb_hasil;
                
                $params = array($kode_indikator1[$key+1], $solusi[$i]);
                
                $mb2 = $this->m_diagnosa1->get_mb($params);

                $mb_hasil = $mb1 + ($mb2 * ( 1 - $mb1 ));
                echo (float) ( 1 - (float) $mb1 );
                die();
            }           

        }
        

        echo "<pre>";
        
        print_r($solusi);
        print_r($jawaban);
        print_r($kode_indikator1);
        die();
    }


}
