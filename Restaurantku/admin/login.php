<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>My Restaurant</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
   <body>

    <div class="container">
      <CENTER>
        <div class="col-md-6 col-md-offset-3">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h2><span class="glyphicon glyphicon-book" aria-hidden="true"></span>Restoku</h2>
              <h3>Log in Disini</h3>
            </div>
            <div class="panel-body">
              <div class="alert alert-success">
                <span class="glyphicon glyphicon-info-sign"></span>
                Masukkan Username dan Password yang Sesuai.

              </div>
              <div class="col-md-12">
              <form method="post">            
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Username</span>
                <input type="text" name="user" class="form-control" placeholder="username" aria-describedby="basic-addon1" required="required">
              </div>            
              <br>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Password</span>
                <input type="password" name="password" class="form-control" placeholder="password" aria-describedby="basic-addon1" required="required">
              </div>
              <br>            
              
                <input name="flogin" type="submit" class="btn btn-primary btn-block" value="Login" >
              </form>
                    
                    <?php 
                    if (isset($_POST['flogin'])) {
                        $user = $_POST['user'];
                        $pass = $_POST['password'];

                       $qlogin = mysqli_query($koneksi,"SELECT * FROM tb_level WHERE username='$id_user' AND 
                          password=md5('$pass') ");
                        $cek = mysqli_num_rows($qlogin);
                        $data = mysqli_fetch_array($qlogin);
                        if ($cek < 1) {
                           ?>
                           <div class="alert alert-danger">
                             Maaf,Password dan Username Anda Tidak Cocok .
                           </div>
                    <?php
                        }
                        else{
                          if ($data['status']=="nonaktif") {
                            ?>
                            <br>
                            <div class="alert alert-danger">
                              Anda Dilarang Masuk,Karena Username Anda Tidak Cocok
                            </div>
                            
                            <?php 
                            }
                            elseif ($data['status']=="aktif") {

                              $_SESSION['userweb'] = $data ['id_kasir'];
                              
                              $_SESSION['level']=$data['akses'];

                              if ($data['akses']=="admin") {
                                
                                header('location:admin/index.php');
                              
                              }elseif ($data['akses']=="kasir") {
                                
                                header('location:kasir/index.php');
                              }
                            }
                        }
                     } 
                     ?>
            </div>
            </div>
          </div>
           
        </div>
        </CENTER>
    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
  </html>