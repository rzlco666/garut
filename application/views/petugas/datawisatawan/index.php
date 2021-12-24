<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Wisatawan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('Petugas/'); ?>">Dashboard</a></div>
                <div class="breadcrumb-item">Data Wisatawan</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="javascript:;" onclick="tambah()" class="btn btn-primary">Tambah Data</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="tabel-wisatawan" class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Alamat</th>
                                            <th>No HP</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <!-- <tbody>
                                        <tr>
                                            <td>
                                                1
                                            </td>
                                            <td>Create a mobile app</td>
                                            <td class="align-middle">
                                                <div class="progress" data-height="4" data-toggle="tooltip" title="100%">
                                                    <div class="progress-bar bg-success" data-width="100%"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <img alt="image" src="assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Wildan Ahdian">
                                            </td>
                                            <td>2018-01-20</td>
                                            <td>
                                                <div class="badge badge-success">Completed</div>
                                            </td>
                                            <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                        </tr>
                                    </tbody> -->
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal" id="modal-wisatawan" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-wisatawan">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="hidden" id="id_wisatawan" name="id_wisatawan">
                        <input type="text" class="form-control" id="nama" name="nama" required="required">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required="required">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required="required">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required="required">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required="required">
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No. HP</label>
                        <input type="number" class="form-control" id="no_hp" name="no_hp" required="required">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-proses" onclick="proses()">Save changes</button>
            </div>
        </div>
    </div>
</div>