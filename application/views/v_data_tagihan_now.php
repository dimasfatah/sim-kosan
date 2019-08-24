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
                                <a href="<?php echo base_url('admin/admin/data_tagihan') ?>"><button type="button"  class="btn btn-secondary waves-effect">Tagihan Keseluruhan</button></a>
                                <a href="<?php echo base_url('admin/admin/data_tagihan_now') ?>"><button type="button"  class="btn btn-warning waves-effect">Tagihan Bulan ini</button></a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
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
                                <?php
                                $month=date('m');
                                if ($month == '01'){$bulan ='JANUARI';}
                                else if($month =='02'){$bulan='FEBRUARI';}
                                else if($month =='03'){$bulan='MARET';}
                                else if($month =='04'){$bulan='APRIL';}
                                else if($month =='05'){$bulan='MEI';}
                                else if($month =='06'){$bulan='JUNI';}
                                else if($month =='07'){$bulan='JULI';}
                                else if($month =='08'){$bulan='AGUSTUS';}
                                else if($month =='09'){$bulan='SEPTEMBER';}
                                else if($month =='10'){$bulan='OKTOBER';}
                                else if($month =='11'){$bulan='NOVEMBER';}
                                else {$bulan='DESEMBER';}
                                ?>
                                    <h4 class="m-t-0 header-title"><b>Data Tagihan <?php echo $bulan ?></b></h4>          
                                    
                                    <table id="datatable" data-page-size="7" class="table table-bordered">
                                        <thead>
                                        <tr>
                                            
                                            <th>No</th>
                                            <th>Lantai</th>
                                            <th>No Kamar</th>
                                            <th>Jumlah Tagihan</th> 
                                            <th>Batas</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                            
                                        </thead>
                                        <br>
                                        <div class="form-inline m-b-20">
                                            <div class="row">
                                                <div class="col-md-6 text-xs-center">
                                                    <div class="form-group">
                                                        <label class="control-label m-r-5">Status</label>
                                                        <select id="datatable-status" class="form-control input-sm">
                                                            <option value=""> Show All</option>
                                                            <option value="Lewat jatuh tempo" >Terlambat</option>
                                                            <option value="Belum bayar" >Belum bayar</option>
                    
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
                                                    $tanggal=date('d');
                                                    if($tanggal>$row->Batas) {

                                                    }else{

                                                    }      
                                            ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $row->Lantai ?></td>
                                            <td><?php echo $row->no_kamar ?></td>
                                            <td><?php echo $row->jumlah_tagihan ?></td>
                                            <td><?php echo $row->Batas ?></td>
                                            <?php
                                            $tanggal=date('d');
                                                    if($tanggal>$row->Batas) { $telat=1;?>
                                                        <td><button type="button" class="btn btn-danger btn-xs" >Lewat jatuh tempo</button></td>
                                                        
                                                    <?php    
                                                    }else{ $telat=0;?>
                                                        <td><button type="button" class="btn btn-info btn-xs" >Belum bayar</button></td>
                                                    <?php    
                                                    }
                                            ?>        
                                            <td>
                                            <?php if($telat==1){ ?>
                                            <button type="button" class="btn btn-info btn-xs ingatkan"  data="<?php echo $row->id_kamar ?>">Ingatkan</button>
                                            <?php }
                                            else { ?>
                                            <?php } ?>
                                            </td>
                                            
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


