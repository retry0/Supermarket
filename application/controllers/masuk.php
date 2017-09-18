<?php
class masuk extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_pegawai');//akan meload atau membuka model pegawai kerena untuk masuk kedatabase user
    }
	function index(){
        $this->load->view('tampilan_login');
    }
    function login()
    {
        if(isset($_POST['submit'])){//jika data username dan password ditekan login maka fungsi login akan memeriksa database user 
            
            // proses login disini
            $username   =   $this->input->post('username');
            $password   =   $this->input->post('password');
            $hasil=  $this->model_pegawai->login($username,$password);
            if($hasil)
            {
				 $sess_array = array();
				 foreach($hasil as $row) {
					 //create the session
                $sess_array = array(
				'ID' => $row->user_id,
				'NAME'=>$row->nama_lengkap,
                'USERNAME' => $row->username,
                'PASS'=>$row->password,
                'LEVEL' => $row->level,
				'Last'=> $row->last_login,
                'status_login'=>true,
				  );
				  //update session login,jika masuk lagi langsung ke sistem aplikasi
				 $this->db->where('username',$username);
                $this->db->update('pegawai',array('last_login'=>date('Y-m-d')));
                $this->session->set_userdata(array('status_login'=>'oke','username'=>$username));
				$this->session->set_userdata($sess_array);
				    redirect('dashboard');
				 }
				 } else {
					 redirect('masuk/login');
            }
            //if form validate false
            redirect('masuk');
            return FALSE;
        }
		else{
            //$this->load->view('form_login2');
            chek_session_login();
            $this->load->view('tampilan_login');
        }
		}
	function logout()
    {
		 $this->session->sess_destroy();
        redirect('masuk');
    }
}