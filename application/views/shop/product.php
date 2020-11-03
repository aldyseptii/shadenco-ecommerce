<?php
$explodeimg = explode(",",$detail->photo_product);
$bigthumb = $explodeimg[0];

$rowthumb = $explodeimg;
unset($rowthumb[0]);

?>

<div class="breadcrumb parallax-container">
    <div class="parallax"><img src="<?=base_url("assets/moonstore/ms01/image/prlx.jpg");?>" alt="#"></div>
    <h1 class="text-shadow-shadenco"><?=$detail->name_product;?></h1>
    <ul>
        <li><a href="<?=base_url();?>">Home</a></li>
        <li>
            <a href="<?= base_url("category/$detail->id_category-" . $this->toolset->tourl($detail->name_category)); ?>"><?= $detail->name_category; ?></a>
        </li>
        <li><?= $detail->name_product; ?></li>
    </ul>
</div>
<div class="container">
    <div class="row">
        <div class="content col-sm-12">
            <div class="row">
                <div class="col-sm-5">
                    <div class="thumbnails">
                        <div class="left-column">
                            <a class="fancybox" href="#">
                                <img class="tampil" src="<?= base_url("img/622x800/$bigthumb"); ?>"/>
                            </a>
                            <?php foreach ($variant as $motif) {
                                ?>
                                <img class="fancybox mb-4" src="<?= $motif->image_url; ?>"
                                     data-image="<?= $motif->variant_product; ?>"/>
                            <?php }
                            if (count($variant) == 0) {
                                echo '';
                            } ?>
                        </div>

                        <div id="product-thumbnail" class="owl-carousel">

                            <?php
                            foreach ($rowthumb as $img) {
                                $img = trim($img);
                                ?>

                                <div class="item">
                                    <div class="image-additional"><a class="thumbnail fancybox"
                                                                     href="<?= base_url("img/622x800/$img"); ?>"
                                                                     title="<?= $detail->name_product; ?>"> <img
                                                    src="<?= base_url("img/622x800/$img"); ?>"
                                                    title="<?= $detail->name_product; ?>"
                                                    alt="<?= $detail->name_product; ?>"/></a></div>
                                </div>

                            <?php } ?>

                        </div>
                    </div>
                </div>
                <div class="col-sm-7 prodetail">
                    <h1 class="productpage-title"><?= $detail->name_product; ?></h1>
                    <div class="rating"><?= $this->toolset->rating($detail->total_rating); ?></div>
                    <ul class="list-unstyled productinfo-details-top">
                        <li>
                            <h2 class="productpage-price"><?= $this->toolset->rupiah($detail->price_product); ?></h2>
                        </li>
                    </ul>
                    <hr>
                    <div class="kategori">
                        <h5>Kategori</h5>
                        <h1>
                            <a href="<?= base_url("category/$detail->id_category-" . $this->toolset->tourl($detail->name_category)); ?>"><?= $detail->name_category; ?></a>
                        </h1>
                    </div>
                    <hr>
                    <div class="ukuran">
                        <h5>Ukuran</h5>
                        <h1><?= $detail->size_product; ?></h1>
                    </div>
                    <hr>
                    <div class="motif">
                        <h5>Motif</h5>
                        <?php foreach ($variant as $motif) {
                            ?>
                            <label>
                                <input type="radio" name="test" value="<?= $motif->variant_product; ?>"
                                       data-image="<?= $motif->variant_product; ?>">
                                <?php
                                $image_link = $motif->image_url;
                                if (empty($motif->image_url)) {
                                    echo '';
                                } else {
                                    echo "<img class='hidden' src='$image_link'>";
                                } ?>
                                <?= $motif->variant_product; ?>
                            </label>
                        <?php }
                        if (count($variant) == 0) {
                            echo 'Tidak ada variant pada produk ini';
                        } ?>


                    </div>
                    <hr>
                    <p class="product-desc" style="color:#555"><?= nl2br($detail->description_product); ?> <br/><br/>
                        Tersedia : <?= $detail->stock_product; ?> Stok Barang</span>
                    </p>
                    <div id="product">
                        <div class="form-group">
                            <div class="qty">
                                <label>Qty</label>
                                <input id="qty" value="1" type="number">
                                <ul class="button-group list-btn">
                                    <li>
                                        <button type="button" class="addtocart-btn csrf" data-csrf="<?=$this->security->get_csrf_hash();?>" data-id="<?=$detail->id_product;?>" data-toggle="tooltip" data-placement="top" title="Tambah ke Keranjang"  ><i class="fa fa-shopping-bag"></i></button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="productinfo-tab">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab-review">Ulasan (<?=count($comments);?>)</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab-review">
                        <div id="review-list">
                            <h2>Ulasan Teratas</h2>
                            <?php
                            foreach($comments as $comment) {
                                ?>

                                <div class="review-wrapper">
                                    <div class="review-head">
                                        <div class="info">
                                            <span class="name"><b><?=$comment->name_comment;?></b></span>
                                            <?=$comment->date_comment;?>
                                        </div>
                                        <div class="star"><?=$this->toolset->rating($comment->rating_comment);?></div>
                                    </div>
                                    <div class="review-body">
                                        <?=$comment->body_comment;?>
                                    </div>
                                </div>
                            <?php } if(count($comments) == 0) { echo 'Belum ada ulasan'; } ?>

                        </div>
                        <form id="formComment">
                            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="" data-csrf="<?=$this->security->get_csrf_hash();?>" id="csrf-form" class="csrf">
                            <div id="review"></div>
                            <h2>Tulis Ulasan</h2>
                            <div class="form-group required">
                                <div class="col-sm-12">
                                    <label class="control-label" for="input-name">Nama</label>
                                    <input type="text" name="name_comment" value="" id="input-name" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group required">
                                <div class="col-sm-12">
                                    <label class="control-label" for="input-name">Email</label>
                                    <input type="email" name="email_comment" value="" id="input-name" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group required">
                                <div class="col-sm-12">
                                    <label class="control-label" for="input-review">Ulasan</label>
                                    <textarea name="body_comment" rows="5" id="input-review" class="form-control"></textarea>
                                    <div class="help-block"><span class="text-danger">Note:</span> HTML tidak ditampilkan!</div>
                                </div>
                            </div>
                            <div class="form-group required">
                                <div class="col-sm-12">
                                    <label class="control-label">Rating</label><br>Bad&nbsp;
                                    <input type="radio" name="rating_comment" value="1"/>
                                    &nbsp;
                                    <input type="radio" name="rating_comment" value="2" />
                                    &nbsp;
                                    <input type="radio" name="rating_comment" value="3" />
                                    &nbsp;
                                    <input type="radio" name="rating_comment" value="4" />
                                    &nbsp;
                                    <input type="radio" name="rating_comment" value="5" />
                                    &nbsp;Good
                                </div>
                            </div>
                            <div class="buttons clearfix">
                                <div class="pull-right">
                                    <button type="button" id="send-comment" data-loading-text="Loading..." class="btn btn-primary">Lanjutkan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <h3 class="productblock-title">Produk Serupa</h3>
            <h4 class="title-subline">Produk yang mungkin Anda tertarik</h4>
            <div class="box">
                <div id="related-slidertab" class="row owl-carousel product-slider">

                    <?php
                    foreach($related as $rlt) {
                        $tourl = $this->toolset->tourl($rlt->name_product);
                        if(empty($rlt->url_photo)) {
                            $url_photo = base_url("assets/moonstore/ms01")."/image/product/product8-8.jpg";
                        } else {
                            $url_photo = base_url("img/622x800/$rlt->url_photo");
                        }
                        ?>

                        <div class="item">
                            <div class="product-thumb transition">
                                <div class="image product-imageblock"> <a href="<?=base_url("product/$rlt->id_product-$tourl");?>">
                                        <img src="<?=$url_photo;?>" alt="<?=$rlt->name_product;?>" title="<?=$rlt->name_product;?>" class="img-responsive" />
                                        <img src="<?=$url_photo;?>" alt="<?=$rlt->name_product;?>" title="<?=$rlt->name_product;?>" class="img-responsive" />
                                    </a>
                                    <ul class="button-group">
                                        <li>
                                            <button title="Tambah ke Keranjang" class="addtocart-btn" type="button">Tambah ke Keranjang</button>
                                        </li>
                                    </ul>
                                </div>
                                <div class="caption product-detail">
                                    <div class="rating">
                                        <?=$this->toolset->rating($rlt->total_rating);?>
                                    </div>
                                    <h4 class="product-name"><a href="<?=base_url("product/$rlt->id_product-$tourl");?>" title="<?=$rlt->name_product;?>"><?=$rlt->name_product;?></a></h4>
                                    <span class="badge" title="Stok Tersedia - <?=$rlt->stock_product;?>"><?=$rlt->stock_product;?> Stok</span>
                                    <p class="price product-price"><?=$this->toolset->rupiah($rlt->price_product);?></p>
                                </div>
                            </div>
                        </div>

                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#send-comment').on('click',function(){
        var csrf = $("#csrf-form").attr('data-csrf');
        $("#csrf-form").val(csrf);
        $.ajax({
            url: "<?=base_url("comment/index/$detail->id_product");?>",
            method: "POST",
            data: new FormData($('#formComment')[0]),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success:function(result){
                $('.csrf').attr('data-csrf',result['csrf_regenerate']);
                $('#csrf-form').val(result['csrf_regenerate']);
                if(result['status']) {
                    $('#formComment')[0].reset();
                    Swal.fire(
                        'Berhasil',
                        "Ulasan anda telah dikirim",
                        'success'
                    ).then((result) => {
                            if (result.value) {
                                location.reload();
                            }
                        }
                    )
                } else {

                    Swal.fire(
                        'Gagal',
                        result['error'][0]['field']+" "+result['error'][0]['msg'],
                        'error'
                    )
                }
            }
        });
    });

    $('.addtocart-btn').on("click",function(){
        var id = $(this).attr("data-id");
        var qty = $('#qty').val();
        var csrf = $(this).attr("data-csrf");
        $.ajax({
            url: "<?=base_url("cart/add");?>/",
            method: "POST",
            data: {
                "id": id,
                "qty": qty,
                "<?=$this->security->get_csrf_token_name();?>": csrf
            },
            dataType: "json",
            success:function(result){
                $('.csrf').attr("data-csrf",result['csrf_regenerate']);
                if(result['status']) {
                    if($('.cartul .update').length < 1) {

                        $('.cartul').append('<li style="text-align:center;margin-bottom: 12px" class="update">Telah terjadi perubahan. Silahkan refresh page untuk memperbaharui</li>');

                    }
                    Swal.fire({
                        title: 'Berhasil',
                        text: result['msg'],
                        icon: 'success',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Checkout',
                        cancelButtonText: "Lanjutkan belanja"
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
</script>
<style>
    div .motif label input[type=radio] + img {
        flex-shrink: 0;
        width: 38px;
        height: 38px;
        background-size: 38px;
        border-radius: 12px;
        margin: 0 4px 0 0;
    }

    div .motif label:hover {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }

    div .motif label {
        font-weight: 400;
        margin: 3px 0;
        -webkit-box-align: center;
        align-items: center;
        background-color: rgb(155 168 174 / 0%);
        border-radius: 16px;
        border: 1px solid rgb(155 168 174 / 53%);
        color: rgb(155 168 174);
        display: inline-flex;
        vertical-align: top;
        flex: 1 1 0%;
        flex-wrap: nowrap;
        margin-bottom: 8px;
        margin-right: 8px;
        overflow: hidden;
        text-overflow: ellipsis;
        transition: all 0.28s ease-in-out 0s;
        cursor: pointer;
        min-width: 106px;
        height: 48px;
        padding: 3px 5px;
        line-height: 18px;
        font-size: 12px;
        white-space: normal;
    }
    /* HIDE RADIO */
    div .motif label [type=radio] {
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* IMAGE STYLES */
    [type=radio] + img {
        cursor: pointer;
    }

    /* CHECKED STYLES */
    [type=radio]:checked + img {
        background: #bccad0;
        padding: 4px;
        transition: all 0.28s ease-in-out 0s;
    }

    /* Left Column */
    .left-column img {
        width: 100%;
        opacity: 0;
        transition: all 0.3s ease;
        display: none;
    }

    .left-column img.tampil {
        display: block;
        opacity: 1;
    }

    .shadow-variant {
        box-shadow: -3px 0.3rem 0rem 0px rgb(0 0 0 / 15%);
    }
</style>
<script>
    $(document).ready(function () {

        $('.motif input').on('click', function () {
            var motifVariant = $(this).attr('data-image');

            $('.tampil').removeClass('tampil');
            $('.left-column img[data-image = ' + motifVariant + ']').addClass('tampil');
            $(this).addClass('tampil');
        });

    });

    var inputs = document.querySelectorAll("input");
    inputs.forEach(function (i) {
        i.addEventListener('click', function (el) {
            var clicked = el.currentTarget;
            var active = clicked.parentElement.parentElement.querySelector('.shadow-variant');
            active && active.classList.remove('shadow-variant');
            clicked.parentElement.classList.add('shadow-variant');
        });
    });
</script>