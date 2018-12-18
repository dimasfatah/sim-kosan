        <script type="text/javascript">
            $('select[name="lantai"]').on('change', function(){
                $.ajax({
                    type : 'POST', 
                    url  : '<?php echo base_url('admin/admin/nokamar'); ?>', 
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
        
        
        <script>
            $(document).ready(function(){
                //datatable
                $('#datatable').DataTable();
                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf', 'colvis']
                });

                table.buttons().container()
                        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
                //parsley        
                $('form').parsley();        
                //tambah penghuni
                $("#form_tambah_penghuni").submit(function(e){
                    e.preventDefault();
                    var lantai = $('#lantai').val();
                    var no_kamar= $('#no_kamar').val();
                    var nama_depan = $('#nama_depan').val();
                    var nama_belakang= $('#nama_belakang').val();
                    var no_ktp= $('#no_ktp').val();
                    var plat= $('#plat').val();
                    var alamat= $('#alamat').val();
                    var no_hp= $('#no_hp').val();
                    var ttl= $('#ttl').val();
                    var tgl= $('#tgl').val();
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url('admin/admin/tambah_penghuni')?>',
                                                
                        data:{
                            lantai:lantai ,
                            no_kamar:no_kamar ,
                            nama_depan:nama_depan ,
                            nama_belakang:nama_belakang ,
                            no_ktp:no_ktp ,
                            plat:plat ,
                            alamat:alamat ,
                            no_hp:no_hp ,
                            ttl:ttl ,
                            tgl:tgl
                        },
                        success:function(data)
                        {
                            $('#modaltambah').modal('hide');
                            swal(
                                {
                                    title: 'Selesai!',
                                    text: 'Berhasil Menambahkan Penghuni!',
                                    type: 'success',
                                    confirmButtonColor: '#4fa7f3',
                                    allowOutsideClick: false
                                }    
                            )
                            
                        },
                        error:function()
                        {
                            //alert('error');
                            swal({
                              type: 'error',
                              title: 'Oops...',
                              text: 'Lengkapi form yang ada!',
                              showConfirmButton: true,
                              footer: 'Gagal Menambahkan Penghuni'
                            })
                        }
                    }).then(function(){
                        location.reload();
                    });
                });
                            
                    //GET UPDATE
                    $('button.edit_penghuni').click(function() {
                        var id= $(this).attr("data");
                        $.ajax({
                            type : "GET",
                            url  : "<?php echo base_url('admin/admin/lihat_penghuni')?>",
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

                    //tambah penghuni
                    $("#form_edit_penghuni").submit(function(){
                        var id = $('#id_penghuni').val();
                        var lantai = $('#lantai_edit').val();
                        var no_kamar= $('#no_kamar_edit').val();
                        var nama_depan = $('#nama_depan_edit').val();
                        var nama_belakang= $('#nama_belakang_edit').val();
                        var no_ktp= $('#no_ktp_edit').val();
                        var plat= $('#plat_nomor_edit').val();
                        var alamat= $('#alamat_edit').val();
                        var no_hp= $('#no_hp_edit').val();
                        var ttl= $('#ttl_edit').val();
                        var tgl= $('#tgl_edit').val();
                        $.ajax({
                            type: "POST",
                            url: '<?php echo base_url('admin/admin/update_penghuni')?>',
                                                    
                            data:{
                                id_penghuni : id_penghuni ,
                                lantai:lantai ,
                                no_kamar:no_kamar ,
                                nama_depan:nama_depan ,
                                nama_belakang:nama_belakang ,
                                no_ktp:no_ktp ,
                                plat:plat ,
                                alamat:alamat ,
                                no_hp:no_hp ,
                                ttl:ttl ,
                                tgl:tgl
                            },
                            success:function(data)
                            {
                                $('#modaltambah').modal('hide');
                                swal(
                                    {
                                        title: 'Selesai!',
                                        text: 'Berhasil Edit Data Penghuni!',
                                        type: 'success',
                                        confirmButtonColor: '#4fa7f3',
                                        allowOutsideClick: false
                                    }    
                                )
                                
                            },
                            error:function()
                            {
                                //alert('error');
                                swal({
                                  type: 'error',
                                  title: 'Oops...',
                                  text: 'Lengkapi form yang ada!',
                                  showConfirmButton: true,
                                  footer: 'Gagal Menambahkan Penghuni'
                                })
                            }
                        }).then(function(){
                            //location.reload();
                        });
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
                        url: "<?php echo base_url('admin/admin/delete_penghuni')?>",
                        type: "POST",
                        dataType:"JSON",
                        data: {id_penghuni:id},
                        success: function(data){
                            swal("Deleted!", "Data penghuni berhasil dihapus!", "success");
                        },
                      
                        error:function(data) {
                        swal("Oops", "We couldn't connect to the server!", "error");
                        }
                    }).then(function(){
                        location.reload();
                    });
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