<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function cekAkun()
  {
    //load model_users
    $this->load->model('m_login');

    //membuat validasi login
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $query = $this->m_login->cekAkun($username,$password);

    if ($query === 1) {
      return "User Tidak Ditemukan!";
    }
    else if ($query === 2) {
      return "Password Salah";
    }  
    else {
      //membuat session dengan nama userdata
      $userData = array(
        'username' => $query->username,
        'level' => $query->level,
        'password'=>$query->password,
        'logged_in' => TRUE
      );
      $this->session->set_userdata($userData);
      return TRUE;
    }
  }
  

  public function login()
  {
    //melakukan pengalihan halaman sesuai dengan levelnya
    if ($this->session->userdata('level') == "admin"){redirect('admin/admin');}
    if ($this->session->userdata('level') == "dosen"){redirect('admin/superadmin');}

    //proses login dan validasi nya
    if ($this->input->post('submit')) {
      $this->load->model('m_login');
      $this->form_validation->set_rules('username', 'Username', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');
      $error = $this->cekAkun();
      if ($this->form_validation->run() && $error === TRUE) {
        $data = $this->m_login->cekAkun($this->input->post('username'), $this->input->post('password'));

        //jika bernilai TRUE maka alihkan halaman sesuai dengan status nya
        if($data->level == 'admin'){
          redirect('admin/admin');
        }
        else if($data->level == 'superadmin'){
          redirect('admin/superadmin');
        }
      }

      //Jika bernilai FALSE maka tampilkan error
      else{
        $data['error'] = $error;
        $this->load->view('v_login', $data);
      }
    }
    //Jika tidak maka alihkan kembali ke halaman login
    else{
      $this->load->view('v_login');
    }
  }

  public function signup()
  {
   $this->load->view('authentication/signup');
  }

  
  public function proses_signup()
  {
    if ($this->input->post('submit'))
    {
      $exist = $this ->cekNIM();
      if($exist === FALSE) {
        
        $signup_user= array(
          'id_user' => $this->input->post('NIM') , 
          'password' => md5($this->input->post('password')),
          'status' => 'mahasiswa',
        );

        $signup_mahasiswa= array(
          'NIM' => $this->input->post('NIM') ,
          'id_user' => $this ->input->post('NIM'),
          'Nama'=> $this->input->post('Nama'),
          'prodi' => $this->input->post('prodi'),
          'golongan' => $this->input->post('golongan') ,
        );
        $this ->load-> model('model_daftar');
        $this ->model_daftar->input_user($signup_user);
        $this ->model_daftar->input_mahasiswa($signup_mahasiswa);
        
         $this->load->view('authentication/login');

      }
      else {
        $data['exist']=$exist;
        $this->load->view('authentication/signup',$data);
      }
    
    }
  }


  public function logout()
  {
    //Menghapus semua session (sesi)
    $this->session->sess_destroy();
    redirect('auth/login');
  }
}
