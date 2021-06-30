<?php
class Mobil extends Controller {
public function index(){
 $data['title'] = 'Data Mobil';
 $data['mbl'] = $this->model('Mobil_model')->getAllMobil();
 $this->view('templates/header', $data);
 $this->view('mobil/index', $data);
 $this->view('templates/footer');
}
public function detail($id){
 $data['title'] = 'Detail Mobil';
 $data['mbl'] = $this->model('Mobil_model')->getAllMobilById($id);
 $this->view('templates/header', $data);
 $this->view('mobil/detail', $data);
 $this->view('templates/footer');
 }
 public function edit($id){
 $data['title'] = 'Detail Mobil';
 $data['mbl'] = $this->model('Mobil_model')->getAllMobilById($id);
 $this->view('templates/header', $data);
 $this->view('mobil/edit', $data);
 $this->view('templates/footer');
 }
 public function tambah(){
 $data['title'] = 'Tambah Mobil'; 
 $this->view('templates/header', $data);
 $this->view('mobil/tambah');
 $this->view('templates/footer');
 }
 
 public function simpanMobil(){ 
    $foto_mobil=$_FILES['foto_mobil']['name'];
    $foto=$_FILES['foto_mobil'];
    $id_jenis = $_POST['id_jenis'];
    $type_mobil = $_POST['type_mobil'];
    $merk = $_POST['merk'];
    $no_polisi = $_POST['no_polisi'];
    $warna = $_POST['warna'];
    $harga = $_POST['harga'];
    $status = $_POST['status'];
    $data['mbl'] = $this->model('Mobil_model')->tambahMobil($foto_mobil, $id_jenis, $type_mobil,$merk,$no_polisi,$warna,$harga,$status);
    $upload=$this->model('Mobil_model')->uploadFoto();
//if ($upload)
    header('location:../mobil');
//else
// echo "Upload Gagal!";
 }
 
 public function updateMobil(){ 
 $idmobil = $_POST['idmobil']; 
 $foto_mobil = $_POST['foto'];
 $id_jenis = $_POST['id_jenis'];
 $type_mobil = $_POST['type_mobil'];
 $merk = $_POST['merk'];
 $no_polisi = $_POST['no_polisi'];
 $warna = $_POST['warna'];
 $harga = $_POST['harga'];
 $status = $_POST['status'];
 
 if(isset($_POST['ubah_foto'])){ 
 $foto_mobil=$_FILES['foto_mobil']['name'];
 $upload=$this->model('Mobil_model')->uploadFoto();
//if ($upload)
//header('location:../mobil'); 
}
// return $this->index();
 $data['mbl'] = $this->model('Mobil_model')->updateMobil($foto_mobil, $id_jenis, 
$type_mobil,$merk,$no_polisi,$warna,$harga,$status,$idmobil);
header('location:../mobil');
 }
 
 public function hapus($id){
 $data['mbl'] = $this->model('Mobil_model')->deleteMobil($id);
 // return $this->index();
 header('location:../../mobil');
 } 
}