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
                            <div class="col-12">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>Data Tagihan</b></h4>
                                    <button type="button" href="alslsl.html" class="btn btn-secondary btn-bordered waves-effect w-md"> Tambah </button>
                                    <br>
                                    <table id="datatable" class="table table-bordered">
                                        <thead>
                                        <tr>
                                            
                                            
                                            <th>Lantai</th>
                                            <th>No Kamar</th>
                                            <th>Jumlah Tagihan</th> 
                                            <th>Batas</th>
                                            <th>Status</th>
                                        </thead>
                                        <tbody>
                                            </tr>
                                        <?php 
                                                foreach ($data as $row){       
                                            ?>
                                        <tr>
                                            
                                            <td><?php echo $row->Lantai ?></td>
                                            <td><?php echo $row->no_kamar ?></td>
                                            <td><?php echo $row->jumlah_tagihan ?></td>
                                            <td><?php echo $row->Batas ?></td>
                                            <td><?php echo $row->status ?></td>
                                        </tr>
                                        <?php
                                              }
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


