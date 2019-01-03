        
        <!-- Parsley js -->
        <!--FooTable-->
        <script src="<?php echo base_url('plugins/footable/js/footable.all.min.js')?>"></script>
        
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

                var filtering = $('#datatable');
                filtering.footable().on('footable_filtering', function (e) {
                    var selected = $('#datatable-status').find(':selected').val();
                    e.filter += (e.filter && e.filter.length > 0) ? ' ' + selected : selected;
                    e.clear = !e.filter;
                });

                // Filter status
                $('#datatable-status').change(function (e) {
                    e.preventDefault();
                    filtering.trigger('footable_filter', {filter: $(this).val()});
                });

                // Search input
                $('#datatable-search').on('input', function (e) {
                    e.preventDefault();
                    filtering.trigger('footable_filter', {filter: $(this).val()});
                });
                //Buttons examples        
                //tambah penghuni
                $("#form_tambah_kamar").submit(function(e){
                    console.log('submit');
                    e.preventDefault();
                    var lantai = $('#lantai').val();
                    var no_kamar= $('#no_kamar').val();
                    var kamar_mandi= $('#kamar_mandi').val();
                    var luas_kamar= $('#luas_kamar').val();
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url('admin/admin/tambah_kamar')?>',
                        url: '<?php echo base_url('admin/superadmin/tambah_kamar')?>',
                                                
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
                              footer: 'Gagal Menambahkan Kamar'
                            })
                        }
                    })
                });
                            
                    
                $('button.edit_status_kamar').click(function() {
                    var id = $(this).attr("data");
                    ubahstatuskamar(id);
                  });

                  function ubahstatuskamar(id) {
                    swal({
                      title: "Apakah anda yakin?", 
                      text: "Anda akan menghapus data penghuni dan tagihan yang berhubungan dengan kamar ini", 
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonText:"Ya, ubah status!",
                      confirmButtonColor:"#ec6c62"
                    }).then(function() {
                      console.log(id);  
                      $.ajax({
                        url: "<?php echo base_url('admin/admin/ubah_status_kamar')?>",
                        url: "<?php echo base_url('admin/superadmin/ubah_status_kamar')?>",
                        type: "POST",
                        data: {id:id},
                        success: function(data){
                            swal("Sukses!", "Status kamar menjadi kosong!", "success").then(function(){
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
        <script src="<?php echo base_url('assets/pages/jquery.footable.js')?>"></script>
        
        

        <!-- Counter js  -->
        <script src="<?php echo base_url('plugins/waypoints/jquery.waypoints.min.js')?>"></script>
        <script src="<?php echo base_url('plugins/counterup/jquery.counterup.min.js')?>"></script>

        <!--C3 Chart-->
        <script type="text/javascript" src="<?php echo base_url('plugins/d3/d3.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('plugins/c3/c3.min.js')?>"></script>

        <!--Echart Chart-->
        <script src="<?php echo base_url('plugins/echart/echarts-all.js')?>"></script>