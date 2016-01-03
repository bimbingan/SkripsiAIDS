<?php 

class m_artikel2 extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function get_all_artikel2(){
		$sql = "SELECT * FROM artikel2"; 	// perintah sql berbentuk string
		$query = $this->db->query($sql); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->result_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}


	function get_one_artikel2( $id ){
		$sql = "SELECT * FROM artikel2 WHERE artikel2 = ?"; 	// perintah sql berbentuk string
		$query = $this->db->query( $sql , $id); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->row_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}

	function insert_artikel2( $params ){
		$sql = "INSERT INTO artikel2 (artikel2) VALUES(?)";
		return $this->db->query($sql, $params);
	}

	function update_artikel2( $params ){
		$sql = "UPDATE artikel2 SET artikel2 = ?";
		return $this->db->query($sql, $params);
	}

	function delete_artikel2( $params ){
		$sql = "DELETE FROM artikel2 WHERE artikel2 = ?";
		return $this->db->query($sql, $params);
	}
}
