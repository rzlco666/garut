<div id="footer" class=" ppb_wrapper">
  <ul class="sidebar_widget three">
    <li id="text-2" class="widget widget_text">
      <h2 class="widgettitle">Dikembangkan Oleh</h2>
      <div class="textwidget">
        <p>
          <img src="<?= base_url('assets_wisatawan/'); ?>images/logo-white.png" style="margin-top:30px;" alt="" />
        </p>
      </div>
    </li>
    <li id="text-4" class="widget widget_text">
      <h2 class="widgettitle">Contact Info</h2>
      <div class="textwidget">
        <p><span class="ti-mobile" style="margin-right:10px;"></span>1-567-124-44227</p>
        <p><span class="ti-location-pin" style="margin-right:10px;"></span>Garut</p>
        <div style="margin-top:20px;">
          <div class="social_wrapper shortcode dark ">
            <ul>
              <li class="facebook"><a target="_blank" title="Facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li class="twitter"><a target="_blank" title="Twitter" href="https://twitter.com/#"><i class="fa fa-twitter"></i></a></li>
              <li class="youtube"><a target="_blank" title="Youtube" href="#"><i class="fa fa-youtube"></i></a></li>
              <li class="instagram"><a target="_blank" title="Instagram" href="https://instagram.com/theplanetd"><i class="fa fa-instagram"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </li>
    <li id="grandtour_flickr-7" class="widget Grandtour_Flickr">
      <h2 class="widgettitle">Menu</h2>
      <ul class="footer_nav">
        <li class="menu-item"><a href="<?= base_url('/'); ?>">Home</a></li>
        <li class="menu-item"><a href="<?= base_url('Home/wisata'); ?>">Wisata</a></li>
        <li class="menu-item"><a href="<?= base_url('Home/event'); ?>">Event</a></li>
      </ul>
      <br class="clear" />
    </li>
  </ul>
</div>

<div class="footer_bar  ppb_wrapper ">

  <div class="footer_bar_wrapper ">
    <div id="copyright"><?= date("Y"); ?> © Copyright Garut</div>
    <br class="clear" />
    <a id="toTop" href="javascript:;"><i class="fa fa-angle-up"></i></a>
  </div>
</div>

<div id="side_menu_wrapper" class="overlay_background">
  <a id="close_share" href="javascript:;"><span class="ti-close"></span></a>

</div>





<script type='text/javascript' src='<?= base_url('assets_wisatawan/'); ?>js/jquery.js'></script>
<script type='text/javascript' src='<?= base_url('assets_wisatawan/'); ?>js/jquery-migrate.min.js'></script>
<script type='text/javascript' src='<?= base_url('assets_wisatawan/'); ?>js/plugins/core.min.js'></script>
<script type='text/javascript' src='<?= base_url('assets_wisatawan/'); ?>js/plugins/datepicker.min.js'></script>
<script type='text/javascript' src='<?= base_url('assets_wisatawan/'); ?>js/plugins/spin.min.js'></script>
<script type='text/javascript' src='<?= base_url('assets_wisatawan/'); ?>js/plugins/spin.jquery.js'></script>
<script type='text/javascript' src='<?= base_url('assets_wisatawan/'); ?>js/plugins/jquery.tooltipster.min.js'></script>
<script type='text/javascript' src='<?= base_url('assets_wisatawan/'); ?>js/plugins/functions.js'></script>
<script type='text/javascript' src='<?= base_url('assets_wisatawan/'); ?>js/plugins/jquery.blockUI.min.js'></script>
<script type='text/javascript' src='<?= base_url('assets_wisatawan/'); ?>js/plugins/jquery.requestAnimationFrame.js'></script>
<script type='text/javascript' src='<?= base_url('assets_wisatawan/'); ?>js/plugins/ilightbox.packed.js'></script>
<script type='text/javascript' src='<?= base_url('assets_wisatawan/'); ?>js/plugins/jquery.easing.js'></script>
<script type='text/javascript' src='<?= base_url('assets_wisatawan/'); ?>js/plugins/waypoints.min.js'></script>
<script type='text/javascript' src='<?= base_url('assets_wisatawan/'); ?>js/plugins/jquery.isotope.js'></script>
<script type='text/javascript' src='<?= base_url('assets_wisatawan/'); ?>js/plugins/jquery.masory.js'></script>
<script type='text/javascript' src='<?= base_url('assets_wisatawan/'); ?>js/plugins/jquery.tooltipster.min.js'></script>
<script type='text/javascript' src='<?= base_url('assets_wisatawan/'); ?>js/plugins/jarallax.js'></script>
<script type='text/javascript' src='<?= base_url('assets_wisatawan/'); ?>js/plugins/jquery.sticky-kit.min.js'></script>
<script type='text/javascript' src='<?= base_url('assets_wisatawan/'); ?>js/plugins/jquery.stellar.min.js'></script>
<script type='text/javascript' src='<?= base_url('assets_wisatawan/'); ?>js/plugins/custom_plugins.js'></script>
<script type='text/javascript' src='<?= base_url('assets_wisatawan/'); ?>js/plugins/custom.js'></script>
<script type='text/javascript' src='<?= base_url('assets_wisatawan/'); ?>js/plugins/custom_onepage.js'></script>
<script type='text/javascript' src='<?= base_url('assets_wisatawan/'); ?>js/plugins/jarallax-video.js'></script>
<script type='text/javascript' src='<?= base_url('assets_wisatawan/'); ?>js/plugins/jquery.cookie.js'></script>

<script type='text/javascript' src='<?= base_url('assets_wisatawan/'); ?>js/bootstrap.js'></script>

<script type='text/javascript'>
  jQuery(document).ready(function(jQuery) {
    jQuery.datepicker.setDefaults({
      "closeText": "Close",
      "currentText": "Today",
      "monthNames": ["January", "February", "March", "April", "May", "June", "July", "August",
        "September", "October", "November", "December"
      ],
      "monthNamesShort": ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep",
        "Oct", "Nov", "Dec"
      ],
      "nextText": "Next",
      "prevText": "Previous",
      "dayNames": ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday",
        "Saturday"
      ],
      "dayNamesShort": ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
      "dayNamesMin": ["S", "M", "T", "W", "T", "F", "S"],
      "dateFormat": "MM d, yy",
      "firstDay": 1,
      "isRTL": false
    });
  });
</script>
<script type='text/javascript'>
  /* <![CDATA[ */
  var booked_js_vars = {
    "ajax_url": "#",
    "profilePage": "",
    "publicAppointments": "",
    "i18n_confirm_appt_delete": "Are you sure you want to cancel this appointment?",
    "i18n_please_wait": "Please wait ...",
    "i18n_wrong_username_pass": "Wrong username\/password combination.",
    "i18n_fill_out_required_fields": "Please fill out all required fields.",
    "i18n_guest_appt_required_fields": "Please enter your name to book an appointment.",
    "i18n_appt_required_fields": "Please enter your name, your email address and choose a password to book an appointment.",
    "i18n_appt_required_fields_guest": "Please fill in all \"Information\" fields.",
    "i18n_password_reset": "Please check your email for instructions on resetting your password.",
    "i18n_password_reset_error": "That username or email is not recognized."
  };
  /* ]]> */
</script>
</body>

</html>