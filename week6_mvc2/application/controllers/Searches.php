<?php
defined("BASEPATH") OR exit("No direct script access allowed.");

class Searches extends CI_Controller {

	private $view_data = [];
	private $page_config = [];
	private $filter = [];

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
		$this->load->model("Search");
		$this->load->library("pagination");

		// default page option
		$this->filter["page_start"] = 1;
		$this->filter["page_size"] = 20;
	}

	public function index() { }

	public function fetch() {

		// pagination default configuration for first page
		$this->page_config["base_url"] = "/searches/fetch";
		$this->page_config["uri_segment"] = 3;
		$this->page_config["per_page"] = $this->filter["page_size"];
		$this->page_config["total_rows"] = $this->Search->record_count();
		$choice = $this->page_config["total_rows"] / $this->page_config["per_page"];
		$this->page_config["num_links"] = round($choice);

		$this->pagination->initialize($this->page_config);

		$this->filter["page_start"] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		// for view page
		$this->view_data["leads"] = $this->Search->fetch_leads($this->filter);
		$this->view_data["links"] = $this->pagination->create_links();
		
		$this->load->view("searches/index", $this->view_data);
	}

	public function filter()
	{
		$this->filter = $this->input->post();

		// $this->filter["page_start"] = 1;

		// pagination  configuration
		$this->page_config["base_url"] = "/searches/filter";
		$this->page_config["uri_segment"] = 3;
		$this->page_config["per_page"] = $this->filter["page_size"];
		$this->page_config["total_rows"] = intval($this->Search->count_by_filter($this->filter));
		$choice = $this->page_config["total_rows"] / $this->page_config["per_page"];
		$this->page_config["num_links"] = round($choice);

		$this->pagination->initialize($this->page_config);

		$this->filter["page_start"] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$this->view_data["leads"] = $this->Search->fetch_by_filter($this->filter);
		$this->view_data["links"] = $this->pagination->create_links();
		
		$this->load->view("searches/partial", $this->view_data);
	}
}

?>