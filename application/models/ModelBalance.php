<?php
 
class ModelBalance extends CI_Model
{
    public function getBalance($id = null)
    {
        if ($id === null) {
            return $this->db->get('api_banking')->result_array();
        } else {
            return $this->db->get_where('api_banking', ['id' => $id])->result_array();
        }
    }
 
    // public function deleteMahasiswa($id)
    // {
    //     $this->db->delete('mahasiswa', ['id' => $id]);
    //     return $this->db->affected_rows();
    // }
 
    // public function createMahasiswa($data)
    // {
    //     $this->db->insert('mahasiswa', $data);
    //     return $this->db->affected_rows();
    // }
 
    // public function updateMahasiswa($data, $id)
    // {
    //     $this->db->update('mahasiswa', $data, ['id' => $id]);
    //     return $this->db->affected_rows();
    // }
}