<div class="container mt-3">
    <form action="<?= BASEURL; ?>/mobil/updateMobil" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Id Mobil</label>
            <input class="form-control form-control-lg mt-2" type="text" readonly="true" name="idmobil" 
            placeholder="Id mobil" 
            value="<?= $data['mbl']['idmobil']; ?>">
        </div>
        <div class="form-group">
            <label>Foto</label>
            <img src="<?php echo BASEURL."/gambar/".$data['mbl']['foto_mobil'] ?>" width="250px" 
            height="120px" /></br>
            <input type="checkbox" name="ubah_foto" value="true"> CheckList jika ingin mengubah 
            foto<br>
            <input name="foto_mobil" type="file" class="form-control" id="foto_mobil">
            <input name="foto" type="hidden" class="form-control" id="foto" value="<?= $data['mbl']['foto_mobil'] ?>">
        </div>
        <div class="form-group">
            <label>Jenis Mobil</label>
            <select class="form-control" name="id_jenis" required="required">
            <option value="">Silahkan Pilih</option>
            <?php 
            $data['jns'] = $this->model('Mobil_model')->getAllJenisMobil();
            foreach ($data['jns'] as $rec) :
            $teks="";
            if ($data['mbl']['id_jenis']==$rec['id_jenis'])
            $teks="selected";
            echo "<option value='".$rec['id_jenis']."' $teks>".$rec['nama_jenis']."</option>";
            endforeach;
            ?>
            </select>
        </div>
        <!-- <div class="form-group">
        <label>Nama Jenis</label>
        <input name="id_jenis" type="text" class="form-control" placeholder="Jenis Mobil .." 16
        value="<?= $data['mbl']['id_jenis']; ?>">
        </div> -->
        <div class="form-group">
            <label>Type Mobil</label>
            <input name="type_mobil" type="text" class="form-control" placeholder="Nama Mobil .." 
            value="<?= $data['mbl']['type_mobil']; ?>">
        </div>
        <div class="form-group">
            <label>Merk</label>
            <input name="merk" type="text" class="form-control" placeholder="Merk .." value="<?= 
            $data['mbl']['merk']; ?>">
        </div>
        <div class="form-group">
            <label>No Polisi</label>
            <input name="no_polisi" type="text" class="form-control" placeholder="No Polisi .." 
            value="<?= $data['mbl']['no_polisi']; ?>">
        </div>
        <div class="form-group">
            <label>Warna</label>
            <input name="warna" type="text" class="form-control" placeholder="Warna .." value="<?= 
            $data['mbl']['warna']; ?>">
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input name="harga" type="text" class="form-control" placeholder="Harga .." value="<?= 
            $data['mbl']['harga']; ?>">
        </div>
        <div class="form-group" hidden>
            <label>Status</label>
            <input name="status" type="text" class="form-control" placeholder="Status .." value="1" 
            value="<?= $data['mbl']['status']; ?>">
        </div>
        <input type="submit" value="simpan" class="btn btn-success mt-2"> 
        <a href="<?= BASEURL; ?>/mobil" class="btn btn-primary mt-2">Kembali</a>
    </form>
</div>