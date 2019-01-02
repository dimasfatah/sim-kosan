                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="username" class="control-label">Username</label>
                                                                <input type="hidden" name="username" id="username">
                                                                <input type="text" class="form-control" required id="username_edit" name="username_edit" placeholder="Username">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="password" class="control-label">Password</label>
                                                                <input type="text" class="form-control" required id="password_edit" name="password_edit" placeholder="Password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="level_edit" class="control-label">Level</label>
                                                                <select name="level_edit" class="form-control" id="level_edit">
                                                                    <option>Pilih Level</option>
                                                                <?php
                                                                    foreach ($level as $row){       
                                                                ?>    
                                                                    <option value="<?php echo $row->lantai?>"><?php echo $row->level ?></option>
                                                                    
                                                                <?php
                                                                    }
                                                                ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                            
                                                    </div>