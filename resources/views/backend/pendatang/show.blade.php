<table cellpadding="10">
    <tr>
        <td>No KK</td>
        <td>: {{ $model->no_kk }}</td>
    </tr>

    <tr>
        <td>NIK</td>
        <td>: {{ $model->nik }}</td>
    </tr>

    <tr>
        <td>Nama</td>
        <td>: {{ $model->nama }}</td>
    </tr>

    <tr>
        <td>Jenis Kelamin</td>
        <td>: {{ $model->jenis_kelamin }}</td>
    </tr>

    <tr>
        <td>Alamat Asal</td>
        <td>: {{ $model->alamat_asal }}</td>
    </tr>

    <tr>
        <td>Tanggal Datang</td>
        <td>: {{ $model->tanggal_datang?->format('d M Y') ?? '-' }}</td>
    </tr>

    <tr>
        <td>Tujuan Kedatangan</td>
        <td>: {{ $model->tujuan_kedatangan }}</td>
    </tr>

    <tr>
        <td>Lama Kedatangan</td>
        <td>: {{ $model->lama_kedatangan }}</td>
    </tr>

    <tr>
        <td>No HP</td>
        <td>: {{ $model->no_hp }}</td>
    </tr>

    <tr>
        <td>Status</td>
        <td>:
            @if ($model->status == 'proses')
                <span class="badge badge-warning">{{ $model->status }}</span>
            @endif
            @if ($model->status == 'selesai')
                <span class="badge badge-success">{{ $model->status }}</span>
            @endif
            @if ($model->status == 'menetap')
                <span class="badge badge-primary">{{ $model->status }}</span>
            @endif
        </td>
    </tr>

    <tr>
        <td>Foto/KTP</td>
        <td>:
            @if ($model->photo_path)
                <a href="{{ asset('storage/' . $model->photo_path) }}" target="_blank">FOTO/KTP
                    {{ $model->nama }}.jpg</a>
            @else
                -
            @endif
        </td>
    </tr>

</table>
