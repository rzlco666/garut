<style>
    tr.noBorder td {
        border: 0;
    }
</style>
<!-- Base typography-->
<section class="section section-sm section-first bg-default text-left">
    <div class="container">
        <div class="row row-40 flex-lg-row-reverse justify-content-xl-between">
            <div class="col-xl-9">
                <?php foreach ($profile as $i) : ?>
                    <form class="rd-form rd-form-variant-2">
                        <div class="row row-14 gutters-14">
                            <div class="col-md-12">
                                <div class="form-wrap">
                                    <input readonly class="form-input" type="text" class="form-control" name="nama" id="nama" value="<?= $i['nama']; ?>" data-constraints="@Required">
                                    <label class="form-label" for="nama">Nama Lengkap</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-wrap">
                                    <input readonly class="form-input" type="text" class="form-control" name="username" id="username" value="<?= $i['username']; ?>" data-constraints="@Required">
                                    <label class="form-label" for="username">Username</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-wrap">
                                    <input readonly class="form-input" id="email" type="email" name="email" value="<?= $i['email']; ?>" data-constraints="@Email @Required">
                                    <label class="form-label" for="email">E-mail</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-wrap">
                                    <input readonly class="form-input" id="no_hp" type="number" name="no_hp" value="<?= $i['no_hp']; ?>" data-constraints="@Numeric">
                                    <label class="form-label" for="no_hp">No. HP</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-wrap">
                                    <input readonly class="form-input" type="text" class="form-control" name="alamat" id="alamat" value="<?= $i['alamat']; ?>" data-constraints="@Required">
                                    <label class="form-label" for="alamat">Alamat</label>
                                </div>
                            </div>
                        </div>
                        <div class="row row-14 gutters-14">
                            <div class="col-md-4">
                                <div class="form-wrap">
                                    <button class="button button-md button-default-outline-2 button-ujarak" type="button" data-toggle="modal" data-target="#ubahPassword">Ubah Password</button>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-wrap">
                                    <button class="button button-primary button-pipaluk" type="button" data-toggle="modal" data-target="#editProfile">Edit Profile</button>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php endforeach; ?>
            </div>
            <div class="col-xl-3 d-none d-xl-block">
                <div class="offset-left-xl-45">
                    <div class="card">
                        <?php foreach ($profile as $i) : ?>
                            <img class="card-img-top" src="<?= base_url('public/upload/image/wisatawan/'); ?><?= $i['foto']; ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?= $i['nama']; ?></h5>
                                <p class="card-text">
                                <table>
                                    <tr>
                                        <td><a class="icon fa fa-user" href="#"></a></td>
                                        <td>&nbsp;&nbsp;&nbsp;<?= $i['username']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><a class="icon fa fa-envelope" href="#"></a></td>
                                        <td>&nbsp;&nbsp;&nbsp;<?= $i['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><a class="icon fa fa-phone" href="#"></a></td>
                                        <td>&nbsp;&nbsp;&nbsp;<?= $i['no_hp']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><a class="icon fa fa-home" href="#"></a></td>
                                        <td>&nbsp;&nbsp;&nbsp;<?= $i['alamat']; ?></td>
                                    </tr>
                                </table>
                                </p>
                            </div>
                        <?php endforeach; ?>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="<?= base_url('Home/transaksi_wisata'); ?>" class="card-link">Transaksi Wisata</a></li>
                            <li class="list-group-item"><a href="<?= base_url('Home/profile'); ?>" class="card-link">Profile</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php foreach ($profile as $i) { ?>
    <div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="editProfile" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfile">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div style="text-align: left;" class="modal-body">
                    <form enctype="multipart/form-data" action="<?php echo base_url('Home/update_profile'); ?>" method="post">
                        <div class="form-group">
                            <label for="nama" class="col-form-label">Nama</label>
                            <input type="hidden" name="id_wisatawan" id="id_wisatawan" value="<?= $i['id_wisatawan']; ?>">
                            <input type="text" class="form-control" name="nama" id="nama" value="<?= $i['nama']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username" value="<?= $i['username']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="<?= $i['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="no_hp" class="col-form-label">No HP.</label>
                            <input type="number" class="form-control" name="no_hp" id="no_hp" value="<?= $i['no_hp']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="col-form-label">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $i['alamat']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="foto" class="col-form-label">Foto</label>
                            <input type="file" name="foto" class="form-control" id="foto">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ubahPassword" tabindex="-1" role="dialog" aria-labelledby="ubahPassword" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ubahPassword">Ubah Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div style="text-align: left;" class="modal-body">
                    <form enctype="multipart/form-data" action="<?php echo base_url('Home/ubah_password'); ?>" method="post">
                        <div class="form-group">
                            <label for="password" class="col-form-label">Password Baru</label>
                            <input type="hidden" name="id_wisatawan" id="id_wisatawan" value="<?= $i['id_wisatawan']; ?>">
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>