<div class="container mt-3">
    <form action="<?= BASEURL; ?>/sewa/simpanSewa" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Mobil</label>
            <select class="form-control" name="pilih_mobil" required="required" id="pilih_mobil">
                <option value="">Silahkan Pilih</option>
                <?php 
                $data['mbl'] = $this->model('Mobil_model')->getMobilReady();
                foreach ($data['mbl'] as $data) :
                echo "<option value='".$data['idmobil']."-".$data['harga']."'>".$data['type_mobil']."-".$data['merk']."-".$data['no_polisi']."-".$data['harga']."</option>"; 
                endforeach;
                ?>
            </select>
        </div>
        <input name="id_mobil" id="id_mobil" type="hidden">
        <div class="form-group">
            <label>Harga Sewa/hari</label>
            <input name="harga" id="harga" type="text" class="form-control" placeholder="harga .." required readonly>
        </div>
        <div class="form-group">
            <label>Penyewa</label>
            <select class="form-control" name="pilih_plg" required="required" id="pilih_plg">
                <option value="">Silahkan Pilih</option>
                <?php 
                $data['plg'] = $this->model('Pelanggan_model')->getAllUser();
                foreach ($data['plg'] as $data) :
                echo "<option value='".$data['id_pelanggan']."-".$data['no_ktp']."'>".$data['nama_lengkap']."-".$data['no_ktp']."</option>"; 
                endforeach;
                ?>
            </select>
        </div>
        <input name="id_pelanggan" id="id_pelanggan" type="hidden" >
        <div class="form-group">
            <label>No KTP</label><input name="no_ktp" id="no_ktp" type="text" class="form-control" placeholder="Nama .." required readonly>
        </div>
        <div class="form-group">
            <label>Tanggal Sewa</label>
            <div class='input-group date' id='datetimepicker1'>
                <input name="tgl_sewa" type="date" class="form-control" placeholder="yyyy-mm-dd" required/><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
        </div>
        <div class="form-group">
            <label>Tanggal Selesai Sewa</label>
            <div class='input-group date' id='datetimepicker1'>
                <input name="tgl_selesaisewa" type="date" class="form-control" placeholder="yyyy-mm-dd" required/><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
        </div>
        <input type="submit" value="Simpan" class="btn btn-success mt-2">
        <a href="<?= BASEURL; ?>/sewa" class="btn btn-primary mt-2">Kembali</a>
    </form>
</div>
<script type="text/javascript">
    $('#pilih_mobil').change(function() { 
        var str=$('#pilih_mobil').val();
        idmbl=str.substring(0,str.indexOf("-"));
        harga=str.substring(str.indexOf("-")+1,str.length-str.indexOf("-")+2);
        $('#id_mobil').val(idmbl);
        $('#harga').val(harga);
    });
</script>
<script type="text/javascript">
    $('#pilih_plg').change(function() { 
        var str=$('#pilih_plg').val();
        idplg=str.substring(0,str.indexOf("-"));
        no_ktp=str.substring(str.indexOf("-")+1,str.length-str.indexOf("-")+2);
        $('#id_pelanggan').val(idplg);
        $('#no_ktp').val(no_ktp);
    });
</script>