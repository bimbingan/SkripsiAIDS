<?php 

class m_karyawan extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function get_all_karyawan(){
		$sql = "SELECT * FROM karyawan"; 	// perintah sql berbentuk string
		$query = $this->db->query($sql); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->result_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}


	function get_one_karyawan( $id ){
		$sql = "SELECT * FROM karyawan WHERE id_karyawan = ?"; 	// perintah sql berbentuk string
		$query = $this->db->query( $sql , $id); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->row_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}

	function insert_karyawan( $params ){
		return $this->db->insert('karyawan', $params);
	}
	function update_karyawan( $params, $where ){
		return $this->db->update('karyawan', $params, $where);
	}

	function delete_karyawan( $params ){
		$sql = "DELETE FROM karyawan WHERE id_karyawan = ?";
		return $this->db->query($sql, $params);
	}
}
