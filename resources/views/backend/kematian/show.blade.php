<table cellpadding="10">

    <tr>
        <td>NIK</td>
        <td>: {{ $model->penduduk->nik }}</td>
    </tr>

    <tr>
        <td>Nama</td>
        <td>: {{ $model->penduduk->nama }}</td>
    </tr>

    <tr>
        <td>Jenis Kelamin</td>
        <td>: {{ $model->penduduk->jenis_kelamin }}</td>
    </tr>

    <tr>
        <td>Alamat</td>
        <td>: {{ $model->penduduk->alamat }}</td>
    </tr>


    <tr>
        <td>Tanggal Meninggal</td>
        <td>: {{ $model->tanggal_meninggal?->format('d-m-Y') ?? '-' }}</td>
    </tr>

    <tr>
        <td>Keterangan</td>
        <td>: {{ $model->keterangan }}</td>
    </tr>

</table>
