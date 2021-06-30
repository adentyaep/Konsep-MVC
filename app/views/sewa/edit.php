<?php
        $tsewa=strtotime($data['sewa']['tgl_sewa']); 
        $tsewa = date('Y-m-d', $tsewa);
        $tselesai=strtotime($data['sewa']['tgl_selesaisewa']); 
        $tselesai = date('Y-m-d', $tselesai);
    ?>
    <div class="container mt-3">
        <form action="<?= BASEURL; ?>/sewa/updateSewa" method="POST" enctype="multipart/formdata">
            <div class="form-group">
                <label>id Transaksi</label>
                <input class="form-control form-control-lg mt-2" type="text" readonly="true" name="id_transaksi" value="<?= $data['sewa']['id_transaksi']; ?>">
            </div>
            <div class="form-group">
                <label>Mobil</label>
                <select class="form-control" name="pilih_mobil" required="required" id="pilih_mobil">
                    <option value="">Silahkan Pilih</option>
                    <?php 
                        $dt['mbl'] = $this->model('Mobil_model')->getMobilReady();
                        echo "<option value='".$data['sewa']['idmobil']."-".$data['sewa']['harga']."' 
                        selected>".$data['sewa']['type_mobil']."-".$data['sewa']['merk']."-".$data['sewa']['no_polisi']."-
                        ".$data['sewa']['harga']."</option>";
                        foreach ($dt['mbl'] as $rec) :
                        echo "<option value='".$rec['idmobil']."-
                        ".$rec['harga']."'>".$rec['type_mobil']."-".$rec['merk']."-".$rec['no_polisi']."-
                        ".$rec['harga']."</option>"; 
                        endforeach;
                    ?>
                </select>
            </div>
            <input name="id_mobil" id="id_mobil" type="hidden" value="<?= $data['sewa']['idmobil']; ?>">
            <div class="form-group">
                <label>Harga Sewa/hari</label>
                <input name="harga" id="harga" type="text" class="form-control" value="<?= $data['sewa']['harga']; ?>" readonly></div>
                <div class="form-group">
                    <label>Penyewa</label>
                    <select class="form-control" name="pilih_plg" required="required" id="pilih_plg">
                        <option value="">Silahkan Pilih</option>
                        <?php 
                            $dt['plg'] = $this->model('Pelanggan_model')->getAllUser();
                            echo "<option value='".$data['sewa']['id_pelanggan']."-".$data['sewa']['no_ktp']."' 
                            selected>".$data['sewa']['nama_lengkap']."-".$data['sewa']['no_ktp']."</option>"; 
                            foreach ($dt['plg'] as $rec) :
                            echo "<option value='".$rec['id_pelanggan']."-
                            ".$rec['no_ktp']."'>".$rec['nama_lengkap']."-".$rec['no_ktp']."</option>"; 
                            endforeach;
                        ?>  
                    </select>
                </div>
                <input name="id_pelanggan" id="id_pelanggan" type="hidden" value="<?= $data['sewa']['id_pelanggan']; ?>">
                <div class="form-group">
                    <label>No KTP</label>
                    <input name="no_ktp" id="no_ktp" type="text" class="form-control" value="<?= $data['sewa']['no_ktp']; ?>" readonly>
                </div>
                <div class="form-group">
                    <label>Tanggal Sewa</label>
                    <div class='input-group date' id='datetimepicker1'>
                        <input name="tgl_sewa" type="date" class="form-control" value="<?= $tsewa ; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label>Tanggal Selesai Sewa</label>
                    <div class='input-group date' id='datetimepicker2'>
                        <input name="tgl_selesaisewa" type="date" class="form-control" value="<?= $tselesai; ?>" />
                    </div>
                </div>
                <input type="submit" value="Simpan" class="btn btn-success mt-2"> 
                <a href="<?= BASEURL; ?>/sewa" class="btn btn-primary mt-2">Kembali</a>
        </form>
    </div>
    <script type="text/javascript">
        $('#pilih_mobil').change(function () { 
        var str=$('#pilih_mobil').val();
        idmbl=str.substring(0,str.indexOf("-"));
        harga=str.substring(str.indexOf("-")+1,str.length-str.indexOf("-")+2);
        $('#id_mobil').val(idmbl);
        $('#harga').val(harga);
        });
    </script>
    <script type="text/javascript">
        $('#pilih_plg').change(function () { 
        var str=$('#pilih_plg').val();
        idplg=str.substring(0,str.indexOf("-"));
        no_ktp=str.substring(str.indexOf("-")+1,str.length-str.indexOf("-")+2);
        $('#id_pelanggan').val(idplg);
        $('#no_ktp').val(no_ktp);
        });
    </script>