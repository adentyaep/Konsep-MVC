<div class="container mt-3">
    <form action="<?= BASEURL; ?>/user/updatePelanggan" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>id Pelanggan</label>
            <input class="form-control form-control-lg mt-2" type="text" readonly="true" name="id_pelanggan" 
            placeholder="Id Pelanggan" 
            value="<?= $data['id_pelanggan']['id_pelanggan']; ?>">
        </div>
        <div class="form-group">
            <label>Foto</label>
            <img src="<?php echo BASEURL."/gambar/".$data['id_pelanggan']['foto_pelanggan'] ?>" width="250px" 
            height="120px" /></br>
            <input type="checkbox" name="ubah_foto" value="true"> CheckList jika ingin mengubah 
            foto<br>
            <input name="foto_pelanggan" type="file" class="form-control" id="foto_pelanggan">
            <input name="foto_pelanggan" type="hidden" class="form-control" id="foto" value="<?= 
            $data['id_pelanggan']['foto_pelanggan'] ?>">
        </div>
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input name="nama_lengkap" type="text" class="form-control" placeholder="Nama Lengkap .." 
            value="<?= $data['id_pelanggan']['nama_lengkap']; ?>">
        </div>
        <div class="form-group">
            <label>Nomor KTP</label>
            <input name="no_ktp" type="text" class="form-control" placeholder="No. KTP .." value="<?= 
            $data['id_pelanggan']['no_ktp']; ?>">
        </div>
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input name="tanggal_lahir" type="text" class="form-control" placeholder="Tanggal Lahir.." 
            value="<?= $data['id_pelanggan']['tanggal_lahir']; ?>">
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input name="alamat" type="text" class="form-control" placeholder="Alamat .." value="<?= 
            $data['id_pelanggan']['alamat_pelanggan']; ?>">
        </div>
        <div class="form-group">
            <label>Nomor Telepon</label>
            <input name="no_telp" type="text" class="form-control" placeholder="No. Telpon .." value="<?= 
            $data['id_pelanggan']['no_telpon']; ?>">
        </div>
        <div class="form-group" hidden>
            <label>Status Peminjaman</label>
            <input name="status" type="text" class="form-control" placeholder="Status .." value="1" 
            value="<?= $data['id_pelanggan']['status_peminjaman']; ?>">
        </div>
        <input type="submit" value="simpan" class="btn btn-success mt-2"> 
        <a href="<?= BASEURL; ?>/user" class="btn btn-primary mt-2">Kembali</a>
    </form>
</div>