<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 class Main_model extends CI_Model {
	public function __construct()
	{
	    parent::__construct();
	}
  public function full_data() {
	$this->db->select('*');
	$this->db->from('tutorial');
	$this->db->order_by('id','desc');
	$query=$this->db->get();

  	return $query->result_array();
  }
  public function half_archive() {
	$this->db->select('*');
	$this->db->from('tutorial');
	$this->db->order_by('id','desc');
	$this->db->limit(5,0);
	$query=$this->db->get();

  	return $query->result_array();
  }
  public function first_load() {
	$this->db->select('*');
	$this->db->from('tutorial');
	$this->db->order_by('id','desc');
	$this->db->limit(3,0);
	$query=$this->db->get();

  	return $query->result_array();
  }
  public function page_load($perpage, $startindex) {
	  $this->db->select('*');
	  $this->db->from('tutorial');
	  $this->db->order_by('id','desc');
	  $this->db->limit($perpage, $startindex);

	  $query=$this->db->get();
	  return $query->result_array();
  }

  public function geman($data){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('username',$data['usnm']);
		$this->db->where('password',md5($data['pass']));
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->row_array();
		} else {
			return false;
		}
  }

  public function pawpaw($data) {
	$this->db->insert('tutorial', $data);
  }

  public function piwpiw($data,$id) {
	$this->db->where('id', $id);
	$this->db->update('tutorial', $data);
  }

  public function puwpuw($id) {
	$this->db->where('id', $id);
	$this->db->delete('tutorial');
  }

  public function selectedPage($link){
	$this->db->select('*');
	$this->db->from('tutorial');
  	$this->db->where('link', $link);
  	$query=$this->db->get();
  	return $query->row_array();
  }

  public function data_selected($id){
	$this->db->select('*');
	$this->db->from('tutorial');
  	$this->db->where('id', $id);
  	$query=$this->db->get();
  	return $query->row_array();
  }

}
?>