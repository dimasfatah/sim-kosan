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
                        <div id="modaltambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <?php echo form_open('',array('id'=>'form_tambah_penghuni')); ?>
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title">Tambah data penghuni kos</h4>
                                                </div>

                                                <div class="modal-body">
                                                <?php $this->load->view('v_formtambah') ?>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-info waves-effect waves-light">Tambahkan</button>                                                 
                                                </div>
                                                <?php echo form_close(); ?>  
                                            </div>
                                        </div>
                                    </div>
                        <!-- /.modal -->

                        <!--modal Edit-->
                        <div id="modaledit_penghuni" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <?php echo form_open('',array('id'=>'form_edit_penghuni')); ?>
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title">Edit data penghuni kos</h4>
                                                </div>

                                                <div class="modal-body">
                                                <?php $this->load->view('v_formedit_penghuni') ?>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-info waves-effect waves-light">Tambahkan</button>                                                 
                                                </div>
                                                <?php echo form_close(); ?>  
                                            </div>
                                        </div>
                                    </div>
                        <!-- /.modal -->


                        <div class="row">
                            <div class="col-12">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>Data Penghuni</b></h4>
                                    <button type="button" data-toggle="modal" data-target="#modaltambah" class="btn btn-secondary btn-bordered waves-effect w-md"> Tambah </button>
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
                                            <th>Action</th>
                                        </tr>    
                                        </thead>
                                        <tbody>
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
                                            <td style="text-align:right;">
                                            <a><button type="button" class="btn btn-info btn-xs edit_penghuni" data="<?php echo $row->id_penghuni ?>">Edit</button></a>
                                            <a><button type="button" class="btn btn-danger btn-xs delete_penghuni" data="<?php echo $row->id_penghuni ?>" >Hapus</button></a>
                                            </td>
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



        