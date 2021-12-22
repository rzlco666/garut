<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-zQtZZRkH9k_rq429"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<style>
    .rating {
        --dir: right;
        --fill: gold;
        --fillbg: rgba(100, 100, 100, 0.15);
        --heart: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 21.328l-1.453-1.313q-2.484-2.25-3.609-3.328t-2.508-2.672-1.898-2.883-0.516-2.648q0-2.297 1.57-3.891t3.914-1.594q2.719 0 4.5 2.109 1.781-2.109 4.5-2.109 2.344 0 3.914 1.594t1.57 3.891q0 1.828-1.219 3.797t-2.648 3.422-4.664 4.359z"/></svg>');
        --star: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 17.25l-6.188 3.75 1.641-7.031-5.438-4.734 7.172-0.609 2.813-6.609 2.813 6.609 7.172 0.609-5.438 4.734 1.641 7.031z"/></svg>');
        --stars: 5;
        --starsize: 3rem;
        --symbol: var(--star);
        --value: 1;
        --w: calc(var(--stars) * var(--starsize));
        --x: calc(100% * (var(--value) / var(--stars)));
        block-size: var(--starsize);
        inline-size: var(--w);
        position: relative;
        touch-action: manipulation;
        -webkit-appearance: none;
    }

    .rating::-moz-range-track {
        background: linear-gradient(to var(--dir), var(--fill) 0 var(--x), var(--fillbg) 0 var(--x));
        block-size: 100%;
        mask: repeat left center/var(--starsize) var(--symbol);
    }

    .rating::-webkit-slider-runnable-track {
        background: linear-gradient(to var(--dir), var(--fill) 0 var(--x), var(--fillbg) 0 var(--x));
        block-size: 100%;
        mask: repeat left center/var(--starsize) var(--symbol);
        -webkit-mask: repeat left center/var(--starsize) var(--symbol);
    }

    .rating::-moz-range-thumb {
        height: var(--starsize);
        opacity: 0;
        width: var(--starsize);
    }

    .rating::-webkit-slider-thumb {
        height: var(--starsize);
        opacity: 0;
        width: var(--starsize);
        -webkit-appearance: none;
    }

    .rating,
    .rating-label {
        display: block;
        font-family: ui-sans-serif, system-ui, sans-serif;
    }

    .rating-label {
        margin-block-end: 1rem;
    }

    /* NO JS */
    .rating--nojs::-moz-range-track {
        background: var(--fillbg);
    }

    .rating--nojs::-moz-range-progress {
        background: var(--fill);
        block-size: 100%;
        mask: repeat left center/var(--starsize) var(--star);
    }

    .rating--nojs::-webkit-slider-runnable-track {
        background: var(--fillbg);
    }

    .rating--nojs::-webkit-slider-thumb {
        background-color: var(--fill);
        box-shadow: calc(0rem - var(--w)) 0 0 var(--w) var(--fill);
        opacity: 1;
        width: 1px;
    }
</style>

