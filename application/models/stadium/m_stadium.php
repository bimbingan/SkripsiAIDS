<?php 

class m_stadium extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function get_all_stadium(){
		$sql = "SELECT * FROM stadium"; 	// perintah sql berbentuk string
		$query = $this->db->query($sql); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->result_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}


	function get_one_stadium( $id ){
		$sql = "SELECT * FROM stadium WHERE kode_stadium = ?"; 	// perintah sql berbentuk string
		$query = $this->db->query( $sql , $id); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->row_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}

	function insert_stadium( $params ){
		$sql = "INSERT INTO stadium (nama_stadium, ket_stadium) VALUES(?,?)";
		return $this->db->query($sql, $params);
	}

	function update_stadium( $params ){
		$sql = "UPDATE stadium SET nama_stadium = ?, ket_stadium = ? WHERE kode_stadium = ?";
		return $this->db->query($sql, $params);
	}

	function delete_stadium( $params ){
		$sql = "DELETE FROM stadium WHERE kode_stadium = ?";
		return $this->db->query($sql, $params);
	}
}
