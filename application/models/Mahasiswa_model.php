<?php 

class Mahasiswa_model extends CI_Model {
    private $table = 'mahasiswa';

    public function getAllMahasiswa() {
        return $this->db->get($this->table)->result_array();
        // $query = $this->db->get('mahasiswa');
        // return $query->result_array();
    }

    public function getMahasiswaById($id) {
        return $this->db->get_where($this->table, ['id' => $id])->row_array();
    }

    public function tambahMahasiswa() {
        $data = [
            'nama'      => $this->input->post('nama'),
            'nim'       => $this->input->post('nim'),
            'email'     => $this->input->post('email'),
            'jurusan'   => $this->input->post('jurusan')
        ];

        $this->db->insert($this->table, $data);
        return $this->db->count_all_results();
    }

    public function ubahMahasiswa() {
        $data = [
            'nama'      => $this->input->post('nama'),
            'nim'       => $this->input->post('nim'),
            'email'     => $this->input->post('email'),
            'jurusan'   => $this->input->post('jurusan')
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update($this->table, $data);
        return $this->db->count_all_results();
    }

    public function hapusMahasiswa($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
        return $this->db->count_all_results();
    }
}

?>
