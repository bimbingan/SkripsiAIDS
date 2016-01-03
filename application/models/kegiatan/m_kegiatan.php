<?php

class m_kegiatan extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // get list kalender
    function get_list_kegiatan($params) {
       $sql = "SELECT * FROM kegiatan";

        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_all_kegiatan($params) {
       $sql = "SELECT * FROM kegiatan";

        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_total_kegiatan($params) {
       $sql = "SELECT COUNT(*) as 'total' FROM kegiatan";

        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result['total'];
        } else {
            return array();
        }
    }

	function get_kegiatan_by_id( $id ){
		$sql = "SELECT * FROM kegiatan WHERE id_kegiatan = ?"; 	// perintah sql berbentuk string
		$query = $this->db->query( $sql , $id); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->row_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}

	function insert_kegiatan( $params ){
		return $this->db->insert('kegiatan', $params);
	}
	function update_kegiatan( $params, $where ){
		return $this->db->update('kegiatan', $params, $where);
	}

	function delete_kegiatan( $params ){
		$sql = "DELETE FROM kegiatan WHERE id_kegiatan = ?";
		return $this->db->query($sql, $params);
	}
}