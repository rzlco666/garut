            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="card card-statistic-2">
                                <div class="card-stats">
                                    <div class="card-stats-title">Status Transaksi (Wisata + Event)
                                    </div>
                                    <div class="card-stats-items">
                                        <div class="card-stats-item">
                                            <!-- <div class="card-stats-item-count">201</div> -->
                                            <div class="card-stats-item-count"><?= ($transaksi_wisata_pending + $transaksi_event_pending); ?></div>
                                            <div class="card-stats-item-label">Pending</div>
                                        </div>
                                        <div class="card-stats-item">
                                            <!-- <div class="card-stats-item-count">200</div> -->
                                            <div class="card-stats-item-count"><?= ($transaksi_wisata_acc + $transaksi_event_acc); ?></div>
                                            <div class="card-stats-item-label">Lunas</div>
                                        </div>
                                        <div class="card-stats-item">
                                            <!-- <div class="card-stats-item-count">202</div> -->
                                            <div class="card-stats-item-count"><?= ($transaksi_wisata_cancel + $transaksi_event_cancel); ?></div>
                                            <div class="card-stats-item-label">Cancel</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-icon shadow-primary bg-primary">
                                    <i class="fas fa-archive"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Total</h4>
                                    </div>
                                    <div class="card-body">
                                        <?= ($transaksi_wisata + $transaksi_event); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="card card-statistic-2">
                                <div class="card-chart">
                                    <canvas id="test-chart" height="80"></canvas>
                                </div>
                                <div class="card-icon shadow-primary bg-primary">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Pendapatan Wisata (<?= $transaksi_wisata_acc; ?> Lunas)</h4>
                                    </div>
                                    <div class="card-body">
                                        <?php foreach ($pendapatan_wisata as $key) {
                                            echo "Rp " . number_format($key->total, 0, ".", ".");
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="card card-statistic-2">
                                <div class="card-chart">
                                    <canvas id="sales-chart" height="80"></canvas>
                                </div>
                                <div class="card-icon shadow-primary bg-primary">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Pendapatan Event (<?= $transaksi_event_acc; ?> Lunas)</h4>
                                    </div>
                                    <div class="card-body">
                                        <?php foreach ($pendapatan_event as $key) {
                                            echo "Rp " . number_format($key->total, 0, ".", ".");
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Wisata vs Event</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="myChartt" height="158"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Transaksi Event</h4>
                                    <div class="card-header-action">
                                        <a href="<?= base_url('TransaksiEvent/'); ?>" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive table-invoice">
                                        <table class="table table-striped">

                                            <tr>
                                                <th>Order ID</th>
                                                <th>Customer</th>
                                                <th>Tanggal</th>
                                                <th>Total Bayar</th>
                                                <th>Status</th>
                                            </tr>
                                            <?php $no = 1;
                                            foreach ($event as $isi) : ?>
                                                <tr>
                                                    <td><a href="#"><?= $isi['order_id']; ?></a></td>
                                                    <td class="font-weight-600"><?= $isi['nama']; ?></td>

                                                    </td>
                                                    <td><?php echo format_indo($isi['transaction_time']); ?></td>
                                                    <td>
                                                        <b>Rp. <?= number_format($isi['gross_amount'], '0', '', '.'); ?></b>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($isi['status_code'] == "200") {
                                                        ?>
                                                            <div class="badges">
                                                                <span class="badge badge-success">Lunas</span>
                                                            </div>
                                                        <?php
                                                        } elseif ($isi['status_code'] == "201") {
                                                        ?>
                                                            <div class="badges">
                                                                <span class="badge badge-warning">Pending</span>
                                                            </div>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <div class="badges">
                                                                <span class="badge badge-danger">Dibatalkan</span>
                                                            </div>
                                                        <?php
                                                        }
                                                        ?>
                                    </div>
                                    </tr>
                                <?php $no++;
                                            endforeach; ?>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Transaksi Wisata</h4>
                            <div class="card-header-action">
                                <a href="<?= base_url('TransaksiWisata/'); ?>" class="btn btn-danger">View More <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive table-invoice">
                                <table class="table table-striped">
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Customer</th>
                                        <th>Tanggal</th>
                                        <th>Total Bayar</th>
                                        <th>Status</th>
                                    </tr>
                                    <?php $no = 1;
                                    foreach ($wisata as $isi) : ?>
                                        <tr>
                                            <td><a href="#"><?= $isi['order_id']; ?></a></td>
                                            <td class="font-weight-600"><?= $isi['nama']; ?></td>

                                            </td>
                                            <td><?php echo format_indo($isi['transaction_time']); ?></td>
                                            <td>
                                                <b>Rp. <?= number_format($isi['gross_amount'], '0', '', '.'); ?></b>
                                            </td>
                                            <td>
                                                <?php
                                                if ($isi['status_code'] == "200") {
                                                ?>
                                                    <div class="badges">
                                                        <span class="badge badge-success">Lunas</span>
                                                    </div>
                                                <?php
                                                } elseif ($isi['status_code'] == "201") {
                                                ?>
                                                    <div class="badges">
                                                        <span class="badge badge-warning">Pending</span>
                                                    </div>
                                                <?php
                                                } else {
                                                ?>
                                                    <div class="badges">
                                                        <span class="badge badge-danger">Dibatalkan</span>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                            </div>
                            </tr>
                        <?php $no++;
                                    endforeach; ?>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </section>
            </div>