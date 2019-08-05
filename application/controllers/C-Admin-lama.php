<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->model('M_admin');
		$this->load->helper('My_helper');
		$this->load->helper('url');
	}

	public function index()
	{
		$data = array(
			'chart' => true,
			'map'=>false,
			);
		$this->template->admin('Admin/dashboard/dashboard',$data);
	}
	public function dashboard_data()
	{
		$this->load->view('Admin/dashboard/dashboard_data');
	}
	public function peta()
	{
		$data = array(
			'chart' => true,
			'map'=>true,
			);
		$this->template->admin('Admin/peta/peta',$data);
	}
	public function pengguna()
	{
		$data = array(
			'chart' => true,
			'map'=>false,
			'prov'=>$this->M_admin->get_all_provinsi(),
			);
		$this->template->admin('Admin/pengguna/pengguna',$data);
	}
	public function user()
	{
		$this->load->view('Admin/pengguna/user');
	}
	public function user_data($find, $find_value,$sort,$id=NULL)
	{

		$where = array('del_flag'=>"1");

  $jml  = $this->db->order_by('id_user','DESC')->get_where('tb_user',$where);
  // konfigurasi pagination
  $config['base_url'] = base_url().'Admin/user_data';
  $config['total_rows'] = $jml->num_rows();
  $config['per_page'] = '4';

 //inisialisasi config
  $this->pagination->initialize($config);

 //tamplikan data
  $data['pengguna'] = $this->M_admin->ambil_user($config['per_page'], $id, $sort,$find, $find_value);

		$this->load->view('Admin/pengguna/user_data',$data);
	}
	public function admin()
	{
		$this->load->view('Admin/pengguna/admin');
	}
	public function admin_data($find, $find_value,$sort,$id=NULL)
	{

		$where = array('del_flag'=>"1");

  $jml  = $this->db->order_by('id_admin','DESC')->get_where('tb_admin',$where);
  // konfigurasi pagination
  $config['base_url'] = base_url().'Admin/admin_data';
  $config['total_rows'] = $jml->num_rows();
  $config['per_page'] = '4';

 //inisialisasi config
  $this->pagination->initialize($config);

 //tamplikan data
  $data['pengguna'] = $this->M_admin->ambil_admin($config['per_page'], $id, $sort,$find, $find_value);

		$this->load->view('Admin/pengguna/admin_data',$data);
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

	public function insert_user()
	{
			$kode = round(microtime(true) * 1000);
			$nm = $this->input->post('nama');
			$kode = md5($nm);
			$kata= rand(2, strlen($kode));
			$hasil_ack = substr($kode, $kata, 6);
			$file = 'avatar_phb.png';
			$nama = $hasil_ack.'.png';
			$oldDir = FCPATH . 'assets/img/';
			$newDir = FCPATH . 'assets/uploads/';
			copy($oldDir.$file, $newDir.$nama);


		if ($this->input->post('not_api')=='1') {
			$tgl= $this->input->post('tgl_lahir');
		}else {
			$tgl = date("Y-m-d", strtotime($this->input->post('tgl_lahir')));
		}
			$data = array(
				'nik' => $this->input->post('nik'),
				'jk' => $this->input->post('jk'),
				'nama' => $this->input->post('nama'),
				'tempat_lahir' => $this->input->post('tmpt_lahir'),
				'tgl_lahir' => $tgl,
				'telp' => $this->input->post('telp'),
				'email' => $this->input->post('email'),
				'pendidikan' => $this->input->post('pendidikan'),
				'alamat' => $this->input->post('alamat'),
				'pekerjaan' => $this->input->post('pekerjaan'),
				'password' => md5($this->input->post('nik')),
				'cdate' => date('Y-m-d H:i:s'),
				'foto' => $nama,
				//'c_by' => $this->session->userdata('level')." - ".$this->session->userdata('nama');
			);
			$insert = $this->M_admin->insert_data('tb_user',$data);
			if ($insert) {
				$this->session->set_flashdata('alert','toastr.info("Berhasil menambahkan pengguna baru.", "");');
				redirect(base_url('Admin/pengguna'));
			}else {
				$this->session->set_flashdata('alert','toastr.error("Gagal menambahkan pengguna baru.", "");');
				redirect(base_url('Admin/pengguna'));
			}

	}

	public function insert_admin()
	{
			$kode = round(microtime(true) * 1000);
			$nm = $this->input->post('nama');
			$kode = md5($nm);
			$kata= rand(2, strlen($kode));
			$hasil_ack = substr($kode, $kata, 6);
			$file = 'avatar_phb.png';
			$nama = $hasil_ack.'.png';
			$oldDir = FCPATH . 'assets/img/';
			$newDir = FCPATH . 'assets/uploads/';
			copy($oldDir.$file, $newDir.$nama);

			$data = array(
				'nama' => $this->input->post('nama'),
				'telp' => $this->input->post('telp'),
				'email' => $this->input->post('email'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'id_prov' => $this->input->post('id_prov'),
				'id_kab' => $this->input->post('id_kab'),
				'id_kategori' => $this->input->post('id_kategori'),
				'cdate' => date('Y-m-d H:i:s'),
				'foto' => $nama,
				//'c_by' => $this->session->userdata('level')." - ".$this->session->userdata('nama');
			);
			$insert = $this->M_admin->insert_data('tb_admin',$data);
			if ($insert) {
				$this->session->set_flashdata('alert','toastr.info("Berhasil menambahkan pengguna baru.", "");');
				redirect(base_url('Admin/pengguna'));
			}else {
				$this->session->set_flashdata('alert','toastr.error("Gagal menambahkan pengguna baru.", "");');
				redirect(base_url('Admin/pengguna'));
			}

	}

	public function profile()
	{
		$data = array(
			'chart' => false,
			'map'=>false,
			);
		$this->template->admin('Admin/pengguna/profile',$data);
		// $this->load->view('Admin/pengguna/profile',$data);
	}




	public function email()
	{
		$data = array(
			'chart' => false,
			'map'=>false,
			'email' => $this->M_admin->get_all('tb_email_send',array('del_flag' => '1'),'id_email','DESC'),
			);
		$this->template->admin('Admin/pesan/email',$data);
	}
	public function buat_email()
	{
		$data = array(
			'chart' => false,
			'map'=>false,
			'admin'=> $this->M_admin->get_all('tb_admin',array('del_flag' => '1' ),'nama','ASC'),
			'pengguna'=> $this->M_admin->get_all('tb_user',array('del_flag' => '1' ),'nama','ASC'),
			);
		$this->template->admin('Admin/pesan/new_email',$data);
	}
	public function send_mail()
	{

		if ($this->input->post('parm')=='1') {
				$kode = round(microtime(true) * 1000);
		    $config['upload_path'] = './assets/uploads/';
		    $config['allowed_types'] = 'jpg|png|jpeg|pdf|docx';
		    $config['max_size']	= '2000';
		    $config['file_name'] = $kode;
		    $this->upload->initialize($config);
		    if (!$this->upload->do_upload('img'))
		      {
						$this->session->set_flashdata('alert', 'toastr.info("Gagal upload file.", "");');
						redirect(base_url("Admin/buat_email"));
					}else {
						$fn = $this->upload->data();
		        $nama_file = $fn['file_name'];
						$config = Array(
							'protocol' => 'smtp',
							'smtp_host' => 'ssl://mail.slice-pro.com',
							'smtp_port' => 465,
							'smtp_user' => 'no-reply@slice-pro.com',
							'smtp_pass' => '*8,OviVwx[e-',
							'mailtype' => 'html',
							'charset' => 'iso-8859-1'
						 );
					 $this->load->library('email', $config);
					 $this->email->set_newline("\r\n");
					 $this->email->from('no-reply@slice-pro.com', 'Pemetaan Hasil Bumi');
					 $this->email->to($this->input->post('to'));
					 $this->email->cc($this->input->post('cc'));
					 $this->email->bcc($this->input->post('bcc'));
					 $this->email->subject($this->input->post('subjek'));
					 $this->email->message($this->input->post('isi'));
					 $this->email->attach(base_url()."assets/uploads/email/".$nama_file);
					 if (!$this->email->send()) {
						//show_error($this->email->print_debugger());
						$this->session->set_flashdata('alert', 'toastr.info("Gagal mengirim email, coba beberapa saat lagi.", "");');
						redirect(base_url("Admin/buat_email"));
					 }else{
						 $data = array(
							 //'dari' => ,
				 			'subjek' => $this->input->post('subjek'),
				 			'isi' => $this->input->post('isi'),
							'file' => $nama_file,
							'cdate' => date('Y-m-d H:i:s'),
							//'c_by' => ,
						);

						$insert = $this->M_admin->insert_data('tb_email_send',$data);
						if ($insert) {
										$to =$this->input->post('to');
											for ($i=0; $i < count($to) ; $i++) {
												$dataTo = array('id_email' => $insert, 'to' =>$to[$i] );
												$this->M_admin->insert_data('tb_email_to',$dataTo);
											}

										$cc =$this->input->post('cc');
											if (!empty($cc)) {
													for ($i=0; $i < count($to) ; $i++) {
														$dataCc = array('id_email' => $insert, 'cc' =>$cc[$i] );
														$this->M_admin->insert_data('tb_email_cc',$dataCc);
													}
												}

										$bcc =$this->input->post('bcc');
											if (!empty($bcc)) {
													for ($i=0; $i < count($to) ; $i++) {
														$dataBcc = array('id_email' => $insert, 'bcc' =>$bcc[$i] );
														$this->M_admin->insert_data('tb_email_bcc',$dataBcc);
													}
												}

										$this->session->set_flashdata('alert', 'toastr.info("Berhasil mengirim email.", "");');
										redirect(base_url("Admin/email"));
						}else {
							$this->session->set_flashdata('alert', 'toastr.info("Gagal membuat histori email.", "");');
							redirect(base_url("Admin/buat_email"));
						}
					}
				}
		}else {

			$config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://mail.slice-pro.com',
				'smtp_port' => 465,
				'smtp_user' => 'no-reply@slice-pro.com',
				'smtp_pass' => '*8,OviVwx[e-',
				'mailtype' => 'html',
				'charset' => 'iso-8859-1'
			 );
		 $this->load->library('email', $config);
		 $this->email->set_newline("\r\n");
		 $this->email->from('no-reply@slice-pro.com', 'Pemetaan Hasil Bumi');
		 $this->email->to($this->input->post('to'));
		 $this->email->cc($this->input->post('cc'));
		 $this->email->bcc($this->input->post('bcc'));
		 $this->email->subject($this->input->post('subjek'));
		 $this->email->message($this->input->post('isi'));
		 $this->email->attach(base_url()."assets/uploads/".$nama_file);
		 if (!$this->email->send()) {
			//show_error($this->email->print_debugger());
			$this->session->set_flashdata('alert', 'toastr.info("Gagal mengirim email, coba beberapa saat lagi.", "");');
			redirect(base_url("Admin/buat_email"));
		 }else{
			 $data = array(
				 //'dari' => ,
				'subjek' => $this->input->post('subjek'),
				'isi' => $this->input->post('isi'),
				'cdate' => date('Y-m-d H:i:s'),
				//'c_by' => ,
			);

			$insert = $this->M_admin->insert_data('tb_email_send',$data);
			if ($insert) {
							$to =$this->input->post('to');
								for ($i=0; $i < count($to) ; $i++) {
									$dataTo = array('id_email' => $insert, 'to' =>$to[$i] );
									$this->M_admin->insert_data('tb_email_to',$dataTo);
								}

							$cc =$this->input->post('cc');
								if (!empty($cc)) {
										for ($i=0; $i < count($to) ; $i++) {
											$dataCc = array('id_email' => $insert, 'cc' =>$cc[$i] );
											$this->M_admin->insert_data('tb_email_cc',$dataCc);
										}
									}

							$bcc =$this->input->post('bcc');
								if (!empty($bcc)) {
										for ($i=0; $i < count($to) ; $i++) {
											$dataBcc = array('id_email' => $insert, 'bcc' =>$bcc[$i] );
											$this->M_admin->insert_data('tb_email_bcc',$dataBcc);
										}
									}

							$this->session->set_flashdata('alert', 'toastr.info("Berhasil mengirim email.", "");');
							redirect(base_url("Admin/email"));
			}else {
				$this->session->set_flashdata('alert', 'toastr.info("Gagal membuat histori email.", "");');
				redirect(base_url("Admin/buat_email"));
			}
		}
	}
}

public function readEmail($id)
{
	$data = array(
		'email' => $this->M_admin->get_by_id('tb_email_send',array('id_email' => $id , 'del_flag' => '1' )) ,
		'cc' => $this->M_admin->get_by_id('tb_email_cc',array('id_email' => $id )) ,
		'to' => $this->M_admin->get_by_id('tb_email_to',array('id_email' => $id )) ,
		'bcc' => $this->M_admin->get_by_id('tb_email_bcc',array('id_email' => $id )) ,
 );
 $this->load->view('Admin/pesan/read_email',$data);
}
public function deleteEmail()
{
	$data = array('del_flag' => '0' );
	$update = $this->M_admin->update_data(array('id_email' => $this->input->post('id_email')),$data,'tb_email_send');
	if ($update) {
		echo "sukses";
	}else {
		echo "gagal";
	}
}
	public function chat()
	{
		$data = array(
		'chart' => false,
		'map'=>false,
		);
		$this->template->admin('Admin/pesan/chat',$data);
	}
	public function myblog()
	{
		$data = array(
			'chart' => false,
			'map'=>false,
			);
		$this->template->admin('Admin/blog/myblog',$data);
	}
	public function laporan()
	{
		$ub_pertanian= array();

		$dt_ub_pertanian = $this->M_admin->get_like('tb_user','cdate',date())

		for ($i=0; $i < 12; $i++) {
			$dt_ub_pertanian = count($this->M_admin->get_like('tb_user','cdate',date('Y').'-'.$i)->result());
			 array_push($ub_pertanian,$dt_ub_pertanian);
		}





		$data = array(
			'chart' => false,
			'map'=>false,
			'ub_pertanian'=>$ub_pertanian,
			);
			echo json_encode($data);
		// $this->template->admin('Admin/laporan/laporan',$data);
	}
	public function pengaturan()
	{
		$data = array(
			'chart' => false,
			'map'=>false,
			);
		$this->template->admin('Admin/pengaturan/pengaturan',$data);
	}
	public function profil()
	{
		$data = array(
			'chart' => false,
			'map'=>false,
			);
		$this->template->admin('Admin/profil/myprofil',$data);
	}

	function ajax_kabupaten($id_prov){
		$query = $this->db->get_where('tb_wilayah_kabupaten',array('provinsi_id'=>$id_prov));
		$data = "<option value=''>- Pilih Kabupaten -</option>";
		foreach ($query->result() as $value) {
				$data .= "<option value='".$value->id_kab."'>".$value->nama."</option>";
		}
		echo $data;
}
}
