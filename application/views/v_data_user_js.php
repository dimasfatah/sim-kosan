<!-- Parsley js -->
        <script type="text/javascript" src="<?php echo base_url('plugins/parsleyjs/parsley.min.js')?>"></script>
        <!-- Required datatable js -->
        <script src="<?php echo base_url('plugins/datatables/jquery.dataTables.min.js')?>"></script>
        <script src="<?php echo base_url('plugins/datatables/dataTables.bootstrap4.min.js')?>"></script>
        <!-- Buttons examples -->
        <script src="<?php echo base_url('plugins/datatables/dataTables.buttons.min.js')?>"></script>
        <script src="<?php echo base_url('plugins/datatables/buttons.bootstrap4.min.js')?>"></script>
        <script src="<?php echo base_url('plugins/datatables/jszip.min.js')?>"></script>
        <script src="<?php echo base_url('plugins/datatables/pdfmake.min.js')?>"></script>
        <script src="<?php echo base_url('plugins/datatables/vfs_fonts.js')?>"></script>
        <script src="<?php echo base_url('plugins/datatables/buttons.html5.min.js')?>"></script>
        <script src="<?php echo base_url('plugins/datatables/buttons.print.min.js')?>"></script>
        <script src="<?php echo base_url('plugins/datatables/buttons.colVis.min.js')?>"></script>
        <!-- Responsive examples -->
        <script src="<?php echo base_url('plugins/datatables/dataTables.responsive.min.js')?>"></script>
        <script src="<?php echo base_url('plugins/datatables/responsive.bootstrap4.min.js')?>"></script>

        <!-- Sweet-Alert  -->
        <script src="<?php echo base_url('plugins/sweet-alert2/sweetalert2.min.js')?>"></script>
        <!-- Sweet Alert -->
        
        <!--<script type="text/javascript">
            $(document).ready(function(){
            $("#submit").click(function(){
            $("#form").submit();  // jQuey's submit function applied on form.
            });
            });
        </script>-->
        
        
        <script>
            $(document).ready(function(){
                //datatable
                //$('#datatable').DataTable();
                //Buttons examples
                var table_user = $('#datatable').DataTable({
                });
                //parsley        
                //$('form').parsley();        
                //tambah penghuni
                $("#form_tambah_user").submit(function(e){
                    e.preventDefault();
                    var id = $('#id_user').val();
                    var username = $('#username').val();
                    var password= $('#password').val();
                    var level = $('#level').val();
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url('admin/superadmin/tambah_user')?>',
                                                
                        data:{
                            id_user:id_user ,
                            username:username ,
                            password:password ,
                            level:level ,
                        },
                        success:function(data)
                        {
                            $('#modaltambah').modal('hide');
                            swal(
                                {
                                    title: 'Selesai!',
                                    text: 'Berhasil Menambahkan User!',
                                    type: 'success',
                                    confirmButtonColor: '#4fa7f3',
                                    allowOutsideClick: false
                                }
                            ).then(function(){
                                location.reload();
                            })
                            
                        },
                        error:function()
                        {
                            //alert('error');
                            swal({
                              type: 'error',
                              title: 'Oops...',
                              text: 'Lengkapi form yang ada!',
                              showConfirmButton: true,
                              footer: 'Gagal Menambahkan User'
                            })
                        }
                    })
                });
                            
                    //GET UPDATE
                    $('button.edit_user').click(function() {
                        var id= $(this).attr("data");
                        $.ajax({
                            type : "GET",
                            url  : "<?php echo base_url('admin/superadmin/lihat_user')?>",
                            dataType : "JSON" ,
                            data : {id:id},
                            success: function(data){
                                
                                    $('#modaledit_user').modal('show');
                                    $('[name="username_edit"]').val(data.username);
                                    $('[name="password_edit"]').val(data.password);
                                    $('[name="level_edit"]').val(data.level);
                                
                            }
                        });
                        return false;
                    });

                    //edit penghuni
                    $("#form_edit_user").submit(function(e){
                    e.preventDefault();
                        var username = $('#username_edit').val();
                        var password = $('#password_edit').val();
                        var level = $('#level_edit').val(); 
                        $.ajax({
                            type: "POST",
                            url: '<?php echo base_url('admin/superadmin/update_user')?>',
                                                    
                            data:{
                                username:username ,
                                password:password ,
                                level:level ,
                            },
                            success:function(data)
                            {
                                $('#modaltambah').modal('hide');
                                swal(
                                    {
                                        title: 'Selesai!',
                                        text: 'Berhasil Edit Data User!',
                                        type: 'success',
                                        confirmButtonColor: '#4fa7f3',
                                        allowOutsideClick: false
                                    }    
                                ).then(function(){
                                    location.reload();
                                });
                                
                            },
                            error:function()
                            {
                                //alert('error');
                                swal({
                                  type: 'error',
                                  title: 'Oops...',
                                  text: 'Lengkapi form yang ada!',
                                  showConfirmButton: true,
                                  footer: 'Gagal Menambahkan User'
                                })
                            }
                        })
                    });

                $('button.delete_user').click(function() {
                    var id = $(this).attr("data");
                    deleteuser(id);
                  });

                  function deleteuser(id) {
                    swal({
                      title: "Apakah anda yakin?", 
                      text: "Anda akan menghapus user ini dari database kosan", 
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonText:"Ya, Hapus user!",
                      confirmButtonColor:"#ec6c62"
                    }).then(function() {
                      $.ajax({
                        url: "<?php echo base_url('admin/superadmin/delete_user')?>",
                        type: "POST",
                        dataType:"JSON",
                        data: {id_user:id},
                        success: function(data){
                            swal("Deleted!", "Data user berhasil dihapus!", "success").then(function(){
                                location.reload();
                            });
                        },
                      
                        error:function(data) {
                        swal("Oops", "We couldn't connect to the server!", "error");
                        }
                    })
                  });
                }
            });
        </script>

        
        

        <!-- ajax -->
        <script>
          
        </script>
        

        <!-- Counter js  -->
        <script src="<?php echo base_url('plugins/waypoints/jquery.waypoints.min.js')?>"></script>
        <script src="<?php echo base_url('plugins/counterup/jquery.counterup.min.js')?>"></script>

        <!--C3 Chart-->
        <script type="text/javascript" src="<?php echo base_url('plugins/d3/d3.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('plugins/c3/c3.min.js')?>"></script>

        <!--Echart Chart-->
        <script src="<?php echo base_url('plugins/echart/echarts-all.js')?>"></script>