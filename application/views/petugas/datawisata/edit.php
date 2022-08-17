<style>
	.vendor_logo_hide1{
		display: inline !important;;
		color: transparent;
		width: 99px;
	}
	.vendor_logo1{
		display: block !important;
		color: black;
		width: 100%;
	}
	.vendor_logo_hide2{
		display: inline !important;;
		color: transparent;
		width: 99px;
	}
	.vendor_logo2{
		display: block !important;
		color: black;
		width: 100%;
	}
	.vendor_logo_hide3{
		display: inline !important;;
		color: transparent;
		width: 99px;
	}
	.vendor_logo3{
		display: block !important;
		color: black;
		width: 100%;
	}
	.vendor_logo_hide4{
		display: inline !important;;
		color: transparent;
		width: 99px;
	}
	.vendor_logo4{
		display: block !important;
		color: black;
		width: 100%;
	}
	.vendor_logo_hide5{
		display: inline !important;;
		color: transparent;
		width: 99px;
	}
	.vendor_logo5{
		display: block !important;
		color: black;
		width: 100%;
	}
</style>
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Wisata</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('Petugas/'); ?>">Dashboard</a></div>
                <div class="breadcrumb-item">Data Wisata</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Data Wisata</h4>
                        </div>
                        <div class="card-body">
                            <form class="form" enctype="multipart/form-data" action="<?php echo base_url('DataWisata/update'); ?>" method="post">
                                <?php foreach ($isi as $i) : ?>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Preview Thumbnail</label>
                                        <div class="col-sm-12 col-md-7">
                                            <img style="height: 20vh;" src="<?= base_url('public/upload/image/wisata/'); ?><?= $i['thumbnail']; ?>" class="img-responsive" alt="...">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="hidden" name="id_wisata" value="<?= $i['id_wisata']; ?>">
                                            <input name="nama" id="nama" value="<?= $i['nama']; ?>" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lokasi</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input name="lokasi" id="lokasi" value="<?= $i['lokasi']; ?>" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link Google Maps</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input name="maps" id="maps" value="<?= $i['maps']; ?>" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea name="deskripsi" id="deskripsi" class="summernote"><?= $i['deskripsi']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga Tiket (Rp.)</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input name="harga" id="harga" value="<?= $i['harga']; ?>" type="number" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="file" name="thumbnail" class="vendor_logo_hide1" id="thumbnail" accept="image/png, image/jpeg, image/jpg"><br>
											<label for="thumbnail" class="label">Pastikan file foto anda dalam format <b>jpg/jpeg/png</b> dan ukuran foto <b>368x420 pixel</b>.</label>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Header</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="file" name="header" class="vendor_logo_hide2" id="header" accept="image/png, image/jpeg, image/jpg"><br>
											<label for="header" class="label">Pastikan file foto anda dalam format <b>jpg/jpeg/png</b> dan ukuran foto <b>1920x412 pixel</b>.</label>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto Destinasi 1</label>
                                    <div class="col-sm-12 col-md-7">
                                    	<input type="file" name="destinasi1" class="vendor_logo_hide3" id="destinasi1" accept="image/png, image/jpeg, image/jpg"><br>
										<label for="destinasi1" class="label">Pastikan file foto anda dalam format <b>jpg/jpeg/png</b>.</label>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto Destinasi 2</label>
                                    <div class="col-sm-12 col-md-7">
                                    	<input type="file" name="destinasi2" class="vendor_logo_hide4" id="destinasi2" accept="image/png, image/jpeg, image/jpg"><br>
										<label for="destinasi2" class="label">Pastikan file foto anda dalam format <b>jpg/jpeg/png</b>.</label>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto Destinasi 3</label>
                                    <div class="col-sm-12 col-md-7">
                                    	<input type="file" name="destinasi3" class="vendor_logo_hide5" id="destinasi3" accept="image/png, image/jpeg, image/jpg"><br>
										<label for="destinasi3" class="label">Pastikan file foto anda dalam format <b>jpg/jpeg/png</b>.</label>
                                    </div>
                                </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button type="submit" class="btn btn-primary">Ubah</button>
                                            <button type="reset" class="btn btn-light-">Reset</button>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>
