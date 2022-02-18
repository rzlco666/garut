    <div class="ppb_wrapper  ">
      <div class="one withsmallpadding ppb_tour_search_youtube parallax withbg " data-jarallax-video="https://www.youtube.com/watch?v=q8WOItIN6Pc" style="text-align:center;height:800px;color:#ffffff;">
        <div class="overlay_background" style="background:#000000;background:rgb(0,0,0,0.3);background:rgba(0,0,0,0.3);"></div>
        <div class="center_wrapper">
          <div class="inner_content">
            <div class="standard_wrapper">
              <h2 class="ppb_title" style="color:#ffffff;">Manajemen Event</h2>
              <div class="page_tagline" style="color:#ffffff;">ITS PKU Muhammadiyah Surakarta</div>
              <form id="tour_search_form" class="tour_search_form" action="<?php echo base_url("Home/pencarian/") ?>">
                <div class="tour_search_wrapper">
                  <div class="one_fourth themeborder">
                    <input id="nama" name="nama" type="text" autocomplete="off" placeholder="Destinasi/Event" />
                    <span class="ti-search"></span>
                    <div id="autocomplete" class="autocomplete" data-mousedown="false"></div>
                  </div>
                  <div class="one_fourth themeborder">
                    <select id="kategori" name="kategori">
                      <option value="0" name="kategori">Event</option>
                      <option value="1" name="kategori">Wisata</option>
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
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="one withsmallpadding ppb_header " style="text-align:center;padding:0px 0 0px 0;margin-top:70px;margin-bottom:50px;">
      <div class="standard_wrapper">
        <div class="page_content_wrapper">
          <div class="inner">
            <div style="margin:auto;width:100%">
              <h2 class="ppb_title">Destinasi Wisata</h2>
              <div class="page_tagline">Destinasi wisata terbaik</div>
            </div>
          </div>
        </div>
      </div>
    </div> -->
    <!-- <div class="ppb_destination_grid one nopadding " style="margin-top:50px;margin-bottom:50px;">
      <div class="page_content_wrapper page_main_content sidebar_content full_width fixed_column">
        <div class="standard_wrapper">
          <div id="1568019739508161166" class="portfolio_filter_wrapper gallery grid portrait four_cols" data-columns="4">
            <?php
            foreach (array_chunk($wisata->result(), 1) as $entriesRow) {
              echo '<div class="element grid baseline classic4_cols">';
              foreach ($entriesRow as $row) {
            ?>

                <div class="one_fourth gallery4 grid static filterable portfolio_type themeborder" style="background-image:url(<?= base_url('public/upload/image/wisata/'); ?><?= $row->thumbnail; ?>);">
                  <a class="tour_image" href="<?= base_url('Home/detail_wisata/') . $row->id_wisata; ?>"></a>
                  <div class="portfolio_info_wrapper">
                    <div class="portfolio_info_content">
                      <h3><?php echo $row->nama; ?></h3>
                    </div>
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
    </div> -->
    <!-- <div class="ppb_tour_classic one nopadding " style="margin-bottom:50px;">
      <div class="page_content_wrapper page_main_content sidebar_content full_width fixed_column">
        <div class="standard_wrapper">
          <div id="1568019739482243752" class="portfolio_filter_wrapper gallery classic three_cols" data-columns="3">
            <?php
            foreach (array_chunk($wisata->result(), 1) as $entriesRow) {
              echo '<div class="element grid classic3_cols">';
              foreach ($entriesRow as $row) {
            ?>
                <div class="one_third gallery3 classic static filterable portfolio_type themeborder">
                  <a class="tour_image" href="<?= base_url('Home/detail_wisata/') . $row->id_wisata; ?>">
                    <img src="<?= base_url('public/upload/image/wisata/'); ?><?= $row->thumbnail; ?>" alt="<?= $row->nama; ?>" />
                    <div class="tour_price ">Rp. <?= number_format($row->harga, '0', '', '.'); ?></div>
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
    </div> -->
    <div class="one withsmallpadding ppb_header " style="text-align:center;padding:0px 0 0px 0;margin-top:70px;margin-bottom:50px;">
      <div class="standard_wrapper">
        <div class="page_content_wrapper">
          <div class="inner">
            <div style="margin:auto;width:100%">
              <h2 class="ppb_title">Event</h2>
              <div class="page_tagline">List Event</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="ppb_tour_classic one nopadding " style="margin-bottom:50px;">
      <div class="page_content_wrapper page_main_content sidebar_content full_width fixed_column">
        <div class="standard_wrapper">
          <div id="1568019739482243752" class="portfolio_filter_wrapper gallery classic three_cols" data-columns="3">
            <?php
            foreach (array_chunk($event->result(), 1) as $entriesRow) {
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
    </div>
    <div class="one withsmallpadding ppb_header " style="text-align:center;padding:0px 0 0px 0;margin-bottom:40px;">
      <div class="standard_wrapper">
        <div class="page_content_wrapper">
          <div class="inner">
            <div style="margin:auto;width:100%">
              <h2 class="ppb_title">Why Choose Us</h2>
              <div class="page_tagline">Here are reasons you should plan trip with us</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="standard_wrapper">
      <div class="one_third withsmallpadding ppb_text" style="text-align:center;padding:0px 0 0px 0;margin-bottom:70px;">
        <div class="standard_wrapper">
          <div class="page_content_wrapper">
            <div class="inner">
              <div style="margin:auto;width:100%">
                <p><img class="alignnone wp-image-3106 size-medium" src="<?= base_url('assets_wisatawan/'); ?>images/Map-Marker-300x300.png" width="150" height="150" alt="" /></p>
                <h4 class="p1"><span class="s1"><b>Lokasi Lengkap</b></span></h4>
                <p>Cari seluruh wisata maupun event dan kunjungi lokasinya</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="standard_wrapper">
      <div class="one_third withsmallpadding ppb_text" style="text-align:center;padding:0px 0 0px 0;margin-bottom:70px;">
        <div class="standard_wrapper">
          <div class="page_content_wrapper">
            <div class="inner">
              <div style="margin:auto;width:100%">
                <p><img class="alignnone wp-image-3107 size-medium" src="<?= base_url('assets_wisatawan/'); ?>images/Worldwide-Location-300x300.png" width="150" height="150" alt="" />
                </p>
                <h4 class="p1"><span class="s1"><b>Layanan Terbaik</b></span></h4>
                <p>Cari wisata maupun event dan jika menemui kesulitan tersedia live chat untuk bertanya</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="standard_wrapper">
      <div class="one_third last withsmallpadding ppb_text" style="text-align:center;padding:0px 0 0px 0;margin-bottom:70px;">
        <div class="standard_wrapper">
          <div class="page_content_wrapper">
            <div class="inner">
              <div style="margin:auto;width:100%">
                <p><img class="alignnone wp-image-3108 size-medium" src="<?= base_url('assets_wisatawan/'); ?>images/Hot-Air-Balloon-300x300.png" width="140" height="140" alt="" /></p>
                <h4 class="p1"><span class="s1"><b>Mudah</b></span></h4>
                <p>Wisata dengan mudah, pesan tiket lewat website</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="parallax " style="background-image: url(<?= base_url('assets_wisatawan/'); ?>images/situ-sukamaju.jpg);height:60vh; "></div>
    </div>


    </div>