
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">
    
    <title>Dashboard</title>
    
    <link rel="apple-touch-icon" href="{{ asset('/assets/images/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{ asset('/assets/images/favicon.ico')}}">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('/assets/global/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/global/css/bootstrap-extend.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/css/site.min.css')}}">
     <!-- Skin tools (demo site only) -->
  <link rel="stylesheet" href="{{ asset('assets/global/css/skintools.min.css?v4.0.2')}}">
  <script src="{{ asset('assets/js/Plugin/skintools.min.js?v4.0.2')}}"></script>
    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('/assets/global/vendor/animsition/animsition.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/global/vendor/asscrollable/asScrollable.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/global/vendor/switchery/switchery.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/global/vendor/intro-js/introjs.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/global/vendor/slidepanel/slidePanel.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/global/vendor/flag-icon-css/flag-icon.css')}}">
        <link rel="stylesheet" href="{{ asset('/assets/global/vendor/chartist/chartist.css')}}">
        <link rel="stylesheet" href="{{ asset('/assets/global/vendor/aspieprogress/asPieProgress.css')}}">
        <link rel="stylesheet" href="{{ asset('/assets/examples/css/dashboard/v2.css')}}">
        <link rel="stylesheet" href="{{ asset('/assets/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css')}}">
        <link rel="stylesheet" href="{{ asset('/assets/global/vendor/footable/footable.core.css')}}">
        <link rel="stylesheet" href="{{ asset('/assets/examples/css/tables/footable.css')}}">
        <link rel="stylesheet" href="{{ asset('/assets/global/vendor/flag-icon-css/flag-icon.min.css?v4.0.')}}2">
   <!-- Plugins For This Page -->
  <link rel="stylesheet" href="{{ asset('assets/global/vendor/tablesaw/tablesaw.min.css?v4.0.2')}}"> 
  <link rel="stylesheet" href="{{ asset('assets/global/vendor/datatables.net-bs4/dataTables.bootstrap4.min.css?v4.0.2')}}">
  <link rel="stylesheet" href="{{ asset('assets/global/vendor/datatables.net-fixedheader-bs4/dataTables.fixedheader.bootstrap4.min.css?v4.0.2')}}">
  <link rel="stylesheet" href="{{ asset('assets/global/vendor/datatables.net-fixedcolumns-bs4/dataTables.fixedcolumns.bootstrap4.min.css?v4.0.2')}}">
  <link rel="stylesheet" href="{{ asset('assets/global/vendor/datatables.net-rowgroup-bs4/dataTables.rowgroup.bootstrap4.min.css?v4.0.2')}}">
  <link rel="stylesheet" href="{{ asset('assets/global/vendor/datatables.net-scroller-bs4/dataTables.scroller.bootstrap4.min.css?v4.0.2')}}">
  <link rel="stylesheet" href="{{ asset('assets/global/vendor/datatables.net-select-bs4/dataTables.select.bootstrap4.min.css?v4.0.2')}}">
  <link rel="stylesheet" href="{{ asset('assets/global/vendor/datatables.net-responsive-bs4/dataTables.responsive.bootstrap4.min.css?v4.0.2')}}">
  <link rel="stylesheet" href="{{ asset('assets/global/vendor/datatables.net-buttons-bs4/dataTables.buttons.bootstrap4.min.css?v4.0.2')}}">
    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('/assets/global/fonts/web-icons/web-icons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/assets/global/fonts/brand-icons/brand-icons.min.css')}}">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
     <!-- Page -->
  <link rel="stylesheet" href="{{ asset('assets/examples/css/tables/datatable.min.css?v4.0.2')}}">
    <!--[if lt IE 9]>
    <script src="../../../global/vendor/html5shiv/html5shiv.min.js"></script>
    <![endif]-->
    
    <!--[if lt IE 10]>
    <script src="../../../global/vendor/media-match/media.match.min.js"></script>
    <script src="../../../global/vendor/respond/respond.min.js"></script>
    <![endif]-->
    
    <!-- Scripts -->
    <script src="{{ asset('/assets/global/vendor/breakpoints/breakpoints.js')}}"></script>
    <script>
      Breakpoints();
    </script>
  </head>
  <body class="animsition dashboard">
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega navbar-inverse bg-indigo-600"
      role="navigation">
    
      <div class="navbar-header">
        <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
          data-toggle="menubar">
          <span class="sr-only">Toggle navigation</span>
          <span class="hamburger-bar"></span>
        </button>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
          data-toggle="collapse">
          <i class="icon wb-more-horizontal" aria-hidden="true"></i>
        </button>
        <div class="navbar-brand navbar-brand-center">
          
          <span class="navbar-brand-text hidden-xs-down">TIGAPUSPA</span>
        </div>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search"
          data-toggle="collapse">
          <span class="sr-only">Toggle Search</span>
          <i class="icon wb-search" aria-hidden="true"></i>
        </button>
      </div>
    
      <div class="navbar-container container-fluid">
        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
          <!-- Navbar Toolbar -->
          <ul class="nav navbar-toolbar">
            <li class="nav-item hidden-float" id="toggleMenubar">
              <a class="nav-link" data-toggle="menubar" href="#" role="button">
                <i class="icon hamburger hamburger-arrow-left">
                  <span class="sr-only">Toggle menubar</span>
                  <span class="hamburger-bar"></span>
                </i>
              </a>
            </li>
            <li class="nav-item hidden-sm-down" id="toggleFullscreen">
              <a class="nav-link icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
                <span class="sr-only">Toggle fullscreen</span>
              </a>
            </li>
           
            <li class="nav-item dropdown dropdown-fw dropdown-mega">
              <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false" data-animation="fade"
                role="button">PINTASAN <i class="icon wb-chevron-down-mini" aria-hidden="true"></i></a>
              <div class="dropdown-menu" role="menu">
                <div class="mega-content">
                  <div class="row">
                    <div class="col-md-4">
                      
                      <ul class="blocks-2">
                        <li class="mega-menu m-0">
                          
                        </li>
                        <li class="mega-menu m-0">
                          
                        </li>
                      </ul>
                    </div>
                  
                  </div>
                </div>
              </div>
            </li>
          </ul>
          <!-- End Navbar Toolbar -->
    
          <!-- Navbar Toolbar Right -->
          <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
      
            <li class="nav-item dropdown">
              <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
                data-animation="scale-up" role="button">
                <span class="avatar avatar-online">
                  <img src="{{ url('global/portraits/5.jpg')}}" alt="...">
                  <i></i>
                </span>
              </a>
              <div class="dropdown-menu" role="menu">
                <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-user" aria-hidden="true"></i> Profile</a>
                <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-payment" aria-hidden="true"></i> Billing</a>
                <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-settings" aria-hidden="true"></i> Settings</a>
                <div class="dropdown-divider" role="presentation"></div>
                <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Logout</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" title="Notifications"
                aria-expanded="false" data-animation="scale-up" role="button">
                <i class="icon wb-bell" aria-hidden="true"></i>
                
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                <div class="dropdown-menu-header">
                  <h5>NOTIFICATIONS</h5>
                  
                </div>
    
                <div class="list-group">
                  <div data-role="container">
                    <div data-role="content">
                     @yield('notik')
                    </div>
                  </div>
                </div>
                <div class="dropdown-menu-footer">
                  <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                    <i class="icon wb-settings" aria-hidden="true"></i>
                  </a>
                  @yield('notif')
                  <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                    All notifications
                  </a>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" title="Messages"
                aria-expanded="false" data-animation="scale-up" role="button">
                <i class="icon wb-envelope" aria-hidden="true"></i>
                <span class="badge badge-pill badge-info up">3</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
                <div class="dropdown-menu-header" role="presentation">
                  <h5>MESSAGES</h5>
                  <span class="badge badge-round badge-info">New 3</span>
                </div>
    
                <div class="list-group" role="presentation">
                  <div data-role="container">
                    <div data-role="content">
                      <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="pr-10">
                            <span class="avatar avatar-sm avatar-online">
                              <img src="../../../global/portraits/2.jpg" alt="..." />
                              <i></i>
                            </span>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">Mary Adams</h6>
                            <div class="media-meta">
                              <time datetime="2018-06-17T20:22:05+08:00">30 minutes ago</time>
                            </div>
                            <div class="media-detail">Anyways, i would like just do it</div>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="pr-10">
                            <span class="avatar avatar-sm avatar-off">
                              <img src="../../../global/portraits/3.jpg" alt="..." />
                              <i></i>
                            </span>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">Caleb Richards</h6>
                            <div class="media-meta">
                              <time datetime="2018-06-17T12:30:30+08:00">12 hours ago</time>
                            </div>
                            <div class="media-detail">I checheck the document. But there seems</div>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="pr-10">
                            <span class="avatar avatar-sm avatar-busy">
                              <img src="../../../global/portraits/4.jpg" alt="..." />
                              <i></i>
                            </span>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">June Lane</h6>
                            <div class="media-meta">
                              <time datetime="2018-06-16T18:38:40+08:00">2 days ago</time>
                            </div>
                            <div class="media-detail">Lorem ipsum Id consectetur et minim</div>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="pr-10">
                            <span class="avatar avatar-sm avatar-away">
                              <img src="../../../global/portraits/5.jpg" alt="..." />
                              <i></i>
                            </span>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">Edward Fletcher</h6>
                            <div class="media-meta">
                              <time datetime="2018-06-15T20:34:48+08:00">3 days ago</time>
                            </div>
                            <div class="media-detail">Dolor et irure cupidatat commodo nostrud nostrud.</div>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="dropdown-menu-footer" role="presentation">
                  <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                    <i class="icon wb-settings" aria-hidden="true"></i>
                  </a>
                  <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                    See all messages
                  </a>
                </div>
              </div>
            </li>
            <li class="nav-item" id="toggleChat">
              <a class="nav-link" data-toggle="site-sidebar" href="javascript:void(0)" title="Chat"
                data-url="../site-sidebar.tpl">
                <i class="icon wb-chat" aria-hidden="true"></i>
              </a>
            </li>
          </ul>
          <!-- End Navbar Toolbar Right -->
        </div>
        <!-- End Navbar Collapse -->
    
        <!-- Site Navbar Seach -->
        <div class="collapse navbar-search-overlap" id="site-navbar-search">
          <form role="search">
            <div class="form-group">
              <div class="input-search">
                <i class="input-search-icon wb-search" aria-hidden="true"></i>
                <input type="text" class="form-control" name="site-search" placeholder="Search...">
                <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search"
                  data-toggle="collapse" aria-label="Close"></button>
              </div>
            </div>
          </form>
        </div>
        <!-- End Site Navbar Seach -->
      </div>
    </nav>    <div class="site-menubar site-menubar-light">
      <div class="site-menubar-body">
        <ul class="site-menu" data-plugin="menu">
          <li class="site-menu-item has-sub active open">
            <a href="{{url('home_admin')}}">
                    <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                    <span class="site-menu-title">Dashboard</span>
                    
                </a>
            
          </li>
       
          <li class="site-menu-item has-sub">
            <a href="javascript:void(0)">
                    <i class="site-menu-icon wb-folder" aria-hidden="true"></i>
                    <span class="site-menu-title">Stok</span>
            </a>
                
                
            <ul class="site-menu-sub">
              <li class="site-menu-item">
                <a class="animsition-link" href="{{url('pabrik')}}">
                  <span class="site-menu-title">Gudang</span>
                </a>
              </li>
              {{-- <li class="site-menu-item has-sub">
                  <a href="javascript:void(0)">
                    <span class="site-menu-title">Errors</span>
                    <span class="site-menu-arrow"></span>
                  </a>
                  <ul class="site-menu-sub">
                    <li class="site-menu-item">
                      <a class="animsition-link" href="pages/error-400.html">
                        <span class="site-menu-title">400 Bad Request</span>
                      </a>
                    </li>
                    <li class="site-menu-item">
                      <a class="animsition-link" href="pages/error-403.html">
                        <span class="site-menu-title">403 Forbidden</span>
                      </a>
                    </li>
                    <li class="site-menu-item">
                      <a class="animsition-link" href="pages/error-404.html">
                        <span class="site-menu-title">404 Not Found</span>
                      </a>
                    </li>
                    <li class="site-menu-item">
                      <a class="animsition-link" href="pages/error-500.html">
                        <span class="site-menu-title">500 Internal Server Error</span>
                      </a>
                    </li>
                    <li class="site-menu-item">
                      <a class="animsition-link" href="pages/error-503.html">
                        <span class="site-menu-title">503 Service Unavailable</span>
                      </a>
                    </li>
                  </ul>
                </li> --}}
              <li class="site-menu-item">
                <a class="animsition-link" href="{{url('kantor')}}">
                  <span class="site-menu-title">Kantor</span>
                </a>
              </li>
              <li class="site-menu-item">
                  <a class="animsition-link" href="#">
                    <span class="site-menu-title">Cari ED</span>
                  </a>
                </li>
            </ul>
            
          </li>
          
          <li class="site-menu-item has-sub">
            <a href="javascript:void(0)">
                    <i class="site-menu-icon wb-desktop" aria-hidden="true"></i>
                    <span class="site-menu-title">Penjualan</span>
                </a>
            <ul class="site-menu-sub">
            
              

              
          
             
              <li class="site-menu-item has-sub">
                  <a href="javascript:void(0)">
                    <span class="site-menu-title">Online</span>
                    <span class="site-menu-arrow"></span>
                  </a>
                  <ul class="site-menu-sub">
                      <li class="site-menu-item">
                          <li class="site-menu-item has-sub">
                              <a href="javascript:void(0)">
                                <span class="site-menu-title">Kantor</span>
                                <span class="site-menu-arrow"></span>
                              </a>
                              <ul class="site-menu-sub">
                                <li class="site-menu-item">
                                  <a class="animsition-link" href="{{url('toko')}}">
                                    <span class="site-menu-title">Toko</span>
                                  </a>
                                </li>
                                <li class="site-menu-item">
                                  <a href="{{url('toko/create')}}" class="animsition-link">
                                    <span class="site-menu-title">Tambah Toko</span>
                                  </a>
                                </li>
                               
                                <li class="site-menu-item">
                                  <a href="" class="animsition-link">
                                    <span class="site-menu-title">Jenis Toko</span>
                                  </a>
                                </li>
                              </ul>
                            </li>
                      </li>
                   
                    <li class="site-menu-item">
                     
              <li class="site-menu-item has-sub">
                  <a href="#">
                    <span class="site-menu-title">Master Deler</span>
                    <span class="site-menu-arrow"></span>
                  </a>
                  <ul class="site-menu-sub">
                    <li class="site-menu-item">
                      <a class="animsition-link" href="{{url('md')}}">
                        <span class="site-menu-title">Data MD</span>
                      </a>
                    </li>
                    <li class="site-menu-item">
                      <a class="animsition-link" href="{{url('transaksimd')}}">
                        <span class="site-menu-title">Transaksi Master Dealer</span>
                      </a>
                    </li>
                  
                  </ul>
                </li>
                    </li>
                    <li class="site-menu-item">
                        <li class="site-menu-item has-sub">
                            <a href="javascript:void(0)">
                              <span class="site-menu-title">Reseler</span>
                              <span class="site-menu-arrow"></span>
                            </a>
                            <ul class="site-menu-sub">
                                <li class="site-menu-item">
                                  <a class="animsition-link" href="#">
                                    {{-- <a class="animsition-link" href="{{url('reseler')}}"> --}}
                                      <span class="site-menu-title">Data Reseler</span>
                                    </a>
                                  </li>
                             
                              <li class="site-menu-item">
                                <a class="animsition-link" href="{{url('reseler/transaksi')}}">
                                  <span class="site-menu-title">Transaksi Reseler</span>
                                </a>
                              </li>
                             
                            </ul>
                          </li>
                      </li>
                   
                  </ul>
                </li>
                <li class="site-menu-item has-sub">
                    <a href="javascript:void(0)">
                      <span class="site-menu-title">Offline</span>
                      <span class="site-menu-arrow"></span>
                    </a>
                    <ul class="site-menu-sub">
                        <li class="site-menu-item ">
                            <a href="{{url('apotik')}}" class="animsition-link">
                              <span class="site-menu-title">Apotek</span>
                            
                            </a>
                          
                          </li>
                          <li class="site-menu-item has-sub">
                            <a href="{{url('agen')}}">
                              <span class="site-menu-title">Agen</span>
                              
                            </a>
                         
                          </li>
                          <li class="site-menu-item">
                            <a class="animsition-link" href="{{url('retail')}}">
                              <span class="site-menu-title">Retail</span>
                            </a>
                          </li>
                     
                    </ul>
                  </li>
        
           
            </ul>
          </li>
          
          <li class="site-menu-item has-sub">
            <a href="{{url('laporan')}}">
                    <i class="site-menu-icon wb-print" aria-hidden="true"></i>
                    <span class="site-menu-title">Laporan</span>
            </a>
            <ul class="site-menu-sub">
                <li class="site-menu-item">
                    <li class="site-menu-item has-sub">
                        <a href="javascript:void(0)">
                          <span class="site-menu-title">Laporan Stok</span>
                          <span class="site-menu-arrow"></span>
                        </a>
                        <ul class="site-menu-sub">
                          <li class="site-menu-item">
                            <a class="animsition-link" href="#">
                              <span class="site-menu-title">Stok Gudang</span>
                            </a>
                          </li>
                          <li class="site-menu-item">
                            <a href="#" class="animsition-link">
                              <span class="site-menu-title">Stok Kantor</span>
                            </a>
                          </li>
                         
                         
                        </ul>
                      </li>
                </li>
             
              <li class="site-menu-item">
               
        <li class="site-menu-item has-sub">
            <a href="#">
              <span class="site-menu-title">Laporan Transaksi</span>
              <span class="site-menu-arrow"></span>
            </a>
            <ul class="site-menu-sub">
              <li class="site-menu-item">
              <a class="animsition-link" href="{{route('laporan.harian')}}">
                  <span class="site-menu-title">Lapora harian</span>
                </a>
              </li>
              <li class="site-menu-item">
              <a class="animsition-link" href="{{route('laporan.lsy')}}">
                  <span class="site-menu-title">Laporan LSY</span>
                </a>
              </li>
              <li class="site-menu-item">
              <a class="animsition-link" href="{{route('laporan.metama')}}">
                  <span class="site-menu-title">Laporan Metama</span>
                </a>
              </li>
            </ul>
          </li>
              </li>
             
             
            </ul>
          </li>
          
          <li class="site-menu-item has-sub">
            <a href="{{url('cs')}}">
                    <i class="site-menu-icon wb-user" aria-hidden="true"></i>
                    <span class="site-menu-title">CS</span>
                </a>
            
          </li>
          <li class="site-menu-item has-sub">
            <a href="{{route('pe.index')}}">
                    <i class="site-menu-icon wb-book" aria-hidden="true"></i>
                    <span class="site-menu-title">PE</span>
                </a>
            
          </li>
          <li class="site-menu-item has-sub ">
            <a class="dropdown-item" href="{{ route('logout') }}"
            
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="site-menu-icon wb-power" aria-hidden="true"></i>
            <span class="site-menu-title">Keluar</span>
         </a>
         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
          </li>

        </ul>  </div>
    </div>

    <!-- Page -->
    <div class="page">
      

      <div class="page-content container-fluid">
        <div class="row" data-plugin="matchHeight" data-by-row="true">
          @yield('utama')
            <!-- End Panel Web Designer -->
          </div>

          
          </div>

          

              
            </div>
          </div>
        </div>

        <div class="row" data-plugin="matchHeight" data-by-row="true">
          
              

          
          </div>

          <div class="col-xl-4 col-lg-12">
            <!-- Panel Title -->
            <div class="card card-shadow" id="widgetGmap">
              <div class="map h-full" id="gmap"></div>
            </div>
            <!-- End Panel Title -->
          </div>
        </div>
      </div>
    </div>
    <!-- End Page -->

    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>



    <!-- Footer -->
    <footer class="site-footer">
      <div class="site-footer-legal">© 2018 <a href="http://themeforest.net/item/remark-responsive-bootstrap-admin-template/11989202">Remark</a></div>
      <div class="site-footer-right">
        Crafted with <i class="red-600 wb wb-heart"></i> by <a href="https://themeforest.net/user/creation-studio">Creation Studio</a>
      </div>
    </footer>
    <!-- Core  -->
    <script src="{{ asset('/assets/global/vendor/jquery/jquery.js')}}"></script>
    <script src="{{ asset('/assets/global/vendor/popper-js/umd/popper.min.js')}}"></script>
    <script src="{{ asset('/assets/global/vendor/bootstrap/bootstrap.js')}}"></script>
    <script src="{{ asset('/assets/global/vendor/babel-external-helpers/babel-external-helpers.js')}}"></script>
    <script src="{{ asset('/assets/global/vendor/animsition/animsition.js')}}"></script>
    <script src="{{ asset('/assets/global/vendor/mousewheel/jquery.mousewheel.js')}}"></script>
    <script src="{{ asset('/assets/global/vendor/asscrollbar/jquery-asScrollbar.js')}}"></script>
    <script src="{{ asset('/assets/global/vendor/asscrollable/jquery-asScrollable.js')}}"></script>
    <script src="{{ asset('/assets/global/vendor/ashoverscroll/jquery-asHoverScroll.js')}}"></script>
    <script src="{{ asset('/assets/global/vendor/bootstrap-datepicker/bootstrap-datepicker.js')}}"></script>
    
    <!-- Plugins -->
    <script src="{{ asset('/assets/global/vendor/switchery/switchery.js')}}"></script>
    <script src="{{ asset('/assets/global/vendor/intro-js/intro.js')}}"></script>
    <script src="{{ asset('/assets/global/vendor/screenfull/screenfull.js')}}"></script>
    <script src="{{ asset('/assets/global/vendor/slidepanel/jquery-slidePanel.js')}}"></script>
        <script src="{{ asset('/assets/global/vendor/chartist/chartist.min.js')}}"></script>
        <script src="{{ asset('/assets/global/vendor/gmaps/gmaps.js')}}"></script>
        <script src="{{ asset('/assets/global/vendor/matchheight/jquery.matchHeight-min.js')}}"></script>
    <!-- Plugins For This Page -->
  <script src="{{ asset('assets/global/vendor/datatables.net/jquery.dataTables.js?v4.0.2')}}"></script>
  <script src="{{ asset('assets/global/vendor/datatables.net-bs4/dataTables.bootstrap4.js?v4.0.2')}}"></script>
  <script src="{{ asset('assets/global/vendor/datatables.net-fixedheader/dataTables.fixedHeader.min.js?v4.0.2')}}"></script>
  <script src="{{ asset('assets/global/vendor/datatables.net-fixedcolumns/dataTables.fixedColumns.min.js?v4.0.2')}}"></script>
  <script src="{{ asset('assets/global/vendor/datatables.net-rowgroup/dataTables.rowGroup.min.js?v4.0.2')}}"></script>
  <script src="{{ asset('assets/global/vendor/datatables.net-scroller/dataTables.scroller.min.js?v4.0.2')}}"></script>
  <script src="{{ asset('assets/global/vendor/datatables.net-responsive/dataTables.responsive.min.js?v4.0.2')}}"></script>
  <script src="{{ asset('assets/global/vendor/datatables.net-responsive-bs4/responsive.bootstrap4.min.js?v4.0.2')}}"></script>
  <script src="{{ asset('assets/global/vendor/datatables.net-buttons/dataTables.buttons.min.js?v4.0.2')}}"></script>
  <script src="{{ asset('assets/global/vendor/datatables.net-buttons/buttons.html5.min.js?v4.0.2')}}"></script>
  <script src="{{ asset('assets/global/vendor/datatables.net-buttons/buttons.flash.min.js?v4.0.2')}}"></script>
  <script src="{{ asset('assets/global/vendor/datatables.net-buttons/buttons.print.min.js?v4.0.2')}}"></script>
  <script src="{{ asset('assets/global/vendor/datatables.net-buttons/buttons.colVis.min.js?v4.0.2')}}"></script>
  <script src="{{ asset('assets/global/vendor/datatables.net-buttons-bs4/buttons.bootstrap4.min.js?v4.0.2')}}"></script>
  <script src="{{ asset('assets/global/vendor/asrange/jquery-asRange.min.js?v4.0.2')}}"></script>
  <script src="{{ asset('assets/global/vendor/bootbox/bootbox.min.js?v4.0.2')}}"></script>
    
    <!-- Scripts -->
    <script src="{{ asset('/assets/global/js/Component.js')}}"></script>
    <script src="{{ asset('/assets/global/js/Plugin.js')}}"></script>
    <script src="{{ asset('/assets/global/js/Base.js')}}"></script>
    <script src="{{ asset('/assets/global/js/Config.js')}}"></script>
    
    <script src="{{ asset('/assets/js/Section/Menubar.js')}}"></script>
    <script src="{{ asset('/assets/js/Section/Sidebar.js')}}"></script>
    <script src="{{ asset('/assets/js/Section/PageAside.js')}}"></script>
    <script src="{{ asset('/assets/js/Plugin/menu.js')}}"></script>
    
    <!-- Config -->
    <script src="{{ asset('/assets/global/js/config/colors.js')}}"></script>
    <script src="{{ asset('/assets/js/config/tour.js')}}"></script>
    <script>Config.set('assets', '../../assets');</script>
    
    <!-- Page -->
    <script src="{{ asset('/assets/js/Site.js')}}"></script>
    <script src="{{ asset('/assets/global/js/Plugin/asscrollable.js"')}}></script>
    <script src="{{ asset('/assets/global/js/Plugin/slidepanel.js')}}"></script>
    <script src="{{ asset('/assets/global/js/Plugin/switchery.js')}}"></script>
        <script src="{{ asset('/assets/global/js/Plugin/gmaps.js')}}"></script>
        <script src="{{ asset('/assets/global/js/Plugin/matchheight.js')}}"></script>
        <script src="{{ asset('/assets/global/js/Plugin/asscrollable.js')}}"></script>
    
        <script src="{{ asset('/assets/examples/js/dashboard/v2.js')}}"></script>
        <script src="{{ asset('/assets/global/vendor/moment/moment.min.js')}}"></script>
        <script src="{{ asset('/assets/global/vendor/footable/footable.min.js')}}"></script>
        <script src="{{ asset('/assets/examples/js/tables/footable.js')}}"></script>
        <!-- Plugins For This Page -->
  <script src="{{ asset('assets/global/vendor/tablesaw/tablesaw.jquery.js?v4.0.2')}}"></script>
  <script src="{{ asset('assets/global/vendor/tablesaw/tablesaw-init.js?v4.0.2')}}"></script>
  <script src="{{ asset('/assets/examples/js/tables/datatable.min.js?v4.0.2')}}"></script>
  </body>
</html>
