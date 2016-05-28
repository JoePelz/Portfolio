<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	function __construct()
	{
			parent::__construct();
			$this->load->model("articles");
	}

	public function index()
	{
		$this->data['pagetitle'] = 'Joe Pelz\'s Portfolio';

		$sections = array();
		$articles = array();
		$articles[] = array(
			'articlePath' => "aPath1",
			'articleImage' => "aImage1",
			'articleTitle' => "aTitle1",
		);
		$articles[] = array(
			'articlePath' => "aPath2",
			'articleImage' => "aImage2",
			'articleTitle' => "aTitle2",
		);

		$sections[] = array(
			'sectionTitle'    => "section1",
			'articles' => $articles,
	  );


		$articles = array();
		$articles[] = array(
			'articlePath' => "aPath3",
			'articleImage' => "aImage3",
			'articleTitle' => "aTitle3",
		);
		$articles[] = array(
			'articlePath' => "aPath4",
			'articleImage' => "aImage4",
			'articleTitle' => "aTitle4",
		);

 		$sections[] = array(
 				'sectionTitle'    => "section2",
				'articles' => $articles,
 		 );

		//$this->data['sections'] = $sections;
		$this->loadSections();
		$this->data['content'] = $this->parser->parse('homepage', $this->data, true);
		$this->render();
	}

	public function loadSections()
	{
		$this->data['sections'] = $this->articles->getAllSections();
	}
}
