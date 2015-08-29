<?php 

class m_pencegahanprimer extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function get_all_pencegahanprimer(){
		$sql = "SELECT * FROM pencegahanprimer"; 	// perintah sql berbentuk string
		$query = $this->db->query($sql); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->result_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}


	function get_one_pencegahanprimer( $id ){
		$sql = "SELECT * FROM pencegahanprimer WHERE kode_pencegahanprimer = ?"; 	// perintah sql berbentuk string
		$query = $this->db->query( $sql , $id); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->row_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}

	function insert_pencegahanprimer( $params ){
		return $this->db->insert('pencegahanprimer', $params);
	}

	function update_pencegahanprimer( $params, $where ){
		return $this->db->update('pencegahanprimer', $params, $where);
	}

	function delete_pencegahanprimer( $params ){
		$sql = "DELETE FROM pencegahanprimer WHERE kode_pencegahanprimer = ?";
		return $this->db->query($sql, $params);
	}
}
