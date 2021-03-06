<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Biddy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen"
        href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" media="screen"
        href="<?php echo base_url('assets/css manual/index_css.css') ?>">

    <script src="main.js"></script>
    <script type="text/javascript"
        src="<?php echo base_url('assets/admin/bower_components/jquery/dist/jquery.min.js') ?>"></script>
    <script>
    $(document).ready(function() {
        $("#provinsi").change(function() {
            var prov_id = $("#provinsi").val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>/lelang/getKota",
                data: "provinsi=" + prov_id,
                success: function(data) {
                    $("#kota").html(data);
                }
            });
        });
    });
    </script>

    <style type="text/css">
    body {
        overflow-x: hidden;
    }

    .login-input {
        display: block;
    }
    </style>
</head>

<body>
    <?php
    foreach ($lelang as $l) {
        ?>
    <div class="row login" style="margin:5%;">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <div class="card">
                <h5 class="card-header">Update Lelang</h5>
                <div class="card-body">
                    <form action="<?php echo base_url('lelang/do_update/') . $l->id_lelang; ?>" method="post"
                        enctype="multipart/form-data">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">
                                    <i class="fas fa-edit"></i>&nbsp;Judul
                                </span>
                            </div>
                            <input type="text" name="judul" title="judul" class="form-control login-input"
                                placeholder="Judul iklan" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default" value="<?php echo $l->judul ?>" />
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">
                                    <i class="fas fa-edit"></i>&nbsp;Deskripsi
                                </span>
                            </div>
                            <input type="text" name="deskripsi" title="deskripsi" class="form-control login-input"
                                placeholder="Deskripsi iklan" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default" value="<?php echo $l->deskripsi ?>" />
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">
                                    <i class="fas fa-images"></i>&nbsp;Gambar
                                </span>
                            </div>
                            <input type="file" name="foto" title="foto" class="form-control login-input"
                                placeholder="foto" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default" value="<?php echo $l->foto ?>" />
                            <input type="hidden" name="old_foto" title="foto" class="form-control login-input"
                                placeholder="foto" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default" value="<?php echo $l->foto ?>" />
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">
                                    <i class="fas fa-search"></i>&nbsp;Kondisi
                                </span>
                            </div>
                            <select class="custom-select" id="kondisi" name="kondisi">
                                <option value="1" <?= $l->kondisi == '1' ? ' selected="selected"' : ''; ?>>Baru</option>
                                <option value="2" <?= $l->kondisi == '2' ? ' selected="selected"' : ''; ?>>Bekas
                                </option>
                            </select>
                            <!--<input type="text" name="kondisi" title="kondisi" class="form-control login-input" placeholder="kondisi" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/>-->
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">
                                    <i class="fas fa-gavel"></i>&nbsp;Bid Awal
                                </span>
                            </div>
                            <input type="number" name="final_bid" title="final_bid" class="form-control login-input"
                                placeholder="Nominal Next Bid" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default" value="<?php echo $l->final_bid ?>" />
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">
                                    <i class="fas fa-gavel"></i>&nbsp;Next Bid
                                </span>
                            </div>
                            <input type="number" name="next_bid" title="next_bid" class="form-control login-input"
                                placeholder="Nominal Next Bid" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default" value="<?php echo $l->next_bid ?>" />
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">
                                    <i class="fas fa-object-group"></i>&nbsp;Kategori
                                </span>
                            </div>
                            <select class="custom-select" id="kategori" name="kategori">
                                <option value="1" <?= $l->kategori == '1' ? ' selected="selected"' : ''; ?>>Mobil
                                </option>
                                <option value="2" <?= $l->kategori == '2' ? ' selected="selected"' : ''; ?>>Motor
                                </option>
                                <option value="3" <?= $l->kategori == '3' ? ' selected="selected"' : ''; ?>>Properti
                                </option>
                                <option value="4" <?= $l->kategori == '4' ? ' selected="selected"' : ''; ?>>Gadget
                                </option>
                                <option value="5" <?= $l->kategori == '5' ? ' selected="selected"' : ''; ?>>Hobi
                                </option>
                            </select>
                            <!--<input type="text" name="kategori" title="kategori" class="form-control login-input" placeholder="kategori" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/>-->
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">
                                    <i class="far fa-calendar"></i>&nbsp;Iklan Berakhir
                                </span>
                            </div>
                            <input type="date" name="tanggal" title="tanggal" class="form-control login-input"
                                placeholder="tanggal" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default" value="<?php echo $l->tanggal ?>" />
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">
                                    <i class="fas fa-map-marker-alt"></i>&nbsp;Provinsi
                                </span>
                            </div>
                            <select class="custom-select" id="provinsi" name="provinsi">
                                <option value="<?php echo $l->id_provinsi ?>" selected>
                                    <?php
                                        $data['data_provinsi'] = $this->m_home->get_nama_provinsi(array('id_provinsi' => $l->id_provinsi))->result();
                                        foreach ($data['data_provinsi'] as $dp) {
                                            echo $dp->nama . " ";
                                        }
                                        ?>
                                </option>
                                <?php
                                    foreach ($provinsi as $prov) {
                                        echo "<option value='$prov[id_provinsi]'>$prov[nama]</option>";
                                    } ?>
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">
                                    <i class="fas fa-city"></i>&nbsp;Kota
                                </span>
                            </div>
                            <select class="custom-select" id="kota" name="kota">
                                <option value="<?php echo $l->id_kota ?>" selected>
                                    <?php
                                        $data['data_kota'] = $this->m_home->get_nama_kota(array('id_kota' => $l->id_kota))->result();
                                        foreach ($data['data_kota'] as $dk) {
                                            echo $dk->nama;
                                        }
                                        ?>
                                </option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Iklan</button>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3">
        </div>
    </div>
    <?php } ?>
</body>

</html>