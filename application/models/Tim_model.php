<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tim_model extends CI_Model {
	private $tbl;

	public function __construct(){
		parent::__construct();
		$this->tbl = 'tk_tim';
	}

	public function selectAllTim(){
		$this->db->select('*');
		$this->db->from($this->tbl);

		return $this->db->get();
	}

	public function insertTim($data){
		$this->db->insert($this->tbl, $data);
	}

	public function getSelectedTim($str){
		$this->db->select('*');
		$this->db->from($this->tbl);
		$this->db->where('nama_tim', $str);
		$this->db->or_where('id_tim', $str);

		return $this->db->get();
	}

	public function joinTimAnggota($id = null){
		$this->db->select('tk_anggota.id_anggota, tk_anggota.nama_anggota, tk_anggota.email');
		$this->db->from($this->tbl);
		$this->db->join('tk_anggota', 'tk_anggota.id_tim='.$this->tbl.'.id_tim');

		if($id != null):
			$this->db->where($id);
		endif;

		return $this->db->get();
	}
}