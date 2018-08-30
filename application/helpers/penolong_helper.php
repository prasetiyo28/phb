<?php

function total_user()
{
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->select('*')
                    ->from('tb_user')
                    ->where('del_flag','1')
                    ->get();

    $stmt= $result->num_rows();
    return $stmt;

}
function total_user_foradmin()
{
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->select('*')
                    ->from('tb_user')
                    ->where('del_flag','1')
                    ->where('pekerjaan',$ci->session->userdata('bidang'))
                    ->where('id_kab',$ci->session->userdata('id_kab'))
                    ->get();

    $stmt= $result->num_rows();
    return $stmt;

}
function total_page()
{
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->select('*')
                    ->from('tb_user')
                    ->where('del_flag','1')
                    ->get();

    $stmt= $result->num_rows();
    $list = ceil($stmt/4);
    return $list;

}
function total_page_foradmin()
{
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->select('*')
                    ->from('tb_user')
                    ->where('del_flag','1')
                    ->where('pekerjaan',$ci->session->userdata('bidang'))
                    ->where('id_kab',$ci->session->userdata('id_kab'))
                    ->get();

    $stmt= $result->num_rows();
    $list = ceil($stmt/4);
    return $list;

}
function total_admin()
{
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->select('*')
                    ->from('tb_admin')
                    ->where('level',"1")
                    ->where('del_flag','1')
                    ->get();

    $stmt= $result->num_rows();
    return $stmt;

}
function total_page_admin()
{
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->select('*')
                    ->from('tb_admin')
                    ->where('level',"1")
                    ->where('del_flag','1')
                    ->get();

    $stmt= $result->num_rows();
    $list = ceil($stmt/4);
    return $list;

}

function tampil_icon($id,$a)
{
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->select('*')
                    ->from('tb_icon_map')
                    ->where('id_icon',$id)
                    ->get();
  foreach ($result->result() as $c) {
    $nama= $c->nama;
    $icon= $c->icon;
    if ($a==1) {
      return $icon;
    }else {
      return $nama;
    }
  }
}

function replace_petik($text)
{
  $string =str_replace("'", "",$text);
  return $string;
}

function tampil_user_id_chat($room_id)
{
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->select('*')
                    ->from('tb_chat_room')
                    ->where('room_id',$room_id)
                    ->get();
  foreach ($result->result() as $c) {
    if ($c->user_id != $ci->session->userdata('level')."-".$ci->session->userdata('id')) {
      return $c->user_id;
    }
  }
}
function tampil_admin_by_id($id)
{
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->select('*')
                    ->from('tb_admin')
                    ->where('id_admin',$id)
                    ->get();
  foreach ($result->result() as $c) {
      return $c->nama;

  }
}
function tampil_user_sms($str)
{
  $ci =& get_instance();
  $ci->load->database();
  $pecahkan = explode(',', $str);
  $hasil= '';
  for ($i=0; $i < count($pecahkan) ; $i++) {
    $result = $ci->db->select('*')
                      ->from('tb_user')
                      ->where('id_user',$pecahkan[$i])
                      ->get()->result();
    foreach ($result as $k) {
      $hasil = $hasil.=$k->nama.',';
    }
  }
  return str_replace("'", "",$hasil);
}
function pecahkan_kategori_news($str)
{
  if ($str!=0) {
    $pecahkan = explode(',', $str);
    $hasil= array();
    for ($i=0; $i < count($pecahkan) ; $i++) {
      array_push($hasil,$pecahkan[$i]);
    }
    return $hasil;
  }else {
    return null;
  }
}
function chatRealtime()
{
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->select('*')
                    ->from('tb_config')
                    ->where('value3',$ci->session->userdata('level')."-".$ci->session->userdata('id'))
                    ->where('nama','Chat Realtime')
                    ->get();
  if (count($result->result())==0) {
    $data = array('nama'=>'Chat Realtime','value1' =>'true' ,'value2'=>'25','value3'=>$ci->session->userdata('level')."-".$ci->session->userdata('id') );
    $ci->db->insert('tb_config',$data);
  }else {
    $c=$result->row();
    return  array($c->value1 ,$c->value2,$c->id_config );
  }

}
function configPoint()
{
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->select('*')
                    ->from('tb_config_point')
                    ->where('id_admin',$ci->session->userdata('id'))
                    ->get();
  if (count($result->result())==0) {
    $data = array('id_admin'=>$ci->session->userdata('id'),'point' =>'1' ,'date'=>date('Y-m-d H:i:s'));
    $ci->db->insert('tb_config_point',$data);
    return array('1',$ci->db->insert_id() );
  }else {
    $c=$result->row();
    return  array($c->point,$c->id_config_point );
  }

}
function tampil_nama_user($str)
{
  $pecahkan = explode('-', $str);
  $level= $pecahkan[0];
  $id= $pecahkan[1];
  $ci =& get_instance();
  $ci->load->database();
  if ($level=='user') {
    $tb='tb_user';
    $idtb='id_user';
  }else {
    $tb='tb_admin';
    $idtb='id_admin';
  }

  $result = $ci->db->select('*')
                    ->from($tb)
                    ->where($idtb,$id)
                    ->get();
  foreach ($result->result() as $c) {
    $stmt= $c->nama;
    return $stmt;
  }
}

