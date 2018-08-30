<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$n = "1234567890";
		echo substr($n,0,9);
	}
}
