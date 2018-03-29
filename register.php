<?php
  session_start();
  include 'lib/config.php';
  if (empty($_SESSION['member'])) {
    $_SESSION['member'] = "login";
    header('location:login.php');
  }
  if ($_SESSION['member']=="login") {
    header('location:login.php');
  }
  if (empty($msg)) {
    $msg = "";
  }
  $web = mysqli_query($connect, "SELECT * FROM website");
  $dweb = mysqli_fetch_array($web);
  $idm = $_SESSION['id_member'];

  if (isset($_POST['update'])) {
    $no_id = $_POST['id'];
    $nama = $_POST["nama"];
    $jalan = $_POST["jalan"];
    $no = $_POST["nomor"];
    $rt = $_POST["rt"];
    $rw = $_POST["rw"];
    $kel = $_POST["kel"];
    $kec = $_POST["kec"];
    $kode = $_POST["kode"];
    $kab = $_POST["kab"];
    $prov = $_POST["prov"];
    $hp = $_POST['hp'];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $queryup = mysqli_query($connect, "UPDATE member set nomor_id= '$no_id', nama_member = '$nama', jalan = '$jalan', nomor = '$no', rt = '$rt', rw= '$rw', desa = '$kel', kecamatan = '$kec', kodepos = '$kode', kabupaten = '$kab', provinsi = '$prov', no_hp = $hp, email = '$email', password = '$pass' where id_member = '$idm' ");
    if ($queryup) {
      $msg = "<p class='alert alert-success'>Update success!</p>";
      ?>
        <script type="text/javascript">
          setTimeout("location.href='member.php'", 3000);
        </script>
      <?php
      }else {
      $msg = "<p class='alert alert-danger'>Update Failled!</p>";
      }
    }

    $query = mysqli_query($connect, "SELECT * FROM member where id_member = $idm");
    $datamember = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<!-- Head BEGIN -->
<head>
  <meta charset="utf-8">
  <title>Katalog - Distro Batik Pekalongan</title>

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta content="Metronic Shop UI description" name="description">
  <meta content="Metronic Shop UI keywords" name="keywords">
  <meta content="keenthemes" name="author">

  <meta property="og:site_name" content="-CUSTOMER VALUE-">
  <meta property="og:title" content="-CUSTOMER VALUE-">
  <meta property="og:description" content="-CUSTOMER VALUE-">
  <meta property="og:type" content="website">
  <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
  <meta property="og:url" content="-CUSTOMER VALUE-">

  <link rel="icon" href="logo.ico" type="image/x-icon">

  <!-- Fonts START -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css"><!--- fonts for slider on the index page -->  
  <!-- Fonts END -->

  <!-- Global styles START -->          
  <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Global styles END --> 
   
  <!-- Page level plugin styles START -->
  <link href="assets/global/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
  <link href="assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.css" rel="stylesheet">
  <link href="assets/global/plugins/slider-layer-slider/css/layerslider.css" rel="stylesheet">
  <!-- Page level plugin styles END -->

  <!-- Theme styles START -->
  <link href="assets/global/css/components.css" rel="stylesheet">
  <link href="assets/frontend/layout/css/style.css" rel="stylesheet">
  <link href="assets/frontend/pages/css/style-shop.css" rel="stylesheet" type="text/css">
  <link href="assets/frontend/pages/css/style-layer-slider.css" rel="stylesheet">
  <link href="assets/frontend/layout/css/style-responsive.css" rel="stylesheet">
  <link href="assets/frontend/layout/css/themes/green.css" rel="stylesheet" id="style-color">
  <link href="assets/frontend/layout/css/custom.css" rel="stylesheet">
  <!-- Theme styles END -->
