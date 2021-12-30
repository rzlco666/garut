<div id="page_caption" class="hasbg parallax" data-jarallax-video="https://youtu.be/LEzsarKxfZ4">

    <div class="page_title_wrapper">
        <div class="page_title_inner">
            <div class="page_title_content">
                <h1>Event</h1>
                <div class="page_tagline">
                    Event kota Garut terlengkap </div>
            </div>
        </div>
    </div>

</div>

<!-- Begin content -->
<div id="page_content_wrapper" class="hasbg ">
    <form id="tour_search_form" name="tour_search_form" method="get" action="http://themes.themegoods.com/granddemo/tours/tour-2-columns-classic-right-sidebar/">
        <div class="tour_search_wrapper">
            <div class="one_fourth themeborder">
                <input id="keyword" name="keyword" type="text" autocomplete="off" placeholder="Destination, city" />
                <span class="ti-search"></span>
                <div id="autocomplete" class="autocomplete" data-mousedown="false"></div>
            </div>
            <div class="one_fourth themeborder">
                <select id="month" name="month">
                    <option value="">Any Month</option>
                    <option value="january">January</option>
                </select>
                <span class="ti-calendar"></span>
            </div>
            <div class="one_fourth themeborder">
                <select id="sort_by" name="sort_by">
                    <option value="date">Sort By Date</option>
                    <option value="price_low">Price Low to High</option>
                    <option value="price_high">Price High to Low</option>
                    <option value="name">Sort By Name</option>
                    <option value="popular">Sort By Popularity</option>
                    <option value="review">Sort By Review Score</option>
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
                        foreach (array_chunk($event->result(), 1) as $entriesRow) {
                            echo '<div class="element grid classic2_cols">';
                            foreach ($entriesRow as $row) {
                        ?>

                                <div class="one_half gallery2 classic static filterable portfolio_type themeborder">
                                    <a class="tour_image" href="<?= base_url('Home/detail_event/') . $row->id_event; ?>">
                                        <img src="<?= base_url('public/upload/image/event/'); ?><?= $row->thumbnail; ?>" alt="<?= $row->nama; ?>" />

                                        <div class="tour_price ">
                                            Rp. <?= number_format($row->harga, '0', '', '.'); ?></div>
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
                            <li id="grandtour_cat_posts-5" class="widget Grandtour_Cat_Posts">
                                <h2 class="widgettitle"><span>Travel Tips</span></h2>
                                <ul class="posts blog withthumb ">
                                    <li>
                                        <div class="post_circle_thumb">
                                            <a href="#"><img class="alignleft frame post_thumb" src="<?= base_url('assets_wisatawan/'); ?>upload/photo-1469920783271-4ee08a94d42d-150x150.jpg" alt="" /></a>
                                        </div><a href="#">Memorial Day to Someone Told Me to Travel</a>
                                        <div class="post_attribute">December 10, 2016</div>
                                    </li>
                                    <li>
                                        <div class="post_circle_thumb">
                                            <a href="#"><img class="alignleft frame post_thumb" src="<?= base_url('assets_wisatawan/'); ?>upload/pexels-photo-212388-150x150.jpeg" alt="" /></a>
                                        </div><a href="#">7 Tips For Nomads On A Budget Trips</a>
                                        <div class="post_attribute">December 10, 2016</div>
                                    </li>
                                    <li>
                                        <div class="post_circle_thumb">
                                            <a href="#"><img class="alignleft frame post_thumb" src="<?= base_url('assets_wisatawan/'); ?>upload/pexels-photo-24484-150x150.jpg" alt="" /></a>
                                        </div><a href="#">Taking A Travel Blog Victory Lap</a>
                                        <div class="post_attribute">December 10, 2016</div>
                                    </li>
                                </ul>
                            </li>
                            <li id="grandtour_tour_posts-2" class="widget Grandtour_Tour_Posts">
                                <h2 class="widgettitle">Recent Tours</h2>
                                <div class="one gallery1 grid static filterable portfolio_type themeborder" style="background-image:url(<?= base_url('assets_wisatawan/'); ?>upload/pexels-photo-197657-700x466.jpeg);">
                                    <a class="tour_image" href="#"></a>
                                    <div class="portfolio_info_wrapper">
                                        <div class="tour_price ">
                                            $6,000 </div>
                                        <h5>Grand Switzerland</h5>
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

                                <br class="clear" />
                                <div class="one gallery1 grid static filterable portfolio_type themeborder" style="background-image:url(<?= base_url('assets_wisatawan/'); ?>upload/bf1202aedf2c5b6a57d379575619a488-700x466.jpg);">
                                    <a class="tour_image" href="#"></a>
                                    <div class="portfolio_info_wrapper">
                                        <div class="tour_price ">
                                            $5,900 </div>
                                        <h5>Seoul Your Soul</h5>
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

                                <br class="clear" />
                            </li>
                            <li id="grandtour_social_profiles_posts-5" class="widget Grandtour_Social_Profiles_Posts">
                                <h2 class="widgettitle">Connect to Us</h2>
                                <div class="social_wrapper shortcode light small">
                                    <ul>
                                        <li class="facebook"><a target="_blank" title="Facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter"><a target="_blank" title="Twitter" href="https://twitter.com/#"><i class="fa fa-twitter"></i></a></li>
                                        <li class="youtube"><a target="_blank" title="Youtube" href="#"><i class="fa fa-youtube"></i></a></li>
                                        <li class="pinterest"><a target="_blank" title="Pinterest" href="https://pinterest.com/#"><i class="fa fa-pinterest"></i></a></li>
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