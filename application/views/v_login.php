<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Login - SIMKOSAN</title>
        

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.ico')?>">

        <!-- App css -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css" rel="stylesheet" type="text/css')?>" />
        <link href="<?php echo base_url('assets/css/icons.css" rel="stylesheet" type="text/css')?>" />
        <link href="<?php echo base_url('assets/css/metismenu.min.css" rel="stylesheet" type="text/css')?>" />
        <link href="<?php echo base_url('assets/css/style.css" rel="stylesheet" type="text/css')?>" />

        <script src="<?php echo base_url('assets/js/modernizr.min.js')?>"></script>

    </head>


    <body class="bg-accpunt-pages">
    <img src="<?php echo base_url('assets/images/bg-profile.png')?>" alt="" height="30">

        <!-- HOME -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page">

                            <div class="account-pages">
                                <div class="account-box">
                                    <div class="account-logo-box">
                                        <h2 class="text-uppercase text-center">
                                            <a href="index.html" class="text-success">
                                                <span><img src="<?php echo base_url('assets/images/logo_dark.png')?>" alt="" height="30"></span>
                                            </a>
                                        </h2>
                                        <h5 class="text-uppercase font-bold m-b-5 m-t-50">Sign In</h5>
                                        <p class="m-b-0">Login to your Admin account</p>
                                    </div>
                                    <div class="account-content">
                                        <form class="form-horizontal" method="post" action="<?php echo base_url('auth/login'); ?>" role="login" >
                                        <?php
                                            //menampilkan error menggunakan alert javascript
                                            if(isset($error)){
                                            echo '<script>
                                            alert("'.$error.'");
                                            </script>';
                                            }
                                        ?>

                                            <div class="form-group m-b-20 row">
                                                <div class="col-12">
                                                    <label for="username">Username</label>
                                                    <input class="form-control" type="text" name="username" required placeholder="Username">
                                                </div>
                                            </div>

                                            <div class="form-group row m-b-20">
                                                <div class="col-12">
                                                    
                                                    <label for="password">Password</label>
                                                    <input class="form-control" type="password" name="password" required placeholder="Enter your password">
                                                </div>
                                            </div>

                                            <div class="form-group row m-b-20">
                                                <div class="col-12">

                                                    

                                                </div>
                                            </div>

                                            <div class="form-group row text-center m-t-10">
                                                <div class="col-12">
                                                    <button class="btn btn-md btn-block btn-primary waves-effect waves-light" name="submit" type="submit" value="login">Sign In</button>
                                                </div>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                            <!-- end card-box-->


                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
          </section>
          <!-- END HOME -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/tether.min.js');?>"></script><!-- Tether for Bootstrap -->
        <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/metisMenu.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/waves.js');?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.slimscroll.js');?>"></script>

        <!-- App js -->
        <script src="<?php echo base_url('assets/js/jquery.core.js');?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.app.js');?>"></script>

    </body>
</html>