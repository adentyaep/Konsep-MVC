<?php
    $tsewa=strtotime( $data['sewa']['tgl_sewa']); 
    $tsewa = date('d-m-Y', $tsewa);
    $tselesai=strtotime( $data['sewa']['tgl_selesaisewa']); 
    $tselesai = date('d-m-Y', $tselesai);
    $awal = date_create($tsewa);
    $akhir = date_create($tselesai);
    $interval = date_diff($awal, $akhir);
    $harga=$data['sewa']['harga'];
    $jumlah_harga = $harga * ($interval->d +1);
    $bayar=$data['sewa']['status_pembayaran'];
    $balik=$data['sewa']['status_pengembalian'];
    $lama_sewa=$data['sewa']['lama_sewa'];
    if ($bayar=="1")
        $bayar="Terbayar";
    else
        $bayar="Blm Terbayar";
    if ($balik=="1")
        $balik="Selesai";
    else
        $balik="Sedang digunakan";
?>
    <div class="container mt-3">
        <div class="card" style="width: 24rem;">
            <img class="card-img-top" src="<?= BASEURL ?>/gambar/<?= $data['sewa']['foto_pelanggan']; ?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?= $data['sewa']['nama_lengkap']; ?></h5> <p class="card-title"><?= $data['sewa']['type_mobil']; ?> - <?= $data['sewa']['no_polisi']; ?></p>
                <p class="card-text">Pemakaian <?= $lama_sewa; ?> hari ( <?= $tsewa; ?> s/d <?= $tselesai; ?> ) </p>
                <p class="card-text">Harga:<?= number_format($harga); ?>/hari</p>
                <p class="card-text">Total Byr:<?= number_format($jumlah_harga); ?></p>
                <p class="card-text">Kendaraan<?= $balik; ?> dan <?= $bayar; ?></p>
                <a href="<?= BASEURL; ?>/sewa" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
    