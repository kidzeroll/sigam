<x-backend-layout>
    <x-slot name="title">Administrasi Surat</x-slot>

    <x-card class="card-primary" label="Tabel Administrasi Surat">
        <x-slot name="button">
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-kode" title="Kode Surat">
                <i class="fas fa-code"></i>
                <span>Daftar Kode Surat</span>
            </button>

            <button type="button" class="btn btn-primary show-modal" url="{{ route('surat.create') }}" data-toggle="modal"
                data-target="#modal" title="Tambah">
                <i class="fas fa-plus-circle"></i>
                <span>Tambah Administrasi Surat</span>
            </button>
        </x-slot>

        {{ $dataTable->table(['class' => 'table table-sm table-bordered']) }}

    </x-card>

    @push('modal')
        <x-modal />

        <!-- kode surat -->
        <div class="modal fade" id="modal-kode" role="dialog" aria-labelledby="modal-title" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Kode Surat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <table cellpadding="10">

                            <tr>
                                <td>SKKM</td>
                                <td>: Surat Keterangan Kurang Mampu</td>
                            </tr>

                            <tr>
                                <td>SKBB</td>
                                <td>: Surat Keterangan Berkelakuan Baik</td>
                            </tr>

                            <tr>
                                <td>SKBM</td>
                                <td>: Surat Keterangan Belum Menikah</td>
                            </tr>

                            <tr>
                                <td>SKP</td>
                                <td>: Surat Keterangan Pindah</td>
                            </tr>

                            <tr>
                                <td>SKU</td>
                                <td>: Surat Keterangan Usaha</td>
                            </tr>

                            <tr>
                                <td>SKD</td>
                                <td>: Surat Keterangan Domisili</td>
                            </tr>

                            <tr>
                                <td>SKK</td>
                                <td>: Surat Keterangan Kematian</td>
                            </tr>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    @endpush

    @push('script')
        {{ $dataTable->scripts() }}

        <script>
            // ajax
            $(document).ready(function() {

                // show modal
                $('body').on('click', '.show-modal', function() {
                    var me = $(this),
                        url = me.attr('url'),
                        title = me.attr('title');

                    $('#modal-title').text(title + ' surat');
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

                    $('#modal-title').text(title + ' Administrasi Surat');
                    $('#modal-btn-save').addClass('invisible');
                    $('#modal-footer').remove();

                    $.ajax({
                        url: url,
                        dataType: 'html',
                        success: function(response) {
                            $('#modal-body').html(response);
                        }
                    });
                });

                // store or update
                $('#modal-btn-save').click(function(event) {
                    var table = $('#surat-table'),
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

                //delete data
                $('body').on('click', '.btn-delete', function(event) {
                    event.preventDefault();

                    var table = $('#surat-table'),
                        me = $(this),
                        url = me.attr('url'),
                        title = me.attr('title');


                    swal({
                            title: 'Apakah anda ingin menghapus surat?',
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

                // ttd
                $('body').on('click', '.btn-ttd', function(event) {
                    event.preventDefault();

                    var me = $(this),
                        url = me.attr('url'),
                        table = $('#surat-table');

                    $.ajax({
                        url: url,
                        type: 'POST',
                        success: function(response) {
                            $('#modal-body').html(response);
                            table.DataTable().ajax.reload();
                            iziToast.success({
                                // message: response.message,
                                message: "Surat berhasil ditandatangan",
                                position: 'topRight'
                            });
                        }
                    });
                });

                // whatsapp
                $('body').on('click', '.btn-wa', function(event) {
                    event.preventDefault();

                    var me = $(this),
                        url = me.attr('url'),
                        table = $('#surat-table');

                    $.ajax({
                        url: url,
                        method: 'POST',
                        success: function(response) {
                            table.DataTable().ajax.reload();
                            iziToast.success({
                                message: 'Surat berhasil dikirim lewat whatsapp',
                                position: 'topRight'
                            });
                        },
                        error: function(xhr) {
                            table.DataTable().ajax.reload();
                            iziToast.error({
                                title: 'Gagal!',
                                message: 'Terjadi kesalahan dalam server whatsapp',
                                position: 'topRight'
                            });
                        }
                    });
                });

            });
        </script>
    @endpush

</x-backend-layout>
