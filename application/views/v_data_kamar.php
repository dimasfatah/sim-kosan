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
                        <!--modal tambah-->
                        <div id="modaltambahkamar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <?php echo form_open('',array('id'=>'form_tambah_kamar')); ?>
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title">Tambah data kamar kos</h4>
                                                </div>

                                                <div class="modal-body">
                                                <?php $this->load->view('v_formtambahkamar') ?>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-info waves-effect waves-light">Tambahkan</button>                                                 
                                                </div>
                                                <?php echo form_close(); ?>  
                                            </div>
                                        </div>
                                    </div><!-- /.modal -->




                        <div class="row">
                            <div class="col-12">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>Data Kamar</b></h4>
                                    <button type="button" data-toggle="modal" data-target="#modaltambahkamar" class="btn btn-secondary btn-bordered waves-effect w-md"> Tambah </button>
                                    <br>
                                    <table id="datatable" class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Nomor Kamar</th>
                                            <th>Lantai</th>
                                            <th>Kamar Mandi</th>
                                            <th>Luas Kamar(m2)</th>
                                            
                                        </tr>    
                                        </thead>
                                        <tbody>
                                            
                                        <?php
                                                foreach ($data as $row){       
                                            ?>
                                        <tr>
                                            <td><?php echo $row->no_kamar ?></td>
                                            <td><?php echo $row->lantai ?></td>
                                            <td><?php echo $row->kamar_mandi ?></td>
                                            <td><?php echo $row->luas_kamar ?></td>
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



        