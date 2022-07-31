<table cellpadding="10">

    <tr>
        <td>No Agenda</td>
        <td>: {{ $model->no_agenda }}</td>
    </tr>

    <tr>
        <td>No Surat</td>
        <td>: {{ $model->no_surat }}</td>
    </tr>

    <tr>
        <td>Tanggal Surat</td>
        <td>: {{ $model->tanggal_surat?->format('d-m-Y') ?? '-' }}</td>
    </tr>

    <tr>
        <td>Perihal Surat</td>
        <td>: {{ $model->perihal_surat }}</td>
    </tr>

    <tr>
        <td>Tembusan</td>
        <td>: {{ $model->tembusan }}</td>
    </tr>

    <tr>
        <td>Penerima</td>
        <td>: {{ $model->penerima }}</td>
    </tr>

    <tr>
        <td>Keterangan</td>
        <td>: {{ $model->keterangan }}</td>
    </tr>

    <tr>
        <td>Scan Surat</td>
        <td>:
            @if ($model->lampiran_path)
                <a href="{{ asset('storage/' . $model->lampiran_path) }}" target="_blank">{{ $model->no_surat }}.pdf</a>
            @else
                -
            @endif
        </td>
    </tr>

</table>
