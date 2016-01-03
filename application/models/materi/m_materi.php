<?php 

class m_materi extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function get_all_materi(){
		$sql = "SELECT * FROM materi"; 	// perintah sql berbentuk string
		$query = $this->db->query($sql); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->result_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}


	function get_one_materi( $id ){
		$sql = "SELECT * FROM materi WHERE id_materi = ?"; 	// perintah sql berbentuk string
		$query = $this->db->query( $sql , $id); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->row_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}

	function insert_materi( $params ){
		return $this->db->insert('materi', $params);
	}
	function update_materi( $params, $where ){
		return $this->db->update('materi', $params, $where);
	}

	function delete_materi( $params ){
		$sql = "DELETE FROM materi WHERE id_materi = ?";
		return $this->db->query($sql, $params);
	}
}
