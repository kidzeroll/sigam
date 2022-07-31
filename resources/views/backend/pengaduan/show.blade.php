<table cellpadding="10">
    <tr>
        <td>Nama</td>
        <td>: {{ $model->nama }}</td>
    </tr>

    <tr>
        <td>Judul</td>
        <td>: {{ $model->judul }}</td>
    </tr>

    <tr>
        <td>Isi</td>
        <td class="text-justify">: {{ $model->isi }}</td>
    </tr>

    <tr>
        <td>No HP</td>
        <td>: {{ $model->no_hp }}</td>
    </tr>

    <tr>
        <td>Status</td>
        <td>:
            @if ($model->status == 'menunggu')
                <span class="badge badge-danger">{{ $model->status }}</span>
            @endif

            @if ($model->status == 'ditanggapi')
                <span class="badge badge-primary">{{ $model->status }}</span>
            @endif

            @if ($model->status == 'selesai')
                <span class="badge badge-success">{{ $model->status }}</span>
            @endif
        </td>
    </tr>

    <tr>
        <td>Tanggal</td>
        <td>: {{ $model->created_at->format('d-m-Y') }}</td>
    </tr>

    <tr>
        <td>Lampiran</td>
        <td>: @if ($model->lampiran_path)
                <a href="{{ asset('storage/' . $model->lampiran_path) }}"
                    target="_blank">{{ $model->created_at->format('d-m-Y') }}-{{ $model->nama }}</a>
            @else
                -
            @endif
        </td>
    </tr>
</table>
