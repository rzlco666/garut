<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Petugas &mdash; <?= $title; ?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url('assets_petugas/'); ?>modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url('assets_petugas/'); ?>modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url('assets_petugas/'); ?>modules/jquery-selectric/selectric.css">

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
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
            <img src="<?= base_url('assets/'); ?>images/logo.png" alt="" width="225" />
            </div>

            <div class="card card-primary">
              <div class="card-header">
                <h4>Register Petugas</h4>
              </div>

              <div class="card-body">
                <font color="green"><?php echo $this->session->flashdata('pesan'); ?></font>
                <?php echo form_open('petugas/register_proses', ''); ?>
                <div class="form-group">
                  <label for="nama">Nama Lengkap</label>
                  <input id="nama" type="text" class="form-control" name="nama" autofocus>
                  <div class="invalid-feedback">
                  </div>
                </div>

                <div class="form-group">
                  <label for="username">Username</label>
                  <input id="username" type="text" class="form-control" name="username" autofocus>
                  <?php echo form_error('username', '<div class="text-danger"><small>', '</small></div>');?>
                  <div class="invalid-feedback">
                  </div>
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input id="email" type="email" class="form-control" name="email">
                  <?php echo form_error('email', '<div class="text-danger"><small>', '</small></div>');?>
                  <div class="invalid-feedback">
                  </div>
                </div>

                <div class="form-group">
                  <label for="password" class="d-block">Password</label>
                  <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                  <?php echo form_error('password', '<div class="text-danger"><small>', '</small></div>');?>
                  <div id="pwindicator" class="pwindicator">
                    <div class="bar"></div>
                    <div class="label"></div>
                  </div>
                </div>

                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <input id="alamat" type="text" class="form-control" name="alamat">
                  <div class="invalid-feedback">
                  </div>
                </div>

                <div class="form-group">
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                    <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                  </div>
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block">
                    Register
                  </button>
                </div>
                <?php echo form_close(); ?>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; Stisla 2018
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
  <script src="<?= base_url('assets_petugas/'); ?>modules/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="<?= base_url('assets_petugas/'); ?>modules/jquery-selectric/jquery.selectric.min.js"></script>

  <!-- Page Specific JS File -->
  <script src="<?= base_url('assets_petugas/'); ?>js/page/auth-register.js"></script>

  <!-- Template JS File -->
  <script src="<?= base_url('assets_petugas/'); ?>js/scripts.js"></script>
  <script src="<?= base_url('assets_petugas/'); ?>js/custom.js"></script>
</body>

</html>