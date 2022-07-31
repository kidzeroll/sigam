<table cellpadding="10">
    <tr>
        <td>Nama Bayi</td>
        <td>: {{ $model->nama_bayi }}</td>
    </tr>

    <tr>
        <td>Jenis Kelamin</td>
        <td>: {{ $model->jenis_kelamin }}</td>
    </tr>
    <tr>
        <td>Tanggal Lahir</td>
        <td>: {{ $model->tanggal_lahir?->format('d M Y') ?? '-' }}</td>
    </tr>

    <tr>
        <td>Tempat Lahir</td>
        <td>: {{ $model->tempat_lahir }}</td>
    </tr>

    <tr>
        <td>Nama Ayah</td>
        <td>: {{ $model->nama_ayah }}</td>
    </tr>

    <tr>
        <td>Nama Ibu</td>
        <td>: {{ $model->nama_ibu }}</td>
    </tr>

    <tr>
        <td>Status</td>
        <td>:
            @if ($model->status == 'lahir')
                <span class="badge badge-primary">{{ $model->status }}</span>
            @endif
            @if ($model->status == 'meninggal')
                <span class="badge badge-danger">{{ $model->status }}</span>
            @endif
        </td>
    </tr>

    <tr>
        <td>Keterangan</td>
        <td>: {{ $model->keterangan }}</td>
    </tr>

</table>
