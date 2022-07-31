{!! Form::model($model, [
    'route' => $model->exists ? ['surat.update', $model->id] : 'surat.store',
    'method' => $model->exists ? 'PUT' : 'POST',
]) !!}

<div class="row">

    <!-- jenis_surat -->
    <div class="form-group col-12">
        <label for="jenis_surat">Jenis Surat</label>
        <select class="form-control select2" id="jenis_surat" name="jenis_surat" style="width: 100%">
            <option disabled selected>Pilih</option>
            <option value="SKKM" {{ old('jenis_surat', $model->jenis_surat) == 'SKKM' ? 'selected' : '' }}>
                Surat Keterangan Kurang Mampu
            </option>
            <option value="SKBB" {{ old('jenis_surat', $model->jenis_surat) == 'SKBB' ? 'selected' : '' }}>
                Surat Keterangan Berkelakuan Baik
            </option>
            <option value="SKBM" {{ old('jenis_surat', $model->jenis_surat) == 'SKBM' ? 'selected' : '' }}>
                Surat Keterangan Belum Menikah
            </option>
            <option value="SKP" {{ old('jenis_surat', $model->jenis_surat) == 'SKP' ? 'selected' : '' }}>
                Surat Keterangan Pindah
            </option>
            <option value="SKU" {{ old('jenis_surat', $model->jenis_surat) == 'SKU' ? 'selected' : '' }}>
                Surat Keterangan Usaha
            </option>
            <option value="SKD" {{ old('jenis_surat', $model->jenis_surat) == 'SKD' ? 'selected' : '' }}>
                Surat Keterangan Domisili
            </option>
            <option value="SKK" {{ old('jenis_surat', $model->jenis_surat) == 'SKK' ? 'selected' : '' }}>
                Surat Keterangan Kematian
            </option>
        </select>
    </div>

</div>

<div class="row">

    <!-- nik -->
    <div class="form-group col-md-6 col-12">
        <label for="nik">NIK</label>
        <input type="text" class="form-control  @error('nik') is-invalid @enderror" id="nik" name="nik"
            value="{{ old('nik', $model->nik) }}">
    </div>

    <!-- nama -->
    <div class="form-group col-md-6 col-12">
        <label for="nama">Nama</label>
        <input type="text" class="form-control  @error('nama') is-invalid @enderror" id="nama" name="nama"
            value="{{ old('nama', $model->nama) }}">
    </div>

</div>

