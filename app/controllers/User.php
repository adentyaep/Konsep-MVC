<?php
    class User extends Controller{
        public function index(){
            $data['title'] = 'Data Pelanggan';
            $data['user'] = $this->model('Pelanggan_model')->getAllUser();

            $this->view('templates/header', $data);
            $this->view('user/index', $data);
            $this->view('templates/footer', $data);
        }

        public function tambah(){
            $data['title'] = 'Tambah Pelanggan'; 
            $this->view('templates/header', $data);
            $this->view('user/tambah');
            $this->view('templates/footer');
            }

        public function simpanUser(){ 
            $foto_pelanggan=$_FILES['foto_pelanggan']['name'];
            $foto=$_FILES['foto_pelanggan'];
            $no_ktp = $_POST['no_ktp'];
            $nama_lengkap = $_POST['nama_lengkap'];
            $tanggal_lahir = $_POST['tanggal_lahir'];
            $alamat = $_POST['alamat'];
            $no_telp = $_POST['noTelp'];
            $status_peminjaman = $_POST['status'];
            $data['user'] = $this->model('Pelanggan_model')->tambahPelanggan($no_ktp,$foto_pelanggan,$nama_lengkap, $tanggal_lahir, $alamat, $no_telp, $status_peminjaman);
            $upload=$this->model('Pelanggan_model')->uploadFoto();
               //if ($upload)
               header('location:../user');
               //else
               // echo "Upload Gagal!";
            }
        public function hapus($id){
            $data['id_pelanggan'] = $this->model('Pelanggan_model')->deletePelanggan($id);
                // return $this->index();
                header('location:../../user');
        }

        public function detail($id){
            $data['title'] = 'Detail Mobil';
            $data['id_pelanggan'] = $this->model('Pelanggan_model')->getAllUserById($id);
            $this->view('templates/header', $data);
            $this->view('user/detail', $data);
            $this->view('templates/footer');
        }

        public function edit($id){
            $data['title'] = 'Detail Pelanggan';
            $data['id_pelanggan'] = $this->model('Pelanggan_model')->getAllUserById($id);
            $this->view('templates/header', $data);
            $this->view('user/edit', $data);
            $this->view('templates/footer');
        }

        public function updatePelanggan(){ 
            $id = $_POST['id_pelanggan']; 
            $foto_pelanggan = $_POST['foto_pelanggan'];
            $no_ktp = $_POST['no_ktp'];
            $nama_lengkap = $_POST['nama_lengkap'];
            $tanggal_lahir = $_POST['tanggal_lahir'];
            $alamat = $_POST['alamat'];
            $no_telp = $_POST['no_telp'];
            $status = $_POST['status'];
            
            if(isset($_POST['ubah_foto'])){ 
            $foto_pelanggan=$_FILES['foto_pelanggan']['name'];
            $upload=$this->model('Pelanggan_model')->uploadFoto();
           //if ($upload)
           //header('location:../mobil'); 
           }
           // return $this->index();
            $data['id_pelanggan'] = $this->model('Pelanggan_model')->updatePelanggan($id,$no_ktp,$foto_pelanggan,  
            $nama_lengkap,$tanggal_lahir,$alamat,$no_telp,$status);
           header('location:../user');
        }

    }
        