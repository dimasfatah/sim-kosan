                                            
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="nama_depan" class="control-label">Nama Depan</label>
                                                                <input type="text" class="form-control" required id="nama_depan" name="nama_depan" placeholder="Nama Depan">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="nama_belakang" class="control-label">Nama Belakang</label>
                                                                <input type="text" class="form-control" required id="nama_belakang" name="nama_belakang" placeholder="Nama Belakang">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="alamat" class="control-label">Alamat</label>
                                                                <input type="text" class="form-control" required name="alamat" id="alamat" placeholder="Alamat">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="lantai" class="control-label">Lantai</label>
                                                                <select name="lantai" class="form-control" id="lantai">
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
                                                                <select name="no_kamar" class="form-control" id="no_kamar">
                                                                    <option >Nomor</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <!--
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="nomor" class="control-label">Nomor Kamar</label>
                                                                <input data-parsley-type="number" type="text" class="form-control" id="no_kamar" placeholder="No Kamar" name="no_kamar" required>
                                                            </div>
                                                        </div> -->
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label for="plat" class="control-label">Plat Nomor</label>
                                                                <input type="text" class="form-control" id="plat" name="plat" placeholder="Ex :P1234AE">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="noktp" class="control-label">Nomor KTP/Identitas</label>
                                                                <input data-parsley-type="number"  type="text" class="form-control" id="no_ktp" name="no_ktp" placeholder="No Identitas">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="nohp" class="control-label">Nomor HP</label>
                                                                <input data-parsley-type="number" data-parsley-minlength="10" type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No HP">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=ttl class="control-label"> Tempat Lahir</label>
                                                                <input type="text" class="form-control" id="ttl" name="ttl" required placeholder="Tempat Lahir">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for=tanggal_lahir class="control-label">Tanggal Lahir</label>
                                                                <input type="date" required name="tgl" class="form-control" id="tgl">
                                                            </div>
                                                        </div>
                                                    </div>