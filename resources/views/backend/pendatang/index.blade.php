<x-backend-layout>
    <x-slot name="title">Pendatang</x-slot>

    <x-card class="card-primary" label="Tabel Pendatang">
        <x-slot name="button">
            <button type="button" class="btn btn-primary show-modal" url="{{ route('pendatang.create') }}"
                data-toggle="modal" data-target="#modal" title="Tambah">
                <i class="fas fa-plus-circle"></i>
                <span>Tambah Pendatang</span>
            </button>
        </x-slot>

        {{ $dataTable->table(['class' => 'table table-sm table-bordered']) }}

    </x-card>

    @push('modal')
        <x-modal />
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

                    $('#modal-title').text(title + ' Pendatang');
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

                    $('#modal-title').text(title + ' Pendatang');
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

                    var table = $('#pendatang-table'),
                        me = $(this),
                        url = me.attr('url'),
                        title = me.attr('title');


                    swal({
                            title: 'Apakah anda ingin menghapus pendatang?',
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
                    var table = $('#pendatang-table'),
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
