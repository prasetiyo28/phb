<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_capil extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('xml2array');
    $this->load->helper('array2xml');

  }
  public function get_api_capil($nik)
  {
      $url='http://103.12.164.52/mantra/api/disdukcapil/ws_data/';
    	$method='get_penduduk_by_nik';
    	$accesskey='qllfcqiaf3';
    	$request= array('nik' => $nik );

    	$result= $this->callAPI(
  		$endpoint=$url,
  		$operation=$method,
  		$accesskey,
  		$parameter=$request,
  		$xmlformat=true,  // true:output data XML, false:output data Array
  		$callmethod='POST' // call option: GET, POST, REST, RESTFULL, RESTFULLPAR
  	);

    if(is_array($result)) $data=$result;
    else $data=$this->setXML2Array($result);

    $hasil = $data['response']['data']['get_penduduk_by_nik']['output'];
    if ($hasil=="{}") {
      $benar= array('status' => '0', 'data'=>$hasil );
    }else {
      $benar= array('status' => '1', 'data'=>$hasil );
    }
    echo json_encode($benar);

    //echo json_encode($data);
  }
  public function callAPI($endpoint,$operation,$accesskey='',$parameter=array(),$xmlformat=true,$callmethod='REST',$agent="MANTRA")
  {
    	$result=false;
    	$callmethod=strtoupper($callmethod);

    	if(empty($endpoint)){
    		$response=array('status'=>0,'code'=>10001,'message'=>'Empty URL/EndPoint','data'=>'');
    		if($xmlformat){
    			$result=$this->setArray2XML('response',$response);
    		}
    		else{
    			$result=array('response'=>$response);
    		}
    		return $result;
    	}

    	if(!empty($parameter)){
    		$apar=array();
    		foreach($parameter as $key=>$value){
    			$apar[$key]=urlencode($value);
    		}
    		$parameter=$apar;
    	}

    	//setting parameter untuk call method RESTFULL dan RESTFULLPAR
    	$reqpars='';
    	if($callmethod=='RESTFULL' && !empty($parameter)):
    		$reqpars=implode('/',$parameter);
    		$parameter=array();
    	endif;

    	if($callmethod=='RESTFULLPAR' && !empty($parameter)):
    		foreach($parameter as $key=>$value){
    			$reqpars.='/'.$key.'/'.$value;
    		}
    		$reqpars=substr($reqpars,1);
    		$parameter=array();
    	endif;

    	$par='';
    	if(!empty($parameter)) $par=http_build_query($parameter);

    	//susun uri
    	$uri=$endpoint;
    	if (!empty($operation)) {
    		$uri.=substr($uri,-1)=='/'?$operation:'/'.$operation;
    	}
    	if (!empty($accesskey)) {
    		$uri.=substr($uri,-1)=='/'?$accesskey:'/'.$accesskey;
    	}
    	if (!empty($reqpars)){ //tambah parameter untuk call method RESTFULL dan RESTFULLPAR
    		$uri.=substr($uri,-1)=='/'?$reqpars:'/'.$reqpars;
    	}
    	if (!empty($par) && $callmethod=='GET'){ //tambah parameter untuk call method GET
    		substr($uri,-1)=='/'?$uri=substr($uri,0,-1).'?'.$par:$uri.='?'.$par;
    	}
    	if (!empty($par) && $callmethod=='REST'){ //tambah parameter untuk untuk call method REST
    		$uri.=substr($uri,-1)=='/'?$par:'/'.$par;
    	}

    	if(empty($uri)){
    		$response=array('status'=>0,'code'=>10002,'message'=>'Empty URI','data'=>'');
    		if($xmlformat){
    			$result=setArray2XML('response',$response);
    		}
    		else{
    			$result=array('response'=>$response);
    		}
    	}
    	else{
    		substr($uri,-1)=='/'?$uri=substr($uri,0,-1):$uri=$uri;
    		$ch = curl_init();
    		// URL target koneksi
    		curl_setopt($ch, CURLOPT_URL, $uri);
    		if($agent!='') curl_setopt($ch, CURLOPT_USERAGENT, $agent);
    		// Output dengan header=true hanya untuk meta document xml/json
    		curl_setopt($ch, CURLOPT_HEADER, FALSE);
    		// Mendapatkan tanggapan
    		curl_setopt($ch, CURLOPT_RETURNTRANSFER,TRUE);
    		curl_setopt($ch, CURLOPT_BINARYTRANSFER, FALSE);
    		curl_setopt($ch, CURLOPT_FAILONERROR, TRUE);

    		// Menggunakan metode HTTP GET
    		if(in_array($callmethod,array('GET','REST','RESTFULL','RESTFULLPAR')) ){
    			curl_setopt($ch, CURLOPT_HTTPGET, TRUE);
    		}

    		// Menggunakan metode HTTP POST
    		if($callmethod=='POST'){
    			curl_setopt($ch, CURLOPT_POST, TRUE);
    			// Sisipkan parameter
    			curl_setopt($ch, CURLOPT_POSTFIELDS,$par);
    		}


    		// Buka koneksi dan dapatkan tanggapan
    		$result=curl_exec($ch);
    		$errno=curl_errno($ch);
    		$errmsg=curl_error($ch);


    		// Periksa kesalahan
    		if ($errno!=0){
    			$response=array('status'=>0,'code'=>$errno,'message'=>$errmsg,'data'=>'');
    			if($xmlformat){
    				$result=setArray2XML('response',$response);
    			}
    			else{
    				$result=array('response'=>$response);
    			}
    		}
    		else{
    			if(substr($result,0,5)!='<?xml'){
    				$response=array('status'=>1,'code'=>200,'message'=>'OK','data'=>$result);
    				$result=setArray2XML('response',$response);
    			}
    			if($xmlformat){
    				$result=trim($result);
    			}
    			else{
    				$result=$this->setXML2Array($result);
    			}
    		}


    		curl_close($ch);
    	}

    	return $result;
}
public function getAPIJSON($endpoint,$operation,$accesskey='',$parameter=array(),$callmethod='REST',$agent="MANTRA")
{
          	$result=false;
          	$callmethod=strtoupper($callmethod);

          	if(empty($endpoint)){
          		$response=array('status'=>0,'code'=>10001,'message'=>'Empty URL/EndPoint','data'=>'');
          		$result=array('response'=>$response);
          		return $result;
          	}
          	$endpoint.=substr($endpoint,-1)=='/'?'':'/';

          	if(!empty($accesskey)) $accesskey.=substr($accesskey,-1)=='/'?'':'/';

          	if(!empty($parameter)){
          		$apar=array();
          		foreach($parameter as $key=>$value){
          			$apar[$key]=urlencode($value);
          		}
          		$parameter=$apar;
          	}

          	if($callmethod=='RESTFULL' && !empty($parameter)){
          		$reqpars=implode('/',$parameter);
          		$operation.='/'.$accesskey.$reqpars;
          		$parameter=array();
          	}

          	if($callmethod=='RESTFULLPAR' && !empty($parameter)){
          		$reqpars='/';
          		foreach($parameter as $key=>$value){
          			$reqpars.=$key.'/'.$value;
          		}
          		$operation.='/'.$accesskey.substr($reqpars,1);
          		$parameter=array();
          	}

          	$par='';
          	if(!empty($parameter)) $par=http_build_query($parameter);


          	if($callmethod=='RESTFULL'){
          		$uri=empty($operation)?$endpoint:$endpoint.$operation;
          	}
          	elseif($callmethod=='RESTFULLPAR'){
          		$uri=empty($operation)?$endpoint:$endpoint.$operation;
          	}
          	elseif($callmethod=='GET'){
          		$uri=empty($operation)?$endpoint.$accesskey.'?'.$par:$endpoint.$operation.'/'.$accesskey.'?'.$par;
          	}
          	elseif($callmethod=='POST'){
          		$uri=empty($operation)?$endpoint.$accesskey:$endpoint.$operation.'/'.$accesskey;
          	}
          	else{
          		$uri=empty($operation)?$endpoint.$accesskey.$par:$endpoint.$operation.'/'.$accesskey.$par;
          	}


          	if(empty($uri)){
          		$response=array('status'=>0,'code'=>10002,'message'=>'Empty URI','data'=>'');
          		$result=json_encode(array('response'=>$response),JSON_FORCE_OBJECT);
          	}
          	else{
          		$ch = curl_init();
          		// URL target koneksi
          		curl_setopt($ch, CURLOPT_URL, $uri);
          		if($agent!='') curl_setopt($ch, CURLOPT_USERAGENT, $agent);
          		// Output dengan header=true hanya untuk meta document xml/json
          		curl_setopt($ch, CURLOPT_HEADER, FALSE);
          		// Mendapatkan tanggapan
          		curl_setopt($ch, CURLOPT_RETURNTRANSFER,TRUE);
          		curl_setopt($ch, CURLOPT_BINARYTRANSFER, FALSE);
          		curl_setopt($ch, CURLOPT_FAILONERROR, TRUE);

          		// Menggunakan metode HTTP GET
          		if(in_array($callmethod,array('GET','REST','RESTFULL','RESTFULLPAR')) ){
          			curl_setopt($ch, CURLOPT_HTTPGET, TRUE);
          		}

          		// Menggunakan metode HTTP POST
          		if($callmethod=='POST'){
          			curl_setopt($ch, CURLOPT_POST, TRUE);
          			// Sisipkan parameter
          			curl_setopt($ch, CURLOPT_POSTFIELDS,$par);
          		}


          		// Buka koneksi dan dapatkan tanggapan
          		$result=curl_exec($ch);
          		$errno=curl_errno($ch);
          		$errmsg=curl_error($ch);


          		// Periksa kesalahan
          		if ($errno!=0){
          			$response=array('status'=>0,'code'=>$errno,'message'=>$errmsg,'data'=>'');
          			$result=json_encode(array('response'=>$response),JSON_FORCE_OBJECT);
          		}
          		else{

          			if(substr($result,0,5)=='<?xml'){
          				$result=$this->setXML2Array($result);
          				if(!isset($result['response'])) $result=array('response'=>array('status'=>1,'code'=>200,'message'=>'OK','data'=>$result));
          				$result=json_encode($result,JSON_FORCE_OBJECT);
          			}
          			elseif(substr($result,0,1)!='{'){
          				$result=json_decode($result,true);
          				if(!isset($result['response'])) $result=array('response'=>array('status'=>1,'code'=>200,'message'=>'OK','data'=>$result));
          				$result=json_encode($result,JSON_FORCE_OBJECT);
          			}

          		}


          		curl_close($ch);
          	}

          	return $result;
}
public function setXML2Array($xmldata)
{
	if (!extension_loaded('dom')) return array();
	return XML2Array::createArray($xmldata);
}
public function setArray2XML($nodename,$data)
{
	if (!extension_loaded('dom')) return '';
	$xml=Array2XML::createXML($nodename,$data);
	return $xml->saveXML();
}


}
