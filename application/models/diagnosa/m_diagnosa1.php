<?php 

class m_diagnosa1 extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function get_all_diagnosa1(){
		$sql = "SELECT * FROM diagnosa1"; 	// perintah sql berbentuk string
		$query = $this->db->query($sql); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->result_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}


	function get_one_diagnosa1( $id ){
		$sql = "SELECT * FROM diagnosa1 WHERE kode_diagnosa1 = ?"; 	// perintah sql berbentuk string
		$query = $this->db->query( $sql , $id); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->row_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}

	function get_mb($params){
		$sql = "SELECT mb FROM diagnosa1 WHERE kode_indikator1 = ? AND kode_solusi = ?";
		$query = $this->db->query( $sql , $params); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->row_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result['mb'];					// setelah itu kita kembalikan hasil var result
		}else{
			return NULL;					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}	
	}

	function get_md($params){
		$sql = "SELECT md FROM diagnosa1 WHERE kode_indikator1 = ? AND kode_solusi = ?";
		$query = $this->db->query( $sql , $params);
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->row_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result['md'];					// setelah itu kita kembalikan hasil var result
		}else{
			return NULL;					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}	
	}

	function insert_diagnosa1( $params ){
		return $this->db->insert('diagnosa1', $params);
	}

	function update_diagnosa1( $params, $where ){
		return $this->db->update('diagnosa1', $params, $where);
	}

	function delete_diagnosa1( $params ){
		$sql = "DELETE FROM diagnosa1 WHERE kode_diagnosa1 = ?";
		return $this->db->query($sql, $params);
	}
}