</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="ecommerce">
    <!-- BEGIN HEADER -->
    <div class="header">
      <div class="container">
        <a class="site-logo" href="index.php"><img src="assets/frontend/layout/img/logos/logo-shop-red.png" alt="Distro Batik Pekalongan"></a>

        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

        <!-- BEGIN CART -->
        <div class="top-cart-block">
          <div class="top-cart-info">
            <a href="javascript:void(0);" class="top-cart-info-count">3 items</a>
            <a href="javascript:void(0);" class="top-cart-info-value">$1260</a>
          </div>
          <i class="fa fa-shopping-cart"></i>
                        
          <div class="top-cart-content-wrapper">
            <div class="top-cart-content">
              <ul class="scroller" style="height: 100px;">
                <li>
                  <a href="shop-item.html"><img src="assets/frontend/pages/img/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
                  <span class="cart-content-count">x 1</span>
                  <strong><a href="shop-item.html">Rolex Classic Watch</a></strong>
                  <em>$1230</em>
                  <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
                </li>
              </ul>
              <div class="text-right">
                <a href="shop-shopping-cart.html" class="btn btn-default">View Cart</a>
                <a href="shop-checkout.html" class="btn btn-primary">Checkout</a>
              </div>
            </div>
          </div>            
        </div>
        <!--END CART -->

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation">
          <ul>
            <li class="active"><a href="index.php">Katalog</a></li>
            <li><a href="pemesanan.php">Pemesanan</a></li>
            <li><a href="about.php">Blog</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="javascript:;">
                Akun
              </a>
                
              <ul class="dropdown-menu">
                <li><span class="fa fa-lock"></span><a href="member.php"><?php echo $_SESSION['member']; ?></a></li>
                <li><span class="fa fa-power-off"></span><a href="logout.php">Keluar</a></li>
              </ul>
            </li>

            <!-- BEGIN TOP SEARCH -->
            <li class="menu-search">
              <span class="sep"></span>
              <i class="fa fa-search search-btn"></i>
              <div class="search-box">
                <form action="#">
                  <div class="input-group">
                    <input type="text" placeholder="Search" class="form-control">
                    <span class="input-group-btn">
                      <button class="btn btn-primary" type="submit">Cari</button>
                    </span>
                  </div>
                </form>
              </div> 
            </li>
            <!-- END TOP SEARCH -->
          </ul>
        </div>
        <!-- END NAVIGATION -->
      </div>
    </div>
    <!-- Header END -->
    <div class="main">
      <div class="container" style="width: 100%;">
        <!-- BEGIN CONTENT -->
          <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
            <div class="content-form-page">
              <div class="row">
                <center><h1>Create an account</h1></center>
                <div class="col-md-6 col-md-offset-3 col-sm-6">
                  <form class="form-horizontal" role="form">
                    <fieldset>
                      <legend>Your personal details</legend>
                      <div class="form-group">
                        <label for="firstname" class="col-lg-4 control-label">First Name <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" id="firstname">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="lastname" class="col-lg-4 control-label">Last Name <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" id="lastname">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="email" class="col-lg-4 control-label">Email <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" id="email">
                        </div>
                      </div>
                    </fieldset>
                    <fieldset>
                      <legend>Your password</legend>
                      <div class="form-group">
                        <label for="password" class="col-lg-4 control-label">Password <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" id="password">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="confirm-password" class="col-lg-4 control-label">Confirm password <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" id="confirm-password">
                        </div>
                      </div>
                    </fieldset>
                    <div class="row">
                      <div class="col-lg-8 col-md-offset-2 padding-left-0 padding-top-20">                        
                        <input type="submit" name="submit" class="btn btn-primary" value="Register">
                        <button type="button" class="btn btn-default">Cancel</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
      </div>
    </div>

    <!-- BEGIN PRE-FOOTER -->
    <div class="pre-footer">
      <div class="container">
        <div class="row">
          <!-- BEGIN TWITTER BLOCK --> 
          <div class="col-md-4 col-sm-6 pre-footer-col">
            <h2 class="margin-bottom-0">Kirim kritik dan saran ke kami</h2><br>
            <form action="post">
                <div class="input-group col-md-12 col-xs-12">
                  <label for="email">Email</label>
                    <input type="text" placeholder="youremail@mail.com" class="form-control">
                </div>
                <div class="input-group col-md-12 col-xs-12">
                  <label for="pesan">Pesan</label>
                   <textarea class="form-control" rows="4" placeholder="Tulis pesan anda"></textarea>
                </div><br>
                <input type="submit" class="btn btn-primary" value="Kirim">
              </form>
          </div>
          <!-- END TWITTER BLOCK -->

          <!-- BEGIN BOTTOM ABOUT BLOCK -->
          <div class="col-md-4 col-sm-6 pre-footer-col">
            <center><h2>About us</h2></center>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam sit nonummy nibh euismod tincidunt ut laoreet dolore magna aliquarm erat sit volutpat. Nostrud exerci tation ullamcorper suscipit lobortis nisl aliquip  commodo consequat. </p>
            <p>Duis autem vel eum iriure dolor vulputate velit esse molestie at dolore.</p>
          </div>
          <!-- END BOTTOM ABOUT BLOCK -->
          <!-- BEGIN BOTTOM CONTACTS -->
          <div class="col-md-4 col-sm-6 pre-footer-col">
            <h2>Alamat Kami</h2>
            <address class="margin-bottom-40">
              Jalan Pahlawan no. 23<br>
              Kecamatan Kajen Kabupaten Pekalongan<br>
              Phone: 300 323 3456<br>
              Email: <a href="gmail.com">debatik@gmail.com</a><br>
            </address>

          <!-- BEGIN SOCIAL ICONS -->
            <ul class="social-icons">
              <li><a class="rss" data-original-title="rss" href="javascript:;"></a></li>
              <li><a class="facebook" data-original-title="facebook" href="javascript:;"></a></li>
              <li><a class="twitter" data-original-title="twitter" href="javascript:;"></a></li>
              <li><a class="googleplus" data-original-title="googleplus" href="javascript:;"></a></li>
              <li><a class="linkedin" data-original-title="linkedin" href="javascript:;"></a></li>
              <li><a class="youtube" data-original-title="youtube" href="javascript:;"></a></li>
              <li><a class="vimeo" data-original-title="vimeo" href="javascript:;"></a></li>
              <li><a class="skype" data-original-title="skype" href="javascript:;"></a></li>
            </ul>
          <!-- END SOCIAL ICONS -->
          </div>
          <!-- END BOTTOM CONTACTS -->
        </div>
      </div>
    </div>
    <!-- END PRE-FOOTER -->

    <!-- BEGIN FOOTER -->
    <div class="footer">
      <div class="container">
        <div class="row">
          <!-- BEGIN COPYRIGHT -->
          <div class="col-md-6 col-sm-6 padding-top-10">
            <?php echo date("Y"); ?> &copy; Distro Batik Pekalongan. ALL Rights Reserved. 
          </div>
          <!-- END COPYRIGHT -->
        </div>
      </div>
    </div>
    <!-- END FOOTER -->

    <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
    <!--[if lt IE 9]>
    <script src="assets/global/plugins/respond.min.js"></script>  
    <![endif]-->
    <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
    <script src="assets/frontend/layout/scripts/back-to-top.js" type="text/javascript"></script>
    <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="assets/global/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
    <script src="assets/global/plugins/carousel-owl-carousel/owl-carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->
    <script src='assets/global/plugins/zoom/jquery.zoom.min.js' type="text/javascript"></script><!-- product zoom -->
    <script src="assets/global/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script><!-- Quantity -->

    <!-- BEGIN LayerSlider -->
    <script src="assets/global/plugins/slider-layer-slider/js/greensock.js" type="text/javascript"></script><!-- External libraries: GreenSock -->
    <script src="assets/global/plugins/slider-layer-slider/js/layerslider.transitions.js" type="text/javascript"></script><!-- LayerSlider script files -->
    <script src="assets/global/plugins/slider-layer-slider/js/layerslider.kreaturamedia.jquery.js" type="text/javascript"></script><!-- LayerSlider script files -->
    <script src="assets/frontend/pages/scripts/layerslider-init.js" type="text/javascript"></script>
    <!-- END LayerSlider -->

    <script src="assets/frontend/layout/scripts/layout.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Layout.init();    
            Layout.initOWL();
            LayersliderInit.initLayerSlider();
            Layout.initImageZoom();
            Layout.initTouchspin();
            Layout.initTwitter();
            
            Layout.initFixHeaderWithPreHeader();
            Layout.initNavScrolling();
        });
    </script>
    <!-- END PAGE LEVEL JAVASCRIPTS -->
    <?php
      $querypop = mysqli_query($connect, "SELECT * FROM barang, kategori, jenis WHERE barang.id_kategori = kategori.id_kategori and barang.id_jenis = jenis.id_jenis");
      while ($datapop = mysqli_fetch_array($querypop)) { ?>
        <!-- BEGIN fast view of a product -->
        <div id="<?php echo $datapop['id_barang']; ?>product-pop-up" style="display: none; width: 700px;">
                <div class="product-page product-pop-up">
                  <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-3">
                      <div class="product-main-image">
                        <img src="img/produk/<?php echo $datapop['foto_barang']; ?>" alt="<?php echo $datapop['foto_barang']; ?>" class="img-responsive">
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-9">
                      <h2><?php echo $datapop['nama_barang']; ?></h2>
                      <div class="price-availability-block clearfix">
                        <div class="price">
                          <strong><?php echo "Rp ".number_format($datapop['harga'],0,".","."); ?></strong>
                        </div>
                      </div>
                      <table>
                        <tr>
                          <td><h4>Ukuran</h4></td>
                          <td><h4>&nbsp;:&nbsp;</h4></td>
                          <td><h4> <?php echo $datapop['ukuran']; ?></h4></td>
                        </tr>
                        <tr>
                          <td><h4>Kategori</h4></td>
                          <td><h4>&nbsp;:&nbsp;</h4></td>
                          <td><h4> <?php echo $datapop['nama_kategori']; ?></h4></td>
                        </tr>
                        <tr>
                          <td><h4>Jenis Batik</h4></td>
                          <td><h4>&nbsp;:&nbsp;</h4></td>
                          <td><h4> <?php echo $datapop['nama_jenis']; ?></h4></td>
                        </tr>
                        </table>
                      <div class="product-page-cart">
                        <button class="btn btn-primary" type="submit">Add to cart</button>
                        <a href="shop-item.html" class="btn btn-default">More details</a>
                      </div>
                    </div>
                  </div>
                </div>
        </div>
        <!-- END fast view of a product -->
      <?php }
    ?>
</body>
<!-- END BODY -->
</html>
