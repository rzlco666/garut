<div id="page_caption" class="hasbg parallax" style="background-image:url(<?= base_url('assets_wisatawan/'); ?>images/situ-sukamaju.jpg);">

    <div class="page_title_wrapper">
        <div class="page_title_inner">
            <div class="page_title_content">
                <h1>Transaksi Wisata</h1>
            </div>
        </div>
    </div>

</div>

<!-- Begin content -->
<div id="page_content_wrapper" class="hasbg ">

    <!-- Begin content -->

    <div class="inner">

        <div class="inner_wrapper nopadding">

            <div id="page_main_content" class="sidebar_content left_sidebar fixed_column">

                <div class="standard_wrapper">
                    <?php foreach ($ulasan as $d) { ?>
                        <div id="respond" class="comment-respond">
                            <h3 id="reply-title" class="comment-reply-title">Ubah Ulasan <small><a rel="nofollow" id="cancel-comment-reply-link" href="#" style="display:none;">Cancel reply</a></small></h3>
                            <form enctype="multipart/form-data" action="<?php echo base_url('Home/update_ulasan'); ?>" method="post" id="commentform" class="comment-form">
                                <p class="comment-form-comment">
                                    <label for="comment">Feedback</label>
                                    <input type="hidden" value="<?= $d->id_rating_wisata; ?>" name="id_rating_wisata" id="id_rating_wisata">
                                    <textarea id="comment" name="feedback" cols="45" rows="8" maxlength="65525" required="required"><?= $d->feedback; ?></textarea>
                                </p>
                                <p class="comment-form-rating">
                                    <label for="accomodation_rating">Rating</label>
                                    <span class="commentratingbox">
                                        <select id="accomodation_rating" name="rating">
                                            <option value="1" name="rating">1</option>
                                            <option value="2" name="rating">2</option>
                                            <option value="3" name="rating">3</option>
                                            <option value="4" name="rating">4</option>
                                            <option value="5" name="rating">5</option>
                                        </select>
                                </p>
                                <p class="form-submit">
                                    <input name="submit" type="submit" id="submit" class="submit" value="Post Ulasan" />
                                </p>
                            </form>
                        </div><!-- #respond -->
                    <?php } ?>
                </div>
            </div>

            <div class="sidebar_wrapper left_sidebar">
                <div class="sidebar">

                    <div class="content">
                        <?php foreach ($profile as $i) : ?>
                            <div class="teaser_wrapper" style="background-color:#f0f0f0;padding:15px;"><img src="<?= base_url('public/upload/image/wisatawan/'); ?><?= $i['foto']; ?>" alt="" />
                                <div class="teaser_content_wrapper">
                                    <h5><?= $i['nama']; ?></h5>
                                    <div class="teaser_content">
                                        <span class="icon fa fa-user" href="#"></span>&nbsp;<?= $i['username']; ?></br>
                                        <span class="icon fa fa-envelope" href="#"></span>&nbsp;<?= $i['email']; ?></br>
                                        <span class="icon fa fa-phone" href="#"></span>&nbsp;<?= $i['no_hp']; ?></br>
                                        <span class="icon fa fa-home" href="#"></span>&nbsp;<?= $i['alamat']; ?></br>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>