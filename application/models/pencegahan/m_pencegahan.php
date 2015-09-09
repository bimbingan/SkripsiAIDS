<?php 

class m_pencegahan extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function get_all_pencegahan(){
		$sql = "SELECT * FROM pencegahan"; 	// perintah sql berbentuk string
		$query = $this->db->query($sql); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->result_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}


	function get_one_pencegahan( $id ){
		$sql = "SELECT * FROM pencegahan WHERE pencegahan = ?"; 	// perintah sql berbentuk string
		$query = $this->db->query( $sql , $id); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->row_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}

	function insert_pencegahan( $params ){
		$sql = "INSERT INTO pencegahan (pencegahan) VALUES(?)";
		return $this->db->query($sql, $params);
	}

	function update_pencegahan( $params ){
		$sql = "UPDATE pencegahan SET pencegahan = ?";
		return $this->db->query($sql, $params);
	}

	function delete_pencegahan( $params ){
		$sql = "DELETE FROM pencegahan WHERE pencegahan = ?";
		return $this->db->query($sql, $params);
	}
}
