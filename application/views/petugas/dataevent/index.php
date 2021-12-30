<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Event</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('Petugas/'); ?>">Dashboard</a></div>
                <div class="breadcrumb-item">Data Event</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="<?= base_url('DataEvent/create/'); ?>" class="btn btn-primary">Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <?= $this->session->flashdata('message'); ?>
                                <table id="tabel-event" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Nama</th>
                                            <th>Lokasi</th>
                                            <th>Deskripsi</th>
                                            <th>Harga Tiket</th>
                                            <th>Durasi Event</th>
                                            <th>Tanggal Event</th>
                                            <th>Slot Event</th>
                                            <th>Thumbnail</th>
                                            <th>Header</th>
                                            <th>Event1</th>
                                            <th>Event2</th>
                                            <th>Event3</th>
                                            <th>Link Google Maps</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; foreach ($event as $isi) : ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $isi['nama']; ?></td>
                                                <td><?= $isi['lokasi']; ?></td>
                                                <td><?= $isi['deskripsi']; ?></td>
                                                <td>Rp. <?= number_format($isi['harga'], '0', '', '.'); ?></td>
                                                <td><?= $isi['durasi']; ?></td>
                                                <td><?= $isi['tanggal']; ?></td>
                                                <td><?= $isi['slot']; ?></td>
                                                <td><img width="80%" src="<?= base_url('public/upload/image/event/'); ?><?= $isi['thumbnail']; ?>" class="img-responsive" alt="..."></td>
                                                <td><img width="80%" src="<?= base_url('public/upload/image/event/header/'); ?><?= $isi['header']; ?>" class="img-responsive" alt="..."></td>
                                                <td><img width="80%" src="<?= base_url('public/upload/image/event/event1/'); ?><?= $isi['event1']; ?>" class="img-responsive" alt="..."></td>
                                                <td><img width="80%" src="<?= base_url('public/upload/image/event/event2/'); ?><?= $isi['event2']; ?>" class="img-responsive" alt="..."></td>
                                                <td><img width="80%" src="<?= base_url('public/upload/image/event/event3/'); ?><?= $isi['event3']; ?>" class="img-responsive" alt="..."></td>
                                                <td><?= $isi['maps']; ?></td>
                                                <td>
                                                    <a href="<?= base_url('DataEvent/edit/') . $isi['id_event']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                                    <a href="<?= base_url('DataEvent/delete/') . $isi['id_event']; ?>" class="btn btn-danger btn-sm">Hapus</a>
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