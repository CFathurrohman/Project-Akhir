<?php
class Peminjaman_model
{
    private $table = 'peminjaman_buku';
    private $db;


    public function __construct()
    {
        // data source name
        $this->db = new Database();
    }

    public function getAllPeminjaman()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getPeminjamanDiajukan(){
        $this->db->query("SELECT p.id_peminjaman, p.tgl_batas_kembali, p.tgl_pengajuan, a.nama, a.no_telp, a.id_anggota, b.nama_buku, p.tgl_pinjam, p.tgl_kembali, d.jumlah, p.status
        FROM peminjaman_buku p, anggota a, buku b, detail_peminjaman d
        WHERE p.status = 'diajukan' AND d.id_buku = b.id_buku AND d.id_peminjaman = p.id_peminjaman AND p.id_anggota=a.id_anggota");
        return $this->db->resultSet();
    }

    public function terimaPeminjaman($data){
        $tgl_pinjam = date('Y-m-d');
        $tgl_batas_kembali = date('Y-m-d', strtotime($tgl_pinjam . ' + 7 days'));
    
        $this->db->query("UPDATE peminjaman_buku SET status='dipinjam', tgl_pinjam = :tgl_pinjam, tgl_batas_kembali = :tgl_batas_kembali WHERE id_peminjaman = :id_peminjaman");
        $this->db->bind(':id_peminjaman', $data['id_peminjaman']);
        $this->db->bind(':tgl_pinjam', $tgl_pinjam);
        $this->db->bind(':tgl_batas_kembali', $tgl_batas_kembali);
    
        return $this->db->execute(); 
    }
    

    public function tolakPeminjaman($data){
        $this->db->query("UPDATE peminjaman_buku SET status='ditolak', tgl_kembali=NULL WHERE id_peminjaman = :id_peminjaman");
        $this->db->bind(':id_peminjaman', $data['id_peminjaman']);
        return $this->db->execute(); 
    }
}