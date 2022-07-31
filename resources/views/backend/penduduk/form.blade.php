{!! Form::model($model, [
    'route' => $model->exists ? ['penduduk.update', $model->id] : 'penduduk.store',
    'method' => $model->exists ? 'PUT' : 'POST',
    'enctype' => 'multipart/form-data',
]) !!}


<div class="row">

    <!-- no_kk -->
    <div class="form-group col-md-6 col-12">
        <label for="no_kk">No KK</label>
        <input type="text" class="form-control  @error('no_kk') is-invalid @enderror" id="no_kk" name="no_kk"
            value="{{ old('no_kk', $model->no_kk) }}">
    </div>

    <!-- nik -->
    <div class="form-group col-md-6 col-12">
        <label for="nik">NIK</label>
        <input type="text" class="form-control  @error('nik') is-invalid @enderror" id="nik" name="nik"
            value="{{ old('nik', $model->nik) }}">
    </div>

</div>

<div class="row">

    <!-- nama -->
    <div class="form-group col-md-6 col-12">
        <label for="nama">Nama</label>
        <input type="text" class="form-control  @error('nama') is-invalid @enderror" id="nama" name="nama"
            value="{{ old('nama', $model->nama) }}">
    </div>

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

</div>

<div class="row">
    <!-- tanggal lahir -->
    <div class="form-group col-md-6 col-12">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" class="form-control  @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir"
            name="tanggal_lahir" value="{{ old('tanggal_lahir', $model->tanggal_lahir?->format('Y-m-d') ?? '') }}">
    </div>

    <!-- tempat lahir -->
    <div class="form-group col-md-6 col-12">
        <label for="tempat_lahir">Tempat Lahir</label>
        <input type="text" class="form-control  @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir"
            name="tempat_lahir" value="{{ old('tempat_lahir', $model->tempat_lahir) }}">
    </div>

</div>

<div class="row">

    <!-- kewarganegaraan -->
    <div class="form-group col-md-6 col-12">
        <label for="kewarganegaraan">Kewarganegaraan</label>
        <select class="form-control select2" id="kewarganegaraan" name="kewarganegaraan" style="width: 100%">
            <option disabled selected>Pilih</option>
            <option value="WNI" {{ old('kewarganegaraan', $model->kewarganegaraan) == 'WNI' ? 'selected' : '' }}>
                WNI
            </option>
            <option value="WNA" {{ old('kewarganegaraan', $model->kewarganegaraan) == 'WNA' ? 'selected' : '' }}>
                WNA
            </option>
            <option value="GANDA" {{ old('kewarganegaraan', $model->kewarganegaraan) == 'GANDA' ? 'selected' : '' }}>
                GANDA
            </option>
        </select>
    </div>

    <!-- golongan_darah -->
    <div class="form-group col-md-6 col-12">
        <label for="golongan_darah">Golongan Darah</label>
        <input type="text" class="form-control  @error('golongan_darah') is-invalid @enderror" id="golongan_darah"
            name="golongan_darah" value="{{ old('golongan_darah', $model->golongan_darah) }}">
    </div>
</div>

