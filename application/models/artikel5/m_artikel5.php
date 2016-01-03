<?php 

class m_artikel5 extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function get_all_artikel5(){
		$sql = "SELECT * FROM artikel5"; 	// perintah sql berbentuk string
		$query = $this->db->query($sql); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->result_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}


	function get_one_artikel5( $id ){
		$sql = "SELECT * FROM artikel5 WHERE artikel5 = ?"; 	// perintah sql berbentuk string
		$query = $this->db->query( $sql , $id); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->row_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}

	function insert_artikel5( $params ){
		$sql = "INSERT INTO artikel5 (artikel5) VALUES(?)";
		return $this->db->query($sql, $params);
	}

	function update_artikel5( $params ){
		$sql = "UPDATE artikel5 SET artikel5 = ?";
		return $this->db->query($sql, $params);
	}

	function delete_artikel5( $params ){
		$sql = "DELETE FROM artikel5 WHERE artikel5 = ?";
		return $this->db->query($sql, $params);
	}
}
