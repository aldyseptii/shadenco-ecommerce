<div class="breadcrumb parallax-container">
  <div class="parallax"><img src="<?=base_url("assets/moonstore/ms01/image/prlx.jpg");?>" alt="#"></div>
  <h1>Status Pesanan</h1>
  <ul>
    <li><a href="<?=base_url();?>">Home</a></li>
    <li>Status Pesanan</li>
  </ul>
</div>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-sm-6" style="float:none;margin:0 auto">
    <form action="<?=base_url('tracking/order');?>/" method="post" id="form-tracking">
      <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>">
        <div class="form-group">
            <label>Order ID</label> :
            <input type="text" name="no_invoice" class="form-control" id="orderid" value="<?=$this->session->order_id;?>">
        </div>
        <div class="form-group">
            <label>Email</label> :
            <input type="email" name="email_invoice" id="" class="form-control" value="<?=$this->session->email_invoice;?>">
        </div>
        <div class="buttons">
            <div class="pull-right">
                <input type="submit" data-loading-text="Loading..." class="btn btn-primary" id="button-confirm" value="Lanjutkan">
            </div>
        </div>
    </form>
    </div>
  </div>
</div>
<script>
function cek_orderid() {
  var orderid = $('#orderid').val();
  var url = $('#form-tracking').attr('action');
  $('#form-tracking').attr('action',url+orderid);

  if(orderid == "") {
    $('#button-confirm').prop("disabled",true);
  } else {
    $('#button-confirm').prop("disabled",false);
  }
}

cek_orderid()

$('#orderid').on('change',function(){
    cek_orderid()
});
</script>