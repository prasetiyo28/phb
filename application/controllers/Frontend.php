<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_front');
		$this->load->helper('penolong');
		$this->load->helper('url');
	}

	public function index()
	{
		$data = array(
			'chart' => false,
			'map'=>true,
		);
		$this->load->view('frontend/peta',$data);
	}
	public function coba()
	{
		$this->load->view('coba');
	}


	public function detail_produksi($id)
	{
		$data = array('icon' => $this->M_front->get_where('tb_icon_map',array('del_flag' =>'1'))->result(),
			'data'=>$this->M_front->get_by_id_bidang($id)->result(),
		);

		$tampil= $this->load->view('frontend/canvas_detail_lihat',$data);
		return $tampil;
	}

	public function get_all_pertanian_panen()
	{
		$data=$this->M_front->get_all_bidang_by_status('1','1')->result();
		echo json_encode($data);
	}
	public function get_all_pertanian_belum()
	{
		$data=$this->M_front->get_all_bidang_by_status('1','0')->result();
		echo json_encode($data);
	}
	public function get_all_pertanian_gagal()
	{
		$data=$this->M_front->get_all_bidang_by_status('1','2')->result();
		echo json_encode($data);
	}

	public function get_all_perikanan_panen()
	{
		$data=$this->M_front->get_all_bidang_by_status('2','1')->result();
		echo json_encode($data);
	}
	public function get_all_perikanan_belum()
	{
		$data=$this->M_front->get_all_bidang_by_status('2','0')->result();
		echo json_encode($data);
	}
	public function get_all_perikanan_gagal()
	{
		$data=$this->M_front->get_all_bidang_by_status('2','2')->result();
		echo json_encode($data);
	}
	public function get_all_peternakan_panen()
	{
		$data=$this->M_front->get_all_bidang_by_status('3','1')->result();
		echo json_encode($data);
	}
	public function get_all_peternakan_belum()
	{
		$data=$this->M_front->get_all_bidang_by_status('3','0')->result();
		echo json_encode($data);
	}
	public function get_all_peternakan_gagal()
	{
		$data=$this->M_front->get_all_bidang_by_status('3','2')->result();
		echo json_encode($data);
	}

	public function blog($id=NULL)
	{
		$server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
		$this->M_front->insert_data('tb_server_load',$server_load);


		$where = array('del_flag'=>"1");
		$jml  = $this->db->order_by('id_news','DESC')->get_where('tb_news',$where);
	  // konfigurasi pagination
		$config['base_url'] = base_url().'Frontend/blog';
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
		$data = array(
			'chart' => false,
			'map'=>false,
			'blog'=>$this->M_front->ambil_blog($config['per_page'], $id),
			'halaman'=>explode('&nbsp;',$str_links ),
			'warna' => array('style-primary-dark' , 'style-accent-dark','style-warning','style-accent','style-primary','style-gray-light','style-default-dark','style-gray-dark','style-default','style-success','style-info','style-danger','style-default-bright'),
			'liblog'=>'<li class="active">Blog</li>'
		);
		$this->load->view('frontend/news',$data);
	}

	public function toko($id=NULL)
	{
		$server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
		$this->M_front->insert_data('tb_server_load',$server_load);


		$where = array('deleted'=>"0");
		$jml  = $this->db->order_by('id_wirausahawan','DESC')->get_where('tb_wirausahawan',$where);
	  // konfigurasi pagination
		$config['base_url'] = base_url().'Frontend/toko';
		$config['total_rows'] = $jml->num_rows();
		$config['per_page'] = '10';
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
		$data = array(
			'chart' => false,
			'map'=>false,
			'toko'=>$this->M_front->ambil_toko($config['per_page'], $id),
			'halaman'=>explode('&nbsp;',$str_links ),
			'warna' => array('style-primary-dark' , 'style-accent-dark','style-warning','style-accent','style-primary','style-gray-light','style-default-dark','style-gray-dark','style-default','style-success','style-info','style-danger','style-default-bright'),
			'liblog'=>'<li class="active">Toko</li>'
		);
		$this->load->view('frontend/toko',$data);
	}

	public function kunjungi_toko($id)
	{
		$server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
		$this->M_front->insert_data('tb_server_load',$server_load);


		
		$data = array(
			'chart' => false,
			'map'=>false,
			'toko'=>$this->M_front->ambil_toko_by_id($id),
			'produk'=>$this->M_front->ambil_produk($id),
			'liblog'=>'<li class="active">Toko</li>'
		);
		$this->load->view('frontend/produk',$data);
		// echo json_encode($data['toko']);
	}

	public function blogtags($tags,$id=NULL)
	{
		$server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
		$this->M_front->insert_data('tb_server_load',$server_load);


		$where = array('del_flag'=>"1");
		if ($tags==0) {
			$jml  = $this->db->order_by('id_news','DESC')->like('cdate', date('Y-m-d'))->get_where('tb_news',$where);
		}else {
			$jml  = $this->db->order_by('id_news','DESC')->like('bidang', $tags)->get_where('tb_news',$where);
		}
		// konfigurasi pagination
		$config['base_url'] = base_url().'Frontend/blogtags/'.$tags;
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
			'blog'=>$this->M_front->ambil_blog_tags($config['per_page'], $id,$tags),
			'halaman'=>explode('&nbsp;',$str_links ),
			'warna' => array('style-primary-dark' , 'style-accent-dark','style-warning','style-accent','style-primary','style-gray-light','style-default-dark','style-gray-dark','style-default','style-success','style-info','style-danger','style-default-bright'),
			'liblog'=>'<li><a href="'.base_url().'Frontend/blog">Blog</a></li><li class="active">Kategori '.$litags.'</li>'

		);
		$this->load->view('frontend/news',$data);
	}

	public function detail_post($id)
	{
		$server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
		$this->M_front->insert_data('tb_server_load',$server_load);

		$data = array(
			'chart' => false,
			'map'=>false,
			'blog' => $this->M_front->get_by_id_row('tb_news',array('id_news' => $id,'del_flag'=>'1' )) ,
			'komentar' => $this->M_front->get_by_id('tb_komentar',array('id_news' => $id,'del_flag'=>'1' )) ,

		);
		$this->load->view('frontend/detail_blog',$data);
	}

	public function profile($id=null)
	{
		$server_load = array('load_name' => 'kunjungan','load_date'=> date('Y-m-d H:i:s'),'flag'=>'1' );
		$this->M_front->insert_data('tb_server_load',$server_load);

		$user = $this->M_front->get_where('tb_user',array('id_user' => $id, 'del_flag'=>'1' ))->row();
		if (!empty($id)) {
			$data = array(
				'chart' => true,
				'map'=>true,
				'data' => $this->M_front->get_where('tb_user',array('del_flag' =>'1','id_user'=>$id ))->result(),
				'id'=>$id,
				'foto'=>$user->foto,
				'panen'=>$this->M_front->ambil_history_panen($id,'5',null)->result(),

			);
			$this->load->view('frontend/profile',$data);
		}else {
			$data = array(
				'chart' => false,
				'map'=>false,
			);
      //$this->template->user('template/error_404',$data);
		}

	}
	public function scroll_history_panen($str=NULL)
	{
		$jml  = $this->M_front->get_all_produksi_by_iduser($this->session->userdata('id'))->num_rows();
		$data = array(
			'panen'=>$this->M_front->ambil_history_panen($this->session->userdata('id'),'5',$str)->result(),
		);
		if ($str>=$jml) {
			echo "0";
		}else {
			$tampil = $this->load->view('frontend/scroll_history_panen',$data,TRUE);
			echo $tampil;
		}
	}

	public function terms()
	{
		$data = array(
			'chart' => false,
			'map'=>false,
		);
		$this->load->view('frontend/terms',$data);
	}


}
