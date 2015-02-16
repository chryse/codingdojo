<?php
defined("BASEPATH") OR exit("No direct script access allowed.");

class Search extends CI_Model {

	private $lead_gen_business;

	public function __construct()
	{
		parent::__construct();
		$this->lead_gen_business = $this->load->database("lead_gen_business", true);
	}

	public function record_count()
	{
		return $this->lead_gen_business->count_all("leads");
	}

	public function fetch_leads($filter)
	{
		$query = "SELECT *, DATE_FORMAT(registered_datetime, '%Y-%m-%d') as registered_datetime 
				  FROM leads
				  LIMIT ?, ?";
		$value = array(intval($filter["page_start"]), intval($filter["page_size"]));
		return $this->lead_gen_business->query($query, $value)->result_array();
	}

	public function fetch_by_filter($filter)
	{
		if($filter["name"] != "") {
			$query = "SELECT *, DATE_FORMAT(registered_datetime, '%Y-%m-%d') as registered_datetime
				  FROM leads
				  WHERE (first_name LIKE ? OR last_name LIKE ?) 
				  AND (registered_datetime BETWEEN ? AND ?)
				  LIMIT ?, ?";
			$value = array("%".$filter["name"]."%", "%".$filter["name"]."%", $filter["from"], $filter["to"], intval($filter["page_start"]), intval($filter["page_size"]));	
		}
		else {
			$query = "SELECT *, DATE_FORMAT(registered_datetime, '%Y-%m-%d') as registered_datetime
				  FROM leads
				  WHERE registered_datetime BETWEEN ? AND ?
				  LIMIT ?, ?";
			$value = array($filter["from"], $filter["to"], intval($filter["page_start"]), intval($filter["page_size"]));
		}	
		return $this->lead_gen_business->query($query, $value)->result_array();
	}

	public function count_by_filter($filter)
	{
		if($filter["name"] != "") {
			$query = "SELECT count(leads_id) FROM leads
				  	  WHERE (first_name LIKE ? OR last_name LIKE ?) 
				  	  AND (registered_datetime BETWEEN ? AND ?)";
			$value = array("%".$filter["name"]."%", "%".$filter["name"]."%", $filter["from"], $filter["to"]);	
		}
		else {
			$query = "SELECT count(leads_id) FROM leads
				  	  WHERE registered_datetime BETWEEN ? AND ?";
			$value = array($filter["from"], $filter["to"]);
		}	
		return $this->lead_gen_business->query($query, $value)->result_array();
	}
}

?>