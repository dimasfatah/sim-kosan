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
                            <h4 class="m-t-0 header-title"><b>Tambah Pengeluaran</b></h4>
                        <div class="row">
                                        <div class="col-12">
                                            <div class="p-20">
                                                <?php echo form_open('',array('id'=>'form_tambah_pengeluaran')); ?>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Keterangan</label>
                                                        <div class="col-7">
                                                            <input type="text" required name="keterangan" id="keterangan" class="form-control" value="" placeholder="Keterangan Pengeluaran">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label" for="example-email">Jumlah Pengeluaran</label>
                                                        <div class="col-7">
                                                            <input type="text" required data-parsley-type="number" id="jumlah_pengeluaran" name="jumlah_pengeluaran" class="form-control" placeholder="Rp.">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Tanggal</label>
                                                        <div class="col-2">
                                                            <input type="date" required name="tgl_pengeluaran" class="form-control" id="tgl_pengeluaran">
                                                        </div>
                                                    </div>

                                                    <button type="submit" class="btn btn-info waves-effect waves-light">Tambahkan</button>
                                                <?php echo form_close(); ?>
                        </div>   
                        </div>                         