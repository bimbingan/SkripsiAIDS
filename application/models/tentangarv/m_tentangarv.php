<?php 

class m_tentangarv extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function get_all_tentangarv(){
		$sql = "SELECT * FROM tentangarv"; 	// perintah sql berbentuk string
		$query = $this->db->query($sql); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->result_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}


	function get_one_tentangarv( $id ){
		$sql = "SELECT * FROM tentangarv WHERE tentang_arv = ?"; 	// perintah sql berbentuk string
		$query = $this->db->query( $sql , $id); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->row_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}

	function insert_tentangarv( $params ){
		$sql = "INSERT INTO tentangarv (tentang_arv) VALUES(?)";
		return $this->db->query($sql, $params);
	}

	function update_tentangarv( $params ){
		$sql = "UPDATE tentangarv SET tentang_arv = ?";
		return $this->db->query($sql, $params);
	}

	function delete_tentangarv( $params ){
		$sql = "DELETE FROM tentangarv WHERE tentang_arv = ?";
		return $this->db->query($sql, $params);
	}
}
