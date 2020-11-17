
<div class="breadcrumb parallax-container">
  <div class="parallax"><img src="<?=base_url("assets/moonstore/ms01/image/prlx.jpg");?>" alt="#"></div>
  <h1>Checkout</h1>
  <ul>
    <li><a href="<?=base_url();?>">Home</a></li>
    <li>Checkout</li>
  </ul>
</div>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-sm-9" style="float:none;margin:0 auto">
        <div id="accordion" class="panel-group">
            <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#buyerdata" aria-expanded="false">Step 1: Data & Alamat Kirim <i class="fa fa-caret-down"></i></a></h4>
            </div>
            <div id="buyerdata" role="heading" class="panel-collapse collapse in" aria-expanded="false" style="">
                <div class="panel-body">
                    <form action="<?=base_url("transaction/payment");?>" method="post" id="formPayment">
                    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="" data-csrf="<?=$this->security->get_csrf_hash();?>" class="csrf" id="csrf-form">
                    <input type="hidden" name="courier_invoice" id="courier-form" value="">
                    <div class="form-group">
                        <label>No. Handphone</label> :
                        <input type="text" name="hp_invoice" class="form-control" placeholder="Pastikan nomor aktif"/>
                    </div>
                    <div class="form-group">
                        <label>Email</label> :
                        <input type="text" name="email_invoice" class="form-control" placeholder=""/>
                    </div>
                    <div class="form-group">
                        <label>Nama</label> :
                        <input type="text" name="name_invoice" class="form-control" placeholder=""/>
                    </div>
                    <div class="form-group">
                        <label>Provinsi</label> :
                        <select name="provinsi" class="form-control province csrf" data-csrf="<?=$this->security->get_csrf_hash();?>">
                            <option value="">--- Pilih ---</option>
                            <?php
                            foreach($province['rajaongkir']['results'] as $prv) {
                            ?>

                            <option value="<?=$prv['province_id'];?>"><?=$prv['province'];?></option>
                            <?php } ?>

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kota/Kabupaten</label> :
                        <select name="kota" class="form-control city csrf" data-csrf="<?=$this->security->get_csrf_hash();?>" disabled>
                            <option value="">-- Pilih --</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kecamatan</label> :
                        <input type="text" name="kecamatan" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label> :
                        <textarea name="alamat" class="form-control" placeholder=" Nama Jalan, No. Rumah, RT/RW,Kelurahan/Desa"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Kode Pos</label> :
                        <input type="text" name="pos" class="form-control" placeholder=""/>
                    </div>
                </div>
            </div>
            </div>
            <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a class="accordion-toggle collapsed" data-parent="#accordion" data-toggle="collapse" href="#shipping" aria-expanded="false">Step 2: Jasa Pengiriman <i class="fa fa-caret-down"></i></a></h4>
            </div>
            <div id="shipping" role="heading" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                <div class="panel-body">
                    <div class="courier">
                    </div>
                </div>
            </div>
            </div>
            <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a class="accordion-toggle collapsed" data-parent="#accordion"
                                           data-toggle="collapse" href="#collapse-checkout-option"
                                           aria-expanded="false">Step 3: Ringkasan <i class="fa fa-caret-down"></i></a>
                </h4>
            </div>
                <div id="collapse-checkout-option" role="heading" class="panel-collapse collapse" aria-expanded="false"
                     style="height: 0px;">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <td class="text-center">#</td>
                                    <td class="text-center">Nama Produk</td>
                                    <td class="text-center">Motif Pilihan</td>
                                    <td class="text-center">Qty</td>
                                    <td class="text-center">Harga Satuan</td>
                                    <td class="text-center">Sub-Total</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                    $num = 0;
                    foreach($cart['data'] as $crt) {
                        $num++;
                        ?>

                        <tr>
                            <td class="text-center"><?= $num; ?></td>
                            <td class="text-center"><a
                                    href="<?= base_url("product/" . $crt['id'] . "-" . $this->toolset->tourl($crt['name'])); ?>"><?= $crt['name']; ?></a>
                            </td>
                            <td class="text-center"><?php if (empty($crt['motif'])) {
                                    echo "Default";
                                } else { ?>
                                    <span class="badge badge-warning"
                                          style="background: orange;"><?= $crt['motif']; ?></span>
                                <?php } ?>
                            </td>
                            <td class="text-center"><?= $crt['qty']; ?></td>
                            <td class="text-center"><?= $this->toolset->rupiah($crt['price']); ?></td>
                            <td class="text-right"><?= $this->toolset->rupiah($crt['sub']); ?></td>
                        </tr>
                    <?php } ?>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <td class="text-right" colspan="5"><strong>Total:</strong></td>
                                    <td class="text-right"><?=$this->toolset->rupiah($cart['total']);?></td>
                                </tr>
                                <tr>
                                    <td class="text-right" colspan="5"><strong>Ongkos Kirim:</strong></td>
                                    <td class="text-right"><span class="shipping"></span></td>
                                </tr>
                                <tr>
                                    <td class="text-right" colspan="5"><strong>Grand Total:</strong></td>
                                    <td class="text-right"><span class="total"></span></td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="buttons">
                            <div class="pull-right">
                                <input type="button" data-loading-text="Loading..." class="btn btn-primary"
                                       id="button-confirm" value="Lanjutkan">
                            </div>
                        </div>
                </div>
            </div>
            </div>
        </div>
      </div>
    </div>
