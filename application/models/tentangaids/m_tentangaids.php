<?php 

class m_tentangaids extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function get_all_tentangaids(){
		$sql = "SELECT * FROM tentangaids"; 	// perintah sql berbentuk string
		$query = $this->db->query($sql); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->result_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}


	function get_one_tentangaids( $id ){
		$sql = "SELECT * FROM tentangaids WHERE tentang_aids = ?"; 	// perintah sql berbentuk string
		$query = $this->db->query( $sql , $id); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->row_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}

	function insert_tentangaids( $params ){
		$sql = "INSERT INTO tentangaids (tentang_aids) VALUES(?)";
		return $this->db->query($sql, $params);
	}

	function update_tentangaids( $params ){
		$sql = "UPDATE tentangaids SET tentang_aids = ?";
		return $this->db->query($sql, $params);
	}

	function delete_tentangaids( $params ){
		$sql = "DELETE FROM tentangaids WHERE tentang_aids = ?";
		return $this->db->query($sql, $params);
	}
}
