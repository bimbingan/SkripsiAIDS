<?php 

class m_indikator1 extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function get_all_indikator1(){
		$sql = "SELECT * FROM indikator1"; 	// perintah sql berbentuk string
		$query = $this->db->query($sql); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->result_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}


	function get_one_indikator1( $id ){
		$sql = "SELECT * FROM indikator1 WHERE kode_indikator1 = ?"; 	// perintah sql berbentuk string
		$query = $this->db->query( $sql , $id); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->row_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}

	function insert_indikator1( $params ){
		$sql = "INSERT INTO indikator1 (ket_indikator1) VALUES(?)";
		return $this->db->query($sql, $params);
	}

	function update_indikator1( $params ){
		$sql = "UPDATE indikator1 SET ket_indikator1 = ? WHERE kode_indikator1 = ?";
		return $this->db->query($sql, $params);
	}

	function delete_indikator1( $params ){
		$sql = "DELETE FROM indikator1 WHERE kode_indikator1 = ?";
		return $this->db->query($sql, $params);
	}
}
