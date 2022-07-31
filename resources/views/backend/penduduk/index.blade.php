<x-backend-layout>
    <x-slot name="title">Data Penduduk</x-slot>

    <x-card class="card-primary" label="Tabel Penduduk">
        <x-slot name="button">

            <!-- import excel btn -->
            {{-- <button type="button" class="btn btn-success btn-import" data-toggle="modal" data-target="#modal-import"
                title="Import">
                <i class="fas fa-file-excel"></i>
                <span>Import Dari Excel</span>
            </button> --}}

            <button type="button" class="btn btn-primary show-modal" url="{{ route('penduduk.create') }}"
                data-toggle="modal" data-target="#modal" title="Tambah">
                <i class="fas fa-plus-circle"></i>
                <span>Tambah Data Penduduk</span>
            </button>
        </x-slot>

        {{ $dataTable->table(['class' => 'table table-sm table-bordered']) }}

    </x-card>

    @push('modal')
        <x-modal />

        <!-- import -->
        {{-- <div class="modal fade" id="modal-import" data-backdrop="static" role="dialog" aria-labelledby="modal-title"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <form action="{{ route('penduduk.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="modal-content">
                        <div class="modal-header" id="modal-header">
                            <h5 class="modal-title">Import Data Penduduk Dari Excel</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>


                        <div class="modal-body">

                            <div class="row">
                                <!--file-->
                                <div class="form-group col-12">
                                    <label>Excel File</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file" name="file">
                                        <label class="custom-file-label" for="file" id="label-file">Choose file</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer bg-whitesmoke br" id="modal-footer">
                            <button type="submit" class="btn btn-primary">Import</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </form>

            </div>
        </div> --}}
    @endpush

    @push('script')
        {{ $dataTable->scripts() }}

        {{-- <script type="text/javascript">
            document.querySelector("#file").onchange = function() {
                document.querySelector("#label-file").textContent = this.files[0].name;
            }
        </script> --}}

        <script>
            // ajax
            $(document).ready(function() {

                // show modal
                $('body').on('click', '.show-modal', function() {
                    var me = $(this),
                        url = me.attr('url'),
                        title = me.attr('title');

                    $('#modal-title').text(title + ' Data Penduduk');
                    $('#modal-btn-save')
                        .removeClass('invisible')
                        .text(me.hasClass('edit') ? 'Update' : 'Save');
                    $.ajax({
                        url: url,
                        dataType: 'html',
                        success: function(response) {
                            $('#modal-body').html(response);
                            $('.select2').select2();
                        }
                    });
                });

                // show detail modal
                $('body').on('click', '.btn-show', function() {

                    var me = $(this),
                        url = me.attr('url'),
                        title = me.attr('title');

                    $('#modal-title').text(title + ' Data Penduduk');
                    $('#modal-btn-save').addClass('invisible');

                    $.ajax({
                        url: url,
                        dataType: 'html',
                        success: function(response) {
                            $('#modal-body').html(response);
                        }
                    });
                });

                //delete data
                $('body').on('click', '.btn-delete', function(event) {
                    event.preventDefault();

                    var table = $('#penduduk-table'),
                        me = $(this),
                        url = me.attr('url'),
                        title = me.attr('title');


                    swal({
                            title: 'Apakah anda ingin menghapus data penduduk?',
                            text: '',
                            icon: 'warning',
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                $.ajax({
                                    url: url,
                                    type: "POST",
                                    data: {
                                        '_method': 'DELETE',
                                    },
                                    success: function(response) {
                                        table.DataTable().ajax.reload();
                                        iziToast.success({
                                            message: response.message,
                                            position: 'topRight'
                                        });
                                    },
                                    error: function(xhr) {
                                        swal('Oops...', xhr, 'error');
                                    }
                                });
                            }
                        });
                });

                // store or update
                $('#modal-btn-save').click(function(event) {
                    var table = $('#penduduk-table'),
                        form = $('#modal-body form'),
                        url = form.attr('action'),
                        method = $('input[name=_method]').val() == undefined ? 'POST' : 'PUT';

                    form.find('.text-danger').remove();
                    form.find('.form-group').removeClass('has-error');

                    $.ajax({

                        url: url,
                        type: "POST",
                        data: new FormData($("#modal-body form")[0]),
                        contentType: false,
                        processData: false,

                        success: function(response) {
                            form.trigger('reset');
                            $('#modal').modal('hide');
                            table.DataTable().ajax.reload();
                            iziToast.success({
                                message: response.message,
                                position: 'topRight'
                            });
                        },
                        error: function(xhr) {
                            var res = xhr.responseJSON;

                            if ($.isEmptyObject(res) == false) {
                                $.each(res.errors, function(key, value) {
                                    $('#' + key)
                                        .closest('.form-group')
                                        .addClass('has-error')
                                        .append('<span class="text-danger">' + value +
                                            '</span>')
                                })
                            }
                        }
                    });
                });

            });
        </script>
    @endpush

</x-backend-layout>
