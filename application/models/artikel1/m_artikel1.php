<?php 

class m_artikel1 extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function get_all_artikel1(){
		$sql = "SELECT * FROM artikel1"; 	// perintah sql berbentuk string
		$query = $this->db->query($sql); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->result_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}


	function get_one_artikel1( $id ){
		$sql = "SELECT * FROM artikel1 WHERE artikel1 = ?"; 	// perintah sql berbentuk string
		$query = $this->db->query( $sql , $id); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->row_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}

	function insert_artikel1( $params ){
		$sql = "INSERT INTO artikel1 (artikel1) VALUES(?)";
		return $this->db->query($sql, $params);
	}

	function update_artikel1( $params ){
		$sql = "UPDATE artikel1 SET artikel1 = ?";
		return $this->db->query($sql, $params);
	}

	function delete_artikel1( $params ){
		$sql = "DELETE FROM artikel1 WHERE artikel1 = ?";
		return $this->db->query($sql, $params);
	}
}
