<?php 

class m_pengidaphiv extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function get_all_pengidaphiv(){
		$sql = "SELECT * FROM pengidaphiv"; 	// perintah sql berbentuk string
		$query = $this->db->query($sql); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->result_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}


	function get_one_pengidaphiv( $id ){
		$sql = "SELECT * FROM pengidaphiv WHERE pengidaphiv = ?"; 	// perintah sql berbentuk string
		$query = $this->db->query( $sql , $id); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->row_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}

	function insert_pengidaphiv( $params ){
		$sql = "INSERT INTO pengidaphiv (pengidaphiv) VALUES(?)";
		return $this->db->query($sql, $params);
	}

	function update_pengidaphiv( $params ){
		$sql = "UPDATE pengidaphiv SET pengidaphiv = ?";
		return $this->db->query($sql, $params);
	}

	function delete_pengidaphiv( $params ){
		$sql = "DELETE FROM pengidaphiv WHERE pengidaphiv = ?";
		return $this->db->query($sql, $params);
	}
}
