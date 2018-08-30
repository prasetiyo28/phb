<?php

class M_admin extends CI_Model{
	function cek_login($table,$where){
		return $this->db->get_where($table,$where);
	}
	function get_where($table,$where){
		return $this->db->get_where($table,$where);
	}
	public function get_like($table,$like,$value)
	{
		$query = $this->db->from($table)
					->where('del_flag','1')
					->like($like,$value)
					->get();
		return $query;
	}
	function get_like_where($table,$like,$value,$where){
		return $this->db->like($like,$value)->get_where($table,$where);
	}
  public function insert_data($table,$data)
  {
    $this->db->insert($table, $data);//coding memasukan db
    return $this->db->insert_id();
  }

	public function get_by_id($table,$where)
  {
    $query = $this->db->get_where($table,$where);
    return $query->result();
  }
	public function get_by_id_row($table,$where)
  {
    $query = $this->db->get_where($table,$where);
    return $query->row();
  }
	public function get_by_id_ajax($table,$param,$id)
	{
		$query = $this->db->from($table)
					->where('del_flag','1')
					->where($param,$id)
					->get();
		return $query->row();
	}

	public function get_by_id_ajax_api($table,$param,$id)
	{
		$query = $this->db->from($table)
					->where($param,$id)
					->get();
		return $query->row();
	}

function get_all_provinsi() {
	  $this->db->select('*');
	  $this->db->from('tb_wilayah_provinsi');
	  $query = $this->db->get();

	  return $query->result();
 }

public function update_data($where,$data,$table)
  {
    $this->db->update($table, $data, $where);
    return $this->db->affected_rows();
  }

public function get_all($tabel,$where,$order_by,$metod)
{
    $stt = $this->db->order_by($order_by,$metod)->get_where($tabel,$where);
    return $stt->result();
  }

public function ambil_user($num, $offset, $sort,$find,$find_value)
 {
		 if ($sort==1) {
		 	$this->db->order_by('id_user', 'DESC');
		}elseif ($sort==2) {
			$this->db->order_by('nama', 'ASC');
		}elseif ($sort==3) {
			$this->db->order_by('id_kab', 'ASC');
		}elseif ($sort==4) {
			$this->db->order_by('email', 'ASC');
		}

		if ($find==0) {
			$data = $this->db->where('del_flag',"1")->get('tb_user', $num, $offset);
		}elseif ($find==1) {
			$data = $this->db->where('del_flag',"1")->like('nama',$find_value)->get('tb_user', $num, $offset);
		}
	   return $data->result();
 }

public function ambil_user_admin($num, $offset, $sort,$find,$find_value)
{
	 if ($sort==1) {
		$this->db->order_by('id_user', 'DESC');
	}elseif ($sort==2) {
		$this->db->order_by('nama', 'ASC');
	}elseif ($sort==3) {
		$this->db->order_by('id_kab', 'ASC');
	}elseif ($sort==4) {
		$this->db->order_by('email', 'ASC');
	}

	if ($find==0) {
		$data = $this->db->where('del_flag',"1")->where('pekerjaan',$this->session->userdata('bidang'))->where('id_kab',$this->session->userdata('id_kab'))->get('tb_user', $num, $offset);
	}elseif ($find==1) {
		$data = $this->db->where('del_flag',"1")->where('pekerjaan',$this->session->userdata('bidang'))->where('id_kab',$this->session->userdata('id_kab'))->like('nama',$find_value)->get('tb_user', $num, $offset);
	}
	 return $data->result();
}

