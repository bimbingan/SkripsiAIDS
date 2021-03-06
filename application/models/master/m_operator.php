<?php

class m_operator extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        // load encrypt
        $this->load->library('encrypt');
    }

    // get last inserted id
    function get_last_inserted_id() {
        return $this->db->insert_id();
    }

    // update data account
    function update_data_account($params) {
        $sql = "SELECT * FROM com_user WHERE user_id = ?";
        $query = $this->db->query($sql, $params[3]);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
        } else {
            return false;
        }
        // encode password
        $params[1] = $this->encrypt->encode($params[1], $result['user_key']);
        // update 
        $sql = "UPDATE com_user SET user_name = ?, user_pass = ?, lock_st = ?
                WHERE user_id = ?";
        return $this->db->query($sql, $params);
    }

    // list all perusahaan
    function get_all_perusahaan() {
        $sql = "SELECT * FROM perusahaan ORDER BY perusahaan_nm ASC";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    // list all perusahaan
    function get_all_perusahaan_by_name($params) {
        $sql = "SELECT * FROM perusahaan ORDER BY perusahaan_nm ASC WHERE perusahaan_nm LIKE ?";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    // list operator by status
    function get_all_operator_by_st($params) {
        $sql = "SELECT * FROM com_user b
                INNER JOIN com_role_user c ON b.user_id = c.user_id
                INNER JOIN com_role d ON c.role_id = d.role_id
                WHERE d.portal_id = ? AND b.user_st = ?
                GROUP BY b.user_id
                ORDER BY b.operator_name ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    // list operator
    function get_all_operator($params) {
        $sql = "SELECT * FROM com_user b
                INNER JOIN com_role_user c ON b.user_id = c.user_id
                INNER JOIN com_role d ON c.role_id = d.role_id
                WHERE d.portal_id = 6
                GROUP BY b.user_id
                ORDER BY b.operator_name ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    // get list airlines by user
    function get_all_airlines_by_user($params) {
        $sql = "SELECT airlines_id FROM com_user_airlines a
                INNER JOIN com_user b ON a.user_id = b.user_id
                WHERE a.user_id = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            $airlines_selected = array();
            foreach ($result as $rec) {
                $airlines_selected[] = $rec['airlines_id'];
            }
            return $airlines_selected;
        } else {
            return array();
        }
    }

    // get list airlines by user
    function get_list_airlines_by_user($params) {
        $sql = "SELECT c.airlines_id, c.airlines_nm, c.airlines_iata_cd 
                FROM com_user_airlines a
                INNER JOIN com_user b ON a.user_id = b.user_id
                INNER JOIN airlines c ON a.airlines_id = c.airlines_id
                WHERE a.user_id = ?
                ORDER BY airlines_nm ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    // check_airlines_user
    function check_airlines_user($params) {
        $sql = "SELECT c.airlines_id, c.airlines_nm, c.airlines_iata_cd 
                FROM com_user_airlines a
                INNER JOIN com_user b ON a.user_id = b.user_id
                INNER JOIN airlines c ON a.airlines_id = c.airlines_id
                WHERE a.user_id = ? AND c.airlines_id = ?
                ORDER BY airlines_nm ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return true;
        } else {
            return false;
        }
    }

    // get list roles by user
    function get_all_roles_by_user($params) {
        $sql = "SELECT a.* FROM com_role a
                INNER JOIN com_role_user b ON a.role_id = b.role_id
                WHERE user_id = ? AND portal_id = ? 
                ORDER BY role_nm ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            $role_selected = array();
            foreach ($result as $rec) {
                $role_selected[] = $rec['role_id'];
            }
            return $role_selected;
        } else {
            return array();
        }
    }

    // list role
    function get_all_roles_by_portal($params) {
        $sql = "SELECT * FROM com_role WHERE portal_id = ? ORDER BY role_nm ASC";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    // detail perusahaan member
    function get_perusahaan_member_by_id($params) {
        $sql = "SELECT a.perusahaan_kode FROM com_user_perusahaan a WHERE a.user_id = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result['perusahaan_kode'];
        } else {
            return '';
        }
    }

    // detail
    function get_operator_detail_by_id($params) {
        $sql = "SELECT a.*, role_id FROM com_user a
                INNER JOIN com_role_user b ON a.user_id = b.user_id
                WHERE a.user_id = ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    // insert users
    function insert_user($params) {
        $sql = "INSERT INTO com_user (user_name, user_pass, user_key, user_mail, lock_st, mdb, mdd)
                VALUES (?, ?, ?, ?, ?, ?, NOW())";
        return $this->db->query($sql, $params);
    }

    // insert member
    function insert_member($params) {
        $sql = "INSERT INTO com_user (user_name, user_pass, user_key, user_st, lock_st, mdb, mdd)
                VALUES (?, ?, ?, 'member', '0', ?, NOW())";
        return $this->db->query($sql, $params);
    }

    // insert operator
    function insert_operator($params) {
        $sql = "UPDATE com_user SET operator_name = ?, operator_phone = ?, user_mail = ?, operator_address = ?, 
                operator_birth_place = ?, operator_birth_day = ?, operator_gender = ?, operator_jabatan = ?
                WHERE user_id = ?";
        return $this->db->query($sql, $params);
    }

    // delete user roles
    function delete_user_role($params) {
        $sql = "DELETE a.* FROM com_role_user a
                INNER JOIN com_role b ON a.role_id = b.role_id
                WHERE user_id = ? AND portal_id = ?";
        return $this->db->query($sql, $params);
    }

    // insert user roles
    function insert_user_role($params) {
        $sql = "INSERT INTO com_role_user VALUES (?, ?)";
        return $this->db->query($sql, $params);
    }

    // update operator
    function update_data_pribadi($params, $where) {
        // where
        $this->db->where($where);
        // execute
        return $this->db->update('com_user', $params);
    }

    // update operator foto
    function update_foto_pribadi($params) {
        $sql = "UPDATE com_user SET operator_photo = ? WHERE user_id = ?";
        return $this->db->query($sql, $params);
    }

    // delete operator
    function delete_operator($params) {
        $sql = "DELETE FROM com_user WHERE user_id = ?";
        return $this->db->query($sql, $params);
    }

    // delete user airlines
    function delete_user_perusahaan($params) {
        $sql = "DELETE FROM com_user_perusahaan WHERE user_id = ?";
        return $this->db->query($sql, $params);
    }

    // insert user perusahaan
    function insert_user_perusahaan($params) {
        $sql = "INSERT INTO com_user_perusahaan VALUES (?, ?)";
        return $this->db->query($sql, $params);
    }

    // get total member
    function get_total_member($params) {
        $sql = "SELECT COUNT(a.user_id)'total'
                FROM com_user a
                INNER JOIN com_user_perusahaan b ON a.user_id = b.user_id
                WHERE operator_name LIKE ? AND b.perusahaan_kode LIKE ? AND user_st = 'member'";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result['total'];
        } else {
            return 0;
        }
    }

    // get list member
    function get_list_member($params) {
        $sql = "SELECT a.*, c.perusahaan_nm
                FROM com_user a
                INNER JOIN com_user_perusahaan b ON a.user_id = b.user_id
                INNER JOIN perusahaan c ON c.perusahaan_kode = b.perusahaan_kode
                WHERE operator_name LIKE ? AND b.perusahaan_kode LIKE ?
                AND user_st = 'member'
                ORDER BY operator_name ASC
                LIMIT ?, ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    /*
     * PENGATURAN USER
     */

    // get total operator
    function get_total_operator($params) {
        $sql = "SELECT COUNT(*)'total' 
                FROM com_user a 
                WHERE operator_name LIKE ? AND user_st NOT IN('admin')";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result['total'];
        } else {
            return 0;
        }
    }

    // get list operator
    function get_list_operator($params) {
        $sql = "SELECT a.*
                FROM com_user a
                WHERE operator_name LIKE ? AND user_st NOT IN('admin')
                ORDER BY operator_name ASC
                LIMIT ?, ?";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    // get list sub direktorat
    function get_all_direktorat_angkutan_udara($params) {
        $sql = "SELECT * FROM com_preferences WHERE pref_group = 'direktorat' AND pref_nm = 'sub_direktorat'";
        $query = $this->db->query($sql, $params);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

}
