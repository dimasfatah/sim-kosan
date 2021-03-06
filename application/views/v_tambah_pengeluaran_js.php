<script src="<?php echo base_url('plugins/bootstrap-inputmask/bootstrap-inputmask.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('plugins/autoNumeric/autoNumeric.js" type="text/javascript')?>"></script>

<script type="text/javascript">
            jQuery(function($) {
                $('.autonumber').autoNumeric('init');
            });
        </script>
<!-- Parsley js -->
        <script type="text/javascript" src="<?php echo base_url('plugins/parsleyjs/parsley.min.js')?>"></script>
<!-- Sweet-Alert  -->
        <script src="<?php echo base_url('plugins/sweet-alert2/sweetalert2.min.js')?>"></script>

        <script>
        	$(document).ready(function(){
        		//parsley        
                $('form_tambah_pengeluaran').parsley();   

                $("#form_tambah_pengeluaran").submit(function(e){
                    e.preventDefault();
                    var keterangan = $('#keterangan').val();
                    var nominal= $('#jumlah_pengeluaran').val();
                    var tgl_kredit = $('#tgl_pengeluaran').val();
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url('api/api/proses_tambah_pengeluaran')?>',
                                                
                        data:{
                            keterangan :keterangan ,
                            nominal :nominal ,
                            tgl_kredit :tgl_kredit
                        },
                        success:function(data)
                        {
                            $('#modaltambah').modal('hide');
                            swal(
                                {
                                    title: 'Selesai!',
                                    text: 'Berhasil Menambahkan Pengeluaran!',
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
                              text: 'Lengkapi form yang ada!',
                              showConfirmButton: true,
                              footer: 'Gagal Menambahkan Penghuni'
                            })
                        }
                    })
                });
        	})	
        </script>        