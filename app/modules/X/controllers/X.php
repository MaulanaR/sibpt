<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author 		Oky Octaviansyah <oky.octaviansyah@yahoo.co.id>
*/

class X extends CI_Controller {
	
	

	public function __construct()
	{	
		parent::__construct();

	}

	public function index()
	{
		echo "X";
	}

	public function sendemail()
	{
		$this->load->library('email');
		$ci = get_instance();
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "ssl://smtp.googlemail.com";
		$config['smtp_port'] = "465";
		$config['smtp_user'] = "coc17061997@gmail.com";
		$config['smtp_pass'] = "1706199733";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";
		$ci->email->initialize($config);
		$ci->email->from('coc17061997@gmail.com', 'MAULTEST');
		$list = array('oky.octav@gmail.com');
		$ci->email->to($list);
		$ci->email->subject('judul email');
		$ci->email->message('<b>TEST COYY</b>');
		if ($this->email->send()) {
		echo 'Email sent.';
		} else {
		show_error($this->email->print_debugger());
		}
	}

}

/* End of file X.php */
/* Location: ./application/modules/X/controllers/X.php */