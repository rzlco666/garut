<div id="page_caption" class="hasbg parallax" style="background-image:url(<?= base_url('assets_wisatawan/'); ?>images/situ-sukamaju.jpg);">

    <div class="page_title_wrapper">
        <div class="page_title_inner">
            <div class="page_title_content">
                <h1>Profile</h1>
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
                    <?php
                    if (!empty($this->session->flashdata('message'))) {
                    ?>
                        <div id="15689862881347657664" class="alert_box success"><i class="fa fa-flag alert_icon"></i>
                            <div class="alert_box_msg"><?php echo $this->session->flashdata('message'); ?></div><a href="#" class="close_alert" data-target="15689862881347657664"><i class="fa fa-times"></i></a>
                        </div>
                        <br />
                    <?php
                    }
                    ?>
                    <?php
                    if (!empty($this->session->flashdata('error'))) {
                    ?>
                        <div id="15689862881137689461" class="alert_box error"><i class="fa fa-exclamation-circle alert_icon"></i>
                            <div class="alert_box_msg"><?php echo $this->session->flashdata('error'); ?></div><a href="#" class="close_alert" data-target="15689862881137689461"><i class="fa fa-times"></i></a>
                        </div>
                        <br />
                    <?php
                    }
                    ?>

                    <?php foreach ($profile as $i) : ?>
                        <div id="respond" class="comment-respond">
                            <h3 id="reply-title" class="comment-reply-title">Profile <small><a rel="nofollow" id="cancel-comment-reply-link" href="#" style="display:none;">Cancel reply</a></small></h3>
                            <form action="#" method="post" id="commentform" class="comment-form">
                                <p class="comment-form-comment">
                                    <label for="comment">Nama Lengkap</label>
                                    <input readonly id="author" name="author" type="text" value="<?= $i['nama']; ?>" size="45" maxlength="245" required='required' />
                                </p>
                                <p class="comment-form-author">
                                    <label for="author">Username</label>
                                    <input readonly id="author" name="author" type="text" value="<?= $i['username']; ?>" size="30" maxlength="245" required='required' />
                                </p>
                                <p class="comment-form-email">
                                    <label for="email">Email</label>
                                    <input readonly id="email" name="email" type="text" value="<?= $i['email']; ?>" size="30" maxlength="100" aria-describedby="email-notes" required='required' />
                                </p>
                                <p class="comment-form-url">
                                    <label for="url">No HP.</label>
                                    <input readonly id="url" name="url" type="text" value="<?= $i['no_hp']; ?>" size="30" maxlength="200" />
                                </p>
                                <p class="comment-form-comment">
                                    <label for="comment">Alamat</label>
                                    <textarea readonly id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"><?= $i['alamat']; ?></textarea>
                                </p>
                                <p class="form-submit">
                                    <button class="button small left" style="background-color:#4ec380 !important;color:#ffffff !important;border:1px solid #4ec380 !important;margin-right:10px;margin-bottom:10px;" type="button" data-toggle="modal" data-target="#ubahPassword">Ubah Password</button>
                                    <button class="button small left" style="background-color:#cb5f54 !important;color:#ffffff !important;border:1px solid #cb5f54 !important;margin-right:10px;margin-bottom:10px;" type="button" data-toggle="modal" data-target="#editProfile">Edit Profile</button>
                                </p>
                            </form>
                        </div><!-- #respond -->
                    <?php endforeach; ?>
                    <br class="clear" />

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

<?php foreach ($profile as $i) { ?>
    <div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="editProfile" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfile">Edit Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" action="<?php echo base_url('Home/update_profile'); ?>" method="post" id="commentform" class="comment-form">
                        <p class="comment-form-comment">
                            <label for="nama">Nama Lengkap</label>
                            <input type="hidden" name="id_wisatawan" id="id_wisatawan" value="<?= $i['id_wisatawan']; ?>">
                            <input id="nama" name="nama" type="text" value="<?= $i['nama']; ?>" size="45" maxlength="245" required='required' />
                        </p>
                        <p class="comment-form-comment">
                            <label for="username">Username</label>
                            <input id="username" name="username" type="text" value="<?= $i['username']; ?>" size="45" maxlength="245" required='required' />
                        </p>
                        <p class="comment-form-comment">
                            <label for="email">Email</label>
                            <input id="email" name="email" type="text" value="<?= $i['email']; ?>" size="45" maxlength="100" aria-describedby="email-notes" required='required' />
                        </p>
                        <p class="comment-form-comment">
                            <label for="no_hp">No HP.</label>
                            <input id="no_hp" name="no_hp" type="text" value="<?= $i['no_hp']; ?>" size="45" maxlength="200" />
                        </p>
                        <p class="comment-form-comment">
                            <label for="alamat">Alamat</label>
                            <textarea id="alamat" name="alamat" cols="45" rows="4" maxlength="65525" required="required"><?= $i['alamat']; ?></textarea>
                        </p>
                        <p class="comment-form-comment">
                            <label for="foto">Foto</label>
                            <input type="file" name="foto" id="foto">
                        </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="button small left" style="background-color:#97a2a2 !important;color:#ffffff !important;border:1px solid #97a2a2 !important;margin-right:10px;margin-bottom:10px;" data-dismiss="modal">Close</button>
                    <button type="submit" class="button small left" style="background-color:#cb5f54 !important;color:#ffffff !important;border:1px solid #cb5f54 !important;margin-right:10px;margin-bottom:10px;">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ubahPassword" tabindex="-1" role="dialog" aria-labelledby="ubahPassword" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ubahPassword">Ubah Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" action="<?php echo base_url('Home/ubah_password'); ?>" method="post" id="commentform" class="comment-form">
                        <p class="comment-form-comment">
                            <label for="password">Password Baru</label>
                            <input type="hidden" name="id_wisatawan" id="id_wisatawan" value="<?= $i['id_wisatawan']; ?>">
                            <input type="password" class="form-control" name="password" id="password" require>
                        </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="button small left" style="background-color:#97a2a2 !important;color:#ffffff !important;border:1px solid #97a2a2 !important;margin-right:10px;margin-bottom:10px;" data-dismiss="modal">Close</button>
                    <button type="submit" class="button small left" style="background-color:#cb5f54 !important;color:#ffffff !important;border:1px solid #cb5f54 !important;margin-right:10px;margin-bottom:10px;">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>