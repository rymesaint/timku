<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penugasan_model extends CI_Model {
	private $tbl;

	public function __construct(){
		parent::__construct();
		$this->tbl = 'tk_penugasan';
	}

	public function getPenugasan($str){
		$this->db->select('*');
		$this->db->from($this->tbl);
		$this->db->where('id_projek', $str);
		$this->db->or_where('id_team', $str);

		return $this->db->get();
	}

	public function insertPenugasan($data){
		$this->db->insert($this->tbl, $data);
	}

	public function updatePenugasan($update, $id){
		$this->db->where('id_penugasan', $id);
		$this->db->update($this->tbl, $update);
	}

	public function joinAllPenugasan($idteam = null){
		$this->db->select('id_penugasan, tk_tim.id_tim, tk_tim.nama_tim, tk_anggota.nama_anggota, tk_projek.nama_projek, tk_penugasan.tgl_dibuat, tk_projek.id_projek');
		$this->db->from($this->tbl);
		$this->db->join('tk_anggota', 'tk_anggota.id_anggota='.$this->tbl.'.id_anggota');
		$this->db->join('tk_projek', 'tk_projek.id_projek='.$this->tbl.'.id_projek');
		$this->db->join('tk_tim', 'tk_tim.id_tim='.$this->tbl.'.id_team');
		$this->db->order_by('tgl_dibuat', 'DESC');

		if($idteam != null):
			$this->db->where($idteam);
		endif;

		return $this->db->get();
	}
}