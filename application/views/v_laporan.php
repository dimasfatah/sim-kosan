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
                                    <h4 class="m-t-0 header-title"><b>Laporan Transaksi</b></h4>
                                    
                                    <br>
                                    <table id="footable" data-page-size="7" class="table table-bordered"> 
                                        <thead>
                                        <tr>
                                            
                                            
                                            <th>No</th>
                                            <th>Keterangan</th>
                                            <th>Debet</th>
                                            <th>Kredit</th>
                                            <th>Tanggal Transaksi</th>
                                        </thead>
                                        <div class="form-inline m-b-20">
                                            <div class="row">
                                                <div class="col-md-6 text-xs-center">
                                                    <div class="form-group">
                                                        <label class="control-label m-r-5">Bulan</label>
                                                        <select id="footable-status" class="form-control input-sm">
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
                                                        <input id="footable-search" type="text" placeholder="Search" class="form-control" autocomplete="on">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <tbody>
                                            </tr>
                                        <?php 
                                                $no = 1;
                                                foreach ($data as $row){       
                                            ?>
                                        <tr>
                                            
                                            <td><?php echo $no ?></td>
                                            <td><?php
                                            if (empty($row->keterangan_pemasukan)&&empty($row->keterangan_pembayaran)) {
                                                echo $row->keterangan_kredit;
                                                }elseif (empty($row->keterangan_pemasukan)&&empty($row->keterangan_kredit)) {
                                                echo $row->keterangan_pembayaran;
                                                }else{
                                                echo $row->keterangan_pemasukan;
                                                }
                                            ?>    
                                            </td>

                                            <td>
                                                <?php
                                                if (empty($row->debit_pemasukan)&&empty($row->debit_pembayaran)) {
                                                    echo "-"; 
                                                 } elseif (empty($row->debit_pembayaran)) {
                                                    echo $row->debit_pemasukan;
                                                 } else{
                                                    echo $row->debit_pembayaran;
                                                    
                                                 }

                                                 
                                                ?>
                                                    
                                            </td>
                                            <td><?php
                                                 if (empty($row->kredit)) {
                                                        echo "-";
                                                    }
                                                  else{
                                                    echo $row->kredit;
                                                  }     
                                                 ?>
                                                
                                            </td>
                                            <td>
                                                <?php
                                                if (empty($row->tanggal_pemasukan)&&empty($row->tanggal_pembayaran)) {
                                                echo $row->tanggal_kredit;
                                                }elseif (empty($row->tanggal_pemasukan)&&empty($row->tanggal_kredit)) {
                                                echo $row->tanggal_pembayaran;
                                                }else{
                                                echo $row->tanggal_pemasukan;
                                                }
                                                ?>
                                            </td>
                                           
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


