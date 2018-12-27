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
                                    <button type="button" data-toggle="modal" data-target="#modaltambahkamar" class="btn btn-custom  waves-effect w-md"> Tambah </button>
                                    <br>
                                    <table id="datatable" data-page-size="7" class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Lantai</th>
                                            <th>Nomor Kamar</th>
                                            <th>Kamar Mandi</th>
                                            <th>Luas Kamar(m2)</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            
                                        </tr>    
                                        </thead>
                                        <br>
                                        <div class="form-inline m-b-20">
                                            <div class="row">
                                                <div class="col-md-6 text-xs-center">
                                                    <div class="form-group">
                                                        <label class="control-label m-r-5">Status</label>
                                                        <select id="datatable-status" class="form-control input-sm">
                                                            <option value=""> Show All</option>
                                                            <option value="Kosong" >Kosong</option>
                                                            <option value="Terisi" >Terisi</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                
                                                <div class="col-md-6 text-center text-right">
                                                    <div class="form-group float-right">
                                                        <input id="datatable-search" type="text" placeholder="Search" class="form-control" autocomplete="on">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <tbody>
                                            
                                        <?php $no=1;
                                                foreach ($data as $row){       
                                            ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $row->lantai ?></td>
                                            <td><?php echo $row->no_kamar ?></td>
                                            <td><?php echo $row->kamar_mandi ?></td>
                                            <td><?php echo $row->luas_kamar ?></td>
                                            <td>
                                                <?php
                                                if ($row->status=='Terisi') { ?>
                                                    <span class="label label-table label-danger"><?php echo $row->status ?></span>
                                                    <?php                                                
                                                }else{ ?> 
                                                    <span class="label label-table label-success"><?php echo $row->status ?></span>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td><button type="button" class="btn btn-info btn-xs edit_status_kamar" data="<?php echo $row->id_kamar ?>">Ubah Status</button></a></td>
                                        </tr>
                                        <?php $no++;
                                              }
                                            ?>
                                            
                                        </tbody>
                                        <tfoot>
                                        <tr class="active">
                                            <td colspan="5">
                                                <div class="text-right">
                                                    <ul class="pagination pagination-split footable-pagination m-t-10 m-b-0"></ul>
                                                </div>
                                            </td>
                                        </tr>
                                        </tfoot>
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



        