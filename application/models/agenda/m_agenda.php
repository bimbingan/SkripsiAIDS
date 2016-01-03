<?php 

class m_agenda extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function get_all_agenda(){
		$sql = "SELECT * FROM agenda"; 	// perintah sql berbentuk string
		$query = $this->db->query($sql); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->result_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}


	function get_one_agenda( $id ){
		$sql = "SELECT * FROM agenda WHERE agenda = ?"; 	// perintah sql berbentuk string
		$query = $this->db->query( $sql , $id); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->row_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}

	function insert_agenda( $params ){
		$sql = "INSERT INTO agenda (agenda) VALUES(?)";
		return $this->db->query($sql, $params);
	}

	function update_agenda( $params ){
		$sql = "UPDATE agenda SET agenda = ?";
		return $this->db->query($sql, $params);
	}

	function delete_agenda( $params ){
		$sql = "DELETE FROM agenda WHERE agenda = ?";
		return $this->db->query($sql, $params);
	}
}
