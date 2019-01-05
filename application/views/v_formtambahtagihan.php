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
                                                        <div class="col-md-4">
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
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="noktp" class="control-label">Tagihan per bulan</label>
                                                                <input data-parsley-type="number" required  type="text" class="form-control" id="tagihan" name="tagihan" placeholder="Rp.">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="batas" class="control-label">Tanggal Pembayaran</label>
                                                                <select name="batas" class="form-control" id="batas" required>
                                                                    <option value="" >Pilih</option>
                                                                    <?php for ($i=1; $i <= 31 ; $i++) { ?>
                                                                        <option value="<?php echo $i ?>" ><?php echo $i ?></option> 
                                                                    <?php    
                                                                    } ?>
                                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>