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
                                <div class="text-center text-sm-left offset-top-30 tab-height">
                                    <ul class="row-16 list-0 list-custom list-marked list-marked-sm list-marked-secondary">
                                        <li>Lorem ipsum</li>
                                        <li>Consectetur adipiscing</li>
                                        <li>Sed do eiusmod</li>
                                        <li>Tempor incididunt</li>
                                        <li>Sem fringilla</li>
                                        <li>Ut venenatis</li>
                                    </ul>
                                </div>
                                <div class="group-md group-middle"><a class="button button-width-xl-230 button-primary button-pipaluk" href="#">Get in touch</a><a class="button button-black-outline button-md" href="#">Download presentation</a></div>
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
            <div class="gmap_canvas"><iframe width="1920" height="412" id="gmap_canvas" src="https://maps.google.com/maps?q=Awit%20Sinar%20Alam%20Darajat&t=k&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://fmovies-online.net">fmovies</a><br>
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
<?php endforeach; ?>