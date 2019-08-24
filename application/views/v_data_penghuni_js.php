        <script type="text/javascript">
            $('select[name="lantai"]').on('change', function(){
                $.ajax({
                    type : 'POST', 
                    url  : '<?php echo base_url('api/api/nokamar'); ?>',
                    data : {
                        lantai: $(this).val()
                    }, 
                    success : function(option){
                        $('select[name="no_kamar"]').html(option); 
                    }
                }); 
            });
        </script>
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
        
        
        <script type="text/javascript">
        var save_method;
        function tambah(){
            save_method="tambah";
        }
        function edit(){
            save_method="edit";
        }
            $(document).ready(function(){
                //datatable
                //$('#datatable').DataTable();
                //Buttons examples
                var table_penghuni = $('#datatable').DataTable({
                });
                //parsley        
                //$('form').parsley();        

                            
                    //GET UPDATE
                    $('button.edit_penghuni').click(function() {
                        var id= $(this).attr("data");
                        $.ajax({
                            type : "GET",
                            url  : "<?php echo base_url('api/api/lihat_penghuni')?>",
                            dataType : "JSON" ,
                            data : {id:id},
                            success: function(data){
                                
                                    $('#modaledit_penghuni').modal('show');
                                    $('[name="id_penghuni"]').val(data.id_penghuni);
                                    $('[name="nama_depan_edit"]').val(data.nama_depan);
                                    $('[name="nama_belakang_edit"]').val(data.nama_belakang);
                                    $('[name="alamat_edit"]').val(data.alamat);
                                    $('[name="lantai_edit"]').val(data.lantai);
                                    $('[name="no_kamar_edit"]').val(data.no_kamar);
                                    $('[name="plat_nomor_edit"]').val(data.plat_nomor);
                                    $('[name="no_ktp_edit"]').val(data.no_ktp);
                                    $('[name="no_hp_edit"]').val(data.no_telp);
                                    $('[name="ttl_edit"]').val(data.tempat_lahir);
                                    $('[name="tgl_edit"]').val(data.tanggal_lahir);
                                
                            }
                        });
                        return false;
                    });


                $('button.delete_penghuni').click(function() {
                    var id = $(this).attr("data");
                    deletepenghuni(id);
                  });

                  function deletepenghuni(id) {
                    swal({
                      title: "Apakah anda yakin?", 
                      text: "Anda akan menghapus penghuni ini dari database kosan", 
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonText:"Ya, Hapus penghuni!",
                      confirmButtonColor:"#ec6c62"
                    }).then(function() {
                      $.ajax({
                        url: "<?php echo base_url('api/api/delete_penghuni')?>",
                        type: "POST",
                        dataType:"JSON",
                        data: {id_penghuni:id},
                        success: function(data){
                            swal("Deleted!", "Data penghuni berhasil dihapus!", "success").then(function(){
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
            //simpan atau edit penghuni
            function simpan(){
                var url;var form;var modal;var sukses;var gagal;
                
                
                if(save_method == 'tambah') {
                    url = "<?php echo base_url('api/api/tambah_penghuni')?>";
                    form = '#form_tambah_penghuni';
                    modal='#modaltambah';
                    sukses="Berhasil menambahkan penghuni";
                    gagal="gagal menambahkan penghuni";
                } else {
                    url = "<?php echo base_url('api/api/update_penghuni')?>";
                    form = '#form_edit_penghuni';
                    modal='#modaledit_penghuni';
                    sukses="Berhasil edit penghuni";
                    gagal="gagal edit penghuni";
                }
                //ajax adding
                $.ajax({
                url : url,
                type: "POST",
                data: $(form).serialize(),
                success: function(data)
                            {
                                $(modal).modal('hide');
                                swal(
                                    {
                                        title: 'Selesai!',
                                        text: sukses,
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
                                  footer: gagal
                                })
                            }
                });
            }    
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