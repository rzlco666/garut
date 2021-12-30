<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-zQtZZRkH9k_rq429"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

<?php foreach ($event as $i) : ?>
    <div id="page_caption" class="hasbg parallax" style="background-image:url(<?= base_url('public/upload/image/event/header/'); ?><?= $i['header']; ?>);">
        <div class="single_tour_header_content">
            <div class="standard_wrapper">
                <a href="<?= base_url('public/upload/image/event/header/'); ?><?= $i['header']; ?>" id="single_tour_gallery_open" class="button fancy-gallery"><span class="ti-camera"></span>Lihat Foto</a>
                <div style="display:none;">
                    <a id="single_tour_gallery_image1" href="<?= base_url('public/upload/image/event/event1/'); ?><?= $i['event1']; ?>" title="<?= $i['nama']; ?>" class="fancy-gallery"></a>
                    <a id="single_tour_gallery_image2" href="<?= base_url('public/upload/image/event/event2/'); ?><?= $i['event2']; ?>" title="<?= $i['nama']; ?>" class="fancy-gallery"></a>
                    <a id="single_tour_gallery_image3" href="<?= base_url('public/upload/image/event/event3/'); ?><?= $i['event3']; ?>" title="<?= $i['nama']; ?>" class="fancy-gallery"></a>
                    <a id="single_tour_gallery_image4" href="<?= base_url('public/upload/image/event/'); ?><?= $i['thumbnail']; ?>" title="<?= $i['nama']; ?>" class="fancy-gallery"></a>
                </div>

                <a href="#video_review168" id="single_tour_video_preview_open" class="button" data-type="inline"><span class="ti-control-play"></span>Video Preview</a>

                <div id="video_review168" class="tour_video_preview_wrapper" style="display:none;">
                    <iframe width="1280" height="720" src="https://www.youtube.com/embed/CwA0w3CFhjU" frameborder="0" allowfullscreen></iframe>
                </div>

                <div class="single_tour_header_price">
                    <div class="single_tour_price">
                        Rp. <?= number_format($i['harga'], '0', '', '.'); ?>
                    </div>
                    <div class="single_tour_per_person">
                        Per Orang </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Begin content -->
    <div id="page_content_wrapper" class="hasbg ">
        <div class="inner">

            <!-- Begin main content -->
            <div class="inner_wrapper">

                <div class="sidebar_wrapper">

                    <div class="sidebar_top"></div>

                    <div class="sidebar">

                        <div class="content">

                            <div class="single_tour_header_price">
                                <div class="single_tour_price">
                                    Rp. <?= number_format($i['harga'], '0', '', '.'); ?>
                                </div>
                                <div class="single_tour_per_person">
                                    Per Orang </div>
                            </div>

                            <?php
                            if ($this->session->userdata('is_login') == FALSE) {
                            ?>
                                <div class="single_tour_booking_wrapper themeborder contact_form7">
                                    <div role="form" class="wpcf7" id="wpcf7-f142-o1" lang="en-US" dir="ltr">
                                        <div class="screen-reader-response"></div>
                                        <p>Sebelum melakukan pemesanan tiket, silahkan login terlebih dahulu <a href="<?= base_url('home/login'); ?>">disini</a>.</p>
                                    </div>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="single_tour_booking_wrapper themeborder contact_form7">
                                    <div role="form" class="wpcf7" id="wpcf7-f142-o1" lang="en-US" dir="ltr">
                                        <div class="screen-reader-response"></div>
                                        <form id="payment-form" method="post" action="<?= site_url() ?>home/finish" class="wpcf7-form" novalidate="novalidate">
                                            <input type="hidden" name="result_type" id="result-type" value="">
                                            <input type="hidden" name="result_data" id="result-data" value="">
                                            <p>
                                                <label> Nama
                                                    <br />
                                                    <span class="wpcf7-form-control-wrap your-name">
                                                        <input type="hidden" id="id_wisatawan" name="id_wisatawan" value="<?php echo $this->session->userdata('id_wisatawan') ?>">
                                                        <input type="text" id="nama" name="nama" value="<?php echo $this->session->userdata('nama') ?>" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="John Doe" />
                                                    </span>
                                                </label>
                                            </p>
                                            <p>
                                                <label> Alamat
                                                    <br />
                                                    <span class="wpcf7-form-control-wrap your-name">
                                                        <input type="text" id="alamat" name="alamat" value="<?php echo $this->session->userdata('alamat') ?>" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Sukamaju, Kersamanah, Garut" />
                                                    </span>
                                                </label>
                                            </p>
                                            <p>
                                                <label> Email Address
                                                    <br />
                                                    <span class="wpcf7-form-control-wrap your-email">
                                                        <input type="email" id="email" name="email" value="<?php echo $this->session->userdata('email') ?>" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="sample@mail.com" />
                                                    </span>
                                                </label>
                                            </p>
                                            <p>
                                                <label> No HP
                                                    <br />
                                                    <span class="wpcf7-form-control-wrap tel-729">
                                                        <input type="tel" id="no_hp" name="no_hp" value="<?php echo $this->session->userdata('no_hp') ?>" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel" aria-required="true" aria-invalid="false" />
                                                    </span>
                                                </label>
                                            </p>
                                            <p>
                                                <label> Jumlah Pesan Tiket
                                                    <br />
                                                    <span class="wpcf7-form-control-wrap text-237">
                                                        <input type="hidden" id="id_event" name="id_event" value="<?= $i['id_event']; ?>">
                                                        <input type="hidden" id="nama_event" name="nama_event" value="<?= $i['nama']; ?>">
                                                        <input type="hidden" id="gross_amount" name="gross_amount" value="<?= $i['harga']; ?>">
                                                        <input type="number" id="jumlah" name="jumlah" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" />
                                                    </span>
                                                </label>
                                            </p>
                                            <p>
                                                <input type="submit" id="pay-button" value="Beli Tiket" class="wpcf7-form-control wpcf7-submit" />
                                            </p>
                                            <div class="wpcf7-response-output wpcf7-display-none"></div>
                                        </form>
                                    </div>
                                </div>
                            <?php
                            } ?>

                            <a id="single_tour_share_button" href="javascript:;" class="button ghost themeborder"><span class="ti-email"></span>Share this tour</a>

                            <ul class="sidebar_widget">
                                <li id="text-3" class="widget widget_text">
                                    <h2 class="widgettitle">For More Informations</h2>
                                    <div class="textwidget"><span class="ti-mobile" style="margin-right:10px;"></span>1-567-124-44227
                                        <br />
                                        <span class="ti-alarm-clock" style="margin-right:10px;"></span>Mon - Sat 8.00 - 18.00
                                    </div>
                                </li>
                                <!-- <li id="grandtour_tour_posts-11" class="widget Grandtour_Tour_Posts">
                                    <h2 class="widgettitle"></h2>
                                    <div class="one gallery1 grid static filterable portfolio_type themeborder" style="background-image:url(<?= base_url('assets_wisatawan/'); ?>upload/pexels-photo-197657-700x466.jpeg);">
                                        <a class="tour_image" href="#"></a>
                                        <div class="portfolio_info_wrapper">
                                            <div class="tour_price ">
                                                $6,000 </div>
                                            <h5>Swiss Alps Trip</h5>
                                            <div class="tour_attribute_wrapper">
                                                <div class="tour_attribute_rating">
                                                    <div class="br-theme-fontawesome-stars-o">
                                                        <div class="br-widget">
                                                            <a href="javascript:;" class="br-selected"></a>
                                                            <a href="javascript:;" class="br-selected"></a>
                                                            <a href="javascript:;" class="br-selected"></a>
                                                            <a href="javascript:;" class="br-selected"></a>
                                                            <a href="javascript:;"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br class="clear" /> -->
                                </li>
                            </ul>

                            <div class="single_tour_users_online_wrapper themeborder">
                                <div class="single_tour_users_online_icon">
                                    <span class="ti-info-alt"></span>
                                </div>
                                <div class="single_tour_users_online_content">
                                    <strong>131</strong> traveler(s) are considering our tours right now!
                                </div>
                            </div>

                        </div>

                    </div>
                    <br class="clear" />

                    <div class="sidebar_bottom"></div>
                </div>
                <div class="sidebar_content ">

                    <h1><?= $i['nama']; ?></h1>
                    <div class="single_tour_attribute_wrapper themeborder ">
                        <div class="one_fourth">
                            <div class="tour_attribute_icon ti-time"></div>
                            <div class="tour_attribute_content">
                                <?= $i['durasi']; ?>&nbsp;hari </div>
                        </div>

                        <div class="one_fourth">
                            <div class="tour_attribute_icon ti-id-badge"></div>
                            <div class="tour_attribute_content">
                                Umum </div>
                        </div>

                        <div class="one_fourth">
                            <div class="tour_attribute_icon ti-calendar"></div>
                            <div class="tour_attribute_content">
                                <?= $i['tanggal']; ?> </div>
                        </div>

                        <div class="one_fourth last">
                            <div class="tour_attribute_icon ti-user"></div>
                            <div class="tour_attribute_content">
                                Tersedia <?= $i['slot']; ?> Orang</div>
                        </div>
                    </div>
                    <br class="clear" />
                    <div class="single_tour_content">
                        <p class="p1"><?= $i['deskripsi']; ?></p>
                        <div id="attachment_48" style="width: 1034px" class="wp-caption alignnone"><img class="wp-image-48 size-large" src="<?= base_url('public/upload/image/event/header/'); ?><?= $i['header']; ?>" width="1024" />
                            <p class="wp-caption-text">Foto Event <?= $i['nama']; ?>.</p>
                        </div>
                        <div id="attachment_48" style="width: 1034px" class="wp-caption alignnone"><img class="wp-image-48 size-large" src="<?= base_url('public/upload/image/event/event1/'); ?><?= $i['event1']; ?>" width="1024" />
                            <p class="wp-caption-text">Foto Event <?= $i['nama']; ?>.</p>
                        </div>
                        <div id="attachment_48" style="width: 1034px" class="wp-caption alignnone"><img class="wp-image-48 size-large" src="<?= base_url('public/upload/image/event/event2/'); ?><?= $i['event2']; ?>" width="1024" />
                            <p class="wp-caption-text">Foto Event <?= $i['nama']; ?>.</p>
                        </div>
                        <div id="attachment_48" style="width: 1034px" class="wp-caption alignnone"><img class="wp-image-48 size-large" src="<?= base_url('public/upload/image/event/event3/'); ?><?= $i['event3']; ?>" width="1024" />
                            <p class="wp-caption-text">Foto Event <?= $i['nama']; ?>.</p>
                        </div>
                    </div>

                    <ul class="single_tour_departure_wrapper themeborder">
                        <li>
                            <div class="single_tour_departure_title">Nama Event</div>
                            <div class="single_tour_departure_content"><?= $i['nama']; ?></div>
                        </li>

                        <li>
                            <div class="single_tour_departure_title">Tanggal Event</div>
                            <div class="single_tour_departure_content"><?= $i['tanggal']; ?></div>
                        </li>

                        <li>
                            <div class="single_tour_departure_title">Durasi Event</div>
                            <div class="single_tour_departure_content"><?= $i['durasi']; ?> hari</div>
                        </li>

                        <li>
                            <div class="single_tour_departure_title">Slot Event</div>
                            <div class="single_tour_departure_content"><?= $i['slot']; ?> orang</div>
                        </li>

                        <li>
                            <div class="single_tour_departure_title">Harga Tiket</div>
                            <div class="single_tour_departure_content">Rp. <?= number_format($i['harga'], '0', '', '.'); ?> /orang</div>
                        </li>

                        <li>
                            <div class="single_tour_departure_title">Lokasi</div>
                            <div class="single_tour_departure_content"><?= $i['lokasi']; ?></div>
                        </li>

                        <li>
                            <div class="single_tour_departure_title">Maps</div>
                            <div class="single_tour_departure_content">

                                <div class="map_shortcode_wrapper" id="map1568200871211588506" style="width:1000px;height:300px">
                                    <iframe width="500px" height="300px" id="gmap_canvas" src="<?= $i['maps']; ?>" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <div class="fullwidth_comment_wrapper sidebar">

                        <?php foreach ($jumlah as $u) : ?>
                            <h3 class="comment_title"><?= $u['jumlah']; ?> Ulasan</span></h3>
                        <?php endforeach; ?>
                        <div class="avg_comment_rating_wrapper themeborder">
                            <div class="comment_rating_wrapper">
                                <div class="comment_rating_label">Rating</div>
                                <div class="br-theme-fontawesome-stars-o">
                                    <div class="br-widget">
                                        <?php if (is_array($ulasan) && count($ulasan) > 0) { ?>
                                            <?php foreach ($ratarata as $u) : ?>
                                                <?php
                                                if ($u['rating'] == 1) {
                                                    echo '<a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;"></a>
                                                        <a href="javascript:;"></a>
                                                        <a href="javascript:;"></a>
                                                        <a href="javascript:;"></a>';
                                                } elseif ($u['rating'] == 2) {
                                                    echo '<a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;"></a>
                                                        <a href="javascript:;"></a>
                                                        <a href="javascript:;"></a>';
                                                } elseif ($u['rating'] == 3) {
                                                    echo '<a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;"></a>
                                                        <a href="javascript:;"></a>';
                                                } elseif ($u['rating'] == 4) {
                                                    echo '<a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;"></a>';
                                                } elseif ($u['rating'] == 5) {
                                                    echo '<a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;" class="br-selected"></a>';
                                                }
                                                ?>
                                            <?php endforeach; ?>
                                        <?php } else { ?>
                                            <a href="javascript:;"></a>
                                            <a href="javascript:;"></a>
                                            <a href="javascript:;"></a>
                                            <a href="javascript:;"></a>
                                            <a href="javascript:;"></a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if (is_array($ulasan) && count($ulasan) > 0) { ?>
                            <?php foreach ($ulasan as $u) : ?>
                                <div>
                                    <a name="comments"></a>
                                    <div class="comment" id="comment-20">
                                        <div class="gravatar">
                                            <img src="<?= base_url('public/upload/image/wisatawan/'); ?><?= $u['foto']; ?>" width="60" height="60" alt="<?= $u['nama']; ?>" class="avatar avatar-60 wp-user-avatar wp-user-avatar-60 alignnone photo" />
                                        </div>

                                        <div class="right ">

                                            <h7><?= $u['nama']; ?></h7>

                                            <div class="comment_date"><?= $u['tanggal']; ?></div>
                                            <div class="comment_text">
                                                <p><?= $u['feedback']; ?></p>
                                                <div class="comment_rating_wrapper">
                                                    <div class="comment_rating_label">Rating</div>
                                                    <div class="br-theme-fontawesome-stars-o">
                                                        <div class="br-widget">
                                                            <?php
                                                            if ($u['rating'] == 1) {
                                                                echo '<a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;"></a>
                                                        <a href="javascript:;"></a>
                                                        <a href="javascript:;"></a>
                                                        <a href="javascript:;"></a>';
                                                            } elseif ($u['rating'] == 2) {
                                                                echo '<a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;"></a>
                                                        <a href="javascript:;"></a>
                                                        <a href="javascript:;"></a>';
                                                            } elseif ($u['rating'] == 3) {
                                                                echo '<a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;"></a>
                                                        <a href="javascript:;"></a>';
                                                            } elseif ($u['rating'] == 4) {
                                                                echo '<a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;"></a>';
                                                            } elseif ($u['rating'] == 5) {
                                                                echo '<a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;" class="br-selected"></a>';
                                                            } elseif ($u['rating'] == 0) {
                                                                echo '<a href="javascript:;"></a>
                                                    <a href="javascript:;"></a>
                                                    <a href="javascript:;"></a>
                                                    <a href="javascript:;"></a>
                                                    <a href="javascript:;"></a>';
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;  ?>
                            <?php } else { ?>
                                <div>
                                    <a name="comments"></a>
                                    <div class="comment" id="comment-20">
                                        <div class="gravatar">
                                            <img src="" class="avatar avatar-60 wp-user-avatar wp-user-avatar-60 alignnone photo" />
                                        </div>

                                        <div class="right ">

                                            <h7>&nbsp;</h7>

                                            <div class="comment_date">&nbsp;</div>
                                            <div class="comment_text">
                                                <p>&nbsp;</p>
                                                <div class="comment_rating_wrapper">
                                                    <div class="comment_rating_label">&nbsp;</div>
                                                    <div class="br-theme-fontawesome-stars-o">
                                                        <div class="br-widget">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                <br class="clear" />
                                </li>
                                <!-- #comment-## -->

                                </div>

                                <!-- End of thread -->
                                <div style="height:10px"></div>

                                </div>

                    </div>
                </div>
            </div>
            <!-- End main content -->

            <br class="clear" />
            <div class="tour_related">
                <h3 class="sub_title">Event Lainnya</h3>
                <div id="portfolio_filter_wrapper" class="gallery classic three_cols portfolio-content section content clearfix" data-columns="3">
                    <?php
                    foreach (array_chunk($lainnya->result(), 1) as $entriesRow) {
                        echo '<div class="element grid classic3_cols">';
                        foreach ($entriesRow as $row) {
                    ?>
                            <div class="one_third gallery3 classic static filterable portfolio_type themeborder">
                                <a class="tour_image" href="<?= base_url('Home/detail_event/') . $row->id_event; ?>">
                                    <img src="<?= base_url('public/upload/image/event/'); ?><?= $row->thumbnail; ?>" alt="<?= $row->nama; ?>" />
                                    <div class="tour_price ">Rp. <?= number_format($row->harga, '0', '', '.'); ?></div>
                                </a>
                                <div class="portfolio_info_wrapper">
                                    <a class="tour_link" href="<?= base_url('Home/detail_event/') . $row->id_event; ?>">
                                        <h4><?= $row->nama; ?></h4>
                                    </a>
                                    <div class="tour_excerpt">
                                        <p><?= $row->lokasi; ?></p>
                                    </div>
                                    <div class="tour_attribute_wrapper">
                                        <div class="tour_attribute_rating">
                                            <div class="br-theme-fontawesome-stars-o">
                                                <div class="br-widget">
                                                    <?php
                                                    if ($row->rating == 1) {
                                                        echo '<a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;"></a>
                                                        <a href="javascript:;"></a>
                                                        <a href="javascript:;"></a>
                                                        <a href="javascript:;"></a>';
                                                    } elseif ($row->rating == 2) {
                                                        echo '<a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;"></a>
                                                        <a href="javascript:;"></a>
                                                        <a href="javascript:;"></a>';
                                                    } elseif ($row->rating == 3) {
                                                        echo '<a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;"></a>
                                                        <a href="javascript:;"></a>';
                                                    } elseif ($row->rating == 4) {
                                                        echo '<a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;"></a>';
                                                    } elseif ($row->rating == 5) {
                                                        echo '<a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;" class="br-selected"></a>
                                                        <a href="javascript:;" class="br-selected"></a>';
                                                    } elseif ($row->rating == 0) {
                                                        echo '<a href="javascript:;"></a>
                                                        <a href="javascript:;"></a>
                                                        <a href="javascript:;"></a>
                                                        <a href="javascript:;"></a>
                                                        <a href="javascript:;"></a>';
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="tour_attribute_rating_count"><?= $row->jumlah; ?>&nbsp;reviews</div>
                                        </div>
                                    </div>
                                    <br class="clear" />
                                </div>
                            </div>
                    <?php
                        }
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>

        </div>
        <br class="clear" />
    </div>
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
        var id_event = $("#id_event").val();
        var nama_event = $("#nama_event").val();
        var gross_amount = $("#gross_amount").val();
        var jumlah = $("#jumlah").val();

        $.ajax({
            type: 'POST',
            url: '<?= site_url() ?>/Home/token',
            data: {
                id_wisatawan: id_wisatawan,
                nama: nama,
                alamat: alamat,
                email: email,
                no_hp: no_hp,
                id_event: id_event,
                nama_event: nama_event,
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