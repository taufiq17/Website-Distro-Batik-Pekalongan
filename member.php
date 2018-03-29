<?php
  session_start();
  include 'lib/config.php';

  if ($_SESSION['member']=="Login") {
    header('location:index.php?page=login');
  }

  if (empty($msg)) {
    $msg = "";
  }
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
    <div class="container-fluid">
      <?php
        $query = mysqli_query($connect, "SELECT * FROM member where id_member = '$idm'");
        while ($data = mysqli_fetch_array($query)) {
        ?>
        <div class="col-md-8 col-md-offset-2">
          <center><h2>Data Member</h2></center>
            <?php echo $msg; ?>
          <div class="box box-warning box-solid">
            <div class="box-header">
              <h3 class="box-title"><?php echo $data['nama_member']; ?></h3>
              <div class="box-tools pull-right">
                <a href="logout.php" class="btn btn-box-tool btn-danger">Keluar</a>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover table-responsive">
                <tr>
                  <td>No. ID</td>
                  <td><?php echo $data['nomor_id']; ?></td>
                </tr>
                <tr>
                  <td>Alamat</td>
                  <td>Jalan <?php echo $data['jalan']; ?> Nomor <?php echo $data['nomor']; ?> RT/RW <?php echo $data['rt'].'/'.$data['rw']; ?> Desa <?php echo $data['desa']; ?> Kecamatan <?php echo $data['kecamatan'].' '.$data['kodepos']; ?> Kabupaten <?php echo $data['kabupaten']; ?> Provinsi <?php echo $data['provinsi']; ?></td>
                </tr>
                <tr>
                  <td>No. Telp</td>
                  <td><?php echo $data['no_hp']; ?></td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td><?php echo $data['email']; ?></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <?php }
      ?>
      <div class="col-md-8 col-md-offset-2">
        <div class="box box-success collapsed-box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Perbarui data diri anda</h3>

              <div class="box-tools pull-left">
                <button type="button" class="btn btn-box-tool btn-danger" data-widget="collapse">Perbarui Data</i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="box-body table-responsive no-padding">
                  <form method="post">
                    <div class="col-md-12">
                      <?php echo $msg; ?>
                      <div class="form-group">
                        <label for="id">Nomor KTP/SIM</label>
                        <input type="text" class="form-control" required="true" name="id" placeholder="No identitas" value="<?php echo $datamember['nomor_id']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" class="form-control" required="true" name="nama" placeholder="Nama" value="<?php echo $datamember['nama_member']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="alamat">Alamat Lengkap</label>
                        <div class="input-group">
                          <span class="input-group-addon">Jalan</span>
                          <input type="text" class="form-control" required="true" name="jalan" placeholder="Jalan" value="<?php echo $datamember['jalan']; ?>">
                        </div>
                        <div class="input-group">
                          <span class="input-group-addon">Nomor</span>
                          <input type="text" class="form-control" required="true" name="nomor" placeholder="Nomor" value="<?php echo $datamember['nomor']; ?>">
                        </div>
                        <div class="input-group">
                          <span class="input-group-addon">Desa</span>
                          <input type="text" class="form-control" required="true" name="kel" placeholder="Kelurahan/Desa" value="<?php echo $datamember['desa']; ?>">
                        </div>
                        <div class="input-group">
                          <span class="input-group-addon">RT</span>
                          <input type="text" class="form-control" required="true" name="rt" placeholder="RT" value="<?php echo $datamember['rt']; ?>">
                        </div>
                        <div class="input-group">
                          <span class="input-group-addon">RW</span>
                          <input type="text" class="form-control" required="true" name="rt" placeholder="RT" value="<?php echo $datamember['rw']; ?>">
                        </div>
                        <div class="input-group">
                          <span class="input-group-addon">Kecamatan</span>
                          <input type="text" class="form-control" required="true" name="kec" placeholder="Kecamatan" value="<?php echo $datamember['kecamatan']; ?>">
                        </div>
                        <div class="input-group">
                          <span class="input-group-addon">Kode Pos</span>
                          <input type="text" class="form-control" required="true" name="kode" placeholder="Kode Pos" value="<?php echo $datamember['kodepos']; ?>">
                        </div>
                        <div class="input-group">
                          <span class="input-group-addon">Kabupaten</span>
                          <input type="text" class="form-control" required="true" name="kab" placeholder="Kabupaten/Kota" value="<?php echo $datamember['kabupaten']; ?>">
                        </div>
                        <div class="input-group">
                          <span class="input-group-addon">Provinsi</span>
                          <input type="text" class="form-control" required="true" name="prov" placeholder="Provinsi" value="<?php echo $datamember['provinsi']; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="hp">Nomor Hp</label>
                        <input type="text" class="form-control" required="true" name="hp" placeholder="No. Hp" value="<?php echo $datamember['no_hp']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" required="true" name="email" placeholder="Email" value="<?php echo $datamember['email']; ?>">
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" required="true" name="pass" placeholder="Kata sandi" value="<?php echo $datamember['password']; ?>">
                      </div>
                      <center>
                        <div class="form-group">
                          <div class="col-sm-offset-5 col-sm-4">
                            <button type="submit" name="update" class="btn btn-success">Perbarui</button>
                            <a href="index.php" class="btn btn-danger">Batal</a>
                          </div>
                        </div>
                      </center>
                    </div>
                  </form>
                </div>
            <!-- /.box-body -->
            </div>
          <!-- /.box -->
        </div>
          <!-- /.box -->
      </div>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->