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
        <!-- Sweet-Alert  -->
        <script src="<?php echo base_url('plugins/sweet-alert2/sweetalert2.min.js')?>"></script>

        
        <script>
        	// Filtering
			// -----------------------------------------------------------------
		$(document).ready(function(){
			var filtering = $('#footable');
			filtering.footable().on('footable_filtering', function (e) {
				var selected = $('#footable-status').find(':selected').val();
				e.filter += (e.filter && e.filter.length > 0) ? ' ' + selected : selected;
				e.clear = !e.filter;
			});

			// Filter status
			$('#footable-status').change(function (e) {
				e.preventDefault();
				filtering.trigger('footable_filter', {filter: $(this).val()});
			});

            $('#footable-tahun').change(function (e) {
				e.preventDefault();
				filtering.trigger('footable_filter', {filter: $(this).val()});
			});

			// Search input
			$('#footable-search').on('input', function (e) {
				e.preventDefault();
				filtering.trigger('footable_filter', {filter: $(this).val()});
			});

			
            $("#form_cetak_laporan").submit(function(e){
                    e.preventDefault();
                    var bulan = $('#bulan').val();
                    var tahun= $('#tahun').val();
                    var format=$('#format').val();
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url('admin/admin/pdf_laporan')?>',
                                                
                        data:{
                            bulan :bulan ,
                            tahun :tahun ,
                            format:format   
                        },
                        success:function(data)
                        {
                            document.getElementById('form_cetak_laporan').reset();   
                        },
                        error:function()
                        {
                            //alert('error');
                            swal({
                              type: 'error',
                              title: 'Oops...',
                              text: 'Lengkapi form yang ada!',
                              showConfirmButton: true,
                              footer: 'Gagal cetak laporan'
                            })
                        }
                    })
                });            
		});

        </script>

        <!--FooTable Example-->
        <script src="<?php echo base_url('assets/pages/jquery.footable.js')?>"></script>