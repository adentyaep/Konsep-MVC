<div class="container mt-3">
    <form action="<?= BASEURL; ?>/mobil/simpanMobil" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Foto</label>
            <input name="foto_mobil" id="foto_mobil" type="file" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Jenis Mobil</label>
            <select class="form-control" name="id_jenis" required="required">
            <option value="">Silahkan Pilih</option>
            <?php 
            $data['jns'] = $this->model('Mobil_model')->getAllJenisMobil();
            echo "test ".$data['jns']['id_jenis'];
            foreach ($data['jns'] as $rec) :
            echo "<option value='".$rec['id_jenis']."'>".$rec['nama_jenis']."</option>";
            endforeach;
            ?>
            </select>
        </div>
        <div class="form-group">
            <label>Type Mobil</label>
            <input name="type_mobil" type="text" class="form-control" placeholder="Nama Mobil .." 
            required>
        </div>
        <div class="form-group">
            <label>Merk</label>
            <input name="merk" type="text" class="form-control" placeholder="Merk .." required>
        </div>
        <div class="form-group">
            <label>No Polisi</label>
            <input name="no_polisi" type="text" class="form-control" placeholder="No Polisi .." 
            required>
        </div>
        <div class="form-group">
            <label>Warna</label>15
            <input name="warna" type="text" class="form-control" placeholder="Warna .." required>
        </div>
        <div class="form-group">
            <label>Harga</label>
            <input name="harga" type="text" class="form-control" placeholder="Harga .." required>
        </div>
        <div class="form-group" hidden>
            <label>Status</label>
            <input name="status" type="text" class="form-control" placeholder="Status .." value="0" 
            required>
        </div>
            <input type="submit" value="simpan" class="btn btn-success mt-2">
            <a href="<?= BASEURL; ?>/mahasiswa" class="btn btn-primary mt-2">Kembali</a>
    </form>
</div>
        
        