<?php 

class m_solusi2 extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function get_all_solusi2(){
		$sql = "SELECT * FROM solusi2"; 	// perintah sql berbentuk string
		$query = $this->db->query($sql); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->result_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}


	function get_one_solusi2( $id ){
		$sql = "SELECT * FROM solusi2 WHERE kode_solusi2 = ?"; 	// perintah sql berbentuk string
		$query = $this->db->query( $sql , $id); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->row_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}

	function insert_solusi2( $params ){
		$sql = "INSERT INTO solusi2 (ket_solusi2) VALUES(?)";
		return $this->db->query($sql, $params);
	}

	function update_solusi2( $params ){
		$sql = "UPDATE solusi2 SET ket_solusi2 = ? WHERE kode_solusi2 = ?";
		return $this->db->query($sql, $params);
	}

	function delete_solusi2( $params ){
		$sql = "DELETE FROM solusi2 WHERE kode_solusi2 = ?";
		return $this->db->query($sql, $params);
	}
}