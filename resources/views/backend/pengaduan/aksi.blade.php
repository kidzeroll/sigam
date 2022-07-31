@if ($model->status == 'ditanggapi' || $model->status == 'selesai')
    <button type="button" class="btn btn-sm btn-success btn-wa" url="{{ $url_wa }}" title="Whatsapp">
        <i class="fab fa-whatsapp"></i>
    </button>
@endif


@can('isAdmin')
    @if ($model->status == 'menunggu')
        <button type="button" class="btn btn-sm btn-primary tanggapi" url="{{ $url_tanggapi }}" title="Tanggapi">
            <i class="fas fa-check"></i>
        </button>
    @endif
@endcan

<button type="button" class="btn btn-sm btn-warning btn-show" url="{{ $url_show }}" data-toggle="modal"
    data-target="#modal" title="Detail">
    <i class="fas fa-eye"></i>
</button>

@can('isAdmin')
    <button type="button" class="btn btn-sm btn-danger btn-delete" url="{{ $url_destroy }}" title="Hapus">
        <i class="fas fa-trash"></i>
    </button>
@endcan