<div class="row">

    <!-- jenis_kelamin -->
    <div class="form-group col-md-6 col-12">
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select class="form-control select2 @error('jenis_kelamin') is-invalid @enderror" id="jenis_kelamin"
            name="jenis_kelamin" style="width: 100%">
            <option disabled selected>Pilih</option>
            <option value="L" {{ old('jenis_kelamin', $model->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki
            </option>
            <option value="P" {{ old('jenis_kelamin', $model->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan
            </option>
        </select>
    </div>

    <!-- Tanggal Lahir -->
    <div class="form-group col-md-6 col-12">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" class="form-control  @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir"
            name="tanggal_lahir" value="{{ old('tanggal_lahir', $model->tanggal_lahir?->format('Y-m-d') ?? '') }}">
    </div>

</div>

<div class="row">

    <!-- tempat_lahir -->
    <div class="form-group col-12">
        <label for="tempat_lahir">Tempat Lahir</label>
        <input type="text" class="form-control  @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir"
            name="tempat_lahir" value="{{ old('tempat_lahir', $model->tempat_lahir) }}">
    </div>


    <!-- alamat -->
    <div class="form-group col-12">
        <label>Alamat</label>
        <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat">{{ old('alamat', $model->alamat) }}</textarea>
    </div>

</div>


<div class="row">
    <!-- agama-->
    <div class="form-group col-md-6 col-12">
        <label for="agama_id">Agama</label>
        <select class="form-control select2" id="agama_id" name="agama_id" style="width: 100%">
            <option disabled selected>Pilih</option>
            @foreach ($agamas as $agama)
                <option value="{{ $agama->id }}"
                    {{ old('agama_id', $model->agama_id) == $agama->id ? 'selected' : '' }}>{{ $agama->nama }}
                </option>
            @endforeach
        </select>
    </div>

    <!--pekerjaan-->
    <div class="form-group col-md-6 col-12">
        <label for="pekerjaan_id">Pekerjaan</label>
        <select class="form-control select2" id="pekerjaan_id" name="pekerjaan_id" style="width: 100%">
            <option disabled selected>Pilih</option>
            @foreach ($pekerjaans as $pekerjaan)
                <option value="{{ $pekerjaan->id }}"
                    {{ old('pekerjaan_id', $model->pekerjaan_id) == $pekerjaan->id ? 'selected' : '' }}>
                    {{ $pekerjaan->nama }}
                </option>
            @endforeach
        </select>

    </div>

</div>

<div class="row">
    <!-- no hp -->
    <div class="form-group col-12">
        <label for="no_hp">No WA</label>
        <input id="no_hp" type="text" class="form-control" name="no_hp"
            value="{{ old('no_hp', $model->no_hp) }}">
        <span class="bg-secondary px-2 rounded"><small>Harap masukkan nomor Whatsapp yang benar!</small></span>
    </div>
</div>

<hr class="bg-primary d-none" id="hr-meninggal">

<div class="row d-none" id="meninggal-1">
    <!-- penyebab -->
    <div class="form-group col-md-6 col-12">
        <label for="penyebab">Penyebab</label>
        <input id="penyebab" type="text" class="form-control" name="penyebab"
            value="{{ old('penyebab', $model->penyebab) }}">
    </div>

    <!-- tanggal_meninggal -->
    <div class="form-group col-md-6 col-12">
        <label for="tanggal_meninggal">Tanggal Meninggal</label>
        <input type="date" class="form-control  @error('tanggal_meninggal') is-invalid @enderror"
            id="tanggal_meninggal" name="tanggal_meninggal"
            value="{{ old('tanggal_meninggal', $model->tanggal_meninggal?->format('Y-m-d') ?? '') }}">
    </div>

</div>

<div class="row d-none" id="meninggal-2">
    <!-- tempat_dikebumikan -->
    <div class="form-group col-md-6 col-12">
        <label for="tempat_dikebumikan">Tempat Dikebumikan</label>
        <input id="tempat_dikebumikan" type="text" class="form-control" name="tempat_dikebumikan"
            value="{{ old('tempat_dikebumikan', $model->tempat_dikebumikan) }}">
    </div>

    <!-- tanggal_dikebumikan -->
    <div class="form-group col-md-6 col-12">
        <label for="tanggal_dikebumikan">Tanggal Dikebumikan</label>
        <input type="date" class="form-control  @error('tanggal_dikebumikan') is-invalid @enderror"
            id="tanggal_dikebumikan" name="tanggal_dikebumikan"
            value="{{ old('tanggal_dikebumikan', $model->tanggal_dikebumikan?->format('Y-m-d') ?? '') }}">
    </div>

</div>

<div class="row d-none" id="meninggal-3">
    <!-- pukul_meninggal -->
    <div class="form-group col-md-6 col-12">
        <label for="pukul_meninggal">Pukul Meninggal</label>
        <input id="pukul_meninggal" type="time" class="form-control" name="pukul_meninggal"
            value="{{ old('pukul_meninggal', $model->pukul_meninggal) }}">
    </div>

    <!-- pukul_dikebumikan -->
    <div class="form-group col-md-6 col-12">
        <label for="pukul_dikebumikan">Pukul Dikebumikan</label>
        <input id="pukul_dikebumikan" type="time" class="form-control" name="pukul_dikebumikan"
            value="{{ old('pukul_dikebumikan', $model->pukul_dikebumikan) }}">
    </div>

</div>

<hr class="bg-primary d-none" id="hr-pindah">

<div class="row d-none" id="pindah">
    <!-- tujuan_pindah -->
    <div class="form-group col-md-6 col-12">
        <label for="tujuan_pindah">Tujuan Pindah</label>
        <input id="tujuan_pindah" type="text" class="form-control" name="tujuan_pindah"
            value="{{ old('tujuan_pindah', $model->tujuan_pindah) }}">
    </div>

    <!-- tanggal_pindah -->
    <div class="form-group col-md-6 col-12">
        <label for="tanggal_pindah">Tanggal Pindah</label>
        <input type="date" class="form-control  @error('tanggal_pindah') is-invalid @enderror" id="tanggal_pindah"
            name="tanggal_pindah"
            value="{{ old('tanggal_pindah', $model->tanggal_pindah?->format('Y-m-d') ?? '') }}">
    </div>

</div>

<hr class="bg-primary d-none" id="hr-usaha">

<div class="row d-none" id="usaha">
    <!-- bidang_usaha -->
    <div class="form-group col-12">
        <label for="bidang_usaha">Bidang Usaha</label>
        <input id="bidang_usaha" type="text" class="form-control" name="bidang_usaha"
            value="{{ old('bidang_usaha', $model->bidang_usaha) }}">
    </div>


    <!-- alamat_usaha -->
    <div class="form-group col-12">
        <label>Alamat Usaha</label>
        <textarea class="form-control @error('alamat_usaha') is-invalid @enderror" name="alamat_usaha" id="alamat_usaha">{{ old('alamat_usaha', $model->alamat_usaha) }}</textarea>
        <span class="bg-secondary px-2 rounded">Mohon masukkan alamat lengkap termasuk kecamatan & kabupaten!</span>
    </div>
</div>

<hr class="bg-primary">

<div class="row">


    <!-- keperluan -->
    <div class="form-group col-12">
        <label>Keperluan</label>
        <textarea class="form-control @error('keperluan') is-invalid @enderror" name="keperluan" id="keperluan">{{ old('keperluan', $model->keperluan) }}</textarea>
    </div>
</div>

{!! Form::close() !!}

<script>
    $('#jenis_surat').change(function() {
        var resID = $(this).val();

        if (resID == "SKU") {
            $('#hr-usaha').removeClass("d-none");
            $('#usaha').removeClass("d-none");

            $('#hr-meninggal').addClass("d-none");
            $('#meninggal-1').addClass("d-none");
            $('#meninggal-2').addClass("d-none");
            $('#meninggal-3').addClass("d-none");

            $('#hr-pindah').addClass("d-none");
            $('#pindah').addClass("d-none");

        } else if (resID == "SKP") {
            $('#hr-pindah').removeClass("d-none");
            $('#pindah').removeClass("d-none");

            $('#hr-usaha').addClass("d-none");
            $('#usaha').addClass("d-none");

            $('#hr-meninggal').addClass("d-none");
            $('#meninggal-1').addClass("d-none");
            $('#meninggal-2').addClass("d-none");
            $('#meninggal-3').addClass("d-none");

        } else if (resID == "SKK") {
            $('#hr-meninggal').removeClass("d-none");
            $('#meninggal-1').removeClass("d-none");
            $('#meninggal-2').removeClass("d-none");
            $('#meninggal-3').removeClass("d-none");

            $('#hr-usaha').addClass("d-none");
            $('#usaha').addClass("d-none");

            $('#hr-pindah').addClass("d-none");
            $('#pindah').addClass("d-none");

        } else {
            $('#hr-meninggal').addClass("d-none");
            $('#meninggal-1').addClass("d-none");
            $('#meninggal-2').addClass("d-none");
            $('#hr-pindah').addClass("d-none");
            $('#pindah').addClass("d-none");
            $('#hr-usaha').addClass("d-none");
            $('#usaha').addClass("d-none");
        }
    });
</script>
