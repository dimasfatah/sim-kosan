        <script type="text/javascript">
            $('select[name="lantai"]').on('change', function(){
                $.ajax({
                    type : 'POST', 
                    url  : '<?php echo base_url('admin/admin/nokamar_kosong'); ?>',
                    url  : '<?php echo base_url('admin/superadmin/nokamar_kosong'); ?>', 
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
        <!-- Footable -->
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

                //tambah penghuni
                $("#form_tambah_tagihan").submit(function(e){
                    e.preventDefault();
                    var lantai = $('#lantai').val();
                    var no_kamar= $('#no_kamar').val();
                    var tagihan = $('#tagihan').val();
                    var batas= $('#batas').val();
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url('admin/admin/tambah_tagihan')?>',
                        url: '<?php echo base_url('admin/superadmin/tambah_tagihan')?>',
                                                
                        data:{
                            lantai:lantai ,
                            no_kamar:no_kamar ,
                            tagihan:tagihan,
                            batas:batas
                        },
                        success:function(data)
                        {
                            $('#modaltambahtagihan').modal('hide');
                            swal(
                                {
                                    title: 'Selesai!',
                                    text: 'Berhasil Menambahkan Penghuni!',
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
                              footer: 'Gagal Menambahkan Penghuni'
                            })
                        }
                    })
                });
            })
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