<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends MY_Controller {

	function __construct()
	{
			parent::__construct();
			$this->data['styles'][] = array("stylesheet" => "/assets/css/article.css");
	}

  function index($article) {
		$this->data['pagetitle'] = $article;
		foreach($this->articles->getStyles($article) as $style)
		{
			$this->data['styles'][] = array("stylesheet" => $style);
		}
		foreach($this->articles->getScripts($article) as $script)
		{
			$this->data['scripts'][] = array("javascript" => $script);
		}

		$this->data['content'] = file_get_contents('./assets/articles/' . $article . '/index.php');
    $this->render();
  }
}
