<?php 

class m_diagnosa2 extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function get_all_diagnosa2(){
		$sql = "SELECT * FROM diagnosa2"; 	// perintah sql berbentuk string
		$query = $this->db->query($sql); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->result_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}


	function get_one_diagnosa2( $id ){
		$sql = "SELECT * FROM diagnosa2 WHERE kode_diagnosa2 = ?"; 	// perintah sql berbentuk string
		$query = $this->db->query( $sql , $id); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->row_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}

	function insert_diagnosa2( $params ){
		return $this->db->insert('diagnosa2', $params);
	}

	function update_diagnosa2( $params, $where ){
		return $this->db->update('diagnosa2', $params, $where);
	}

	function delete_diagnosa2( $params ){
		$sql = "DELETE FROM diagnosa2 WHERE kode_diagnosa2 = ?";
		return $this->db->query($sql, $params);
	}
}
