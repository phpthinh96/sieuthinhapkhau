<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SUPER MARKET - ADMIN</title>
    <base href="<?php echo e(asset('')); ?>">
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo e(url('/backend/bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo e(url('/backend/bower_components/metisMenu/dist/metisMenu.min.css')); ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo e(url('/backend/dist/css/sb-admin-2.css')); ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo e(url('/backend/bower_components/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="<?php echo e(url('/backend/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')); ?>" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo e(url('/backend/bower_components/datatables-responsive/css/dataTables.responsive.css')); ?>" rel="stylesheet">

    <script src="<?php echo e(url('/backend/js/ckeditor/ckeditor.js')); ?>"></script>
   
</head>

<body>

    <div id="wrapper">

        <?php echo $__env->make('admin.layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <?php echo $__env->yieldContent('title'); ?>
                    </div>

                    <div class="col-lg-12">  
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>

                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    

    <!-- jQuery -->
    <script src="<?php echo e(url('/backend/bower_components/jquery/dist/jquery.min.js')); ?>"></script>

    <script src="/backend/js/jquery-3.2.1.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo e(url('/backend/bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo e(url('/backend/bower_components/metisMenu/dist/metisMenu.min.js')); ?>"></script>

    <!-- Chart js -->
    

    <script src="<?php echo e(url('/backend/node_modules/chart.js/dist/Chart.js')); ?>"></script>
    <script src="<?php echo e(url('/backend/node_modules/chart.js/dist/Chart.min.js')); ?>"></script>
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.1.1/Chart.min.js"></script> -->

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo e(url('/backend/dist/js/sb-admin-2.js')); ?>"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo e(url('/backend/bower_components/datatables/media/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(url('/backend/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js')); ?>"></script>
    
    <!-- My JavaScript -->
    <script src="<?php echo e(url('/backend/js/myscript.js')); ?>"></script>
    <?php echo $__env->yieldContent('script'); ?>

</body>

</html>
