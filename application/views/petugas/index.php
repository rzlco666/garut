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
                                    <canvas id="balance-chart" height="80"></canvas>
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
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Budget vs Sales</h4>
                                </div>
                                <div class="card-body">
                                    <canvas id="myChart" height="158"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card gradient-bottom">
                                <div class="card-header">
                                    <h4>Top 5 Products</h4>
                                    <div class="card-header-action dropdown">
                                        <a href="#" data-toggle="dropdown" class="btn btn-danger dropdown-toggle">Month</a>
                                        <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                                            <li class="dropdown-title">Select Period</li>
                                            <li><a href="#" class="dropdown-item">Today</a></li>
                                            <li><a href="#" class="dropdown-item">Week</a></li>
                                            <li><a href="#" class="dropdown-item active">Month</a></li>
                                            <li><a href="#" class="dropdown-item">This Year</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body" id="top-5-scroll">
                                    <ul class="list-unstyled list-unstyled-border">
                                        <li class="media">
                                            <img class="mr-3 rounded" width="55" src="<?= base_url('assets_petugas/'); ?>img/products/product-3-50.png" alt="product">
                                            <div class="media-body">
                                                <div class="float-right">
                                                    <div class="font-weight-600 text-muted text-small">86 Sales</div>
                                                </div>
                                                <div class="media-title">oPhone S9 Limited</div>
                                                <div class="mt-1">
                                                    <div class="budget-price">
                                                        <div class="budget-price-square bg-primary" data-width="64%"></div>
                                                        <div class="budget-price-label">$68,714</div>
                                                    </div>
                                                    <div class="budget-price">
                                                        <div class="budget-price-square bg-danger" data-width="43%"></div>
                                                        <div class="budget-price-label">$38,700</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <img class="mr-3 rounded" width="55" src="<?= base_url('assets_petugas/'); ?>img/products/product-4-50.png" alt="product">
                                            <div class="media-body">
                                                <div class="float-right">
                                                    <div class="font-weight-600 text-muted text-small">67 Sales</div>
                                                </div>
                                                <div class="media-title">iBook Pro 2018</div>
                                                <div class="mt-1">
                                                    <div class="budget-price">
                                                        <div class="budget-price-square bg-primary" data-width="84%"></div>
                                                        <div class="budget-price-label">$107,133</div>
                                                    </div>
                                                    <div class="budget-price">
                                                        <div class="budget-price-square bg-danger" data-width="60%"></div>
                                                        <div class="budget-price-label">$91,455</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <img class="mr-3 rounded" width="55" src="<?= base_url('assets_petugas/'); ?>img/products/product-1-50.png" alt="product">
                                            <div class="media-body">
                                                <div class="float-right">
                                                    <div class="font-weight-600 text-muted text-small">63 Sales</div>
                                                </div>
                                                <div class="media-title">Headphone Blitz</div>
                                                <div class="mt-1">
                                                    <div class="budget-price">
                                                        <div class="budget-price-square bg-primary" data-width="34%"></div>
                                                        <div class="budget-price-label">$3,717</div>
                                                    </div>
                                                    <div class="budget-price">
                                                        <div class="budget-price-square bg-danger" data-width="28%"></div>
                                                        <div class="budget-price-label">$2,835</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <img class="mr-3 rounded" width="55" src="<?= base_url('assets_petugas/'); ?>img/products/product-3-50.png" alt="product">
                                            <div class="media-body">
                                                <div class="float-right">
                                                    <div class="font-weight-600 text-muted text-small">28 Sales</div>
                                                </div>
                                                <div class="media-title">oPhone X Lite</div>
                                                <div class="mt-1">
                                                    <div class="budget-price">
                                                        <div class="budget-price-square bg-primary" data-width="45%"></div>
                                                        <div class="budget-price-label">$13,972</div>
                                                    </div>
                                                    <div class="budget-price">
                                                        <div class="budget-price-square bg-danger" data-width="30%"></div>
                                                        <div class="budget-price-label">$9,660</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <img class="mr-3 rounded" width="55" src="<?= base_url('assets_petugas/'); ?>img/products/product-5-50.png" alt="product">
                                            <div class="media-body">
                                                <div class="float-right">
                                                    <div class="font-weight-600 text-muted text-small">19 Sales</div>
                                                </div>
                                                <div class="media-title">Old Camera</div>
                                                <div class="mt-1">
                                                    <div class="budget-price">
                                                        <div class="budget-price-square bg-primary" data-width="35%"></div>
                                                        <div class="budget-price-label">$7,391</div>
                                                    </div>
                                                    <div class="budget-price">
                                                        <div class="budget-price-square bg-danger" data-width="28%"></div>
                                                        <div class="budget-price-label">$5,472</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer pt-3 d-flex justify-content-center">
                                    <div class="budget-price justify-content-center">
                                        <div class="budget-price-square bg-primary" data-width="20"></div>
                                        <div class="budget-price-label">Selling Price</div>
                                    </div>
                                    <div class="budget-price justify-content-center">
                                        <div class="budget-price-square bg-danger" data-width="20"></div>
                                        <div class="budget-price-label">Budget Price</div>
                                    </div>
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
                                                                <span class="badge badge-danger">Pending</span>
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
                                                        <span class="badge badge-danger">Pending</span>
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