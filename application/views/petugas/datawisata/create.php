<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Wisata</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('petugas/'); ?>">Dashboard</a></div>
                <div class="breadcrumb-item">Data Wisata</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tambah Data Wisata</h4>
                        </div>
                        <div class="card-body">
                            <form class="form" enctype="multipart/form-data" action="<?php echo base_url('datawisata/save'); ?>" method="post">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input name="nama" id="nama" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Lokasi</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input name="lokasi" id="lokasi" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Link Google Maps</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input name="maps" id="maps" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="deskripsi" id="deskripsi" class="summernote"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga Tiket (Rp.)</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input name="harga" id="harga" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail (368x420)</label>
                                    <div class="col-sm-12 col-md-7">
                                    <input type="file" name="thumbnail" class="form-control" id="thumbnail">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Header (1920x412)</label>
                                    <div class="col-sm-12 col-md-7">
                                    <input type="file" name="header" class="form-control" id="header">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto Destinasi 1</label>
                                    <div class="col-sm-12 col-md-7">
                                    <input type="file" name="destinasi1" class="form-control" id="destinasi1">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto Destinasi 2</label>
                                    <div class="col-sm-12 col-md-7">
                                    <input type="file" name="destinasi2" class="form-control" id="destinasi2">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto Destinasi 3</label>
                                    <div class="col-sm-12 col-md-7">
                                    <input type="file" name="destinasi3" class="form-control" id="destinasi3">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                        <button type="reset" class="btn btn-light-">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>