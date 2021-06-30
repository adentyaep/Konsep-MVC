<?php
class Mobil_model{
 
    private $table = 'mobil';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllMobil()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
    public function getMobilReady()
    {
        $sql="select m.idmobil, m.foto_mobil, j.nama_jenis, m.type_mobil, m.merk, m.no_polisi, m.warna, m.harga, m.status from jenis j inner join mobil m on (j.id_jenis = m.id_jenis) where m.status='0'";
        $this->db->query($sql);
        return $this->db->resultSet();
    }
    public function getAllMobilById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE idmobil=:id');
        $this->db->bind('id',$id);
        return $this->db->single();
    }
    public function getHargaSewa($id)
    {
        $this->db->query('SELECT harga FROM ' . $this->table . ' WHERE idmobil=:id');
        $this->db->bind('id',$id);
        return $this->db->single();
    }
    public function uploadFoto(){
        $namaFile = $_FILES['foto_mobil']['name'];
        $namaSementara = $_FILES['foto_mobil']['tmp_name'];
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
        $namaFile = $_FILES['foto_mobil']['name'];
        $namaSementara = $_FILES['foto_mobil']['tmp_name'];
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
    public function tambahMobil($foto_mobil, $id_jenis, $type_mobil,$merk,$no_polisi,$warna,$harga,$status)
    {
        $this->db->query('SELECT (max(idmobil)+1) as maks_id FROM ' . $this->table);
        $data=$this->db->resultSet();
        foreach ($data as $rec){
        $id=$rec["maks_id"];}
        
        $this->db->query('INSERT INTO ' . $this->table . '(idmobil,foto_mobil, id_jenis,type_mobil,merk,no_polisi,warna,harga,status) 
        VALUES(:idmobil,:foto_mobil, :id_jenis, :type_mobil,:merk,:no_polisi,:warna,:harga,:status)');
        $this->db->bind('idmobil',$id);
        $this->db->bind('foto_mobil',$foto_mobil);
        $this->db->bind('id_jenis',$id_jenis);
        $this->db->bind('type_mobil',$type_mobil);
        $this->db->bind('merk',$merk);
        $this->db->bind('no_polisi',$no_polisi);
        $this->db->bind('warna',$warna);
        $this->db->bind('harga',$harga);
        $this->db->bind('status',$status);
        $this->db->execute();
    }
    public function updateMobil($foto_mobil, $id_jenis, $type_mobil,$merk,$no_polisi,$warna,$harga,$status,$idmobil)
    {
        $this->db->query('UPDATE ' . $this->table . ' SET 
        foto_mobil=:foto_mobil,id_jenis=:id_jenis,type_mobil=:type_mobil, 
        merk=:merk,no_polisi=:no_polisi,warna=:warna,harga=:harga,status=:status WHERE 
        idmobil=:idmobil');
        $this->db->bind('idmobil',$idmobil);
        $this->db->bind('foto_mobil',$foto_mobil);
        $this->db->bind('id_jenis',$id_jenis);
        $this->db->bind('type_mobil',$type_mobil);
        $this->db->bind('merk',$merk);
        $this->db->bind('no_polisi',$no_polisi);
        $this->db->bind('warna',$warna);
        $this->db->bind('harga',$harga);
        $this->db->bind('status',$status);
        $this->db->execute();
    }
    public function updateStatus($idmobil,$status)
    { 
        $sql="UPDATE ".$this->table." SET status='$status' WHERE idmobil='$idmobil'";
        $this->db->query($sql);
        $this->db->execute();
    }
    public function deleteMobil($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE idmobil=:idmobil');
        $this->db->bind('idmobil',$id);
        $this->db->execute();
    }
    public function getAllJenisMobil()
    {
        $this->db->query('SELECT * FROM jenis');
        return $this->db->resultSet();
    }
}
?>