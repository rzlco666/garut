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
                            <a href="<?= base_url('datawisata/create/'); ?>" class="btn btn-primary">Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <?= $this->session->flashdata('message'); ?>
                                <table id="tabel-wisata" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Nama</th>
                                            <th>Lokasi</th>
                                            <th>Deskripsi</th>
                                            <th>Thumbnail</th>
                                            <th>Header</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; foreach ($wisata as $isi) : ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $isi['nama']; ?></td>
                                                <td><?= $isi['lokasi']; ?></td>
                                                <td><?= $isi['deskripsi']; ?></td>
                                                <td><img width="80%" src="<?= base_url('public/upload/image/wisata/'); ?><?= $isi['thumbnail']; ?>" class="img-responsive" alt="..."></td>
                                                <td><img width="80%" src="<?= base_url('public/upload/image/wisata/header/'); ?><?= $isi['header']; ?>" class="img-responsive" alt="..."></td>
                                                <td>
                                                    <a href="<?= base_url('datawisata/edit/') . $isi['id_wisata']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                                    <a href="<?= base_url('datawisata/delete/') . $isi['id_wisata']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                                                </td>
                                            </tr>
                                        <?php $no++; endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- <div class="modal" id="modal-wisata" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-wisata">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="hidden" id="id_wisata" name="id_wisata">
                        <input type="text" class="form-control" id="nama" name="nama" required="required">
                    </div>
                    <div class="form-group">
                        <label for="lokasi">Lokasi</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi" required="required">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="summernote-simple"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-proses" onclick="proses()">Save changes</button>
            </div>
        </div>
    </div>
</div> -->