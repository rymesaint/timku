<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projek_model extends CI_Model {
	private $tbl;

	public function __construct(){
		parent::__construct();
		$this->tbl = 'tk_projek';
	}

	public function selectAllProjek(){
		$this->db->select('*');
		$this->db->from($this->tbl);

		return $this->db->get();
	}

	public function insertProjek($data){
		$this->db->insert($this->tbl, $data);
	}

	public function updateProjek($update, $id){
		$this->db->where('id_projek', $id);
		$this->db->update($this->tbl, $update);
	}

	public function deleteProjek($id){
		$this->db->where('id_projek', $id);
		$this->db->delete($this->tbl);
	}

	public function getSelectedProjek($str){
		$this->db->select('*');
		$this->db->from($this->tbl);
		$this->db->where('id_projek', $str);
		$this->db->or_like('nama_projek', $str);

		return $this->db->get();
	}
}