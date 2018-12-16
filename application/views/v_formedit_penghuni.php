                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="nama_depan" class="control-label">Nama Depan</label>
                                                                <input type="hidden" name="id_penghuni" id="id_penghuni">
                                                                <input type="text" class="form-control" required id="nama_depan_edit" name="nama_depan_edit" placeholder="Nama Depan">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="nama_belakang" class="control-label">Nama Belakang</label>
                                                                <input type="text" class="form-control" required id="nama_belakang_edit" name="nama_belakang_edit" placeholder="Nama Belakang">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="alamat_edit" class="control-label">Alamat</label>
                                                                <input type="text" class="form-control" required name="alamat_edit" id="alamat_edit" placeholder="Alamat">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="lantai_edit" class="control-label">Lantai</label>
                                                                <select name="lantai_edit" class="form-control" id="lantai_edit">
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
                                                        <!--<div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="nomor_kamar" class="control-label">Nomor Kamar</label>
                                                                <select name="nomor_kamar" class="form-control" id="nomor_kamar">
                                                                    <option >Nomor</option>
                                                                </select>
                                                            </div>
                                                        </div> -->
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="nomor" class="control-label">Nomor Kamar</label>
                                                                <input data-parsley-type="number" type="text" class="form-control" id="no_kamar_edit" placeholder="No Kamar" name="no_kamar_edit" required>
                                                            </div>
                                                        </div> 
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="plat" class="control-label">Plat Nomor</label>
                                                                <input type="text" class="form-control" id="plat_nomor_edit" name="plat_nomor_edit" placeholder="Ex :P1234AE">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="noktp" class="control-label">Nomor KTP/Identitas</label>
                                                                <input data-parsley-type="number"  type="text" class="form-control" id="no_ktp_edit" name="no_ktp_edit" placeholder="No Identitas">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="nohp" class="control-label">Nomor HP</label>
                                                                <input data-parsley-type="number" data-parsley-minlength="10" type="text" class="form-control" id="no_hp_edit" name="no_hp_edit" placeholder="No HP">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=ttl class="control-label"> Tempat Lahir</label>
                                                                <input type="text" class="form-control" id="ttl_edit" name="ttl_edit" placeholder="Tempat Lahir">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=tanggal_lahir class="control-label">Tanggal Lahir</label>
                                                                <input type="date" name="tgl_edit" class="form-control" id="tgl_edit">
                                                            </div>
                                                        </div>
                                                    </div>