 public function ambil_admin($num, $offset, $sort,$find,$find_value)
{
	 if ($sort==1) {
		$this->db->order_by('id_admin', 'DESC');
	}elseif ($sort==2) {
		$this->db->order_by('nama', 'ASC');
	}elseif ($sort==3) {
		$this->db->order_by('id_kab', 'ASC');
	}elseif ($sort==4) {
		$this->db->order_by('email', 'ASC');
	}elseif ($sort==5) {
		$this->db->order_by('last_login', 'DESC');
	}

	if ($find==0) {
		$data = $this->db->where('del_flag',"1")->where('level',"1")->get('tb_admin', $num, $offset);
	}elseif ($find==1) {
		$data = $this->db->where('del_flag',"1")->where('level',"1")->like('nama',$find_value)->get('tb_admin', $num, $offset);
	}
		return $data->result();
}

public function get_all_bidang($str)
{
  return $this->db->select('tb_produksi.id_produksi, tb_produksi.id_user, tb_produksi.lokasi, tb_produksi.lt, tb_produksi.lg, tb_produksi.jenis_produksi,tb_produksi.tgl_panen, tb_produksi.jml_panen,tb_produksi.jenis_tambak,tb_produksi.tgl_kira_panen,tb_produksi.jml_kira_panen, tb_produksi.harga_kira_perkilo, tb_user.nama , tb_icon_map.icon')
                    ->from('tb_produksi')
                    ->join('tb_user','tb_produksi.id_user = tb_user.id_user')
                    ->join('tb_icon_map','tb_produksi.id_icon = tb_icon_map.id_icon')
                    ->where('tb_produksi.del_flag','1')
                    ->where('tb_produksi.bidang',$str)
                    ->get();
}
public function get_all_bidang_by_status($str,$flag)
{
  return $this->db->select('tb_produksi.id_produksi, tb_produksi.id_user, tb_produksi.lokasi, tb_produksi.lt, tb_produksi.lg, tb_produksi.jenis_produksi,tb_produksi.tgl_panen, tb_produksi.jml_panen,tb_produksi.jenis_tambak,tb_produksi.tgl_kira_panen,tb_produksi.jml_kira_panen, tb_produksi.harga_kira_perkilo, tb_user.nama , tb_icon_map.icon')
                    ->from('tb_produksi')
                    ->join('tb_user','tb_produksi.id_user = tb_user.id_user')
                    ->join('tb_icon_map','tb_produksi.id_icon = tb_icon_map.id_icon')
                    ->where('tb_produksi.del_flag','1')
										->where('tb_produksi.panen_flag',$flag)
                    ->where('tb_produksi.bidang',$str)
                    ->get();
}
public function get_all_bidang2($str,$bidang,$id_kab)
{
  return $this->db->select('tb_produksi.id_produksi, tb_produksi.id_user, tb_produksi.lokasi, tb_produksi.lt, tb_produksi.lg, tb_produksi.jenis_produksi,tb_produksi.tgl_panen, tb_produksi.jml_panen,tb_produksi.jenis_tambak,tb_produksi.tgl_kira_panen,tb_produksi.jml_kira_panen, tb_produksi.harga_kira_perkilo, tb_user.nama , tb_icon_map.icon')
                    ->from('tb_produksi')
                    ->join('tb_user','tb_produksi.id_user = tb_user.id_user')
                    ->join('tb_icon_map','tb_produksi.id_icon = tb_icon_map.id_icon')
                    ->where('tb_produksi.del_flag','1')
										->where('tb_user.id_kab', $id_kab)
                    ->where('tb_produksi.bidang',$bidang)
										->where('tb_produksi.panen_flag',$str)
                    ->get();
}
public function get_by_id_bidang($str)
{
  return $this->db->select('tb_produksi.id_produksi, tb_produksi.id_user, tb_produksi.lokasi, tb_produksi.lt, tb_produksi.lg, tb_produksi.jenis_produksi,tb_produksi.tgl_panen, tb_produksi.jml_panen,tb_produksi.jenis_tambak, tb_produksi.harga_kira_perkilo,tb_produksi.bidang,tb_produksi.tgl_tanam,tb_produksi.jml_bibit,tb_produksi.luas,tb_produksi.status_lahan,tb_produksi.tgl_kira_panen,tb_produksi.jml_kira_panen, tb_user.nama ,tb_user.foto ,tb_user.telp ,tb_user.email , tb_icon_map.icon,tb_icon_map.id_icon')
                    ->from('tb_produksi')
                    ->join('tb_user','tb_produksi.id_user = tb_user.id_user')
                    ->join('tb_icon_map','tb_produksi.id_icon = tb_icon_map.id_icon')
                    ->where('tb_produksi.del_flag','1')
                    ->where('tb_produksi.id_produksi',$str)
                    ->get();
}

public function get_by_id_user($str)
{
  return $this->db->select('tb_produksi.id_produksi, tb_produksi.id_user, tb_produksi.lokasi, tb_produksi.lt, tb_produksi.lg, tb_produksi.jenis_produksi,tb_produksi.tgl_panen, tb_produksi.jml_panen,tb_produksi.jenis_tambak, tb_produksi.harga_kira_perkilo,tb_produksi.bidang,tb_produksi.tgl_tanam,tb_produksi.jml_bibit,tb_produksi.luas,tb_produksi.status_lahan,tb_produksi.tgl_kira_panen,tb_produksi.jml_kira_panen, tb_user.nama ,tb_user.foto ,tb_user.telp ,tb_user.email , tb_icon_map.icon,tb_icon_map.id_icon')
                    ->from('tb_produksi')
                    ->join('tb_user','tb_produksi.id_user = tb_user.id_user')
                    ->join('tb_icon_map','tb_produksi.id_icon = tb_icon_map.id_icon')
                    ->where('tb_produksi.del_flag','1')
                    ->where('tb_produksi.id_user',$str)
                    ->get();
}
public function get_by_id_user_byx($str,$v)
{
  return $this->db->select('tb_produksi.id_produksi, tb_produksi.id_user, tb_produksi.lokasi, tb_produksi.lt, tb_produksi.lg, tb_produksi.jenis_produksi,tb_produksi.tgl_panen, tb_produksi.jml_panen,tb_produksi.jenis_tambak, tb_produksi.harga_kira_perkilo,tb_produksi.bidang,tb_produksi.tgl_tanam,tb_produksi.jml_bibit,tb_produksi.luas,tb_produksi.status_lahan,tb_produksi.tgl_kira_panen,tb_produksi.jml_kira_panen, tb_user.nama ,tb_user.foto ,tb_user.telp ,tb_user.email , tb_icon_map.icon,tb_icon_map.id_icon')
                    ->from('tb_produksi')
                    ->join('tb_user','tb_produksi.id_user = tb_user.id_user')
                    ->join('tb_icon_map','tb_produksi.id_icon = tb_icon_map.id_icon')
										->where('tb_produksi.panen_flag',$v)
                    ->where('tb_produksi.del_flag','1')
                    ->where('tb_produksi.id_user',$str)
                    ->get();
}

public function get_all_by_idkab($idkab,$str,$value)
{
  return $this->db->select('tb_produksi.panen_flag')
                    ->from('tb_user')
                    ->join('tb_produksi','tb_user.id_user = tb_produksi.id_user')
                    ->where('tb_user.del_flag','1')
                    ->where('tb_user.pekerjaan',$str)
										->where('tb_user.id_kab',$idkab)
										->where('tb_produksi.panen_flag','1')
										->like('tb_produksi.tgl_panen',$value)
                    ->get();
}
public function get_all_by_idkab_admin($idkab,$str,$value,$flag)
{
	if ($flag==0) {
		return $this->db->select('tb_produksi.panen_flag')
											->from('tb_user')
											->join('tb_produksi','tb_user.id_user = tb_produksi.id_user')
											->where('tb_user.del_flag','1')
											->where('tb_user.pekerjaan',$str)
											->where('tb_user.id_kab',$idkab)
											->where('tb_produksi.panen_flag',$flag)
											->like('tb_produksi.tgl_tanam',$value)
											->get();
	}else {
		return $this->db->select('tb_produksi.panen_flag')
											->from('tb_user')
											->join('tb_produksi','tb_user.id_user = tb_produksi.id_user')
											->where('tb_user.del_flag','1')
											->where('tb_user.pekerjaan',$str)
											->where('tb_user.id_kab',$idkab)
											->where('tb_produksi.panen_flag',$flag)
											->like('tb_produksi.tgl_panen',$value)
											->get();
	}

}
public function get_all_by_idkab_admin2($idkab,$str,$flag)
{
  return $this->db->select('tb_produksi.panen_flag')
                    ->from('tb_user')
                    ->join('tb_produksi','tb_user.id_user = tb_produksi.id_user')
                    ->where('tb_user.del_flag','1')
                    ->where('tb_user.pekerjaan',$str)
										->where('tb_user.id_kab',$idkab)
										->where('tb_produksi.panen_flag',$flag)
                    ->get();
}
public function get_all_by_iduser2($id,$date,$value)
{
	if ($value==0) {
		$str='tb_produksi.tgl_tanam';
	}else {
		$str='tb_produksi.tgl_panen';
	}
  return $this->db->select('tb_produksi.panen_flag')
                    ->from('tb_user')
                    ->join('tb_produksi','tb_user.id_user = tb_produksi.id_user')
                    ->where('tb_user.del_flag','1')
										->where('tb_produksi.del_flag','1')
										->where('tb_user.id_user',$id)
										->where('tb_produksi.panen_flag',$value)
										->like($str,$date)
                    ->get();
}
public function get_all_by_iduser3($id,$value)
{
  return $this->db->select('tb_produksi.panen_flag')
                    ->from('tb_user')
                    ->join('tb_produksi','tb_user.id_user = tb_produksi.id_user')
                    ->where('tb_user.del_flag','1')
										->where('tb_user.id_user',$id)
										->where('tb_produksi.panen_flag',$value)
                    ->get();
}
public function get_all_by_iduser($id,$value)
{
  return $this->db->select('tb_produksi.panen_flag')
                    ->from('tb_user')
                    ->join('tb_produksi','tb_user.id_user = tb_produksi.id_user')
                    ->where('tb_user.del_flag','1')
										->where('tb_user.id_user',$id)
										->where('tb_produksi.panen_flag','1')
										->like('tb_produksi.tgl_panen',$value)
                    ->get();
}
public function get_all_produksi_by_idkab($idkab,$str)
{
  return $this->db->select('*')
                    ->from('tb_user')
                    ->join('tb_produksi','tb_user.id_user = tb_produksi.id_user')
										->join('tb_icon_map','tb_produksi.id_icon = tb_icon_map.id_icon')
                    ->where('tb_user.del_flag','1')
                    ->where('tb_user.pekerjaan',$str)
										->where('tb_user.id_kab',$idkab)
                    ->get();
}

public function get_all_produksi_by_iduser($id)
{
  return $this->db->select('*')
                    ->from('tb_user')
                    ->join('tb_produksi','tb_user.id_user = tb_produksi.id_user')
										->join('tb_icon_map','tb_produksi.id_icon = tb_icon_map.id_icon')
                    ->where('tb_user.del_flag','1')
										->where('tb_user.id_user',$id)
                    ->get();
}

public function get_all_lap_produksi_by_idkab($idkab,$str,$value)
{
  return $this->db->select('*')
                    ->from('tb_user')
                    ->join('tb_produksi','tb_user.id_user = tb_produksi.id_user')
                    ->where('tb_user.del_flag','1')
                    ->where('tb_user.pekerjaan',$str)
										->where('tb_user.id_kab',$idkab)
										->like('tb_produksi.cdate',$value)
                    ->get();
}
public function get_all_lap_produksi_by_iduser($id,$value)
{
  return $this->db->select('*')
                    ->from('tb_user')
                    ->join('tb_produksi','tb_user.id_user = tb_produksi.id_user')
                    ->where('tb_user.del_flag','1')
										->where('tb_user.id_user',$id)
										->like('tb_produksi.cdate',$value)
                    ->get();
}
public function get_all_lap_produksi_by_idicon($id,$value)
{
  return $this->db->select('*')
                    ->from('tb_user')
                    ->join('tb_produksi','tb_user.id_user = tb_produksi.id_user')
                    ->where('tb_user.del_flag','1')
										->where('tb_produksi.id_icon',$id)
										->like('tb_produksi.cdate',$value)
                    ->get();
}
public function get_all_lap_produksi_by_iduser_by_icon($id,$value,$icon)
{
  return $this->db->select('*')
                    ->from('tb_user')
                    ->join('tb_produksi','tb_user.id_user = tb_produksi.id_user')
                    ->where('tb_user.del_flag','1')
										->where('tb_user.id_user',$id)
										->where('tb_produksi.id_icon',$icon)
										->like('tb_produksi.cdate',$value)
                    ->get();
}
public function get_all_lap_produksi_by_iduser_by_kab($id,$value,$icon)
{
  return $this->db->select('*')
                    ->from('tb_user')
                    ->join('tb_produksi','tb_user.id_user = tb_produksi.id_user')
                    ->where('tb_user.del_flag','1')
										->where('tb_user.id_kab',$id)
										->where('tb_produksi.id_icon',$icon)
										->like('tb_produksi.cdate',$value)
                    ->get();
}
public function get_all_lap_produksi_by_idkab2($idkab,$str)
{
  return $this->db->select('*')
                    ->from('tb_user')
                    ->join('tb_produksi','tb_user.id_user = tb_produksi.id_user')
                    ->where('tb_user.del_flag','1')
                    ->where('tb_user.pekerjaan',$str)
										->where('tb_user.id_kab',$idkab)
                    ->get();
}
public function get_all_lap_produksi_by_iduser2($id)
{
  return $this->db->select('*')
                    ->from('tb_user')
                    ->join('tb_produksi','tb_user.id_user = tb_produksi.id_user')
                    ->where('tb_user.del_flag','1')
										->where('tb_user.id_user',$id)
                    ->get();
}

public function ambil_blog($num, $offset)
{
 $this->db->order_by('id_news', 'DESC');
 $data = $this->db->where('del_flag',"1")->get('tb_news', $num, $offset);
 return $data->result();
}
public function ambil_blog_saya($num, $offset)
{
 $this->db->order_by('id_news', 'DESC');
 $data = $this->db->where('del_flag',"1")->where('id_admin',$this->session->userdata('id'))->get('tb_news', $num, $offset);
 return $data->result();
}
public function ambil_blog_tags($num, $offset,$tags)
{
	 $this->db->order_by('id_news', 'DESC');
	 if ($tags==0) {
		 $data = $this->db->like('cdate',date('Y-m-d'))->where('del_flag',"1")->get('tb_news', $num, $offset);
	}else {
		$data = $this->db->like('bidang',$tags)->where('del_flag',"1")->get('tb_news', $num, $offset);
	}
	 return $data->result();
}
public function ambil_log_user($num, $offset)
{
 $this->db->order_by('id_log', 'DESC');
 $data = $this->db->where('jabatan',"user")->where('id',$this->session->userdata('iduser'))->get('tb_log', $num, $offset);
 return $data->result();
}
public function ambil_log_user2($num, $offset)
{
 $this->db->order_by('id_log', 'DESC');
 $data = $this->db->where('jabatan',"user")->where('id',$this->session->userdata('id'))->get('tb_log', $num, $offset);
 return $data->result();
}
public function ambil_log_admin($num, $offset)
{
 $this->db->order_by('id_log', 'DESC');
 $data = $this->db->where('jabatan',"admin")->where('id',$this->session->userdata('idadmin'))->get('tb_log', $num, $offset);
 return $data->result();
}
public function ambil_history_panen($id,$num, $offset)
{
 return $this->db->join('tb_produksi','tb_user.id_user = tb_produksi.id_user')
									->join('tb_icon_map','tb_produksi.id_icon = tb_icon_map.id_icon')
									 ->where('tb_user.del_flag','1')
									->where('tb_user.id_user',$id)
									 ->get('tb_user',$num, $offset);
}
public function ambil_history_panen_by_idkab($idkab,$str,$num, $offset)
{
  return $this->db->join('tb_produksi','tb_user.id_user = tb_produksi.id_user')
										->join('tb_icon_map','tb_produksi.id_icon = tb_icon_map.id_icon')
                    ->where('tb_user.del_flag','1')
                    ->where('tb_user.pekerjaan',$str)
										->where('tb_user.id_kab',$idkab)
                    ->get('tb_user',$num, $offset);
}
}
?>
