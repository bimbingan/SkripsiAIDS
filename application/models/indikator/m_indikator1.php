<?php 

class m_indikator1 extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function get_all_indikator1(){
		$sql = "SELECT * FROM indikator1 LIMIT 8"; 	// perintah sql berbentuk string
		$query = $this->db->query($sql); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->result_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}


	function get_one_indikator1( $id ){
		$sql = "SELECT * FROM indikator1 WHERE kode_indikator1 = ?"; 	// perintah sql berbentuk string
		$query = $this->db->query( $sql , $id); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->row_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}

	function insert_indikator1( $params ){
		return $this->db->insert('indikator1', $params);
	}

	function update_indikator1( $params, $where ){
		return $this->db->update('indikator1', $params, $where);
	}

	function delete_indikator1( $params ){
		$sql = "DELETE FROM indikator1 WHERE kode_indikator1 = ?";
		return $this->db->query($sql, $params);
	}
}
