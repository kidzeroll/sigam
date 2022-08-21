<table cellpadding="10">
    <tr>
        <td>Jenis Surat</td>
        <td>: {{ $model->jenis_surat }}</td>
    </tr>

    <tr>
        <td>Nik</td>
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
        <td>Tanggal Lahir</td>
        <td>: {{ $model->tanggal_lahir?->format('d-m-Y') ?? '-' }}</td>
    </tr>

    <tr>
        <td>Tempat Lahir</td>
        <td>: {{ $model->alamat }}</td>
    </tr>

    <tr>
        <td>Alamat</td>
        <td>: {{ $model->alamat }}</td>
    </tr>

    <tr>
        <td>Agama</td>
        <td>: {{ $model->agama->nama }}</td>
    </tr>

    <tr>
        <td>Pekerjaan</td>
        <td>: {{ $model->pekerjaan->nama }}</td>
    </tr>

    <tr>
        <td>Keperluan</td>
        <td>: {{ $model->keperluan }}</td>
    </tr>

    <tr>
        <td>No Hp</td>
        <td>: {{ $model->no_hp }}</td>
    </tr>

    <tr>
        <td>Scan KTP</td>
        <td>:
            @if ($model->ktp_path)
                <a href="{{ asset('storage/' . $model->ktp_path) }}" target="_blank">KTP {{ $model->nama }}</a>
            @else
                -
            @endif
        </td>
    </tr>

    <tr>
        <td>Scan KK</td>
        <td>:
            @if ($model->kk_path)
                <a href="{{ asset('storage/' . $model->kk_path) }}" target="_blank">KK {{ $model->nama }}</a>
            @else
                -
            @endif
        </td>
    </tr>

    <tr>
        <td>Bentuk Surat</td>
        <td>: <a href="{{ asset('storage/' . $model->surat_path) }}"
                target="_blank">{{ $model->jenis_surat }}-{{ $model->nama }}</a>
        </td>
    </tr>

    <tr>
        <td>Status</td>
        <td>:
            @if ($model->status == 'ditandatangani')
                <span class="badge badge-primary">{{ $model->status }}</span>
            @endif
            @if ($model->status == 'menunggu')
                <span class="badge badge-danger">{{ $model->status }}</span>
            @endif
            @if ($model->status == 'selesai')
                <span class="badge badge-success">{{ $model->status }}</span>
            @endif
        </td>
    </tr>

</table>

@if ($model->jenis_surat == 'SKK')
    <hr class="bg-primary">

    <table cellpadding="10">

        <tr>
            <td>Tanggal Meninggal</td>
            <td>: {{ $model->tanggal_meninggal?->format('d-m-Y') ?? '-' }}</td>
        </tr>

        <tr>
            <td>Tanggal Dikebumikan</td>
            <td>: {{ $model->tanggal_dikebumikan?->format('d-m-Y') ?? '-' }}</td>
        </tr>

        <tr>
            <td>Pukul Meninggal</td>
            <td>: {{ $model->pukul_meninggal }} WIB</td>
        </tr>

        <tr>
            <td>Pukul Dikebumikan</td>
            <td>: {{ $model->pukul_dikebumikan }} WIB</td>
        </tr>

        <tr>
            <td>Penyebab</td>
            <td>: {{ $model->penyebab }}</td>
        </tr>

        <tr>
            <td>Tempat dikebumikan</td>
            <td>: {{ $model->tempat_dikebumikan }}</td>
        </tr>

    </table>
@endif

@if ($model->jenis_surat == 'SKP')
    <hr class="bg-primary">

    <table cellpadding="10">

        <tr>
            <td>Tanggal Pindah</td>
            <td>: {{ $model->tanggal_pindah?->format('d-m-Y') ?? '-' }}</td>
        </tr>

        <tr>
            <td>Tujuan Pindah</td>
            <td>: {{ $model->tujuan_pindah }}</td>
        </tr>

    </table>
@endif

@if ($model->jenis_surat == 'SKU')
    <hr class="bg-primary">

    <table cellpadding="10">

        <tr>
            <td>Bidang Usaha</td>
            <td>: {{ $model->bidang_usaha }}</td>
        </tr>

        <tr>
            <td>Alamat Usaha</td>
            <td>: {{ $model->alamat_usaha }}</td>
        </tr>

    </table>
@endif

@if ($model->status == 'ditandatangani' || $model->status == 'selesai')
    <button type="button" class="btn btn-sm btn-success btn-wa float-right mt-5 mx-1"
        url="{{ route('surat.wa', $model->id) }}" title="Whatsapp">
        <i class="fab fa-whatsapp"></i>
        <span>Whatsapp</span>
    </button>
@else
    <button type="button" class="btn btn-sm btn-primary btn-ttd float-right mt-5 mx-1"
        url="{{ route('surat.ttd', $model->id) }}" title="Tandatangan">
        <i class="fas fa-check"></i>
        <span>Tandatangan</span>
    </button>
@endif
