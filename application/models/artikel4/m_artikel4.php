<?php 

class m_artikel4 extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function get_all_artikel4(){
		$sql = "SELECT * FROM artikel4"; 	// perintah sql berbentuk string
		$query = $this->db->query($sql); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->result_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}


	function get_one_artikel4( $id ){
		$sql = "SELECT * FROM artikel4 WHERE artikel4 = ?"; 	// perintah sql berbentuk string
		$query = $this->db->query( $sql , $id); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->row_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}

	function insert_artikel4( $params ){
		$sql = "INSERT INTO artikel4 (artikel4) VALUES(?)";
		return $this->db->query($sql, $params);
	}

	function update_artikel4( $params ){
		$sql = "UPDATE artikel4 SET artikel4 = ?";
		return $this->db->query($sql, $params);
	}

	function delete_artikel4( $params ){
		$sql = "DELETE FROM artikel4 WHERE artikel4 = ?";
		return $this->db->query($sql, $params);
	}
}
