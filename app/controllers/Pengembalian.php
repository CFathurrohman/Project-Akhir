<?php

class Pengembalian extends Controller
{
    public function index()
    {
        $data['judul'] = 'Pengembalian buku';
        $data['buku'] = $this->model('Pengembalian_model')->getPengembalian();
        $this->view('templates/header', $data);
        $this->view('Pengembalian/index', $data);
        $this->view('templates/footer');
    }

    public function cari()
    {
        $data['judul'] = 'Pengembalian buku';
        $data['buku'] = $this->model('Pengembalian_model')->getPengembalian();
        $this->view('templates/header', $data);
        $this->view('Pengembalian/index', $data);
        $this->view('templates/footer');
    }

    public function kembali($idPeminjaman){
        $data = ['id_peminjaman' => $idPeminjaman];
    
        if ($this->model('Pengembalian_model')->terimaPengembalian($data)) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
        }
    
        header('Location: ' . BASEURL . '/pengembalian');
        exit;
    }

    public function read($id)
    {
        $data['judul'] = 'Pengembalian Buku';
        $data['buku'] = $this->model('Pengembalian_model')->readMulti($id);
        $this->view('templates/header', $data);
        $this->view('Pengembalian/read/index', $data);
        $this->view('templates/footer');
    }
}
