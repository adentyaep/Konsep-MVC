<?php
class Sewa_model{
 
    private $table = 'transaksi';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllSewa()
    {
        $sql="SELECT t.id_transaksi, m.idmobil, m.type_mobil, m.harga, p.no_ktp, p.nama_lengkap, 
        t.tgl_sewa, t.tgl_selesaisewa, t.jumlah_harga, t.denda, t.status_pembayaran, 
        t.status_pengembalian,m.no_polisi 
        FROM transaksi t,mobil m,pelanggan p where m.idmobil=t.id_mobil and 
        t.id_pelanggan=p.id_pelanggan";
        $this->db->query($sql);
        return $this->db->resultSet();
    }
    public function getListSewa()
    {
        $sql="SELECT t.id_transaksi, p.nama_lengkap, t.jumlah_harga, t.denda 
        FROM transaksi t,mobil m,pelanggan p where m.idmobil=t.id_mobil and 
        t.id_pelanggan=p.id_pelanggan
        and t.id_transaksi not in (select id_transaksi from pembayaran)";
        $this->db->query($sql);
        return $this->db->resultSet();
    }
    public function getAllSewaById($id)
    {
        $sql="SELECT t.id_transaksi, m.idmobil, m.type_mobil, m.harga, p.no_ktp, p.nama_lengkap, 
        t.tgl_sewa, t.tgl_selesaisewa, t.jumlah_harga, 
        t.denda, t.status_pembayaran, 
        t.status_pengembalian,m.no_polisi,p.foto_pelanggan,m.status,t.id_pelanggan,t.lama_sewa 
        FROM transaksi t,mobil m,pelanggan p where m.idmobil=t.id_mobil and t.id_pelanggan=p.id_pelanggan AND t.id_transaksi='$id'";
        $this->db->query($sql);
        return $this->db->single();
    }
    public function getIdMobil($id)
    {
        $sql="SELECT id_mobil FROM transaksi where id_transaksi='$id'";
        $this->db->query($sql);
        return $this->db->single();
    }
    public function getStatusMobil($id)
    {
        $sql="SELECT status_pengembalian FROM transaksi where id_transaksi='$id'";
        $this->db->query($sql);
        return $this->db->single();
    }
    public function tambahSewa($id_mobil, $id_pelanggan,$harga,$tgl_sewa,$tgl_selesaisewa,$jumlah_harga,$status_pembayaran,$status_pengembalian,$denda,$lama_sewa)
    {
        $this->db->query('SELECT (max(id_transaksi)+1) as maks_id FROM ' . $this->table);
        $data=$this->db->resultSet();
        foreach ($data as $data){
            $id=$data["maks_id"];
        }
        $sql="INSERT INTO ".$this->table." 
        (id_transaksi,id_mobil,id_pelanggan,harga,tgl_sewa,tgl_selesaisewa,jumlah_harga,status_pembayaran,status_pengembalian,denda,lama_sewa) VALUES ('$id','$id_mobil','$id_pelanggan','$harga','$tgl_sewa','$tgl_selesaisewa','$jumlah_harga','$status_pembayaran','$status_pengembalian','$denda','$lama_sewa')"; 
        $this->db->query($sql);
        $this->db->execute();
    }
    public function updateSewa($id_mobil, $id_pelanggan, $harga,$tgl_sewa,$tgl_selesaisewa,$jumlah_harga,$status_pembayaran,$status_pengembalian,$denda,$id_transaksi,$lama_sewa)
    {
        $sql="UPDATE ".$this->table." SET 
        id_mobil='$id_mobil',id_pelanggan='$id_pelanggan',harga='$harga',tgl_sewa='$tgl_sewa',
        
        tgl_selesaisewa='$tgl_selesaisewa',jumlah_harga='$jumlah_harga',status_pembayaran='$status_pe
        mbayaran',
        status_pengembalian='$status_pengembalian',denda='$denda',lama_sewa='$lama_sewa' 
        where id_transaksi='$id_transaksi'";
        $this->db->query($sql);
        $this->db->execute();
    }
    public function deleteSewa($id)
    {
        $this->db->query('DELETE FROM ' . $this->table . ' WHERE id_transaksi=:idtx');
        $this->db->bind('idtx',$id);
        $this->db->execute();
    }
}