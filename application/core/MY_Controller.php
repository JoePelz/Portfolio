<?php

/**
 * core/MY_Controller.php
 *
 * Default application controller, rendering the website template
 *
 * @author		JoePelz
 * @copyright           2016, Joe Pelz
 * ------------------------------------------------------------------------
 */
class MY_Controller extends CI_Controller {

	protected $data = array();	  // parameters for view components
	protected $id;				  // identifier for our content

	/**
	 * Constructor.
	 * Establish view parameters & load common helpers
	 */

	function __construct()
	{
		parent::__construct();
		$this->load->model("articles");
		$this->data = array();
		$this->data['pagetitle'] = 'Portfolio';	// our default title
		$this->data['sections'] = $this->articles->getAllSections();
		$styles = array();
		$styles[] = array("stylesheet" => "/assets/css/common.css");
		$this->data['styles'] = $styles;
		$this->data['scripts'] = array();
	}

	/**
	 * Render this page by pulling different elements together
   * and parsing/replacing {tags} with content from $this->data.
	 */
	function render()
	{
    $this->data['head'] = $this->parser->parse('head', $this->data, true);
	  $this->data['header'] = $this->parser->parse('header', $this->data, true);
    //$this->data['navbar'] = $this->parser->parse('navbar', $this->data, true);
		//navbar is part of header
		$this->data['footer'] = $this->parser->parse('footer', $this->data, true);

    // finally, build the browser page!
    $this->data['data'] = &$this->data;

    $this->parser->parse('_template', $this->data);
	}
}
