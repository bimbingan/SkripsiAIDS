<?php 

class m_pencegahankhusus extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function get_all_pencegahankhusus(){
		$sql = "SELECT * FROM pencegahankhusus"; 	// perintah sql berbentuk string
		$query = $this->db->query($sql); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->result_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}


	function get_one_pencegahankhusus( $id ){
		$sql = "SELECT * FROM pencegahankhusus WHERE kode_pencegahankhusus = ?"; 	// perintah sql berbentuk string
		$query = $this->db->query( $sql , $id); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->row_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}

	function insert_pencegahankhusus( $params ){
		$sql = "INSERT INTO pencegahankhusus (pencegahan_khusus) VALUES(?)";
		return $this->db->query($sql, $params);
	}

	function update_indikator1( $params ){
		$sql = "UPDATE pencegahankhusus SET pencegahan_khusus = ? WHERE kode_pencegahankhusus = ?";
		return $this->db->query($sql, $params);
	}

	function delete_pencegahankhusus( $params ){
		$sql = "DELETE FROM pencegahankhusus WHERE kode_pencegahankhusus = ?";
		return $this->db->query($sql, $params);
	}
}