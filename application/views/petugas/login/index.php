<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Petugas &mdash; <?= $title; ?></title>
    <link rel="icon" href="<?= base_url('assets_wisatawan/'); ?>images/favicon.ico" type="image/x-icon">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets_petugas/'); ?>modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets_petugas/'); ?>modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url('assets_petugas/'); ?>modules/bootstrap-social/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('assets_petugas/'); ?>css/style.css">
    <link rel="stylesheet" href="<?= base_url('assets_petugas/'); ?>css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <a href="<?= base_url('/'); ?>"><img src="<?= base_url('assets_wisatawan/'); ?>images/logo.png" alt="" width="225" /></a>
                        </div>
        
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login Petugas</h4>
                            </div>

                            <div class="card-body">
                                <font color="green"><?php echo $this->session->flashdata('pesan'); ?></font>
                                <?php echo form_open('Petugas/login_proses', ''); ?>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                                    <?php echo form_error('email', '<div class="text-danger"><small>', '</small></div>'); ?>
                                    <div class="invalid-feedback">
                                        Please fill in your email
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                        <div class="float-right">
                                            <a href="auth-forgot-password.html" class="text-small">
                                                Forgot Password?
                                            </a>
                                        </div>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                    <?php echo form_error('password', '<div class="text-danger"><small>', '</small></div>'); ?>
                                    <div class="invalid-feedback">
                                        please fill in your password
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                                        <label class="custom-control-label" for="remember-me">Remember Me</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Login
                                    </button>
                                </div>
                                <?php echo form_close(); ?>
                                <!-- <div class="text-center mt-4 mb-3">
                                    <div class="text-job text-muted">Login With Social</div>
                                </div>
                                <div class="row sm-gutters">
                                    <div class="col-6">
                                        <a class="btn btn-block btn-social btn-facebook">
                                            <span class="fab fa-facebook"></span> Facebook
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a class="btn btn-block btn-social btn-twitter">
                                            <span class="fab fa-twitter"></span> Twitter
                                        </a>
                                    </div>
                                </div> -->

                            </div>
                        </div>
                        <div class="mt-5 text-muted text-center">
                            Don't have an account? <a href="<?= base_url('Petugas/register/'); ?>">Create One</a>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; Garut 2021
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= base_url('assets_petugas/'); ?>modules/jquery.min.js"></script>
    <script src="<?= base_url('assets_petugas/'); ?>modules/popper.js"></script>
    <script src="<?= base_url('assets_petugas/'); ?>modules/tooltip.js"></script>
    <script src="<?= base_url('assets_petugas/'); ?>modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets_petugas/'); ?>modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url('assets_petugas/'); ?>modules/moment.min.js"></script>
    <script src="<?= base_url('assets_petugas/'); ?>js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="<?= base_url('assets_petugas/'); ?>js/scripts.js"></script>
    <script src="<?= base_url('assets_petugas/'); ?>js/custom.js"></script>
</body>

</html>