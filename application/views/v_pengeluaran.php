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
                            <div class="col-3">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>Data Kamar Setiap Lantai</b></h4>
                                    <!-- <button type="button" href="alslsl.html" class="btn btn-secondary btn-bordered waves-effect w-md"> Tambah </button> -->
                                    <br>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Nama Kamar</th>
                                            <th>Jumlah Kamar Setiap Lantai</th>
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
                            <div class="col-3">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>Data Kamar = <?php echo $kamar->jumlah; ?></b></h4>
                                    <!-- <button type="button" href="alslsl.html" class="btn btn-secondary btn-bordered waves-effect w-md"> Tambah </button> -->
                                    <br>
                                    
                                        <thead>
                                        <tr>
                                            <th>Jumlah Kamar</th>
                                        </thead>
                                        <tbody>
                                            </tr>
                                         <!-- ?php
                                                foreach ($count as $row){       
                                            ?>  -->
                                        <tr>
                                            <td></td>
                                            <!-- <td><?php echo $count; ?></td> -->
                                        </tr>
                                        <?php
                                              
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>Data Kamar</b></h4>
                                    <!-- <button type="button" href="alslsl.html" class="btn btn-secondary btn-bordered waves-effect w-md"> Tambah </button> -->
                                    <br>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Jumlah Kamar Terisi</th>
                                        </thead>
                                        <tbody>
                                            </tr>
                                         <!-- ?php
                                                foreach ($count as $row){       
                                            ?>  -->
                                        <tr>
                                            <td><?php echo $isi->jumlah; ?></td>
                                            <!-- <td><?php echo $count; ?></td> -->
                                        </tr>
                                        <?php
                                              
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>Data Penghuni</b></h4>
                                    <!-- <button type="button" href="alslsl.html" class="btn btn-secondary btn-bordered waves-effect w-md"> Tambah </button> -->
                                    <br>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Jumlah Penghuni</th>
                                        </thead>
                                        <tbody>
                                            </tr>
                                         <!-- ?php
                                                foreach ($count as $row){       
                                            ?>  -->
                                        <tr>
                                            <td><?php echo $count->jumlah; ?></td>
                                            <!-- <td><?php echo $count; ?></td> -->
                                        </tr>
                                        <?php
                                              
                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
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



        