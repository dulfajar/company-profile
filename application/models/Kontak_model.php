<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak_model extends CI_Model {

	// load database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
    }

    // Listing
	public function listing() {
		$this->db->select('*');
		$this->db->from('pesan');
		$query = $this->db->get();
		if($query){
    
            return $query->row();
   
        }
    }
    
    // Tambah
	public function tambah($data) {
        $query = $this->db->insert('pesan',$data);
       if($query){
        return true;
       }
        
	}
	
	// Edit
	public function edit($data) {
		$this->db->where('id',$data['id']);
		$this->db->update('pesan',$data);
	}
	
	// Check delete
	public function check($id_pesan) {
		$query = $this->db->get_where('id',array('id_pesan' => $id_pesan));
		return $query->num_rows();
	}
	
	// Delete
	public function delete($data) {
		$this->db->where('id_konfigurasi',$data['id_konfigurasi']);
		$this->db->delete('konfigurasi',$data);
	}
}