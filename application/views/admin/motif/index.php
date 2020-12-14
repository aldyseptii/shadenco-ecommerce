<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Kelola Motif</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url("admin"); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Kelola Motif</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-gradient-info">
                            <div class="card-title">
                                Motif
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <button type="button" data-toggle="modal" data-target="#addModal"
                                        class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah Motif
                                </button>
                            </div>
                            <span>Untuk path upload <strong>Image Motif</strong> ada di -> <a target="_blank"
                                                                                              href="<?php echo base_url() ?>assets/motif/"><?php echo base_url() ?>assets/motif/ </a> </span>
                            <hr/>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tableMotif">
                                    <thead class="bg-gradient-secondary">
                                    <th scope="col" style="text-align:center">#</th>
                                    <th scope="col" style="text-align:center">Link to ID</th>
                                    <th scope="col" style="text-align:center">Nama Motif</th>
                                    <th scope="col" style="text-align:center">Stock</th>
                                    <th scope="col" style="text-align:center">Image Motif</th>
                                    <th scope="col" style="text-align:center">Link to Image</th>
                                    <th scope="col" style="text-align:center">Aksi</th>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!--/MODAL-->
<div class="modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Motif</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <div class="form-group">
                        <input type="text" name="name_variant" value="" class="form-control validate txtName mb-2">
                        <input type="text" name="id_product" value="" class="form-control validate idProduct mb-2">
                        <input type="text" name="stock" value="" class="form-control validate txtStock mb-2">
                        <input type="text" name="motif_link" value="" class="form-control validate txtMotifLink mb-2">
                        <input type="text" name="image_url" value="" class="form-control validate imgMotif mb-2">
                        <div class="invalid-feedback"></div>
                    </div>
                    <input type="hidden" name="id" value="" class="form-control hdId">
                </form>
            </div>
            <div class="modal-footer" style="text-align:center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary btn-save"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="addModal" tabindex="-1" role="dialog" aria-labelledby="tambah" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Motif</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <div class="form-group">
                        <input type="text" name="name_variant" value="" class="form-control validate txtNameadd mb-2"
                               placeholder="Nama Motif">
                        <input type="number" name="id_product" value="" class="form-control validate idProductadd mb-2"
                               placeholder="ID Product Terkait">
                        <input type="number" name="stock" value="" class="form-control validate txtStockadd mb-2"
                               placeholder="Total Stock">
                        <label>Hanya nama file + format, contoh S1A-1.png</label>
                        <input type="url" name="motif_link" value="" class="form-control validate txtMotifLinkadd mb-2"
                               placeholder="URL Thumbnail Warna/motif">
                        <label>Full URL / Link, contoh: <small>https://store.shadenco.co.id/img/original/Roller_Blinds_Solar_Screen_90cm_x_250cm_-_R-3-S-1_-A.jpg</small></label>
                        <input type="url" name="image_url" value="" class="form-control validate imgMotifadd mb-2"
                               placeholder="URL Link to Image">
                        <div class="invalid-feedback"></div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" style="text-align:center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary btn-saveadd"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>