<div class="row">

    <!--agama_id-->
    <div class="form-group col-md-6 col-12">
        <label for="agama_id">Agama</label>
        <select class="form-control select2" id="agama_id" name="agama_id" style="width: 100%">
            <option disabled selected>Pilih</option>
            @foreach ($agamas as $agama)
                <option value="{{ $agama->id }}"
                    {{ old('agama_id', $model->agama_id) == $agama->id ? 'selected' : '' }}>
                    {{ $agama->nama }}
                </option>
            @endforeach
        </select>
    </div>

    <!--dusun_id-->
    <div class="form-group col-md-6 col-12">
        <label for="dusun_id">Dusun</label>
        <select class="form-control select2" id="dusun_id" name="dusun_id" style="width: 100%">
            <option disabled selected>Pilih</option>
            @foreach ($dusuns as $dusun)
                <option value="{{ $dusun->id }}"
                    {{ old('dusun_id', $model->dusun_id) == $dusun->id ? 'selected' : '' }}>
                    {{ $dusun->nama }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="row">

    <!-- no_hp -->
    <div class="form-group col-12">
        <label for="no_hp">No HP</label>
        <input type="text" class="form-control  @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp"
            value="{{ old('no_hp', $model->no_hp) }}">
    </div>

    <!-- alamat -->
    <div class="form-group col-12">
        <label>Alamat</label>
        <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat">{{ old('alamat', $model->alamat) }}</textarea>
    </div>

</div>

<hr class="bg-primary">

<div class="row">
    <!--pendidikan_id-->
    <div class="form-group col-md-6 col-12">
        <label for="pendidikan_id">Pendidikan</label>
        <select class="form-control select2" id="pendidikan_id" name="pendidikan_id" style="width: 100%">
            <option disabled selected>Pilih</option>
            @foreach ($pendidikans as $pendidikan)
                <option value="{{ $pendidikan->id }}"
                    {{ old('pendidikan_id', $model->pendidikan_id) == $pendidikan->id ? 'selected' : '' }}>
                    {{ $pendidikan->nama }}
                </option>
            @endforeach
        </select>
    </div>

    <!--pekerjaan_id-->
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
    <!-- penghasilan -->
    <div class="form-group col-12">
        <label for="penghasilan">Penghasilan</label>
        <input type="text" class="form-control  @error('penghasilan') is-invalid @enderror" id="penghasilan"
            name="penghasilan" value="{{ old('penghasilan', $model->penghasilan) }}">
    </div>
</div>

<hr class="bg-primary">

<div class="row">

    <!-- nama_ayah -->
    <div class="form-group col-md-6 col-12">
        <label for="nama_ayah">Nama Ayah</label>
        <input type="text" class="form-control  @error('nama_ayah') is-invalid @enderror" id="nama_ayah"
            name="nama_ayah" value="{{ old('nama_ayah', $model->nama_ayah) }}">
    </div>

    <!-- nama_ibu -->
    <div class="form-group col-md-6 col-12">
        <label for="nama_ibu">Nama Ibu</label>
        <input type="text" class="form-control  @error('nama_ibu') is-invalid @enderror" id="nama_ibu"
            name="nama_ibu" value="{{ old('nama_ibu', $model->nama_ibu) }}">
    </div>

</div>

<hr class="bg-primary">

<div class="row">
    <!--perkawinan_id-->
    <div class="form-group col-md-6 col-12">
        <label for="perkawinan_id">Status Perkawinan</label>
        <select class="form-control select2" id="perkawinan_id" name="perkawinan_id" style="width: 100%">
            <option disabled selected>Pilih</option>
            @foreach ($perkawinans as $perkawinan)
                <option value="{{ $perkawinan->id }}"
                    {{ old('perkawinan_id', $model->perkawinan_id) == $perkawinan->id ? 'selected' : '' }}>
                    {{ $perkawinan->nama }}
                </option>
            @endforeach
        </select>
    </div>

    <!--hubungan_id-->
    <div class="form-group col-md-6 col-12">
        <label for="hubungan_id">Hubungan Dalam Keluarga</label>
        <select class="form-control select2" id="hubungan_id" name="hubungan_id" style="width: 100%">
            <option disabled selected>Pilih</option>
            @foreach ($hubungans as $hubungan)
                <option value="{{ $hubungan->id }}"
                    {{ old('hubungan_id', $model->hubungan_id) == $hubungan->id ? 'selected' : '' }}>
                    {{ $hubungan->nama }}
                </option>
            @endforeach
        </select>
    </div>

</div>

<hr class="bg-primary">

<div class="row">

    <!-- status -->
    <div class="form-group col-12">
        <label for="status">Status</label>
        <select class="form-control select2 @error('status') is-invalid @enderror" id="status" name="status"
            style="width: 100%">
            <option disabled selected>Pilih</option>
            <option value="ada" {{ old('status', $model->status) == 'ada' ? 'selected' : '' }}>
                Ada
            </option>
            <option value="pindah" {{ old('status', $model->status) == 'pindah' ? 'selected' : '' }}>
                Pindah
            </option>
            <option value="meninggal" {{ old('status', $model->status) == 'meninggal' ? 'selected' : '' }}>
                Meninggal
            </option>
        </select>
    </div>

    <!--ktp_path-->
    <div class="form-group col-12">
        <label>KTP</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="ktp_path" name="ktp_path">
            <label class="custom-file-label" for="ktp_path" id="label-ktp_path">Choose file</label>
        </div>
    </div>
</div>

{!! Form::close() !!}

<script type="text/javascript">
    document.querySelector("#ktp_path").onchange = function() {
        document.querySelector("#label-ktp_path").textContent = this.files[0].name;
    }
</script>
