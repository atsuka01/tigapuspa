<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap material admin template">
  <meta name="author" content="">

  <title>Register V3 | Remark Material Admin Template</title>

  <link rel="apple-touch-icon" href="{{ asset('assets/images/apple-touch-icon.png')}}">
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{ asset('assets/global/css/bootstrap.min.css?v4.0.1')}}">
  <link rel="stylesheet" href="{{ asset('assets/global/css/bootstrap-extend.min.css?v4.0.1')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/site.min.css?v4.0.1')}}">

  <!-- Skin tools (demo site only) -->
  <link rel="stylesheet" href="{{ asset('asset/global/css/skintools.min.css?v4.0.1')}}">
  <script src="{{ asset('assets/js/Plugin/skintools.min.js?v4.0.1')}}"></script>

  <!-- Plugins -->
  <link rel="stylesheet" href="{{ asset('assets/global/vendor/animsition/animsition.min.css?v4.0.1')}}">
  <link rel="stylesheet" href="{{ asset('assets/global/vendor/asscrollable/asScrollable.min.css?v4.0.1')}}">
  <link rel="stylesheet" href="{{ asset('assets/global/vendor/switchery/switchery.min.css?v4.0.1')}}">
  <link rel="stylesheet" href="{{ asset('assets/global/vendor/intro-js/introjs.min.css?v4.0.1')}}">
  <link rel="stylesheet" href="{{ asset('assets/global/vendor/slidepanel/slidePanel.min.css?v4.0.1')}}">
  <link rel="stylesheet" href="{{ asset('assets/global/vendor/flag-icon-css/flag-icon.min.css?v4.0.1')}}">
  <link rel="stylesheet" href="{{ asset('assets/global/vendor/waves/waves.min.css?v4.0.1')}}">

  <!-- Page -->
  <link rel="stylesheet" href="{{ asset('assets/examples/css/pages/register-v3.min.css?v4.0.1')}}">

  <!-- Fonts -->
  <link rel="stylesheet" href="{{asset('assets/global/fonts/material-design/material-design.min.css?v4.0.1')}}">
  <link rel="stylesheet" href="{{ asset('assets/global/fonts/brand-icons/brand-icons.min.css?v4.0.1')}}">
  <link rel='stylesheet' href="https://fonts.googleapis.com/css?family=Roboto:400,400italic,700">


  <!--[if lt IE 9]>
    <script src="../../global/vendor/html5shiv/html5shiv.min.js?v4.0.1"></script>
    <![endif]-->

  <!--[if lt IE 10]>
    <script src="../../global/vendor/media-match/media.match.min.js?v4.0.1"></script>
    <script src="../../global/vendor/respond/respond.min.js?v4.0.1"></script>
    <![endif]-->

  <!-- Scripts -->
  <script src="../../global/vendor/breakpoints/breakpoints.min.js?v4.0.1"></script>
  <script>
    Breakpoints();
  </script>
