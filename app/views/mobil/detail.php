<div class="container mt-3">
    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="<?= BASEURL ?>/gambar/<?= $data['mbl']['foto_mobil']; ?>" alt="Card 
        image cap">
        <div class="card-body">
            <h5 class="card-title"><?= $data['mbl']['type_mobil']; ?></h5>
            <p class="card-text"><?= $data['mbl']['no_polisi']; ?></p>
            <a href="<?= BASEURL; ?>/mobil" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>