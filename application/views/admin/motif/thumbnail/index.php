<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Kelola Motif Thumbnail</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url("admin"); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Kelola Motif Thumbnail</li>
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
                                Thumbnail
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <button type="button" data-toggle="modal" data-target="#addModal"
                                        class="btn btn-success btn-sm"><i class="fas fa-plus"></i> Tambah Thumbnail
                                </button>
                            </div>
                            <hr/>
                            <div class="table-responsive">
                                <table id="tableThumbnail" class="table table-bordered">
                                    <thead class="bg-gradient-secondary">
                                    <tr>
                                        <th scope="col" style="text-align:center">#</th>
                                        <th scope="col" style="text-align:center">Gambar Motif</th>
                                        <th scope="col" style="text-align:center">Judul Motif</th>
                                        <th scope="col" style="text-align:center">Link Motif</th>
                                        <th scope="col" style="text-align:center">Aksi</th>
                                    </tr>
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
                <form class="edit-form">
                    <div class="form-group">
                        <label>Judul Motif</label> :
                        <input type="text" name="title_thumbnail" value="" class="form-control validate">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label>Gambar Motif</label> :
                        <div style="text-align:center" class="d-none">
                            <img src="" style="max-width:100%" class="img-add">
                        </div>
                        <input type="file" name="img_thumbnail" value="" class="form-control validate imgThumbnail">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label>Link Motif</label> :
                        <input type="text" name="link_thumbnail" value="" class="form-control validate">
                        <div class="invalid-feedback"></div>
                    </div>
                </form>
                <div class="progress-add" style="display:none;width:100%">
                    <div class="progress-bar progress-bar-striped active" role="progressbar"
                         aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:10%">
                        10%
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="text-align:center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary add-btn"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="tambah" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Thumbnail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="edit-formput">
                    <div class="form-group">
                        <label>Judul Thumbnail</label> :
                        <input type="text" name="title_thumbnail" value="" class="form-control validate txtTitle">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label>Gambar Motif</label> :
                        <div style="text-align:center" class="mb-3">
                            <img src="" style="max-width:100%" class="img-edit">
                        </div>
                        <input type="file" name="img_motif" value="" class="form-control validate imgThumbnailedit">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label>Link Motif</label> :
                        <input type="text" name="link_thumbnail" value="" class="form-control validate txtLink">
                        <div class="invalid-feedback"></div>
                    </div>
                </form>
                <div class="progress-edit" style="display:none;width:100%">
                    <div class="progress-bar progress-bar-striped active" role="progressbar"
                         aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:10%">
                        10%
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="text-align:center">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary edit-btn"><i class="fas fa-save" data-id=""></i> Simpan
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function copyTxt() {
        /* Get the text field */
        var copyText = document.getElementById("myInput");

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */

        /* Copy the text inside the text field */
        document.execCommand("copy");

        /* Alert the copied text */
        alert("Copied the text: " + copyText.value);
    }

    $('#tableThumbnail').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        "ajax": {"url": "<?=base_url();?>admin/upload_thumbnail/index_json"},
        "columnDefs": [
            {
                "targets": [0],
                "orderable": false,
                "className": "dt-center"
            },
            {
                "targets": [1],
                "orderable": false,
                "className": "dt-center"
            },
            {
                "targets": [3],
                "orderable": false,
                "className": "dt-center"
            },
            {
                "targets": [4],
                "orderable": false,
                "className": "dt-center"
            }
        ]
    });

    function readURL(input, to) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(to).attr("src", e.target.result);
                $(to).parent().removeClass("d-none").addClass("d-block mb-3");
            }

            reader.readAsDataURL(input.files[0]);
        }

    }

    $('.imgThumbnail').on('change', function () {
        readURL(this, ".img-add");
    });
    $('.imgThumbnailedit').on('change', function () {
        readURL(this, ".img-edit");
    });

    $("body").on("click", ".btnedit", function () {

        var id = $(this).attr("data-id");

        $.getJSON("<?=base_url('admin/upload_thumbnail/get');?>/" + id, function (result) {
            $('.txtTitle').val(result['title_thumbnail']);
            $('.txtLink').val(result['link_thumbnail']);
            $('.img-edit').attr("src", result['img_thumbnail']);
            $('.edit-btn').attr("data-id", id);
        })

    });

    function sendajax(urlsend, formedit, action) {
        $.ajax({
            url: urlsend,
            method: "POST",
            data: new FormData($(formedit)[0]),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            xhr: function () {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function (evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = ((evt.loaded / evt.total) * 100);
                        $(".progress-" + action + " .progress-bar").width(percentComplete + '%');
                        $(".progress-" + action + " .progress-bar").html(percentComplete + '%');
                    }
                }, false);
                return xhr;
            },
            success: function (result) {
                $(".progress-" + action).toggle();
                $("." + action + "-btn").prop("disabled", false);

                if (result['status']) {
                    $(formedit)[0].reset();
                    $('.validate').removeClass("is-invalid");
                    $('#' + action + 'Modal').modal("toggle");
                    $('#tableThumbnail').DataTable().ajax.reload(null, false);
                    Swal.fire(
                        'Berhasil',
                        result['msg'],
                        'success'
                    );
                    $('.img-' + action).attr("src", "");
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
    }

    $('.add-btn').on('click', function () {
        $(".progress-add").toggle();
        $(".add-btn").prop("disabled", true);
        sendajax("<?=base_url('admin/upload_thumbnail/add');?>", ".edit-form", "add");
    });
    $('.edit-btn').on('click', function () {
        var id = $(this).attr("data-id");
        $(".progress-edit").toggle();
        $(".edit-btn").prop("disabled", true);
        sendajax("<?=base_url('admin//upload_thumbnail/edit');?>/" + id, ".edit-formput", "edit");
    });

    $("body").on("click", ".btndelete", function () {
        var id = $(this).attr("data-id");
        Swal.fire({
            title: 'Apakah Kamu Yakin',
            text: "Kamu akan menghapus thumbnail ini?",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.value) {
                $.getJSON("<?=base_url();?>admin/upload_thumbnail/delete/" + id, function (response) {
                    if (!response['status']) {
                        Swal.fire(
                            'Gagal',
                            response['msg'],
                            'error'
                        );
                    } else {
                        $('#tableThumbnail').DataTable().ajax.reload(null, false);
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
</script>