</div>
<script>

$('#button-confirm').on('click',function(){
    var csrf = $('#csrf-form').attr("data-csrf");
    $('#csrf-form').val(csrf);
    $.ajax({
        url: "<?=base_url("transaction/verification");?>",
        method: "POST",
        data: new FormData($('#formPayment')[0]),
        contentType: false,
        cache: false,
        processData: false,
        dataType: "json",
        success:function(result){
            $('.csrf').attr('data-csrf',result['csrf_regenerate']);
            $('#csrf-form').val(result['csrf_regenerate']);
            if(result['status']) {
                $('body').append('<div style="width:100%;height:100%;position:fixed;z-index:99;top:0;left:0;background:rgba(0,0,0,0.8);display:flex;justify-content:center;align-items:center;flex-flow:column wrap"><div class="lds-dual-ring"></div><div style="display:block;font-size:16px;fonw-weight:bold">Harap Tunggu...</div></div>');
                $("#formPayment").submit();
            } else {
                var msg = result['error'][0]['field']+" "+result['error'][0]['msg'];

                Swal.fire(
                    'Gagal',
                    msg,
                    'error'
                )
            }
        }
    });
});

$('body').on('click','.courier-item .link',function(){
    var courier = $(this).attr("courier-id");
    $('#courier-form').val(courier);
    $('.courier-item .link').attr("style","border:none");
    $(this).attr("style","border: 2px solid #80bdff;outline: 0;box-shadow: 2px 0 6px 0.2rem rgba(0,123,255,.25);");
    var total = $(this).attr("data-total");
    var shipping = $(this).attr("data-shipping");
    $('.shipping').html(shipping);
    $('.total').html(total);
});
$('body').on('change','.province',function(){
    var csrf = $(this).attr("data-csrf");
    var key = $(".province").val();
    $.ajax({
            url: "<?=base_url("json/get_city");?>",
            method: "POST",
            data: {
                "key": key,
                "<?=$this->security->get_csrf_token_name();?>": csrf
            },
            dataType: "json",
            success:function(result){
                $('.csrf').attr("data-csrf",result['csrf_regenerate']);
                $('.city').prop("disabled",false);
                $('.city').html('<option value="">--- Pilih ---</option>');
                $('.city').prop('selectedIndex',0);
                $.each(result['rajaongkir']['results'],function(){
                    $('.city').append('<option value="'+this.city_id+'">'+this.type+' '+this.city_name+'</option>');
                });
            }
    });
});
$('body').on('change','.city',function(){
    var csrf = $(this).attr("data-csrf");
    var key = $('.city').val();
    $.ajax({
            url: "<?=base_url("json/sum_shipping");?>",
            method: "POST",
            data: {
                "destination": key,
                "<?=$this->security->get_csrf_token_name();?>": csrf
            },
            dataType: "json",
            success:function(result){
                $('.csrf').attr("data-csrf",result['csrf_regenerate']);
                $('.courier').html("");
                $.each(result['results'],function(){
                    $('#courier-form').val("");
                    $('.courier').append('<div class="courier-item"><button type="button" class="link" data-shipping="'+this.shipping+'" data-total="'+this.total+'" courier-id="'+this.id+'"></button><table class="table table-bordered"><tr><td width="80px"><img src="<?=base_url("upload/ekspedisi");?>/'+this.courier+'.png" style="max-width:100%"/></td><td><div style="display:flex;align-items:center"><div style="width:45%">'+this.courier+' '+this.service+'<br>'+this.etd+' hari</div><div style="margin-left:auto;margin-right:12px;font-size:15px">'+this.shipping+'</div></div></td></tr></table></div>');
                });
            }
    });
});
</script>