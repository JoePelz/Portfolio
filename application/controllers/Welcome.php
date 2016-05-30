<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	function __construct()
	{
			parent::__construct();
			$this->data['styles'][] = array("stylesheet" => "/assets/css/index.css");
	}

	public function index()
	{
		$this->data['pagetitle'] = 'Joe Pelz\'s Portfolio';
		$this->data['content'] = $this->parser->parse('homepage', $this->data, true);
		$this->render();
	}
}
