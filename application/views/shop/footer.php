<footer>
    <div class="footer-bottom">
        <div id="bottom-footer">
            <!--      <ul class="footer-link">-->
            <!--          <li><a href="#">Home</a></li>-->
            <!--          <li><a href="#">About</a></li>-->
            <!--          <li><a href="#">Work</a></li>-->
            <!--          <li><a href="#">Team</a></li>-->
            <!--          <li><a href="#">Pricing</a></li>-->
            <!--          <li><a href="#">Blog</a></li>-->
            <!--          <li><a href="#">Contact</a></li>-->
            <!--      </ul>-->
            <div class="copyright"> Copyright - <a class="yourstore" href="/"> Shadenco Blinds &copy; 2020 </a></div>
            <div class="footer-bottom-cms">
                <!--        <div class="footer-payment">-->
                <!--          <ul>-->
                <!--            <li class="mastero"><a href="#"><img alt="" src="image/payment/mastero.jpg"></a></li>-->
                <!--            <li class="visa"><a href="#"><img alt="" src="image/payment/visa.jpg"></a></li>-->
                <!--            <li class="currus"><a href="#"><img alt="" src="image/payment/currus.jpg"></a></li>-->
                <!--            <li class="discover"><a href="#"><img alt="" src="image/payment/discover.jpg"></a></li>-->
                <!--          </ul>-->
            </div>
        </div>
  </div>
    </div>
    <a id="scrollup">Scroll</a></footer>
<script src="<?=base_url("assets/moonstore/ms01/javascript/jquery.parallax.js");?>"></script> 
<script src="<?=base_url();?>assets/adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>
<script>
$('body').on('click','.addtocart',function(){
    var csrf = $(this).attr("data-csrf");
    var id = $(this).attr("data-id");
    $.ajax({
            url: "<?=base_url("cart/add");?>/",
            method: "POST",
            data: {
                "id": id,
                "qty": "1",
                "<?=$this->security->get_csrf_token_name();?>": csrf 
            },
            dataType: "json",
            success:function(result){
                $('.csrf').attr("data-csrf",result['csrf_regenerate']);
                if(result['status']) {
                    if ($('.cartul .update').length < 1) {

                        $('.cartul').append('<li style="text-align:center;margin-bottom: 12px" class="update">Telah terjadi perubahan. Silahkan refresh page untuk memperbaharui</li>');

                    }
                    Swal.fire({
                        title: 'Berhasil',
                        text: result['msg'],
                        icon: 'success',
                        showCancelButton: true,
                        cancelButtonColor: '#d33',
                        confirmButtonColor: '#3085d6',
                        cancelButtonText: "Lanjutkan belanja",
                        confirmButtonText: 'Checkout'
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = "<?=base_url("transaction/checkout");?>";
                        }
                    })
                } else {
                    Swal.fire(
                        'Gagal',
                        result['msg'],
                        'error'
                    );
                }
            }
    });
});
$('body').on('click','.deletecart',function(){
    var csrf = $(this).attr("data-csrf");
    var id = $(this).attr("data-id");
    var get = $(this).parent().parent().parent().parent().parent();
    $.ajax({
            url: "<?=base_url("cart/delete");?>/",
            method: "POST",
            data: {
                "id": id,
                "<?=$this->security->get_csrf_token_name();?>": csrf
            },
            dataType: "json",
            success:function(result){
                $('.csrf').attr("data-csrf",result['csrf_regenerate']);
                if(result['status']) {
                    get.remove();
                    var len = $(".cartul li").length;

                    if((len == 1 && $('.cartul .update').length < 1) || (len == 2 && $('.cartul .update').length > 0)) {
                        $(".cartul").html('<li style="text-align: center;margin-bottom: 12px">Keranjang masih kosong</li>');
                        $(".crtitem").html("0");
                        $(".crttotal").html("Rp 0rb");
                    }
                    Swal.fire(
                        'Berhasil',
                        result['msg'],
                        'success'
                    );

                    if($('.cartul .update').length < 1) {

                    $('.cartul').append('<li style="text-align:center;margin-bottom: 12px" class="update">Telah terjadi perubahan. Silahkan refresh page untuk memperbaharui</li>');

                    }
                    
                } else {
                    Swal.fire(
                        'Berhasil',
                        result['msg'],
                        'error'
                    );
                }
            }
    });
});


    jQuery(document).ready(function ($) {
        $('.parallax').parallax();
    });
</script>
</body>
</html>
