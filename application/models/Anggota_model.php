<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_model extends CI_Model {
	private $tbl;

	public function __construct(){
		parent::__construct();
		$this->tbl = 'tk_anggota';
	}

	public function selectAllAnggota($order_by = 'ASC'){
		$this->db->select('*');
		$this->db->from($this->tbl);
		$this->db->order_by('id_anggota', $order_by);

		return $this->db->get();
	}

	public function AnggotaJoinTim($condition = null, $order_by = 'ASC'){
		$this->db->select('*');
		$this->db->from($this->tbl);
		$this->db->join('tk_tim', 'tk_tim.id_tim='.$this->tbl.'.id_tim');
		$this->db->order_by('id_anggota', $order_by);

		if($condition != null):
			$this->db->where($condition);
		endif;

		return $this->db->get();
	}

	public function insertAnggota($data){
		$this->db->insert($this->tbl, $data);
	}

	public function getAnggotaTim($id_tim){
		$this->db->select('*');
		$this->db->from($this->tbl);
		$this->db->where('id_tim', $id_tim);

		return $this->db->get();
	}

	public function updateAnggota($data, $str){
		$this->db->where('username', $str);
		$this->db->update($this->tbl, $data);
		return $this->db->affected_rows();
	}

	public function getSelectedAnggota($str){
		$this->db->select('*');
		$this->db->from($this->tbl);
		$this->db->where('email', $str);
		$this->db->or_where('id_anggota', $str);

		return $this->db->get();
	}
}