</head>
<body class="animsition page-register-v3 layout-full">
  <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->


  <!-- Page -->
  <div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">>
    <div class="page-content vertical-align-middle">
      <div class="panel">
        <div class="panel-body">
          <div class="brand">
            <img class="brand-img" src="../assets/images/logo-colored.png" alt="...">
            <h2 class="brand-text font-size-18">Remark</h2>
          </div>
          <form method="post" action="#" autocomplete="off">
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <input type="text" class="form-control" name="name" />
              <label class="floating-label">Full Name</label>
            </div>
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <input type="email" class="form-control" name="email" />
              <label class="floating-label">Email</label>
            </div>
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <input type="password" class="form-control" name="password" />
              <label class="floating-label">Password</label>
            </div>
            <div class="form-group form-material floating" data-plugin="formMaterial">
              <input type="password" class="form-control" name="PasswordCheck" />
              <label class="floating-label">Re-enter Password</label>
            </div>

            <button type="submit" class="btn btn-primary btn-block btn-lg mt-40">Sign up</button>
          </form>
          <p>Have account already? Please go to <a href="login-v3.html">Sign In</a></p>
        </div>
      </div>

      <footer class="page-copyright page-copyright-inverse">
        <p>WEBSITE BY Creation Studio</p>
        <p>© 2018. All RIGHT RESERVED.</p>
        <div class="social">
          <a class="btn btn-icon btn-pure" href="javascript:void(0)">
            <i class="icon bd-twitter" aria-hidden="true"></i>
          </a>
          <a class="btn btn-icon btn-pure" href="javascript:void(0)">
            <i class="icon bd-facebook" aria-hidden="true"></i>
          </a>
          <a class="btn btn-icon btn-pure" href="javascript:void(0)">
            <i class="icon bd-google-plus" aria-hidden="true"></i>
          </a>
        </div>
      </footer>
    </div>
  </div>
  <!-- End Page -->


  <!-- Core  -->
  <script src="../../global/vendor/babel-external-helpers/babel-external-helpers.js?v4.0.1"></script>
  <script src="../../global/vendor/jquery/jquery.min.js?v4.0.1"></script>
  <script src="../../global/vendor/popper-js/umd/popper.min.js?v4.0.1"></script>
  <script src="../../global/vendor/bootstrap/bootstrap.min.js?v4.0.1"></script>
  <script src="../../global/vendor/animsition/animsition.min.js?v4.0.1"></script>
  <script src="../../global/vendor/mousewheel/jquery.mousewheel.min.js?v4.0.1"></script>
  <script src="../../global/vendor/asscrollbar/jquery-asScrollbar.min.js?v4.0.1"></script>
  <script src="../../global/vendor/asscrollable/jquery-asScrollable.min.js?v4.0.1"></script>
  <script src="../../global/vendor/ashoverscroll/jquery-asHoverScroll.min.js?v4.0.1"></script>
  <script src="../../global/vendor/waves/waves.min.js?v4.0.1"></script>

  <!-- Plugins -->
  <script src="../../global/vendor/switchery/switchery.min.js?v4.0.1"></script>
  <script src="../../global/vendor/intro-js/intro.min.js?v4.0.1"></script>
  <script src="../../global/vendor/screenfull/screenfull.min.js?v4.0.1"></script>
  <script src="../../global/vendor/slidepanel/jquery-slidePanel.min.js?v4.0.1"></script>

  <!-- Plugins For This Page -->
  <script src="../../global/vendor/jquery-placeholder/jquery.placeholder.min.js?v4.0.1"></script>

  <!-- Scripts -->
  <script src="../../global/js/State.min.js?v4.0.1"></script>
  <script src="../../global/js/Component.min.js?v4.0.1"></script>
  <script src="../../global/js/Plugin.min.js?v4.0.1"></script>
  <script src="../../global/js/Base.min.js?v4.0.1"></script>
  <script src="../../global/js/Config.min.js?v4.0.1"></script>

  <script src="../assets/js/Section/Menubar.min.js?v4.0.1"></script>
  <script src="../assets/js/Section/Sidebar.min.js?v4.0.1"></script>
  <script src="../assets/js/Section/PageAside.min.js?v4.0.1"></script>
  <script src="../assets/js/Plugin/menu.min.js?v4.0.1"></script>

  <!-- Config -->
  <script src="../../global/js/config/colors.min.js?v4.0.1"></script>
  <script src="../assets/js/config/tour.min.js?v4.0.1"></script>
  <script>
    Config.set('assets', '../assets');
  </script>

  <!-- Page -->
  <script src="../assets/js/Site.min.js?v4.0.1"></script>
  <script src="../../global/js/Plugin/asscrollable.min.js?v4.0.1"></script>
  <script src="../../global/js/Plugin/slidepanel.min.js?v4.0.1"></script>
  <script src="../../global/js/Plugin/switchery.min.js?v4.0.1"></script>

  <script src="../../global/js/Plugin/jquery-placeholder.min.js?v4.0.1"></script>
  <script src="../../global/js/Plugin/material.min.js?v4.0.1"></script>


  <script>
    (function(document, window, $) {
      'use strict';

      var Site = window.Site;
      $(document).ready(function() {
        Site.run();
      });
    })(document, window, jQuery);
  </script>


  <!-- Google Analytics -->
  <script>
    (function(i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js',
      'ga');

    ga('create', 'UA-65522665-1', 'auto');
    ga('send', 'pageview');
  </script>
</body>

</html>