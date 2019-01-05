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
                                    <h4 class="page-title float-left">Pengaturan</h4>

                                    

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="card-box">
                            <h4 class="m-t-0 header-title"><b>Ganti Password</b></h4>
                        <div class="row">
                                        <div class="col-12">
                                            <div class="p-20">
                                                <?php echo form_open('',array('id'=>'form_ganti_password')); ?>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Password saat ini</label>
                                                        <div class="col-7">
                                                            <input type="password" required name="pw_lama" id="pw_lama" class="form-control" value="" placeholder="Password lama">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label">Password Baru</label>
                                                        <div class="col-7">
                                                            <input type="password" required name="pw_baru" id="pw_baru" class="form-control" value="" placeholder="Password baru">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-2 col-form-label"></label>
                                                        <div class="col-7">
                                                            <input  type="password" required name="pw_baru_confirm" id="pw_baru_confirm" class="form-control" value="" placeholder="Ulangi Password baru">
                                                        </div>
                                                        <label class="col-2 col-form-label"></label>
                                                        </div>
                                                            <div class="registrationFormAlert" id="divCheckPasswordMatch">
                                                        </div>
                                                    </div>
                                                    <button type="button" onClick="gantipw()"  class="btn btn-info waves-effect waves-light">Ganti</button>
                                                <?php echo form_close(); ?>
                        </div>   
                        </div>                         