function tampil_id_level_user($str)
{
  $pecahkan = explode('-', $str);
  $level= $pecahkan[0];
  $id= $pecahkan[1];
  return array($level,$id );
}

function tampil_foto_user($str)
{
  $pecahkan = explode('-', $str);
  $level= $pecahkan[0];
  $id= $pecahkan[1];
  $ci =& get_instance();
  $ci->load->database();
  if ($level=='user') {
    $tb='tb_user';
    $idtb='id_user';
  }else {
    $tb='tb_admin';
    $idtb='id_admin';
  }

  $result = $ci->db->select('*')
                    ->from($tb)
                    ->where($idtb,$id)
                    ->get();
  foreach ($result->result() as $c) {
    $stmt= $c->foto;
    return $stmt;
  }
}

function get_last_chat($room_id)
{
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->order_by('id_chat','desc')->limit(1)->get_where('tb_chat',array('del_flag' =>'1' ,'room_id'=>$room_id,  ));
  return $result->result();
}

function tampil_desa($id)
{
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->select('*')
                    ->from('tb_wilayah_desa')
                    ->where('id_desa',$id)
                    ->get();
  foreach ($result->result() as $c) {
    $stmt= $c->nama;
    return $stmt;
  }
}

function tampil_nama_user_by_id($id)
{
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->select('*')
                    ->from('tb_user')
                    ->where('id_user',$id)
                    ->get();
  foreach ($result->result() as $c) {
    $stmt= $c->nama;
    return $stmt;
  }
}

function tampil_kec($id)
{
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->select('*')
                    ->from('tb_wilayah_kecamatan')
                    ->where('id_kec',$id)
                    ->get();
  foreach ($result->result() as $c) {
    $stmt= $c->nama;
    return $stmt;
  }
}
function tampil_kab($id)
{
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->select('*')
                    ->from('tb_wilayah_kabupaten')
                    ->where('id_kab',$id)
                    ->get();
  foreach ($result->result() as $c) {
    $stmt= $c->nama;
    return $stmt;
  }
}
function tampil_prov($id)
{
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->select('*')
                    ->from('tb_wilayah_provinsi')
                    ->where('id_prov',$id)
                    ->get();
  foreach ($result->result() as $c) {
    $stmt= $c->nama;
    return $stmt;
  }
}
function ttl_blog_today()
{
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->select('*')
                    ->from('tb_news')
                    ->like('cdate',date('Y-m-d'))
                    ->where('del_flag','1')
                    ->get();
    return count($result->result());
}
function ttl_komentar($id)
{
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->select('*')
                    ->from('tb_komentar')
                    ->where('id_news',$id)
                    ->where('del_flag','1')
                    ->get();
    return count($result->result());

}
function ttl_blog_bybidang($id)
{
  $ci =& get_instance();
  $ci->load->database();
  if ($id==0) {
    $result = $ci->db->select('*')
                      ->from('tb_news')
                      ->like('cdate',date('Y-m-d'))
                      ->where('del_flag','1')
                      ->get();
      return count($result->result());
  }else {
    $result = $ci->db->select('*')
                      ->from('tb_news')
                      ->like('bidang',$id)
                      ->where('del_flag','1')
                      ->get();
      return count($result->result());
  }


}

function tampil_ttl_panen_by_id_kab($id,$flag,$str)
{
  $ci =& get_instance();
  $ci->load->database();
  $total=0;
  $result = $ci->db->select('*')
                    ->from('tb_user')
                    ->where('id_kab',$id)
                    ->where('pekerjaan',$str)
                    ->get();
  foreach ($result->result() as $c) {
    $result1 = $ci->db->select('*')
                      ->from('tb_produksi')
                      ->where('id_user',$c->id_user)
                      ->where('panen_flag',$flag)
                      ->get();
    $jml = count($result1->result());
    $total = $total+$jml;
  }
  return $total;
}

function tampil_ttl_panen_by_id_user($id,$flag)
{
  $ci =& get_instance();
  $ci->load->database();
    $result = $ci->db->select('*')
                      ->from('tb_produksi')
                      ->where('id_user',$id)
                      ->where('panen_flag',$flag)
                      ->get();
    $jml = count($result->result());
  return $jml;
}

