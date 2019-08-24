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
                $('form_tambah_pemasukan').parsley();   

                $("#form_tambah_pemasukan").submit(function(e){
                    e.preventDefault();
                    var keterangan = $('#keterangan').val();
                    var nominal= $('#jumlah_pemasukan').val();
                    var tgl_pemasukan = $('#tgl_pemasukan').val();
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url('api/api/proses_tambah_pemasukan')?>',
                                                
                        data:{
                            keterangan :keterangan ,
                            nominal :nominal ,
                            tgl_pemasukan :tgl_pemasukan
                        },
                        success:function(data)
                        {
                            $('#modaltambah').modal('hide');
                            swal(
                                {
                                    title: 'Selesai!',
                                    text: 'Berhasil Menambahkan pemasukan!',
                                    type: 'success',
                                    confirmButtonColor: '#4fa7f3',
                                    allowOutsideClick: false
                                }    
                            )
                            document.getElementById('form_tambah_pemasukan').reset();
                            
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