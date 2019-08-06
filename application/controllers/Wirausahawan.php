<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wirausahawan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->model('M_admin');
		$this->load->helper('penolong');
		$this->load->helper('url');
		$this->load->helper(array('Form', 'Cookie', 'String'));


		if ($this->session->userdata('level')!= 'wirausahawan') {
			redirect(base_url().'Auth');
		}
	}
	public function index()
	{

		$server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
		$this->M_admin->insert_data('tb_server_load',$server_load);

		$ub_produksi=array();

		for ($i=1; $i <= 12; $i++) {
			if ($i<= 9) {
				$s='-0';
			}else {
				$s='-';
			}
			$dt_produksi = count($this->M_admin->get_all_by_iduser2($this->session->userdata('id'),date('Y').$s.$i,'1')->result());
			array_push($ub_produksi,$dt_produksi);
		}
		$date=date('Y-m-d');
		$data = array(
			'chart' => true,
			'map'=>false,
			'kunjungan' => count($this->db->where('flag','1')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_user' => count($this->db->where('flag','2')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_admin' => count($this->db->where('flag','3')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'ub_total'=>$ub_produksi,
			'total_user'=>count($this->M_admin->get_where('tb_user',array('del_flag' =>'1','pekerjaan'=>$this->session->userdata('bidang'), 'id_kab'=> $this->session->userdata('id_kab')))->result()),
			'total_user_l'=>count($this->M_admin->get_where('tb_user',array('del_flag' =>'1','jk'=>'L','pekerjaan'=>$this->session->userdata('bidang'), 'id_kab'=> $this->session->userdata('id_kab') ))->result()),
			'total_user_p'=>count($this->M_admin->get_where('tb_user',array('del_flag' =>'1','jk'=>'P','pekerjaan'=>$this->session->userdata('bidang'), 'id_kab'=> $this->session->userdata('id_kab') ))->result()),
			'produk' => $this->M_admin->get_where('tb_produk',array('deleted' =>'0','id_wirausahawan' =>$this->session->userdata('id')))->result(),
			'coupon' => $this->M_admin->get_where('tb_tukar_point',array('reedemby' =>$this->session->userdata('id')))->result(),

		);
		$this->template->wirausahawan('Wirausahawan/dashboard/wirausahawan',$data);
	}

	public function tambah_produk()
	{
		$kode = round(microtime(true) * 1000);
		$config['upload_path'] = './assets/uploads/produk/';
		$config['allowed_types'] = 'jpg|png|jpeg|ico';
		$config['max_size']	= 1024*5;
		$config['file_name'] = $kode;
		$this->upload->initialize($config);
		$this->upload->do_upload('foto');
		
		$fn = $this->upload->data();
		$gambar = $fn['file_name'];



		$data = array(
			'nama' => $this->input->post('nama'),
			'produsen' => $this->input->post('produsen'),
			'satuan' => $this->input->post('satuan'),
			'jumlah' => $this->input->post('jumlah'),
			'harga' => $this->input->post('harga'),
			'foto'=>$gambar,
			'id_wirausahawan'=>$this->session->userdata('id'),
			'deleted'=>'0'
		);
		$insert = $this->M_admin->insert_data('tb_produk',$data);
		if ($insert) {
			if ($foto[0]==false) {
				$this->session->set_flashdata('produk_gagal','toastr.danger("Gagal upload gambar produk.", "");');
			}
			//log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Menambahkan produk baru','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			$this->session->set_flashdata('alert','toastr.info("Berhasil menambahkan produk baru.", "");');
			redirect(base_url('Wirausahawan'));
		}else {
			$this->session->set_flashdata('alert','toastr.info("Gagal menambahkan produk baru.", "");');
			redirect(base_url('Wirausahawan'));
		}
	}

	public function upload_produk($value)
	{
		$kode = round(microtime(true) * 1000);
		$config['upload_path'] = './assets/uploads/produk/';
		$config['allowed_types'] = 'jpg|png|jpeg|ico';
		$config['max_size']	= 1024*5;
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

	public function peta()
	{

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
		$this->template->user('User/peta/peta',$data);
	}
	public function insert_produksi()
	{
		$data = array(
			'bidang' 					=> $this->session->userdata('pekerjaan') ,
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

			//update point
			$user = $this->M_admin->get_by_id_row('tb_user',array('id_user'=>$this->session->userdata('id')));
			$admin = $this->db->limit(1)->get_where('tb_admin',array('id_kab' => $this->session->userdata('id_kab'), 'del_flag'=>'1' ))->row();
			$cpoint = $this->db->get_where('tb_config_point',array('id_admin' => $admin->id_admin))->row();
			$sisa = $user->point + $cpoint->point;
			$this->M_admin->update_data(array('id_user' => $this->session->userdata('id')),array('point'=>$sisa),'tb_user');

			$this->session->set_flashdata('alert','toastr.info("Berhasil menambahkan produksi baru.", "");');
			redirect(base_url('User/peta'));
		}else {
			$this->session->set_flashdata('alert','toastr.error("Gagal menambahkan produksi baru.", "");');
			redirect(base_url('User/peta'));
		}
	}

	public function tambah_catatan($value='')
	{
		$data['id_user'] = $this->session->userdata('id');
		$data['id_produksi'] = $this->input->post('id_produksi');
		$data['catatan'] = $this->input->post('catatan');

		if ($data['catatan']=="other") {
			$data['catatan'] = $this->input->post('catatan2');			
		}else{
			$data['catatan'] = $this->input->post('catatan');			
		}

		$data['pengeluaran'] = $this->input->post('pengeluaran');

		$this->M_admin->insert_data('tb_catatan',$data);
		redirect('User/catatan/');


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
		$data=$this->M_admin->get_by_id_user_byx($this->session->userdata('id'),'1')->result();
		echo json_encode($data);
	}
	public function get_all_mydata_belum()
	{
		$data=$this->M_admin->get_by_id_user_byx($this->session->userdata('id'),'0')->result();
		echo json_encode($data);
	}
	public function get_all_mydata_gagal()
	{
		$data=$this->M_admin->get_by_id_user_byx($this->session->userdata('id'),'2')->result();
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

	public function update_produk()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'produsen'=>$this->input->post('produsen'),
			'harga'=>$this->input->post('harga'),
			'jumlah'=>$this->input->post('jumlah'),
			'satuan'=>$this->input->post('satuan')
		);
		$update = $this->M_admin->update_data(array('id_produk' => $this->input->post('id_produk')),$data,'tb_produk');
		if ($update) {
			//log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Memperbaharui data produk','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			$this->session->set_flashdata('alert','toastr.info("Berhasil memperbaharui data produk kata.", "");');
			redirect(base_url('Wirausahawan'));
		}else {
			$this->session->set_flashdata('alert','toastr.info("Gagal memperbaharui data produk.", "");');
			redirect(base_url('Wirausahawan'));
		}
	}

	public function deleteProduk()
	{
		$data = array('deleted' => '1' );
		$update = $this->M_admin->update_data(array('id_produk' => $this->input->post('id_produk')),$data,'tb_produk');
		if ($update) {
			//log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Menghapus data produk','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			echo "sukses";
		}else {
			echo "gagal";
		}
	}

	public function reedem_kupon()
	{
		
		$cek = $this->M_admin->get_where('tb_tukar_point',array('kode' => $this->input->post('kode')));

		if ($cek->num_rows() > 0) {
			$kupon = $cek->row();
			if ($kupon->reedemby == null) {
				$data = array('reedemby' => $this->session->userdata('id'),
					'flag_status' => '2' );
				$update = $this->M_admin->update_data(array('kode' => $this->input->post('kode')),$data,'tb_tukar_point');
				if ($update) {
			//log aktifitas
					$log_aktifitas = array( 'keterangan'=>'Reedem kupon','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
					$this->M_admin->insert_data('tb_log',$log_aktifitas);
					$this->session->set_flashdata('alert','toastr.info("Kupon Berhasil di Reedem.", "");');
					redirect(base_url('Wirausahawan'));
				}else {
					$this->session->set_flashdata('alert','toastr.info("Gagal Reedem Kupon.", "");');
					redirect(base_url('Wirausahawan'));
				}
			}else{
				$this->session->set_flashdata('alert','toastr.info("Kupon Kadaluarsa.", "");');
				redirect(base_url('Wirausahawan'));
			}
		}else{
			$this->session->set_flashdata('alert','toastr.info("Kupon Tidak Valid.", "");');
			redirect(base_url('Wirausahawan'));
		}
	}

	public function edit_produk($id)
	{
		$dt = $this->M_admin->get_by_id_ajax_api('tb_produk','id_produk',$id);
		echo json_encode($dt);
	}

	public function edit_produksi($id)
	{
		$data = array('icon' => $this->M_admin->get_where('tb_icon_map',array('del_flag' =>'1'))->result(),
			'data'=>$this->M_admin->get_by_id_bidang($id)->result(),
		);

		$tampil= $this->load->view('User/peta/canvas_detail',$data );
		return $tampil;
	}
	public function detail_produksi($id)
	{
		$data = array('icon' => $this->M_admin->get_where('tb_icon_map',array('del_flag' =>'1'))->result(),
			'data'=>$this->M_admin->get_by_id_bidang($id)->result(),
		);

		$tampil= $this->load->view('User/peta/canvas_detail_lihat',$data);
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

			$this->session->set_flashdata('alert','toastr.success("Berhasil memperbaharui lokasi peta.", "");');
			redirect(base_url('User/peta'));
		}else {
			$this->session->set_flashdata('alert','toastr.danger("Gagal memperbaharui lokasi peta.", "");');
			redirect(base_url('User/peta'));
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

			$this->session->set_flashdata('alert','toastr.success("Berhasil memperbaharui data produksi.", "");');
			redirect(base_url('User/peta'));
		}else {
			$this->session->set_flashdata('alert','toastr.danger("Gagal memperbaharui data produksi.", "");');
			redirect(base_url('User/peta'));
		}
	}
	public function catatan()
	{
		$server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
		$this->M_admin->insert_data('tb_server_load',$server_load);
		$id = $this->session->userdata('id');
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
				'url'=>base_url('User/update_akun_user'),
				'url_foto'=>base_url('User/update_foto_user'),
				'produksi'=> $this->M_admin->get_all_lap_produksi_by_iduser2($id)->result(),
				'produksi_select'=> $this->M_admin->get_all_select_produksi($id)->result(),
				'p_panen'=>$p_panen,
				'catatan'=>$this->M_admin->ambil_catatan($id,'10s',null)->result(),
				'panen'=>$this->M_admin->ambil_history_panen($id,'5',null)->result(),
				'log'=>$this->M_admin->ambil_log_user('10', null),

			);
			$this->template->user('User/pengguna/catatan',$data);

			// echo json_encode($data['catatan']);
		}else {
			$data = array(
				'chart' => false,
				'map'=>false,
				'kunjungan' => count($this->db->where('flag','1')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
				'login_user' => count($this->db->where('flag','2')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
				'login_admin' => count($this->db->where('flag','3')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			);
			$this->template->user('template/error_404',$data);
		}

	}

	public function profile()
	{
		$server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
		$this->M_admin->insert_data('tb_server_load',$server_load);
		$id = $this->session->userdata('id');
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
				'url'=>base_url('User/update_akun_user'),
				'url_foto'=>base_url('User/update_foto_user'),
				'produksi'=> $this->M_admin->get_all_lap_produksi_by_iduser2($id)->result(),
				'p_panen'=>$p_panen,
				'panen'=>$this->M_admin->ambil_history_panen($id,'5',null)->result(),
				'log'=>$this->M_admin->ambil_log_user('10', null),

			);
			$this->template->user('User/pengguna/profile',$data);
		}else {
			$data = array(
				'chart' => false,
				'map'=>false,
				'kunjungan' => count($this->db->where('flag','1')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
				'login_user' => count($this->db->where('flag','2')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
				'login_admin' => count($this->db->where('flag','3')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			);
			$this->template->user('template/error_404',$data);
		}

	}

	public function scroll_history_panen($str=NULL)
	{
		$jml  = $this->M_admin->get_all_produksi_by_iduser($this->session->userdata('id'))->num_rows();
		$data = array(
			'panen'=>$this->M_admin->ambil_history_panen($this->session->userdata('id'),'5',$str)->result(),
		);
		if ($str>=$jml) {
			echo "0";
		}else {
			$tampil = $this->load->view('User/pengguna/scroll_history_panen',$data,TRUE);
			echo $tampil;
		}
	}
	public function scroll_log($str=NULL)
	{
		$where = array('jabatan' => 'user','id'=>$this->session->userdata('id'));
		$jml  = $this->db->order_by('id_log','DESC')->get_where('tb_log',$where)->num_rows();
		$data = array(
			'log'=>$this->M_admin->ambil_log_user2('10', $str),
		);
		if ($str>=$jml) {
			echo "0";
		}else {
			$tampil = $this->load->view('User/pengguna/scroll_log',$data,TRUE);
			echo $tampil;
		}
	}
	public function cari_lap_user($jenis2=null,$bulan=null,$tahun=null)
	{
		$id = $this->session->userdata('id');
		$user = $this->M_admin->get_where('tb_user',array('id_user' => $id, 'del_flag'=>'1' ))->row();

			if ($jenis2=='1') { //bulanan
				$data['produksi']= $this->M_admin->get_all_lap_produksi_by_iduser($id,$tahun.'-'.$bulan)->result();
				$this->load->view('User/pengguna/tabel_produksi',$data);
			}elseif ($jenis2=='2') { //tahunan
				$data['produksi']= $this->M_admin->get_all_lap_produksi_by_iduser($id,$tahun.'-')->result();
				$this->load->view('User/pengguna/tabel_produksi',$data);
			}else { //semua
				$data['produksi']= $this->M_admin->get_all_lap_produksi_by_iduser2($id)->result();
				$this->load->view('User/pengguna/tabel_produksi',$data);
			}

		}
		public function cari_lap_pericon($icon=null,$tahun=null)
		{
			$id = $this->session->userdata('id');
			$user = $this->M_admin->get_where('tb_user',array('id_user' => $id, 'del_flag'=>'1' ))->row();

			$data['produksi']= $this->M_admin->get_all_lap_produksi_by_iduser_by_icon($id,$tahun,$icon)->result();
			$this->load->view('User/pengguna/tabel_produksi',$data);

		}
		public function cari_lap_indeks($icon=null,$jenis=null,$tahun=null)
		{

		// $id = $this->session->userdata('iduser');
		// $user = $this->M_admin->get_where('tb_user',array('id_user' => $id, 'del_flag'=>'1' ))->row();
			$bidang = $this->session->userdata('pekerjaan') ;
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

		public function cek_catatan($value='')
		{
			$keuangan = $this->M_admin->get_keuangan($this->input->post('id_produksi'))->row();
			echo intval($keuangan->pengeluaran);
		}
		public function konfirmasi_panen()
		{

			$keuangan = $this->M_admin->get_keuangan($this->input->post('id_produksi'))->row();
			$labarugi = intval($this->input->post('nilai_panen')) - intval($keuangan->pengeluaran);
			

			if ($labarugi > 0) {
				$status = 'Laba';
			}else{
				$status = 'Rugi';
			}


			$data = array(
				'tgl_panen' => date('Y-m-d',strtotime($this->input->post('tgl_panen'))),
				'jml_panen' =>$this->input->post('jml_panen'),
				'jml_pupuk' =>$this->input->post('jml_pupuk'),
				'harga_perkilo_panen' =>$this->input->post('harga_perkilo_panen'),
				'nilai_panen' =>$this->input->post('nilai_panen'),
				'ket' =>sensor_text($this->input->post('ket')),
				'mdate'=> date('Y-m-d H:i:s'),
				'status'=> $status,
				'pengeluaran'=> $keuangan->pengeluaran,
				'm_by'=> $this->session->userdata('level')." - ".$this->session->userdata('nama'),
				'panen_flag'=> '1',
			);
			$update = $this->M_admin->update_data(array('id_produksi' => $this->input->post('id_produksi')),$data,'tb_produksi');
			if ($update) {
			//log aktifitas
				$log_aktifitas = array( 'keterangan'=>'Melakukan konfirmasi panen produksi','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
				$this->M_admin->insert_data('tb_log',$log_aktifitas);

			//update point
				$user = $this->M_admin->get_by_id_row('tb_user',array('id_user'=>$this->session->userdata('id')));
				$admin = $this->db->limit(1)->get_where('tb_admin',array('id_kab' => $this->session->userdata('id_kab'), 'del_flag'=>'1' ))->row();
				$cpoint = $this->db->get_where('tb_config_point',array('id_admin' => $admin->id_admin))->row();
				$sisa = $user->point + $cpoint->point;
				$this->M_admin->update_data(array('id_user' => $this->session->userdata('id')),array('point'=>$sisa),'tb_user');

				$this->session->set_flashdata('alert','toastr.success("Berhasil melakukan konfirmasi panen produksi.", "");');
				$this->session->set_flashdata('selamat','selamat();');
				redirect(base_url('User/profile'));
			}else {
				$this->session->set_flashdata('alert','toastr.danger("Gagal melakukan konfirmasi panen produksi.", "");');
				redirect(base_url('User/profile'));
			}

		}
		public function konfirmasi_gagal()
		{
			$data = array(
				'tgl_panen' => date('Y-m-d',strtotime($this->input->post('tgl_panen'))),
				'jml_panen' =>$this->input->post('jml_panen'),
				'harga_perkilo_panen' =>$this->input->post('harga_perkilo_panen'),
				'nilai_panen' =>$this->input->post('nilai_panen'),
				'ket' =>sensor_text($this->input->post('ket')),
				'mdate'=> date('Y-m-d H:i:s'),
				'm_by'=> $this->session->userdata('level')." - ".$this->session->userdata('nama'),
				'panen_flag'=> '2',
			);
			$update = $this->M_admin->update_data(array('id_produksi' => $this->input->post('id_produksi1')),$data,'tb_produksi');
			if ($update) {
			//log aktifitas
				$log_aktifitas = array( 'keterangan'=>'Melakukan konfirmasi panen produksi','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
				$this->M_admin->insert_data('tb_log',$log_aktifitas);

			//update point
				$user = $this->M_admin->get_by_id_row('tb_user',array('id_user'=>$this->session->userdata('id')));
				$admin = $this->db->limit(1)->get_where('tb_admin',array('id_kab' => $this->session->userdata('id_kab'), 'del_flag'=>'1' ))->row();
				$cpoint = $this->db->get_where('tb_config_point',array('id_admin' => $admin->id_admin))->row();
				$sisa = $user->point + $cpoint->point;
				$this->M_admin->update_data(array('id_user' => $this->session->userdata('id')),array('point'=>$sisa),'tb_user');

				$this->session->set_flashdata('alert','toastr.success("Berhasil melakukan konfirmasi panen produksi.", "");');
				$this->session->set_flashdata('selamat','sedih();');
				redirect(base_url('User/profile'));
			}else {
				$this->session->set_flashdata('alert','toastr.danger("Gagal melakukan konfirmasi panen produksi.", "");');
				redirect(base_url('User/profile'));
			}

		}
		public function modal_ktp($foto,$id,$par)
		{
			$data['foto_ktp']=$foto;
			$data['par']=$par;
			$data['id']=$id;
			$tampilan = $this->load->view('User/pengguna/modal_ktp',$data, TRUE);
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

				$this->session->set_flashdata('alert','toastr.success("Berhasil memperbaharui lokasi peta.", "");');
				redirect(base_url('User/profile'));
			}else {
				$this->session->set_flashdata('alert','toastr.danger("Gagal memperbaharui lokasi peta.", "");');
				redirect(base_url('User/profile'));
			}
		}
		public function kirim_kode_vemail()
		{
			$angka = round(microtime(true) * 1000);
			$kode = substr($angka,-6);
			$where = array(
				'id_user' => $this->session->userdata('id'),
				'del_flag' => "1",
			);
			$where2 = array(
				'nama' => 'Email Gateway',
				'del_flag' => "1",
			);
			$row1 = $this->M_admin->get_where("tb_user",$where)->row();
			$smtp = $this->M_admin->get_where("tb_config",$where2)->row();
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
			$this->email->to($row1->email);
			$this->email->subject('Verifikasi email');
			$this->email->message("Verifikasi email dari akun ".$this->session->userdata('nama').". <br> Kode verifikasi  : <b>".$kode."</b> <br> Kode verifikasi anda adalah privasi.");
			if (!$this->email->send()) {
				echo "0";
				 //show_error($this->email->print_debugger());
			}else {
				$update_key = array(
					'v_email' => $kode,
					'mdate'=>date('Y-m-d H:i:s'),
					'm_by' =>$this->session->userdata('level')." - ".$this->session->userdata('nama'),
				);
				$where  = array('id_user' => $this->session->userdata('id'));
				$this->M_admin->update_data($where,$update_key,'tb_user');
			set_cookie('v_email', md5($kode), 300); // set expired 5 menit kedepan
			echo "1";
		}
	}
	public function verifikasi_email()
	{
		$kode = md5($this->input->post('kode'));
		$cookie = get_cookie('v_email');
		if ($kode==$cookie) {
			$data = array(
				'v_email' =>'1',
				'mdate'=>date('Y-m-d H:i:s'),
				'm_by' =>$this->session->userdata('level')." - ".$this->session->userdata('nama'),

			);
			$update = $this->M_admin->update_data(array('id_user' => $this->session->userdata('id')),$data,'tb_user');
			if ($update) {
				//log aktifitas
				$log_aktifitas = array( 'keterangan'=>'Memferifikasi email','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
				$this->M_admin->insert_data('tb_log',$log_aktifitas);

				$this->session->set_flashdata('alert','toastr.success("Berhasil memferifikasi email.", "");');
				redirect(base_url('User/profile'));
			}else {
				$this->session->set_flashdata('alert','toastr.error("Gagal memferifikasi email.", "");');
				redirect(base_url('User/profile'));
			}
		}

	}
	public function kirim_kode_vtelp()
	{
		$angka = round(microtime(true) * 1000);
		$kode = substr($angka,-6);
		$where = array(
			'id_user' => $this->session->userdata('id'),
			'del_flag' => "1",
		);
		$where2 = array(
			'nama' => 'Sms Gateway',
			'del_flag' => "1",
		);
		$row1 = $this->M_admin->get_where("tb_user",$where)->row();
		$sms = $this->M_admin->get_where("tb_config",$where2)->row();
		$update_key = array(
			'v_email' =>$kode,
			'mdate'=>date('Y-m-d H:i:s'),
			'm_by' =>$this->session->userdata('level')." - ".$this->session->userdata('nama'),
		);
		$where  = array('id_user' => $row1->id_user);
		$this->M_admin->update_data($where,$update_key,'tb_user');
		$pesan = $kode." adalah kode verifikasi dari phb.com ";
		$url="https://reguler.zenziva.net/apps/smsapi.php?userkey=".$sms->value1."&passkey=".$sms->value2."&nohp=".$row1->telp."&pesan=".$pesan;
		set_cookie('v_telp', md5($kode), 300); // set expired 5 menit kedepan

		echo $url;
	}
	public function verifikasi_telp()
	{
		$kode = md5($this->input->post('kode'));
		$cookie = get_cookie('v_telp');
		if ($kode==$cookie) {
			$data = array(
				'v_telp' =>'1',
				'mdate'=>date('Y-m-d H:i:s'),
				'm_by' =>$this->session->userdata('level')." - ".$this->session->userdata('nama'),

			);
			$update = $this->M_admin->update_data(array('id_user' => $this->session->userdata('id')),$data,'tb_user');
			if ($update) {
				//log aktifitas
				$log_aktifitas = array( 'keterangan'=>'Memferifikasi nomor telepon','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
				$this->M_admin->insert_data('tb_log',$log_aktifitas);

				$this->session->set_flashdata('alert','toastr.success("Berhasil memverifikasi nomor telepon.", "");');
				redirect(base_url('User/profile'));
			}else {
				$this->session->set_flashdata('alert','toastr.error("Gagal memferifikasi email.", "");');
				redirect(base_url('User/profile'));
			}
		}

	}
	public function update_personal()
	{
		$user = $this->M_admin->get_where('tb_user',array('id_user' => $this->input->post('id_user'), 'del_flag'=>'1' ))->row();
		$email = $this->input->post('email');
		$string =str_replace("-", "",$this->input->post('telp'));
		$telp =str_replace("_", "",$string);

		$tgl = date("Y-m-d", strtotime($this->input->post('tgl_lahir')));
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
			redirect(base_url('User/profile'));
		}else {
			$this->session->set_flashdata('alert','toastr.info("Gagal memperbaharui data personal.", "");');
			redirect(base_url('User/profile'));
		}
			//echo json_encode($data);
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
			$log_aktifitas = array( 'keterangan'=>'Memperbaharui akun profil','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			$sess = array(
				'username' => $this->input->post('username')
			);
			$this->session->set_userdata($sess);

			$this->session->set_flashdata('alert','toastr.info("Berhasil memperbaharui data akun.", "");');
			redirect(base_url('User/profile'));
		}else {
			$this->session->set_flashdata('alert','toastr.info("Gagal memperbaharui data akun.", "");');
			redirect(base_url('User/profile'));
		}
	}
	public function update_foto_ktp()
	{
		$foto = $this->upload_img('img');
		if ($foto[0]==true) {
			$r_file =$this->input->post('foto_lama');
			unlink("./assets/uploads/$r_file");
		}else {
			$foto[1]=$this->input->post('foto_lama');
		}

		$data = array(
			'foto_ktp' => $foto[1],
			'v_ktp'=>NULL,
			'mdate'=>date('Y-m-d H:i:s'),
			'm_by' =>$this->session->userdata('level')." - ".$this->session->userdata('nama'),
		);


		$update = $this->M_admin->update_data(array('id_user' =>$this->input->post('id') ),$data,'tb_user');
		if ($update) {
			if ($foto[0]==false) {
				$this->session->set_flashdata('gagal','toastr.error("Gagal dapat mengunggah foto.", "");');
			}
			 //log aktifitas
			 //log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Memperbaharui data foto KTP','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			$this->session->set_flashdata('alert','toastr.info("Berhasil memperbaharui data akun.", "");');
			redirect(base_url('User/profile'));
		}else {
			$this->session->set_flashdata('alert','toastr.info("Gagal memperbaharui data akun.", "");');
			redirect(base_url('User/profile'));
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
			 //log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Memperbaharui data foto akun profil','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			$this->session->set_flashdata('alert','toastr.info("Berhasil memperbaharui data akun.", "");');
			$sess = array(
				'foto' => $foto[1],
			);
			$this->session->set_userdata($sess);
			$this->session->set_flashdata('alert','toastr.info("Berhasil memperbaharui data akun.", "");');
			redirect(base_url('User/profile'));
		}else {
			$this->session->set_flashdata('alert','toastr.info("Gagal memperbaharui data akun.", "");');
			redirect(base_url('User/profile'));
		}
	}
	public function chat()
	{
		$server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
		$this->M_admin->insert_data('tb_server_load',$server_load);



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
		$this->template->user('User/pesan/chat',$data);
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

		$this->load->view('User/pesan/box_chat',$data);
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
		$this->load->view('User/open_chat',$data);
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
		$this->load->view('User/open_chat',$data);
	}
	public function isiSideChat($room_id)
	{
		$data = array(
			'chat' => $this->M_admin->get_all('tb_chat',array('del_flag' =>'1','room_id' => $room_id),'id_chat','desc') ,
		);
		$this->load->view('User/isi_chat',$data);
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
	public function blog($id=NULL)
	{
		$server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
		$this->M_admin->insert_data('tb_server_load',$server_load);


		$where = array('del_flag'=>"1");
		$jml  = $this->db->order_by('id_news','DESC')->get_where('tb_news',$where);
	  // konfigurasi pagination
		$config['base_url'] = base_url().'User/blog';
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
		$this->template->user('User/blog/myblog',$data);
	}
	public function blogtags($tags,$id=NULL)
	{
		$server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
		$this->M_admin->insert_data('tb_server_load',$server_load);


		$where = array('del_flag'=>"1");
		if ($tags==0) {
			$jml  = $this->db->order_by('id_news','DESC')->like('cdate', date('Y-m-d'))->get_where('tb_news',$where);
		}else {
			$jml  = $this->db->order_by('id_news','DESC')->like('bidang', $tags)->get_where('tb_news',$where);
		}
		// konfigurasi pagination
		$config['base_url'] = base_url().'User/blogtags/'.$tags;
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
			'liblog'=>'<li><a href="'.base_url().'User/blog">Blog</a></li><li class="active">Kategori '.$litags.'</li>'

		);
		$this->template->user('User/blog/myblog',$data);
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
		$this->template->user('User/blog/detail_blog',$data);
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
			redirect(base_url('User/detail_post/'.$this->input->post('id_news')));
		}else {
			$this->session->set_flashdata('alert','toastr.error("Gagal menambahkan berita.", "");');
			redirect(base_url('User/detail_post/'.$this->input->post('id_news')));
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
	public function laporan()
	{
		$server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
		$this->M_admin->insert_data('tb_server_load',$server_load);



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

			$dt_produksi = count($this->M_admin->get_all_by_iduser2($this->session->userdata('id'),date('Y').$s.$i,'1')->result());
			array_push($ub_produksi,$dt_produksi);
			$dt_produksi_gagal= count($this->M_admin->get_all_by_iduser2($this->session->userdata('id'),date('Y').$s.$i,'2')->result());
			array_push($ub_produksi_gagal,$dt_produksi_gagal);
			$dt_produksi_belum= count($this->M_admin->get_all_by_iduser2($this->session->userdata('id'),date('Y').$s.$i,'0')->result());
			array_push($ub_produksi_belum,$dt_produksi_belum);
		}



		$sampai = date('n');

		for ($i=1; $i <= $sampai; $i++) {
			if ($i<= 9) {
				$s='-0';
			}else {
				$s='-';
			}
			$dt_p_panen = count($this->M_admin->get_all_by_iduser2($this->session->userdata('id'),date('Y').$s.$i,'1')->result());
			array_push($p_panen,$dt_p_panen);
			$dt_p_belum_panen = count($this->M_admin->get_all_by_iduser2($this->session->userdata('id'),date('Y').$s.$i,'0')->result());
			array_push($p_belum_panen,$dt_p_belum_panen);
			$dt_p_gagal_panen = count($this->M_admin->get_all_by_iduser2($this->session->userdata('id'),date('Y').$s.$i,'2')->result());
			array_push($p_gagal_panen,$dt_p_gagal_panen);
		}

		$data = array(
			'chart' => true,
			'map'=>true,
			'kunjungan' => count($this->db->where('flag','1')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_user' => count($this->db->where('flag','2')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_admin' => count($this->db->where('flag','3')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'icon' => $this->M_admin->get_where('tb_icon_map',array('del_flag' =>'1', 'bidang'=>$this->session->userdata('pekerjaan')))->result(),
			'p_panen'=>$p_panen,
			'p_gagal_panen'=>$p_gagal_panen,
			'p_belum_panen'=>$p_belum_panen,
			'ub_produksi' => $ub_produksi,
			'ub_produksi_belum' => $ub_produksi_belum,
			'ub_produksi_gagal' => $ub_produksi_gagal,
			'total_panen'=>count($this->M_admin->get_all_by_iduser3($this->session->userdata('id'),'1')->result()),
			'total_gagal_panen'=>count($this->M_admin->get_all_by_iduser3($this->session->userdata('id'),'2')->result()),
			'total_belum_panen'=>count($this->M_admin->get_all_by_iduser3($this->session->userdata('id'),'0')->result()),


		);
			 //echo json_encode($data['p_belum_panen']);

		$this->template->user('User/laporan/laporan',$data);
	}
	public function print_laporan()
	{
		$server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
		$this->M_admin->insert_data('tb_server_load',$server_load);



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

			$dt_produksi = count($this->M_admin->get_all_by_iduser2($this->session->userdata('id'),date('Y').$s.$i,'1')->result());
			array_push($ub_produksi,$dt_produksi);
			$dt_produksi_gagal= count($this->M_admin->get_all_by_iduser2($this->session->userdata('id'),date('Y').$s.$i,'2')->result());
			array_push($ub_produksi_gagal,$dt_produksi_gagal);
			$dt_produksi_belum= count($this->M_admin->get_all_by_iduser2($this->session->userdata('id'),date('Y').$s.$i,'0')->result());
			array_push($ub_produksi_belum,$dt_produksi_belum);
		}



		$sampai = date('n');

		for ($i=1; $i <= $sampai; $i++) {
			if ($i<= 9) {
				$s='-0';
			}else {
				$s='-';
			}
			$dt_p_panen = count($this->M_admin->get_all_by_iduser2($this->session->userdata('id'),date('Y').$s.$i,'1')->result());
			array_push($p_panen,$dt_p_panen);
			$dt_p_belum_panen = count($this->M_admin->get_all_by_iduser2($this->session->userdata('id'),date('Y').$s.$i,'0')->result());
			array_push($p_belum_panen,$dt_p_belum_panen);
			$dt_p_gagal_panen = count($this->M_admin->get_all_by_iduser2($this->session->userdata('id'),date('Y').$s.$i,'2')->result());
			array_push($p_gagal_panen,$dt_p_gagal_panen);
		}

		$data = array(
			'chart' => true,
			'map'=>true,
			'kunjungan' => count($this->db->where('flag','1')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_user' => count($this->db->where('flag','2')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_admin' => count($this->db->where('flag','3')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),

			'p_panen'=>$p_panen,
			'p_gagal_panen'=>$p_gagal_panen,
			'p_belum_panen'=>$p_belum_panen,
			'ub_produksi' => $ub_produksi,
			'ub_produksi_belum' => $ub_produksi_belum,
			'ub_produksi_gagal' => $ub_produksi_gagal,
			'total_panen'=>count($this->M_admin->get_all_by_iduser3($this->session->userdata('id'),'1')->result()),
			'total_gagal_panen'=>count($this->M_admin->get_all_by_iduser3($this->session->userdata('id'),'2')->result()),
			'total_belum_panen'=>count($this->M_admin->get_all_by_iduser3($this->session->userdata('id'),'0')->result()),


		);
			 //echo json_encode($data['p_belum_panen']);
		$this->load->view('User/laporan/print_laporan',$data);
	}
	public function get_all_produksi()
	{
		$data=$this->M_admin->get_by_id_user($this->session->userdata('id'))->result();
		echo json_encode($data);
	}
	public function pengaturan()
	{
		$server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
		$this->M_admin->insert_data('tb_server_load',$server_load);



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
		);
		$this->template->user('User/pengaturan/pengaturan',$data);
	}
	public function point()
	{
		$server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
		$this->M_admin->insert_data('tb_server_load',$server_load);



		$data = array(
			'chart' => false,
			'map'=>false,
			'kunjungan' => count($this->db->where('flag','1')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_user' => count($this->db->where('flag','2')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_admin' => count($this->db->where('flag','3')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'hadiah' => $this->M_admin->hadiah_point($this->session->userdata('pekerjaan'),$this->session->userdata('id_kab'))->result(),
			'tukar_point' => $this->db->from('tb_tukar_point')->where('id_user',$this->session->userdata('id'))->like('cdate',date('Y')."-")->get()->result(),
		);
		$this->template->user('User/point/point',$data);
	}
	public function tukar_hadiah()
	{
		$kode = round(microtime(true) * 1000);
		$hadiah = $this->M_admin->get_by_id_row('tb_hadiah_point',array('id_hadiah_point'=>$this->input->post('id')));
		$user = $this->M_admin->get_by_id_row('tb_user',array('id_user'=>$this->session->userdata('id')));
		$sisa = $user->point - $hadiah->point;
		if ($sisa < 0) {
			echo "minus";
		}else {
			$data = array(
				'id_user' => $this->session->userdata('id'),
				'id_admin'=>$hadiah->id_admin,
				'point_awal'=>$user->point,
				'point_tukar'=>$hadiah->point,
				'point_sisa'=>$sisa,
				'hadiah'=>$hadiah->hadiah,
				'cdate'=>date('Y-m-d H:i:s'),
				'kode' =>$kode

			);
			$update = $this->M_admin->insert_data('tb_tukar_point',$data);
			if ($update) {
			//log aktifitas
				$log_aktifitas = array( 'keterangan'=>'Menukar point','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
				$this->M_admin->insert_data('tb_log',$log_aktifitas);

				$this->M_admin->update_data(array('id_user' => $this->session->userdata('id')),array('point'=>$sisa),'tb_user');

				echo "sukses";
			}else {
				echo "gagal";
			}
		}
	}
	public function batal_tukar()
	{
		$tukar = $this->M_admin->get_by_id_row('tb_tukar_point',array('id_tukar_point'=>$this->input->post('id')));
		$user = $this->M_admin->get_by_id_row('tb_user',array('id_user'=>$this->session->userdata('id')));
		$sisa = $user->point + $tukar->point_tukar;

		$data = array('flag_status'=>'2');
		$update = $this->M_admin->update_data(array('id_tukar_point' => $this->input->post('id')),$data,'tb_tukar_point');
		if ($update) {
			//log aktifitas
			$log_aktifitas = array( 'keterangan'=>'Menukar point','nama' => $this->session->userdata('nama'),'jabatan' => $this->session->userdata('level'),'date'=> date('Y-m-d H:i:s'),'id'=>$this->session->userdata('id') );
			$this->M_admin->insert_data('tb_log',$log_aktifitas);

			$this->M_admin->update_data(array('id_user' => $this->session->userdata('id')),array('point'=>$sisa),'tb_user');

			echo "sukses";
		}else {
			echo "gagal";
		}
	}
	public function tiket($id='')
	{
		$tiket = $this->M_admin->get_by_id_row('tb_tukar_point',array('id_tukar_point'=>$id));
		$admin = $this->M_admin->get_by_id_row('tb_admin',array('id_admin'=>$tiket->id_admin));
		$user = $this->M_admin->get_by_id_row('tb_user',array('id_user'=>$this->session->userdata('id')));

		$data = array(
			'chart' => false,
			'map'=>false,
			'kunjungan' => count($this->db->where('flag','1')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_user' => count($this->db->where('flag','2')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'login_admin' => count($this->db->where('flag','3')->like('load_date',date('Y-m-d'))->get('tb_server_load')->result()),
			'hadiah' => $this->M_admin->hadiah_point($this->session->userdata('pekerjaan'),$this->session->userdata('id_kab'))->result(),
			'tiket' => $tiket,
			'admin' => $admin,
			'user'=>$user
		);
		$this->template->user('User/point/tiket',$data);
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
			redirect(base_url('User/pengaturan'));
		}else {
			$this->session->set_flashdata('alert','toastr.info("Gagal memperbaharui data Realtime chat.", "");');
			redirect(base_url('User/pengaturan'));
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
	public function get_canvas()
	{
		return $this->load->view('User/canvas');
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
		$this->template->user('User/bantuan',$data);
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
