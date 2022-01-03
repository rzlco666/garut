<div id="page_caption" class="hasbg parallax" style="background-image:url(<?= base_url('assets_wisatawan/'); ?>images/situ-sukamaju.jpg);">

    <div class="page_title_wrapper">
        <div class="page_title_inner">
            <div class="page_title_content">
                <h1>Transaksi Wisata</h1>
            </div>
        </div>
    </div>

</div>

<!-- Begin content -->
<div id="page_content_wrapper" class="hasbg ">

    <!-- Begin content -->

    <div class="inner">

        <div class="inner_wrapper nopadding">

            <div id="page_main_content" class="sidebar_content left_sidebar fixed_column">

                <div class="standard_wrapper">

                    <?php
                    if (!empty($this->session->flashdata('message'))) {
                    ?>
                        <div id="15689862881347657664" class="alert_box success"><i class="fa fa-flag alert_icon"></i>
                            <div class="alert_box_msg"><?php echo $this->session->flashdata('message'); ?></div><a href="#" class="close_alert" data-target="15689862881347657664"><i class="fa fa-times"></i></a>
                        </div>
                        <br />
                    <?php
                    }
                    ?>
                    <?php
                    if (!empty($this->session->flashdata('error'))) {
                    ?>
                        <div id="15689862881137689461" class="alert_box error"><i class="fa fa-exclamation-circle alert_icon"></i>
                            <div class="alert_box_msg"><?php echo $this->session->flashdata('error'); ?></div><a href="#" class="close_alert" data-target="15689862881137689461"><i class="fa fa-times"></i></a>
                        </div>
                        <br />
                    <?php
                    }
                    ?>

                    <div id="portfolio_filter_wrapper" class="gallery classic two_cols portfolio-content section content clearfix" data-columns="3">

                        <?php foreach ($transaksi as $d) { ?>
                            <div class="tour_list_wrapper floatleft">
                                <div class="one_third">
                                    <a class="tour_image" href="<?= base_url('Home/detail_wisata/') . $d->id_wisata; ?>">
                                        <img src="<?= base_url('public/upload/image/wisata/'); ?><?= $d->thumbnail; ?>" alt="<?= $d->nama_wisata; ?>" />
                                    </a>
                                </div>

                                <div class="two_third last">
                                    <span class="icon fa fa-ticket"></span>&nbsp;Wisata
                                    &nbsp;
                                    <?php echo format_indo2($d->transaction_time); ?>
                                    &nbsp;
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
                                    &nbsp;
                                    <?= $d->order_id; ?>
                                    <div class="tour_list_excerpt">
                                        Tiket Wisata <?= $d->nama_wisata; ?> </br><?= $d->jumlah; ?> Tiket x Rp.<?= number_format($d->harga, '0', '', '.'); ?> </div>
                                    <div class="tour_list_excerpt">
                                        Total Pembayaran </br><b>Rp. <?= number_format($d->gross_amount, '0', '', '.'); ?></b> </div>

                                    <div class="tour_attribute_wrapper">
                                        <div class="tour_attribute_rating">
                                            <button class="button small left" type="button" style="background-color:#ffffff !important;color:#000000 !important;border:1px solid #ffffff !important;margin-right:10px;margin-bottom:10px;" data-toggle="modal" data-target="#detailTransaksi<?= $d->order_id; ?>">Detail Transaksi</button>
                                            <!-- <button id="myBtn<?= $d->order_id; ?>" class="button small left" style="background-color:#ffffff !important;color:#000000 !important;border:1px solid #ffffff !important;margin-right:10px;margin-bottom:10px;">Open Modal</button> -->
                                        </div>

                                        <div class="tour_attribute_days">
                                            <?php
                                            if ($d->status_code == "200") {
                                            ?>
                                                <?php
                                                $check = $this->templates->query("SELECT * FROM rating_wisata WHERE order_id = $d->order_id");
                                                if ($check->num_rows() > 0) {
                                                ?>

                                                    <a href="<?php echo base_url(); ?>home/edit_ulasan/<?php echo $d->order_id; ?>" class="button small left" style="background-color:#cb5f54 !important;color:#ffffff !important;border:1px solid #cb5f54 !important;margin-right:10px;margin-bottom:10px;">Edit Ulasan</a>

                                                <?php
                                                } else {
                                                ?>

                                                    <button type="button" class="button small left" style="background-color:#cb5f54 !important;color:#ffffff !important;border:1px solid #cb5f54 !important;margin-right:10px;margin-bottom:10px;" data-toggle="modal" data-target="#beriUlasan<?= $d->order_id; ?>">Beri Ulasan</button>

                                                <?php
                                                }
                                                ?>
                                            <?php
                                            } else {
                                            ?>
                                                <a href="<?= $d->pdf_url; ?>" class="button small left" style="background-color:#cb5f54 !important;color:#ffffff !important;border:1px solid #cb5f54 !important;margin-right:10px;margin-bottom:10px;">Cara Bayar</a>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                    <br class="clear" />

                </div>
            </div>

            <div class="sidebar_wrapper left_sidebar">
                <div class="sidebar">

                    <div class="content">
                        <?php foreach ($profile as $i) : ?>
                            <div class="teaser_wrapper" style="background-color:#f0f0f0;padding:15px;"><img src="<?= base_url('public/upload/image/wisatawan/'); ?><?= $i['foto']; ?>" alt="" />
                                <div class="teaser_content_wrapper">
                                    <h5><?= $i['nama']; ?></h5>
                                    <div class="teaser_content">
                                        <span class="icon fa fa-user" href="#"></span>&nbsp;<?= $i['username']; ?></br>
                                        <span class="icon fa fa-envelope" href="#"></span>&nbsp;<?= $i['email']; ?></br>
                                        <span class="icon fa fa-phone" href="#"></span>&nbsp;<?= $i['no_hp']; ?></br>
                                        <span class="icon fa fa-home" href="#"></span>&nbsp;<?= $i['alamat']; ?></br>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

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
                    <table>
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
                            <td><?php echo format_indo($d->transaction_time); ?></td>
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
                    <a target="_blank" href="<?= base_url('Home/invoice/') . $d->order_id; ?>" class="button small left" style="background-color:#cb5f54 !important;color:#ffffff !important;border:1px solid #cb5f54 !important;margin-right:10px;margin-bottom:10px;">Cetak Invoice</a>
                    <button type="button" class="button small left" style="background-color:#97a2a2 !important;color:#ffffff !important;border:1px solid #97a2a2 !important;margin-right:10px;margin-bottom:10px;" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>