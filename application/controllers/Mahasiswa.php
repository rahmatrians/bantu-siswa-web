<?php

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['mahasiswa']   = $this->Mahasiswa_model->getAllMahasiswa();
        $this->load->view('templates/header', $data);
        $this->load->view('mahasiswa/index', $data);

        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('nim', 'NIM', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            redirect('mahasiswa');
        } else {
            if ($this->Mahasiswa_model->tambahMahasiswa() > 0) {
                redirect('mahasiswa');
            } else {
                redirect('mahasiswa/euhgu');
            }
        }
    }

    public function getUbah()
    {
        // var_dump($_POST['id']);
        echo json_encode($this->Mahasiswa_model->getMahasiswaById($_POST['id']));
    }

    public function ubah()
    {
        if ($this->Mahasiswa_model->ubahMahasiswa($_POST['id']) > 0) {
            redirect('mahasiswa');
        }
        redirect('mahasiswa/8eahe09u');
    }

    public function hapus($id)
    {
        if ($this->Mahasiswa_model->hapusMahasiswa($id) > 0) {
            redirect('mahasiswa');
        }
        redirect('mahasiswa/uestbgfv');
    }
}
