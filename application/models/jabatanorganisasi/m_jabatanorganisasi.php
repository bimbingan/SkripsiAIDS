<?php 

class m_jabatanorganisasi extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function get_all_jabatanorganisasi(){
		$sql = "SELECT * FROM jabatanorganisasi"; 	// perintah sql berbentuk string
		$query = $this->db->query($sql); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->result_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}


	function get_one_jabatanorganisasi( $id ){
		$sql = "SELECT * FROM jabatanorganisasi WHERE id_jabatan = ?"; 	// perintah sql berbentuk string
		$query = $this->db->query( $sql , $id); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->row_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}

	function insert_jabatanorganisasi( $params ){
		return $this->db->insert('jabatanorganisasi', $params);
	}
	function update_jabatanorganisasi( $params, $where ){
		return $this->db->update('jabatanorganisasi', $params, $where);
	}

	function delete_jabatanorganisasi( $params ){
		$sql = "DELETE FROM jabatanorganisasi WHERE id_jabatan = ?";
		return $this->db->query($sql, $params);
	}
}
