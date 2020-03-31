<?php
  session_start();
  error_reporting(1);
  include '../config/koneksi.php';
  ob_start;
  if (trim($_SESSION['leveluser'])=='')
  {
    echo "<script>document.location='../';</script>";
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <?php $r=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM identitas WHERE id = '1'")); ?>
  <link rel="shortcut icon" href="../img/<?php echo "$r[gambar]";?>">
  <title style="text-transform: uppercase;"><?php echo "$r[title]";?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue layout-boxed sidebar-mini" data-spy="scroll" data-target="#scrollspy">
<div class="wrapper">
  <!-- Star menu -->
  <?php include "menu.php";?>
  <!-- End menu -->

  <!-- Start content -->
  <div class='content-wrapper'>
    <!-- Content Header (Page header) -->
    <section class='content-header'>
      <h1>
        Pengaturan
        <small>Control panel</small>
      </h1>
      <ol class='breadcrumb'>
        <li><a href='home'><i class='fa fa-dashboard'></i> Home</a></li>
        <li class='active'>Update Data Pelajar</li>
      </ol>
    </section>
    <?php
      $r=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM users where id_session='$_GET[id]'"));$t = date("d - m - Y", strtotime($r['tgl_lhr']));
    ?>
    <!-- Main content -->
    <section class='content'>
      <div class='row'>
        <div class='col-md-12'>
          <div class='box box-info'>
            <div class='box-header with-border'>
              <h3 class='box-title'><i class='fa fa-edit'></i> Form Edit Data Pelajar</h3>
            </div>
            <form class='form-horizontal' role='form' method=POST action='aksi/pelajar/ubah.php' enctype='multipart/form-data'>
              <input type='hidden' name='id' value='<?php echo "$r[id_session]";?>'>
              <div class='box-body'>
                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Unggah Foto :</label>
                  <div class='col-sm-6'>
                  <img class="img-responsive img-circle img-thumbnail" alt="Responsive image" src="../img/<?php echo "$r[gambar]";?>" width="50px"> <?php echo "$r[gambar]";?>
                    <input type='file' class='form-control' name='gambar'>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Nama : </label>
                  <div class='col-sm-6'>
                    <input type='text' class='form-control' value="<?php echo "$r[nama_lengkap]";?>" name='b'>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-3 control-label'>NIS : </label>
                  <div class='col-sm-4'>
                    <input type='number' class='form-control' value="<?php echo "$r[nis]";?>" name='c'>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-3 control-label'>NISN : </label>
                  <div class='col-sm-4'>
                    <input type='number' class='form-control' value="<?php echo "$r[nisn]";?>" name='d'>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Tempat Lahir : </label>
                  <div class='col-sm-6'>
                    <input type='text' class='form-control' value="<?php echo "$r[tmp_lhr]";?>" name='e'>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Tanggal Lahir : </label>
                  <div class='col-sm-3'>
                    <input type='text' class='form-control' name='f' value="<?php echo "$t"; ?>">
                  </div>
                  <div class='col-sm-3'>
                    <input type='date' class='form-control' name='f'>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Jenis Kelamin : </label>
                  <div class='col-sm-4'>
                    <select name="g" class="form-control">
                      <option value="<?php echo "$r[jk]";?>"><?php echo "$r[jk]";?></option>
                      <option value="0"></option>
                      <option value="Laki-laki">Laki-laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-3 control-label'>No. Telp. : </label>
                  <div class='col-sm-4'>
                    <input type='number' class='form-control' value="<?php echo "$r[no_telp]";?>" name='h'>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Email : </label>
                  <div class='col-sm-6'>
                    <input type='email' class='form-control' value="<?php echo "$r[email]";?>" name='i'>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Alamat : </label>
                  <div class='col-sm-6'>
                    <input type='text' class='form-control' value="<?php echo "$r[alamat]";?>" name='j'>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-3 control-label'></label>
                  <div class='col-sm-6'>
                    <button style="width: 100px" type="submit" name="simpan" class="btn btn-flat btn-primary">SIMPAN</button>
                        <a href="allpelajar"><button style="width: 100px" type="button" class="btn btn-flat btn-danger">BATAL</button></a>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
<!-- End content -->





  <!-- Start footer -->
  <?php include "footer.php";?>
  <!-- End footer -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/js/docs.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="../plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>