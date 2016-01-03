<?php 

class m_strukturorganisasi extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function get_all_strukturorganisasi(){
		$sql = "SELECT * FROM strukturorganisasi INNER JOIN jabatanorganisasi USING(id_jabatan) INNER JOIN karyawan USING(id_karyawan)"; 	// perintah sql berbentuk string
		$query = $this->db->query($sql); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->result_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}


	function get_one_strukturorganisasi( $id ){
		$sql = "SELECT * FROM strukturorganisasi WHERE id_jabatan = ?"; 	// perintah sql berbentuk string
		$query = $this->db->query( $sql , $id); 	// perintah sql dieksekusi kemudian disimpan di dalam var query
		if($query->num_rows() > 0){			// query dicek apakah ada isinya atau tidak
			$result = $query->row_array();	// hasil dari query dipindahkan ke var result dengan menggunakan fungsi result_array (mempunyai baris banyak)
			$query->free_result();				// karena hasil sudah diperoleh maka query kita hapus
			return $result;					// setelah itu kita kembalikan hasil var result
		}else{
			return array();					// jika query tidak berhasil maka akan mengembalikan nilai array kosong
		}
	}

	function get_struktur_by_jabatan($params){
		$sql = "SELECT * FROM strukturorganisasi INNER JOIN karyawan USING(id_karyawan) WHERE id_jabatan = ?";
		$query = $this->db->query($sql, $params);
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$query->free_result();
			return $result;
		}else{
			return array();
		}
	}

	function insert_strukturorganisasi( $params ){
		return $this->db->insert('strukturorganisasi', $params);
	}
	function update_strukturorganisasi( $params, $where ){
		return $this->db->update('strukturorganisasi', $params, $where);
	}

	function delete_strukturorganisasi( $params ){
		$sql = "DELETE FROM strukturorganisasi WHERE id_jabatan = ?";
		return $this->db->query($sql, $params);
	}
}
