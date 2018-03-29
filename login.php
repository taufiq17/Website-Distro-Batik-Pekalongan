<?php
  session_start();
  include 'lib/config.php';
  if (empty($msg)) {
        $msg = "";
    }

    if (isset($_POST['login'])) {
          $name = $_POST["email"];
          $pass = $_POST["pass"];
          $query = mysqli_query($connect, "SELECT * FROM member WHERE email='$name' AND password='$pass'");
          $count = mysqli_num_rows($query);
          if ($count == 1) {
            $data = mysqli_fetch_array($query);
            $_SESSION['member'] = $data['nama_member'];
            $_SESSION['id_member']= $data['id_member'];
            header('location:index.php');
            }else {
                    $msg = "<p class='alert alert-danger'>Email dan sandi tidak cocok!</p>";
            }
        }
?>
    <div class="main">
      <div class="container" style="width: 100%;">
        <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">
            <div class="content-form-page">
              <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-6">
                  <center><h1>Login untuk melanjutkan berbelanja</h1></center>
                  <form class="form-horizontal form-without-legend" role="form" method="post">
                    <div class="form-group">
                      <label for="email" class="col-lg-4 control-label">Email <span class="require">*</span></label>
                      <div class="col-lg-8">
                        <input type="email" class="form-control" name="email" required autofocus>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="password" class="col-lg-4 control-label">Password <span class="require">*</span></label>
                      <div class="col-lg-8">
                        <input type="password" class="form-control" name="pass" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
                        <input type="submit" class="btn btn-primary" name="login" value="Login">
                      </div>
                    </div><br>
                    <div class="row">
                      <div class="col-lg-8 col-md-offset-4 padding-left-0">
                        <p>Belum punya akun? Daftar <a href="register.php">di sini.</a></p>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-10 padding-right-30">
                        <hr>
                        <div class="login-socio">
                            <p class="text-muted">or login using:</p>
                            <ul class="social-icons">
                                <li><a href="javascript:;" data-original-title="facebook" class="facebook" title="facebook"></a></li>
                                <li><a href="javascript:;" data-original-title="Twitter" class="twitter" title="Twitter"></a></li>
                                <li><a href="javascript:;" data-original-title="Google Plus" class="googleplus" title="Google Plus"></a></li>
                                <li><a href="javascript:;" data-original-title="Linkedin" class="linkedin" title="LinkedIn"></a></li>
                            </ul>
                        </div>
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