
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?=$clientkey;?>"></script>
<div class="breadcrumb parallax-container">
    <div class="parallax"><img src="<?=base_url("assets/moonstore/ms01/image/prlx.jpg");?>" alt="#"></div>
    <h1>Pembayaran</h1>
    <ul>
        <li><a href="<?=base_url();?>">Home</a></li>
        <li>Pembayaran</li>
    </ul>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-9" style="float:none;margin:0 auto">
            <div style="display:flex;justify-content:center">
                <div style="background:#EEE;margin:0 0 12px 0;padding:12px 24px;border:1px solid #999;color:#333;text-align:center">
                    Order ID
                    <span style="display:block;font-size:24px"><b><?=$dataorder['no_invoice'];?></b></div>
            </div>
        </div>
    </div>
    <div class="col-md-6" style="float:none;margin:0 auto">
        <div class="text-center" style="padding: 12px 20px;color:#000">
            Harap dicatat Order ID anda diatas karena akan digunakan dalam pengecekan status pesanan.
        </div>
        <hr>
    </div>
    <div class="col-sm-7" style="float:none;margin:12px auto 0 auto">
        <div class="payment">
            <div class="payment-cell">
                Nama : <br/>
                <span><?=$dataorder['name_invoice'];?></span>
            </div>
            <div class="payment-cell">
                Nomor HP : <br/>
                <span><?=$dataorder['hp_invoice'];?></span>
            </div>
            <div class="payment-cell">
                Email : <br/>
                <span><?=$dataorder['email_invoice'];?></span>
            </div>
            <div class="payment-cell">
                Alamat Pengiriman : <br/>
                <span><?=$dataorder['address_invoice'];?></span>
            </div>
            <div class="payment-cell">
                Jasa Pengiriman : <br/>
                <span><?=$dataorder['courier_invoice'];?></span>
            </div>
            <div class="payment-cell">
                Grand Total : <br/>
                <span><?=$this->toolset->rupiah($dataorder['total_invoice'] + $dataorder['shipping_invoice']);?></span>
            </div>
            <div class="payment-cell">
                Tanggal Pemesanan : <br/>
                <span><?=$dataorder['date_invoice'];?></span>
            </div>
        </div>
        <div class="buttons">
            <?php if($dataorder['status_invoice'] < 3) { ?>

                <div class="pull-right">
                    <input type="button" data-loading-text="Loading..." class="btn btn-primary" id="pay-button" value="Pembayaran">
                </div>
            <?php } ?>

        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
        snap.pay('<?=$dataorder['token_invoice'];?>', {
        })

    });
</script>