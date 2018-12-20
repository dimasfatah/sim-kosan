            <!-- Parsley js -->
        <script type="text/javascript" src="<?php echo base_url('plugins/parsleyjs/parsley.min.js')?>"></script>
        <!-- Sweet-Alert  -->
        <script src="<?php echo base_url('plugins/sweet-alert2/sweetalert2.min.js')?>"></script>
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
            <script>
        	$(document).ready(function(){
        		//parsley        
                $('form').parsley();   

                $("#form_tambah_pembayaran").submit(function(e){
                    e.preventDefault();
                    var lantai = $('#lantai').val();
                    var no_kamar = $('#no_kamar').val();
                    var bulan= $('#bulan').val();
                    var bulan_awal= $('#bulan_awal').val();
                    var bulan_akhir= $('#bulan_akhir').val();
                    var tanggal_pembayaran=$('#tgl').val();
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url('admin/admin/proses_tambah_pembayaran')?>',
                                                
                        data:{
                            lantai :lantai ,
                            no_kamar :no_kamar ,
                            bulan :bulan ,
                            bulan_awal :bulan_awal ,
                            bulan_akhir : bulan_akhir,
                            tanggal_pembayaran : tanggal_pembayaran
                        },
                        success:function(data)
                        {
                            $('#modaltambah').modal('hide');
                            swal(
                                {
                                    title: 'Selesai!',
                                    text: 'Berhasil Melakukan Pembayaran!',
                                    type: 'success',
                                    confirmButtonColor: '#4fa7f3',
                                    allowOutsideClick: false
                                }    
                            )
                            document.getElementById('form_tambah_pengeluaran').reset();
                        },
                        error:function()
                        {
                            //alert('error');
                            swal({
                              type: 'error',
                              title: 'Oops...',
                              text: 'Data Kamar tidak ada pada tagihan kos!',
                              showConfirmButton: true,
                              footer: 'Gagal Melakukan Pembayaran'
                            })
                        }
                    })
                });
        	})	
        </script>