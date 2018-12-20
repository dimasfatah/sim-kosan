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
                                    <h4 class="page-title float-left">Data Transaksi</h4>

                                        

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-12">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>Pembayaran</b></h4>
                                    
                                    <br>
                                    <table id="datatable" class="table table-bordered"> 
                                        <thead>
                                        <tr>
                                            
                                            
                                            <th>No</th>
                                            <th>Keterangan</th>
                                            <th>Jumlah Pembayaran</th>
                                            <th>Tanggal Pembayaran</th>
                                        </thead>
                                        <tbody>
                                            </tr>
                                        <?php 
                                                $no = 1;
                                                foreach ($data as $row){       
                                            ?>
                                        <tr>
                                            
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $row->keterangan ?></td>
                                            <td><?php echo $row->total_pembayaran ?></td>
                                            <td><?php echo $row->tgl_pembayaran ?></td>
                                           
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


