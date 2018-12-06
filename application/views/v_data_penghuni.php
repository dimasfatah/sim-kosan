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
                                    <h4 class="m-t-0 header-title"><b>Data Penghuni</b></h4>
                                    <button type="button" href="alslsl.html" class="btn btn-secondary btn-bordered waves-effect w-md"> Tambah </button>
                                    <br>
                                    <table id="datatable" class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Kamar</th>
                                            <th>No HP</th>
                                            <th>Alamat</th>
                                            <th>TTL</th>
                                            <th>Plat nomor</th>
                                            <th>No KTP</th>
                                        </thead>
                                        <tbody>
                                            </tr>
                                        <?php
                                                foreach ($data as $row){       
                                            ?>
                                        <tr>
                                            <td><?php echo $row->nama_depan." ".$row->nama_belakang ?></td>
                                            <td><?php echo $row->lantai."  (".$row->no_kamar.")" ?></td>
                                            <td><?php echo $row->no_telp ?></td>
                                            <td><?php echo $row->alamat ?></td>
                                            <td><?php echo $row->tempat_lahir." ".$row->tanggal_lahir ?></td>
                                            <td><?php echo $row->plat_nomor ?></td>
                                            <td><?php echo $row->no_ktp ?></td>
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



        