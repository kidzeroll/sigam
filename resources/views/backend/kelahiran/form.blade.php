{!! Form::model($model, [
    'route' => $model->exists ? ['kelahiran.update', $model->id] : 'kelahiran.store',
    'method' => $model->exists ? 'PUT' : 'POST',
]) !!}


<div class="row">

    <!-- nama_bayi -->
    <div class="form-group col-md-6 col-12">
        <label for="nama_bayi">Nama Bayi</label>
        <input type="text" class="form-control  @error('nama_bayi') is-invalid @enderror" id="nama_bayi" name="nama_bayi"
            value="{{ old('nama_bayi', $model->nama_bayi) }}">
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

<div class="row">
    <!-- keterangan -->
    <div class="form-group col-12">
        <label>Keterangan</label>
        <textarea class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan">{{ old('keterangan', $model->keterangan) }}</textarea>
    </div>

</div>


{!! Form::close() !!}