<?php foreach ($wisata as $i) : ?>
    <section class="breadcrumbs-custom-inset">
        <div class="breadcrumbs-custom context-dark bg-overlay-60">
            <div class="container">
                <h2 class="breadcrumbs-custom-title"><?= $i['nama']; ?></h2>
                <ul class="breadcrumbs-custom-path">
                    <li><?= $i['lokasi']; ?></li>
                </ul>
            </div>
            <div class="box-position" style="background-image: url(<?= base_url('public/upload/image/wisata/header/'); ?><?= $i['header']; ?>);"></div>
        </div>
    </section>
    <!-- Why choose us-->
    <section class="section section-sm section-first bg-default text-md-left">
        <div class="container">
            <div class="row row-50 justify-content-center align-items-xl-center">
                <div class="col-md-10 col-lg-5 col-xl-6"><img src="<?= base_url('public/upload/image/wisata/'); ?><?= $i['thumbnail']; ?>" alt="" width="519" height="564" />
                </div>
                <div class="col-md-10 col-lg-7 col-xl-6">
                    <h3 class="text-spacing-25 font-weight-bold title-opacity-9"><?= $i['nama']; ?></h3>
                    <!-- Bootstrap tabs-->
                    <div class="tabs-custom tabs-horizontal tabs-line" id="tabs-4">
                        <!-- Tab panes-->
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tabs-4-1">
                                <p><?= $i['deskripsi']; ?></p>
                                <p>Harga Tiket : Rp. <?= number_format($i['harga'], '0', '', '.'); ?> /orang</p>
                                <div class="group-md group-middle">
                                    <button type="button" class="button button-width-xl-230 button-primary button-pipaluk" data-toggle="modal" data-target=".bd-example-modal-lg">Pesan Tiket</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- Latest Projects-->
    <section class="section section-sm section-fluid bg-default">
        <div class="container">
            <h3>Destinations</h3>
        </div>
        <!-- Owl Carousel-->
        <div class="owl-carousel owl-classic owl-timeline" data-items="1" data-md-items="2" data-lg-items="3" data-xl-items="4" data-margin="30" data-autoplay="false" data-nav="true" data-dots="true">
            <div class="owl-item">
                <!-- Thumbnail Classic-->
                <article class="thumbnail thumbnail-mary">
                    <div class="thumbnail-mary-figure"><img src="<?= base_url('public/upload/image/wisata/'); ?><?= $i['thumbnail']; ?>" alt="" width="420" height="308" />
                    </div>
                    <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="<?= base_url('public/upload/image/wisata/'); ?><?= $i['thumbnail']; ?>" data-lightgallery="item"><img src="<?= base_url('public/upload/image/wisata/'); ?><?= $i['thumbnail']; ?>" alt="" width="420" height="308" /></a>
                    </div>
                </article>
                <div class="thumbnail-mary-description">
                    <h5 class="thumbnail-mary-project"><a href="#"></a></h5><span class="thumbnail-mary-decor"></span>
                    <h5 class="thumbnail-mary-time">
                    </h5>
                </div>
            </div>
            <div class="owl-item">
                <article class="thumbnail thumbnail-mary">
                    <div class="thumbnail-mary-figure"><img src="<?= base_url('public/upload/image/wisata/destinasi1/'); ?><?= $i['destinasi1']; ?>" alt="" width="420" height="308" />
                    </div>
                    <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="<?= base_url('public/upload/image/wisata/destinasi1/'); ?><?= $i['destinasi1']; ?>" data-lightgallery="item"><img src="<?= base_url('public/upload/image/wisata/destinasi1/'); ?><?= $i['destinasi1']; ?>" alt="" width="420" height="308" /></a>
                    </div>
                </article>
                <div class="thumbnail-mary-description">
                    <h5 class="thumbnail-mary-project"><a href="#"></a></h5><span class="thumbnail-mary-decor"></span>
                    <h5 class="thumbnail-mary-time">
                    </h5>
                </div>
            </div>
            <div class="owl-item">
                <article class="thumbnail thumbnail-mary">
                    <div class="thumbnail-mary-figure"><img src="<?= base_url('public/upload/image/wisata/destinasi2/'); ?><?= $i['destinasi2']; ?>" alt="" width="420" height="308" />
                    </div>
                    <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="<?= base_url('public/upload/image/wisata/destinasi2/'); ?><?= $i['destinasi2']; ?>" data-lightgallery="item"><img src="<?= base_url('public/upload/image/wisata/destinasi2/'); ?><?= $i['destinasi2']; ?>" alt="" width="420" height="308" /></a>
                    </div>
                </article>
                <div class="thumbnail-mary-description">
                    <h5 class="thumbnail-mary-project"><a href="#"></a></h5><span class="thumbnail-mary-decor"></span>
                    <h5 class="thumbnail-mary-time">
                    </h5>
                </div>
            </div>
            <div class="owl-item">
                <article class="thumbnail thumbnail-mary">
                    <div class="thumbnail-mary-figure"><img src="<?= base_url('public/upload/image/wisata/destinasi3/'); ?><?= $i['destinasi3']; ?>" alt="" width="420" height="308" />
                    </div>
                    <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="<?= base_url('public/upload/image/wisata/destinasi3/'); ?><?= $i['destinasi3']; ?>" data-lightgallery="item"><img src="<?= base_url('public/upload/image/wisata/destinasi3/'); ?><?= $i['destinasi3']; ?>" alt="" width="420" height="308" /></a>
                    </div>
                </article>
                <div class="thumbnail-mary-description">
                    <h5 class="thumbnail-mary-project"><a href="#"></a></h5><span class="thumbnail-mary-decor"></span>
                    <h5 class="thumbnail-mary-time">
                    </h5>
                </div>
            </div>
        </div>
    </section>
    <!-- What people Say-->
    <section class="section section-sm section-last bg-default">
        <div class="container">
            <h3>Ulasan <?= $i['nama']; ?></h3>
            <!-- Owl Carousel-->
            <div class="owl-carousel owl-modern" data-items="1" data-stage-padding="15" data-margin="30" data-dots="true" data-animation-in="fadeIn" data-animation-out="fadeOut" data-autoplay="true">
                <!-- Quote Lisa-->
                <?php foreach ($ulasan as $u) : ?>
                    <article class="quote-lisa">
                        <div class="quote-lisa-body"><a class="quote-lisa-figure" href="#"><img class="img-circles" src="<?= base_url('public/upload/image/wisatawan/'); ?><?= $u['foto']; ?>" alt="" width="100" height="100" /></a>
                            <div class="quote-lisa-text">
                                <center>
                                    <input class="rating" max="5" readonly step="0.01" style="--fillbg;--value:<?= $u['rating']; ?>;" type="range" value="<?= $u['rating']; ?>">
                                </center>
                                <p class="q"><?= $u['feedback']; ?></p>
                            </div>
                            <h5 class="quote-lisa-cite"><a href="#"><?= $u['nama']; ?></a></h5>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!--Counters-->
    <!-- Counter Classic-->
    <section class="section section-fluid bg-default">
        <div class="mapouter">
            <div class="gmap_canvas"><iframe width="1920" height="412" id="gmap_canvas" src="<?= $i['maps']; ?>" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://fmovies-online.net">fmovies</a><br>
                <style>
                    .mapouter {
                        position: relative;
                        text-align: right;
                        height: 412px;
                        width: 1920px;
                    }
                </style><a href="https://www.embedgooglemap.net">insert google map into wordpress</a>
                <style>
                    .gmap_canvas {
                        overflow: hidden;
                        background: none !important;
                        height: 412px;
                        width: 1920px;
                    }
                </style>
            </div>
        </div>
    </section>

    <!-- Modal Beli-->

    <?php
    if ($this->session->userdata('is_login') == FALSE) {
    ?>
        <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pemesanan Tiket <?= $i['nama']; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Silahkan login dahulu <a href="<?= base_url('home/login'); ?>">disini</a></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } else {
    ?>
        <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Pemesanan Tiket <?= $i['nama']; ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="payment-form" method="post" action="<?= site_url() ?>home/finish">
                            <input type="hidden" name="result_type" id="result-type" value="">
                            <input type="hidden" name="result_data" id="result-data" value="">
                            <div class="form-group">
                                <label style="display:block; width:x; height:y; text-align:left;" for="nama" class="col-form-label">Nama</label>
                                <input type="hidden" id="id_wisatawan" name="id_wisatawan" value="<?php echo $this->session->userdata('id_wisatawan') ?>">
                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $this->session->userdata('nama') ?>">
                            </div>
                            <div class="form-group">
                                <label style="display:block; width:x; height:y; text-align:left;" for="alamat" class="col-form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $this->session->userdata('alamat') ?>">
                            </div>
                            <div class="form-group">
                                <label style="display:block; width:x; height:y; text-align:left;" for="email" class="col-form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo $this->session->userdata('email') ?>">
                            </div>
                            <div class="form-group">
                                <label style="display:block; width:x; height:y; text-align:left;" for="no_hp" class="col-form-label">No. HP</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $this->session->userdata('no_hp') ?>">
                            </div>
                            <div class="form-group">
                                <label style="display:block; width:x; height:y; text-align:left;" for="nama_wisata" class="col-form-label">Wisata</label>
                                <input type="hidden" id="id_wisata" name="id_wisata" value="<?= $i['id_wisata']; ?>">
                                <input type="text" disabled class="form-control" id="nama_wisata" name="nama_wisata" value="<?= $i['nama']; ?>">
                            </div>
                            <div class="form-group">
                                <label style="display:block; width:x; height:y; text-align:left;" for="gross_amount" class="col-form-label">Harga</label>
                                <input type="text" disabled class="form-control" id="gross_amount" name="gross_amount" value="<?= $i['harga']; ?>">
                            </div>
                            <div class="form-group">
                                <label style="display:block; width:x; height:y; text-align:left;" for="jumlah" class="col-form-label">Jumlah Pesan</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="pay-button" class="btn btn-primary">Pesan</button>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } ?>

