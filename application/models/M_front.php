<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_front extends CI_Model {

  function get_where($table,$where){
    return $this->db->get_where($table,$where);
  }
  public function insert_data($table,$data)
  {
    $this->db->insert($table, $data);//coding memasukan db
    return $this->db->insert_id();
  }
  public function get_by_id_bidang($str)
  {
    return $this->db->select('tb_produksi.*, tb_user.nama ,tb_user.foto ,tb_user.telp ,tb_user.email , tb_icon_map.icon,tb_icon_map.id_icon')
    ->from('tb_produksi')
    ->join('tb_user','tb_produksi.id_user = tb_user.id_user')
    ->join('tb_icon_map','tb_produksi.id_icon = tb_icon_map.id_icon')
    ->where('tb_produksi.del_flag','1')
    ->where('tb_produksi.id_produksi',$str)
    ->get();
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
  public function ambil_blog($num, $offset)
  {
   $this->db->order_by('id_news', 'DESC');
   $data = $this->db->where('del_flag',"1")->get('tb_news', $num, $offset);
   return $data->result();
 }

 public function ambil_toko($num, $offset)
 {
  $this->db->order_by('id_wirausahawan', 'DESC');
  $data = $this->db->where('deleted',"0")->get('tb_wirausahawan', $num, $offset);
  return $data->result();
}

public function ambil_toko_by_id($id)
{
  $data = $this->db->where('id_wirausahawan',$id)->get('tb_wirausahawan');
  return $data->row();
}

public function ambil_produk($id)
{
  $data = $this->db->where('id_wirausahawan',$id)->where('deleted','0')->get('tb_produk');
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
public function ambil_history_panen($id,$num, $offset)
{
 return $this->db->join('tb_produksi','tb_user.id_user = tb_produksi.id_user')
 ->join('tb_icon_map','tb_produksi.id_icon = tb_icon_map.id_icon')
 ->where('tb_user.del_flag','1')
 ->where('tb_user.id_user',$id)
 ->get('tb_user',$num, $offset);
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

}

?>
