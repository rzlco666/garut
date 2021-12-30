<div id="page_caption" class="hasbg parallax" style="background-image:url(<?= base_url('assets_wisatawan/'); ?>images/situ-sukamaju.jpg);">

    <div class="page_title_wrapper">
        <div class="page_title_inner">
            <div class="page_title_content">
                <h1>Login</h1>
                <div class="page_tagline">
                    Silahkan login untuk masuk ke aplikasi </div>
            </div>
        </div>
    </div>

</div>

<div class="ppb_wrapper hasbg ">
    <div class="one withsmallpadding ppb_text" style="text-align:left;padding:0px 0 0px 0;margin-bottom:60px;margin-top:20px;">
        <div class="standard_wrapper">
            <div class="page_content_wrapper">
                <div class="inner">
                    <div style="margin:auto;width:60%">
                        <div role="form" class="wpcf7" id="wpcf7-f3075-o1" lang="en-US" dir="ltr">
                            <div class="screen-reader-response"></div>
                            <font color="green"><?php echo $this->session->flashdata('pesan'); ?></font>
                            <form action='<?= base_url('Home/login_proses'); ?>' method="post" class="wpcf7-form" novalidate="novalidate">
                                <div style="display: none;">
                                    <input type="hidden" name="_wpcf7" value="3075" />
                                    <input type="hidden" name="_wpcf7_version" value="5.0.4" />
                                    <input type="hidden" name="_wpcf7_locale" value="en_US" />
                                    <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f3075-o1" />
                                    <input type="hidden" name="_wpcf7_container_post" value="0" />
                                </div>
                                <p>
                                    <label> Email Address
                                        <br />
                                        <span class="wpcf7-form-control-wrap your-email"><input type="email" name="email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="sample@mail.com" /></span> </label>
                                    <?php echo form_error('email', '<div class="text-danger"><small>', '</small></div>'); ?>
                                </p>
                                <p>
                                    <label> Password
                                        <br />
                                        <span class="wpcf7-form-control-wrap"><input type="password" name="password" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Password" /></span> </label>
                                    <?php echo form_error('password', '<div class="text-danger"><small>', '</small></div>'); ?>
                                </p>
                                <p>
                                    <input type="submit" value="Login" class="wpcf7-form-control wpcf7-submit" />
                                </p>
                                <div class="wpcf7-response-output wpcf7-display-none"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>