<x-backend-layout>
    <x-slot name="title">Pengaduan</x-slot>

    <x-card class="card-primary" label="Tabel Pengaduan">

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

                // tanggapi
                $('body').on('click', '.tanggapi', function(event) {
                    event.preventDefault();

                    var me = $(this),
                        url = me.attr('url'),
                        table = $('#pengaduan-table');

                    $.ajax({
                        url: url,
                        type: 'POST',
                        success: function(response) {
                            table.DataTable().ajax.reload();
                            iziToast.success({
                                message: response.message,
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
                        table = $('#pengaduan-table');

                    $.ajax({
                        url: url,
                        method: 'POST',
                        success: function(response) {
                            table.DataTable().ajax.reload();
                            iziToast.success({
                                message: 'Pengaduan berhasil diberitahukan lewat whatsapp',
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

                // show detail modal
                $('body').on('click', '.btn-show', function() {

                    var me = $(this),
                        url = me.attr('url'),
                        title = me.attr('title');

                    $('#modal-title').text(title + ' Pengaduan');
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

                    var table = $('#pengaduan-table'),
                        me = $(this),
                        url = me.attr('url'),
                        title = me.attr('title');


                    swal({
                            title: 'Apakah anda ingin menghapus data pengaduan?',
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

            });
        </script>
    @endpush

</x-backend-layout>