<?php endforeach; ?>

<script type="text/javascript">
    $('#pay-button').click(function(event) {
        event.preventDefault();
        $(this).attr("disabled", "disabled");

        var id_wisatawan = $("#id_wisatawan").val();
        var nama = $("#nama").val();
        var alamat = $("#alamat").val();
        var email = $("#email").val();
        var no_hp = $("#no_hp").val();
        var id_wisata = $("#id_wisata").val();
        var nama_wisata = $("#nama_wisata").val();
        var gross_amount = $("#gross_amount").val();
        var jumlah = $("#jumlah").val();

        $.ajax({
            type: 'POST',
            url: '<?= site_url() ?>/home/token',
            data: {
                id_wisatawan: id_wisatawan,
                nama: nama,
                alamat: alamat,
                email: email,
                no_hp: no_hp,
                id_wisata: id_wisata,
                nama_wisata: nama_wisata,
                gross_amount: gross_amount,
                jumlah: jumlah,
            },
            cache: false,

            success: function(data) {
                //location = data;

                console.log('token = ' + data);

                var resultType = document.getElementById('result-type');
                var resultData = document.getElementById('result-data');

                function changeResult(type, data) {
                    $("#result-type").val(type);
                    $("#result-data").val(JSON.stringify(data));
                    //resultType.innerHTML = type;
                    //resultData.innerHTML = JSON.stringify(data);
                }

                snap.pay(data, {

                    onSuccess: function(result) {
                        changeResult('success', result);
                        console.log(result.status_message);
                        console.log(result);
                        $("#payment-form").submit();
                    },
                    onPending: function(result) {
                        changeResult('pending', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    },
                    onError: function(result) {
                        changeResult('error', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    }
                });
            }
        });
    });
</script>