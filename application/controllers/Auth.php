<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->model('M_admin');
        $this->load->library('Form_validation');
        $this->load->helper(array('Form', 'Cookie', 'String'));

    }

    public function index()
    {
      $server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
  		$this->M_admin->insert_data('tb_server_load',$server_load);

        // ambil cookie
        $cookie = get_cookie('phb');

        // cek session
        if ($this->session->userdata('logged')) {
          if ($this->session->userdata('level')=='admin') {
            $this->_last_login('id_user',$this->session->userdata('id_user'),'tb_user');
            redirect(base_url().'Admin/');
          }elseif ($this->session->userdata('level')=='user') {
            $this->_last_login('id_admin',$this->session->userdata('id_admin'),'tb_admin');
            redirect(base_url().'User/');
          }elseif ($this->session->userdata('level')=='superadmin') {
            $this->_last_login('id_admin',$this->session->userdata('id_admin'),'tb_admin');
            redirect(base_url().'Xyz');
          }
        } else if($cookie <> '') {
            // cek cookie
            $where1 = array( 'cookie' => $cookie,
                            'del_flag' => "1",
                          );
            $where2 = array( 'cookie' => $cookie,
                            'del_flag' => "1",
                            'level' => "1"
                          );
            $where3 = array( 'cookie' => $cookie,
                            'del_flag' => "1",
                            'level' => "2"
                          );

            $row1 = $this->Auth_model->get_by_cookie($where1,'tb_user')->row();
            $row2 = $this->Auth_model->get_by_cookie($where2,'tb_admin')->row();
            $row3 = $this->Auth_model->get_by_cookie($where3,'tb_admin')->row();
            if ($row1) {
                $this->_daftarkan_session_user($row1);
            }elseif ($row2) {
              $this->_daftarkan_session_admin($row2);
            }elseif ($row3) {
              $this->_daftarkan_session_superadmin($row3);
            } else {
                $data = array(
                     'username' => set_value('username'),
                     'password' => set_value('password'),
                     'remember' => set_value('remember'),
                     'message' => $this->session->flashdata('message'),
                );
                $this->load->view('auth/login', $data);
            }
        } else {
            $data = array(
                'username' => set_value('username'),
                'password' => set_value('password'),
                'remember' => set_value('remember'),
                'message' => $this->session->flashdata('message'),
            );
            $this->load->view('auth/login', $data);
        }
    }

    public function login()
    {
        if ($this->session->userdata('locked')==TRUE) {
          $username = $this->session->userdata('username');
          $remember = TRUE;
        }else {
          $username = $this->input->post('username',TRUE);
          $remember = $this->input->post('remember');
        }
        $password = $this->input->post('password');
        $where1 = array(
        'username' => $username,
        'password' => md5($password),
        'del_flag' => "1",
        );
        $where2 = array(
        'username' => $username,
        'password' => md5($password),
        'del_flag' => "1",
        'level' => "1",
        );
        $where3 = array(
        'username' => $username,
        'password' => md5($password),
        'del_flag' => "1",
        'level' => "2",
        );


        $row1 = $this->Auth_model->cek("tb_user",$where1)->row();
        $row2 = $this->Auth_model->cek("tb_admin",$where2)->row();
        $row3 = $this->Auth_model->cek("tb_admin",$where3)->row();

        if ($row1) {
            // login berhasil
            // 1. Buat Cookies jika remember di check
            if ($remember) {
                $key = random_string('alnum', 64);
                set_cookie('phb', $key, 3600*24*30); // set expired 30 hari kedepan

                // simpan key di database
                $update_key = array(
                    'cookie' => $key
                );
                $where  = array('id_user' => $row1->id_user);
                $this->Auth_model->update('tb_user',$update_key,$where);
            }

            $this->_daftarkan_session_user($row1);
        } elseif ($row2) {
            // login berhasil
            // 1. Buat Cookies jika remember di check
            if ($remember) {
                $key = random_string('alnum', 64);
                set_cookie('phb', $key, 3600*24*30); // set expired 30 hari kedepan

                // simpan key di database
                $update_key = array(
                    'cookie' => $key
                );
                $where  = array('id_admin' => $row2->id_admin);
                $this->Auth_model->update('tb_admin',$update_key,$where);
            }

            $this->_daftarkan_session_admin($row2);
        }elseif ($row3) {
            // login berhasil
            // 1. Buat Cookies jika remember di check
            if ($remember) {
                $key = random_string('alnum', 64);
                set_cookie('phb', $key, 3600*24*30); // set expired 30 hari kedepan

                // simpan key di database
                $update_key = array(
                    'cookie' => $key
                );
                $where  = array('id_admin' => $row3->id_admin);
                $this->Auth_model->update('tb_admin',$update_key,$where);
            }

            $this->_daftarkan_session_superadmin($row3);
        } else {
            // login gagal
            $this->session->set_flashdata('message','toastr.info("Gagal sign in.", "");');
            redirect(base_url().'Auth');
        }

    }

    public function _daftarkan_session_user($row) {
        // 1. Daftarkan Session
        $sess = array(
            'logged' => TRUE,
            'nik' => $row->nik,
            'pekerjaan' => $row->pekerjaan,
            'id' => $row->id_user,
            'nama' => $row->nama,
            'foto' => $row->foto,
            'username' => $row->username,
            'cdate' => $row->cdate,
            'level' => 'user',
            'id_kab' =>$row->id_kab,
            'id_prov' =>$row->id_prov,
            'blokir' =>$row->blokir,
            'locked'=>FALSE,
        );
        $this->session->set_userdata($sess);
        $this->_last_login('id_user',$row->id_user,'tb_user');
        // 2. Redirect ke home
        redirect(base_url().'User');
    }
    public function _daftarkan_session_admin($row) {
        // 1. Daftarkan Session
        $sess = array(
            'logged' => TRUE,
            'id' => $row->id_admin,
            'nama' => $row->nama,
            'foto' => $row->foto,
            'username' => $row->username,
            'cdate' => $row->cdate,
            'level' => 'admin',
            'id_kab' =>$row->id_kab,
            'id_prov' =>$row->id_prov,
            'bidang' =>$row->bidang,
            'blokir' =>$row->blokir,
            'locked'=>FALSE,
        );
        $this->session->set_userdata($sess);
        $this->_last_login('id_admin',$row->id_admin,'tb_admin');
        // 2. Redirect ke home
        redirect(base_url().'Admin');
    }
    public function _daftarkan_session_superadmin($row) {
        // 1. Daftarkan Session
        $sess = array(
            'logged' => TRUE,
            'id' => $row->id_admin,
            'nama' => $row->nama,
            'foto' => $row->foto,
            'username' => $row->username,
            'cdate' => $row->cdate,
            'level' => 'superadmin',
            'locked'=>FALSE,
        );
        $this->session->set_userdata($sess);

        $this->_last_login('id_admin',$row->id_admin,'tb_admin');
        // 2. Redirect ke home
        redirect(base_url().'Xyz');
    }
    public function _last_login($id_name,$id_value,$table)
    {
      $last_login = array('last_login' =>date('Y-m-d H:i:s') );
      $where  = array($id_name =>$id_value);
      $this->Auth_model->last_login($table,$last_login,$where);

      //server load
      if ($this->session->userdata('level')=='user') {
        $flag= '2';
      }else {
        $flag= '3';
      }
      $server_load = array('load_name' => $this->session->userdata('level').' login','load_date'=> date('Y-m-d H:i:s'),'flag'=>$flag );
  		$this->M_admin->insert_data('tb_server_load',$server_load);

      //log aktifitas
      $log_aktifitas = array( 'keterangan'=>'Login','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
  		$this->M_admin->insert_data('tb_log',$log_aktifitas);
    }

    public function logout()
    {
        // delete cookie dan session
        delete_cookie('phb');
        $this->session->sess_destroy();
        redirect(base_url().'Auth');
    }
    public function locked()
    {
      $server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
  		$this->M_admin->insert_data('tb_server_load',$server_load);

      delete_cookie('phb');
      $sess = array(
          'locked'=>TRUE,
      );
      $this->session->set_userdata($sess);
      $this->session->unset_userdata('level');
      $this->session->unset_userdata('logged');
      $this->load->view('auth/locked');
    }
    public function forgotten()
    {
      $server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
  		$this->M_admin->insert_data('tb_server_load',$server_load);

      $this->load->view('auth/forget');
    }
    public function reset_email()
    {
          $where = array(
          'email' => $this->input->post('email'),
          'del_flag' => "1",
          );
          $where2 = array(
          'nama' => 'Email Gateway',
          'del_flag' => "1",
          );
          $row1 = $this->Auth_model->cek("tb_user",$where)->row();
          $row2 = $this->Auth_model->cek("tb_admin",$where)->row();
          $smtp = $this->Auth_model->cek("tb_config",$where2)->row();
          if ($row1) {
            $key = random_string('alnum', 64);
            $pass = substr($key,0,8);
            $data = array('nama' => $row1->nama, 'user' => $row1->email, 'pass' => $pass );
            $isi_email = $this->load->view('template/email_forgot', $data, TRUE);


            $config = Array(
              'protocol' => 'smtp',
              'smtp_host' => $smtp->value3,
              'smtp_port' => 465,
              'smtp_user' => $smtp->value1,
              'smtp_pass' => $smtp->value2,
              'mailtype' => 'html',
              'charset' => 'iso-8859-1'
             );

             $this->load->library('email', $config);
             $this->email->set_newline("\r\n");
             $this->email->from($smtp->value1, 'Pemetaan Hasil Bumi');
             $this->email->to($this->input->post('email'));
             $this->email->subject('Pemulihan Akun');
             $this->email->message($isi_email);
             if (!$this->email->send()) {
               $this->session->set_flashdata('message', 'toastr.info("Gagal mengirim email, coba beberapa saat lagi.", "");');
               redirect(base_url("Auth/forgotten"));
          }else {
            $update_key = array(
                'password' => md5($pass),
                'username' => $row1->email,
            );
            $where  = array('id_user' => $row1->id_user);
            $this->Auth_model->update('tb_user',$update_key,$where);
            $this->session->set_flashdata('message', 'toastr.info("Pemulihan berhasil.", "");');
            redirect(base_url("Auth/forgotten"));

          }

        }elseif ($row2) {

            $key = random_string('alnum', 64);
            $pass = substr($key,0,8);
            $data = array('nama' => $row2->nama, 'user' => $row2->email, 'pass' => $pass );
            $isi_email = $this->load->view('template/email_forgot', $data, TRUE);

            $config = Array(
              'protocol' => 'smtp',
              'smtp_host' => $smtp->value3,
              'smtp_port' => 465,
              'smtp_user' => $smtp->value1,
              'smtp_pass' => $smtp->value2,
              'mailtype' => 'html',
              'charset' => 'iso-8859-1'
             );

             $this->load->library('email', $config);
             $this->email->set_newline("\r\n>");
             $this->email->from($smtp->value1, 'Pemetaan Hasil Bumi');
             $this->email->to($this->input->post('email'));
             $this->email->subject('Pemulihan Akun');
             $this->email->message($isi_email);
             if (!$this->email->send()) {
               $this->session->set_flashdata('message', 'toastr.info("Gagal mengirim email, coba beberapa saat lagi.", "");');
               redirect(base_url("Auth/forgotten"));
          }else {
            $update_key = array(
                'password' => md5($pass),
                'username' => $row2->email,
            );
            $where  = array('id_admin' => $row2->id_admin);
            $this->Auth_model->update('tb_admin',$update_key,$where);
            $this->session->set_flashdata('message', 'toastr.info("Pemulihan berhasil.", "");');
            redirect(base_url("Auth/forgotten"));

          }
        }else {
          $this->session->set_flashdata('message', 'toastr.info("Email tidak terdaftar.", "");');
          redirect(base_url("Auth/forgotten"));
        }
      }
    public function reset_phone()
    {
      $where = array(
      'telp' => $this->input->post('phone'),
      'del_flag' => "1",
      );
      $where2 = array(
      'nama' => 'Sms Gateway',
      'del_flag' => "1",
      );
      $row1 = $this->Auth_model->cek("tb_user",$where)->row();
      $row2 = $this->Auth_model->cek("tb_admin",$where)->row();
      $sms = $this->Auth_model->cek("tb_config",$where2)->row();

      if ($row1) {
        $key = random_string('alnum', 64);
        $pass = substr($key,0,8);
        $update_key = array(
            'password' => md5($pass),
            'username' => $row1->telp,
        );
        $where  = array('id_user' => $row1->id_user);
        $this->Auth_model->update('tb_user',$update_key,$where);
        $pesan ="Dari phb.com. username :".$row1->telp." password :".$pass;
        $url="https://reguler.zenziva.net/apps/smsapi.php?userkey=".$sms->value1."&passkey=".$sms->value2."&nohp=".$row1->telp."&pesan=".$pesan;
        $this->session->set_flashdata('send', "reset('$url');");

        redirect(base_url("Auth/forgotten"));
      }elseif ($row2) {
        $key = random_string('alnum', 64);
        $pass = substr($key,0,8);
        $update_key = array(
            'password' => md5($pass),
            'username' => $row2->telp,
        );
        $where  = array('id_admin' => $row2->id_admin);
        $this->Auth_model->update('tb_user',$update_key,$where);
        $pesan ="Dari phb.com. username :".$row2->telp." password :".$pass;
        $url="https://reguler.zenziva.net/apps/smsapi.php?userkey=".$sms->value1."&passkey=".$sms->value2."&nohp=".$row2->telp."&pesan=".$pesan;
        $this->session->set_flashdata('send', "reset('$url');");

        redirect(base_url("Auth/forgotten"));
      }else {
        $this->session->set_flashdata('message', 'toastr.info("Nomor tidak terdaftar.", "");');
        redirect(base_url("Auth/forgotten"));
      }
    }
    public function register()
    {
      $server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
  		$this->M_admin->insert_data('tb_server_load',$server_load);

      $data = array('prov'=>$this->M_admin->get_all_provinsi(), );
      $this->load->view('auth/register',$data);
    }
    public function api_nik($nik)
    {
      $dt = $this->M_admin->get_by_id_ajax_api('tb_masyarakat','NIK',$nik);
      if (!empty($dt)) {
        $data = array('result' => '1', 'data' => $dt );
      }else {
        $data = array('result' => '0' );
      }
      echo json_encode($data);
    }
    public function cek_nik($nik)
    {
      $dt = $this->M_admin->get_by_id_ajax('tb_user','nik',$nik);
      if (!empty($dt)) {
        $data = array('result' => '1', 'data' => $dt );
      }else {
        $data = array('result' => '0' );
      }
      echo json_encode($data);
    }
    function ajax_kabupaten($id_prov)
    {
      $query = $this->db->get_where('tb_wilayah_kabupaten',array('provinsi_id'=>$id_prov));
      $data = "<option value=''></option>";
      foreach ($query->result() as $value) {
          $data .= "<option value='".$value->id_kab."'>".$value->nama."</option>";
      }
      echo $data;
    }
  function ajax_kecamatan($id_kab){
    $query = $this->db->get_where('tb_wilayah_kecamatan',array('kabupaten_id'=>$id_kab));
    $data = "<option value=''></option>";
    foreach ($query->result() as $value) {
        $data .= "<option value='".$value->id_kec."'>".$value->nama."</option>";
    }
    echo $data;
  }
  function ajax_desa($id_kec){
    $query = $this->db->get_where('tb_wilayah_desa',array('kecamatan_id'=>$id_kec));
    $data = "<option value=''></option>";
    foreach ($query->result() as $value) {
        $data .= "<option value='".$value->id_desa."'>".$value->nama."</option>";
    }
    echo $data;
  }
  public function add_user()
	{
    $foto = $this->upload_img('img');
    $foto_ktp = $this->upload_img('img1');

		if ($this->input->post('not_api')=='1') {
			$tgl= $this->input->post('tgl_lahir');
		}else {
			$tgl = date("Y-m-d", strtotime($this->input->post('tgl_lahir')));
		}
    $string =str_replace("-", "",$this->input->post('telp'));
    $telp =str_replace("_", "",$string);
			$data = array(
				'nik' => $this->input->post('nik'),
				'jk' => $this->input->post('jk'),
				'nama' => $this->sensor_text($this->input->post('nama')),
				'tempat_lahir' => $this->sensor_text($this->input->post('tmpt_lahir')),
				'tgl_lahir' => $tgl,
				'telp' => $telp,
				'email' => $this->input->post('email'),
				'pendidikan' => $this->sensor_text($this->input->post('pendidikan')),
				'alamat' => $this->sensor_text($this->input->post('alamat')),
        'id_prov' => $this->input->post('id_prov'),
        'id_kab' => $this->input->post('id_kab'),
        'id_kec' => $this->input->post('id_kec'),
        'id_desa' => $this->input->post('id_desa'),
        'lt' => $this->input->post('lt'),
        'lg' => $this->input->post('lg'),
				'pekerjaan' => $this->sensor_text($this->input->post('pekerjaan')),
        'username' => $this->input->post('email'),
				'password' => md5($this->input->post('password1')),
				'cdate' => date('Y-m-d H:i:s'),
				'foto' => $foto[1],
        'foto_ktp' => $foto_ktp[1],
				'v_email' => md5($this->input->post('email')),
				'v_telp' => md5($this->input->post('telp')),
				'c_by' => "user - ".$this->input->post('nama'),
			);
			$insert = $this->M_admin->insert_data('tb_user',$data);
			if ($insert) {
        if ($foto[0]==false) {
          $this->session->set_flashdata('alert_foto','toastr.info("Tidak dapat mengunggah foto.", "");');
        }
        if ($foto_ktp[0]==false) {
          $this->session->set_flashdata('alert_ktp','toastr.info("Tidak dapat mengunggah foto KTP.", "");');
        }
				$this->session->set_flashdata('alert','toastr.info("Berhasil menambahkan pengguna baru.", "");');
        $this->session->set_flashdata('sukses',$this->input->post('nama'));
        $send_email=$this->kirim_notif_pendaftaran_email($this->sensor_text($this->input->post('nama')), $this->input->post('email'), $this->input->post('password1'), $this->input->post('email'));
        $send_phone=$this->kirim_notif_pendaftaran_phone($this->sensor_text($this->input->post('nama')), $this->input->post('email'), $this->input->post('password1'), $telp);
        if ($send_phone) {
          $this->session->set_flashdata('send', "reset('$send_phone');");
        }
        if ($send_email) {
          $this->session->set_flashdata('message', 'toastr.info("Cek email anda.", "");');
        }
				redirect(base_url('Auth/register'));
			}else {
				$this->session->set_flashdata('alert','toastr.error("Gagal menambahkan pengguna baru.", "");');
				redirect(base_url('Auth/register'));
			}

	}
public function kirim_notif_pendaftaran_email($nama, $user, $pass, $email)
{

  $where2 = array(
  'nama' => 'Email Gateway',
  'del_flag' => "1",
  );

  $smtp = $this->Auth_model->cek("tb_config",$where2)->row();
  $data = array('nama' => $nama, 'user' => $user, 'pass' => $pass );
   $isi_email = $this->load->view('template/email_newmember', $data, TRUE);

    $config = Array(
      'protocol' => 'smtp',
      'smtp_host' => $smtp->value3,
      'smtp_port' => 465,
      'smtp_user' => $smtp->value1,
      'smtp_pass' => $smtp->value2,
      'mailtype' => 'html',
      'charset' => 'iso-8859-1'
     );

     $this->load->library('email', $config);
     $this->email->set_newline("\r\n");
     $this->email->from($smtp->value1, 'Pemetaan Hasil Bumi');
     $this->email->to($email);
     $this->email->subject('Akun Baru');
     $this->email->message($isi_email);
     if (!$this->email->send()) {
       return false;
  }else {
    return true;
  }
}
public function kirim_notif_pendaftaran_phone($nama, $user, $pass, $telp)
{
  $where2 = array(
  'nama' => 'Sms Gateway',
  'del_flag' => "1",
  );

    $sms = $this->Auth_model->cek("tb_config",$where2)->row();
    $pesan ="[".base_url()."] Selamat Akun kamu sudah siap ! Silahkan login dengan username :".$user." dan password :".$pass;
    $url="https://reguler.zenziva.net/apps/smsapi.php?userkey=".$sms->value1."&passkey=".$sms->value2."&nohp=".$telp."&pesan=".$pesan;
    return $url;
}
  public function sensor_text($string)
  {
    $text_sensor= $this->M_admin->get_all('tb_sensor_text', array('del_flag' =>"1" ,'_rule'=>'1' ),'id_sensor','asc');
    // $disallowed  = array();
    // foreach ($text_sensor as $text) {
    //   array_push($disallowed,$text->_text);
    // }
    // $hasil = word_censor($string, $disallowed, 'Beep!');
    // return $hasil;

    $numItems =count($text_sensor);
    $i=0;
    foreach ($text_sensor as $text) {
      $string = word_censor($string, array( $text->_text), $text->_replace);
      if (++$i === $numItems) {
        return $string;
      }
    }
  }
  public function find_bad_words()
  {
    $string = $this->input->post('text');
    $text_sensor= $this->M_admin->get_all('tb_sensor_text', array('del_flag' =>"1" ,'_rule'=>'2' ),'id_sensor','asc');
    $numItems =count($text_sensor);
    $i=0;
    foreach ($text_sensor as $text) {
      if (stripos($string,$text->_text) !== false) {
        echo "1";
      }
    }
  }

  public function find_username_duplicat_user()
  {
    $string = $this->input->post('text');
    $user= $this->M_admin->get_all('tb_user', array('del_flag' =>"1" ),'id_user','asc');
    if ($this->input->post('id')==true) {
      $iam= $this->M_admin->get_where('tb_user', array('del_flag' =>"1",'id_user'=> $this->input->post('id')))->row();
    }

    foreach ($user as $text) {
      if ($string==$text->username) {
          if ($this->input->post('id')==true) {
            if ($string==$iam->username) {
              echo "0";
            }else {
              echo "1";
            }
          }else {
            echo "1";
          }
      }
    }
  }

  public function find_username_duplicat_admin()
  {
    $string = $this->input->post('text');
    $user= $this->M_admin->get_all('tb_admin', array('del_flag' =>"1" ),'id_admin','asc');
    if ($this->input->post('id')==true) {
      $iam= $this->M_admin->get_where('tb_admin', array('del_flag' =>"1",'id_admin'=> $this->input->post('id')))->row();
    }

    foreach ($user as $text) {
      if ($string==$text->username) {
          if ($this->input->post('id')==true) {
            if ($string==$iam->username) {
              echo "0";
            }else {
              echo "1";
            }
          }else {
            echo "1";
          }
      }
    }
  }

  public function find_duplicat_email_user()
  {
    $string = $this->input->post('text');
    $user= $this->M_admin->get_all('tb_user', array('del_flag' =>"1" ),'id_user','asc');
    $admin= $this->M_admin->get_all('tb_admin', array('del_flag' =>"1" ),'id_admin','asc');
    if ($this->input->post('id')==true) {
      $iam= $this->M_admin->get_where('tb_user', array('del_flag' =>"1",'id_user'=> $this->input->post('id')))->row();
    }

    foreach ($user as $text) {
      if ($string==$text->email) {
          if ($this->input->post('id')==true) {
            if ($string==$iam->email) {
              echo "0";
            }else {
              echo "1";
            }
          }else {
            echo "1";
          }
      }
    }
  }

  public function find_duplicat_email_admin()
  {
    $string = $this->input->post('text');
    $user= $this->M_admin->get_all('tb_admin', array('del_flag' =>"1" ),'id_admin','asc');
    if ($this->input->post('id')==true) {
      $iam= $this->M_admin->get_where('tb_admin', array('del_flag' =>"1",'id_admin'=> $this->input->post('id')))->row();
    }

    foreach ($user as $text) {
      if ($string==$text->email) {
          if ($this->input->post('id')==true) {
            if ($string==$iam->email) {
              echo "0";
            }else {
              echo "1";
            }
          }else {
            echo "1";
          }
      }
    }
  }

  public function find_duplicat_phone_admin()
  {
    $telp =str_replace("-", "",$this->input->post('text'));
    $string =str_replace("_", "",$telp);
    $user= $this->M_admin->get_all('tb_admin', array('del_flag' =>"1" ),'id_admin','asc');
    if ($this->input->post('id')==true) {
      $iam= $this->M_admin->get_where('tb_admin', array('del_flag' =>"1",'id_admin'=> $this->input->post('id')))->row();
    }

    foreach ($user as $text) {
      if ($string==$text->telp) {
          if ($this->input->post('id')==true) {
            if ($string==$iam->telp) {
              echo "0";
            }else {
              echo "1";
            }
          }else {
            echo "1";
          }
      }
    }
  }
  public function find_duplicat_phone_user()
  {
    $telp =str_replace("-", "",$this->input->post('text'));
    $string =str_replace("_", "",$telp);
    $user= $this->M_admin->get_all('tb_user', array('del_flag' =>"1" ),'id_user','asc');
    if ($this->input->post('id')==true) {
      $iam= $this->M_admin->get_where('tb_user', array('del_flag' =>"1",'id_user'=> $this->input->post('id')))->row();
    }

    foreach ($user as $text) {
      if ($string==$text->telp) {
          if ($this->input->post('id')==true) {
            if ($string==$iam->telp) {
              echo "0";
            }else {
              echo "1";
            }
          }else {
            echo "1";
          }
      }
    }
  }
  public function upload_img($value)
  {
    $kode = round(microtime(true) * 1000);
    $config['upload_path'] = './assets/uploads/';
    $config['allowed_types'] = 'jpg|png|jpeg';
    $config['max_size']	= '3000';
    $config['file_name'] = $kode;
    $this->upload->initialize($config);
    if (!$this->upload->do_upload($value))
        {
          return array( false, '' );
        }
    else
          {
            $fn = $this->upload->data();
            $nama = $fn['file_name'];
            return array( true, $nama );
          }
  }

}


 ?>
