<!-- Sweet-Alert  -->
<script src="<?php echo base_url('plugins/sweet-alert2/sweetalert2.min.js')?>"></script>
<!-- Sweet Alert -->
<script>
$(document).ready(function () {
   $("#pw_baru_confirm").keyup(checkPasswordMatch);
});
function checkPasswordMatch() {
    var password = $("#pw_baru").val();
    var confirmPassword = $("#pw_baru_confirm").val();

    if (password != confirmPassword)
        $("#divCheckPasswordMatch").html("Password tidak cocok!");
    else
        $("#divCheckPasswordMatch").html("Passwords cocok.");
}
function gantipw(){
    var url="<?php echo base_url('api/api/proses_ganti_password')?>";
    var form="#form_ganti_password";

    $.ajax({
                url : url,
                type: "POST",
                data: $(form).serialize(),
                success: function(data)
                            {    
                                swal(
                                    {
                                        title: 'Selesai!',
                                        text: "Password berhasil diganti",
                                        type: 'success',
                                        confirmButtonColor: '#4fa7f3',
                                        allowOutsideClick: false
                                    }    
                                )
                                document.getElementById('form_ganti_password').reset();
                                
                                
                            },
                            error:function()
                            {
                                //alert('error');
                                swal({
                                  type: 'error',
                                  title: 'Oops...',
                                  text: 'Lengkapi form yang ada!',
                                  showConfirmButton: true,
                                  footer: "Isi password dengan benar"
                                })
                            }
                });
}
</script>