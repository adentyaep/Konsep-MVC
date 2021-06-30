<?php
class Sewa extends Controller {
    public function index(){
        $data['title'] = 'Sewa Mobil';
        $data['sewa'] = $this->model('Sewa_model')->getAllSewa();
        $this->view('templates/header', $data);
        $this->view('Sewa/index', $data);
        $this->view('templates/footer');
    }
    public function detail($id){
        $data['title'] = 'Detail Sewa';
        $data['sewa'] = $this->model('Sewa_model')->getAllSewaById($id);
        $this->view('templates/header', $data);
        $this->view('Sewa/detail', $data);
        $this->view('templates/footer'); 
    }
    public function edit($id){
        $data['title'] = 'Detail Sewa';
        $data['sewa'] = $this->model('Sewa_model')->getAllSewaById($id);
        $this->view('templates/header', $data);
        $this->view('Sewa/edit', $data);
        $this->view('templates/footer');
    }
    public function tambah(){
        $data['title'] = 'Tambah Sewa'; 
        $this->view('templates/header', $data);
        $this->view('Sewa/tambah');
        $this->view('templates/footer');
    }
    
    public function simpanSewa(){ 
        $id_pelanggan = $_POST['id_pelanggan'];
        $id_mobil = $_POST['id_mobil'];
        $harga = $_POST['harga'];
        
        $t1 = strtotime($_POST['tgl_sewa']);
        $t2 = strtotime($_POST['tgl_selesaisewa']);
        
        $tgl_sewa = date('Y-m-d', $t1);
        $tgl_selesaisewa = date('Y-m-d', $t2);
        $awal = date_create($tgl_sewa);
        $akhir = date_create($tgl_selesaisewa);
        $interval = date_diff($awal, $akhir);
        $lama_sewa = $interval->d+1;
        $jumlah_harga = $harga * ($interval->d +1);
        $status_pembayaran = 0;
        $status_pengembalian = 0;
        $denda=0;
        $data['sewa'] = $this->model('Sewa_model')->tambahSewa($id_mobil, $id_pelanggan, 
        $harga,$tgl_sewa,$tgl_selesaisewa,$jumlah_harga,$status_pembayaran,$status_pengembalian,$denda,$lama_sewa);
        $this->model('Mobil_model')->updateStatus($id_mobil,"1");
        header('location:../Sewa');
    }
    
    public function updateSewa(){ 
        $id_transaksi = $_POST['id_transaksi'];
        $id_pelanggan = $_POST['id_pelanggan'];
        $id_mobil = $_POST['id_mobil'];
        $harga = $_POST['harga'];
        
        $t1 = strtotime($_POST['tgl_sewa']);$t2 = strtotime($_POST['tgl_selesaisewa']);
        
        $tgl_sewa = date('Y-m-d', $t1);
        $tgl_selesaisewa = date('Y-m-d', $t2);
        $awal = date_create($tgl_sewa);
        $akhir = date_create($tgl_selesaisewa);
        $interval = date_diff($awal, $akhir);
        $lama_sewa = $interval->d+1;
        $jumlah_harga = $harga * ($interval->d+1);
        $status_pembayaran = 0;
        $status_pengembalian = 0;
        $denda=0;
        
        $data['sewa']=$this->model('Sewa_model')->getIdMobil($id_transaksi);
        $id_mobil_lama=$data['sewa']['id_mobil'];
        //jika mobil berubah maka update status mobil lama dan baru
        if ($id_mobil_lama!=$id_mobil){
            $this->model('Mobil_model')->updateStatus($id_mobil_lama,"0");
        }
        $this->model('Sewa_model')->updateSewa($id_mobil, $id_pelanggan, 
        $harga,$tgl_sewa,$tgl_selesaisewa,$jumlah_harga,$status_pembayaran,$status_pengembalian,$denda,$id_transaksi,$lama_sewa) ;
        $this->model('Mobil_model')->updateStatus($id_mobil,"1");
        header('location:../Sewa');
    }
    
    public function hapus($id){
    //jika delete data sewa dimana status sewa = 1 maka status mobil hrs dikembalikan mjd=0
        $dt['sewa']=$this->model('Sewa_model')->getStatusMobil($id);
        $stt=$dt['sewa']['status_pengembalian'];
        if ($stt=="0"){
            $data['sewa']=$this->model('Sewa_model')->getIdMobil($id);
            $id_mobil=$data['sewa']['id_mobil'];
            $this->model('Mobil_model')->updateStatus($id_mobil,"0");
        }
        $this->model('Sewa_model')->deleteSewa($id);
        header('location:../../Sewa');
    }
    public function notaSewa($id){
        $data['title'] = 'Detail Sewa';
        $data['sewa'] = $this->model('Sewa_model')->getAllSewaById($id);
        //$this->view('templates/header', $data);
        $this->view('Sewa/notaSewa', $data);
        //$this->view('templates/footer');
    }
}