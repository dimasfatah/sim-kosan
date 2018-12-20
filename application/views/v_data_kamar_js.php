        
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
                $("#form_tambah_kamar").submit(function(e){
                    e.preventDefault();
                    var lantai = $('#lantai').val();
                    var no_kamar= $('#no_kamar').val();
                    var kamar_mandi= $('#kamar_mandi').val();
                    var luas_kamar= $('#luas_kamar').val();
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url('admin/admin/tambah_kamar')?>',
                                                
                        data:{
                            lantai:lantai ,
                            no_kamar:no_kamar ,
                            kamar_mandi:kamar_mandi ,
                            luas_kamar:luas_kamar
                        },
                        success:function(data)
                        {
                            swal(
                                {
                                    title: 'Selesai!',
                                    text: 'Berhasil Menambahkan Kamar!',
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
                              footer: 'Gagal Menambahkan Kamar'
                            })
                        }
                    })
                });
                            
                    //GET UPDATE
                    $('button.edit_kamar').click(function() {
                        var id= $(this).attr("data");
                        $.ajax({
                            type : "GET",
                            url  : "<?php echo base_url('admin/admin/lihat_kamar')?>",
                            dataType : "JSON" ,
                            data : {id:id},
                            success: function(data){
                                
                                    $('#modaledit_kamar').modal('show');
                                    $('[name="id_kamar"]').val(data.id_kamar);
                                    $('[name="lantai_edit"]').val(data.lantai);
                                    $('[name="no_kamar_edit"]').val(data.no_kamar);                                  
                                    $('[name="kamar_mandi"]').val(data.kamar_mandi);
                                    $('[name="luas_kamar"]').val(data.luas_kamar);
                                
                            }
                        });
                        return false;
                    });

                $('button.delete_kamar').click(function() {
                    var id = $(this).attr("data");
                    deletepenghuni(id);
                  });

                  function deletepenghuni(id) {
                    swal({
                      title: "Apakah anda yakin?", 
                      text: "Anda akan menghapus kamar ini dari database kosan", 
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonText:"Ya, Hapus kamar!",
                      confirmButtonColor:"#ec6c62"
                    }).then(function() {
                      $.ajax({
                        url: "<?php echo base_url('admin/admin/delete_kamar')?>",
                        type: "POST",
                        dataType:"JSON",
                        data: {id_kamar:id},
                        success: function(data){
                            swal("Deleted!", "Data kamar berhasil dihapus!", "success");
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
        
        

        <!-- Counter js  -->
        <script src="<?php echo base_url('plugins/waypoints/jquery.waypoints.min.js')?>"></script>
        <script src="<?php echo base_url('plugins/counterup/jquery.counterup.min.js')?>"></script>

        <!--C3 Chart-->
        <script type="text/javascript" src="<?php echo base_url('plugins/d3/d3.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('plugins/c3/c3.min.js')?>"></script>

        <!--Echart Chart-->
        <script src="<?php echo base_url('plugins/echart/echarts-all.js')?>"></script>