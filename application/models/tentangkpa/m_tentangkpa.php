<?php 

class m_tentangkpa extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function get_all_tentangkpa(){
		$sql = "SELECT * FROM tentangkpa"; 	// perintah sql berbentuk string
		$query = $this->db->query($sql); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->result_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}


	function get_one_tentangkpa( $id ){
		$sql = "SELECT * FROM tentangkpa WHERE tentangkpa = ?"; 	// perintah sql berbentuk string
		$query = $this->db->query( $sql , $id); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->row_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}

	function insert_tentangkpa( $params ){
		$sql = "INSERT INTO tentangkpa (tentang_kpa) VALUES(?)";
		return $this->db->query($sql, $params);
	}

	function update_tentangkpa( $params ){
		$sql = "UPDATE tentangkpa SET tentang_kpa = ?";
		return $this->db->query($sql, $params);
	}

	function delete_tentangkpa( $params ){
		$sql = "DELETE FROM tentangkpa WHERE tentang_kpa = ?";
		return $this->db->query($sql, $params);
	}
}
