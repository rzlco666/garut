<div id="page_caption" class="hasbg parallax" data-jarallax-video="https://youtu.be/LEzsarKxfZ4">

    <div class="page_title_wrapper">
        <div class="page_title_inner">
            <div class="page_title_content">
                <h1>Destinasi Wisata</h1>
                <div class="page_tagline">
                    Mulai dari wisata alam hingga perkotaan terlengkap </div>
            </div>
        </div>
    </div>

</div>

<!-- Begin content -->
<div id="page_content_wrapper" class="hasbg ">
    <form id="tour_search_form" name="tour_search_form" action="<?php echo base_url("Home/pencarian/") ?>">
        <div class="tour_search_wrapper">
            <div class="one_fourth themeborder">
                <input id="nama" name="nama" type="text" autocomplete="off" placeholder="Destinasi/Event" />
                <span class="ti-search"></span>
                <div id="autocomplete" class="autocomplete" data-mousedown="false"></div>
            </div>
            <div class="one_fourth themeborder">
                <select id="kategori" name="kategori">
                    <option value="1" name="kategori">Wisata</option>
                    <option value="0" name="kategori">Event</option>
                </select>
                <span class="ti-tag"></span>
            </div>
            <div class="one_fourth themeborder">
                <select id="sort_by" name="sort_by">
                    <option value="0" name="sort_by">Sort By Popularity</option>
                    <option value="1" name="sort_by">Sort By Review Score</option>
                    <option value="2" name="sort_by">Price Low to High</option>
                    <option value="3" name="sort_by">Price High to Low</option>
                </select>
                <span class="ti-exchange-vertical"></span>
            </div>
            <div class="one_fourth last themeborder">
                <input id="tour_search_btn" type="submit" class="button" value="Search" />
            </div>
        </div>
    </form>

    <!-- Begin content -->

    <div class="inner">

        <div class="inner_wrapper nopadding">

            <div id="page_main_content" class="sidebar_content left_sidebar fixed_column">

                <div class="standard_wrapper">

                    <div id="portfolio_filter_wrapper" class="gallery classic two_cols portfolio-content section content clearfix" data-columns="3">

                        <?php
                        foreach (array_chunk($wisata->result(), 1) as $entriesRow) {
                            echo '<div class="element grid classic2_cols">';
                            foreach ($entriesRow as $row) {
                        ?>

                                <div class="one_half gallery2 classic static filterable portfolio_type themeborder">
                                    <a class="tour_image" href="<?= base_url('Home/detail_wisata/') . $row->id_wisata; ?>">
                                        <img src="<?= base_url('public/upload/image/wisata/'); ?><?= $row->thumbnail; ?>" alt="<?= $row->nama; ?>" />

                                        <div class="tour_price ">
                                            Rp. <?= number_format($row->harga, '0', '', '.'); ?></div>
                                    </a>

                                    <div class="portfolio_info_wrapper">
                                        <a class="tour_link" href="<?= base_url('Home/detail_wisata/') . $row->id_wisata; ?>">
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
                                                <div class="tour_attribute_rating_count">
                                                    <?= $row->jumlah; ?>&nbsp; reviews </div>
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
                    <br class="clear" />

                </div>
            </div>

            <div class="sidebar_wrapper left_sidebar">
                <div class="sidebar">

                    <div class="content">

                        <ul class="sidebar_widget">
                            <li id="grandtour_tour_posts-2" class="widget Grandtour_Tour_Posts">
                                <h2 class="widgettitle">Event Terbaru</h2>
                                <?php
                                foreach (array_chunk($event->result(), 1) as $entriesRow) {
                                    echo '<div>';
                                    foreach ($entriesRow as $row) {
                                ?>
                                        <div class="one gallery1 grid static filterable portfolio_type themeborder" style="background-image:url(<?= base_url('public/upload/image/event/'); ?><?= $row->thumbnail; ?>);">
                                            <a class="tour_image" href="#"></a>
                                            <div class="portfolio_info_wrapper">
                                                <div class="tour_price ">
                                                    Rp. <?= number_format($row->harga, '0', '', '.'); ?></div>
                                                <h5><?= $row->nama; ?></h5>
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
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <br class="clear" />
                                <?php
                                    }
                                    echo '</div>';
                                }
                                ?>
                            </li>
                            <li id="grandtour_social_profiles_posts-5" class="widget Grandtour_Social_Profiles_Posts">
                                <h2 class="widgettitle">Connect to Us</h2>
                                <div class="social_wrapper shortcode light small">
                                    <ul>
                                        <li class="facebook"><a target="_blank" title="Facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter"><a target="_blank" title="Twitter" href="https://twitter.com/#"><i class="fa fa-twitter"></i></a></li>
                                        <li class="youtube"><a target="_blank" title="Youtube" href="#"><i class="fa fa-youtube"></i></a></li>
                                        <li class="instagram"><a target="_blank" title="Instagram" href="https://instagram.com/theplanetd"><i class="fa fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>