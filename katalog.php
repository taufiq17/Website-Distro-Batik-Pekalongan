
    <div class="main">
      <div class="container" style="width: 100%;">
      <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40 ">
          <?php require 'layout/sidebar.php'; ?>
          <!-- BEGIN CONTENT -->
          <div class="col-md-10 col-sm-8">
            <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
        <div class="row margin-bottom-20">
          
        </div>
        <!-- END SALE PRODUCT & NEW ARRIVALS -->
            <h2>Katalog</h2>
            <?php 
              $perpage = 8;

                if (isset($_GET['hal'])) {
                  $page = $_GET['hal'];
                }else {
                  $page = 1;
                }

                if ($page > 1) {
                  $start = ($page * $perpage) - $perpage;
                }else {
                  $start = 0;
                }

              $querypro = mysqli_query($connect, "SELECT * FROM barang ORDER BY id_barang DESC LIMIT $start, $perpage");
              while ($datapro = mysqli_fetch_array($querypro)) { ?>
              <!-- PRODUCT ITEM START -->
              <div class="col-md-3 margin-bottom-20">
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="img/produk/<?php echo $datapro['foto_barang']; ?>" class="img-responsive" alt="<?php echo $datapro['nama_barang']; ?>">
                    <div>
                      <a href="img/produk/<?php echo $datapro['foto_barang']; ?>" class="btn btn-default fancybox-button">Zoom</a>
                      <a href="#<?php echo $datapro['id_barang']; ?>product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                    </div>
                  </div>
                  <h3><a href="shop-item.html"><?php echo $datapro['nama_barang']; ?></a></h3>
                  <div class="pi-price"><?php echo "Rp ".number_format($datapro['harga'],0,".","."); ?></div>
                  <a href="javascript:;" class="btn btn-default add2cart">Add to cart</a>
                </div>
              </div>
              <!-- PRODUCT ITEM END -->
            <?php  } 
            ?>
          </div>
          <!-- END CONTENT -->
          <div class="container-fluid">
               <div class="row">
                  <div class="col-xs-12">
                    <center>
                    <nav>
                    <ul class="pagination pagination-lg">
                      <?php
                          $query = mysqli_query($connect, "SELECT * FROM barang");
                          $jmlbaris = mysqli_num_rows($query);
                          $halaman = ceil($jmlbaris/$perpage);
                          for($i = 1; $i <=$halaman; $i++){
                            echo "<li><a href='index.php?page=katalog&hal=$i'> $i </a></li>";
                          }
                       ?>
                    </ul>
                  </nav>
                  </center>
                </div>
             </div>
          </div>
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>
    <!-- BEGIN POPUP -->
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