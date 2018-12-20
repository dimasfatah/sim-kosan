<!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title float-left">Data Kosan</h4>

                                    

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="card-box widget-box-two widget-two-custom">
                                    <i class="mdi mdi-account-multiple widget-two-icon"></i>
                                    <div class="wigdet-two-content">
                                        <p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Jumlah Kamar</p>
                                        <h2 class="font-600"><!-- <span><i class="mdi mdi-arrow-up"></i></span> --> 
                                            <span data-plugin="counterup"><?php echo $kamar->jumlah; ?></span></h2>
                                        <!-- <p class="m-0">Jan - Apr 2017</p> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="card-box widget-box-two widget-two-custom">
                                    <i class="mdi mdi-account-multiple widget-two-icon"></i>
                                    <div class="wigdet-two-content">
                                        <p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Jumlah Kamar Terisi</p>
                                        <h2 class="font-600"><!-- <span><i class="mdi mdi-arrow-up"></i></span> --> 
                                            <span data-plugin="counterup"><?php echo $isi->jumlah; ?></span></h2>
                                        <!-- <p class="m-0">Jan - Apr 2017</p> -->
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-3 col-md-6">
                                <div class="card-box widget-box-two widget-two-custom">
                                    <i class="mdi mdi-account-multiple widget-two-icon"></i>
                                    <div class="wigdet-two-content">
                                        <p class="m-0 text-uppercase font-bold font-secondary text-overflow" title="Statistics">Jumlah Penghuni</p>
                                        <h2 class="font-600"><!-- <span><i class="mdi mdi-arrow-up"></i></span> --> 
                                            <span data-plugin="counterup"><?php echo $count->jumlah; ?></span></h2>
                                        <!-- <p class="m-0">Jan - Apr 2017</p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                <div class="col-3">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>Data Kamar Setiap Lantai</b></h4>
                                    <!-- <button type="button" href="alslsl.html" class="btn btn-secondary btn-bordered waves-effect w-md"> Tambah </button> -->
                                    <br>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Lantai</th>
                                            <th>Jumlah Kamar</th>
                                        </thead>
                                        <tbody>
                                            </tr>
                                         <?php
                                                foreach ($Lantai as $row){       
                                            ?> 
                                        <tr>
                                            <td><?php echo $row->Lantai; ?></td>
                                            <td><?php echo $row->jumlah; ?></td>
                                        </tr>
                                        <?php
                                             } 
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                                
                            
                            

                           
                        <!-- end row -->




                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    2018 © Perkasa Technocraft
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
            </div>
        <!-- END wrapper -->



        