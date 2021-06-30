<div class="container mt-3">
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="<?= BASEURL ?>/gambar/<?= $data['id_pelanggan']['foto_pelanggan']; ?>" alt="Card 
        image cap">
        <div class="card-body">
            <h5 class="card-title"><?= $data['id_pelanggan']['nama_lengkap']; ?></h5>
            <p class="card-text"><?= $data['id_pelanggan']['no_ktp']; ?></p>
            <p class="card-text"><?= $data['id_pelanggan']['tanggal_lahir']; ?></p>
            <p class="card-text"><?= $data['id_pelanggan']['alamat_pelanggan']; ?></p>
            <p class="card-text"><?= $data['id_pelanggan']['no_telpon']; ?></p>
            <a href="<?= BASEURL; ?>/user" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>