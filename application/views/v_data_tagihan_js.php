        <script type="text/javascript">
            $('select[name="lantai"]').on('change', function(){
                $.ajax({
                    type : 'POST', 
                    url  : '<?php echo base_url('api/api/nokamar_kosong'); ?>',
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
        var save_method;
        function tambah(){
            save_method="tambah";
        }
        function edit(){
            save_method="edit";
        }
        function ingatkan(){
            var id= $(this).attr("data");
            console.log(id);
            //window.open ('https://www.facebook.com', "_newtab" );
        }
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

                //GET UPDATE
                $('button.edit_penghuni').click(function() {
                        var id= $(this).attr("data");
                        $.ajax({
                            type : "GET",
                            url  : "<?php echo base_url('api/api/lihat_tagihan')?>",
                            dataType : "JSON" ,
                            data : {id:id},
                            success: function(data){
                                
                                    $('#modaledit_tagihan').modal('show');
                                    $('[name="id_tagihan"]').val(data.id_tagihan);
                                    $('[name="tagihan_edit"]').val(data.jumlah_tagihan);
                                    
                                
                            }
                        });
                        return false;
                    });

                $('button.ingatkan').click(function() {
                        var no_hp;var alamat;
                        var id= $(this).attr("data");
                        $.ajax({
                            type : "GET",
                            url  : "<?php echo base_url('api/api/lihat_no_hp')?>",
                            dataType : "JSON" ,
                            data : {id:id},
                            success: function(data){
                                no_hp=data.no_telp;
                                alamat="https://api.whatsapp.com/send?phone="+no_hp+"&text=Assalamualaikum%20mas%20"+data.nama_depan+"%0Amohon%20untuk%20segera%20bayar%20kos%20karena%20sudah%20lewat%20dari%20tanggal%20pembayaran";
                                window.open (alamat, "_newtab" );    
                                    
                                
                            }
                        });
                        return false;
                    });    
            })

            function simpan(){
                var url;var form;var modal;var sukses;var gagal;
                
                
                if(save_method == 'tambah') {
                    url = "<?php echo base_url('api/api/tambah_tagihan')?>";
                    form = '#form_tambah_tagihan';
                    modal='#modaltambahtagihan';
                    sukses="Berhasil menambahkan tagihan";
                    gagal="gagal menambahkan tagihan";
                } else {
                    url = "<?php echo base_url('api/api/update_tagihan')?>";
                    form = '#form_edit_tagihan';
                    modal='#modaledit_tagihan';
                    sukses="Berhasil edit tagihan";
                    gagal="gagal edit tagihan";
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
        
        

        <!-- Counter js  -->
        <script src="<?php echo base_url('plugins/waypoints/jquery.waypoints.min.js')?>"></script>
        <script src="<?php echo base_url('plugins/counterup/jquery.counterup.min.js')?>"></script>

        <!--C3 Chart-->
        <script type="text/javascript" src="<?php echo base_url('plugins/d3/d3.min.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url('plugins/c3/c3.min.js')?>"></script>

        <!--Echart Chart-->
        <script src="<?php echo base_url('plugins/echart/echarts-all.js')?>"></script>