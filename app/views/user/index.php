<div class="container mt-3">
<div class="row">
 <div class="col-12">
 <h1>Data Pelanggan</h1>
 <ul class="list-group">
 <table class="table table-stripped">
 <thead>
 <tr>
 <th scope="col">Nama</th>
 <th scope="col" width="200px">Action</th>
 </tr>
 </thead>
 <tbody>
 <?php foreach ($data['user'] as $user) :?>
 <tr>
 <td><?= $user['nama_lengkap'];?></td>
 <td>
 <a href="<?= BASEURL; ?>/user/detail/<?= $user['id_pelanggan'] ?>" class="badge badge-primary badgepill">Detail</a>
 <a href="<?= BASEURL; ?>/user/edit/<?= $user['id_pelanggan'] ?>" class="badge badge-primary badgepill">Edit</a>
 <a href="<?= BASEURL; ?>/user/hapus/<?= $user['id_pelanggan'] ?>" class="badge badge-primary badgepill">Hapus</a>
 </td>
 </tr>
 <?php endforeach; ?>
 </tbody>
 </table> 
 </ul>
 <a href="<?= BASEURL; ?>/user/tambah" class="btn btn-success mt-2">Tambah Pelanggan</a>
 </div>
</div>
</div>