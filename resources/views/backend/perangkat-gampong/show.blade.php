<table cellpadding="10">

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
        <td>Jabatan</td>
        <td>: {{ $model->jabatan }}</td>
    </tr>

    <tr>
        <td>No HP</td>
        <td>: {{ $model->no_hp }}</td>
    </tr>

    <tr>
        <td>Alamat</td>
        <td>: {{ $model->alamat }}</td>
    </tr>

    <tr>
        <td>Foto</td>
        <td>:
            @if ($model->photo_path)
                <img src="{{ asset('storage/' . $model->photo_path) }}" width="90px" height="90px">
            @else
                -
            @endif
        </td>
    </tr>
</table>
