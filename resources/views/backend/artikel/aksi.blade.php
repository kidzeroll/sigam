<a href="{{ route('artikel.show', $model->id) }}" class="btn btn-sm btn-warning btn-show" title="Detail">
    <i class="fas fa-eye"></i>
</a>

<button type="button" class="btn btn-sm btn-primary show-modal edit" url="{{ $url_edit }}" data-toggle="modal"
    data-target="#modal" title="Edit">
    <i class="fas fa-edit"></i>
</button>

<button type="button" class="btn btn-sm btn-danger btn-delete" url="{{ $url_destroy }}" title="Hapus">
    <i class="fas fa-trash"></i>
</button>
