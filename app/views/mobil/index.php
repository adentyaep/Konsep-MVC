<div class="container mt-3">
<div class="row">
 <div class="col-12">
 <h1>Data Mobil</h1>
 <ul class="list-group">
 <table class="table table-stripped">
 <thead>
 <tr>
 <th scope="col">Nama</th>
 <th scope="col" width="200px">Action</th>
 </tr>
 </thead>
 <tbody>
 <?php foreach ($data['mbl'] as $mbl) :?>
 <tr>
 <td><?= $mbl['type_mobil'];?></td>
 <td>
 <a href="<?= BASEURL; ?>/mobil/detail/<?= $mbl['idmobil'] ?>" class="badge badge-primary badgepill">Detail</a>
 
 <a href="<?= BASEURL; ?>/mobil/edit/<?= $mbl['idmobil'] ?>" class="badge badge-primary badgepill">Edit</a>
 <a href="<?= BASEURL; ?>/mobil/hapus/<?= $mbl['idmobil'] ?>" class="badge badge-primary badgepill">Hapus</a>
 </td>
 </tr>
 <?php endforeach; ?>
 </tbody>
 </table> 
 </ul>
 <a href="<?= BASEURL; ?>/mobil/tambah" class="btn btn-success mt-2">Tambah Mobil</a>
 </div>
</div>
</div>