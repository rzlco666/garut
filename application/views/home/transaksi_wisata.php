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
                <div class="card">
                    <div class="card-body">
                        <div class="card">
                            <table class="table table-responsive">
                                <tbody>
                                    <?php foreach ($transaksi as $d) { ?>
                                        <tr class="noBorder">
                                            <td colspan="10"><a class="icon fa fa-ticket" href="#"></a>&nbsp;&nbsp;Wisata
                                                &nbsp;&nbsp;
                                                <?php $date = date_create($d->transaction_time);
                                                echo date_format($date, "d M Y"); ?>
                                                &nbsp;&nbsp;
                                                <?php
                                                if ($d->status_code == "200") {
                                                ?>
                                                    <font color="green"><b>Lunas</b></font>
                                                <?php
                                                } else {
                                                ?>
                                                    <font color="yellow"><b>Pending</b></font>
                                                <?php
                                                }
                                                ?>
                                                &nbsp;&nbsp;
                                                <?= $d->order_id; ?>
                                            </td>
                                        <tr class="noBorder">
                                            <td>
                                                <img style="width: 70px;" src="<?= base_url('public/upload/image/wisata/'); ?><?= $d->thumbnail; ?>" alt="...">
                                            </td>
                                            <td>
                                                Tiket Wisata <?= $d->nama_wisata; ?> </br><?= $d->jumlah; ?> Tiket x Rp.<?= number_format($d->harga, '0', '', '.'); ?>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Total Pembayaran </br><b>Rp. <?= number_format($d->gross_amount, '0', '', '.'); ?></b></td>
                                        </tr>
                                        <tr class="noBorder">
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td style="text-align: right; margin-right: 0px; vertical-align: middle">
                                                <button type="button" style="border: none; padding: 0; background: none;" data-toggle="modal" data-target="#detailTransaksi<?= $d->order_id; ?>">Lihat Detail Transaksi</button>
                                            </td>
                                            <?php
                                            if ($d->status_code == "200") {
                                            ?>
                                                <?php
                                                $check = $this->templates->query("SELECT * FROM rating_wisata WHERE order_id = $d->order_id");
                                                if ($check->num_rows() > 0) {
                                                ?>
                                                    <td style="text-align: right; margin-right: 0px;">
                                                        <a href="<?php echo base_url(); ?>home/edit_ulasan/<?php echo $d->order_id; ?>" class="button-primary button-pipaluk">Edit Ulasan</a>
                                                        <!-- <button type="button" class="button-primary button-pipaluk" data-toggle="modal" data-target="#updateUlasan<?= $d->order_id; ?>">Update</button> -->
                                                    </td>
                                                <?php
                                                } else {
                                                ?>
                                                    <td style="text-align: right; margin-right: 0px;">
                                                        <button type="button" class="button-primary button-pipaluk" data-toggle="modal" data-target="#beriUlasan<?= $d->order_id; ?>">Beri Ulasan</button>
                                                    </td>
                                                <?php
                                                }
                                                ?>
                                            <?php
                                            } else {
                                            ?>
                                                <td style="text-align: right; margin-right: 0px;"><a href="<?= $d->pdf_url; ?>" class="button-primary button-pipaluk">Cara Bayar</a></td>
                                            <?php
                                            }
                                            ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
                            <li class="list-group-item"><a href="<?= base_url('home/transaksi_wisata'); ?>" class="card-link">Transaksi Wisata</a></li>
                            <li class="list-group-item"><a href="<?= base_url('home/profile'); ?>" class="card-link">Profile</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php foreach ($transaksi as $d) { ?>
    <!-- Modal Detail -->
    <div class="modal fade" id="detailTransaksi<?= $d->order_id; ?>" tabindex="-1" role="dialog" aria-labelledby="detailTransaksiLabel<?= $d->order_id; ?>" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailTransaksiLabel<?= $d->order_id; ?>">Detail Transaksi &mdash; <?= $d->order_id; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table style="text-align: left;">
                        <tr>
                            <td>Order ID</td>
                            <td>:</td>
                            <td><?= $d->order_id; ?></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><?= $d->nama; ?></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top;">Billing</td>
                            <td style="vertical-align: top;">:</td>
                            <td><?= $d->alamat; ?></br><?= $d->email; ?></br><?= $d->no_hp; ?></td>
                        </tr>
                        <tr>
                            <td>Item</td>
                            <td>:</td>
                            <td>Tiket Wisata <?= $d->nama_wisata; ?> x <?= $d->jumlah; ?></td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>:</td>
                            <td>Rp. <?= number_format($d->harga, '0', '', '.') ?> x <?= $d->jumlah; ?></td>
                        </tr>
                        <tr>
                            <td>Total Bayar</td>
                            <td>:</td>
                            <td>Rp. <?= number_format($d->gross_amount, '0', '', '.'); ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Pembayaran</td>
                            <td>:</td>
                            <td><?php $text = $d->payment_type;
                                $string = str_replace('_', ' ', $text);
                                echo ucwords($string);
                                echo ' ' . strtoupper($d->bank) ?></td>
                        </tr>
                        <tr>
                            <td>VA Number</td>
                            <td>:</td>
                            <td><?= $d->va_number; ?></td>
                        </tr>
                        <tr>
                            <td>Transcation Time</td>
                            <td>:</td>
                            <td><?= $d->transaction_time; ?></td>
                        </tr>
                        <tr>
                            <td>Status Transaksi</td>
                            <td>:</td>
                            <td><?php

                                if ($d->status_code == "200") {
                                ?>
                                    <font color="green">Lunas</font>
                                <?php
                                } else {
                                ?>
                                    <font color="yellow">Pending</font>
                                <?php
                                }

                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a target="_blank" href="<?= base_url('home/invoice/') . $d->order_id; ?>" class="btn btn-primary">Cetak Invoice</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>