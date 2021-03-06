<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="<?php echo e(asset('')); ?>">
    <title>SUPER MARKET</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo e(url('/backend/bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo e(url('/backend/bower_components/metisMenu/dist/metisMenu.min.css')); ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo e(url('/backend/dist/css/sb-admin-2.css')); ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo e(url('/backend/bower_components/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css">

     <!-- Capcha -->
    <script src='https://www.google.com/recaptcha/api.js?hl=vi'></script>

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Đăng nhập</h3>
                    </div>
                    <div class="panel-body">
                        <?php if(session('thongbao')): ?>
                            <div class="alert alert-danger">
                                <?php echo e(session('thongbao')); ?>

                            </div>
                        <?php endif; ?>
                        <form  action="admin/login" method="POST">
                        <?php echo e(csrf_field()); ?>

                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" name="email" value="<?php echo old('email'); ?>" placeholder="Email" />
                                    <div style="color: red">
                                        <?php echo $errors->first('email'); ?>

                                    </div> 
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" />
                                    <div style="color: red;">
                                        <?php echo $errors->first('password'); ?>

                                    </div> 
                                </div>
                                <div class="g-recaptcha form-group" data-sitekey="6LeA808UAAAAAOXRLeNNJ8Sf2nwwTJXh8LaZMj_L"></div> 
                                <button type="submit" class="btn btn-lg btn-success btn-block">Đăng nhập</button>

                            </fieldset>
                             
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo e(url('/backend/bower_components/jquery/dist/jquery.min.js')); ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo e(url('/backend/bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo e(url('/backend/bower_components/metisMenu/dist/metisMenu.min.js')); ?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo e(url('/backend/dist/js/sb-admin-2.js')); ?>"></script>

</body>

</html>
