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
                                    <h4 class="m-t-0 header-title"><b>Pengeluaran</b></h4>
                                    
                                    <br>
                                    <table id="datatable" class="table table-bordered"> 
                                        <thead>
                                        <tr>
                                            
                                            
                                            <th>No</th>
                                            <th>Keterangan</th>
                                            <th>Nominal</th>
                                            <th>Tanggal</th>
                                        </thead>
                                        <tbody>
                                            </tr>
                                        <?php   $no=1;
                                                foreach ($data as $row){       
                                            ?>
                                        <tr>
                                            
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $row->keterangan ?></td>
                                            <td><?php echo $row->nominal ?></td>
                                            <td><?php echo $row->tgl_kredit ?></td>
                                           
                                        </tr>
                                        <?php
                                            $no++;
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


