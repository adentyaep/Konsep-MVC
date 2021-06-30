<div class="container mt-3">
    <form action="<?= BASEURL; ?>/user/simpanUser" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Foto</label>
            <input name="foto_pelanggan" id="foto_pelanggan" type="file" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Nomor KTP</label>
            <input name="no_ktp" type="text" class="form-control" placeholder="Nomor KTP .." 
            required>
        </div>
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input name="nama_lengkap" type="text" class="form-control" placeholder="Nama Lengkap .." required>
        </div>
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input name="tanggal_lahir" type="date" class="form-control" placeholder="Tanggal Lahir .." 
            required>
        </div>
        <div class="form-group">
            <label>Alamat</label>15
            <input name="alamat" type="text" class="form-control" placeholder="Alamat .." required>
        </div>
        <div class="form-group">
            <label>Nomor Telepon</label>
            <input name="noTelp" type="text" class="form-control" placeholder="No. Telepon.." required>
        </div>
        <div class="form-group" hidden>
            <label>Status Peminjaman</label>
            <input name="status" type="text" class="form-control" placeholder="Status .." value="1" 
            required>
        </div>
            <input type="submit" value="simpan" class="btn btn-success mt-2">
            <a href="<?= BASEURL; ?>/user" class="btn btn-primary mt-2">Kembali</a>
    </form>
</div>
        
        