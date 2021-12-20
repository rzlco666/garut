<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-zQtZZRkH9k_rq429"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

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
            <h3>What People Say</h3>
            <!-- Owl Carousel-->
            <div class="owl-carousel owl-modern" data-items="1" data-stage-padding="15" data-margin="30" data-dots="true" data-animation-in="fadeIn" data-animation-out="fadeOut" data-autoplay="true">
                <!-- Quote Lisa-->
                <article class="quote-lisa">
                    <div class="quote-lisa-body"><a class="quote-lisa-figure" href="#"><img class="img-circles" src="images/user-16-100x100.jpg" alt="" width="100" height="100" /></a>
                        <div class="quote-lisa-text">
                            <p class="q">Pharetra vel turpis nunc eget lorem dolor sed viverra ipsum. Diam phasellus vestibulum lorem sed risus ultricies. Aenean et tortor at risus viverra adipiscing. Aliquet enim tortor at auctor urna. Tortor aliquam nulla facilisi cras fermentum. Malesuada pellentesque elit eget gravida cum sociis natoque.</p>
                        </div>
                        <h5 class="quote-lisa-cite"><a href="#">Catherine Williams</a></h5>
                        <p class="quote-lisa-status">Regular Client</p>
                    </div>
                </article>
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