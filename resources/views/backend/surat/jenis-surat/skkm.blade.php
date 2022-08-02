<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SURAT KETERANGAN KURANG MAMPU</title>
    <link rel="icon" href="{{ public_path('storage/' . $gampong->logo_path) }}" type="image/png">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }

        table tr td {
            font-size: 12pt;
        }

        .text-center {
            text-align: center
        }
    </style>

</head>

<body>

    <div style="margin: 1cm">

        <!--kop-->
        <table style="height:100px;width:100%;margin-top: 0px">
            <tr>
                <td style="float:left">
                    <img src="{{ public_path('storage/' . $gampong->logo_path) }}" alt="logo" width="90px"
                        height="90px">
                </td>
                <td class="text-center">
                    <span style="font-size: 14pt; font-weight: bold">
                        PEMERINTAH KABUPATEN {{ Str::upper($gampong->nama_kabupaten) }}
                    </span><br>
                    <span style="font-size: 14pt; font-weight: bold">
                        KECAMATAN {{ Str::upper($gampong->nama_kecamatan) }}
                    </span><br>
                    <span style="font-size: 14pt; font-weight: bold">
                        GAMPONG {{ Str::upper($gampong->nama_gampong) }}
                    </span><br>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>
        </table>

        <!--nomor-->
        <div style="margin-top: 20px" class="text-center">
            <b style="text-decoration: underline;">SURAT KETERANGAN KURANG MAMPU</b>
            <br>
            Nomor : {{ $no }}/{{ $gampong->kode_gampong }}-SKKM/{{ $bln }}/{{ date('Y') }}
        </div>

        <!--menerangkan-->
        <div style="margin-top: 20px; text-align: justify;">
            <p>
                Keuchik Gampong {{ $gampong->nama_gampong }} Kecamatan {{ $gampong->nama_kecamatan }}
                Kabupaten {{ $gampong->nama_kabupaten }} Provinsi {{ $gampong->nama_provinsi }}, dengan ini
                menyatakan bahwa :
            </p>
        </div>

        <!--data-->
        <table style="margin-top: 20px; margin-bottom: 20px; margin-left: 45px; ">
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td>{{ $data->nama }}</td>
            </tr>

            <tr>
                <td>Tempat /Tgl Lahir</td>
                <td>:</td>
                <td>
                    {{ $data->tempat_lahir }}, {{ $data->tanggal_lahir->isoFormat('d MMMM Y') }}
                </td>
            </tr>

            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>
                    @if ($data->jenis_kelamin == 'P')
                        Perempuan
                    @else
                        Laki-Laki
                    @endif
                </td>
            </tr>

            <tr>
                <td>Agama</td>
                <td>:</td>
                <td>{{ Str::ucfirst($data->agama->nama) }}</td>
            </tr>

            <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td>{{ Str::ucfirst($data->pekerjaan->nama) }}</td>
            </tr>

            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $data->alamat }}</td>
            </tr>
        </table>

        <!--isi-->
        <div style="text-align: justify;">
            <p>
                Benar yang namanya tersebut diatas adalah Penduduk dan berdomisili di wilayah Gampong
                {{ $gampong->nama_gampong }} Kecamatan {{ $gampong->nama_kecamatan }} Kabupaten
                {{ $gampong->nama_kabupaten }} dan sepengetahuan kami yang bersangkutan adalah keluarga <b>Kurang
                    mampu</b>.
            </p>
            <p>
                Demikianlah surat keterangan ini dibuat dengan sebenarnya untuk dapat dipergunakan seperlunya.
            </p>
        </div>

        <!--ttd-->
        <div>
            <div style="margin-left: 50%; width: 50%; margin-top: 20px" class="text-center">
                @if ($data->status == 'menunggu')
                    <p style="margin-bottom: 100px">
                        Keuchik Gampong {{ $gampong->nama_gampong }}
                    </p>

                    <p style="text-decoration: underline">
                        <b>{{ $gampong->nama_keuchik }}</b>
                    </p>
                @endif

                @if ($data->status == 'ditandatangani')
                    <p style="margin-bottom: 10px">
                        Keuchik Gampong {{ $gampong->nama_gampong }}
                    </p>

                    <img src="{{ public_path('storage/' . $gampong->ttd_path) }}" alt=""
                        style="height:90px; width:100%; margin-bottom: 10px">

                    <p style="text-decoration: underline">
                        <b>{{ $gampong->nama_keuchik }}</b>
                    </p>
                @endif

            </div>
        </div>

    </div>

</body>

</html>
