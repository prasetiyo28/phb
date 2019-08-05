<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->model('M_admin');
		$this->load->helper('penolong');
		$this->load->helper('url');
		if ($this->session->userdata('locked')== TRUE) {
			if ($this->session->userdata('level')!= 'admin') {
				redirect(base_url().'Auth/locked');
			}
		}elseif ($this->session->userdata('level')!= 'admin') {
			redirect(base_url().'Auth');
		}
	}
	public function index()
	{
		$this->session->unset_userdata(array('iduser'));
		$server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
		$this->M_admin->insert_data('tb_server_load',$server_load);

		$ub_total= array();

		for ($i=1; $i <= 12; $i++) {
			if ($i<= 9) {
				$s='-0';
			}else {
				$s='-';
			}
			$dt_ub_total = count($this->M_admin->get_like_where('tb_user','cdate',date('Y').$s.$i,array('del_flag' =>'1' ,'pekerjaan'=>$this->session->userdata('bidang'), 'id_kab'=> $this->session->userdata('id_kab') ))->result());
			array_push($ub_total,$dt_ub_total);
		}
		$date=date('Y-m-d');
		$data = array(
			'chart' => true,
			'map'=>false,
			'kunjungan' => count($this->db->where('flag','1')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_user' => count($this->db->where('flag','2')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_admin' => count($this->db->where('flag','3')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'ttl_user' => count($this->M_admin->get_where('tb_user',array('del_flag' =>'1', 'pekerjaan'=>$this->session->userdata('bidang'), 'id_kab'=> $this->session->userdata('id_kab') ))->result()),
			'user_today' => $this->M_admin->get_like_where('tb_user','cdate',$date,array('del_flag' =>'1' ,'pekerjaan'=>$this->session->userdata('bidang'), 'id_kab'=> $this->session->userdata('id_kab') ))->result(),
			'ub_total'=>$ub_total,
			'total_user'=>count($this->M_admin->get_where('tb_user',array('del_flag' =>'1','pekerjaan'=>$this->session->userdata('bidang'), 'id_kab'=> $this->session->userdata('id_kab')))->result()),
			'total_user_l'=>count($this->M_admin->get_where('tb_user',array('del_flag' =>'1','jk'=>'L','pekerjaan'=>$this->session->userdata('bidang'), 'id_kab'=> $this->session->userdata('id_kab') ))->result()),
			'total_user_p'=>count($this->M_admin->get_where('tb_user',array('del_flag' =>'1','jk'=>'P','pekerjaan'=>$this->session->userdata('bidang'), 'id_kab'=> $this->session->userdata('id_kab') ))->result()),

		);
		$this->template->admin('Admin/dashboard/dashboard',$data);
	}
	public function peta()
	{
		$this->session->unset_userdata(array('iduser'));
		$server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
		$this->M_admin->insert_data('tb_server_load',$server_load);

		$data = array(
			'chart' => true,
			'map'=>true,
			'kunjungan' => count($this->db->where('flag','1')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_user' => count($this->db->where('flag','2')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_admin' => count($this->db->where('flag','3')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'icon' => $this->M_admin->get_where('tb_icon_map',array('del_flag' =>'1'))->result(),
		);
		$this->template->admin('Admin/peta/peta',$data);
	}
	public function insert_produksi()
	{
		$data = array(
			'bidang' 					=> $this->input->post('bidang') ,
			'id_user' 				=> $this->input->post('id_user') ,
			'jenis_produksi'	=> $this->input->post('jenis_produksi') ,
			'id_icon' 				=> $this->input->post('id_icon') ,
			'luas' 						=> $this->input->post('luas') ,
			'status_lahan' 		=> $this->input->post('status_lahan') ,
			'jml_bibit' 			=> $this->input->post('jumlah_bibit') ,
			'jml_kira_panen' 			=> $this->input->post('jumlah_panen') ,
			'tgl_tanam' 			=> date('Y-m-d', strtotime($this->input->post('tgl_tanam'))),
			'tgl_kira_panen' 			=> date('Y-m-d', strtotime($this->input->post('tgl_panen'))) ,
			'harga_kira_perkilo' 	=> $this->input->post('harga') ,
			'lokasi' 					=> $this->input->post('lokasi') ,
			'lt' 							=> $this->input->post('lt') ,
			'lg' 							=> $this->input->post('lg') ,
			'jenis_tambak' 		=> $this->input->post('jenis_tambak') ,
			'del_flag'				=> '1',
			'cdate' 					=> date('Y-m-d H:i:s'),
			'c_by'						=> $this->session->userdata('level')." - ".$this->session->userdata('nama'),
		);
		$insert = $this->M_admin->insert_data('tb_produksi',$data);
		if ($insert) {
			//log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Menambahkan produksi baru','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			$this->session->set_flashdata('alert','toastr.info("Berhasil menambahkan produksi baru.", "");');
			redirect(base_url('Admin/peta'));
		}else {
			$this->session->set_flashdata('alert','toastr.error("Gagal menambahkan produksi baru.", "");');
			redirect(base_url('Admin/peta'));
		}
	}
	public function get_all_user_ajax()
	{
		$data['nama'] = array();
		$data['nik'] = array();
		$data['id_user'] = array();
		$data['bidang'] = array();
		$nama = $this->M_admin->get_where('tb_user',array('del_flag' =>'1','blokir'=>'0','pekerjaan'=>$this->session->userdata('bidang'), 'id_kab'=> $this->session->userdata('id_kab')))->result();
		foreach ($nama as $n) {
			array_push($data['nama'],$n->nama);
			array_push($data['nik'],$n->nik);
			array_push($data['id_user'],$n->id_user);
			array_push($data['bidang'],$n->pekerjaan);
		}
		echo json_encode($data);
	}
	public function get_all_pertanian_panen()
	{
		$data=$this->M_admin->get_all_bidang_by_status('1','1')->result();
		echo json_encode($data);
	}
	public function get_all_pertanian_belum()
	{
		$data=$this->M_admin->get_all_bidang_by_status('1','0')->result();
		echo json_encode($data);
	}
	public function get_all_pertanian_gagal()
	{
		$data=$this->M_admin->get_all_bidang_by_status('1','2')->result();
		echo json_encode($data);
	}
	public function get_all_perikanan_panen()
	{
		$data=$this->M_admin->get_all_bidang_by_status('2','1')->result();
		echo json_encode($data);
	}
	public function get_all_perikanan_belum()
	{
		$data=$this->M_admin->get_all_bidang_by_status('2','0')->result();
		echo json_encode($data);
	}
	public function get_all_perikanan_gagal()
	{
		$data=$this->M_admin->get_all_bidang_by_status('2','2')->result();
		echo json_encode($data);
	}
	public function get_all_peternakan_panen()
	{
		$data=$this->M_admin->get_all_bidang_by_status('3','1')->result();
		echo json_encode($data);
	}
	public function get_all_peternakan_belum()
	{
		$data=$this->M_admin->get_all_bidang_by_status('3','0')->result();
		echo json_encode($data);
	}
	public function get_all_peternakan_gagal()
	{
		$data=$this->M_admin->get_all_bidang_by_status('3','2')->result();
		echo json_encode($data);
	}
	public function get_all_mydata_panen()
	{
		$data=$this->M_admin->get_all_bidang2('1',$this->session->userdata('bidang'),$this->session->userdata('id_kab'))->result();
		echo json_encode($data);
	}
	public function get_all_mydata_belum()
	{
		$data=$this->M_admin->get_all_bidang2('0',$this->session->userdata('bidang'),$this->session->userdata('id_kab'))->result();
		echo json_encode($data);
	}
	public function get_all_mydata_gagal()
	{
		$data=$this->M_admin->get_all_bidang2('2',$this->session->userdata('bidang'),$this->session->userdata('id_kab'))->result();
		echo json_encode($data);
	}
	public function deleteProduksi()
	{
		$data = array('del_flag' => '0' );
		$update = $this->M_admin->update_data(array('id_produksi' => $this->input->post('id_produksi')),$data,'tb_produksi');
		if ($update) {
			//log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Menghapus data produksi','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			echo "sukses";
		}else {
			echo "gagal";
		}
	}
	public function edit_produksi($id)
	{
		$data = array('icon' => $this->M_admin->get_where('tb_icon_map',array('del_flag' =>'1'))->result(),
			'data'=>$this->M_admin->get_by_id_bidang($id)->result(),
		);

		$tampil= $this->load->view('Admin/peta/canvas_detail',$data);
		return $tampil;
	}
	public function detail_produksi($id)
	{
		$data = array('icon' => $this->M_admin->get_where('tb_icon_map',array('del_flag' =>'1'))->result(),
			'data'=>$this->M_admin->get_by_id_bidang($id)->result(),
		);

		$tampil= $this->load->view('Admin/peta/canvas_detail_lihat',$data);
		return $tampil;
	}
	public function update_peta_produksi()
	{
		$data = array(
			'lt' => $this->input->post('lt') ,
			'lg' => $this->input->post('lg'),
			'lokasi' => $this->input->post('lokasi'),
			'mdate'=> date('Y-m-d H:i:s'),
			'm_by'=> $this->session->userdata('level')." - ".$this->session->userdata('nama')
		);
		$update = $this->M_admin->update_data(array('id_produksi' => $this->input->post('id')),$data,'tb_produksi');
		if ($update) {
			//log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Memperbaharui lokasi peta produksi','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			$this->session->set_flashdata('alert','toastr.info("Berhasil memperbaharui lokasi peta.", "");');
			redirect(base_url('Admin/peta'));
		}else {
			$this->session->set_flashdata('alert','toastr.info("Gagal memperbaharui lokasi peta.", "");');
			redirect(base_url('Admin/peta'));
		}
	}
	public function update_produksi()
	{
		$data = array(
			'jenis_produksi'	=> $this->input->post('jenis_produksi') ,
			'id_icon' 				=> $this->input->post('id_icon1') ,
			'luas' 						=> $this->input->post('luas') ,
			'status_lahan' 		=> $this->input->post('status_lahan') ,
			'jml_bibit' 			=> $this->input->post('jumlah_bibit') ,
			'jml_kira_panen' 			=> $this->input->post('jumlah_panen') ,
			'tgl_tanam' 			=> date('Y-m-d', strtotime($this->input->post('tgl_tanam1'))),
			'tgl_kira_panen' 			=> date('Y-m-d', strtotime($this->input->post('tgl_panen1'))) ,
			'harga_kira_perkilo' 	=> $this->input->post('harga') ,
			'jenis_tambak' 		=> $this->input->post('jenis_tambak') ,
			'mdate'=> date('Y-m-d H:i:s'),
			'm_by'=> $this->session->userdata('level')." - ".$this->session->userdata('nama')
		);
		$update = $this->M_admin->update_data(array('id_produksi' => $this->input->post('id_produksi')),$data,'tb_produksi');
		if ($update) {
			//log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Memperbaharui data produksi','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			$this->session->set_flashdata('alert','toastr.info("Berhasil memperbaharui data produksi.", "");');
			redirect(base_url('Admin/peta'));
		}else {
			$this->session->set_flashdata('alert','toastr.info("Gagal memperbaharui data produksi.", "");');
			redirect(base_url('Admin/peta'));
		}
	}
	public function pengguna()
	{
		$this->session->unset_userdata(array('iduser'));
		$server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
		$this->M_admin->insert_data('tb_server_load',$server_load);

		$data = array(
			'chart' => true,
			'map'=>false,
			'kunjungan' => count($this->db->where('flag','1')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_user' => count($this->db->where('flag','2')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_admin' => count($this->db->where('flag','3')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),

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

		$where = array('del_flag'=>"1",'pekerjaan'=>$this->session->userdata('bidang'), 'id_kab'=> $this->session->userdata('id_kab'));

		$jml  = $this->db->order_by('id_user','DESC')->get_where('tb_user',$where);
	  // konfigurasi pagination
		$config['base_url'] = base_url().'Admin/user_data';
		$config['total_rows'] = $jml->num_rows();
		$config['per_page'] = '4';

	 //inisialisasi config
		$this->pagination->initialize($config);

	 //tamplikan data
		$data['pengguna'] = $this->M_admin->ambil_user_admin($config['per_page'], $id, $sort,$find, $find_value);

		$this->load->view('Admin/pengguna/user_data',$data);
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
		$string =str_replace("-", "",$this->input->post('telp'));
		$telp =str_replace("_", "",$string);
		$data = array(
			'nik' => $this->input->post('nik'),
			'jk' => $this->input->post('jk'),
			'nama' => $this->input->post('nama'),
			'tempat_lahir' => $this->input->post('tmpt_lahir'),
			'tgl_lahir' => $tgl,
			'telp' => $telp,
			'email' => $this->input->post('email'),
			'pendidikan' => $this->input->post('pendidikan'),
			'alamat' => $this->input->post('alamat'),
			'pekerjaan' => $this->input->post('pekerjaan'),
			'username' => $this->input->post('nik'),
			'password' => md5($this->input->post('nik')),
			'cdate' => date('Y-m-d H:i:s'),
			'foto' => $nama,
			'v_email' => md5($this->input->post('email')),
			'v_telp' => md5($this->input->post('telp')),
			'c_by' => $this->session->userdata('level')." - ".$this->session->userdata('nama'),
			'id_prov'=>$this->session->userdata('id_prov'),
			'id_kab'=>$this->session->userdata('id_kab')

		);
		$insert = $this->M_admin->insert_data('tb_user',$data);
		if ($insert) {
				//log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Menambahkan pengguna baru','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			$this->session->set_flashdata('alert','toastr.info("Berhasil menambahkan pengguna baru.", "");');
			redirect(base_url('Admin/pengguna'));
		}else {
			$this->session->set_flashdata('alert','toastr.error("Gagal menambahkan pengguna baru.", "");');
			redirect(base_url('Admin/pengguna'));
		}

	}
	public function makesesion()
	{
		if ($this->input->post('level')=='user') {
			$sess = array('iduser' => $this->input->post('id') );
			$this->session->set_userdata($sess);
			echo "1";
		}else {
			$sess = array('idadmin' => $this->input->post('id') );
			$this->session->set_userdata($sess);
			echo "1";
		}

	}
	public function profile()
	{
		$server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
		$this->M_admin->insert_data('tb_server_load',$server_load);
		$id = $this->session->userdata('iduser');
		$user = $this->M_admin->get_where('tb_user',array('id_user' => $id, 'del_flag'=>'1' ))->row();
		if (!empty($id)) {
			$p_panen= array();

			$sampai = date('n');

			for ($i=1; $i <= $sampai; $i++) {
				if ($i<= 9) {
					$s='-0';
				}else {
					$s='-';
				}
				$dt_p_panen = count($this->M_admin->get_all_by_iduser($user->id_user,date('Y').$s.$i)->result());
				array_push($p_panen,$dt_p_panen);
			}

			$data = array(
				'chart' => true,
				'map'=>true,
				'kunjungan' => count($this->db->where('flag','1')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
				'login_user' => count($this->db->where('flag','2')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
				'login_admin' => count($this->db->where('flag','3')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
				'data' => $this->M_admin->get_where('tb_user',array('del_flag' =>'1','id_user'=>$id ))->result(),
				'prov'=>$this->M_admin->get_all_provinsi(),
				'username' => $user->username,
				'id'=>$user->id_user,
				'foto'=>$user->foto,
				'url'=>base_url('Admin/update_akun_user'),
				'url_foto'=>base_url('Admin/update_foto_user'),
				'p_panen'=>$p_panen,
				'panen'=>$this->M_admin->get_all_produksi_by_iduser($id)->result(),
				'log'=>$this->M_admin->get_all('tb_log',array('jabatan' => 'user','id'=>$id),'id_log','DESC'),

			);
			$this->template->admin('Admin/pengguna/profile',$data);
		}else {
			$data = array(
				'chart' => false,
				'map'=>false,
				'kunjungan' => count($this->db->where('flag','1')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
				'login_user' => count($this->db->where('flag','2')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
				'login_admin' => count($this->db->where('flag','3')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			);
			$this->template->Admin('template/error_404',$data);
		}

	}
	public function cari_lap_user($jenis2,$bulan,$tahun)
	{
		$id = $this->session->userdata('iduser');
		$user = $this->M_admin->get_where('tb_user',array('id_user' => $id, 'del_flag'=>'1' ))->row();

			if ($jenis2=='1') { //bulanan
				$data['produksi']= $this->M_admin->get_all_lap_produksi_by_iduser($id,$tahun.'-'.$bulan)->result();
				$this->load->view('Admin/pengguna/tabel_produksi',$data);
			}elseif ($jenis2=='2') { //tahunan
				$data['produksi']= $this->M_admin->get_all_lap_produksi_by_iduser($id,$tahun.'-')->result();
				$this->load->view('Admin/pengguna/tabel_produksi',$data);
			}else { //semua
				$data['produksi']= $this->M_admin->get_all_lap_produksi_by_iduser2($id)->result();
				$this->load->view('Admin/pengguna/tabel_produksi',$data);
			}

		}
		public function cari_lap($jenis1,$jenis2,$bulan,$tahun)
		{
			$id = $this->session->userdata('id');
			$admin = $this->M_admin->get_where('tb_admin',array('id_admin' => $id, 'del_flag'=>'1' ))->row();

		if ($jenis1=='1') { //pengguna
			if ($jenis2=='1') { //bulanan
				$data['pengguna']= $this->M_admin->get_like_where('tb_user','cdate',$tahun.'-'.$bulan,array('pekerjaan' => $admin->bidang,'id_kab'=>$admin->id_kab, 'del_flag'=>'1'))->result();
				$this->load->view('Admin/pengguna/tabel_pengguna',$data);
			}elseif ($jenis2=='2') { //tahunan
				$data['pengguna']= $this->M_admin->get_like_where('tb_user','cdate',$tahun.'-',array('pekerjaan' => $admin->bidang,'id_kab'=>$admin->id_kab, 'del_flag'=>'1'))->result();
				$this->load->view('Admin/pengguna/tabel_pengguna',$data);
			}else { //semua
				$data['pengguna']= $this->M_admin->get_all('tb_user',array('pekerjaan' => $admin->bidang,'id_kab'=>$admin->id_kab, 'del_flag'=>'1'),'id_user','DESC');
				$this->load->view('Admin/pengguna/tabel_pengguna',$data);
			}
		}else {// produksi
			if ($jenis2=='1') { //bulanan
				$data['produksi']= $this->M_admin->get_all_lap_produksi_by_idkab($admin->id_kab,$admin->bidang,$tahun.'-'.$bulan)->result();
				$this->load->view('Admin/pengguna/tabel_produksi',$data);
			}elseif ($jenis2=='2') { //tahunan
				$data['produksi']= $this->M_admin->get_all_lap_produksi_by_idkab($admin->id_kab,$admin->bidang,$tahun.'-')->result();
				$this->load->view('Admin/pengguna/tabel_produksi',$data);
			}else { //semua
				$data['produksi']= $this->M_admin->get_all_lap_produksi_by_idkab2($admin->id_kab,$admin->bidang)->result();
				$this->load->view('Admin/pengguna/tabel_produksi',$data);
			}
		}
	}
	public function modal_ktp($foto,$id,$nik,$par)
	{
		$data['foto_ktp']=$foto;
		$data['par']=$par;
		$data['id']=$id;
		$data['nik']=$nik;
		$tampilan = $this->load->view('Admin/pengguna/modal_ktp',$data,TRUE);
		echo $tampilan;
	}
	public function update_peta()
	{
		$data = array(
			'lt' => $this->input->post('lt'),
			'lg'=>$this->input->post('lg'),
			'mdate'=>date('Y-m-d H:i:s'),
			'm_by' =>$this->session->userdata('level')." - ".$this->session->userdata('nama'),

		);
		$update = $this->M_admin->update_data(array('id_user' => $this->input->post('id')),$data,'tb_user');
		if ($update) {
			//log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Memperbaharui lokasi peta pengguna','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			$this->session->set_flashdata('alert','toastr.info("Berhasil memperbaharui lokasi peta.", "");');
			redirect(base_url('Admin/profile'));
		}else {
			$this->session->set_flashdata('alert','toastr.info("Gagal memperbaharui lokasi peta.", "");');
			redirect(base_url('Admin/profile'));
		}
	}
	public function verifikasi_ktp($id)
	{
		$data = array(
			'v_ktp' =>'1',
			'mdate'=>date('Y-m-d H:i:s'),
			'm_by' =>$this->session->userdata('level')." - ".$this->session->userdata('nama'),

		);
		$update = $this->M_admin->update_data(array('id_user' => $id),$data,'tb_user');
		if ($update) {
			//log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Memferifikasi foto KTP pengguna','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			$this->session->set_flashdata('alert','toastr.info("Berhasil memferifikasi foto KTP.", "");');
			redirect(base_url('Admin/profile'));
		}else {
			$this->session->set_flashdata('alert','toastr.info("Gagal memferifikasi foto KTP.", "");');
			redirect(base_url('Admin/profile'));
		}
	}
	public function update_personal()
	{
		$user = $this->M_admin->get_where('tb_user',array('id_user' => $this->input->post('id_user'), 'del_flag'=>'1' ))->row();
		$email = $this->input->post('email');
		$string =str_replace("-", "",$this->input->post('telp'));
		$telp =str_replace("_", "",$string);
		if ($email!=$user->email) {
			$vemail = NULL;
		}else {
			$vemail=$user->v_email;
		}
		if ($telp!=$user->telp) {
			$vtelp = NULL;
		}else {
			$vtelp=$user->v_telp;
		}
		$string =str_replace("-", "",$this->input->post('telp'));
		$telp =str_replace("_", "",$string);
		$data = array(
			'jk' => $this->input->post('jk'),
			'tempat_lahir' => sensor_text($this->input->post('tempat_lahir')),
			'tgl_lahir' => $tgl,
			'telp' => $telp,
			'email' => $this->input->post('email'),
			'pendidikan' => sensor_text($this->input->post('pendidikan')),
			'alamat' => sensor_text($this->input->post('alamat')),
			'id_prov' => $this->input->post('id_prov'),
			'id_kab' => $this->input->post('id_kab'),
			'id_kec' => $this->input->post('id_kec'),
			'id_desa' => $this->input->post('id_desa'),
			'v_email' =>$vemail,
			'v_telp' =>$vtelp,

		);
		$update = $this->M_admin->update_data(array('id_user' =>$this->input->post('id_user') ),$data,'tb_user');
		if ($update) {
				//log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Memperbaharui data personal pengguna','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			$this->session->set_flashdata('alert','toastr.info("Berhasil memperbaharui data personal.", "");');
			redirect(base_url('Admin/profile'));
		}else {
			$this->session->set_flashdata('alert','toastr.info("Gagal memperbaharui data personal.", "");');
			redirect(base_url('Admin/profile'));
		}
	}
	public function update_akun_user()
	{
		if ($this->input->post('password')=="") {
			$data = array('username' => $this->input->post('username'),'mdate'=>date('Y-m-d H:i:s'),'m_by' =>$this->session->userdata('level')." - ".$this->session->userdata('nama'),
		);
		}else {
			$data = array('username' => $this->input->post('username'),'password'=>md5($this->input->post('password')),'mdate'=>date('Y-m-d H:i:s'),
				'm_by' =>$this->session->userdata('level')." - ".$this->session->userdata('nama'),
			);
		}

		$update = $this->M_admin->update_data(array('id_user' =>$this->input->post('id') ),$data,'tb_user');
		if ($update) {
			 //log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Memperbaharui data akun pengguna','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			$this->session->set_flashdata('alert','toastr.info("Berhasil memperbaharui data akun.", "");');
			redirect(base_url('Admin/profile'));
		}else {
			$this->session->set_flashdata('alert','toastr.info("Gagal memperbaharui data akun.", "");');
			redirect(base_url('Admin/profile'));
		}
	}
	public function update_foto_user()
	{
		$foto = $this->upload_img('img');
		if ($foto[0]==true) {
			$r_file =$this->input->post('foto_lama');
			unlink("./assets/uploads/$r_file");
		}else {
			$foto[1]=$this->input->post('foto_lama');
		}

		$data = array(
			'foto' => $foto[1],
			'mdate'=>date('Y-m-d H:i:s'),
			'm_by' =>$this->session->userdata('level')." - ".$this->session->userdata('nama'),
		);


		$update = $this->M_admin->update_data(array('id_user' =>$this->input->post('id') ),$data,'tb_user');
		if ($update) {
			if ($foto[0]==false) {
				$this->session->set_flashdata('gagal','toastr.error("Gagal dapat mengunggah foto.", "");');
			}
			 //log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Memperbaharui foto pengguna','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			$this->session->set_flashdata('alert','toastr.info("Berhasil memperbaharui data akun.", "");');
			redirect(base_url('Admin/profile'));
		}else {
			$this->session->set_flashdata('alert','toastr.info("Gagal memperbaharui data akun.", "");');
			redirect(base_url('Admin/profile'));
		}
	}
	public function blokir_user($id)
	{

		$data = array('blokir' => '1','mdate'=>date('Y-m-d H:i:s'),'m_by' =>$this->session->userdata('level')." - ".$this->session->userdata('nama'),
	);
		$update = $this->M_admin->update_data(array('id_user' =>$id ),$data,'tb_user');
		if ($update) {
			 //log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Memblokir pengguna','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			$this->session->set_flashdata('alert','toastr.info("Berhasil memblokir akun.", "");');
			redirect(base_url('Admin/profile'));
		}else {
			$this->session->set_flashdata('alert','toastr.info("Gagal memblokir akun.", "");');
			redirect(base_url('Admin/profile'));
		}
	}
	public function unblokir_user($id)
	{

		$data = array('blokir' => '0','mdate'=>date('Y-m-d H:i:s'),'m_by' =>$this->session->userdata('level')." - ".$this->session->userdata('nama'),
	);
		$update = $this->M_admin->update_data(array('id_user' =>$id ),$data,'tb_user');
		if ($update) {
			 //log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Mengaktifkan akun pengguna','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			$this->session->set_flashdata('alert','toastr.info("Berhasil mengaktifkan akun.", "");');
			redirect(base_url('Admin/profile'));
		}else {
			$this->session->set_flashdata('alert','toastr.info("Gagal mengaktifkan akun.", "");');
			redirect(base_url('Admin/profile'));
		}
	}
	public function hapus_user($id)
	{

		$data = array('del_flag' => '0','mdate'=>date('Y-m-d H:i:s'),'m_by' =>$this->session->userdata('level')." - ".$this->session->userdata('nama'),
	);
		$update = $this->M_admin->update_data(array('id_user' =>$id ),$data,'tb_user');
		if ($update) {
			 //log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Menghapus akun pengguna','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			$this->session->unset_userdata(array('iduser'));
			$this->session->set_flashdata('alert','toastr.info("Berhasil menghapus akun.", "");');
			redirect(base_url('Admin/pengguna'));
		}else {
			$this->session->set_flashdata('alert','toastr.info("Gagal menghapus akun.", "");');
			redirect(base_url('Admin/pengguna'));
		}
	}
	public function email()
	{
		$server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
		$this->M_admin->insert_data('tb_server_load',$server_load);

		$this->session->unset_userdata(array('iduser'));

		$data = array(
			'chart' => false,
			'map'=>false,
			'kunjungan' => count($this->db->where('flag','1')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_user' => count($this->db->where('flag','2')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_admin' => count($this->db->where('flag','3')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),

			'email' => $this->M_admin->get_all('tb_email_send',array('del_flag' => '1','dari' => $this->session->userdata('id') ,'c_by' => $this->session->userdata('level'),),'id_email','DESC'),
		);
		$this->template->admin('Admin/pesan/email',$data);
	}
	public function buat_email()
	{
		$this->session->unset_userdata(array('iduser'));

		$data = array(
			'chart' => false,
			'map'=>false,
			'kunjungan' => count($this->db->where('flag','1')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_user' => count($this->db->where('flag','2')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_admin' => count($this->db->where('flag','3')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),

			'admin'=> $this->M_admin->get_all('tb_admin',array('del_flag' => '1' ),'nama','ASC'),
			'pengguna'=> $this->M_admin->get_all('tb_user',array('del_flag' => '1', 'pekerjaan' => $this->session->userdata('bidang') ,'id_kab' => $this->session->userdata('id_kab')),'nama','ASC'),
		);
		$this->template->admin('Admin/pesan/new_email',$data);
	}
	public function send_mail()
	{
		$wh = array(
			'nama' => 'Email Gateway',
			'del_flag' => "1",
		);
		$smtp = $this->M_admin->cek_login("tb_config",$wh)->row();


		if ($this->input->post('parm')=='1')
		{
			$kode = round(microtime(true) * 1000);
			$config['upload_path'] = './assets/uploads/email/';
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
						'dari' => $this->session->userdata('id') ,
						'subjek' => $this->input->post('subjek'),
						'isi' => $this->input->post('isi'),
						'file' => $nama_file,
						'cdate' => date('Y-m-d H:i:s'),
						'c_by' => $this->session->userdata('level'),
					);

					$insert = $this->M_admin->insert_data('tb_email_send',$data);
					if ($insert) {
						$to =$this->input->post('to');
						for ($i=1; $i < count($to) ; $i++) {
							$dataTo = array('id_email' => $insert, 'to' =>$to[$i] );
							$this->M_admin->insert_data('tb_email_to',$dataTo);
						}

						$cc =$this->input->post('cc');
						if (!empty($cc)) {
							for ($i=1; $i < count($to) ; $i++) {
								$dataCc = array('id_email' => $insert, 'cc' =>$cc[$i] );
								$this->M_admin->insert_data('tb_email_cc',$dataCc);
							}
						}

						$bcc =$this->input->post('bcc');
						if (!empty($bcc)) {
							for ($i=1; $i < count($to) ; $i++) {
								$dataBcc = array('id_email' => $insert, 'bcc' =>$bcc[$i] );
								$this->M_admin->insert_data('tb_email_bcc',$dataBcc);
							}
						}

										//log aktifitas
						$log_aktifitas = array( 'keterangan'=>'Mengirim email','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
						$this->M_admin->insert_data('tb_log',$log_aktifitas);

						$this->session->set_flashdata('alert', 'toastr.info("Berhasil mengirim email.", "");');
						redirect(base_url("Admin/email"));
					}else {
						$this->session->set_flashdata('alert', 'toastr.info("Gagal membuat histori email.", "");');
						redirect(base_url("Admin/buat_email"));
					}
				}
			}
		}
		else {

			$config = Array(
				'protocol' => 'smtp',
				'smtp_host' =>  $smtp->value3,
				'smtp_port' => 465,
				'smtp_user' =>  $smtp->value1,
				'smtp_pass' =>  $smtp->value2,
				'mailtype' => 'html',
				'charset' => 'iso-8859-1'
			);
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from($smtp->value1, 'Pemetaan Hasil Bumi');
			$this->email->to($this->input->post('to'));
			$this->email->cc($this->input->post('cc'));
			$this->email->bcc($this->input->post('bcc'));
			$this->email->subject($this->input->post('subjek'));
			$this->email->message($this->input->post('isi'));
			if (!$this->email->send()) {
			//show_error($this->email->print_debugger());
				$this->session->set_flashdata('alert', 'toastr.info("Gagal mengirim email, coba beberapa saat lagi.", "");');
				redirect(base_url("Admin/buat_email"));
			}else{
				$data = array(
					'dari' => $this->session->userdata('id') ,
					'subjek' => $this->input->post('subjek'),
					'isi' => $this->input->post('isi'),
					'cdate' => date('Y-m-d H:i:s'),
					'c_by' => $this->session->userdata('level'),
				);

				$insert = $this->M_admin->insert_data('tb_email_send',$data);
				if ($insert) {
					$to =$this->input->post('to');
					for ($i=1; $i < count($to) ; $i++) {
						$dataTo = array('id_email' => $insert, 'to' =>$to[$i] );
						$this->M_admin->insert_data('tb_email_to',$dataTo);
					}

					$cc =$this->input->post('cc');
					if (!empty($cc)) {
						for ($i=1; $i < count($to) ; $i++) {
							$dataCc = array('id_email' => $insert, 'cc' =>$cc[$i] );
							$this->M_admin->insert_data('tb_email_cc',$dataCc);
						}
					}

					$bcc =$this->input->post('bcc');
					if (!empty($bcc)) {
						for ($i=1; $i < count($to) ; $i++) {
							$dataBcc = array('id_email' => $insert, 'bcc' =>$bcc[$i] );
							$this->M_admin->insert_data('tb_email_bcc',$dataBcc);
						}
					}

							//log aktifitas
					$log_aktifitas = array( 'keterangan'=>'Mengirim email','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
					$this->M_admin->insert_data('tb_log',$log_aktifitas);

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
		//log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Menghapus data email','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			echo "sukses";
		}else {
			echo "gagal";
		}
	}
	public function chat()
	{
		$server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
		$this->M_admin->insert_data('tb_server_load',$server_load);

		$this->session->unset_userdata(array('iduser'));

		$data = array(
			'chart' => false,
			'map'=>false,
			'kunjungan' => count($this->db->where('flag','1')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_user' => count($this->db->where('flag','2')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_admin' => count($this->db->where('flag','3')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'chat_room' => $this->M_admin->get_all('tb_chat_room',array('del_flag' =>'1','user_id'=>$this->session->userdata('level')."-".$this->session->userdata('id')),'id_chat_room','desc'),
			'user' => $this->M_admin->get_all('tb_user',array('del_flag' =>'1','pekerjaan' => $this->session->userdata('bidang'),'id_kab' => $this->session->userdata('id_kab')),'id_user','desc'),
			'admin' => $this->M_admin->get_all('tb_admin',array('del_flag' =>'1','blokir'=>'0'),'id_admin','desc'),

		);
		$this->template->admin('Admin/pesan/chat',$data);
	}
	public function notifChat()
	{
		$data_chat = array();
		$chatRoom =$this->M_admin->get_all('tb_chat_room',array('del_flag' =>'1','user_id'=>$this->session->userdata('level')."-".$this->session->userdata('id')),'id_chat_room','asc');
		foreach ($chatRoom as $cr) {
			$chat=$this->M_admin->get_where('tb_chat',array('room_id' => $cr->room_id,'recd'=>'1','del_flag'=>'1'))->result();
			foreach ($chat as $c) {
				if ($c->from!=$this->session->userdata('level')."-".$this->session->userdata('id')) {
					$dt = array('nama' =>tampil_nama_user($c->from) , 'level'=>tampil_id_level_user($c->from)[0] , 'pesan'=> $c->message,'foto'=>tampil_foto_user($c->from),'room_id'=>$c->room_id,'id'=>tampil_id_level_user($c->from)[1]);
					array_push($data_chat,$dt);
				}
			}
		}
		echo json_encode($data_chat);
	}
	public function readChat($room_id,$id_chat)
	{
		$chat=$this->M_admin->get_where('tb_chat',array('room_id' => $room_id))->result();
		foreach ($chat as $c) {
			if ($c->from!=$this->session->userdata('level')."-".$this->session->userdata('id')) {
				$update = $this->M_admin->update_data(array('id_chat' => $c->id_chat),array('recd' =>'0' , ),'tb_chat');
			}
		}

		$data = array(
			'chat' => $this->M_admin->get_all('tb_chat',array('del_flag' =>'1','room_id' => $room_id),'id_chat','desc') ,
			'room_id' =>$room_id,
		);
	 //log aktifitas
		$log_aktifitas = array( 'keterangan'=>'Membaca pesan chat','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
		$this->M_admin->insert_data('tb_log',$log_aktifitas);

		$this->load->view('Admin/pesan/box_chat',$data);
	}
	public function readChatReal($room_id)
	{
		$chat=$this->M_admin->get_where('tb_chat',array('room_id' => $room_id))->result();
		foreach ($chat as $c) {
			if ($c->from!=$this->session->userdata('level')."-".$this->session->userdata('id')) {
				$update = $this->M_admin->update_data(array('id_chat' => $c->id_chat),array('recd' =>'0' , ),'tb_chat');
			}
		}
	 //log aktifitas
		$log_aktifitas = array( 'keterangan'=>'Membaca pesan chat','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
		$this->M_admin->insert_data('tb_log',$log_aktifitas);

	}
	public function openSideChat($id_user)
	{
		$room_id="";
		$fchat=$this->M_admin->get_where('tb_chat',array('from' => "user-".$id_user,'del_flag'=>'1'))->result();
		foreach ($fchat as $fc) {
			if ($fc->to=$this->session->userdata('level')."-".$this->session->userdata('id')) {
				$chat=$this->M_admin->get_where('tb_chat',array('room_id' => $fc->room_id,'del_flag'=>'1'))->result();
				foreach ($chat as $c) {
					$room_id=$fc->room_id;
					if ($c->from!=$this->session->userdata('level')."-".$this->session->userdata('id')) {
						$update = $this->M_admin->update_data(array('id_chat' => $c->id_chat),array('recd' =>'0' , ),'tb_chat');
					}
				}
			}
		}


		if (empty($room_id)) {
			$fchat=$this->M_admin->get_where('tb_chat',array('to' => "user-".$id_user,'del_flag'=>'1'))->result();
			foreach ($fchat as $fc) {
				if ($fc->from=$this->session->userdata('level')."-".$this->session->userdata('id')) {
					$chat=$this->M_admin->get_where('tb_chat',array('room_id' => $fc->room_id,'del_flag'=>'1'))->result();
					foreach ($chat as $c) {
						$room_id=$fc->room_id;
					}
				}
			}
		}

		if (!empty($room_id)) {
			$data = array(
				'room_id' =>$room_id,
				'id'=>$id_user,
				'level'=>false

			);
		}else {
			$data = array(
				'room_id' =>false,
				'id'=>$id_user,
				'level'=>false

			);
		}
		$this->load->view('Admin/open_chat',$data);
	}
	public function openSideChatReal($id_user,$room_id,$level)
	{
		if (!empty($room_id)) {
			if ($level==1) {
				$lv ='user';
			}else {
				$lv='admin';
			}
			$data = array(
				'room_id' =>$room_id,
				'id'=>$id_user,
				'level'=>$lv

			);
		}else {
			$data = array(
				'room_id' =>false,
				'id'=>$id_user,
				'level'=>false
			);
		}
		$this->load->view('Admin/open_chat',$data);
	}
	public function isiSideChat($room_id)
	{
		$data = array(
			'chat' => $this->M_admin->get_all('tb_chat',array('del_flag' =>'1','room_id' => $room_id),'id_chat','desc') ,
		);
		$this->load->view('Admin/isi_chat',$data);
	}
	public function send_chat()
	{
		if (!empty($this->input->post('room_id'))) {
			$data = array(
				'message' =>$this->input->post('message') ,
				'from' => $this->session->userdata('level')."-".$this->session->userdata('id'),
				'room_id'=>$this->input->post('room_id'),
				'to'=>$this->input->post('to'),
				'sent' => date('Y-m-d H:i:s')
			);
			$insert=$this->M_admin->insert_data('tb_chat',$data);
			if ($insert) {
				//log aktifitas
				$log_aktifitas = array( 'keterangan'=>'Mengirim pesan chat','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
				$this->M_admin->insert_data('tb_log',$log_aktifitas);

				$dt= array('msg'=>'sukses', 'id'=> $insert, 'room_id'=>$this->input->post('room_id'));
				echo json_encode($dt);
			}else {
				$dt =array('msg'=>'gagal','id'=>'');
				echo json_encode($dt);
			}
		}else {
			$kode = round(microtime(true) * 1000);
			$data_room1 = array('room_id' => $kode,'user_id'=>$this->session->userdata('level')."-".$this->session->userdata('id'),'cdate'=>date('Y-m-d H:i:s') );
			$data_room2 = array('room_id' => $kode,'user_id'=>$this->input->post('to'),'cdate'=>date('Y-m-d H:i:s') );

			$craete_room1=$this->M_admin->insert_data('tb_chat_room',$data_room1);
			$craete_room2=$this->M_admin->insert_data('tb_chat_room',$data_room2);

			$data = array(
				'message' =>$this->input->post('message') ,
				'from' => $this->session->userdata('level')."-".$this->session->userdata('id'),
				'room_id'=>$kode,
				'to'=>$this->input->post('to'),
				'sent' => date('Y-m-d H:i:s')
			);
			$insert=$this->M_admin->insert_data('tb_chat',$data);
			if ($insert) {
				//log aktifitas
				$log_aktifitas = array( 'keterangan'=>'Mengirim pesan chat','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
				$this->M_admin->insert_data('tb_log',$log_aktifitas);

				$dt= array('msg'=>'sukses', 'id'=> $insert, 'room_id'=>$kode);
				echo json_encode($dt);
			}else {
				$dt =array('msg'=>'gagal','id'=>'');
				echo json_encode($dt);
			}
		}
	}
	public function deleteChat()
	{
		$data = array('del_flag' => '0' );
		$update = $this->M_admin->update_data(array('room_id' => $this->input->post('room_id')),$data,'tb_chat_room');
		if ($update) {
			//log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Menghapus pesan chat','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			echo "sukses";
		}else {
			echo "gagal";
		}
	}
	public function sms()
	{
		$server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
		$this->M_admin->insert_data('tb_server_load',$server_load);

		$this->session->unset_userdata(array('iduser','idadmin'));

		$data = array(
			'chart' => false,
			'map'=>false,
			'kunjungan' => count($this->db->where('flag','1')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_user' => count($this->db->where('flag','2')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_admin' => count($this->db->where('flag','3')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'sms' => $this->M_admin->get_all('tb_sms',array('del_flag' =>'1','id_admin'=>$this->session->userdata('id')),'id_sms','desc'),
			'user' => $this->M_admin->get_all('tb_user',array('del_flag' =>'1','blokir'=>'0'),'id_user','desc'),
			'admin' => $this->M_admin->get_all('tb_admin',array('del_flag' =>'1','blokir'=>'0'),'id_admin','desc'),



		);
		$this->template->admin('Admin/pesan/sms',$data);
	}
	public function send_broadcast_sms()
	{
		$ps=$this->input->post('message');
		$data_url=array();
		$to = '';

		$user = $this->M_admin->get_where('tb_user',array('del_flag' => '1','blokir'=>'0' ))->result();
		foreach ($user as $b) {
			$rep_nama = str_replace("[nama]", $b->nama,$ps);
			$rep_terbaru = str_replace("[terbaru]", base_url('Frontend/blogtags/0'),$rep_nama);
			$rep_terbaru_tani = str_replace("[terbaru-pertanian]", base_url('Frontend/blogtags/1'),$rep_terbaru);
			$rep_terbaru_ikan = str_replace("[terbaru-perikanan]", base_url('Frontend/blogtags/2'),$rep_terbaru_tani);
			$isi_pesan = str_replace("[terbaru-peternakan]", base_url('Frontend/blogtags/3'),$rep_terbaru_ikan);

			$url="https://reguler.zenziva.net/apps/smsapi.php?userkey=e4itsz&passkey=posyanduyusuf&nohp=".$b->telp."&pesan=".$isi_pesan;
			array_push($data_url,$url);
			$to= $to.= $b->id_user.',';
		}
		$data = array('message' => $ps, 'cdate'=>date('Y-m-d H:i:s'), 'id_admin'=>$this->session->userdata('id'), 'id_user'=>$to );
		$this->M_admin->insert_data('tb_sms',$data);
		echo json_encode($data_url);
	}
	public function deleteSMS()
	{
		$data = array('del_flag' => '0' );
		$update = $this->M_admin->update_data(array('id_sms' => $this->input->post('id')),$data,'tb_sms');
		if ($update) {
			//log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Menghapus pesan sms','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			echo "1";
		}else {
			echo "0";
		}
	}
	public function send_sms()
	{
		$ps=$this->input->post('message');
		$to = explode(',', $this->input->post('to'));
		$to_name = '';
		$data_url=array();

		for ($i=0; $i < count($to) ; $i++) {
			$user = $this->M_admin->get_where('tb_user',array('id_user' => $to[$i]))->row();
			$rep_nama = str_replace("[nama]", $user->nama,$ps);
			$rep_terbaru = str_replace("[terbaru]", base_url('Frontend/blogtags/0'),$rep_nama);
			$rep_terbaru_tani = str_replace("[terbaru-pertanian]", base_url('Frontend/blogtags/1'),$rep_terbaru);
			$rep_terbaru_ikan = str_replace("[terbaru-perikanan]", base_url('Frontend/blogtags/2'),$rep_terbaru_tani);
			$isi_pesan = str_replace("[terbaru-peternakan]", base_url('Frontend/blogtags/3'),$rep_terbaru_ikan);

			$url="https://reguler.zenziva.net/apps/smsapi.php?userkey=e4itsz&passkey=posyanduyusuf&nohp=".$user->telp."&pesan=".$isi_pesan;
			array_push($data_url,$url);
			$to_name= $to_name.= $user->id_user.',';
		}
		$data = array('message' => $ps, 'cdate'=>date('Y-m-d H:i:s'), 'id_admin'=>$this->session->userdata('id'), 'id_user'=>$to_name );
		$this->M_admin->insert_data('tb_sms',$data);
		echo json_encode($data_url);
	}
	public function blog($id=NULL)
	{
		$server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
		$this->M_admin->insert_data('tb_server_load',$server_load);

		$this->session->unset_userdata(array('iduser'));
		$where = array('del_flag'=>"1");
		$jml  = $this->db->order_by('id_news','DESC')->get_where('tb_news',$where);
	  // konfigurasi pagination
		$config['base_url'] = base_url().'Admin/blog';
		$config['total_rows'] = $jml->num_rows();
		$config['per_page'] = '6';
		$config['first_page'] = 'Awal';
		$config['last_page'] = 'Akhir';
		$config['next_page'] = '&laquo;';
		$config['prev_page'] = '&raquo;';

		$config['use_page_numbers'] = TRUE;
		$config['reuse_query_string'] = TRUE;

		$config['full_tag_open'] = '<ul class="pagination pagination-lg">';
		$config['full_tag_close'] = '</ul>';

		$config['first_link'] = '<i class="fa fa-angle-double-left"></i>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = '<i class="fa fa-angle-double-right"></i>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '<i class="fa fa-angle-right"></i>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '<i class="fa fa-angle-left"></i>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

	 //inisialisasi config
		$this->pagination->initialize($config);

	 //buat pagination
		$str_links = $this->pagination->create_links();
	  // $data['halaman'] = explode('&nbsp;',$str_links );
		// //tamplikan data
  	// $data['blog'] = $this->M_admin->ambil_blog($config['per_page'], $id);
		$data = array(
			'chart' => false,
			'map'=>false,
			'kunjungan' => count($this->db->where('flag','1')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_user' => count($this->db->where('flag','2')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_admin' => count($this->db->where('flag','3')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'blog'=>$this->M_admin->ambil_blog($config['per_page'], $id),
			'halaman'=>explode('&nbsp;',$str_links ),
			'warna' => array('style-primary-dark' , 'style-accent-dark','style-warning','style-accent','style-primary','style-gray-light','style-default-dark','style-gray-dark','style-default','style-success','style-info','style-danger','style-default-bright'),
			'liblog'=>'<li class="active">Blog</li>'
		);
		$this->template->admin('Admin/blog/myblog',$data);
	}
	public function myblog($id=NULL)
	{
		$server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
		$this->M_admin->insert_data('tb_server_load',$server_load);

		$this->session->unset_userdata(array('iduser'));
		$where = array('del_flag'=>"1",'id_admin'=>$this->session->userdata('id'));
		$jml  = $this->db->order_by('id_news','DESC')->get_where('tb_news',$where);
	  // konfigurasi pagination
		$config['base_url'] = base_url().'Admin/myblog';
		$config['total_rows'] = $jml->num_rows();
		$config['per_page'] = '6';
		$config['first_page'] = 'Awal';
		$config['last_page'] = 'Akhir';
		$config['next_page'] = '&laquo;';
		$config['prev_page'] = '&raquo;';

		$config['use_page_numbers'] = TRUE;
		$config['reuse_query_string'] = TRUE;

		$config['full_tag_open'] = '<ul class="pagination pagination-lg">';
		$config['full_tag_close'] = '</ul>';

		$config['first_link'] = '<i class="fa fa-angle-double-left"></i>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = '<i class="fa fa-angle-double-right"></i>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '<i class="fa fa-angle-right"></i>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '<i class="fa fa-angle-left"></i>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

	 //inisialisasi config
		$this->pagination->initialize($config);

	 //buat pagination
		$str_links = $this->pagination->create_links();
	  // $data['halaman'] = explode('&nbsp;',$str_links );
		// //tamplikan data
  	// $data['blog'] = $this->M_admin->ambil_blog($config['per_page'], $id);
		$data = array(
			'chart' => false,
			'map'=>false,
			'kunjungan' => count($this->db->where('flag','1')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_user' => count($this->db->where('flag','2')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_admin' => count($this->db->where('flag','3')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'blog'=>$this->M_admin->ambil_blog_saya($config['per_page'], $id),
			'halaman'=>explode('&nbsp;',$str_links ),
			'warna' => array('style-primary-dark' , 'style-accent-dark','style-warning','style-accent','style-primary','style-gray-light','style-default-dark','style-gray-dark','style-default','style-success','style-info','style-danger','style-default-bright'),
			'liblog'=>'<li><a href="'.base_url().'Admin/blog">Blog</a></li><li class="active">Blog Saya</li>'

		);
		$this->template->admin('Admin/blog/myblog',$data);
	}
	public function blogtags($tags,$id=NULL)
	{
		$server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
		$this->M_admin->insert_data('tb_server_load',$server_load);

		$this->session->unset_userdata(array('iduser'));
		$where = array('del_flag'=>"1");
		if ($tags==0) {
			$jml  = $this->db->order_by('id_news','DESC')->like('cdate', date('Y-m-d'))->get_where('tb_news',$where);
		}else {
			$jml  = $this->db->order_by('id_news','DESC')->like('bidang', $tags)->get_where('tb_news',$where);
		}
		// konfigurasi pagination
		$config['base_url'] = base_url().'Admin/blogtags/'.$tags;
		$config['total_rows'] = $jml->num_rows();
		$config['per_page'] = '6';
		$config['first_page'] = 'Awal';
		$config['last_page'] = 'Akhir';
		$config['next_page'] = '&laquo;';
		$config['prev_page'] = '&raquo;';

		$config['use_page_numbers'] = TRUE;
		$config['reuse_query_string'] = TRUE;

		$config['full_tag_open'] = '<ul class="pagination pagination-lg">';
		$config['full_tag_close'] = '</ul>';

		$config['first_link'] = '<i class="fa fa-angle-double-left"></i>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = '<i class="fa fa-angle-double-right"></i>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '<i class="fa fa-angle-right"></i>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '<i class="fa fa-angle-left"></i>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

	 //inisialisasi config
		$this->pagination->initialize($config);

	 //buat pagination
		$str_links = $this->pagination->create_links();

		if ($tags==0) {
			$litags='Terbaru';
		}elseif ($tags==1) {
			$litags='Pertanian';
		}elseif ($tags==2) {
			$litags='Perikanan';
		}else {
			$litags='Peternakan';
		}
		$data = array(
			'chart' => false,
			'map'=>false,
			'kunjungan' => count($this->db->where('flag','1')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_user' => count($this->db->where('flag','2')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_admin' => count($this->db->where('flag','3')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'blog'=>$this->M_admin->ambil_blog_tags($config['per_page'], $id,$tags),
			'halaman'=>explode('&nbsp;',$str_links ),
			'warna' => array('style-primary-dark' , 'style-accent-dark','style-warning','style-accent','style-primary','style-gray-light','style-default-dark','style-gray-dark','style-default','style-success','style-info','style-danger','style-default-bright'),
			'liblog'=>'<li><a href="'.base_url().'Admin/blog">Blog</a></li><li class="active">Kategori '.$litags.'</li>'

		);
		$this->template->admin('Admin/blog/myblog',$data);
	}
	public function create_post()
	{
		$server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
		$this->M_admin->insert_data('tb_server_load',$server_load);

		$data = array(
			'chart' => false,
			'map'=>false,
			'kunjungan' => count($this->db->where('flag','1')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_user' => count($this->db->where('flag','2')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_admin' => count($this->db->where('flag','3')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
		);
		$this->template->admin('Admin/blog/new_blog',$data);
	}
	public function detail_post($id)
	{
		$server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
		$this->M_admin->insert_data('tb_server_load',$server_load);

		$data = array(
			'chart' => false,
			'map'=>false,
			'kunjungan' => count($this->db->where('flag','1')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_user' => count($this->db->where('flag','2')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_admin' => count($this->db->where('flag','3')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'blog' => $this->M_admin->get_by_id_row('tb_news',array('id_news' => $id,'del_flag'=>'1' )) ,
			'komentar' => $this->M_admin->get_by_id('tb_komentar',array('id_news' => $id,'del_flag'=>'1' )) ,

		);
		$this->template->admin('Admin/blog/detail_blog',$data);
	}
	public function send_kometar()
	{
		$data = array(
			'id_news' => $this->input->post('id_news'),
			'isi' => sensor_text($this->input->post('isi',TRUE)),
			'cdate' => date('Y-m-d H:i:s'),
			'c_by' => $this->session->userdata('level').'-'.$this->session->userdata('id'),
		);
		$insert=$this->M_admin->insert_data('tb_komentar',$data);
		if ($insert) {
				//log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Mengirim komentar pada blog berita','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			$this->session->set_flashdata('alert','toastr.info("Berhasil menambahkan berita.", "");');
			redirect(base_url('Admin/detail_post/'.$this->input->post('id_news')));
		}else {
			$this->session->set_flashdata('alert','toastr.error("Gagal menambahkan berita.", "");');
			redirect(base_url('Admin/detail_post/'.$this->input->post('id_news')));
		}
	}
	public function deleteKomentar()
	{
		$data = array('del_flag' => '0','d_by'=>$this->session->userdata('level').'-'.$this->session->userdata('id'),'ddate'=>date('Y-m-d H:i:s'));
		$update = $this->M_admin->update_data(array('id_komentar' => $this->input->post('id_komentar')),$data,'tb_komentar');
		if ($update) {
			//log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Menghapus komentar pada blog berita','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			echo "1";
		}else {
			echo "0";
		}
	}
	public function deletePost()
	{
		$data = array('del_flag' => '0','d_by'=>$this->session->userdata('level').'-'.$this->session->userdata('id'),'ddate'=>date('Y-m-d H:i:s'));
		$update = $this->M_admin->update_data(array('id_news' => $this->input->post('id_news')),$data,'tb_news');
		if ($update) {
			//log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Menghapus blog berita','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			echo "1";
		}else {
			echo "0";
		}
	}
	public function edit_post($id)
	{
		$server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
		$this->M_admin->insert_data('tb_server_load',$server_load);

		$data = array(
			'chart' => false,
			'map'=>false,
			'kunjungan' => count($this->db->where('flag','1')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_user' => count($this->db->where('flag','2')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_admin' => count($this->db->where('flag','3')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'blog' => $this->M_admin->get_where('tb_news',array('del_flag' =>'1','id_news'=>$id))->row(),
		);

		$this->template->admin('Admin/blog/edit_blog',$data);
	}
	public function simpan_blog()
	{
		$k =$this->input->post('kategori');
		$bidang='';
		if (!empty($k)) {
			for ($i=0; $i < count($k) ; $i++) {
				$bidang=$bidang.=$k[$i].', ';
			}
		}
		$foto = $this->upload_img('img');
		if ($foto[0]==false) {
			$this->session->set_flashdata('alert','toastr.info("Gagal upload gambar.", "");');
			redirect(base_url('Admin/create_post'));
		}else {
			$data = array(
				'judul'=> sensor_text($this->input->post('judul',TRUE)),
				'isi'=> sensor_text($this->input->post('isi',TRUE)),
				'pesan_author'=> sensor_text($this->input->post('pesan',TRUE)),
				'bidang'=>$bidang,
				'gambar'=>$foto[1],
				'cdate' => date('Y-m-d H:i:s'),
				'id_admin'=>$this->session->userdata('id'),
				'c_by' => $this->session->userdata('level')." - ".$this->session->userdata('nama'),
				'id_prov'=>$this->session->userdata('id_prov'),
				'id_kab'=>$this->session->userdata('id_kab'),
			);
			$insert = $this->M_admin->insert_data('tb_news',$data);
			if ($insert) {
				//log aktifitas
				$log_aktifitas = array( 'keterangan'=>'Menambahkan berita baru','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
				$this->M_admin->insert_data('tb_log',$log_aktifitas);

				$this->session->set_flashdata('alert','toastr.info("Berhasil menambahkan berita.", "");');
				redirect(base_url('Admin/myblog'));
			}else {
				$this->session->set_flashdata('alert','toastr.error("Gagal menambahkan berita.", "");');
				redirect(base_url('Admin/myblog'));
			}
		}
	}
	public function update_blog()
	{
		$k =$this->input->post('kategori');
		$bidang='';
		if (!empty($k)) {
			for ($i=0; $i < count($k) ; $i++) {
				$bidang=$bidang.=$k[$i].', ';
			}
		}
		if ($this->input->post('parm')==1) {
			$foto = $this->upload_img('img');
			if ($foto[0]==true) {
				$r_file =$this->input->post('img_lama');
				unlink("./assets/uploads/$r_file");
			}else {
				$foto[1]=$this->input->post('img_lama');
			}
		}else {
			$foto[1]=$this->input->post('img_lama');
		}


		$data = array(
			'judul'=> sensor_text($this->input->post('judul',TRUE)),
			'isi'=> sensor_text($this->input->post('isi',TRUE)),
			'pesan_author'=> sensor_text($this->input->post('pesan',TRUE)),
			'bidang'=>$bidang,
			'gambar'=>$foto[1],
			'mdate' => date('Y-m-d H:i:s'),
			'id_admin'=>$this->session->userdata('id'),
			'm_by' => $this->session->userdata('level')." - ".$this->session->userdata('nama'),
			'id_prov'=>$this->session->userdata('id_prov'),
			'id_kab'=>$this->session->userdata('id_kab'),
		);
		$update = $this->M_admin->update_data(array('id_news' => $this->input->post('id_news')),$data,'tb_news');
		if ($update) {
			//log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Memperbaharui data berita','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			$this->session->set_flashdata('alert','toastr.info("Berhasil memperbaharui data berita.", "");');
			redirect(base_url('Admin/detail_post/'.$this->input->post('id_news')));
		}else {
			$this->session->set_flashdata('alert','toastr.info("Gagal memperbaharui data berita.", "");');
			redirect(base_url('Admin/edit_post/'.$this->input->post('id_news')));
		}

	}
	public function laporan()
	{
		$server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
		$this->M_admin->insert_data('tb_server_load',$server_load);

		$this->session->unset_userdata(array('iduser'));

		$ub_l= array();
		$ub_p= array();
		$ub_total= array();
		$p_panen= array();
		$p_belum_panen= array();
		$p_gagal_panen= array();
		$ub_produksi=array();
		$ub_produksi_gagal=array();
		$ub_produksi_belum=array();


		for ($i=1; $i <= 12; $i++) {
			if ($i<= 9) {
				$s='-0';
			}else {
				$s='-';
			}
			$dt_ub_l = count($this->M_admin->get_like_where('tb_user','cdate',date('Y').$s.$i,array('del_flag' =>'1' ,'pekerjaan'=>$this->session->userdata('bidang'), 'id_kab'=> $this->session->userdata('id_kab'), 'jk'=>'L' ))->result());
			array_push($ub_l,$dt_ub_l);
			$dt_ub_p= count($this->M_admin->get_like_where('tb_user','cdate',date('Y').$s.$i,array('del_flag' =>'1' ,'pekerjaan'=>$this->session->userdata('bidang'), 'id_kab'=> $this->session->userdata('id_kab'), 'jk'=>'P' ))->result());
			array_push($ub_p,$dt_ub_p);
			$dt_ub_total= count($this->M_admin->get_like_where('tb_user','cdate',date('Y').$s.$i,array('del_flag' =>'1','pekerjaan'=>$this->session->userdata('bidang'), 'id_kab'=> $this->session->userdata('id_kab') ))->result());
			array_push($ub_total,$dt_ub_total);

			$dt_produksi = count($this->M_admin->get_all_by_idkab_admin($this->session->userdata('id_kab'),$this->session->userdata('bidang'),date('Y').$s.$i,'1')->result());
			array_push($ub_produksi,$dt_produksi);
			$dt_produksi_gagal= count($this->M_admin->get_all_by_idkab_admin($this->session->userdata('id_kab'),$this->session->userdata('bidang'),date('Y').$s.$i,'2')->result());
			array_push($ub_produksi_gagal,$dt_produksi_gagal);
			$dt_produksi_belum= count($this->M_admin->get_all_by_idkab_admin($this->session->userdata('id_kab'),$this->session->userdata('bidang'),date('Y').$s.$i,'0')->result());
			array_push($ub_produksi_belum,$dt_produksi_belum);
		}



		$sampai = date('n');

		for ($i=1; $i <= $sampai; $i++) {
			if ($i<= 9) {
				$s='-0';
			}else {
				$s='-';
			}
			$dt_p_panen = count($this->M_admin->get_all_by_idkab_admin($this->session->userdata('id_kab'),$this->session->userdata('bidang'),date('Y').$s.$i,'1')->result());
			array_push($p_panen,$dt_p_panen);
			$dt_p_belum_panen = count($this->M_admin->get_all_by_idkab_admin($this->session->userdata('id_kab'),$this->session->userdata('bidang'),date('Y').$s.$i,'0')->result());
			array_push($p_belum_panen,$dt_p_belum_panen);
			$dt_p_gagal_panen = count($this->M_admin->get_all_by_idkab_admin($this->session->userdata('id_kab'),$this->session->userdata('bidang'),date('Y').$s.$i,'2')->result());
			array_push($p_gagal_panen,$dt_p_gagal_panen);
		}

		$data = array(
			'chart' => true,
			'map'=>true,
			'kunjungan' => count($this->db->where('flag','1')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_user' => count($this->db->where('flag','2')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_admin' => count($this->db->where('flag','3')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'ub_l'=>$ub_l,
			'ub_p'=>$ub_p,
			'ub_total'=>$ub_total,
			'p_panen'=>$p_panen,
			'p_gagal_panen'=>$p_gagal_panen,
			'p_belum_panen'=>$p_belum_panen,
			'total_user'=>count($this->M_admin->get_where('tb_user',array('del_flag' =>'1','pekerjaan'=>$this->session->userdata('bidang'), 'id_kab'=> $this->session->userdata('id_kab')))->result()),
			'total_user_l'=>count($this->M_admin->get_where('tb_user',array('del_flag' =>'1','pekerjaan'=>$this->session->userdata('bidang'), 'id_kab'=> $this->session->userdata('id_kab'), 'jk'=>'L' ))->result()),
			'total_user_p'=>count($this->M_admin->get_where('tb_user',array('del_flag' =>'1','pekerjaan'=>$this->session->userdata('bidang'), 'id_kab'=> $this->session->userdata('id_kab'), 'jk'=>'P' ))->result()),
			'total_user_aktif'=>count($this->M_admin->get_where('tb_user',array('del_flag' =>'1', 'blokir'=>'0','pekerjaan'=>$this->session->userdata('bidang'), 'id_kab'=> $this->session->userdata('id_kab') ))->result()),
			'total_user_blokir'=>count($this->M_admin->get_where('tb_user',array('del_flag' =>'1','blokir'=>'1','pekerjaan'=>$this->session->userdata('bidang'), 'id_kab'=> $this->session->userdata('id_kab') ))->result()),
			'ub_produksi' => $ub_produksi,
			'ub_produksi_belum' => $ub_produksi_belum,
			'ub_produksi_gagal' => $ub_produksi_gagal,
			'total_panen'=>count($this->M_admin->get_all_by_idkab_admin2($this->session->userdata('id_kab'),$this->session->userdata('bidang'),'1')->result()),
			'total_gagal_panen'=>count($this->M_admin->get_all_by_idkab_admin2($this->session->userdata('id_kab'),$this->session->userdata('bidang'),'2')->result()),
			'total_belum_panen'=>count($this->M_admin->get_all_by_idkab_admin2($this->session->userdata('id_kab'),$this->session->userdata('bidang'),'0')->result()),
			'icon' => $this->M_admin->get_where('tb_icon_map',array('del_flag' =>'1', 'bidang'=>$this->session->userdata('bidang')))->result(),


		);
			 //echo json_encode($data['p_belum_panen']);

		$this->template->admin('Admin/laporan/laporan',$data);
	}
	public function cari_lap_pericon($icon=null,$tahun=null)
	{
		$id = $this->session->userdata('id_kab');

		$data['produksi']= $this->M_admin->get_all_lap_produksi_by_iduser_by_kab($id,$tahun,$icon)->result();
		$this->load->view('Admin/pengguna/tabel_produksi',$data);

	}
	public function cari_lap_indeks($icon=null,$jenis=null,$tahun=null)
	{

		// $id = $this->session->userdata('iduser');
		// $user = $this->M_admin->get_where('tb_user',array('id_user' => $id, 'del_flag'=>'1' ))->row();
		$bidang = $this->session->userdata('bidang') ;
		$ic = $this->M_admin->get_where('tb_icon_map',array('id_icon' => $icon, 'del_flag'=>'1' ))->row();


		$produksi= array();
		for ($i=1; $i <= 12; $i++) {
			if ($i<= 9) {
				$o='-0';
			}else {
				$o='-';
			}
			if ($jenis==1) {
				$this->db->select_max('harga_perkilo_panen');
				$result = $this->db->like('tgl_panen',$tahun.$o.$i)->where('id_icon',$icon)->where('del_flag','1')->where('panen_flag','1')->where('bidang',$bidang)->get('tb_produksi')->row();
				if (!empty($result->harga_perkilo_panen)) {
					array_push($produksi,$result->harga_perkilo_panen);
				}else {
					array_push($produksi,'0');
				}
			}elseif ($jenis==2) {
				$dt_produksi = count($this->M_admin->get_like_where('tb_produksi','tgl_tanam',$tahun.$o.$i,array('del_flag' =>'1' ,'bidang'=>$bidang, 'id_icon'=> $icon))->result());
				array_push($produksi,$dt_produksi);
			}elseif ($jenis==3) {
				$dt_produksi = count($this->M_admin->get_like_where('tb_produksi','tgl_panen',$tahun.$o.$i,array('del_flag' =>'1' ,'bidang'=>$bidang,'id_icon'=> $icon , 'panen_flag'=>'1'))->result());
				array_push($produksi,$dt_produksi);
			}else {
				$dt_produksi = count($this->M_admin->get_like_where('tb_produksi','tgl_panen',$tahun.$o.$i,array('del_flag' =>'1' ,'bidang'=>$bidang,'id_icon'=> $icon , 'panen_flag'=>'2'))->result());
				array_push($produksi,$dt_produksi);
			}

		}

		if ($bidang=='1') {
			$label='Pertanian';
		}elseif ($bidang=='2') {
			$label='Perikanan';
		}else {
			$label='Peternakan';
		}
		if ($jenis=='1') {
			$title = 'Harga tertinggi perkilo / ekor';
		}elseif ($jenis=='2') {
			$title = 'penanaman';
		}elseif ($jenis=='3') {
			$title = 'Panen';
		}else {
			$title = 'Gagal panen';
		}



		$data = array(
			'produksi'=>$produksi,
			'label'=> $label,
			'title' => $title,
			'icon'=>array($ic->icon,$ic->nama ),
		);
		$this->load->view('Xyz/laporan/grafik_indeks',$data);
		// echo json_encode($data);

	}
	public function print_laporan()
	{
		$this->session->unset_userdata(array('iduser'));

		$ub_l= array();
		$ub_p= array();
		$ub_total= array();
		$p_panen= array();
		$p_belum_panen= array();
		$p_gagal_panen= array();
		$ub_produksi=array();
		$ub_produksi_gagal=array();
		$ub_produksi_belum=array();


		for ($i=1; $i <= 12; $i++) {
			if ($i<= 9) {
				$s='-0';
			}else {
				$s='-';
			}
			$dt_ub_l = count($this->M_admin->get_like_where('tb_user','cdate',date('Y').$s.$i,array('del_flag' =>'1' ,'pekerjaan'=>$this->session->userdata('bidang'), 'id_kab'=> $this->session->userdata('id_kab'), 'jk'=>'L' ))->result());
			array_push($ub_l,$dt_ub_l);
			$dt_ub_p= count($this->M_admin->get_like_where('tb_user','cdate',date('Y').$s.$i,array('del_flag' =>'1' ,'pekerjaan'=>$this->session->userdata('bidang'), 'id_kab'=> $this->session->userdata('id_kab'), 'jk'=>'P' ))->result());
			array_push($ub_p,$dt_ub_p);
			$dt_ub_total= count($this->M_admin->get_like_where('tb_user','cdate',date('Y').$s.$i,array('del_flag' =>'1','pekerjaan'=>$this->session->userdata('bidang'), 'id_kab'=> $this->session->userdata('id_kab') ))->result());
			array_push($ub_total,$dt_ub_total);

			$dt_produksi = count($this->M_admin->get_all_by_idkab_admin($this->session->userdata('id_kab'),$this->session->userdata('bidang'),date('Y').$s.$i,'1')->result());
			array_push($ub_produksi,$dt_produksi);
			$dt_produksi_gagal= count($this->M_admin->get_all_by_idkab_admin($this->session->userdata('id_kab'),$this->session->userdata('bidang'),date('Y').$s.$i,'2')->result());
			array_push($ub_produksi_gagal,$dt_produksi_gagal);
			$dt_produksi_belum= count($this->M_admin->get_all_by_idkab_admin($this->session->userdata('id_kab'),$this->session->userdata('bidang'),date('Y').$s.$i,'0')->result());
			array_push($ub_produksi_belum,$dt_produksi_belum);
		}



		$sampai = date('n');

		for ($i=1; $i <= $sampai; $i++) {
			if ($i<= 9) {
				$s='-0';
			}else {
				$s='-';
			}
			$dt_p_panen = count($this->M_admin->get_all_by_idkab_admin($this->session->userdata('id_kab'),$this->session->userdata('bidang'),date('Y').$s.$i,'1')->result());
			array_push($p_panen,$dt_p_panen);
			$dt_p_belum_panen = count($this->M_admin->get_all_by_idkab_admin($this->session->userdata('id_kab'),$this->session->userdata('bidang'),date('Y').$s.$i,'0')->result());
			array_push($p_belum_panen,$dt_p_belum_panen);
			$dt_p_gagal_panen = count($this->M_admin->get_all_by_idkab_admin($this->session->userdata('id_kab'),$this->session->userdata('bidang'),date('Y').$s.$i,'2')->result());
			array_push($p_gagal_panen,$dt_p_gagal_panen);
		}

		$data = array(
			'chart' => true,
			'map'=>true,
			'kunjungan' => count($this->db->where('flag','1')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_user' => count($this->db->where('flag','2')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_admin' => count($this->db->where('flag','3')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'ub_l'=>$ub_l,
			'ub_p'=>$ub_p,
			'ub_total'=>$ub_total,
			'p_panen'=>$p_panen,
			'p_gagal_panen'=>$p_gagal_panen,
			'p_belum_panen'=>$p_belum_panen,
			'total_user'=>count($this->M_admin->get_where('tb_user',array('del_flag' =>'1','pekerjaan'=>$this->session->userdata('bidang'), 'id_kab'=> $this->session->userdata('id_kab')))->result()),
			'total_user_l'=>count($this->M_admin->get_where('tb_user',array('del_flag' =>'1','pekerjaan'=>$this->session->userdata('bidang'), 'id_kab'=> $this->session->userdata('id_kab'), 'jk'=>'L' ))->result()),
			'total_user_p'=>count($this->M_admin->get_where('tb_user',array('del_flag' =>'1','pekerjaan'=>$this->session->userdata('bidang'), 'id_kab'=> $this->session->userdata('id_kab'), 'jk'=>'P' ))->result()),
			'total_user_aktif'=>count($this->M_admin->get_where('tb_user',array('del_flag' =>'1', 'blokir'=>'0','pekerjaan'=>$this->session->userdata('bidang'), 'id_kab'=> $this->session->userdata('id_kab'), 'jk'=>'L' ))->result()),
			'total_user_blokir'=>count($this->M_admin->get_where('tb_user',array('del_flag' =>'1','blokir'=>'1','pekerjaan'=>$this->session->userdata('bidang'), 'id_kab'=> $this->session->userdata('id_kab'), 'jk'=>'P' ))->result()),
			'ub_produksi' => $ub_produksi,
			'ub_produksi_belum' => $ub_produksi_belum,
			'ub_produksi_gagal' => $ub_produksi_gagal,
			'total_panen'=>count($this->M_admin->get_all_by_idkab_admin2($this->session->userdata('id_kab'),$this->session->userdata('bidang'),'1')->result()),
			'total_gagal_panen'=>count($this->M_admin->get_all_by_idkab_admin2($this->session->userdata('id_kab'),$this->session->userdata('bidang'),'2')->result()),
			'total_belum_panen'=>count($this->M_admin->get_all_by_idkab_admin2($this->session->userdata('id_kab'),$this->session->userdata('bidang'),'0')->result()),


		);
			// echo json_encode($data);

		$this->load->view('Admin/laporan/print_laporan',$data);
	}
	public function get_all_pengguna_aktif_pertanian()
	{
		$data=$this->M_admin->get_where('tb_user',array('pekerjaan' => '1', 'id_kab'=>$this->session->userdata('id_kab'), 'del_flag'=>'1' ))->result();
		echo json_encode($data);
	}
	public function get_all_pengguna_aktif_perikanan()
	{
		$data=$this->M_admin->get_where('tb_user',array('pekerjaan' => '2', 'id_kab'=>$this->session->userdata('id_kab'), 'del_flag'=>'1'  ))->result();
		echo json_encode($data);
	}
	public function get_all_pengguna_aktif_peternakan()
	{
		$data=$this->M_admin->get_where('tb_user',array('pekerjaan' => '3', 'id_kab'=>$this->session->userdata('id_kab'), 'del_flag'=>'1'  ))->result();
		echo json_encode($data);
	}
	public function pengaturan()
	{
		$server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
		$this->M_admin->insert_data('tb_server_load',$server_load);

		$this->session->unset_userdata(array('iduser'));

		$data = array(
			'chart' => false,
			'map'=>false,
			'kunjungan' => count($this->db->where('flag','1')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_user' => count($this->db->where('flag','2')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_admin' => count($this->db->where('flag','3')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'gateway' => $this->db->get('tb_config')->result(),
			'sensor' => $this->M_admin->get_where('tb_sensor_text',array('del_flag' =>'1','_rule'=>'1' ))->result(),
			'blok' => $this->M_admin->get_where('tb_sensor_text',array('del_flag' =>'1','_rule'=>'2' ))->result(),
			'icon' => $this->M_admin->get_where('tb_icon_map',array('del_flag' =>'1'))->result(),
			'hadiah' => $this->M_admin->get_where('tb_hadiah_point',array('del_flag' =>'1'))->result(),
		);
		$this->template->admin('Admin/pengaturan/pengaturan',$data);
	}
	public function point()
	{
		$server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
		$this->M_admin->insert_data('tb_server_load',$server_load);

		$this->session->unset_userdata(array('iduser'));

		$data = array(
			'chart' => false,
			'map'=>false,
			'kunjungan' => count($this->db->where('flag','1')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_user' => count($this->db->where('flag','2')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_admin' => count($this->db->where('flag','3')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'tukar_point' => $this->db->from('tb_tukar_point')->where('id_admin',$this->session->userdata('id'))->like('cdate',date('Y')."-")->get()->result(),
			'hadiah' => $this->M_admin->get_where('tb_hadiah_point',array('del_flag' =>'1'))->result(),
		);
		$this->template->admin('Admin/point/point',$data);
	}
	public function edit_sensor($id)
	{
		$dt = $this->M_admin->get_by_id_ajax_api('tb_sensor_text','id_sensor',$id);
		echo json_encode($dt);
	}
	public function edit_hadiah($id)
	{
		$dt = $this->M_admin->get_by_id_ajax_api('tb_hadiah_point','id_hadiah_point',$id);
		echo json_encode($dt);
	}
	public function tambah_hadiah()
	{
		$data = array(
			'hadiah' => $this->input->post('hadiah'),
			'point'=>$this->input->post('point'),
			'id_admin'=>$this->session->userdata('id'),
			'del_flag'=>'1',
			'cdate'=>date('Y-m-d H:i:s')
		);
		$insert = $this->M_admin->insert_data('tb_hadiah_point',$data);
		if ($insert) {
			//log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Menambahkan data hadiah point','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			$this->session->set_flashdata('alert','toastr.info("Berhasil menambahkan data hadiah point.", "");');
			if ($this->input->post('hal')=='1') {
				redirect(base_url('Admin/pengaturan'));
			}else {
				redirect(base_url('Admin/point'));
			}

		}else {
			$this->session->set_flashdata('alert','toastr.info("Gagal menambahkan data hadiah point.", "");');
			if ($this->input->post('hal')=='1') {
				redirect(base_url('Admin/pengaturan'));
			}else {
				redirect(base_url('Admin/point'));
			}
		}
	}
	public function tambah_sensor()
	{
		$data = array(
			'_text' => $this->input->post('_text'),
			'_replace'=>$this->input->post('_replace'),
			'_rule'=>'1',
			'del_flag'=>'1'
		);
		$insert = $this->M_admin->insert_data('tb_sensor_text',$data);
		if ($insert) {
			//log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Menambahkan data sensor kata','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			$this->session->set_flashdata('alert','toastr.info("Berhasil menambahkan data sensor kata.", "");');
			redirect(base_url('Admin/pengaturan'));
		}else {
			$this->session->set_flashdata('alert','toastr.info("Gagal menambahkan data sensor kata.", "");');
			redirect(base_url('Admin/pengaturan'));
		}
	}
	public function tambah_blok()
	{
		$data = array(
			'_text' => $this->input->post('_text'),
			'_rule'=>'2',
			'del_flag'=>'1'
		);
		$insert = $this->M_admin->insert_data('tb_sensor_text',$data);
		if ($insert) {
			//log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Menambahkan data sensor kata','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			$this->session->set_flashdata('alert','toastr.info("Berhasil menambahkan data sensor kata.", "");');
			redirect(base_url('Admin/pengaturan'));
		}else {
			$this->session->set_flashdata('alert','toastr.info("Gagal menambahkan data sensor kata.", "");');
			redirect(base_url('Admin/pengaturan'));
		}
	}
	public function update_sensor()
	{
		$data = array(
			'_text' => $this->input->post('_text'),
			'_replace'=>$this->input->post('_replace'),
		);
		$update = $this->M_admin->update_data(array('id_sensor' => $this->input->post('id_sensor')),$data,'tb_sensor_text');
		if ($update) {
			//log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Memperbaharui data sensor kata','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			$this->session->set_flashdata('alert','toastr.info("Berhasil memperbaharui data sensor kata.", "");');
			redirect(base_url('Admin/pengaturan'));
		}else {
			$this->session->set_flashdata('alert','toastr.info("Gagal memperbaharui data sensor kata.", "");');
			redirect(base_url('Admin/pengaturan'));
		}
	}
	public function update_hadiah()
	{
		$data = array(
			'hadiah' => $this->input->post('hadiah'),
			'point'=>$this->input->post('point'),
		);
		$update = $this->M_admin->update_data(array('id_hadiah_point' => $this->input->post('id_hadiah')),$data,'tb_hadiah_point');
		if ($update) {
			//log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Memperbaharui data hadiah point','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			$this->session->set_flashdata('alert','toastr.info("Berhasil memperbaharui data hadiah point.", "");');
			if ($this->input->post('hal')=='1') {
				redirect(base_url('Admin/pengaturan'));
			}else {
				redirect(base_url('Admin/point'));
			}
		}else {
			$this->session->set_flashdata('alert','toastr.info("Gagal memperbaharui data hadiah point.", "");');
			if ($this->input->post('hal')=='1') {
				redirect(base_url('Admin/pengaturan'));
			}else {
				redirect(base_url('Admin/point'));
			}
		}
	}
	public function update_blok()
	{
		$data = array(
			'_text' => $this->input->post('_text'),
		);
		$update = $this->M_admin->update_data(array('id_sensor' => $this->input->post('id_sensor')),$data,'tb_sensor_text');
		if ($update) {
			//log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Memperbaharui data blokir kata','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			$this->session->set_flashdata('alert','toastr.info("Berhasil memperbaharui data blokir kata.", "");');
			redirect(base_url('Admin/pengaturan'));
		}else {
			$this->session->set_flashdata('alert','toastr.info("Gagal memperbaharui data blokir kata.", "");');
			redirect(base_url('Admin/pengaturan'));
		}
	}
	public function deleteSensor()
	{
		$data = array('del_flag' => '0' );
		$update = $this->M_admin->update_data(array('id_sensor' => $this->input->post('id_sensor')),$data,'tb_sensor_text');
		if ($update) {
			//log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Menghapus data sensor/blokir kata','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			echo "sukses";
		}else {
			echo "gagal";
		}
	}
	public function deleteHadiah()
	{
		$data = array('del_flag' => '0' );
		$update = $this->M_admin->update_data(array('id_hadiah_point' => $this->input->post('id_hadiah_point')),$data,'tb_hadiah_point');
		if ($update) {
			//log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Menghapus data hadiah point','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			echo "sukses";
		}else {
			echo "gagal";
		}
	}
	public function tukarAct()
	{
		if ($this->input->post('str')=='1') {
			$data = array('flag_status' => '1' );
			$ket ='Menerima penukaran point';
		}else {
			$data = array('flag_status' => '2' );
			$ket ='Menolak penukaran point';
		}
		$update = $this->M_admin->update_data(array('id_tukar_point' => $this->input->post('id')),$data,'tb_tukar_point');
		if ($update) {
			//log aktifitas
			$log_aktifitas = array( 'keterangan'=>$ket,'nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			echo "sukses";
		}else {
			echo "gagal";
		}
	}
	public function update_realtime_chat()
	{
		if ($this->input->post('value1')[0]=='true') {
			$d='true';
		}else {
			$d='false';
		}
		$data = array(
			'value1' => $d,
			'value2' => $this->input->post('value2'),
		);
		$update = $this->M_admin->update_data(array('id_config' => $this->input->post('id')),$data,'tb_config');
		if ($update) {
			//log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Memperbaharui data Realtime chat','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			$this->session->set_flashdata('alert','toastr.info("Berhasil memperbaharui data Realtime chat.", "");');
			redirect(base_url('Admin/pengaturan'));
		}else {
			$this->session->set_flashdata('alert','toastr.info("Gagal memperbaharui data Realtime chat.", "");');
			redirect(base_url('Admin/pengaturan'));
		}

	}
	public function myprofile()
	{
		$server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
		$this->M_admin->insert_data('tb_server_load',$server_load);

		$this->session->unset_userdata(array('iduser'));
		$id = $this->session->userdata('id');
		$admin = $this->M_admin->get_where('tb_admin',array('id_admin' => $id, 'del_flag'=>'1' ))->row();

		$data = array(
			'chart' => false,
			'map'=>false,
			'kunjungan' => count($this->db->where('flag','1')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_user' => count($this->db->where('flag','2')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_admin' => count($this->db->where('flag','3')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'id'=>$this->session->userdata('id'),
			'username' => $this->session->userdata('username'),
			'foto'=>$this->session->userdata('foto'),
			'data' => $this->M_admin->get_where('tb_admin',array('del_flag' =>'1','id_admin'=>$id ))->row(),
			'log' => $this->M_admin->get_where('tb_log',array('id' =>$this->session->userdata('id'),'jabatan'=>$this->session->userdata('level') ))->result(),
			'url'=>base_url('Admin/update_akun_profil'),
			'url_foto'=>base_url('Admin/update_foto_profil'),
			'prov'=>$this->M_admin->get_all_provinsi(),

		);
		$this->template->admin('Admin/profil/profil',$data);
	}
	public function update_akun_profil()
	{
		if ($this->input->post('password')=="") {
			$data = array('username' => $this->input->post('username'),'mdate'=>date('Y-m-d H:i:s'),'m_by' =>$this->session->userdata('level')." - ".$this->session->userdata('nama'));
		}else {
			$data = array('username' => $this->input->post('username'),'password'=>md5($this->input->post('password')),'mdate'=>date('Y-m-d H:i:s'),
				'm_by' =>$this->session->userdata('level')." - ".$this->session->userdata('nama'),
			);
		}

		$update = $this->M_admin->update_data(array('id_admin' =>$this->input->post('id') ),$data,'tb_admin');
		if ($update) {
			 //log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Memperbaharui akun profil','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			$sess = array(
				'username' => $this->input->post('username')
			);
			$this->session->set_userdata($sess);
			$this->session->set_flashdata('alert','toastr.info("Berhasil memperbaharui data akun.", "");');
			redirect(base_url('Admin/myprofile'));
		}else {
			$this->session->set_flashdata('alert','toastr.info("Gagal memperbaharui data akun.", "");');
			redirect(base_url('Admin/myprofile'));
		}
	}
	public function update_foto_profil()
	{
		$foto = $this->upload_img('img');
		if ($foto[0]==true) {
			$r_file =$this->input->post('foto_lama');
			unlink("./assets/uploads/$r_file");
		}else {
			$foto[1]=$this->input->post('foto_lama');
		}

		$data = array(
			'foto' => $foto[1],
			'mdate'=>date('Y-m-d H:i:s'),
			'm_by' =>$this->session->userdata('level')." - ".$this->session->userdata('nama'),
		);


		$update = $this->M_admin->update_data(array('id_admin' =>$this->input->post('id') ),$data,'tb_admin');
		if ($update) {
			if ($foto[0]==false) {
				$this->session->set_flashdata('gagal','toastr.error("Gagal dapat mengunggah foto.", "");');
			}
			 //log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Memperbaharui data foto akun profil','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			$this->session->set_flashdata('alert','toastr.info("Berhasil memperbaharui data akun.", "");');
			$sess = array(
				'foto' => $foto[1],
			);
			$this->session->set_userdata($sess);
			redirect(base_url('Admin/myprofile'));
		}else {
			$this->session->set_flashdata('alert','toastr.info("Gagal memperbaharui data akun.", "");');
			redirect(base_url('Admin/myprofile'));
		}
	}
	public function update_info_profil()
	{
		$string =str_replace("-", "",$this->input->post('telp'));
		$telp =str_replace("_", "",$string);
		$data = array(
			'nama' => $this->input->post('nama'),
			'telp' => $telp,
			'email' => $this->input->post('email'),
			'id_prov' => $this->input->post('id_prov'),
			'id_kab' => $this->input->post('id_kab'),
		);
		$update = $this->M_admin->update_data(array('id_admin' =>$this->session->userdata('id') ),$data,'tb_admin');
		if ($update) {
				//log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Memperbaharui data info profil','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			$sess = array(
				'nama' => $this->input->post('nama')
			);
			$this->session->set_userdata($sess);
			$this->session->set_flashdata('alert','toastr.info("Berhasil memperbaharui info.", "");');
			redirect(base_url('Admin/myprofile'));
		}else {
			$this->session->set_flashdata('alert','toastr.info("Gagal memperbaharui info.", "");');
			redirect(base_url('Admin/myprofile'));
		}
	}
	function ajax_kabupaten($id_prov){
		$query = $this->db->get_where('tb_wilayah_kabupaten',array('provinsi_id'=>$id_prov));
		$data = "<option value=''>- Pilih Kabupaten -</option>";
		foreach ($query->result() as $value) {
			$data .= "<option value='".$value->id_kab."'>".$value->nama."</option>";
		}
		echo $data;
	}

	public function update_point()
	{
		$data = array('point' => $this->input->post('point'),'date' => date('Y-m-d H:i:s') );
		$update = $this->M_admin->update_data(array('id_config_point' => $this->input->post('id')),$data,'tb_config_point');
		if ($update) {
			//log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Memperbaharui Point','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			$this->session->set_flashdata('alert','toastr.info("Berhasil memperbaharui point.", "");');
			if ($this->input->post('hal')=='1') {
				redirect(base_url('Admin/pengaturan'));
			}else {
				redirect(base_url('Admin/point'));
			}
		}else {
			$this->session->set_flashdata('alert','toastr.info("Gagal memperbaharui point.", "");');
			if ($this->input->post('hal')=='1') {
				redirect(base_url('Admin/pengaturan'));
			}else {
				redirect(base_url('Admin/point'));
			}
		}

	}
	public function bantuan()
	{
		$server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
		$this->M_admin->insert_data('tb_server_load',$server_load);

		$data = array(
			'chart' => false,
			'map'=>false,
			'kunjungan' => count($this->db->where('flag','1')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_user' => count($this->db->where('flag','2')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_admin' => count($this->db->where('flag','3')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
		);
		$this->template->user('Admin/bantuan',$data);
	}




	public function get_canvas()
	{
		return $this->load->view('Admin/canvas');
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
	public function upload_icon($value)
	{
		$kode = round(microtime(true) * 1000);
		$config['upload_path'] = './assets/uploads/icon/';
		$config['allowed_types'] = 'jpg|png|jpeg|ico';
		$config['max_size']	= '1000';
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
