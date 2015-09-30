<?php 

class m_solusi extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function get_all_solusi(){
		$sql = "SELECT * FROM solusi"; 	// perintah sql berbentuk string
		$query = $this->db->query($sql); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->result_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}


	function get_one_solusi( $id ){
		$sql = "SELECT * FROM solusi WHERE kode_solusi = ?"; 	// perintah sql berbentuk string
		$query = $this->db->query( $sql , $id); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->row_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}

	function insert_solusi( $params ){
		return $this->db->insert('solusi', $params);
	}
	function update_solusi( $params, $where ){
		return $this->db->update('solusi', $params, $where);
	}

	function delete_solusi( $params ){
		$sql = "DELETE FROM solusi WHERE kode_solusi = ?";
		return $this->db->query($sql, $params);
	}
}
