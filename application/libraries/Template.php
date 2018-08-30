<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Template {

    protected $_CI;

    function __construct() {
        $this->_CI = &get_instance();
    }

    function user($template, $data = null) {
        $data['content'] = $this->_CI->load->view($template, $data, true);
        $data['header'] = $this->_CI->load->view('template/header_user', $data, true);
        $data['menubar'] = $this->_CI->load->view('template/menubar_user', $data, true);
        $this->_CI->load->view('template/template', $data);
    }
    function admin($template, $data = null) {
        $data['content'] = $this->_CI->load->view($template, $data, true);
        $data['header'] = $this->_CI->load->view('template/header_admin', $data, true);
        $data['menubar'] = $this->_CI->load->view('template/menubar_admin', $data, true);
        $this->_CI->load->view('template/template', $data);
    }
    function xyz($template, $data = null) {
        $data['content'] = $this->_CI->load->view($template, $data, true);
        $data['header'] = $this->_CI->load->view('template/header_xyz', $data, true);
        $data['menubar'] = $this->_CI->load->view('template/menubar_xyz', $data, true);
        $this->_CI->load->view('template/template', $data);
    }

}
