<?php 

class m_mitosaids extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function get_all_mitosaids(){
		$sql = "SELECT * FROM mitosaids"; 	// perintah sql berbentuk string
		$query = $this->db->query($sql); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->result_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}


	function get_one_mitosaids( $id ){
		$sql = "SELECT * FROM mitosaids WHERE mitosaids = ?"; 	// perintah sql berbentuk string
		$query = $this->db->query( $sql , $id); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->row_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}

	function insert_mitosaids( $params ){
		$sql = "INSERT INTO mitosaids (mitosaids) VALUES(?)";
		return $this->db->query($sql, $params);
	}

	function update_mitosaids( $params ){
		$sql = "UPDATE mitosaids SET mitosaids = ?";
		return $this->db->query($sql, $params);
	}

	function delete_mitosaids( $params ){
		$sql = "DELETE FROM mitosaids WHERE mitosaids = ?";
		return $this->db->query($sql, $params);
	}
}
