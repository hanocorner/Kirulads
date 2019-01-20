<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Base extends Public_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function  __construct()
	{
		parent::__construct();
		

		$this->load->model('public/home/Base_model', 'base');
	}

	/*** */
	public function index()
	{	
		$this->layout->title = 'kirulads.lk - Electronics, Cars, Property and Jobs in Sri Lanka';
		$this->layout->view('public/home/index');
	}

	
}
