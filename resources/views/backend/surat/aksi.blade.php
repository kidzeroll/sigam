@can('isAdmin')
    @if ($model->status == 'menunggu')
        <button type="button" class="btn btn-sm btn-primary btn-ttd" url="{{ $url_ttd }}" title="Tandatangan">
            <i class="fas fa-check"></i>
        </button>
    @endif
@endcan

@if ($model->status == 'ditandatangani' || $model->status == 'selesai')
    <button type="button" class="btn btn-sm btn-success btn-wa" url="{{ $url_wa }}" title="Whatsapp">
        <i class="fab fa-whatsapp"></i>
    </button>
@endif

<a href="{{ asset('storage/' . $model->surat_path) }}" class="btn btn-sm btn-warning btn-show" target="_blank">
    <i class="fas fa-eye"></i>
</a>

@can('isAdmin')
    <button type="button" class="btn btn-sm btn-danger btn-delete" url="{{ $url_destroy }}" title="Hapus">
        <i class="fas fa-trash"></i>
    </button>
@endcan
