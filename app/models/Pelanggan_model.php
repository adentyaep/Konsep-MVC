<?php
    class Pelanggan_model{
        private $table = 'pelanggan';
        private $db;
        public function __construct()
        {
            $this->db = new Database;
        }
        public function getAllUser()
        {
            $this->db->query('SELECT * FROM ' . $this->table);
            return $this->db->resultSet();
        }
        // public function getUserReady()
        // {
        //     $sql="select m.id_pelanggan, m.no_ktp, m.foto_pelanggan, m.nama_lengkap, m.tanggal_lahir, m.alamat_pelanggan, m.no_telpon, j.status_peminjaman from mobil j inner join pelanggan m on (j.id_jenis = m.id_jenis) where m.status='0'";
        //     $this->db->query($sql);
        //     return $this->db->resultSet();
        // }
        public function getAllUserById($id)
        {
            $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_pelanggan=:id');
            $this->db->bind('id',$id);
            return $this->db->single();
        }
        public function uploadFoto(){
            $namaFile = $_FILES['foto_pelanggan']['name'];
            $namaSementara = $_FILES['foto_pelanggan']['tmp_name'];
            // tentukan lokasi file akan dipindahkan
            $dirUpload = "gambar/";
            // pindahkan file
            $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
            if ($terupload) {
                return true;
            } else {
                return false;
            }
        }
        public function reUploadFoto(){
            $namaFile = $_FILES['foto_pelanggan']['name'];
            $namaSementara = $_FILES['foto_pelanggan']['tmp_name'];
            $fotobaru = $namaFile.date('d-m-Y');
            // tentukan lokasi file akan dipindahkan
            $dirUpload = "gambar/";
            // pindahkan file
            $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
            if ($terupload) {
            //if(is_file($dirUpload.$namaFile)){ 
            // unlink($dirUpload.$namaFile); 
                return true;} 
            else 
                return false;
        }
        public function tambahPelanggan($no_ktp,$foto_pelanggan,$nama_lengkap, $tanggal_lahir, $alamat, $no_telp, $status_peminjaman)
        {
            $this->db->query('SELECT (max(id_pelanggan)+1) as maks_id FROM ' . $this->table);
            $data=$this->db->resultSet();
            foreach ($data as $rec){
            $id=$rec["maks_id"];}
            
            $this->db->query('INSERT INTO ' . $this->table . '(id_pelanggan,no_ktp,foto_pelanggan, nama_lengkap, tanggal_lahir, alamat_pelanggan, no_telpon, status_peminjaman) 
            VALUES(:id_pelanggan,:no_ktp,:foto_pelanggan, :nama_lengkap, :tanggal_lahir,:alamat,:noTelp,:status)');
            $this->db->bind('id_pelanggan',$id);
            $this->db->bind('no_ktp',$no_ktp);
            $this->db->bind('foto_pelanggan',$foto_pelanggan);
            $this->db->bind('nama_lengkap',$nama_lengkap);
            $this->db->bind('tanggal_lahir',$tanggal_lahir);
            $this->db->bind('alamat',$alamat);
            $this->db->bind('noTelp',$no_telp);
            $this->db->bind('status',$status_peminjaman);
            $this->db->execute();
        }
        public function updatePelanggan($id, $no_ktp,$foto_pelanggan,$nama_lengkap, $tanggal_lahir, $alamat, $noTelp, $status_peminjaman)
        {
            $this->db->query('UPDATE ' . $this->table . ' SET foto_pelanggan=:foto_pelanggan,no_ktp=:no_ktp,nama_lengkap=:nama_lengkap, tanggal_lahir=:tanggal_lahir,alamat_pelanggan=:alamat,no_telpon=:no_telp,status_peminjaman=:status WHERE id_pelanggan=:id_pelanggan');
            $this->db->bind('id_pelanggan',$id);
            $this->db->bind('foto_pelanggan',$foto_pelanggan);
            $this->db->bind('no_ktp',$no_ktp);
            $this->db->bind('nama_lengkap',$nama_lengkap);
            $this->db->bind('tanggal_lahir',$tanggal_lahir);
            $this->db->bind('alamat',$alamat);
            $this->db->bind('no_telp',$noTelp);
            $this->db->bind('status',$status_peminjaman);
            $this->db->execute();
        }
        public function updateStatus($id,$status_peminjaman)
        { 
            $sql="UPDATE ".$this->table." SET status='$status' WHERE idmobil='$idmobil'";
            $this->db->query($sql);
            $this->db->execute();
        }
        public function deletePelanggan($id)
        {
            $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_pelanggan=:id_pelanggan');
            $this->db->bind('id_pelanggan',$id);
            $this->db->execute();
        }
    }