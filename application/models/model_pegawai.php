<?php
class model_pegawai extends CI_Model{
    
    
    
    function login($username,$password)
    {
        $chek=  $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->where('username', $username);
        $this->db->where('password', MD5($password));
        $this->db->limit(1);
		
        $query = $this->db->get();
        if($query->num_rows() == 1) {
            return $query->result(); //if data is true
        } else {
            return false; //if data is wrong
        }
	}
    
    
    function tampildata()
    {
        return $this->db->get('pegawai');//akan menampilkan data pegawai yang dipilih
    }
    
    function get_one($id)
    {
        $param  =   array('user_id'=>$id);//akan menampilkan user berdasarkan user id
        return $this->db->get_where('pegawai',$param);
    }
}