<script>
    $('body').on('click', '.btnedit', function () {
        var txt = $(this).attr("data-name");
        var idproduct = $(this).attr("id-product");
        var stock = $(this).attr("data-stock");
        var motiflink = $(this).attr("data-motiflink");
        var imagemotif = $(this).attr("data-imagelink");
        var id = $(this).attr("data-id");

        $('.txtName').val(txt);
        $('.idProduct').val(idproduct);
        $('.txtStock').val(stock);
        $('.txtMotifLink').val(motiflink);
        $('.imgMotif').val(imagemotif);
        $('.hdId').val(id);
    });
    $('#tableMotif').DataTable({
        "processing": true,
        "pageLength": 1000,
        "serverSide": true,
        "order": [],
        "ajax": {"url": "<?=base_url();?>admin/motif/index_json"},
        "columnDefs": [
            {
                "targets": [0],
                "orderable": false,
                "className": "dt-center"
            },
            {
                "targets": [2],
                "className": "dt-center",
                "orderable": false
            }
        ]
    });

    $("body").on("click", ".btn-delete", function () {
        var name = $(this).attr("data-name");
        var id = $(this).attr("data-id");
        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: "Kamu akan menghapus kategori " + name,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.value) {
                $.getJSON("<?=base_url();?>admin/motif/delete/" + id, function (response) {
                    if (!response['status']) {
                        Swal.fire(
                            'Gagal',
                            response['msg'],
                            'error'
                        );
                    } else {
                        $('#tableMotif').DataTable().ajax.reload(null, false);
                        Swal.fire(
                            'Berhasil',
                            response['msg'],
                            'success'
                        );
                    }
                });
            }
        });
    });

    $('.btn-save').on('click', function () {
        var txt = $('.txtName').val();
        var idproduct = $('.idProduct').val();
        var stock = $('.txtStock').val();
        var motiflink = $('.txtMotifLink').val();
        var imagemotif = $('.imgMotif').val();
        var id = $('.hdId').val();

        $('.btn-save').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> menyimpan').prop('disabled', true);

        $.ajax({
            url: "<?=base_url("admin/motif/edit");?>/" + id,
            method: "POST",
            data: {
                "name_variant": txt,
                "id_product": idproduct,
                "stock": stock,
                "motif_link": motiflink,
                "image_url": imagemotif
            },
            dataType: "json",
            success: function (result) {
                $('.btn-save').html('<i class="fas fa-save"></i> Simpan').prop('disabled', false);
                if (result['status']) {
                    $('.validate').removeClass("is-invalid");
                    $('#editModal').modal("toggle");
                    $('#tableMotif').DataTable().ajax.reload(null, false);
                    Swal.fire(
                        'Berhasil',
                        'Kategori berhasil diedit',
                        'success'
                    );
                } else {
                    var count = result['error'].length;
                    var i;
                    $('.validate').removeClass("is-invalid");

                    for (i = 0; i < count; i++) {
                        var field = result['error'][i]['field'];
                        var msg = result['error'][i]['msg'];

                        $(".validate[name=" + field + "]").addClass("is-invalid");
                        $(".validate[name=" + field + "]").parent().children(".invalid-feedback").html(msg);
                    }
                }
            }
        });

    });

    $('.btn-saveadd').on('click', function () {
        var txt = $('.txtNameadd').val();
        var idproduct = $('.idProductadd').val();
        var stock = $('.txtStockadd').val();
        var motiflink = $('.txtMotifLinkadd').val();
        var imagemotif = $('.imgMotifadd').val();


        $('.btn-saveadd').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> menyimpan').prop('disabled', true);

        $.ajax({
            url: "<?=base_url("admin/motif/add");?>/",
            method: "POST",
            data: {
                "name_variant": txt,
                "id_product": idproduct,
                "stock": stock,
                "motif_link": motiflink,
                "image_url": imagemotif

            },
            dataType: "json",
            success: function (result) {
                $('.btn-saveadd').html('<i class="fas fa-save"></i> Simpan').prop('disabled', false);
                if (result['status']) {
                    $('#addModal').modal("toggle");

                    $('.validate').removeClass("is-invalid");
                    $('#tableMotif').DataTable().ajax.reload(null, false);
                    Swal.fire(
                        'Berhasil',
                        'Kategori telah ditambahkan',
                        'success'
                    );
                    $('.txtNameadd').val("");
                    $('.idProductadd').val("");
                    $('.txtStockadd').val("");
                    $('.txtMotifLinkadd').val("");
                    $('.imgMotifadd').val("");
                } else {
                    var count = result['error'].length;
                    var i;
                    $('.validate').removeClass("is-invalid");

                    for (i = 0; i < count; i++) {
                        var field = result['error'][i]['field'];
                        var msg = result['error'][i]['msg'];

                        $(".validate[name=" + field + "]").addClass("is-invalid");
                        $(".validate[name=" + field + "]").parent().children(".invalid-feedback").html(msg);
                    }
                }
            }
        });

    });
</script>