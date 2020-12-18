<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Kelola Ukuran</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url("admin"); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Kelola Ukuran</li>
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
                                Ukuran
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <button type="button" data-toggle="modal" data-target="#addModal"
                                        class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah Ukuran
                                </button>
                            </div>
                            <hr/>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tableSize">
                                    <thead class="bg-gradient-secondary">
                                    <th scope="col" style="text-align:center">#</th>
                                    <th scope="col" style="text-align:center">Link to ID</th>
                                    <th scope="col" style="text-align:center">Nama Ukuran</th>
                                    <th scope="col" style="text-align:center">Url Ukuran</th>
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
                <h5 class="modal-title">Edit Ukuran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <div class="form-group">
                        <input type="text" name="name_ukuran" value="" class="form-control validate txtName mb-2"
                               placeholder="Input Ukuran; example: 60cm x 185cm">
                        <input type="number" name="id_product" value="" class="form-control validate idProd mb-2"
                               placeholder="Link to ID Product; Lihat ID Produk pada menu-> Produk">
                        <input type="text" name="url_ukuran" value="" class="form-control validate urlUkuran mb-2"
                               placeholder="url dimulai dari product/">
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
                <h5 class="modal-title">Tambah Ukuran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <div class="form-group">
                        <input type="text" name="name_ukuran" value="" class="form-control validate txtNameadd mb-2"
                               placeholder="Input Ukuran; example: 60cm x 185cm">
                        <input type="number" name="id_product" value="" class="form-control validate idProdadd mb-2"
                               placeholder="Link to ID Product; Lihat ID Produk pada menu-> Produk">
                        <input type="text" name="url_ukuran" value="" class="form-control validate urlUkuranadd mb-2"
                               placeholder="url dimulai dari product/">
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
        var idprod = $(this).attr("id-product");
        var txt = $(this).attr("data-name");
        var urlukuran = $(this).attr("data-ukuran");
        var id = $(this).attr("data-id");

        $('.idProd').val(idprod);
        $('.txtName').val(txt);
        $('.urlUkuran').val(urlukuran);
        $('.hdId').val(id);
    });
    $('#tableSize').DataTable({
        "processing": true,
        "pageLength": 1000,
        "serverSide": true,
        "order": [],
        "ajax": {"url": "<?=base_url();?>admin/size/index_json"},
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
                $.getJSON("<?=base_url();?>admin/size/delete/" + id, function (response) {
                    if (!response['status']) {
                        Swal.fire(
                            'Gagal',
                            response['msg'],
                            'error'
                        );
                    } else {
                        $('#tableSize').DataTable().ajax.reload(null, false);
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
        var idprod = $('.idProd').val();
        var txt = $('.txtName').val();
        var urlukuran = $('.urlUkuran').val();
        var id = $('.hdId').val();

        $('.btn-save').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> menyimpan').prop('disabled', true);

        $.ajax({
            url: "<?=base_url("admin/size/edit");?>/" + id,
            method: "POST",
            data: {
                "id_product": idprod,
                "name_ukuran": txt,
                "url_ukuran": urlukuran
            },
            dataType: "json",
            success: function (result) {
                $('.btn-save').html('<i class="fas fa-save"></i> Simpan').prop('disabled', false);
                if (result['status']) {
                    $('.validate').removeClass("is-invalid");
                    $('#editModal').modal("toggle");
                    $('#tableSize').DataTable().ajax.reload(null, false);
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
        var idprod = $('.idProdadd').val();
        var txt = $('.txtNameadd').val();
        var urlukuran = $('.urlUkuranadd').val();


        $('.btn-saveadd').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> menyimpan').prop('disabled', true);

        $.ajax({
            url: "<?=base_url("admin/size/add");?>/",
            method: "POST",
            data: {
                "id_product": idprod,
                "name_ukuran": txt,
                "url_ukuran": urlukuran
            },
            dataType: "json",
            success: function (result) {
                $('.btn-saveadd').html('<i class="fas fa-save"></i> Simpan').prop('disabled', false);
                if (result['status']) {
                    $('#addModal').modal("toggle");

                    $('.validate').removeClass("is-invalid");
                    $('#tableSize').DataTable().ajax.reload(null, false);
                    Swal.fire(
                        'Berhasil',
                        'Kategori telah ditambahkan',
                        'success'
                    );
                    $('.txtNameadd').val("");
                    $('.idProdadd').val("");
                    $('.urlUkuran').val("");
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