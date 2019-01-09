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
                        <div id="modaltambahtagihan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <?php echo form_open('',array('id'=>'form_tambah_tagihan')); ?>
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title">Tambah tagihan kamar kos</h4>
                                                </div>

                                                <div class="modal-body">
                                                <?php $this->load->view('v_formtambahtagihan') ?>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-info waves-effect waves-light" onclick="simpan()">Tambahkan</button>                                                 
                                                </div>
                                                <?php echo form_close(); ?>  
                                            </div>
                                        </div>
                                    </div><!-- /.modal -->
                        <!--modal tambah-->
                        <!--modal Edit-->
                        <div id="modaledit_tagihan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <?php echo form_open('',array('id'=>'form_edit_tagihan')); ?>
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title">Edit Jumlah Tagihan</h4>
                                                </div>

                                                <div class="modal-body">
                                                <?php $this->load->view('v_formedit_tagihan') ?>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-info waves-effect waves-light" onclick="simpan()">Simpan</button>                                                 
                                                </div>
                                                <?php echo form_close(); ?>  
                                            </div>
                                        </div>
                                    </div>
                        <!-- /.modal -->
                        


                        <div class="row">
                            <div class="col-12">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>Data Tagihan</b></h4>
                                    <button type="button" data-toggle="modal" onclick='tambah()' data-target="#modaltambahtagihan" class="btn btn-custom waves-effect w-md"> Tambah </button>
                                    <br>
                                    <table id="datatable" data-page-size="7" class="table table-bordered">
                                        <thead>
                                        <tr>
                                            
                                            <th>No</th>
                                            <th>Lantai</th>
                                            <th>No Kamar</th>
                                            <th>Jumlah Tagihan</th> 
                                            <th>Batas</th>
                                            <th>Pembayaran Terakhir</th>
                                            <th>Action</th>
                                            
                                        </thead>
                                        <br>
                                        <div class="form-inline m-b-20">
                                            <div class="row">
                                                <div class="col-md-6 text-xs-center">
                                                    <div class="form-group">
                                                        <label class="control-label m-r-5">Bulan</label>
                                                        <select id="datatable-status" class="form-control input-sm">
                                                            <option value=""> Show All</option>
                                                            <option value="januari" >Januari</option>
                                                            <option value="februari" >Februari</option>
                                                            <option value="maret" >Maret</option>
                                                            <option value="april" >April</option>
                                                            <option value="mei" >Mei</option>
                                                            <option value="juni" >Juni</option>
                                                            <option value="juli" >Juli</option>
                                                            <option value="agustus" >Agustus</option>
                                                            <option value="september" >September</option>
                                                            <option value="oktober" >Oktober</option>
                                                            <option value="november" >November</option>
                                                            <option value="desember" >Desember</option>
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
                                            </tr>
                                        <?php $no=1;
                                                foreach ($data as $row){       
                                            ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row->Lantai ?></td>
                                            <td><?php echo $row->no_kamar ?></td>
                                            <td><?php echo $row->jumlah_tagihan ?></td>
                                            <td><?php echo $row->Batas ?></td>
                                            <td><?php echo $row->status ?></td>
                                            <td><button type="button" class="btn btn-info btn-xs edit_penghuni" onclick="edit()" data="<?php echo $row->id_tagihan ?>">Edit tagihan</button></td>
                                            
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


