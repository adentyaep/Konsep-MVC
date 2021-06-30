<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <h1>Data Penyewaan Mobil</h1>
            <ul class="list-group">
            <table class="table table-stripped">
            <thead>
            <tr>
            <th scope="col">Nama</th>
            <th scope="col" width="200px">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data['sewa'] as $sewa) :?>
            <tr>
            <?php
            $tsewa=strtotime($sewa['tgl_sewa']); 
            $tsewa = date('d-m-Y', $tsewa);
            $tselesai=strtotime($sewa['tgl_selesaisewa']); 
            $tselesai = date('d-m-Y', $tselesai);
            ?>
            <td><?= $sewa['nama_lengkap'];?> <?= $sewa['no_polisi'];?> <?= $sewa['type_mobil'];?> [Tgl 
            Sewa: <?= $tsewa;?> s/d <?= $tselesai;?> ] </td>
            <td>
            <a href="<?= BASEURL; ?>/sewa/detail/<?= $sewa['id_transaksi'] ?>" class="badge badge-primary badge-pill">Detail</a> 
            <a href="<?= BASEURL; ?>/sewa/edit/<?= $sewa['id_transaksi'] ?>" class="badge badge-primary badge-pill">Edit</a>
            <a href="<?= BASEURL; ?>/sewa/hapus/<?= $sewa['id_transaksi'] ?>" class="badge badge-primary badge-pill">Hapus</a>
            <a href="<?= BASEURL; ?>/sewa/notaSewa/<?= $sewa['id_transaksi'] ?>" class="badge 
            badge-primary badge-pill">Cetak</a>
            </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
            </table> 
            </ul>
            <a href="<?= BASEURL; ?>/sewa/tambah" class="btn btn-success mt-2">Tambah sewa</a>
        </div>
    </div>
</div>