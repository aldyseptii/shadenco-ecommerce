<div class="breadcrumb parallax-container">
  <div class="parallax"><img src="<?=base_url("assets/moonstore/ms01/image/prlx.jpg");?>" alt="#"></div>
  <h1>Keranjang Belanja</h1>
  <ul>
    <li><a href="<?=base_url();?>">Home</a></li>
    <li>Keranjang Belanja</li>
  </ul>
</div>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-sm-9" style="float: none;margin:0 auto">
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <td class="text-center">#</td>
                <td class="text-center">Foto</td>
                <td class="text-center">Nama Produk</td>
                <td class="text-center">Harga Satuan</td>
                <td class="text-center">Qty</td>
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
                <td class="text-center"><?=$num;?>
                <td class="text-center"><a href="<?=$crt['photo'];?>"><img class="img-thumbnail" title="<?=$crt['name'];?>" alt="<?=$crt['name'];?>" src="<?=$crt['photo'];?>" style="max-width:50px"></a></td>
                <td class="text-left"><a href="<?=base_url("product/".$crt['id']."-".$this->toolset->tourl($crt['name']));?>"><?=$crt['name'];?></a></td>
                <td class="text-right"><?=$this->toolset->rupiah($crt['price']);?></td>
                <td class="text-left">
                    <div style="max-width: 200px;" class="input-group btn-block">
                        <input type="text" class="form-control quantity" size="1" value="<?=$crt['qty'];?>" name="quantity">
                        <span class="input-group-btn">
                            <button class="btn btn-primary btn-update" title="" data-toggle="tooltip" type="button" data-original-title="Update" data-id="<?=$crt['id'];?>"><i class="fa fa-refresh"></i></button>
                            <button  class="btn btn-danger btn-remove" title="" data-toggle="tooltip" type="button" data-original-title="Remove" data-id="<?=$crt['id'];?>"><i class="fa fa-times-circle"></i></button>
                        </span>
                    </div>
                </td>
                <td class="text-right"><?=$this->toolset->rupiah($crt['sub']);?></td>
              </tr>
<?php 
}
if($num == 0) {
?>

              <tr>
                <td colspan="6" class="text-center"><b>Keranjang masih kosong</b></td>
              </tr>
<?php } ?>

              </tr>
            </tbody>
          </table>
        </div>
      
      <div class="row">
        <div class="col-sm-4 col-sm-offset-8">
          <table class="table table-bordered">
            <tbody>
              <tr>
                <td class="text-right"><strong>Total:</strong></td>
                <td class="text-right"><?=$this->toolset->rupiah($cart['total']);?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="buttons">
        <div class="pull-left"><a class="btn btn-default" href="<?=base_url();?>">Lanjut Belanja</a></div>
        <div class="pull-right"><a class="btn btn-primary" href="<?=base_url("transaction/checkout");?>">Checkout</a></div>
      </div>
    </div>
  </div>
</div>

<script>
$('.btn-update').on('click',function(){
var id = $(this).attr("data-id");
var qty = $(this).parent().parent().children(".quantity").val();
    $.ajax({
            url: "<?=base_url("cart/add");?>/",
            method: "POST",
            data: {
                "id": id,
                "qty": qty,
                "update": "yes",
                "<?=$this->security->get_csrf_token_name();?>": "<?=$this->security->get_csrf_hash();?>"
            },
            dataType: "json",
            success:function(result){
                location.reload(true);
            }
    });
});
$('.btn-remove').on('click',function(){
var id = $(this).attr("data-id");
    $.ajax({
            url: "<?=base_url("cart/delete");?>/",
            method: "POST",
            data: {
                "id": id,
                "<?=$this->security->get_csrf_token_name();?>": "<?=$this->security->get_csrf_hash();?>"
            },
            dataType: "json",
            success:function(result){
                location.reload(true);
            }
    });
});
</script>