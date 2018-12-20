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
                                    <h4 class="page-title float-left">Tambah Transaksi</h4>

                                    

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
									<div class="card-box">
										<h4 class="header-title">Tambah Pembayaran Kos</h4>
										<?php echo form_open('',array('id'=>'form_tambah_pembayaran')); ?>
                                        <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="lantai" class="control-label">Lantai</label>
                                                                <select name="lantai" class="form-control" id="lantai" required>
                                                                    <option>Pilih Lantai</option>
                                                                <?php
                                                                    foreach ($kamar as $row){       
                                                                ?>    
                                                                    <option value="<?php echo $row->lantai?>"><?php echo $row->lantai ?></option>
                                                                    
                                                                <?php
                                                                    }
                                                                ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="nomor" class="control-label">Nomor Kamar</label>
                                                                <select name="no_kamar" class="form-control" id="no_kamar" required>
                                                                    <option >Nomor</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                        </div>          
                                        <div class="row">      
                                        				<div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="nomor" class="control-label">Pembayaran untuk</label>
                                                                <select name="bulan" class="form-control" id="bulan" required>
                                                                	<option>Pilih</option>
                                                                    <option value="1" >1 Bulan</option>
                                                                    <option value="2" >2 Bulan</option>
                                                                    <option value="3" >3 Bulan</option>
                                                                    <option value="4" >4 Bulan</option>
                                                                    <option value="5" >5 Bulan</option>
                                                                    <option value="6" >6 Bulan</option>
                                                                    <option value="7" >7 Bulan</option>
                                                                    <option value="8" >8 Bulan</option>
                                                                    <option value="9" >9 Bulan</option>
                                                                    <option value="10" >10 Bulan</option>
                                                                    <option value="11" >11 Bulan</option>
                                                                    <option value="12" >12 Bulan</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="nomor" class="control-label"> Bulan</label>
                                                                <select name="bulan_awal" class="form-control" id="bulan_awal" required>
                                                                	<option>Pilih bulan</option>
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

                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="nomor" class="control-label">s/d</label>
                                                                <select name="bulan_akhir" class="form-control" id="bulan_akhir" required>
                                                                	<option>Pilih bulan</option>
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
                                        </div>
                                        <div class="row">
                                        				<div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for=ttl class="control-label"> Tanggal Pembayaran</label>
                                                                <input type="date" class="form-control" id="tgl" name="tgl" required placeholder="Tanggal">
                                                            </div>
                                                        </div>
                                        </div>

                                        <button type="submit" class="btn btn-info waves-effect waves-light">Proses</button>
                                                <?php echo form_close(); ?>
	
									</div>