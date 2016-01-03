<?php 

class m_kebijakan extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function get_all_kebijakan(){
		$sql = "SELECT * FROM kebijakan"; 	// perintah sql berbentuk string
		$query = $this->db->query($sql); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->result_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}


	function get_one_kebijakan( $id ){
		$sql = "SELECT * FROM kebijakan WHERE kebijakan = ?"; 	// perintah sql berbentuk string
		$query = $this->db->query( $sql , $id); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->row_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}

	function insert_kebijakan( $params ){
		$sql = "INSERT INTO kebijakan (kebijakan) VALUES(?)";
		return $this->db->query($sql, $params);
	}

	function update_kebijakan( $params ){
		$sql = "UPDATE kebijakan SET kebijakan = ?";
		return $this->db->query($sql, $params);
	}

	function delete_kebijakan( $params ){
		$sql = "DELETE FROM kebijakan WHERE kebijakan = ?";
		return $this->db->query($sql, $params);
	}
}