function tampil_total_pengguna($id)
{
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->select('*')
                    ->from('tb_user')
                    ->where('id_kab',$id)
                    ->get();
  return count($result->result());
}

function email_to($id)
{
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->select('*')
                    ->from('tb_email_to')
                    ->where('id_email',$id)
                    ->get();
  foreach ($result->result() as $c) {
      $stmt= $c->to;
    return $stmt;
  }
}
function get_user($abjad)
{
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->select('*')
                    ->from('tb_user')
                    ->where('del_flag','1')
                    ->like('nama', $abjad, 'after')
                    ->get();
  return $result->result();
}
function get_user_foradmin($abjad)
{
  $ci =& get_instance();
  $ci->load->database();
  $result = $ci->db->select('*')
                    ->from('tb_user')
                    ->where('del_flag','1')
                    ->where('pekerjaan',$ci->session->userdata('bidang'))
                    ->where('id_kab',$ci->session->userdata('id_kab'))
                    ->like('nama', $abjad, 'after')
                    ->get();
  return $result->result();
}
function tgl_indo($tanggal){
  if (empty($tanggal)) {
    return $tanggal;
  }else {


	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);

	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
}

function sensor_text($string)
{
  $ci =& get_instance();
  $ci->load->database();
  $text_sensor= $ci->db->get_where('tb_sensor_text', array('del_flag' =>"1" ,'_rule'=>'1' ))->result();
  $numItems =count($text_sensor);
  $i=0;
  foreach ($text_sensor as $text) {
    $string = word_censor($string, array( $text->_text), $text->_replace);
    if (++$i === $numItems) {
      return $string;
    }
  }
}


function pekerjaan($value)
{
  if ($value=='1') {
    return 'Petani';
  }elseif ($value=='2') {
    return 'Petambak';
  }else {
    return 'Peternak';
  }
}

function bidang($value)
{
  if ($value=='1') {
    return 'Pertanian';
  }elseif ($value=='2') {
    return 'Perikanan';
  }else {
    return 'Peternakan';
  }
}

function dinas($value)
{
  if ($value=='1') {
    return 'Pertanian';
  }elseif ($value=='2') {
    return 'Perikanan';
  }else {
    return 'Peternakan';
  }
}

function notif_user()
{
  $ci =& get_instance();
  $ci->load->database();
  return $result = $ci->db->select('*')
                    ->from('tb_produksi')
                    ->where('del_flag','1')
                    ->where('panen_flag','0')
                    ->where('id_user',$ci->session->userdata('id'))
                    ->get();
}

function waktu_lalu2($timestamp)
{
  //date_default_timezone_set('Asia/Jakarta');
  $selisih = time() - strtotime($timestamp);
  $detik = $selisih;
  $menit = round($selisih/60);
  $jam = round($selisih/3600);
  $hari = round($selisih/86400);
  $minggu = round($selisih/604800);
  $bulan = round($selisih/2419200);
  $tahun = round($selisih/29030400);
  global $waktu_lalu;
  $waktu_jam = substr($waktu_lalu,11,5);
  if ($detik <= 30)
  {
    $waktu = ' baru saja';
  }
  elseif ($detik <= 60)
  {
    $waktu = $detik.' detik yang lalu';
  }
  elseif ($menit <= 60)
  {
    $waktu = $menit.' menit yang lalu';
  }
  elseif ($jam <= 24)
  {
    $waktu = $jam.' jam yang lalu';
  }
  elseif ($hari <= 1)
  {
    $waktu = ' kemarin '.$waktu_jam;
  }
  elseif ($hari <= 7)
  {
    $waktu = $hari.' hari yang lalu '.$waktu_jam;
  }
  elseif ($minggu <= 4)
  {
    $waktu = $minggu.' minggu yang lalu '.$waktu_jam;
  }
  elseif ($bulan <= 12)
  {
    $waktu = $bulan.' bulan yang lalu '.$waktu_jam;
  }
  else {
    $waktu = $tahun.' tahun yang lalu '.$waktu_jam;
  }

  //echo $waktu;
  return $waktu;
}


function nama_bulan($i)
{
  if ($i=='1') {
    return "Januari";
  }elseif ($i=='2') {
    return 'Februari';
  }elseif ($i=='3') {
    return 'Maret';
  }elseif ($i=='4') {
    return 'April';
  }elseif ($i=='5') {
    return 'Mei';
  }elseif ($i=='6') {
    return 'Juni';
  }elseif ($i=='7') {
    return 'Juli';
  }elseif ($i=='8') {
    return 'Agustus';
  }elseif ($i=='9') {
    return 'September';
  }elseif ($i=='10') {
    return 'Oktober';
  }elseif ($i=='11') {
    return 'November';
  }else {
    return 'Desember';
  }
}

 ?>
