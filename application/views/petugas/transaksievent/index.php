<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Transaksi Event</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="<?= base_url('Petugas/'); ?>">Dashboard</a></div>
                <div class="breadcrumb-item">Transaksi Event</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <!-- <a href="<?= base_url('DataEvent/create/'); ?>" class="btn btn-primary">Tambah Data</a> -->
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
                                            <th>Order ID</th>
                                            <th>Nama</th>
                                            <th>Billing</th>
                                            <th>Item</th>
                                            <th>Total Bayar</th>
                                            <th>Jenis Pembayaran</th>
                                            <th>Transcation Time</th>
                                            <th>Status Transaksi</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($transaksi as $isi) : ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $isi['order_id']; ?></td>
                                                <td><?= $isi['nama']; ?></td>
                                                <td><?= $isi['alamat']; ?></br><?= $isi['email']; ?></br><?= $isi['no_hp']; ?></td>
                                                <td><?= $isi['nama_event']; ?> x <?= $isi['jumlah']; ?></td>
                                                <td>Rp. <?= number_format($isi['gross_amount'], '0', '', '.'); ?></td>
                                                <td><?php $text = $isi['payment_type'];
                                                    $string = str_replace('_', ' ', $text);
                                                    echo ucwords($string);
                                                    echo ' ' . strtoupper($isi['bank']) ?></td>
                                                <td><?php echo format_indo($isi['transaction_time']); ?></td>
                                                <td><?php
                                                    if ($isi['status_code'] == "200") {
                                                    ?>
                                                        <div class="badges">
                                                            <span class="badge badge-success">Lunas</span>
                                                        </div>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <div class="badges">
                                                            <span class="badge badge-warning">Pending</span>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                <!-- <td>
                                                <a target="_blank" href="<?= base_url('Home/invoice/') . $isi['order_id']; ?>" class="btn btn-success btn-sm">Invoice</a>
                                                </td> -->
                                            </tr>
                                        <?php $no++;
                                        endforeach; ?>
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